<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /** @use HasFactory<\Database\Factories\FieldFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'image',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
