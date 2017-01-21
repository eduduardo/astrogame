<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nickname')->nullable();
            $table->string('password', 60);
            $table->string('provider_user_id', 255)->nullable();
            $table->smallInteger('provider_id')->nullable(); // 1 = facebook, 2 = google
            $table->unique(['provider_user_id', 'provider_id']);
            $table->smallInteger('type')->deafult(1); // (1 = normal / 2 = game master / 3 = admin)
            $table->smallInteger('gender'); // 1 = male, 2 = female
            $table->mediumInteger('level')->default(1);
            $table->integer('xp')->default(0);
            $table->integer('money')->default(0);
            $table->boolean('online')->default(false);
            $table->integer('total_time')->default(0);
            $table->boolean('confirmed')->default(false);
            $table->string('confirm_code')->unique()->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
