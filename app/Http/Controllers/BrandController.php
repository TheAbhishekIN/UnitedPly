<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
use DB;
class BrandController extends Controller
{
    public function index(){
        $catalogs  = array(); 
        if(Auth::user()->role == 'admin'){
            $catalogs = Brand::all();
        }
      
        return view('brand.index',compact('catalogs'));
    }

    public function create(){
     
        return view('brand.create');
    }

    public function save(Request $request){
        $save = DB::table('brands')->insert([
            'name'=>$request->name,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        if($save){
            return redirect(route('admin.brands'));
        }
    }
}
