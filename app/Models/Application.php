<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'field_id',
        'country_id',
        // 'amount',
        'status',
        'comment',
        'document',
    ];

    /**
     * Get the user that owns the application.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the field that the application belongs to.
     */

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    /**
     * Get the country that the application belongs to.
     */

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
