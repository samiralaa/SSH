<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model {
    use HasFactory;
    protected $fillable = [ 'title', 'description', 'url', 'btn_text', 'dev_id', 'image' ];
    // protected $guarded = [];

    public function developer() {
        return $this->belongsTo( TypeDev::class,'dev_id' ,'id');
    }

}
