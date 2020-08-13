<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductAdditionalFeature;
use App\Models\ProductFeature;
use App\Traits\CreateSlug;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Mockery\Exception;

class ProductController extends Controller
{
    use CreateSlug;
    // get product lists function
    public function index()
    {
        $products = Product::with(['get_category', 'get_subcategory'])->orderBy('id', 'desc')->get();
        return view('admin.product.product-lists')->with(compact('products'));
    }

    // Add new product
    public function create()
    {
        $data['categories'] = Category::where('parent_id', '=', null)->where('status', 1)->get();
        return view('admin.product.product')->with($data);
    }

    //store new product
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'feature_image' => 'mimes:jpeg,jpg,png,gif'
        ]);
        // Insert product
        $data = new Product();
        $data->vendor_id = ($request->vendor_id ? $request->vendor_id : Auth::user()->vendor_id);
        $data->title = $request->title;
        $data->slug = $this->createSlug('products', $request->title);
        $data->description = $request->description;
        $data->category_id = $request->category;
        $data->subcategory_id = $request->subcategory;
        $data->childcategory_id = $request->childcategory;
        $data->brand_id = ($request->brand ? $request->brand : null);
        $data->purchase_price = $request->purchase_price;
        $data->selling_price = $request->selling_price;
        $data->discount = $request->discount;
        $data->stock = $request->stock;
        $data->total_stock = $request->stock;
        $data->manufacture_date = $request->manufacture_date;
        $data->expired_date = $request->expired_date;
        $data->shipping_time = $request->shipping_time;
        $data->meta_title = $request->meta_title;
        $data->meta_keywords = ($request->meta_keywords) ? implode(',', $request->meta_keywords) : null;
        $data->meta_description = $request->meta_description;
        $data->status = ($request->status ? 1 : 0);
        $data->created_by = Auth::id();
        //if feature image set
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $new_image_name = $this->uniqueImagePath('products', 'feature_image', $image->getClientOriginalName());

            $image_path = public_path('upload/images/product/thumb/' . $new_image_name);
            $image_resize = Image::make($image);
            $image_resize->resize(250, 250);
            $image_resize->save($image_path);

            $image->move(public_path('upload/images/product'), $new_image_name);

            $data->feature_image = $new_image_name;
        }

        $store = $data->save();

        if($store){
            //if attribute set
            if($request->attribute){
                foreach ($request->attribute as $attribute_id){
                    for ($i=0; $i< count($request->attributeValue[$attribute_id]); $i++){
                        //check weather attribute value set
                        if(array_key_exists($i, $request->attributeValue[$attribute_id])) {
                            $feature = new ProductFeature();
                            $feature->product_id = $data->id;
                            $feature->attribute_id = $attribute_id;
                            $feature->attributeValue_id = $request->attributeValue[$attribute_id][$i];
                            $feature->quantity = (isset($request->qty[$attribute_id]) && array_key_exists($i, $request->qty[$attribute_id]) ? $request->qty[$attribute_id][$i] : 0);
                            $feature->price = (isset($request->price[$attribute_id]) && array_key_exists($i, $request->price[$attribute_id]) ? $request->price[$attribute_id][$i] : 0);
                            $feature->color = (isset($request->color[$attribute_id]) && array_key_exists($i, $request->color[$attribute_id]) ? $request->color[$attribute_id][$i] : null);

                            //if attribute variant image set
                            if (isset($request->image[$attribute_id]) && array_key_exists($i, $request->image[$attribute_id])) {
                                $image = $request->image[$attribute_id][$i];
                                $new_variantimage_name = $this->uniqueImagePath('product_features', 'image', $image->getClientOriginalName());

                                $image_path = public_path('upload/images/product/varriant-product/thumb/' . $new_variantimage_name);
                                $image_resize = Image::make($image);
                                $image_resize->resize(250, 200);
                                $image_resize->save($image_path);

                                $image->move(public_path('upload/images/product/varriant-product'), $new_variantimage_name);
                                $feature->image = $new_variantimage_name;
                            }

                            $feature->save();
                        }
                    }
                }
            }

            if($request->extraAttribute){
                try {
                    for($x = 1; $x < count($request->name); $x++){
                        $extraFeature = new ProductAdditionalFeature();
                        $extraFeature->product_id = $data->id;
                        $extraFeature->name = $request->name[$x];
                        $extraFeature->value = $request->value[$x];
                        $extraFeature->save();
                    }
                }catch (Exception $exception){

                }

            }

            Toastr::success('Product Create Successfully.');
        }else{
            Toastr::error('Product Cannot Create.!');
        }

        return back();
    }

    public function show(Product $product)
    {
        //
    }

    //edit product
    public function edit(Product $product)
    {
        //
    }

    //update product
    public function update(Request $request, Product $product)
    {
        //
    }

    // delete prouct
    public function delete($id)
    {
        $delete = Product::where('id', $id)->delete();

        if($delete){
            $output = [
                'status' => true,
                'msg' => 'Product deleted successfully.'
            ];
        }else{
            $output = [
                'status' => false,
                'msg' => 'Product cannot deleted.'
            ];
        }
        return response()->json($output);
    }

    public function highlight(){
        echo view('admin.product.hightlight');
    }
}
