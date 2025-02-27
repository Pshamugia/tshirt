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
        Schema::create('kultura_cxrili', function (Blueprint $table) {
            $table->id();
            $table->string('kategory')->nullable();
            $table->string('subkat')->nullable();
            $table->string('upload')->nullable();
            $table->string('upload2')->nullable();
            $table->string('upload3')->nullable();
            $table->string('upload4')->nullable();
            $table->string('upload5')->nullable();
            $table->string('upload6')->nullable();
            $table->string('upload7')->nullable();
            $table->string('upload8')->nullable();
            $table->string('upload9')->nullable();
            $table->string('satauri_ka')->nullable();
            $table->string('satauri_en')->nullable();
            $table->string('avtori')->nullable();
            $table->string('avtori2')->nullable();
            $table->string('agwera_ka')->nullable();
            $table->string('agwera_en')->nullable();
            $table->string('full_ka')->nullable();
            $table->string('full_en')->nullable();
            $table->string('date')->nullable();
            $table->integer('pos')->nullable();
            $table->integer('view_count')->nullable();
            $table->integer('week_view_count')->nullable();
            $table->string('eng_geo')->nullable();
            $table->string('img_description')->nullable();
            $table->string('ena')->nullable();
            $table->string('menu')->nullable();
            $table->integer('news_date')->nullable();
            $table->string('linki')->nullable();
            $table->string('hour')->nullable();
            $table->string('tags_geo')->nullable();
            $table->string('tags_eng')->nullable();
            $table->integer('hidden')->nullable();
            $table->integer('editor')->nullable();
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
        Schema::dropIfExists('kultura_cxrili');
    }
};
