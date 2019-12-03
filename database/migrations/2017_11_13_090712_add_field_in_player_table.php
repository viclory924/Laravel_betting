<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldInPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('players', function (Blueprint $table) {
			$table->integer('player_id')->after('access_token')->default('0');
		});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('players', function (Blueprint $table) {
		    $table->dropColumn( 'player_id' );
	    });
    }
}
