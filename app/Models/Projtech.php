<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projtech extends Model
{
    use HasFactory;
    protected $fillable = ['projet_id', 'technologie_id'];

    public function projet()
    {
        return $this->hasMany(Projet::class);
    }
    public function tech()
    {
        return $this->hasMany(Technologie::class);
    }
}
