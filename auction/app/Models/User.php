<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table="users";
    protected $primaryKey="user_id";
    //which fields can be filled in from this application
    protected $fillable = ['username','role','email','password'];

     
     public function admin(){
        return $this->hasMany(Admin::class);
     }
     public function seller(){
        return $this->hasMany(Seller::class);
     }
     
    public function buyer(){
        return $this->hasMany(Buyer::class);
    }
 
}
