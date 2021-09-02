<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    use HasFactory;
    protected $fillable = ['nomTechnologie'];


    public function projettech()
    {
        return $this->belongsTo(Projtech::class, 'id', 'technologie_id');
    }
}
