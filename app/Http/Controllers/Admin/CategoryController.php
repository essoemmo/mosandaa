<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $categoriesDataTable)
    {
        $categories = Category::orderBy('id','DESC')->get();
        return $categoriesDataTable->render('admin.categories.index',compact('categories'));
    }

    public function store(StoreCategory $request)
    {
        $categoryData = $request->safe()->except(['image']);
        $category = Category::create($categoryData);
        return response()->json(['status' => 'success', 'data' => $category]);
    }

    public function categoryStatus(Request $request)
    {
        $category = Category::find($request->category_id)->update(['active' => $request->active]);
        return response()->json(['status' => 'success', 'data' => $category]);
    }

    public function update(UpdateCategory $request, $id)
    {
        $categoryData = $request->safe()->except(['image']);
        $category = Category::find($id)->update($categoryData);
        return response()->json(['status' => 'success', 'data' => $category]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['status' => 'success']);
    }
}
