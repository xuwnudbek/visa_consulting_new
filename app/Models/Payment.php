<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'application_id',
        'amount',
        'comment',
        'payment_type',
        'created_at'
    ];


    /**
     * Get the application associated with the payment.
     */

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
