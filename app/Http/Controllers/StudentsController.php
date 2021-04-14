<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Students::paginate(15);
      return view('student.display',['Users' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.add',['title' => 'Add Student']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate(request(),[
            'name'     => 'required|min:5|max:20',
            'email'    => 'required|email',
            'password' => 'required|min:6',
     ]);

     $data['password'] = bcrypt($data['password']);


    $op =  Students::create($data);

    if($op){

       $message = "data inserted";
    }else{
       $mesage = "Error in insertion";
    }


       session()->flash('Message',$message);


        return redirect(url('students'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Students::findOrFail($id);
        return view('student.edit',['data' => $data,'title' => 'Edit Students']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =  $this->validate(request(),[
            'name'     => 'required|min:5|max:20',
            'email'    => 'required|email',
        ]);

        $op = Students::where('id',$id)->update($data);

           if($op){
           $message =  'updated';
           }else{
           $message =  'error in update';
           }

           session()->flash('Message',$message);

           return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op =   Students::where('id',$id)->delete();

        if($op){
            $message = "Student Deleted";
        }else{
            $message = "error in deleting Student";
        }
        session()->flash('Message',$message);


            return redirect(url('students'));
    }

    public function login(){

        return view('student.login',['title' => 'Login']);

    }



    public function doLogin(Request $request){

      // logic


      $data = $this->validate(request(),[
        'email'    => 'required|email',
        'password' => 'required|min:6',
      ]);

       // Login

        $check = auth()->attempt($data,true);
    if($check){
        return redirect(url('students'));
    }else{

        session()->flash('Message','Password || email Invalid');
        return redirect(url('Login'));
    }
    }





    public function logout(){

         auth()->logout();

         return redirect(url('Login'));

    }

}
