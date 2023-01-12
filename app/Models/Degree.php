<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;


    public function governor()
    {
        return $this->hasOne('App\Models\Governor', 'id', 'governor_id');
    }

    public function indicator()
    {
        return $this->hasOne('App\Models\Indicator', 'id', 'indicator_id');
    }

    public function evidence()
    {
        return $this->hasOne('App\Models\Evidence', 'id', 'evidence_id');
    }

}
