<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name');
            $table->string('number');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('fax');
            $table->string('contact');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('contact_fax');
            $table->string('contact_position');
            $table->string('contact_department');
            $table->string('contact_address');
            


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
        Schema::dropIfExists('purchases');
    }
}
