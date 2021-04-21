<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tags_index')->only(['index','dataTable']);
        $this->middleware('permission:tags_create')->only(['create','store']);
        $this->middleware('permission:tags_edit')->only(['edit','update']);
        $this->middleware('permission:tags_show')->only('show');
        $this->middleware('permission:tags_destroy')->only('destroy');
    }

    public function dataTable()
    {
        return DataTables::of(Tag::select('id','name','slug'))
            ->addColumn('btn','admin.tags.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.tags.index');
    }

    public function create()
    {
        return view('admin.tags.create', ['tag' => new Tag()]);
    }

    public function store(CreateTagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    public function update(UpdateTagRequest $request,Tag $tag)
    {
        $tag->fill($request->validated())->save();
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back();
    }
}
