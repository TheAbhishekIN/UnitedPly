<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
class DealerController extends Controller
{

    public function index(){
   
        $dealers  = array(); 
        if(Auth::user()->role == "admin"){
            $dealers = User::where('role', 'dealer')->where('firm_name','!=','')->get();
        }

        if(Auth::user()->role == 'dealer'){
            abort('You must be a admin');
        }
        
        return view('dealer.index',compact('dealers'));
    }

    public function create(){
        $brands = Brand::all();
        $belts = DB::table('belts')->get();
        $stations = array();
        foreach ($belts as $b => $belt) {
            $station = DB::table('stations')->where('belt_id',$belt->id)->get();

            $stations[$b]['belt_name'] =  $belt->belt_name;
            $stations[$b]['stations'] =  $station;

        }

        // dd($stations);
        return view('dealer.create',compact('brands'));
    }

    public function save(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric', 'unique:users'],
            'station' => ['required'],

        ]);

        $dealer = array(
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'role'=>'dealer',
            'dealer_brands'=>json_encode($request->dealer_brands),
            'firm_name'=>$request->firm_name,
            'password'=>Hash::make($request->password),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );

        $save = DB::table('users')->insertGetId($dealer);

        $team = DB::table('teams')->insert([
            'user_id' => $save,
            'name' => explode(' ', $request->firm_name, 2)[0]."'s Team",
            'personal_team' => true,
        ]);

        $this->generate_code($save);

        return redirect(route('admin.dealer'))->with('status', 'Dealer created!');


    }

    public function addMember($dealer_id){
        $dealer_id = $dealer_id;
        return view('dealer.add_member',compact('dealer_id'));
    }

    public function saveMember(Request $request){

        $team_id = DB::table('teams')->where('user_id',$request->dealer_id)->first();
        $dealer = $request->dealer_id;
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric', 'unique:users'],
        ]);

        $data = array(
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'role'=>'dealer',
            'dealer_brands'=>json_encode(array()),
            'firm_name'=>'',
            'password'=>Hash::make($request->password),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );

        $save = DB::table('users')->insertGetId($data);
        $team = DB::table('team_user')->insert([
            'team_id' => $team_id->id,
            'user_id' => $save,
            'role' => 'editor',
        ]);

        return redirect(route('admin.dealer'))->with('status', 'Dealer created!');

   }

   public function generate_code($dealer_id){

        $dealer = DB::table('users')->where('id',$dealer_id)->first();
        
        
        if (!file_exists('public/qr/'.$dealer_id)) {
            mkdir('public/qr/'.$dealer_id, 0777, true);
        }
        
        
         \QrCode::size(500)
            ->format('png')
            ->generate('https://dealer.plyunited.com/dealer-login/'.base64_encode($dealer->email), public_path('qr/'.$dealer_id.'/qr_code.png'));


        return 1;


   }

   public function dealer_login($id){
        $mail = base64_decode($id);
        session(['mail' => $mail]);
        return view('auth.login');
   }

   
}
