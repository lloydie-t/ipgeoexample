<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geoips', function (Blueprint $table) {
            $table->id();
            $table->char('ip_address', 20);
            $table->char('iso_code',10);
            $table->char('country_code',10);
            $table->string('country_name');
            $table->string('town')->nullable();
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
        Schema::dropIfExists('geoip');
    }
}
