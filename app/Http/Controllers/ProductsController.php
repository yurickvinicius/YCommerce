<?php

namespace YCommerce\Http\Controllers;

use Illuminate\Http\Request;
use YCommerce\Category;
use YCommerce\Http\Requests;
use YCommerce\Product;

class ProductsController extends Controller
{

    protected $productModel;

    public function __construct(Product $product){
        $this->productModel = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ProductRequest $request)
    {
        $product = $this->productModel->fill($request->all());
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Category $category)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $request['featured'] = $request->has('featured') ? '1' : '0';
        $request['recomended'] = $request->has('recomended') ? '1' : '0';

        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete($id);
        return redirect()->route('products');
    }
}
