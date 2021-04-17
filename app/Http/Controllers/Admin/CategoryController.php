<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function dataTable()
    {
        return DataTables::of(Category::select('id', 'name', 'slug'))
            ->addColumn('image', function (Category $category) {
                $path = $category->image->url;
                return '<img src="' .'/image/'. $path . '" class="avatar rounded-circle shadow-sm border" align="center" />';
            })
            ->addColumn('btn', 'admin.categories.partials.btn')
            ->rawColumns(['btn', 'image'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create', ['category' => new Category()]);
    }

    public function store(CreateCategoryRequest $request)
    {
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $path = time().$file->getClientOriginalName();
            $file->move(public_path().'/image',$path);
        }
        $image = new Image(['url' => $path]);
        $category = Category::create($request->validated());
        $category->image()->save($image);
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->except('url'))->save();
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $path = time().$file->getClientOriginalName();
            $file->move(public_path().'/image',$path);
            $file_path = public_path().'/image/'.$category->image->url;
            if(is_file($file_path)){unlink($file_path);}

            $image = Image::findOrFail($category->image->id);
            $image->update([
                'url' => $path,
                'imageable_type' => 'App\Models\Category',
                'imageable_id' => $category->id
            ]);
        }

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
