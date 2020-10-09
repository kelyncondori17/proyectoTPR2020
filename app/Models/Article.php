<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public function categories(){ 
        return $this->belongsTo('APP\Category', 'id_category'); 
    }
}
