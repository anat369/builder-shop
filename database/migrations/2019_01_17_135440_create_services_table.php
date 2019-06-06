<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 400);
            $table->string('slug', 400)->unique();
            $table->string('logo')->nullable();
            $table->string('description', 1000);
            $table->text('content');
            $table->string('meta_title', 300);
            $table->string('meta_description', 300);
            $table->string('meta_keywords', 300);
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
