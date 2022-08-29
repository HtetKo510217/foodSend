<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantOwner;
use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RestaurantController extends Controller
{
    public function show() {
       return view('restaurants.index',[
        'restaurants' => Restaurant::with('township')->paginate(5),
        'id_num' => 1,
       ]);
    }

    public function create() {
        return view('restaurants.create',[
            'townships' =>Township::all(),
            'restaurants' =>RestaurantOwner::all(),
        ]);
    }

    public function store() {
       $formData = request()->validate([
            'name' => ['required'],
            'email' => ['required',Rule::unique('restaurants','email')],
            'phone' => ['required'],
            'address' =>['required'],
            'opening_duration' => ['required'],
            'township_id' =>['required',Rule::exists('townships','id')],
            'restaurant_owner_id' =>['required',Rule::exists('restaurant_owners','id')],
        ]);

       Restaurant::create($formData);
       return redirect('/admin/restaurants')->with('success','Restaurant created !!!');
    }

    public function edit($id) {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.edit',[
            'restaurant' => $restaurant,
            'townships' => Township::all(),
            'restaurants_owner' => RestaurantOwner::all(),
        ]);
    }

    public function update($id) {
        $formData = request()->validate([
            'name' => ['required'],
            'email' => ['required',Rule::unique('restaurants','email')->ignore($id)],
            'phone' => ['required'],
            'address' =>['required'],
            'opening_duration' => ['required'],
            'township_id' =>['required',Rule::exists('townships','id')],
            'restaurant_owner_id' =>['required',Rule::exists('restaurant_owners','id')],
        ]);
        
        Restaurant::findOrFail($id)->update($formData);

        return redirect('/admin/restaurants/')->with('success','Restaurant updated !!!');
    }

    public function destory($id) {
        Restaurant::findOrFail($id)->delete();
        return redirect('/admin/restaurants/')->with('success','Restaurant deleted !!!');
    }
}
