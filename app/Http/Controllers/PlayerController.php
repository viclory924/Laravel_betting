<?php

namespace App\Http\Controllers;
use App\Mail\RequestNewPassword;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\StaygamingBO;
use Illuminate\Support\Facades\Auth;
use App\Player;
use Illuminate\Support\Facades\Session;
use App\GameVendors\Habanero;
use App\Mail\RegisteredPlayer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PlayerController extends Controller
{
	private $bonuses = array(); 
	public function __construct()
	{
		$this->middleware('auth', [
			'only' => [
				'logout',
				'makeDeposit',
				'makeWithdraw',
				'myAccount',
				'profile',
				'gameHistory',
				'activeGames',
				'favouriteGames',
				'favouriteSports',
				'kycDocs',
				'profileUpdate',
				'uploadkycDocs',
			]]);
		if(isset( Session::all()['player'] )){

			$player_id = Session::all()['player']->id;
	    	$bonuses = StaygamingBO::getBonusList($player_id);

		    if(is_object($bonuses) && $bonuses->status=='1'){
		    	$bonuses = $bonuses->result;
			}else{
		   		 $bonuses = array();
		    }
		}else{
			 $bonuses = array();
		}

		\View::share('bonuses', $bonuses);

	}
    public function register(Request $request)
    {
	    $registerBean = [
		    'name' => $request->input('name', $request->input('username')),
		    'email' => $request->input('email'),
		    'password' => $request->input('password'),
		    'dob' => $request->input('dob'),
		    'currency_id' => $request->input('currency'),
		    'phone' => $request->input('phone', ' '),
		    'username' => $request->input('username'),
		    'country_id' => $request->input('country_id'),
		    'merchant_id' => $request->input('merchant_id'),
		    'address' => $request->input('address'),
		    'zip' => $request->input('zip'),
		    'city' => $request->input('city')
	    ];

	    if ($request->has('btag')) {
	        $registerBean['btag'] = $request->input('btag');
        }

//	    dd($registerBean);

        $result = StaygamingBO::registerUser($registerBean);

        $res = json_decode($result);
	    if (isset($res->status) && $res->status > 0) {
		    $newPlayer = Player::createPlayer($request);

            // send confirmation email
//		    if (Auth::attempt(array('username' => $newPlayer->username, 'password' => $request->password))) {
//            $newPlayer->access_token = $res->result->token;
            $newPlayer->player_id = $res->result->id;
            $newPlayer->email_hash = $res->result->email_hash;
            $newPlayer->save();
//			    return json_encode($res);
//		    }
            Mail::to($newPlayer->email)->send(new RegisteredPlayer($newPlayer));
            return json_encode($res);
        } else {
			return $result;
	    }
    }

    public function login(Request $request)
    {
	    $player = Player::where('username', $request->username)->first();
	    $boPlayer = json_decode(\App\StaygamingBO::checkPlayerExists($request));

	    if (!$player) {
	        if ($boPlayer->status > 0) {

                $newPlayer = new \App\Player();
                $newPlayer->username = $boPlayer->result->username;
                $newPlayer->name = $boPlayer->result->name;
                $newPlayer->email = $boPlayer->result->email;
//                var_dump($boPlayer->result->password);exit;
                $newPlayer->password = bcrypt($boPlayer->result->password);
                $newPlayer->player_id = $boPlayer->result->id;
                $newPlayer->balance = $boPlayer->result->balance;
                $newPlayer->access_token = ' ';


//                var_dump($request->toArray());exit;

                $newPlayer->save();

                $result = StaygamingBO::loginUser($request);
                $res = json_decode($result);
                if ($res->status > 0) {
                    if (Auth::attempt(array('username' => $res->result->username, 'password' => $request->password))) {
                        $player->access_token = $res->result->token;

                        // update balance api call here
                        $player->balance = $res->result->balance;

                        $player->save();
                        $request->session()->put('player', $res->result);

                    }
                }

//                $result = array(
//                    'status' => 1,
//                    'message' => 'created and logged in'
//                );
            } else {
                $result = array(
                    'status' => 0,
                    'message' => __('auth.user_not_found')
                );
            }

        } else {
            $result = StaygamingBO::loginUser($request);
            $res = json_decode($result);
            if ($res->status > 0) {
                if (Auth::attempt(array('username' => $res->result->username, 'password' => $request->password))) {
                    $player->access_token = $res->result->token;

                    // update balance api call here
                    $player->balance = $res->result->balance;

                    $player->save();
                    $request->session()->put('player', $res->result);

                }
            }
        }

	    return json_encode($result);
    }

    public function logout()
    {
        if (!Auth::user()) {
            return redirect('/');
        }
	    $res = StaygamingBO::logout();

	    $resJson = json_decode($res);
	    if (isset($resJson->status)) {
		    Auth::logout();
		    request()->session()->remove('player');
		    return redirect('/');
	    }
    }

    public function makeDeposit(Request $request)
    {
    	$user_id =  Auth::user()->player_id;
    	$amount =  $request->input('amount');
    	$bonus_id =  $request->input('bonus_id', 0);
	    $payment_method = $request->get('payment_method');

	    $url = env('BO_URL') . "payment/pay/" . $user_id . "/" . $amount  . "/" . $bonus_id . "/1/" . $payment_method;

    	return \Redirect::to($url);
    }

	public function makeWithdraw(Request $request)
	{
		$user_id = $request->input('player_id');
		$amount = $request->input('amount');
		$bonus_id =  $request->input('bonus_id', 0);
		$payment_method = $request->input('payment_method');

		$url = env('BO_URL') . "payment/payout/" . $user_id . "/" . $amount  . "/" . $bonus_id . "/13/" . $payment_method;

		return \Redirect::to($url);
	}

    public function myAccount()
    {
	    if (Auth::user() != null) {
		    $playerInfo = json_decode(StaygamingBO::getPlayerInfo(Auth::user()));
		    $payment_methods = StaygamingBO::getPaymentMethods();
		    $deposit_methods = StaygamingBO::getMadePaymentMethods(Auth::user()->player_id);
		    $games_categories = StaygamingBO::getAllGamesCategories();
		    return view('player.my-account', [
			    'playerInfo' => $playerInfo->result,
			    'payment_methods' => $payment_methods,
			    'deposit_methods' => $deposit_methods,
			    'games_categories' => $games_categories
		    ]);
	    } else {
		    return redirect('/');
	    }
    }

    public function profile()
    {
    	$playerInfo = StaygamingBO::getPlayerInfo(Auth::user());

	    $countries = StaygamingBO::getCountries();

    	$player = json_decode($playerInfo);
    	$player = $player->result;

    	return view('player.profile', compact('player', 'countries'));
    }

    public function gameHistory()
    {
    	return view('player.game-history');
    }

	public function activeGames()
	{
		return view('player.active-games');
	}

	public function favouriteGames()
	{
		return view('player.favourite-games');
	}

	public function favouriteSports()
	{
		return view('player.favourite-sports');
	}

	public function kycDocs()
	{
		return view('player.kyc-docs');
	}

	public function game($vendor_game_id, Request $request)
	{
		$countries = StaygamingBO::getCountries();
		$currencies = StaygamingBO::getCurrencies();

		$agent = new Agent();

		if($agent->isDesktop()){
			$mobile = false;
		} else {
			$mobile = true;
		}

        $game = StaygamingBO::getGameObject($vendor_game_id);

        $notPopularGames = true;

		if (isset($game->result->vendor) && $game->result->vendor->name == 'inbet') {
            return view('games.single-game', compact('game', 'currencies', 'countries', 'notPopularGames'));
        } else {

            if(Auth::user() != null) {
                $res = StaygamingBO::getGameIframeUrlLogged($vendor_game_id);
            } else {
                $res = StaygamingBO::getIframeUrl($vendor_game_id);

            }
            $response = $res;
            if (strpos($response, "fundist") != false || strpos($response, "egamings") != false || strpos($response, "evoplay") != false) {
                $game_iframe_url = $response;

            } else {
                $game_iframe_url = $response . '&lobbyurl=' . $request->getScheme() . '://' . $request->getHttpHost();

            }

            if (strpos($game_iframe_url, "eyecon") != false) {
                $mobile = false;
            }

            return view('games.single-game', compact('game_iframe_url', 'currencies', 'countries', 'notPopularGames'));
        }
    }

	public function profileUpdate(Request $request)
	{
        $res = StaygamingBO::updatePlayer($request);

        return $res;
	}

	public function uploadkycDocs(Request $request)
	{
		$mime = $request->file('file')->getClientOriginalExtension();
		if (in_array(strtolower($mime), array('jpg','jpeg','gif','svg','png','pdf')))
		{
			$id = \Auth::user()->player_id;
			$res = StaygamingBO::uploadDoc($request,$id);
//			dd($res);
			\Session::flash('sucess_message','Doc Successfully Upload');
        }else{
        	\Session::flash('error_message','Invalid File type');
			
        }
        return view('player.kyc-docs');
        
	}

	public function coolingOff(Request $request)
    {
        $id = \Auth::user()->player_id;
        //dd($id, $request->player_id, $id == $request->player_id);
        if ($request->player_id == $id) {

            // send data to BO
            $res = StaygamingBO::setCoolingOffPeriod($request);

//            dd($res);

            if ($res->status > 0) {
                \Session::flash('sucess_message', $res->result->message);
            } else {
                \Session::flash('error_message', $res->result->message);
            }
            Auth::logout();
            request()->session()->remove('player');

        } else {
            \Session::flash('error_message','Something went wrong, please try again later');
        }

        return \Redirect::to('/');
    }

    public function trustlyDepo(Request $request)
    {
        $res = StaygamingBO::getTrustlyDepoIframeUrl($request->amount);

        return $res;
    }

    public function activate($hash, $email)
    {
        $player = \App\Player::where('email', $email)->first();
        if (!$player) {
            return view('player.activation-email-sent', ['title' => __('registration.something_went_wrong'), 'text' => __('registration.player_not_found')]);
        }

        if ($player->email_hash != $hash) {
            return view('player.activation-email-sent', ['title' => __('registration.something_went_wrong'), 'text' => __('registration.activation_code_incorrect')]);
        }

        $activation_result = StaygamingBO::activatePlayer($player);

        if ($activation_result->status > 0) {
            return view('player.activation-email-sent', ['title' => __('registration.congrats'), 'text' => __('registration.account_activated')]);
        }

    }

    public function justRegistered()
    {
        return view('player.activation-email-sent', [
            'title' => 'Congrats! You\'ve registered!',
            'text' => ''
//            'text' => 'Only thing is left is to activate your profile. Please check your registration email and follow instructions there'
        ]);
    }

    public function recoverPassword(Request $request)
    {
        $player = \App\Player::where('email', $request->input('email'))->first();
        if (!$player) {
            return response()->json([ 'status' => '0', 'message' => __('common.player_does_not_exists')]);
        } else {

            // player found, so send email with new password
            $random_password = Str::random();
            $hash = md5($random_password);
            $res = \App\StaygamingBO::updatePlayerPassword($player, $hash);

            if ($res->status > 0) {
                $player->password = bcrypt($random_password);
                $player->save();
                Mail::to($player->email)->send(new RequestNewPassword($player, $random_password));
            }

            return json_encode($res);
        }
    }

    public function updatePassword(Request $request)
    {
        if (!\Auth::user()) {
            return response()->json([ 'status' => '0', 'message' => __('common.player_does_not_exists')]);
        } else {
            $res = \App\StaygamingBO::updatePlayerPassword(\Auth::user(), md5($request->new_password));
            if ($res->status > 0) {
                \Auth::user()->password = bcrypt($request->new_password);
                \Auth::user()->save();
            }
            return json_encode($res);
        }
    }

    public function addGameToFav(Request $request) {

        if (!\Auth::user()) {
            $res = array(
                'status' => '0',
                'message' => __('common.player_not_authorized')
            );

        } else {
            $res = \App\StaygamingBO::addGameToFavorites($request, \Auth::user()->access_token);
        }

        return response($res);
    }

    public function getFavGames(Request $request) {
        if (\Auth::user() == null) {
            $res = array(
                'status' => '0',
                'message' => __('common.player_not_authorized')
            );
            return response($res);
        }
        if (!$request->has('casino_type')) {
            $res = array(
                'status' => '0',
                'message' => __('common.missing_parameter_casino_type')
            );
            return response($res);
        }

        $res = \App\StaygamingBO::getFavoritesGames($request, \Auth::user()->access_token);

        return response($res);
    }

    public function deleteGameFromFav(Request $request) {
        if (!\Auth::user()) {
            $res = array(
                'status' => '0',
                'message' => __('common.player_not_authorized')
            );

        } else {
            $res = \App\StaygamingBO::deleteGameFromFavorites($request, \Auth::user()->access_token);
        }

        return response($res);
    }

    public function getBalance() {
	    if (\Auth::user() != null) {
	        $res = \App\StaygamingBO::getBalanceByPlayerId(\Auth::user()->player_id);
	        if ($res->result->balance != \Auth::user()->balance) {
	            \Auth::user()->balance = $res->result->balance;
                \Auth::user()->save();
            }
        } else {
            $res = array(
                'status' => '0',
                'message' => __('common.player_not_authorized')
            );
        }

        return json_encode($res);
    }

    public function getAffiliates(Request $request) {

        if (/*!$this->checkAffiliatesIp($request)*/false) {
            return response()->json([
                'status' => 0,
                'result' => 'forbidden'
            ], 404);
        }

	    $params = [];

//	    if($request->has('btag')) {
//	        $btag = $request->input('btag');
//	        $params['btag'] = $btag;
//        } else {
//	        $res = [
//	            'status' => 0,
//                'result' => 'missing.btag.param'
//            ];
//        }

        if ($request->has('date_from')) {

            $from = $request->input('date_from');
            $dt = \DateTime::createFromFormat("Y-m-d", $from);

            if($dt !== false && !array_sum($dt::getLastErrors())) {
                $params['date_from'] = $from;
            } else {
                $res = [
                    'status' => 0,
                    'result' => 'wrong.date_from.format'
                ];

                return json_encode($res);
            }
        }

        if ($request->has('date_to')) {

            $from = $request->input('date_to');
            $dt = \DateTime::createFromFormat("Y-m-d", $from);

            if($dt !== false && !array_sum($dt::getLastErrors())) {
                $params['date_to'] = $from;
                $res = 'OK';
            } else {
                $res = [
                    'status' => 0,
                    'result' => 'wrong.date_to.format'
                ];
                return json_encode($res);
            }
        }

	    $res = \App\StaygamingBO::getAffiliates($params);

	    return $res;
    }

    public function getAffiliatesTransactionsData(Request $request) {

        if (/*!$this->checkAffiliatesIp($request)*/false) {
            return response()->json([
                'status' => 0,
                'result' => 'forbidden'
            ], 404);
        }

        $params = [];

        if ($request->has('date_from')) {

            $from = $request->input('date_from');
            $dt = \DateTime::createFromFormat("Y-m-d", $from);

            if($dt !== false && !array_sum($dt::getLastErrors())) {
                $params['date_from'] = $from;
            } else {
                $res = [
                    'status' => 0,
                    'result' => 'wrong.date_from.format'
                ];

                return json_encode($res);
            }
        }

        if ($request->has('date_to')) {

            $from = $request->input('date_to');
            $dt = \DateTime::createFromFormat("Y-m-d", $from);

            if($dt !== false && !array_sum($dt::getLastErrors())) {
                $params['date_to'] = $from;
                $res = 'OK';
            } else {
                $res = [
                    'status' => 0,
                    'result' => 'wrong.date_to.format'
                ];
                return json_encode($res);
            }
        }

        $res = \App\StaygamingBO::getAffiliatesTransactionsData($params);

        return $res;
    }

    public function checkAffiliatesIp(Request $request) {

	    $allowed_ips = explode(',', env('ALLOWED_AFFILIATE_IPS'));

	    if (!in_array($request->ip(), $allowed_ips)) {
            return false;
        } else {
	        return true;
        }
    }
}
