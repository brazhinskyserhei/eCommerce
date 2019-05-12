<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return response()->json($categories,200);
    }

    public function store(CategoryRequest $categoryRequest)
    {

        $category = Category::create([
			'name'=> $categoryRequest['name'],
			'status'=> $categoryRequest['status']
		]);
        return response()->json(['data' => $category
        ], 201);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
