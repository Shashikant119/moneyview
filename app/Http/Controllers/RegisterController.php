<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        

      /*  return view('admin.register');
    }*/

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
         $request->validate([ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'username' => 'required|unique:admin_users,username',
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => 'required|same:password',
            'user_type' => 'required',
            'status' => 'required',
        ]);   
         $data = array(
             'name'=>$request->get('name'),
             'email'=>$request->get('email'),
             'mobile'=>$request->get('mobile'),
             'address'=>$request->get('address'),
             'username'=>$request->get('username'),
             'user_type'=>$request->get('user_type'),
             'password'=>Hash::make($request->get('password')),
             'created_at'=>date('Y-m-d H:i:s'),
             'updated_at'=>date('Y-m-d H:i:s'),
             'status'=>$request->get('status'),
         );
         DB::table('users')->insert($data);
         return redirect('/Users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
