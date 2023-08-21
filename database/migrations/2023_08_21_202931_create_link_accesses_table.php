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
        Schema::create('link_accesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('link_id');
            $table->ipAddress('ip');
            $table->text('user_agent');
    
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
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
        Schema::dropIfExists('link_accesses');
    }
};
