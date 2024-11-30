<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index ()
    {
        $medicines = Medicine::
        return view('medicine.index');
    }
}
