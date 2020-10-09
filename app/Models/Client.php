<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    public function users(){ 
        return $this->belongsTo('APP\User', 'id_user'); 
    }
}
