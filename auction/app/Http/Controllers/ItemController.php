<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //Display all items
    public function index()
    {
        return view ('items.all'['items =>$items']);
    }

    public function add(){
        
        $this->validate($request,[
            'item_name'=>'required|min:5',
            'item_startprice'=>'required',
            'item_starttime'=>'required',
            'item_endtime'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
        return view('items.add');
    }
    public function save(Request $request)
    {
        $this->validate($request,[
            'item_name'=>'required|min:5',
            'item_startprice'=>'required',
            'item_starttime'=>'required',
            'item_endtime'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
}
public function show($item_id)
{

}
public function edit($id)
    {

    }

    
}