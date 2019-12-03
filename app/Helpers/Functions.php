<?php
namespace app\Helpers;

use App\StaygamingBO;

class Functions {

	public static function getCurrencies()
	{
		$currencies = StaygamingBO::getCurrencies();

		return $currencies;
	}

	public static function getCountries()
	{
		$countries = StaygamingBO::getCountries();

		return $countries;
	}


	public static function getGameVendors($casino_type = 'casino')
	{
		$games_vendors = StaygamingBO::getGamesVendors($casino_type);

		return $games_vendors;
	}

	public static function getBonusesList()
	{
        $bonuses = [];
        if (\Auth::user() != null) {
            $bonuses = StaygamingBO::getBonusList(\Auth::user()->player_id);
            if($bonuses->status=='1'){
				$bonuses = $bonuses->result;
			}else{
				$bonuses = [];
			}
		}

		return $bonuses;
	}

	public static function getDepositUrl()
	{
		//env('BO_URL') . "payment/pay/" . $user_id . "/" . $amount  . "/" . $bonus_id . "/1/" . $payment_method;
		$url = env('BO_URL') . "payment/pay/" . \Auth::user()->player_id . DIRECTORY_SEPARATOR;
		return $url;
	}

	public static function getPlayerInfo()
	{
        //$player_id = \Auth::user()->player_id;
        $player_info = StaygamingBO::getPlayerInfo(\Auth::user());
        $player_obj = json_decode($player_info);
        if ($player_obj->status > 0) {
//            var_dump($player_obj->result);exit;
            return $player_obj->result;
		} else {
			return null;
		}

	}

	public static function displayBalance($balance_obj) {

	    $result = '';
	    $amount = explode('.', $balance_obj->result->balance);
	    $result .= '<span class="sum">';
	    $result .= $amount['0'] . '. <span style="font-size:12px;">' . $amount['1'] .' <span style="font-size: 16px;">'. $balance_obj->result->currency .'</span></span> ';

	    return $result;
    }

    public static function getPlayerPaymentHistory() {

	    $res = \App\StaygamingBO::getPlayerPaymentHistory();

	    if (isset($res->status) && $res->status > 0) {
	        return $res->result;
        } else {
	        return json_decode(json_encode(array('status' => 0, 'result' => [])));
        }
	}
}