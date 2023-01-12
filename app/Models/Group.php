<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    public function admins()
    {
        return $this->hasMany('App\Models\Admin', 'group_id', 'id');
    }
}
