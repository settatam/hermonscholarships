<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('parent_id')->unsigned();
			$table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->nullable();//this refrences the user/sponsors table
			$table->string('name');
			$table->string('last_name');
			$table->string('description');
			$table->string('grade');
			$table->string('amount_raised')->nullable();
			$table->string('amount');
			$table->string('date_of_birth');
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
        Schema::dropIfExists('students');
    }
}
