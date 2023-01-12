<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('governor_id')->unsigned();
            $table->foreign('governor_id')->references('id')->on('governors')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('reg_id')->unsigned();
            $table->foreign('reg_id')->references('id')->on('user_regs')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('indicator_id')->unsigned()->nullable();
            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('evidence_id')->unsigned()->nullable();
            $table->foreign('evidence_id')->references('id')->on('evidence')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('degree')->default(0);

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
        Schema::dropIfExists('degrees');
    }
}
