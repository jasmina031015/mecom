<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;


class VendorProductController extends Controller
{
    public function VendorAllProduct(){

        $id = Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all',compact('products'));
    }
    // End VendorAllProduct


    public function VendorAddProduct(){

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('vendor.backend.product.vendor_product_add',compact('brands','categories'));

    }
    // End VendorAddProduct


    public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);

    }
    // End VendorGetSubCategory





}
