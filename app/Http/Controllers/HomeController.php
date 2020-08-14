<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductFeature;
use App\Models\Services;
use App\Models\Slider;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{


    public function index()
    {
        $data = [];
        $data['sliders'] = Slider::where('status', 1)->orderBy('orderBy', 'asc')->get();
        $data['services'] = Services::where('status', 1)->orderBy('orderBy', 'asc')->get();
        $data['brands'] = Brand::where('status', 1)->orderBy('name', 'asc')->get();
        $data['categories'] = Category::where('papular', 1)->where('status', 1)->orderBy('orderBy', 'asc')->get();
        $data['products'] = Product::get();
        return view('frontend.home')->with($data);
    }

    public function category(Request $request)
    {

        $products = new Product();
        $specifications = ProductAttribute::orderBy('id', 'asc');
        if($request->catslug) {
            $data['category'] = Category::where('slug', $request->catslug)->first();
            $data['filterCategories'] = $data['category']->get_subcategory;
            //get product attribute by category id
            $specifications->orWhere('category_id', $data['category']->id);

            //get product by category id
            $products = $products->where('category_id', $data['category']->id);
        }
        if(!$request->subslug && !$request->childslug && $request->catslug){
            $specifications->orWhere('category_id', $data['category']->id)
                ->orWhereIn('category_id',  $data['filterCategories']->pluck('id'))
                ->orWhereIn('category_id',  $data['category']->get_subchild_category->pluck('id'));
        }
        if($request->subslug) {
            $data['category'] = Category::where('slug', $request->subslug)->first();
            $data['filterCategories'] = $data['category']->get_subchild_category;
            //get product attribute by sub category id
            $specifications->orWhere('category_id', $data['category']->id);
            //get product by sub category id
            $products = $products->where('subcategory_id', $data['category']->id);
        }
        if($request->childslug) {
            $data['category'] = Category::where('slug', $request->childslug)->first();
            $data['filterCategories'] = Category::where('subcategory_id', $data['category']->subcategory_id)->get();
            //get product attribute by child category id
            $specifications->orWhere('category_id', $data['category']->id);
            $products = $products->where('childcategory_id', $data['category']->id);
        }
        //check search keyword
        if($request->q) {
            $products = $products->where('title', 'like', '%' . $request->q . '%');
        }

        //check ratting
        if($request->ratting) {
            $products = $products->where('avg_ratting', $request->ratting);
        }

        //check brand
        if($request->brand) {
            $products = $products->where('brand_id', $request->brand);
        }
        //check orderby
        if($request->sortby) {
            $products = $products->orderBy('id', $request->sortby);
        }

        //check price keyword
        if($request->price){
            $price = explode(',',  $request->price);
            $products = $products->whereBetween('selling_price', [$price[0],$price[1]]);
        }

        $data['specifications'] = $specifications->get();

        //check weather ajax request identify filter parameter

            foreach ($data['specifications'] as $filterAttr) {
                $filter = strtolower($filterAttr->name);
                if ($request->$filter) {
                    if(!is_array($request->$filter)){ // direct url tags
                        $tags = explode(',', $request->$filter);
                    }else{ // filter by ajax
                        $tags = implode(',', $request->$filter);
                    }
                    //get product id from url filter id (size=1,2)
                    $productsFilter = ProductFeature::whereIn('attributeValue_id', $tags)->groupBy('product_id')->get()->pluck('product_id');

                    $products = $products->whereIn('id', $productsFilter);
                }
            }

            $data['products'] = $products->paginate(10);
            if($request->filter){
                return view('frontend.products.filter_products')->with($data);
            }else{
                $data['brands'] = Brand::where('category_id', $data['category']->id)->where('status', 1)->get();
                return view('frontend.products.category')->with($data);
            }
    }
    //search products
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required'
        ]);

        if(!$request->q){
            return redirect('/');
        }
        $search = Product::where('title', 'like', '%' . $request->q . '%');
        if ($request->cat){
            $search->join('categories', 'products.category_id', 'categories.id');
            $search->where('categories.slug', $request->cat);
        }
        $search = $search->first();
        $data['products'] = $data['specifications'] = $data['category'] = $data['filterCategories'] = $data['brands'] = [];
        //dd($get_products);
        if($search) {
            $products = new Product();
            $specifications = ProductAttribute::orderBy('id', 'asc');
            if ($search->category_id) {
                $data['category'] = Category::where('id', $search->category_id)->first();
                $data['filterCategories'] = $data['category']->get_subcategory;
                //get product attribute by category id
                $specifications->where('category_id', $data['category']->id);

                //get product by category id
                $products = $products->where('category_id', $data['category']->id);
            }
            if (!$search->childcategory_id && !$search->subcategory_id && $search->category_id) {
                $specifications->orWhere('category_id', $data['category']->id)
                    ->orWhereIn('category_id', $data['filterCategories']->pluck('id'))
                    ->orWhereIn('category_id', $data['category']->get_subchild_category->pluck('id'));
            }
            if ($search->subcategory_id) {
                $data['category'] = Category::where('id', $search->subcategory_id)->first();
                $data['filterCategories'] = $data['category']->get_subchild_category;
                //get product attribute by sub category id
                $specifications->where('category_id', $data['category']->id);
                //get product by sub category id
                $products = $products->where('subcategory_id', $data['category']->id);
            }
            if ($search->childcategory_id) {
                $data['category'] = Category::where('id', $search->childcategory_id)->first();
                $data['filterCategories'] = Category::where('subcategory_id', $data['category']->subcategory_id)->get();
                //get product attribute by child category id
                $specifications->where('category_id', $data['category']->id);
                $products = $products->where('childcategory_id', $data['category']->id);
            }
            //check search keyword
            if ($request->q) {
                $products = $products->where('title', 'like', '%' . $request->q . '%');
            }

            //check ratting
            if ($request->ratting) {
                $products = $products->where('avg_ratting', $request->ratting);
            }

            //check brand
            if ($request->brand) {
                $products = $products->where('brand_id', $request->brand);
            }
            //check orderby
            if (isset($request->sortby) && $request->sortby) {
                $products = $products->orderBy('id', $request->sortby);
            }

            //check price keyword
            if ($request->price) {
                $price = explode(',', $request->price);
                $products = $products->whereBetween('selling_price', [$price[0], $price[1]]);
            }

            $data['specifications'] = $specifications->get();

            //check weather ajax request identify filter parameter

            foreach ($data['specifications'] as $filterAttr) {
                $filter = strtolower($filterAttr->name);
                if ($request->$filter) {
                    if (!is_array($request->$filter)) { // direct url tags
                        $tags = explode(',', $request->$filter);
                    } else { // filter by ajax
                        $tags = implode(',', $request->$filter);
                    }
                    //get product id from url filter id (size=1,2)
                    $productsFilter = ProductFeature::whereIn('attributeValue_id', $tags)->groupBy('product_id')->get()->pluck('product_id');

                    $products = $products->whereIn('id', $productsFilter);
                }
            }

            $data['products'] = $products->paginate(10);
            $data['brands'] = Brand::where('category_id', $data['category']->id)->where('status', 1)->get();
        }
        if($request->filter){
            return view('frontend.products.filter_products')->with($data);
        }else{
            return view('frontend.products.search_products')->with($data);
        }
    }

    public function apicategory(Request $request)
    {

        $products = new Product();
        if($request->childslug) {

            $category = Category::where('slug', $request->childslug)->first();
            $products = $products->where('childcategory_id', $category->id);
        }
        elseif($request->subslug) {
            $category = Category::where('slug', $request->subslug)->first();
            $products = $products->where('subcategory_id', $category->id);
        }
        else {
            $category = Category::where('slug', $request->catslug)->first();
            $products = $products->where('category_id', $category->id);
        }

        if($request->q) {
            $products = $products->where('title', 'like', '%' . $request->q . '%');
        }


        $products = $products->paginate(1);


        return new ProductCollection($products);
    }

    public function product_details($slug)
    {
        $data['product'] = Product::with('user:id,name','get_category')->where('slug', $slug)->where('status', 1)->first();

        if($data['product']) {
            $data['product']->increment('views'); // news view count
            $data['related_products'] = Product::where('category_id', $data['product']->category_id)->where('id', '!=', $data['product']->id)->where('status', 1)->take(8)->get();
            //dd($data['product']->get_features);

            return view('frontend.products.product_details')->with($data);
        }else{
            return view('frontend.404');
        }
    }

    public function filter(Request $request){
        echo $request->filter;
    }

    public function water(Request $request){
        echo view('frontend.watermark');
    }
    public function cart()
    {
        return view('frontend.carts.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }

    public function my_account()
    {
        return view('frontend.my-account');
    }
}
