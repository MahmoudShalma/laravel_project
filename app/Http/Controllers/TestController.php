<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\This;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = test::paginate(15);
        return view('display', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


        $account                  = new test();
        $account->name     = $request->name;
        $account->age     = $request->age;
        $account->phone     = $request->phone;
        $account->national_id     = $request->id;
        $account->password     = encrypt($request->password);
        $account->address     = $request->address;
        $account->about     = $request->about;
        $account->save();

        // return view('form');
        return redirect('display');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = test::find($request->id);

        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        $this->validate(request(), [

            'name'     => 'required|min:5|max:20',
             'password' => 'required|min:6',
            'age' => 'required|min:1|max:2',
            'phone' => 'required|size:11',
            'id' => 'required|size:14',
            'address'     => 'required|min:10|max:50',

        ]);

        $account = test::find($test);
        $account->name     = $request->name;
        $account->age     = $request->age;
        $account->phone     = $request->phone;
        $account->national_id     = $request->id;
        // if (isset($request->password)) {
        //  $account->password     = encrypt($request->password);

        // }
        $account->address     = $request->address;
        $account->about     = $request->about;
        $account->save();

        // return view('form');
        return redirect('display');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $op =  test::where('id', $id)->delete();

        return redirect('display');
    }
}
