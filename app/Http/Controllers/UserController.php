<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
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
        $user_access=DB::table('user_access_type')
                            ->join('user_access','user_access_type.id','=','user_access.access_type')
                            ->where([
                                ['user_access.user_type',Auth::user()->id],
                                ['user_access_type.menu_name','Users'],
                                ['user_access_type.sub_menu','']
                            ])->get();
        //dd($user_access);
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
        if($user_access!=null)
        {
            if($user_access[0]->fn_view=='N')
            {
                session()->put('message','Access denied');
                return redirect('home');
            }
        }
        else
        {
            session()->put('message','Access denied');
            return redirect('home');   
        }
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
         $data=DB::table('users')->paginate(15);
          return view('admin.user')
                            ->with('user_access',$user_access)
                            ->with('data',$data)
                            ->with('current_menu','Register')
                            ->with('menu',$menuData);
    }
    public function listcontrolpanel()
    {
        $users=DB::table('users')->get();
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
        return view('list_control_panel')->with('menu',$menuData)->with('users',$users);
    }
    

    public function UserControlList($user_id)
    {
        //$user_id=$request->get('id');
        $flag=true;
        $user_menu=DB::table('user_access_type')->get();
        $user_access=DB::table('user_access')->where([['user_type',$user_id]])->get();
        //dd($user_access);
        if(sizeof($user_access)>0)
        {
            foreach($user_menu as $menu)
            {
                $user_access1=DB::table('user_access')->where([['user_type',$user_id],['access_type',$menu->id]])->get();
                //$user_access1=$obj->data_select($sql);
                //print_r($user_access1);
                //print_r($user_access1);
                if(sizeof($user_access1)==0)
                {
                    DB::table('user_access')->insert(
                        ['user_type' => $user_id, 'access_type' => $menu->id]
                    );
                    //$obj->data_insert($sql);
                }
            }
        }
        else
        {
            foreach($user_menu as $menu)
            {
                
                //$sql="INSERT INTO `user_access`(`user_type`, `access_type`) VALUES ('".$user_id."','".$menu['id']."')";
                DB::table('user_access')->insert(
                        ['user_type' => $user_id, 'access_type' => $menu->id]
                    );
            }
        }
        //if(session()->get('user_type')=="Super Admin")
        {
            $menu=DB::table('user_access_type')
                ->join('user_access','user_access_type.id','=','user_access.access_type')
                ->where([
                    ['user_access.user_type',$user_id]
                ])->get();
        }
        /*else
        {
            $menu=DB::table('user_access_type')
                ->join('user_access','user_access_type.id','=','user_access.access_type')
                ->where([
                    ['user_access.user_type',$user_id],
                    ['fn_view','Y']
                ])->get();
        }*/
        echo json_encode($menu);
    }

    public function changeUserControl(Request $request)
    {
        $id=$request->get('id');
        $status=$request->get('status');
        $type=$request->get('type');
        $msg="";
        if(Auth::user()->user_type=="Super Admin")
        {
            if($type=='add')
            {
                DB::table('user_access')
                    ->where('id', $id)
                    ->update(array('fn_add'=>$status));
            }
            else if($type=='view')
            {
                DB::table('user_access')
                    ->where('id', $id)
                    ->update(array('fn_view'=>$status));
            }
            else if($type=='delete')
            {
                DB::table('user_access')
                    ->where('id', $id)
                    ->update(array('fn_delete'=>$status));
            }
            else if($type=='edit')
            {
                DB::table('user_access')
                    ->where('id', $id)
                    ->update(array('fn_update'=>$status));
            }
            else if($type=='excel')
            {
                DB::table('user_access')
                    ->where('id', $id)
                    ->update(array('fn_excel'=>$status));
            }
            else if($type=='print')
            {
                DB::table('user_access')
                    ->where('id', $id)
                    ->update(array('fn_print'=>$status));
            }
            $msg="Service status changed successfully";
        }
        else
        {
            $user_access=DB::table('user_access')->where('id', $id)->first();
            $user_access_type=DB::table('user_access_type')->where('id', $user_access->access_type)->first();
            $user_access_login_user=DB::table('user_access')->where([['access_type', $user_access_type->id],['user_type',Auth::user()->id]])->first();
          //  dd($user_access_login_user);
            if($type=='add')      
            {
                if($user_access_login_user->fn_add=='Y')
                {
                    DB::table('user_access')
                        ->where('id', $id)
                        ->update(array('fn_add'=>$status));
                    $msg="Service status changed successfully";
                }
                else
                {
                    $msg="Access denied !! not authorised to change this service";
                }
                
            }
            else if($type=='view')
            {
                if($user_access_login_user->fn_view=='Y')
                {
                    DB::table('user_access')
                        ->where('id', $id)
                        ->update(array('fn_view'=>$status));
                    $msg="Service status changed successfully";
                }
                else
                {
                    $msg="Access denied !! not authorised to change this service";
                }
            }
            else if($type=='delete')
            {
                if($user_access_login_user->fn_delete=='Y')
                {
                    DB::table('user_access')
                        ->where('id', $id)
                        ->update(array('fn_delete'=>$status));
                    $msg="Service status changed successfully";
                }
                else
                {
                    $msg="Access denied !! not authorised to change this service";
                }
            }
            else if($type=='edit')
            {
                if($user_access_login_user->fn_update=='Y')
                {
                    DB::table('user_access')
                        ->where('id', $id)
                        ->update(array('fn_update'=>$status));
                    $msg="Service status changed successfully";
                }
                else
                {
                    $msg="Access denied !! not authorised to change this service";
                }
            }
            else if($type=='excel')
            {
                if($user_access_login_user->fn_excel=='Y')
                {
                    DB::table('user_access')
                        ->where('id', $id)
                        ->update(array('fn_excel'=>$status));
                    $msg="Service status changed successfully";
                }
                else
                {
                    $msg="Access denied !! not authorised to change this service";
                }
            }
            else if($type=='print')
            {
                if($user_access_login_user->fn_print=='Y')
                {
                    DB::table('user_access')
                        ->where('id', $id)
                        ->update(array('fn_print'=>$status));
                    $msg="Service status changed successfully";
                }
                else
                {
                    $msg="Access denied !! not authorised to change this service";
                }
            }
        }
        echo $msg;
        
    }
     

    public function register()
       {   
        $user_access=DB::table('user_access_type')
                            ->join('user_access','user_access_type.id','=','user_access.access_type')
                            ->where([
                                ['user_access.user_type',Auth::user()->id],
                                ['user_access_type.menu_name','Register'],
                                ['user_access_type.sub_menu','']
                            ])->get();
        //dd($user_access);
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
        if($user_access!=null)
        {
            if($user_access[0]->fn_add=='N')
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
        return view('admin.register')
                           ->with('user_access',$user_access)
                           ->with('menu',$menuData);
    }

     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'email' => 'required|email',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'user_type' => 'required',
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

    public function edit($id)
    {
        $user_access=DB::table('user_access_type')
                            ->join('user_access','user_access_type.id','=','user_access.access_type')
                            ->where([
                                ['user_access.user_type',Auth::user()->id],
                                ['user_access_type.menu_name','Users'],
                                ['user_access_type.sub_menu','']
                            ])->get();
        //dd($user_access);
        $menuData=app('App\Http\Controllers\DashboardController')->MenuList();
        if($user_access!=null)
        {
            if($user_access[0]->fn_update=='N')
            {
                session()->put('message','Access denied');
                return redirect('home');
            }
        }
        else
        {
            session()->put('message','Access denied');
            return redirect('home');   
        }
        $edit_data = DB::table('users')->where('id',$id)->first();
        return view('admin.update_user')
                    ->with('user_access',$user_access)
                    ->with('menu',$menuData)
                    ->with('edit_data',$edit_data);
    }

     public function update(Request $request,$id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        $data = array(
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => Auth::user()->id,
        );
        DB::table('users')->where('id',$id)->update($data);
        return redirect('/Users')->withErrors(['User "'.$request->get('username').'" successfully updated']);
    }

     public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/Users');               
    }

}


