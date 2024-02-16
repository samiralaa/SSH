<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serves extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','description'];

    public function sarvespage ()
    {
        return $this->hasMany(ServesPage::class,'serve_id','id');
    }


}
