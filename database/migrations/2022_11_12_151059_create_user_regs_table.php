<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_regs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('standard_id')->unsigned();
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade')->onUpdate('cascade');
            
            // $table->bigInteger('indicator_id')->unsigned()->nullable();
            // $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade')->onUpdate('cascade');
            
            // $table->bigInteger('evidence_id')->unsigned()->nullable();
            // $table->foreign('evidence_id')->references('id')->on('evidence')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('governor_id1')->unsigned()->nullable(); // المحكم
            $table->foreign('governor_id1')->references('id')->on('governors')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('governor_id2')->unsigned()->nullable(); // المحكم
            $table->foreign('governor_id2')->references('id')->on('governors')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('governor_id3')->unsigned()->nullable(); // المحكم
            $table->foreign('governor_id3')->references('id')->on('governors')->onDelete('cascade')->onUpdate('cascade');
            
            // $table->integer('degree')->nullable(); // المحكم

            $table->string('url', 150);
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
        Schema::dropIfExists('user_regs');
    }
}
