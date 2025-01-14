<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsarticle extends Model
{
    public function category() {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
    public function author() {
        return $this->belongsTo(Author::class, 'author_id');
    }
 
}
