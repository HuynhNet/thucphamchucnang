<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $translatable = ['date', 'start_date', 'name', 'end_date', 'value'];
    protected $table = 'promotion';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'date', 'start_date', 'name', 'end_date', 'value'
    ];

    public $timestamps = true;

    public function price(){
        return $this->belongsTo('App\Models\Price');
    }
}
