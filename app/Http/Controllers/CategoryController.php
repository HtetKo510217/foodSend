<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function show() {
        return view('category.index',[
            'categories' => Category::paginate(4),
            'id_num' => 1,
        ]);
    }

    public function create() {
        return view('category.create');
    }

    public function store() {
       $formData =  request()->validate([
            'name' => ['required',Rule::unique('categories','name')],
            'slug' => ['required',Rule::unique('categories','slug')],
        ],[
            'name.required' =>'The category name field is required.',
            'slug.required' =>'The category slug field is required.',
        ]);
        // dd($formData);
        Category::create($formData);

        return redirect('/admin/categories');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('category.edit',[
            'category' => $category,
        ]);
    }

    public function update($id) {
        request()->validate([
            'name' => ['required',Rule::unique('categories','name')->ignore($id)],
            'slug' => ['required',Rule::unique('categories','slug')->ignore($id)],
        ],[
            'name.required' =>'The category name field is required.',
            'slug.required' =>'The category slug field is required.',
        ]);
    
       $category = Category::find($id);
       $category->name = request('name');
       $category->slug = request('slug');
       $category->save();

       return redirect('/admin/categories');
        
    }

    public function destory($id) {
       Category::findOrFail($id)->delete();
       return redirect('/admin/categories');
    }

}
