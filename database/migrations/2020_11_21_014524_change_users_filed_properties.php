<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersFiledProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('address_one')->nullable()->change();
            $table->longText('address_two')->nullable()->change();
            $table->integer('privinces_id')->nullable()->change();
            $table->integer('regencies_id')->nullable()->change();
            $table->integer('zip_code')->nullable()->change();
            $table->string('phone_number')->nullable()->change();
            $table->string('store_name')->nullable()->change();
            $table->integer('categories_id')->nullable()->change();
            $table->string('store_status')->nullable()->change();
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
            $table->longText('address_one')->nullable(false);
            $table->longText('address_two')->nullable(false);
            $table->integer('privinces_id')->nullable(false);
            $table->integer('regencies_id')->nullable(false);
            $table->integer('zip_code')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('store_name')->nullable(false);
            $table->integer('categories_id')->nullable(false);
            $table->string('store_status')->nullable(false);
        });
    }
}
