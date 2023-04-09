<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id', 'finalPrice', 'items', 'description', 'status'
    ];

    protected $casts = [
        'items' => 'array'
    ];

    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
