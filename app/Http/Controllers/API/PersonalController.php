<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index()
    {
        return Personal::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:personals,email',
            'numero' => 'nullable|string',
            'departamento' => 'nullable|string',
            'password' => 'required|string|min:6',
        ]);

        $personal = Personal::create($data);

        return response()->json($personal, 201);
    }

    public function show($id)
    {
        return Personal::findOrFail($id);
    }
}
