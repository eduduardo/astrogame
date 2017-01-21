<?php

use Illuminate\Database\Migrations\Migration;

class ChangeInsginaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insignas', function ($table) {
            $table->string('how')->nullable();
            $table->renameColumn('img_url', 'key');
        });

        Schema::table('quests', function ($table) {
            $table->string('insigna_reward')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insignas', function ($table) {
            $table->renameColumn('key', 'img_url');
            $table->dropColumn('how');
        });
    }
}
