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
        Schema::create('user_limit', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->smallInteger('type')->default(0);
            $table->smallInteger('article')->default(0);
            $table->smallInteger('video')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_limit');
    }
};
