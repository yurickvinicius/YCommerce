<?php

namespace YCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use YCommerce\Category;
use YCommerce\Http\Requests;
use YCommerce\Product;
use YCommerce\ProductImage;
use YCommerce\Tag;

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

    public function images($id){
        $product = $this->productModel->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id){
        $product = $this->productModel->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id){

        $image = $productImage->find($id);

        if(file_exists(public_path('/uploads/'.$image->id.'.'.$image->extension)))
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images',['id'=>$product->id]);

    }

    public function tags($id){
        $product = $this->productModel->find($id);
        return view('products.tags', compact('product'));
    }

    public function createTag(Tag $tag, $id){
        $tags = $tag->lists('name','id');
        $product = $this->productModel->find($id);
        return view('products.create_tag', compact('tags','product'));
    }

    public function storeTag(Request $request, $id){
        $product = $this->productModel->find($id);
        $product->tags()->attach($request->input('tag_id'));

        return redirect()->route('products.tags', ['id'=>$id]);
    }

    public function destroyTag($product_id, $tag_id){
        $product = $this->productModel->find($product_id);
        $product->tags()->detach($tag_id);

        return redirect()->route('products.tags', ['id'=>$product_id]);
    }
}