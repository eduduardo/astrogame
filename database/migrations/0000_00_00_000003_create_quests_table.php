<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('title');
            $table->smallInteger('type')->default(1); // (1 = normal / 2 = chapter / 3 = diária)
            $table->text('description');
            $table->text('objetivos')->nullable();
            $table->text('recompensas')->nullable();
            $table->integer('xp_reward')->nullable();
            $table->integer('money_reward')->nullable();
            $table->integer('insigna_reward')->nullable();
            $table->integer('min_level')->default(1);
            $table->integer('max_level')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quests');
    }
}
