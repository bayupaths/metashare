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
        Schema::create('bridegrooms', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('invitations_id')->unsigned();
            $table->string('bride_name');
            $table->string('bride_nickname');
            $table->string('bride_address');
            $table->string('bride_instagram');
            $table->string('bride_photos')->nullable();
            $table->integer('bride_daughter');
            $table->string('bride_father');
            $table->string('bride_mother');
            $table->string('groom_name');
            $table->string('groom_nickname');
            $table->string('groom_address');
            $table->string('groom_instagram');
            $table->string('groom_photos')->nullable();
            $table->integer('groom_son');
            $table->string('groom_father');
            $table->string('groom_mother');
            $table->softDeletes();
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
        Schema::dropIfExists('bridegrooms');
    }
};
