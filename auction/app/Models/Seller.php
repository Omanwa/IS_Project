<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table="seller";
    protected $primaryKey="seller_id";
    //which fields can be filled in from this application
    protected $fillable = ['email','password','contact'];

     
     public function users(){
        return $this->belongsTo(Users::class);
     }
     public function items(){
      return $this->hasMany(Items::class);
   }
}
