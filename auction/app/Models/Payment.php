<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table="payments";
    protected $primaryKey="payment_id";
    //which fields can be filled in from this application
    protected $fillable = ['buyer_id','item_id','amount','status'];

     
     public function buyer(){
        return $this->belongsTo(Buyer::class,'buyer_id','Buyer_id');
     }
     public function items(){
        return $this->belongsTo(Items::class,'item_id','item_id');
     }
}
