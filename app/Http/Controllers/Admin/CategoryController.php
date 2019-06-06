<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:1000',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
            'logo' => 'nullable|image'
        ]);

        $category = Category::add($request->all());
        $category->uploadImage($request->file('logo'), 'categories', 'logo');
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit', [
            'category' => Category::find($id)
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:1000',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
            'logo' => 'nullable|image'
        ]);

        $category = Category::find($id);
        $category->edit($request->all());
        $category->uploadImage($request->file('logo'), 'categories', 'logo');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->remove();

        return redirect()->route('categories.index');
    }
}
