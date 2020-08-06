<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class WebUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user_access=DB::table('user_access_type')
                            ->join('user_access','user_access_type.id','=','user_access.access_type')
                            ->where([
                                ['user_access.user_type',Auth::user()->id],
                                ['user_access_type.menu_name','Web User'],
                                ['user_access_type.sub_menu','']
                            ])->get();
        //dd($user_access);
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
        if($user_access!=null)
        {
            if($user_access[0]->fn_view=='N')
            {
                Auth()->put('message','Access denied');
                return redirect('home');
            }
        }
        else
        {
            
            Auth()->put('message','Access denied');
            return redirect('home');   
        }
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
        return view('admin.list_web_users')
                            ->with('user_access',$user_access)
                            ->with('current_menu','')
                            ->with('menu',$menuData);
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
        //
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
