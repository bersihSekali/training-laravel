<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = PostCategory::latest()->get();
        return view('post-category.index', [
            'title' => 'Post Category',
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post-category.create', ['title' => 'Add Post Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $create = PostCategory::create($validated);

        if(!$create){
            return redirect('/post-category/create')->with('error', 'Create category failed!');    
        } else {
            return redirect('/post-category')->with('success', 'Create category success!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        $datas = PostCategory::find($postCategory['id']);

        return view('post-category.edit', [
            'title' => 'Edit Post Category',
            'datas' => $datas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = PostCategory::find($id);
        $input = $request->except('_token', '_method');
        $edit->update($input);

        if(!$edit){
            return redirect('/post-category/{{ $id }}/edit')->with('error', 'Edit category failed!');    
        } else {
            return redirect('/post-category')->with('success', 'Edit category success!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PostCategory::find($id);
        $data->delete();

        return redirect('/post-category')->with('success', 'Delete category success!');
    }
}
