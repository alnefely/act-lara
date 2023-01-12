<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();

            $table->string('group_name', 100);
            $table->enum('main', ['normal', 'main'])->default('normal');

            $table->enum('admin_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('admin_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('admin_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('admin_delete', ['enable', 'disable'])->default('disable')->nullable();

            $table->enum('group_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('group_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('group_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('group_delete', ['enable', 'disable'])->default('disable')->nullable();


            $table->enum('setting_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('setting_edit', ['enable', 'disable'])->default('disable')->nullable();

            $table->enum('filemanager_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('profile_edit', ['enable', 'disable'])->default('disable')->nullable();


            ////
            $table->enum('category_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('category_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('category_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('category_delete', ['enable', 'disable'])->default('disable')->nullable();

            $table->enum('standard_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('standard_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('standard_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('standard_delete', ['enable', 'disable'])->default('disable')->nullable();

            $table->enum('indicator_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('indicator_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('indicator_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('indicator_delete', ['enable', 'disable'])->default('disable')->nullable();

            $table->enum('evidence_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('evidence_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('evidence_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('evidence_delete', ['enable', 'disable'])->default('disable')->nullable();
            
            $table->enum('user_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('user_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('user_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('user_delete', ['enable', 'disable'])->default('disable')->nullable();
            
            $table->enum('governor_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('governor_create', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('governor_edit', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('governor_delete', ['enable', 'disable'])->default('disable')->nullable();
            
            
            $table->enum('adding_document_show', ['enable', 'disable'])->default('disable')->nullable();
            $table->enum('adding_document_create', ['enable', 'disable'])->default('disable')->nullable();
            ///


            $table->enum('error', ['enable', 'disable'])->default('enable')->nullable();
            $table->enum('home', ['enable', 'disable'])->default('enable')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
