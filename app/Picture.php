<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function Books(){
        return $this->belongsTo(Book::class);
    }
}
