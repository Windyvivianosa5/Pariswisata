<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Culinary;

class CulinaryController extends Controller
{
    public function index()
    {
        $culinaries = Culinary::query()->latest()->get();

        return view('culinary', compact('culinaries'));
    }

    public function show($id)
    {
        $culinary = Culinary::query()->findOrFail($id);

        return view('detailCulinary', compact('culinary'));
    }
}
