<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table="items";
    protected $primaryKey="item_id";
    //which fields can be filled in from this application
    protected $fillable = ['item_name','item_startprice','item_starttime','item_endtime','description','status'];

     
     public function category(){
        return $this->belongsTo(Category::class);
     }
     public function seller(){
        return $this->belongsTo(Seller::class);
     }
}
