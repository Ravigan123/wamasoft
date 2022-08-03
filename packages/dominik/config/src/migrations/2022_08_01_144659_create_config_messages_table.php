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
        Schema::create('config_messages', function (Blueprint $table) {
            $table->id();
            $table->string("user",20)->nullable();
            $table->string("sender",20);
            $table->text("message");
            $table->string("receiver",20);
            $table->dateTime("time");
            $table->integer("status");
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
        Schema::dropIfExists('config_messages');
    }
};
