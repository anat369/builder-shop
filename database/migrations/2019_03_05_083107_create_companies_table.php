<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 300);
            $table->string('logo');
            $table->string('description', 2000);
            $table->text('content');
            $table->string('address', 600);
            $table->string('work_time', 300);
            $table->string('phone');
            $table->string('email');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('vkontakte');
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
        Schema::dropIfExists('companies');
    }
}
