<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
 
    public function index()
    {
        return response()->json(student::all());
    }


    public function store(Request $request)
    {
        $data = $request->all();
        student::create($data);
        return response()->json($data);
    }

   
}
