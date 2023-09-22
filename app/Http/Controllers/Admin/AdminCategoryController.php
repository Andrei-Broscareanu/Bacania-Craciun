<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Sopamo\LaravelFilepond\Filepond;

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

        $fileponds = $request->file;
        foreach ($fileponds as $serverId) {
            if (!$serverId)
                continue;
            $filepond = app(Filepond::class);
            $path = $filepond->getPathFromServerId($serverId);
            $image = new Image();
            $image->filename = $path;
            Storage::move($path, '/public/' . $path);
            $category->images()->save($image);
            $category->save();
        }
        return redirect('/admin/categories');
    }

    public function removeImage(Request $request){
        $image = Image::where('id',$request->image_id);
        $image->delete();
        return back();
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
        $fileponds = $request->file;
        foreach ($fileponds as $serverId) {
            if (!$serverId)
                continue;
            $filepond = app(Filepond::class);
            $path = $filepond->getPathFromServerId($serverId);
            $image = new Image();
            $image->filename = $path;
            Storage::move($path, '/public/' . $path);
            $category->images()->save($image);
            $category->save();
        }

        return back();


    }


    public function destroy(Category $category){
        $category->delete();
        return redirect('/admin/categories');
    }
}
