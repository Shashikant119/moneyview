<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
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
        
    }

    public function menulist()
    {
        $menuData=array();
        $menu=DB::table('user_access_type')
            ->select('user_access_type.menu_type','user_access_type.menu_name','user_access_type.target','user_access_type.icon','user_access_type.url_name')
            ->join('user_access','user_access_type.id','=','user_access.access_type')
            ->where([
                ['user_access.fn_view','Y'],
                ['user_access.user_type',Auth::user()->id]
            ])
            ->groupby('user_access_type.menu_name')
            ->orderby('user_access_type.priority','ASC')
            ->get();
        $i=0;
        //dd($menu);
        foreach($menu as $value)
        {
            if($value->menu_type=='Main')
            {
                $menuData[$i]['menu_type']=$value->menu_type;
                $menuData[$i]['menu_name']=$value->menu_name;
                $menuData[$i]['target']=$value->target;
                $menuData[$i]['icon']=$value->icon;
                $menuData[$i]['url']=$value->url_name;
            }
            else
            {
                $temp=DB::table('user_access_type')
                        ->join('user_access','user_access_type.id','=','user_access.access_type')
                        ->where([
                            ['user_access_type.menu_name',$value->menu_name],
                            ['user_access.fn_view','Y'],
                            ['user_access.user_type',Auth::user()->id]
                        ])
                        ->get();
                $menuData[$i]['menu_type']=$value->menu_type;
                $menuData[$i]['menu_name']=$value->menu_name;
                $menuData[$i]['target']=$value->target;
                $menuData[$i]['icon']=$value->icon;
                $menuData[$i]['url']=$value->url_name;
                $menuData[$i]['sub_menu']=$temp;
            }
            $i++;
        }
        return $menuData;
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
