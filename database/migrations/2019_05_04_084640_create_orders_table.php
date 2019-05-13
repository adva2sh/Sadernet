<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('destination');
            $table->boolean('tremp');
            $table->string('userspay');
            $table->boolean('autopay');
            // status:
            // 1. בהמתנה
            // 2. אושר
            // 3. נלקח מפתח
            // 4. הוחזר מפתח
            $table->string('status');
            $table->integer('userid');
            $table->string('car_number')->nullable();
            $table->string('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
