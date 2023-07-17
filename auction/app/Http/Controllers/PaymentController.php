<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //TO DO PAYMENTS REVIEW
    
    public function all(){

        $allPayments = Payment::paginate(7);

         return view('payment.all',['payments'=>$allPayments]);
    }
    public function add(){
        return view('payment.add');
    }
    public function save(Request $request){

        $request->validate([
            'buyer_id' => 'min:1',
            'item_id'=>'min:1',
            'status'=>'min:4',
        ]);

        $payment_buyerid = ($request->get('buyer_id'));
        $payment_itemid = ($request->get('item_id'));
        $payment_amount = ($request->get('amount'));
        $payment_status = ($request->get('status'));
       

        $payment = new Payment();
        $payment->buyer_id = $payment_buyerid;
        $payment->item_id = $payment_itemid;
        $payment->amount = $payment_amount;
        $payment->status = $payment_status;

        $payment->save();

          return redirect('payments')->with('status',"Payment saved");
    }
    


}
