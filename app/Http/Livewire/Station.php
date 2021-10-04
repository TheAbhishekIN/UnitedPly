<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use DB;
class Station extends ModalComponent
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
        return 'xl';

    }

    public $model;
    public $belts;
    public $station;
    public $b;

    public function mount($model,$id="")
    {
    	$belts = DB::table('belts')->get();
    	$station = '';
    	$b = '';
    	if($id){
    		$st = DB::table('stations')->where('id',$id)->first();
    		$b = $st->belt_id;
    		$station = $st->station;
    	}
    	$this->model = $model;
    	$this->belts = $belts;
    	$this->station = $station;
    	$this->b = $b;
    }
    public function render()
    {
        return view('livewire.station');
    }
}
