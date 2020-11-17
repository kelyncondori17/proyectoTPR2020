<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';
    protected $fillable=["id_personal","quantity","date"];

 
    protected static function boot(){
        parent::boot();
        self::creating(function ($table){
            if(!app()->runningInConsole()){
                $table->id_user=auth()->id();
            }
        });
    }
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function personal(){
        return $this->belongsTo(Personal::class);
    }


    public function sales_invoice(){
        return $this->hasmany('App\Sale_Invoice');
    }

    use HasFactory;
}
