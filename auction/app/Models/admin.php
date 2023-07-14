<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table="admin";
    protected $primaryKey="admin_id";
    //which fields can be filled in from this application
    protected $fillable = ['email','password'];

    
     public function users(){
        return $this->belongsTo(Users::class);
     }
}
