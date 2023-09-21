<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return response()
            ->view('admin.categories.index', [
                'categories' => $categories
            ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/admin/categories');
    }

    public function show(Category $category)
    {
        return response()
            ->view('admin.categories.show', [
                'category' => $category
            ]);
    }

    public function update(Request $request)
    {
        $category = Category::where('id',$request->category_id)->first();
        $category->name = $request->name;
        $category->update();
        return back();
    }


    public function destroy(Category $category){
        $category->delete();
        return redirect('/admin/categories');
    }
}
