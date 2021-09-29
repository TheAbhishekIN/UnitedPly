<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceList;
use Auth;
use DB;
class PriceListController extends Controller
{
    public function index(){
        $price_list  = array(); 
        if(Auth::user()->role == 'admin'){
            $price_list = DB::table('price_lists')
                            ->select('price_lists.*','users.id as user_id','users.firm_name as dealer', 'brands.id as brand_id','brands.name as brand')
                            ->join('users','users.id', '=', 'price_lists.dealer_id')
                            ->join('brands','brands.id', '=', 'price_lists.brand_id',)
                            ->get();
        }

        if(Auth::user()->role == 'dealer'){
             $d = Auth::user()->id;
            $dealer  = DB::table('team_user')->where('user_id', Auth::user()->id)->first();
            if(isset($dealer->team_id)){
                $dealer_id = DB::table('teams')->where('id',$dealer->team_id)->first();
                $d = $dealer_id->user_id;
            }
            $price_list = PriceList::where('price_lists.dealer_id',$d)
                            ->select('price_lists.*','users.id as user_id','users.firm_name as dealer', 'brands.id as brand_id','brands.name as brand')
                            ->join('users','users.id', '=', 'price_lists.dealer_id')
                            ->join('brands','brands.id', '=', 'price_lists.brand_id',)
                            ->get();
        }

        // dd($price_list);

        return view('price_list.index',compact('price_list'));
    }

    public function create(){
        $dealers = DB::table('users')->where('role','dealer')->get();
        $brands = DB::table('brands')->get();
      
        return view('price_list.create',compact('dealers','brands'));
    }
    
    public function store(Request $request){
       
        if($request->file()) {
            $fileName = time().'_'.$request->file('invoice_file')->getClientOriginalName();
             $filePath = $request->file('invoice_file')->storeAs('uploads/'.$request->dealer.'/price_list', $fileName, 'public');

            $data = DB::table('price_lists')->insert([
                'dealer_id' => $request->dealer,
                'brand_id' => $request->brand,
                'discount' => $request->discount,
                'price_list' => $fileName,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect(route('admin.price_lists'));
        }
    }
}
