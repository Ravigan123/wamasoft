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
        Schema::create('configValues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('configKeys_id')->constrained()->onDelete('cascade');
            $table->string('value_name',40);
            $table->string('value_worth');
            $table->enum('type', ['text', 'array', 'json']);
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
        Schema::dropIfExists('configValues');
    }
};
