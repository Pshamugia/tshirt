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
        Schema::table('kultura_cxrili', function (Blueprint $table) {
            $table->text('satauri_ka')->nullable()->change();
            $table->text('satauri_en')->nullable()->change();
            $table->text('agwera_ka')->nullable()->change();
            $table->text('agwera_en')->nullable()->change();
            $table->longText('full_ka')->nullable()->change();
            $table->longText('full_en')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kultura_cxrili', function (Blueprint $table) {
            $table->string('satauri_ka')->nullable()->change();
            $table->string('satauri_en')->nullable()->change();
            $table->string('agwera_ka')->nullable()->change();
            $table->string('agwera_en')->nullable()->change();
            $table->string('full_ka')->nullable()->change();
            $table->string('full_en')->nullable()->change();
        });
    }
};
