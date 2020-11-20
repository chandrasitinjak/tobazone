<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Illuminate\Http\Request;

class HistoryIncomeController extends Controller
{

    private function getAuthincatedMerchant() {
        $merchant = User::with('profile')->find(Auth::user()->id);
        $address = json_decode(json_decode($merchant->profile->address)[0]);
        $merchant->profile->address = $address;

        return $merchant;
    }
        public function index()
        {
            $merchant = $this->getAuthincatedMerchant();
            return view('users.merchants.income.index')->with('merchant', $merchant);
        }
}
