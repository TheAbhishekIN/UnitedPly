<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use Auth;
use DB;
class CatalogController extends Controller
{
    public function index(){
        $catalogs  = array(); 
        if(Auth::user()->role == 'admin'){
            $catalogs = DB::table('catalogs')
                            ->select('catalogs.*','brands.id as brand_id','brands.name as b','users.id as user_id', 'users.firm_name as dealer')
                            ->join('brands', 'catalogs.brand_name','=', 'brands.id')
                            ->join('users', 'catalogs.dealer_id','=', 'users.id')
                            ->get();
        }

        if(Auth::user()->role == 'dealer'){
            $d = Auth::user()->id;
            $dealer  = DB::table('team_user')->where('user_id', Auth::user()->id)->first();
            if(isset($dealer->team_id)){
                $dealer_id = DB::table('teams')->where('id',$dealer->team_id)->first();
                $d = $dealer_id->user_id;
            }
            

            $catalogs = DB::table('catalogs')
                            ->where('catalogs.dealer_id', $d)
                            ->select('catalogs.*','brands.id as brand_id','brands.name as b','users.id as user_id', 'users.firm_name as dealer')
                            ->join('brands', 'catalogs.brand_name','=', 'brands.id')
                            ->join('users', 'catalogs.dealer_id','=', 'users.id')
                            ->get();
        }

        return view('catalog.index',compact('catalogs'));
    }

    public function create(){
        $dealers = DB::table('users')->where('role','dealer')->where('firm_name','!=', '')->get();
        $brands = DB::table('brands')->get();
        // dd($dealers);
        return view('catalog.create',compact('dealers','brands'));
    }

    public function store(Request $request){
        
        if($request->file()) {
            $fileName = time().'_'.$request->file('item_file')->getClientOriginalName();
            $filePath = $request->file('item_file')->storeAs('uploads/'.$request->dealer.'/catalog', $fileName, 'public');

            $data = DB::table('catalogs')->insert([
                'dealer_id' => $request->dealer,
                'category_id' => 0,
                'series' => $request->series,
                'name' => $request->name,
                'brand_name' => $request->brand,
                'thickness' => $request->thickness,
                'sort_code' => $request->sort_code,
                'file' => time().'_'.$request->file('item_file')->getClientOriginalName(),
                'file_type' => '',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect(route('admin.catalog'));
        }
    }
}
