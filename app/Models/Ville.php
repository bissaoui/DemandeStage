<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ville extends Model
{
    protected $fillable = ['nomVille'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
