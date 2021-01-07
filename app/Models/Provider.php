<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'providers';
    protected $fillable = [
        'name_provider',
        'surnames',
        'direction',
        'phone',
    ];
    public function position(){
        return $this->belongsTo(Position::class);
    }


    public function sales(){
        return $this->hasmany('App\Sale');
    }


    public function shopping(){
        return $this->hasmany('App\Shopping');
    }


    use HasFactory;
}
