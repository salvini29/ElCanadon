<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Futbol5 extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id','fecha', 'hora', 'pagado'
    ];
}
