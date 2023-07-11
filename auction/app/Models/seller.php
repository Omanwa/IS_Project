<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    use HasFactory;

    protected $table="seller";
    protected $primaryKey="seller_id";
    //which fields can be filled in from this application
    protected $fillable = ['seller_name','email','password','contact'];

     
     public function users(){
        return $this->belongsTo(Users::class);
     }
}
