<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateInsertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('groups')->insert([
            [
                'id' => 1,
                'group_name'=> 'صلاحية كاملة',
                'main' => 'main',
                'admin_show'=> 'enable',
                'admin_create'=> 'enable',
                'admin_edit'=> 'enable',
                'admin_delete'=> 'enable',
                'group_show'=> 'enable',
                'group_create'=> 'enable',
                'group_edit'=> 'enable',
                'group_delete'=> 'enable',
                'setting_show'=> 'enable',
                'setting_edit'=> 'enable',
                'filemanager_show'=> 'enable',
                'profile_edit'=> 'enable',
                'error'=> 'enable',
                'home'=> 'enable',

                'category_show' => 'enable',
                'category_create' => 'enable',
                'category_edit' => 'enable',
                'category_delete' => 'enable',
                'standard_show' => 'enable',
                'standard_create' => 'enable',
                'standard_edit' => 'enable',
                'standard_delete' => 'enable',
                'indicator_show' => 'enable',
                'indicator_create' => 'enable',
                'indicator_edit' => 'enable',
                'indicator_delete' => 'enable',
                'evidence_show' => 'enable',
                'evidence_create' => 'enable',
                'evidence_edit' => 'enable',
                'evidence_delete' => 'enable',
                
                'user_show' => 'enable',
                'user_create' => 'enable',
                'user_edit' => 'enable',
                'user_delete' => 'enable',
                
                'governor_show' => 'enable',
                'governor_create' => 'enable',
                'governor_edit' => 'enable',
                'governor_delete' => 'enable',

                'adding_document_show' => 'enable',
                'adding_document_create' => 'enable',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('admins')->insert([
            [
                'name'=>'Abdo Mohamed',
                'email'=>'admin@admin.com',
                'password'=> Hash::make(123456),
                'facebook'=>'https://www.facebook.com/alnefelys',
                'main'=>'main',
                'group_id'=> 1,
                'email_verified_at'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Male',
                'email'=>'admin2@admin.com',
                'password'=> Hash::make(123456),
                'facebook'=>'https://www.facebook.com/alnefelys',
                'main'=>'male',
                'group_id'=> 1,
                'email_verified_at'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Female',
                'email'=>'admin3@admin.com',
                'password'=> Hash::make(123456),
                'facebook'=>'https://www.facebook.com/alnefelys',
                'main'=>'female',
                'group_id'=> 1,
                'email_verified_at'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);

        DB::table('settings')->insert([
            [
                'id' => 1,
                'site_name' => 'إســـم الموقع يكتب هنا',
                'site_description' => 'وصف الموقع لمحرك البحث يجب أن لا يقل عن 50حرف ولا يزيد عن 255 حرف',
                'phone' => '+201021464469',
                'site_logo' => 'site logo',
                'site_icon' => 'site icon',
                'email' => 'thebeststory0@gmail.com',
                'facebook' => 'https://www.facebook.com/alnefelys',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        DB::table('categories')->insert([
            [
                'name' => 'فئة تجريبية',
                'type' => 'كبار',
                'created_at' => now(),
            ],
            [
                'name' => 'فئة صغار',
                'type' => 'صغار',
                'created_at' => now(),
            ],
        ]);
        DB::table('standards')->insert([
            [
                'name' => 'معيار تجريبي',
                'category_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'معيار 2',
                'category_id' => 1,
                'created_at' => now(),
            ],
        ]);
        DB::table('indicators')->insert([
            [
                'name' => 'مؤشر تجريبي',
                'category_id' => 1,
                'standard_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'مؤشر 2',
                'category_id' => 1,
                'standard_id' => 1,
                'created_at' => now(),
            ],
        ]);
        DB::table('evidence')->insert([
            [
                'name' => 'شاهد1',
                'category_id' => 1,
                'standard_id' => 1,
                'indicator_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'شاهد2',
                'category_id' => 1,
                'standard_id' => 1,
                'indicator_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'شاهد3',
                'category_id' => 1,
                'standard_id' => 1,
                'indicator_id' => 1,
                'created_at' => now(),
            ],
            [
                'name' => 'شاهد4',
                'category_id' => 1,
                'standard_id' => 1,
                'indicator_id' => 1,
                'created_at' => now(),
            ],
        ]);
        DB::table('education')->insert([
            [
                'name' => 'الرياض',
                'created_at' => now(),
            ],
            [
                'name' => 'جدة',
                'created_at' => now(),
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'عبدالرحمن محمد',
                'email' => 'u@u.com',
                'school_name' => 'school name',
                'manger_name' => 'اسم المدرب',
                'manger_phone' => '1021464469',
                'owner_phone' => '1021464469',
                'education_id' => 1,
                'status' => 1,
                'category_id' => 1,
                'password'=> Hash::make(123456),
                'created_at' => now(),
            ]
        ]);

        DB::table('governors')->insert([
            [
                'name' => 'محكم رقم 1',
                'username' => 'm1',
                'phone' => '1021464469',
                'manger_name' => 'اسم الادراة',
                'password'=> Hash::make(123456),
                'created_at' => now(),
            ],
            [
                'name' => 'محكم رقم 2',
                'username' => 'm2',
                'phone' => '1270947759',
                'manger_name' => 'اسم الادراة',
                'password'=> Hash::make(123456),
                'created_at' => now(),
            ],
            [
                'name' => 'محكم رقم 3',
                'username' => 'm3',
                'phone' => '1055222555',
                'manger_name' => 'اسم الادراة',
                'password'=> Hash::make(123456),
                'created_at' => now(),
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
