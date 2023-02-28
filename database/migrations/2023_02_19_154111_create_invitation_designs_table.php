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
        Schema::create('invitation_designs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('categories_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('Undangan Pernikahan Digital');
            $table->integer('price');
            $table->string('code_view');
            $table->string('code_demo');
            $table->string('cover_one');
            $table->string('cover_two');
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
        Schema::dropIfExists('invitation_designs');
    }
};
