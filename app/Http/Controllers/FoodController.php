<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use App\Models\Restaurant;
use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FoodController extends Controller
{
    public function show() {
        return view('foods.index',[
            'foods' => Foods::with('category','restaurant')->paginate(5),
            'id_num' =>1,
        ]);
    }
    public function create() {
       return view('foods.create',[
        'categories' => Category::all(),
        'restaurants' => Restaurant::all(),
        'townships' => Township::all(),
       ]);
    }

    public function store() {
       $formData = request()->validate([
            'name' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
            'category_id' => ['required',Rule::exists('categories','id')],
            'restaurant_id' => ['required',Rule::exists('restaurants','id')],
            'township_id' => ['required',Rule::exists('townships','id')],
        ]);
        $formData['image'] = request()->file('image')->store('image');
        Foods::create($formData);
        return redirect('/admin/foods')->with('success','Foods created successfully');
    }

    public function edit($id) {
        $food = Foods::findOrFail($id);
        return view('foods.edit',[
            'food' => $food,
            'categories' => Category::all(),
            'restaurants' => Restaurant::all(),
            'townships' => Township::all(),
        ]);
    }

    public function update($id) {
        $food = Foods::findOrFail($id);
        $formData = request()->validate([
            'name' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
            'category_id' => ['required',Rule::exists('categories','id')],
            'restaurant_id' => ['required',Rule::exists('restaurants','id')],
        ]);
        $formData['image'] = request('image') ? request()->file('image')->store('image') : $food->image ;

        $food->update($formData);
        return redirect('/admin/foods')->with('success','Foods Updated successfully');
    }

    public function destory($id) {
        Foods::findOrFail($id)->delete();
        return redirect('/admin/foods')->with('success','Foods Deleted successfully');
    }
}
