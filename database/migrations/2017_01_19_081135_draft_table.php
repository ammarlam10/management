<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('sale_drafts', function (Blueprint $table) {
//            $table->integer('sales_order_id')->unsigned();
//            $table->integer('party');
//            $table->integer('lot_no')->unsigned();
//            $table->integer('design')->unsigned();
//            $table->integer('quantity');
//            $table->integer('rate');
//            $table->integer('type');
//            $table->integer('is_deleted');
//            $table->primary(array('sales_order_id'));
//           // $table->foreign('sales_order_id')->references('id')->on('sales_order')->onDelete('cascade');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
