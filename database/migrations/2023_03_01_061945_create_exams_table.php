<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('dekskripsi')->nullable();
            $table->integer('topic_id')->nullable();
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('time')->nullable();
            $table->integer('point')->nullable();
            $table->string('token')->nullable();
            $table->string('status');
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
        Schema::drop('exams');
    }
}
