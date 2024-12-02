<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'email', 'phonenumber', 'paymentterms'];

    // Define the relationship to Medicines
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
