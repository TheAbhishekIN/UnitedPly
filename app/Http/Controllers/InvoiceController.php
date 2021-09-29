<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Auth;
use DB;
class InvoiceController extends Controller
{
    public function index(){
        $invoices  = array(); 
        if(Auth::user()->role == 'admin'){
            $invoices = DB::table('invoices')
                        ->select('invoices.*','users.id as user_id','users.firm_name')
                        ->join('users','users.id','=','invoices.dealer_id')
                        ->get();
        }

        if(Auth::user()->role == 'dealer'){
             $d = Auth::user()->id;
            $dealer  = DB::table('team_user')->where('user_id', Auth::user()->id)->first();
            if(isset($dealer->team_id)){
                $dealer_id = DB::table('teams')->where('id',$dealer->team_id)->first();
                $d = $dealer_id->user_id;
            }
            $invoices = Invoice::where('invoices.dealer_id',$d)
                        ->select('invoices.*','users.id as user_id','users.firm_name')
                        ->join('users','users.id','=','invoices.dealer_id')
                        ->get();
        }
        // dd($invoices);

        return view('invoice.index',compact('invoices'));
    }

    public function create(){
        $dealers = DB::table('users')->where('role','dealer')->get();
        return view('invoice.create',compact('dealers'));
    }
    
    public function save(Request $request){
 
        if($request->file()) {
            $fileName = time().'_'.$request->file('invoice_file')->getClientOriginalName();
            $filePath = $request->file('invoice_file')->storeAs('uploads/'.$request->dealer.'/invoice', $fileName, 'public');

            $data = DB::table('invoices')->insert([
                'dealer_id' => $request->dealer,
                'invoice_number' => $request->number,
                'invoice_date' => $request->date,
                'invoice_file' => time().'_'.$request->file('invoice_file')->getClientOriginalName(),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect(route('admin.invoice'));
        }
    }
}
