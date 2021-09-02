<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projuser extends Model
{
    use HasFactory;
    protected $fillable = ['projet_id', 'user_id'];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
