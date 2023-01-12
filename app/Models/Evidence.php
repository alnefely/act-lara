<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
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
    
    public function UserReg()
    {
        return $this->hasOne('App\Models\UserReg', 'evidence_id', 'id');
    }

}
