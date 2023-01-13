<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); 
            $table->string('email', 50)->unique(); 
            $table->string('password', 64); //
            $table->string('school_name', 50); //

            $table->string('manger_name', 50); // اسم مدير المدرسة
            $table->string('manger_phone', 10);
            $table->string('owner_phone', 10); // جوال المشارك
            // $table->string('captin_name', 50); // اسم رائد النشاط
            // $table->string('captin_phone', 10); //
            $table->integer('status')->default(0);

            $table->enum('gender', ['ذكر', 'انثي']);
            $table->enum('type', ['كبار', 'صغار']);
            
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('education_id')->unsigned();
            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade')->onUpdate('cascade');
            
            
            $table->enum('edit', ['enable', 'disable'])->default('enable'); // تعديل المشاركة ام لا
            
            $table->string('member1', 50)->nullable();  
            $table->date('member1_date')->nullable();
            $table->string('member2', 50)->nullable();  
            $table->date('member2_date')->nullable();
            $table->string('member3', 50)->nullable();  
            $table->date('member3_date')->nullable();
            $table->string('member4', 50)->nullable();  
            $table->date('member4_date')->nullable();
            $table->string('member5', 50)->nullable();  
            $table->date('member5_date')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
