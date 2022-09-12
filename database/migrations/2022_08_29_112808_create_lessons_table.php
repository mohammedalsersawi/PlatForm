<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name_lesson');
            $table->string('number_lesson');
            $table->string('name_Unit');
            $table->string('testlinke');
            $table->string('video')->nullable();
            $table->string('not')->nullable();
            $table->string('not_solve')->nullable();
            $table->foreignId('section_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('clases_id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('lessons');
    }
}
