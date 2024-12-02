<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'order_medicines')->withPivot('quantity');
    }
}
