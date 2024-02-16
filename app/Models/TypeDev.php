<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDev extends Model {
    use HasFactory;
    protected $fillable = [ 'name' ];
    //Relacion uno a muchos

    public function devs() {
        return $this->hasMany( Content::class, 'dev_id', 'id' );
    }

}
