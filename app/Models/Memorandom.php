<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorandom extends Model
{
    protected $table = "memorandus";
    protected $fillable = [
        'profesor_id',
        'asunto',
        'modulo'
    ];
    public function profesor(){
        return $this->belongsTo(User::class,'profesor_id','id');
    }
}
