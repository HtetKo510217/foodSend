<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function township() {
        return $this->belongsTo(Township::class);
    }

    public function scopeFilter($query,$filter) {
        $query->when($filter['search'] ?? false,function($query,$search){

            $query -> where(function($query) use($search){
                $query->where('name','LIKE','%'.$search.'%');
            });

        });

        $query->when($filter['category'] ?? false,function($query,$slug){

            $query->whereHas('category',function($query) use($slug) {
                $query ->where('slug',$slug);
            });

        });
        $query->when($filter['township'] ?? false , function($query,$township){
            $query->whereHas('township',function($query) use($township) {
                $query ->where('name',$township);
            });
        });
    }
}
