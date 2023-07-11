<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table="payment";
    protected $primaryKey="payment_id";
    //which fields can be filled in from this application
    protected $fillable = ['amount','status'];

     
     public function buyer(){
        return $this->belongsTo(Buyer::class);
     }
     public function items(){
        return $this->belongsTo(Items::class);
     }
}
