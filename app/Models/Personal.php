<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Personal extends Model
{


    protected $table = 'personal';
    protected $fillable=[
        "name",
        "surname",
        "id_position",
        "direction",
        "CI",
        "password",
        "phone",
        "salary",
        "schedule"
    ];

    
    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function sales(){
        return $this->hasmany('App\Sale');
    }


    public function shoppings(){
        return $this->hasmany('App\Shopping');
    }


    use HasFactory;
}