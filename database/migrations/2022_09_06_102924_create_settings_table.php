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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('logo.png');
            $table->string('fav_icon')->default('fav_icon');
            $table->string('cv');
            $table->string('number');
            $table->string('email');
            $table->string('address');
            $table->string('name');
            $table->string('banner_name');
            $table->string('banner_title');
            $table->longText('banner_description');
            $table->longText('banner_photo');
            $table->string('calendly_button_name');
            $table->longText('calendly_code');
            $table->string('about_title');
            $table->longText('about_description');
            $table->string('about_image');
            $table->string('meta_author');
            $table->json('meta_keywords')->nullable();
            $table->longText('meta_description');
            $table->string('meta_photo');
            $table->string('contact_info');
            $table->string('copyright');
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
};
