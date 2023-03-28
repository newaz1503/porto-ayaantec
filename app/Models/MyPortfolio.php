<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPortfolio extends Model
{
    use HasFactory;
    protected $table="my_portfolios";
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
