<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('last_name');
			$table->string('phone');
			$table->string('address');
			$table->string('address_2');
			$table->string('city');
			$table->string('state');
			$table->string('job');
			$table->string('salary_range')->nullable();
			$table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
