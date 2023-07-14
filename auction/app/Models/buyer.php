<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    use HasFactory;
    protected $table="buyer";
    protected $primaryKey="buyer_id";
    //which fields can be filled in from this application
    protected $fillable = ['email','password','contact'];

     
     public function users(){
        return $this->belongsTo(Users::class);
     }
     public function complaint(){
      return $this->hasMany(Complaint::class);
   }
   public function payment(){
      return $this->hasMany(Payment::class);
   }
}
