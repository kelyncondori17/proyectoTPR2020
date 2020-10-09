<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';
    public function users(){ 
        return $this->belongsTo('APP\User', 'id_user'); 
    }
    public function positions(){ 
        return $this->belongsTo('APP\Position', 'id_position'); 
    }
}
