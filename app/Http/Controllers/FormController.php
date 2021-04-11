<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function store(Request $request)
    {



        $this->validate(request(), [

            'name'     => 'required|min:5|max:20',
            'password' => 'required|min:6',
            'age' => 'required|min:1|max:2',
            'phone' => 'required|size:11',
            'id' => 'required|size:14',
            'address'     => 'required|min:10|max:50',

        ]);



        echo 'Correct data ';


    }
}
