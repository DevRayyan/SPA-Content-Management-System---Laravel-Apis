<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ParentCategory;

class CategoryController extends Controller
{
    public function Category()
    {

        $Parentcategory = ParentCategory::get();
        $category = Category::where("status", "1")->get();
        $AllCategory = ["parent category" => $Parentcategory, "sub category" => $category];
        return $AllCategory;
    }
}
