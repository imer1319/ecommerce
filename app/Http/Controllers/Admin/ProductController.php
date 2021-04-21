<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products_index')->only(['index','dataTable']);
        $this->middleware('permission:products_create')->only(['create','store']);
        $this->middleware('permission:products_edit')->only(['edit','update']);
        $this->middleware('permission:products_show')->only('show');
        $this->middleware('permission:products_destroy')->only('destroy');
    }

    public function dataTable()
    {
        $product = Product::select('id','name','price','slug','category_id')->get();
        return DataTables::of($product)
            ->addColumn('category',function (Product $product){
                return $product->category->name;
            })
            ->addColumn('tags', function (Product $product){
                $return = '';
                foreach ($product->tags as $key=>$tag){
                    $return .= '<span class="badge badge-primary mr-1 my-1">'.$tag->name.'</span>';
                    if ($key%3 == 1){
                        $return.='<br>';
                    }
                }
                return $return;
            })
            ->addColumn('image', function (Product $product) {
                $path = $product->image->url;
                return '<img src="' .'/image/'. $path . '" class="avatar rounded-circle shadow-sm border" align="center" />';
            })
            ->addColumn('btn', 'admin.products.partials.btn')
            ->rawColumns(['btn','image','tags','category'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::pluck('name', 'id');
        $product = new Product();
        return view('admin.products.create', compact('categories','tags','product'));
    }

    public function store(CreateProductRequest $request)
    {
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $path = time().$file->getClientOriginalName();
            $file->move(public_path().'/image',$path);
        }
        $image = new Image(['url' => $path]);
        $product = Product::create($request->validated());
        $product->tags()->sync($request->input('tags', []));
        $product->image()->save($image);
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        $product->load( 'tags');

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::pluck('name', 'id');
        $product->load( 'tags');
        return view('admin.products.edit', compact('categories', 'tags', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->except('url'))->save();
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $path = time().$file->getClientOriginalName();
            $file->move(public_path().'/image',$path);
            $file_path = public_path().'/image/'.$product->image->url;
            if(is_file($file_path)){unlink($file_path);}

            $image = Image::findOrFail($product->image->id);
            $image->update([
                'url' => $path,
                'imageable_type' => 'App\Models\Product',
                'imageable_id' => $product->id
            ]);
        }
        $product->tags()->sync($request->input('tags', []));
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
