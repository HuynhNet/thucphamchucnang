<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $translatable = ['date', 'price'];
    protected $table = 'prices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'date', 'price'
    ];

    public $timestamps = true;
}
