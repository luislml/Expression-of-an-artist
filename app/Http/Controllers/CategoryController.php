<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtCategory;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = ArtCategory::all();
        return response()->json($categories);
    }
}
