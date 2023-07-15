<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function all(){

        $allPayments = Payemnt::paginate(7);

         return view('payment.all',['payments'=>$allPayments]);
    }
}
