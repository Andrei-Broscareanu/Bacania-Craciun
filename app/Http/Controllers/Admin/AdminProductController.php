<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Sopamo\LaravelFilepond\Filepond;
use Symfony\Component\String\Slugger\SluggerInterface;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return response()
            ->view('admin.products.index', [
                'products' => $products
            ]);
    }

    public function create(){
        return view('admin.products.create');
    }

    public function addCategory(Request $request){
        $product = Product::where('id',$request->product_id)->first();
        $category = Category::where('name',$request->category_name)->first();
        if(!$product->categories->contains($category->id)){
            $product->categories()->attach($category->id);
        }
        return back();
    }

    public function removeCategory(Request $request){
        $product = Product::find($request->product_id);
        $category = Category::find($request->category_id);

        $categoryProduct = CategoryProduct::where('category_id', $category->id)
            ->where('product_id', $product->id)
            ->first();

        $categoryProduct->delete();

        return back();
    }

    public function removeImage(Request $request){
        $image = Image::where('id',$request->image_id);
        $image->delete();
        return back();
    }

    public function update(Request $request,Product $product){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'details'=> 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if($request->status === 'published'){
            $product->published = 1;
        } elseif($request->status === 'not_published'){
            $product->published = 0;
        }
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->details = $validatedData['details'];
        $product->description = $validatedData['description'];
        $product->save();

        $fileponds = $request->file;
        foreach ($fileponds as $serverId) {
            if (!$serverId)
                continue;
            $filepond = app(Filepond::class);
            $path = $filepond->getPathFromServerId($serverId);
            $image = new Image();
            $image->filename = $path;
            Storage::move($path, '/public/' . $path);
            $product->images()->save($image);
            $product->save();
        }

        return back();
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details'=> 'required',
            'description' => 'nullable|string',
        ]);

        $product = new Product($validatedData);
        $product->quantity = $request->quantity;
        $product->slug = Str::slug($request->name);

        $product->save();
        $fileponds = $request->file;
        foreach ($fileponds as $serverId) {
            if (!$serverId)
                continue;
            $filepond = app(Filepond::class);
            $path = $filepond->getPathFromServerId($serverId);
            $image = new Image();
            $image->filename = $path;
            Storage::move($path, '/public/' . $path);
            $product->images()->save($image);
            $product->save();
        }
        return redirect('/admin/products');
    }

    public function show(Product $product){
        $categories = Category::all();
        return view('admin.products.show',compact('product','categories'));
    }



}
