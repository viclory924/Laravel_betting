<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class StaygamingBO extends Model
{
	const ACCESS_TOKEN_URL = 'oauth/token';

	public static function getAcToken()
	{
		$params = [
			'client_id' => env('MERCHANT_CLIENT_ID'),
			'username' => env('MERCHANT_USERNAME'),
			'password' => env('MERCHANT_PASSWORD'),
			'client_secret' => env('SECRET_KEY'),
			'grant_type' => 'password'
		];

		$access_token = Session::get('access_token');

		if ($access_token === null) {
			$ch = curl_init();
			curl_setopt_array($ch, [
				CURLOPT_HTTPHEADER => [
					'Accept: application/json',
					'X-Requested-With: XMLHttpRequest',
					'x-api-key' => env('API_KEY')
				],
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_URL => env('BO_URL') . self::ACCESS_TOKEN_URL,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $params
			]);
			$res = json_decode(curl_exec($ch));
			if (isset($res->access_token)) {
				$access_token = $res->access_token;
				Session::put('access_token', $access_token);
			}
		}

		return $access_token;
	}

	public function getAccessToken()
	{
		return self::getAcToken();
	}

	public static function getCountries()
	{
		$url = 'api/v1/countries';

		$res = self::api($url , 'GET', null);

		if ($res->status == 1) {
			$result = $res->result;
		} else {
			$result = array();
		}

		return $result;
	}

	public static function registerUser($registerBean)
    {
		$url = 'api/v1/player/register';

		return self::api($url, 'POST', $registerBean);
    }

    public static function api($url, $method, $params = null)
    {
	    $url = env('BO_URL') . $url;

	    if ((strtoupper($method) != 'GET')) {
		    $ch = curl_init();
		    $curlOpts = [
			    CURLOPT_URL => $url,
			    CURLOPT_HTTPHEADER => [
				    'Accept: application/json',
				    'X-Requested-With: XMLHttpRequest',
				    'x-api-key: ' . env('API_KEY'),
				    'Authorization: Bearer ' . self::getAcToken()
			    ],
			    CURLOPT_RETURNTRANSFER => true
		    ];

		    if ($params != null && array_key_exists('api_token', $params)) {
			    $curlOpts[CURLOPT_HTTPHEADER][] = 'x-api-token: ' . $params['api_token'];
		    }
		    $curlOpts[CURLOPT_POST] = true;
		    $curlOpts[CURLOPT_POSTFIELDS] = ($params != null) ? $params : '';

		    curl_setopt_array($ch, $curlOpts);
		    $res = curl_exec($ch);
	    } else {
		    $res = json_decode(file_get_contents($url));
	    }

	    return $res;
    }
    public static function api1($url, $method, $params = null)
    {
    	$headers = [
		    'x-api-key: ' . env('API_KEY'),
			'x-api-token: ' . $params['api_token']
	    ];
	    $url = env('BO_URL') . $url;

	    if ($params['file'] != null)
	    {
		    $postfields = array(
		        'file' => $params['file'],
			    'player_id' => $params['player_id']
		    );
		    $ch = curl_init();
		    $options = array(
		            CURLOPT_URL => $url,
		            CURLOPT_POST => true,
		            CURLOPT_HTTPHEADER => $headers,
		            CURLOPT_POSTFIELDS => $postfields,
		            CURLOPT_RETURNTRANSFER => true
		        ); // cURL options
		        curl_setopt_array($ch, $options);
		        $res = curl_exec($ch);
		       // var_dump($res);exit;

		        //echo "<pre>";print_r($res);die;
		        if(!curl_errno($ch))
		        {
		            $info = curl_getinfo($ch);
		            if ($info['http_code'] == 200)
		                $errmsg = "File uploaded successfully";
		        }
		        else
		        {
		            $errmsg = curl_error($ch);

		           
		        }
		        curl_close($ch);
		    }
	

	//echo "<pre>";print_r($res);die;
	  //  return $res;
    }

    public function refreshAccessToken()
    {
    	Session::remove('access_token');
    	$this->getAccessToken();
    }

    public static function loginUser($request)
    {
		$url = 'api/v1/player/login';

		return self::api($url, 'POST', $request->toArray());
    }

    public static function getCurrencies()
    {
		$url = 'api/v1/currencies';

	    $res = self::api($url, 'GET', null);
	    if ($res->status == 1) {
		    $result = $res->result;
	    } else {
		    $result = array();
	    }

	    return $result;
    }

    public static function logout()
    {
    	if (Auth::user() != null) {
		    $url = 'api/v1/player/logout';
		    $result = self::api($url, 'POST', array('username' => Auth::user()->username, 'api_token' => Auth::user()->access_token));
		    Auth::user()->access_token = '';
		    Auth::user()->save();
		    Auth::logout();
	    } else {
    		$result = array('status' => 0, 'message' => 'You already logged out');
	    }

		return $result;
    }

	public static function getGamesCount($games_type)
	{
		$agent = new Agent();

		if($agent->isDesktop()){
			$device_type = "desktop";
		} else {
			$device_type = "mobile";
		}

		$url = 'api/v1/games-count/'. $games_type . '/' . $device_type;

		$games = self::api($url, 'GET');

		return $games;
	}

	public static function getAllGames($page_number, $type = 'all')
	{
		$agent = new Agent();

		if($agent->isDesktop()) {
			$device_type = "desktop";
		} else {
			$device_type = "mobile";
		}

		$url = 'api/v1/games/'. $type .'/'. $device_type . '/' . $page_number;

		$games = self::api($url, 'GET');

		return $games;
	}

	public static function getAllGamesAjax($type, $exclude)
	{
		$url = 'api/v1/games-ajax';

		if (is_array($exclude)) {
			$exclude = implode(',', $exclude);
		}
		$games = self::api($url, 'POST', array(
			'type' => $type,
			'exclude' => $exclude
		));

		return $games;
	}

    public static function getIframeUrl($vendor_game_id)
    {
		$url = 'api/v1/game/iframe-url';

		$iframeUrl = self::api($url, 'POST', array('vendor_game_id' => $vendor_game_id));

		return $iframeUrl;
    }

    public static function getGameIframeUrlLogged($vendor_game_id)
    {
	    $url = 'api/v1/game/iframe-url-logged';
	    $iframeUrl = self::api(
	    	$url,
		    'POST',
		    array(
		    	'vendor_game_id' => $vendor_game_id,
			    'api_token' => Auth::user()->access_token
		    )
	    );

	    $result = json_decode($iframeUrl);

	    return $result->result;
    }

    public static function getPlayerInfo($player)
    {
    	$url = 'api/v1/player/info';

    	$playerInfo = self::api($url, 'POST', array('username' => $player->username, 'api_token' => Auth::user()->access_token));

    	return $playerInfo;
    }

    public static function getBonusList($player_id)
    {
    	$url = 'api/v1/player/getBonusList';
	    $getBonusList = array();
    	if (Auth::user() != null) {
		    $getBonusList = self::api($url, 'POST', array('player_id' => $player_id, 'api_token' => Auth::user()->access_token));
		    $getBonusList = json_decode($getBonusList);
	    }

	    return $getBonusList;
    }

    public static function updatePlayer($request)
    {
    	$url = 'api/v1/player/update';
    	$playerId = \Auth::user()->player_id;

	    $playerUpdateBean = array(
		    'name' => $request->name,
//		    'gender' => $request->gender,
		    'dob' => $request->dob,
		    'phone' => $request->phone,
		    'city' => $request->city,
		    'zip' => $request->zip,
		    'address' => $request->address,
		    'api_token' => Auth::user()->access_token,
		    'player_id' => $playerId,
	    );

        $res = self::api($url, 'POST', $playerUpdateBean);

        $player = \App\Player::where('player_id', $playerId)->first();
	    $player->name = $playerUpdateBean['name'];
	    $player->save();

	    return $res;
    }

    public static function getBalanceByPlayerId($id)
    {
    	$url = 'api/v1/player/get-balance';

    	$res = self::api($url, 'POST', array('player_id' => $id, 'api_token' => Auth::user()->access_token));

    	return json_decode($res);

    }

    public static function getFullBalanceByPlayerId($id)
    {
    	$balanceArr = self::getBalanceByPlayerId($id);

    	$computedFullBalance = $balanceArr->result->balance + $balanceArr->result->bonus;

    	return $computedFullBalance;
    }

    public static function uploadDoc($request,$id)
    {
    	$url = 'api/v1/player/addkyc';

    	$curlFile = new \CURLFile($request->file('file'), $request->file('file')->getClientMimeType(), $request->file('file')->getClientOriginalName());

    	$res = self::api1($url, 'POST', array('player_id' => $id, 'file' => $curlFile,'api_token' => Auth::user()->access_token));

    	return json_decode($res);

    }

	public static function getPaymentMethods()
	{
		$url = 'api/v1/payment-methods';

		$res = self::api($url, 'GET');

		if ($res->status > 0) {
			return $res->result;
		}
	}

	public static function getMadePaymentMethods($player_id)
	{
		$url = 'api/v1/made-payment-methods';

		$res = self::api($url, 'POST', array('player_id' => $player_id, 'api_token' => Auth::user()->access_token));
		$result = json_decode($res);



		if ($result->status > 0) {
			return $result->result;
		} else {
			return false;
		}


	}

	public static function getAllGamesCategories()
	{
		$url = 'api/v1/games-categories';

		$res = self::api($url, 'GET');
		if ($res->status == 0) {
			$result = $res->result;
		} else {
			$result = array();
		}

		return $result;
	}

	public static function getGamesVendors($casino_type)
	{
		$url = 'api/v1/games-vendors/' . $casino_type;

        $res = self::api($url, 'GET');

        if ($res->status == 0) {
			$result = $res->result;
		} else {
			$result = array();
		}

		return $result;

	}

	public static function games(Request $request)
	{
		$url = 'api/v1/games';

		$params = array(
            'params' => json_encode($request->toArray())
        );

		if (Auth::user()) {
		    $params['api_token'] = Auth::user()->access_token;
        }
		$res = self::api($url, 'POST', $params);

		return $res;
	}

	public static function getGameObject($vendor_game_id)
    {
        $url = 'api/v1/get-game';

        $res = self::api($url, 'POST', array(
            'vendor_game_id' => $vendor_game_id,
            'logged' => Auth::user() != null ? Auth::user()->access_token : false
        ));

        $result = json_decode($res);

        return $result;
    }

    public static function setCoolingOffPeriod(Request $request)
    {
        $url = 'api/v1/set-cooling-off-period';
        $res = self::api($url, 'POST', array('player_id' => $request->player_id, 'duration' => $request->duration, 'api_token' => Auth::user()->access_token));
//        dd($res);

        $result = json_decode($res);

//        dd($result);

        if ($result->status > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public static function getTrustlyDepoIframeUrl($amount)
    {
        $url = 'api/v1/trustly-depo-iframe-url';

        $res = self::api($url, 'POST', array('amount' => $amount,'player_id' => Auth::user()->player_id,'api_token' => Auth::user()->access_token));

        return $res;
    }

    public static function activatePlayer(\App\Player $player)
    {
        $url = 'api/v1/player/activate';

        $res = self::api($url, 'POST', ['hash' => $player->email_hash, 'email' => $player->email ]);

        $result = json_decode($res);

        return $result;
    }

    public static function updatePlayerPassword(\App\Player $player, $new_password)
    {
        $url = 'api/v1/player/update-password';

        $res = self::api($url, 'POST', ['email' => $player->email, 'new_password' => $new_password ]);

        $result = json_decode($res);

        return $result;
    }

    public static function getGameIframeUrl($game_id, $parameters)
    {
        $url = 'api/v1/games/get-iframe-url';
        $params = [
            'game_id' => $game_id,
        ];
        if (\Auth::user()) {
            $params['api_token'] = \Auth::user()->access_token;
        }

        if (sizeof($parameters) > 0) {
            $params = array_merge($params, $parameters);
        }

        $res = self::api($url, 'POST', $params);

        return $res;
    }

    public static function addGameToFavorites($request, $api_token) {
	    $url = 'api/v1/game/add-to-fav';
	    $params = [
	        'game_id' => $request->game_id,
            'casino_type' => $request->casino_type,
            'api_token' => $api_token
        ];

	    $res = self::api($url, 'POST', $params);

	    return $res;
    }

    public static function getFavoritesGames($request, $player_token) {
	    $url = 'api/v1/player/get-fav-games';

        $params = array(
            'params' => json_encode($request->toArray())
        );

        if (Auth::user()) {
            $params['api_token'] = Auth::user()->access_token;
        }

        $res = self::api($url, 'POST', $params);

        return $res;
    }

    public static function deleteGameFromFavorites($request, $player_token) {
        $url = 'api/v1/game/del-from-fav';
        $params = [
            'game_id' => $request->game_id,
            'casino_type' => $request->casino_type,
            'api_token' => $player_token
        ];

        $res = self::api($url, 'POST', $params);

        return $res;
    }

    public static function getAffiliates($params) {
	    $url = 'api/v1/players/get-affiliates';

	    $res = self::api($url, 'POST', $params);

        return $res;
    }

    public static function getAffiliatesTransactionsData($params) {
        $url = 'api/v1/players/get-affiliates-transactions-data';

        $res = self::api($url, 'POST', $params);

        return $res;
    }

    public static function getGamesByIds($request) {
	    $url = 'api/v1/games/get-games-by-ids';

	    $params = [
	        'game_id' => $request->game_id
        ];

	    $res = self::api($url, 'POST', $params);

	    return $res;
    }

    public static function createSupportTicket(Request $request) {
	    $url = 'api/v1/live-chat/create-ticket';

	    $params = $request->toArray();

	    $res = self::api($url, 'POST', $params);

	    return $res;
    }

    public static function getPlayerPaymentHistory() {
        if (\Auth::user() == null) {
            $result = array('status' => 0, 'message' => 'player is not logged in');
        } else {
            $url = 'api/v1/player/payment-history';
            $params = array(
                'player_id' => \Auth::user()->player_id,
                'api_token' => \Auth::user()->access_token
            );

            $result = self::api($url, 'POST', $params);
        }

        return json_decode($result);
    }

    public static function checkPlayerExists(Request $request) {
	    $url = 'api/v1/player/check-if-exists';
	    $params = array(
	        'username' => $request->username,
            'password' => $request->password
        );

	    $result = self::api($url, 'POST', $params);

	    return $result;
    }
}