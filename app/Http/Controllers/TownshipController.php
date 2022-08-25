<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TownshipController extends Controller
{
    public function show() {
        return view('township.index',[
            'townships' => Township::paginate(4),
            'id_num' => 1,
        ]);
    }

    public function create() {
        return view('township.create');
    }

    public function store() {
       $formData =  request()->validate([
            'name' => ['required',Rule::unique('townships','name')],
            'slug' => ['required',Rule::unique('townships','slug')],
        ],[
            'name.required' =>'The Township name field is required.',
            'slug.required' =>'The Township slug field is required.',
        ]);
        // dd($formData);
        Township::create($formData);

        return redirect('/admin/townships');
    }

    public function edit($id) {
        $township = Township::findOrFail($id);
        return view('Township.edit',[
            'township' => $township,
        ]);
    }

    public function update($id) {
        request()->validate([
            'name' => ['required',Rule::unique('townships','name')->ignore($id)],
            'slug' => ['required',Rule::unique('townships','slug')->ignore($id)],
        ],[
            'name.required' =>'The Township name field is required.',
            'slug.required' =>'The Township slug field is required.',
        ]);
    
       $township = Township::find($id);
       $township->name = request('name');
       $township->slug = request('slug');
       $township->save();

       return redirect('/admin/townships');
        
    }

    public function destory($id) {
       Township::findOrFail($id)->delete();
       return redirect('/admin/townships');
    }

}
