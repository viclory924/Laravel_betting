<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Player extends Authenticatable
{
    public static function createPlayer($request)
    {
	    $player = new self();
	    $player->username = $request->username;
	    $player->email = $request->email;
	    $player->name = isset($request->name) ? $request->name : $request->username;
	    $player->password = bcrypt($request->password);
	    $player->access_token = '';
	    $player->balance = 0;
	    $player->save();

		return $player;
    }

    public function updateBalance()
    {
	    $bo = new StaygamingBO();

	    $newBalance = $bo->getBalanceByPlayerId($this->player_id);

	    $balance = json_decode($newBalance);

	    if ($balance->status > 0 )

	    var_dump($newBalance);exit;

//	    if ()

//	    dd();
    }

    public function getBalanceAttribute($value)
    {
	    $playerInfo = json_decode(StaygamingBO::getPlayerInfo($this));
	    if ($playerInfo->status > 0 && isset($playerInfo->result)) {
			$playerInfo = $playerInfo->result;
	    }

	    if ($value != $playerInfo->balance) {
		    $this->setAttribute('balance', $playerInfo->balance);
		    $this->save();
	    }

	    return $this->attributes['balance'];
    }
}
