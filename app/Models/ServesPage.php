<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServesPage extends Model
{
    use HasFactory;
    protected $fillable = ['serve_id','is_active','name'];
    // protected $table = 'serves_pages';
    public function serves()
    {
        return $this->belongsTo(Serves::class,'serve_id','id');
    }
}
