<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'genre',
        'founded',
        'active_till',
    ];

    // Relatie met albums
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
