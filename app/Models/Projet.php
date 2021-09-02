<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    public function projetuser()
    {
        return $this->hasMany(Projuser::class);
    }
    public function projettech()
    {
        return $this->hasMany(Projtech::class);
    }
}
