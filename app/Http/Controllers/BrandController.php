<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Station;
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

    public function station(){
        if(Auth::user()->role != 'admin'){
            abort(404);
        }

            $stations = DB::table('stations')
                        ->select('stations.*','belts.*','belts.id as belt_id')
                        ->join('belts','stations.belt_id','=','belts.id')
                        ->get();
            // dd($stations);
        return view('station.index',compact('stations'));

    }

    public function store_station(Request $r){
        DB::table('stations')->insert([
            'belt_id'=>$r->belt_id,
            'station'=>$r->station,
            'created_at'=>date('d-m-Y H:m:s'),
            'updated_at'=>date('d-m-Y H:m:s')
        ]);

        return redirect(route('admin.station'));
    }
}
