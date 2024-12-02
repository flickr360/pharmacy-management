<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Medicine extends Model
{
    protected $fillable = ['medicine_name', 'supplier_id', 'unit_price'];

    // Define the relationship to Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}