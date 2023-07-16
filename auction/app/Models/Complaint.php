<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $table="complaint";
    protected $primaryKey="complaint_id";
    //which fields can be filled in from this application
    protected $fillable = ['buyer_id','status','description'];

    
     public function buyer(){
        return $this->belongsTo(Buyer::class);
     }
     
}
