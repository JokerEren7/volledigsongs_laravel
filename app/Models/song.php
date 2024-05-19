<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    use HasFactory;

    protected $table = 'songs';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    public $timestamps = true;
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    use HasFactory;
    protected $fillable = [
        'title', 
        'singer',
    ];
    
    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
    

}

  
    


