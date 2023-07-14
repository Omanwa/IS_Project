<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function all(){

        $allCategories = Category::paginate(7);

         return view('category.all',['categories'=>$allCategories]);
    }
    public function add(){
        return view('category.add');
    }
    public function save(Request $request){

        $this->validate($request, [
            'Category_name' => 'required|min:2|max:10|alpha',
            'Description'=> 'min:2'
        ]);

        $category_name = ($request->get('category_name'));
        $category_description = ($request->get('description'));

        $category = new Category();
        $category->category_name = $category_name;
        $category-> description = $category_description;
        $category->save();

          return redirect('categories')->with('status', "category saved");
    }
    public function edit($category_id){
        $user = User::find($category_id);

        if($category)
            return view('category.edit',['category'=>$category]);
        else
            return redirect('category');
    }
    public function saveChanges($category_id, Request $request){

        $request->validate([
            'category_name' => 'required|min:2|max:10|alpha'
        ]);

        $category_name = ($request->get('category_name'));

        $category = Category::find($user_id);
 
        if($category){
            $category->categoryname = $category_name;
            $category->save();

            return redirect('categories')->with('status',"Category $category_name updated.");
        }else{
            return redirect('categories');
        }
    }
    public function delete($user_id){

       $category =Category::find($category_id);
       if($category){
            $category->delete();
            return redirect('categories')->with('status',"Category deleted.");
    }else{
        return redirect('categories')->with('status',"Category does not exist");
    }
    }
}
