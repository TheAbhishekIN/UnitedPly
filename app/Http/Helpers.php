<?php
use app\models\User;
if (! function_exists('getDealer')) {
    function getDealer($id) {
        // dd(User::all());
        $dealer = User::where('id', $id)->first();
        return $dealer->firm_name;
    }
}