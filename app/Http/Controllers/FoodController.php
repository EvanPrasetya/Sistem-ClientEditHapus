<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodResource;
use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        return new FoodResource(
            true,
            'Data food berhasil diambil',
            $foods
        );
    }
}