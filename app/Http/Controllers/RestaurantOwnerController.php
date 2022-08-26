<?php

namespace App\Http\Controllers;

use App\Models\RestaurantOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RestaurantOwnerController extends Controller
{
    public function show() {
        return view('restaurant_owner.index',[
            'owners' => RestaurantOwner::paginate(5),
            'id_num' => 1,
        ]);
    }
    public function create() {
        return view('restaurant_owner.create');
    }
    public function store() {
        $formData = request()->validate([
            'name' => ['required'],
            'email' => ['required',Rule::unique('restaurant_owners','email')],
            'password' =>['required','max:255','min:8'],
            'address' =>['required'],
            'phone' => ['required'],
        ]);
        $formData['password'] = Hash::make(request()->pssword);
        RestaurantOwner::create($formData);
        return redirect('/admin/restaurant_owners');
    }

    public function edit($id) {
        $owner = RestaurantOwner::findOrFail($id);
        return view('restaurant_owner.edit',[
            'owner' => $owner,
        ]);
    }
    public function update($id) {
        $formData = request()->validate([
            'name' => ['required'],
            'email' => ['required',Rule::unique('restaurant_owners','email')->ignore($id)],
            'address' =>['required'],
            'phone' => ['required'],
        ]);

        $owner = RestaurantOwner::findOrFail($id);
        $owner->name = request('name');
        $owner->email = request('email');
        $owner->password = request('password') ? Hash::make(request('password')) :$owner->password ;
        $owner->address = request('address'); 
        $owner->phone = request('phone');

        $owner->save();

        return redirect('/admin/restaurant_owners');
    }

    public function destory($id) {
        RestaurantOwner::findOrFail($id)->delete();
        return redirect('/admin/restaurant_owners');
    }
}
