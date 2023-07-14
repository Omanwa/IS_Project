<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="category";
    protected $primaryKey="category_id";
    //which fields can be filled in from this application
    protected $fillable = ['category_name','description'];

    public function items(){
        return $this->hasMany(Items::class);
     }
    
}

