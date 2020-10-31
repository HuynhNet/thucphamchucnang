<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Origin extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['country', 'company'];
    protected $table = 'origin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'country', 'company'
    ];

    public $timestamps = true;
}
