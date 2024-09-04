<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->string('cross_ref')->after('user_id');
            $table->double('crossref_buy_price', 8, 2)->default(0)->after('cross_ref');
            $table->string('grades')->after('crossref_buy_price');
            $table->time('delivery_time')->after('grades');
            $table->string('add_to_range', 3)->default('Yes')->after('delivery_time');
            $table->string('hold_stock', 3)->default('Yes')->after('add_to_range');
            $table->double('target_buy_price', 8, 2)->default(0)->after('hold_stock');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn([
                'cross_ref',
                'crossref_buy_price',
                'grades',
                'delivery_time',
                'add_to_range',
                'hold_stock',
                'target_buy_price'
            ]);
        });
    }
}
