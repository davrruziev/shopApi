<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            "name"
        ];

    public function orders()
    {
        return $this->belongsToMany(order::class);
    }
}
