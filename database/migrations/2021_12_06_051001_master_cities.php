<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('master_cities');
        if (!Schema::hasTable('master_cities')) {
            Schema::create('master_cities', function (Blueprint $table) {
                $table->id();
                $table->string('city_name');
                $table->string('city_code');
                $table->boolean('status');
                $table->timestamp('created_at');
                $table->timestamp('updated_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
