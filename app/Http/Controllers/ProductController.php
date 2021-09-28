<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCartResource;
use App\Http\Resources\AdminProductResource;
use App\Http\Resources\ProductDetailsResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page') ?? null;
        return AdminProductResource::collection(Product::paginate($perPage)->appends(['per_page' => $perPage]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'sex' => 'required',
        ]);
        $product = Product::create([
                        'title' => $request->input('title'),
                        'slug' => Str::slug($request->input('title')),
                        'description' => $request->input('description'),
                        'price' => $request->input('price'),
                        'brand_id' => $request->input('brand_id'),
                        'category_id' => $request->input('category_id')
                    ]);
        $product->sexes()->sync($request->input('sex'));
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductDetailsResource(Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

    /**
     * search by title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $perPage = $request->input('per_page') ?? null;
        return ProductResource::collection(Product::filter()->paginate($perPage)->appends($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        return ProductCartResource::collection(Product::filter()->get());
    }
}
