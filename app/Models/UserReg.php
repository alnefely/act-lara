<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReg extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function indicator()
    {
        return $this->hasOne('App\Models\Indicator', 'id', 'indicator_id');
    }

    public function standard()
    {
        return $this->hasOne('App\Models\Standard', 'id', 'standard_id');
    }
    
    public function evidence()
    {
        return $this->hasOne('App\Models\Evidence', 'id', 'evidence_id');
    }
    
    public function governor1()
    {
        return $this->hasOne('App\Models\Governor', 'id', 'governor_id1');
    }
    public function governor2()
    {
        return $this->hasOne('App\Models\Governor', 'id', 'governor_id2');
    }
    public function governor3()
    {
        return $this->hasOne('App\Models\Governor', 'id', 'governor_id3');
    }

}
