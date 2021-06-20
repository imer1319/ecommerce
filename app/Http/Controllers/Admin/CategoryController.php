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
    public function __construct()
    {
        $this->middleware('permission:categories_index')->only(['index','dataTable']);
        $this->middleware('permission:categories_create')->only(['create','store']);
        $this->middleware('permission:categories_edit')->only(['edit','update']);
        $this->middleware('permission:categories_show')->only('show');
        $this->middleware('permission:categories_destroy')->only('destroy');
    }

    public function dataTable()
    {
        return DataTables::of(Category::select('id', 'name', 'slug','icon'))
            ->addColumn('icon', function (Category $category) {
                return "<i class='$category->icon'></i>";
            })
            ->addColumn('btn', 'admin.categories.partials.btn')
            ->rawColumns(['btn', 'icon'])
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
        Category::create($request->validated());
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
