<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCalendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_calenders', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('student_id')->unsigned();
			$table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
			$table->string('title');
		    $table->text('description');
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
        Schema::dropIfExists('school_calenders');
    }
}
