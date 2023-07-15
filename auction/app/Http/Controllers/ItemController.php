<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //Display all items
    public function all()
    {
        $allItems = Item::paginate(7);

         return view('item.all',['items'=>$allItems]);
    }

    public function add(){
        
        return view('item.add');
    }
    public function save(Request $request)
    {
        $this->validate($request,[
            'item_name'=>'required|min:5',
            'item_startprice'=>'required',
            'item_starttime'=>'required',
            'item_endtime'=>'required',
            'description'=>'required',
        ]);
}
public function edit($items_id){
    $items = Item::find($items_id);

    if($items)
        return view('items.edit',['items'=>$items]);
    else
        return redirect('items');
}
public function saveChanges($items_id, Request $request){

    $request->validate([
        'item_name' => 'required|min:2|max:10|alpha'
    ]);

    $item_name = ($request->get('item_name'));

    $items = Item::find($item_id);

    if($items){
        $items->username = $item_name;
        $items->save();

        return redirect('items')->with('status',"Items $item_name updated.");
    }else{
        return redirect('items');
    }
}
public function delete($item_id){

    $user =User::find($item_id);
    if($item){
         $item->delete();
         return redirect('items')->with('status',"Item deleted.");
 }else{
     return redirect('items')->with('status',"Item does not exist");
 }
 }

    
}