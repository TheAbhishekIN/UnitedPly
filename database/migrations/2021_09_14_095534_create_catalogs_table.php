<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->integer('dealer_id');
            $table->integer('category_id');
            $table->integer('series')->nullabe();
            $table->string('name');
            $table->string('brand_name');
            $table->string('thickness')->nullabe();
            $table->string('sort_code')->nullabe();
            $table->text('file')->nullabe();
            $table->string('file_type')->nullabe();
            $table->string('status')->nullabe();
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
        Schema::dropIfExists('catalogs');
    }
}
