<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    public function standard()
    {
        return $this->hasOne('App\Models\Standard', 'id', 'standard_id');
    }
}
