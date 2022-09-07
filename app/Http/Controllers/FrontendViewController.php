<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Foods;
use App\Models\Township;
use Illuminate\Http\Request;

class FrontendViewController extends Controller
{
    public function index() {
        return view('frontendview.index',[
            'foods' => Foods::latest()
                    ->filter(request(['search','category','township']))
                    ->paginate(4)
                    ->withQueryString(),
        ]);
    }
}
