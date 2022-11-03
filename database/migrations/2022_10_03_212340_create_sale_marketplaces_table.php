<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_marketplaces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('cant');
            $table->string('total_paid')->nullable();
            $table->string('status');
            $table->string('observation')->nullable();
  
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('marketplace_id');
            $table->foreign('marketplace_id')->references('id')->on('marketplaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_marketplaces');
    }
};
