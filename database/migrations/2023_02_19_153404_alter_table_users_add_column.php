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
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->after('id');
            $table->string('phone_number')->nullable()->after('password');
            $table->longText('address')->nullable()->after('phone_number');
            $table->integer('provinces_id')->nullable()->after('address');
            $table->integer('regencies_id')->nullable()->after('provinces_id');
            $table->string('country')->nullable()->after('regencies_id');
            $table->string('photos')->nullable()->after('country');
            $table->string('code')->nullable()->after('photos');
            $table->enum('roles', ['CUSTOMER', 'ADMIN', 'SUPER_ADMIN'])->default('CUSTOMER')->after('code');
            $table->integer('status')->default(1)->after('roles');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('provinces_id');
            $table->dropColumn('regencies_id');
            $table->dropColumn('country');
            $table->dropColumn('photos');
            $table->dropColumn('code');
            $table->dropColumn('roles');
            $table->dropColumn('status');
            $table->dropSoftDeletes();
        });
    }
};
