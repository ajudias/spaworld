<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catg_id')->unsigned();
            $table->bigInteger('sub_catg_id')->unsigned()->nullable(true);
            $table->string('service_code',20)->unique();
            $table->string('service_name',50)->unique();
            $table->text('short_description')->nullable(true);
            $table->text('long_description')->nullable(true);
            $table->decimal('service_value',12,2)->nullable(true);
            $table->text('keywords')->nullable(true);
            $table->string('url_slug',100)->unique();
            $table->integer('disp_order')->default(0)->nullable(true);
            $table->string('thump_image')->nullable(true);  
            $table->string('image1')->nullable(true);  
            $table->string('image2')->nullable(true);  
            $table->string('image3')->nullable(true);  
            $table->string('image4')->nullable(true);  
            $table->string('image5')->nullable(true);  
            $table->string('thump_alt')->nullable(true);  
            $table->string('image1_alt')->nullable(true);  
            $table->string('image2_alt')->nullable(true);  
            $table->string('image3_alt')->nullable(true);  
            $table->string('image4_alt')->nullable(true);  
            $table->string('image5_alt')->nullable(true);  
            $table->foreign('catg_id')->references('id')->on('ser_categories')->onDelete('restrict');
            //$table->foreign('sub_catg_id')->references('id')->on('ser_sub_categories')->onDelete('restrict');
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
        Schema::dropIfExists('services');
    }
}
