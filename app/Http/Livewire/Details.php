<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use DB;

class Details extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '7xl';

    }

    public $dealer_id;
    public $team;
    public $firm_name;
    
    public function mount($dealer_id)
    {   
        $team = DB::table('teams')->where('user_id',$dealer_id)->first();
        $team1 = DB::table('team_user')->where('team_id',$team->id)->pluck('user_id');
        $users = array();
        if(count($team1)>0){
             $users = DB::table('users')->where('id',$team1)->get();
        }
       
        $dealer = DB::table('users')->where('id',$dealer_id)->first();
   
        $this->dealer_id = $dealer_id;
        $this->team =  $users;
        $this->firm_name =  $dealer->firm_name;
    }
    public function render()
    {
        return view('livewire.details');
    }
}
