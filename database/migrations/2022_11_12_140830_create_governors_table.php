<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governors', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50); // اسم المحكم
            $table->string('username',30)->unique(); // 
            $table->string('phone', 11); //جوال المحكم
            $table->string('manger_name',50); // اسم الادراة
            $table->string('password',64); // 

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
        Schema::dropIfExists('governors');
    }
}
