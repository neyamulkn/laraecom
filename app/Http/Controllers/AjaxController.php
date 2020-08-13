<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    //get sub category by category
    public function get_subcategory($cat_id){
    	$subcategories = Category::where('parent_id', $cat_id)->get();
        $output = '';
        if(count($subcategories)>0){
            $output .= '<option value="">Select Subcategory</option>';
            foreach($subcategories as $subcategory){
                $output .='<option '. (old("subcategory") == $subcategory->id ? "selected" : "" ).' value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
            }
        }
        echo $output;
    }

    // get childcategory by category
    public function get_subchild_category($subcat_id){
    	$subchildcategories = Category::where('subcategory_id', $subcat_id)->get();
        $output = '';
        if(count($subchildcategories)>0){
            $output .= '<option value="">Select Subcategory</option>';
            foreach($subchildcategories as $subchildcategory){
                $output .='<option '. (old("subcategory") == $subchildcategory->id ? "selected" : "" ).' value="'.$subchildcategory->id.'">'.$subchildcategory->name.'</option>';
            }
        }
        echo $output;
    }

    //get attribute by child category
    public function getAttributeByChildcategory($subcat_id){
    	$subchildcategories = Category::where('subcategory_id', $subcat_id)->get();
        $output = '';
        if(count($subchildcategories)>0){
            $output .= '<option value="">Select Subcategory</option>';
            foreach($subchildcategories as $subchildcategory){
                $output .='<option '. (old("subcategory") == $subchildcategory->id ? "selected" : "" ).' value="'.$subchildcategory->id.'">'.$subchildcategory->name.'</option>';
            }
        }
        echo $output;
    }

    // get attribute by category & sub category
    public function getAttributeByCategory($category_id){
    	$attributes = ProductAttribute::where('category_id', $category_id)->get();
    	$output = '';
    	if(count($attributes)>0){
    		$output = view('admin.product.attributedynamic-fields')->with(compact('attributes'));
    	}

    	echo $output;
    }

    // get brand
    public function getBrand($category_id){
    	$brands = Brand::where('category_id', $category_id)->orWhere('category_id', 0)->get();
    	$output = '';
    	if(count($brands)>0){
    		$output = '
	                <div class="form-group">
	                    <label class="required" for="brand">Brand </label>
	                    <select name="brand" style="width:100%" id="brand" class="form-control custom-select">
	                       <option value="">Select Brand</option>.';
	                      		foreach ($brands as $brand) {
	                      			$output .= '<option value="'.$brand->id.'">'.$brand->name.'</option>';
	                      		}
	                    $output .= '</select>
	                </div>
	            ';
    	}

    	echo $output;

    }

    public function getCartHead()
    {
        $user_id = Auth::id();
        $getCart = '';
        $sessionCart =  Session::get('cart');
        $user_id = null;
        if(Auth::check()){
            $getCart = Cart::where('user_id', $user_id)->get();
        }

        if($getCart || $sessionCart){
            echo view('frontend.carts.cart-head')->with(compact('getCart', 'sessionCart'));
        }else{
            echo '<h4 style="color:red;text-align: center;padding: 0px">Your cart is empty.</h4>';
        }

    }


}
