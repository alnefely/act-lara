<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)->index();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('main', ['normal', 'main'])->default('normal');
            $table->string('info', 255)->nullable();
            $table->string('img', 100)->nullable();
            $table->rememberToken();
            $table->string('facebook', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('youtube', 255)->nullable();

            // المحكم
            // $table->string('name', 50); // اسم المحكم
            // $table->string('phone', 50); //جوال المحكم
            // $table->string('manger_name',); // اسم الادراة
            // $table->string('username',); // اسم الادراة
            // $table->string('password',); // اسم الادراة

            //المشارك
            // $table->string('name', 50); // 
            // $table->string('email', 50)->unique(); 
            // $table->string('password', 50); // 
            // $table->string('school_name', 255); //
            // $table->string('manger_name', 255); // اسم مدير المدرسة
            // $table->string('manger_phone', 255);
            // $table->string('owner_phone', 255); // جوال المشارك
            // $table->string('captin_name', 255); // اسم رائد النشاط
            // $table->string('captin_phone', 255); //
            // $table->string('category_id', 255); //
            // $table->enum('edit', ['enable', 'disable'])->default('enable'); // تعديل المشاركة ام لا

            

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
        Schema::dropIfExists('admins');
    }
}
