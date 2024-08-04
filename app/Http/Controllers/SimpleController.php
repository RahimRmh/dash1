<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleController extends Controller
{
    public function data(){
        $fakedata= [
            'name' => 'John Doe',
            'age' => 30
        ];
        return response()->json($fakedata);
    }
}
