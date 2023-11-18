<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'user_id',
        'caption',
        'category',
        'path',
        'chemin',
    ];


    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}