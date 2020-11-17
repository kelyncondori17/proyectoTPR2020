<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{

    protected $table = 'Shopping';

    public function providers(){
        return this->belongsTo('App\Providers', 'provider_id');
    }


    public function personals(){
        return this->belongsTo('App\Personal', 'personal_id');
    }


    public function shopping_invoices(){
        return this->hasmany('App\Shopping_Invoice');
    }

    use HasFactory;
}
