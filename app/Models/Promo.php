<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = "promo";
    use HasFactory;
    protected $fillable = [
        'id','promo','gambar','exp_promo','diskon','valid'
    ];
    
}
