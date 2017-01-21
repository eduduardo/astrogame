<?php

use Illuminate\Database\Migrations\Migration;

class ChangeItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('items', function ($table) {
            $table->integer('max_stack')->default(1)->change();
            $table->smallInteger('category')->default(1);
            $table->text('text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('items', function ($table) {
            $table->integer('max_stack')->default(0)->change();
            $table->dropColumn(['category', 'text']);
        });
    }
}
