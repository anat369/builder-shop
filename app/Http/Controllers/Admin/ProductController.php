<?php

namespace App\Http\Controllers\Admin;

use App\{Product, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.products.index',[
            'products' => Product::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::pluck('title', 'id'),
        ]);
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
            'description' => 'required|max:3000',
            'image_0' => 'nullable|image',
            'image_1' => 'nullable|image',
            'image_2' => 'nullable|image',
            'image_3' => 'nullable|image',
            'price' => 'required|integer',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
        ]);

        $product = Product::add($request->all());
        for ($number = 0; $number <= 3; $number++)
        {
            $product->uploadImage($request->file('image_' . $number), 'products', 'image_'. $number);
        }

        $product->setCategories($request->get('categories'));

        return redirect()->route('products.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::pluck('title','id')->all(),
            'selectedCategories' => $product->categories->pluck('title', 'id')->all(),
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:3000',
            'image_0' => 'nullable|image',
            'image_1' => 'nullable|image',
            'image_2' => 'nullable|image',
            'image_3' => 'nullable|image',
            'price' => 'required|integer',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
        ]);

        $product = Product::find($id);
        $product->edit($request->all());
        for ($number = 0; $number <= 3; $number++)
        {
            $product->uploadImage($request->file('image_' . $number), 'products', 'image_'. $number);
        }
        $product->setCategories($request->get('categories'));

        return redirect()->route('products.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( int $id)
    {
        Product::find($id)->remove();

        return redirect()->route('products.index');
    }
}
