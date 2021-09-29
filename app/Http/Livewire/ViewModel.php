<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use DB;
class ViewModel extends ModalComponent
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
        return '4xl';

    }

    public $list_id;
    public $discount;
    public $model;
    public $dealer;
    
    public function mount($list_id,$model)
    {   
        // dd($list_id);
        $discount = 0;
        if($model == 'price_list'){
            $list_file = DB::table('price_lists')->where('id', $list_id)->first();
            $file = $list_file->price_list;
            $discount = $list_file->discount;
        }
        if($model == 'invoice'){
            $list_file = DB::table('invoices')->where('id', $list_id)->first();
            $file = $list_file->invoice_file;
        }
        if($model == 'catalog'){
            $list_file = DB::table('catalogs')->where('id', $list_id)->first();
            print_r($list_file);exit;
            $file = $list_file->file;
        }
        $dealer = $list_file->dealer_id;

        $this->list_id = $file;
        $this->discount = $discount;
        $this->model = $model;
         $this->dealer = $dealer;
    }


    public function render()
    {
        return view('livewire.view-model');
    }
}
