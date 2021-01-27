<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('shop_title');
            $table->string('hotline')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->text('about');
            $table->string('address');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('rss');
            $table->string('youtube');
            $table->string('pinterest');
            $table->string('google-plus');
            $table->string('skype');
            $table->string('vimeo');
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
        Schema::dropIfExists('settings');
    }
}
