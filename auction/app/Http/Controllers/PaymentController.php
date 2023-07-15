<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //
    public function all(){

        $allPayments = Payment::paginate(7);

         return view('payment.all',['payments'=>$allPayments]);
    }
    public function add(){
        return view('payment.add');
    }
    public function save(Request $request){

        $request->validate([
            'user_id' => 'min:2',
            'item_id'=>'min:2',
            'amount'=>'amount',
            'status'=>'min:7',
        ]);

        $payment_userid = ($request->get('user_id'));
        $payment_itemid = ($request->get('item_id'));
        $payment_amount = ($request->get('amount'));
        $payment_status = ($request->get('status'));
       

        $payment = new Payment();
        $payment->user_id = $payment_userid;
        $payment->item_id = $payment_itemid;
        $payment->payment_amount = $payment_amount;
        $payment->payment_status = $payment_status;

        $user->save();

          return redirect('payment')->with('status',"$user_id payment saved");
    }


}
