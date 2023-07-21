<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
class ComplaintController extends Controller
{
    //
    public function all(){

        $allcomplaints = Complaint::paginate(7);

         return view('complaint.all',['complaints'=>$allcomplaints]);
    }
    public function add(){
        return view('complaint.add');
    }
    public function save(Request $request){

        $this->validate($request, [
            'buyer_id' => 'required',
            'description'=> 'min:10',
            'status'=> 'min:2',
            
        ]);

        $complaint_buyerid = ($request->get('buyer_id'));
        $complaint_description = ($request->get('description'));
        $complaint_status = ($request->get('status'));

        $complaint = new Complaint();
        $complaint->buyer_id = $complaint_buyerid;
        $complaint->description = $complaint_description;
        $complaint->status = $complaint_status;
        $complaint->save();

          return redirect('complaints')->with('status', "complaints saved");
    }
    
}
