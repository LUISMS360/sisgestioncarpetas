<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notificacion extends Model
{
    protected $fillable = [
        'user_id',
        'titulo',
        'contenido', 
        'emisor_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function emisor(){
        return $this->belongsTo(User::class,'emisor_id','id');
    }
}
