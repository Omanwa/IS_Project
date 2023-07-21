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
            'category_id'=>'required',
            'seller_id'=>'required',
            'item_name'=>'required|min:5',
            'item_startprice'=>'required',
            'item_starttime'=>'required',
            'item_endtime'=>'required',
            'description'=>'required',
            'status'=>'required',
           'images'=>'image|mimes:png,jpg,jpeg|max:1000',

        ]);

        $item_categoryid = ($request->get('category_id'));
        $item_sellerid = ($request->get('seller_id'));
        $item_name = ($request->get('item_name'));
        $item_startprice = ($request->get('item_startprice'));
        $item_starttime = ($request->get('item_starttime'));
        $item_endtime =  ($request->get('item_endtime'));
        $item_description = ($request->get('description'));
        $item_status = ($request->get('status'));

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $fileName = $image->getClientOriginalName();
                $image->move(public_path('images'), $fileName);

                $image = new Image();
                $image->file_name = $fileName;
                $item->images()->save($image);
            }
        }

        $item = new Item();
        $item->category_id = $item_categoryid;
        $item->seller_id = $item_sellerid;
        $item->item_name = $item_name;
        $item->item_startprice = $item_startprice;
        $item->item_starttime = $item_starttime;
        $item->item_endtime = $item_endtime;
        $item->description = $item_description;
        $item->status = $item_status;
        $item->save();

        return redirect('items')->with('status',"$item_name item saved");
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
