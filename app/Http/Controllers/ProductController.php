<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct',['categories'=>$categories,'manufacturers'=>$manufacturers]);
    }

    public function storeProduct(Request $request)
    {
        $this->productValidate($request);

        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'ProductImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath.$imageName;

        $this->saveProduct($request, $imageUrl);

        return redirect('/product/manage-product')->with('message', 'New Product Created Successfully');


    }

    public function manageProduct()
    {
        $products =DB::table('products')
            ->join('categories','products.categoryId','=', 'categories.id')
            ->join('manufacturers','products.manufacturerId','=', 'manufacturers.id')
            ->select('products.id','products.productName','products.productPrice','products.productQuantity','products.publicationStatus','categories.categoryName','manufacturers.manufacturerName')
            ->get();

        return view('admin.product.manageProduct',['products'=>$products]);
    }

    public function viewProduct($id)
    {
        $productById = DB::table('products')
            ->join('categories','products.categoryId','=','categories.id')
            ->join('manufacturers','products.manufacturerId','=','manufacturers.id')
            ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
            ->where('products.id','=',$id)
            ->first();

        return view('admin.product.viewProduct',['product'=>$productById]);
    }

    public function editProduct($id)
    {
        $categories = Category::where('publicationStatus',1)->get();
        $manufacturers = Manufacturer::where('publicationStatus',1)->get();
        $productById = Product::where('id', $id)->first();


        return view('admin.product.editProduct',['categories'=>$categories, 'manufacturers'=>$manufacturers,'productById'=>$productById ]);
    }

    public function updateProduct(Request $request)
    {
        $validator = $this->customProductValidation($request);
        if ($validator->fails()) {

//          get the error messages from the validator

            $messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);

        } else {
            $imageUrl = $this->imageExitStatus($request);

            $product = Product::where('id',$request->productId)->first();
            $product->productName = $request->productName;
            $product->categoryId = $request->categoryId;
            $product->manufacturerId = $request->manufacturerId;
            $product->productPrice = $request->productPrice;
            $product->productQuantity = $request->productQuantity;
            $product->productShortDescription = $request->productShortDescription;
            $product->productLongDescription = $request->productLongDescription;
            $product->productImage =$imageUrl;
            $product->publicationStatus = $request->publicationStatus;
            $product->save();


            return redirect('/product/manage-product')->with('message','Product Updated Successfully');
        }

    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

//      Delete Product's Image from directory
        unlink($product->productImage);

        return redirect('/product/manage-product')->with('message','Product Deleted Successfully');
    }

    public function productValidate($request)
    {
        $this->validate($request,[
            'productName'=>'required',
            'categoryId'=>'required',
            'manufacturerId'=>'required',
            'productPrice'=>'required',
            'productQuantity'=>'required',
            'productShortDescription'=>'required',
            'productLongDescription'=>'required',
            'productImage'=>'required',
            'publicationStatus'=>'required',
        ]);

    }

    public function saveProduct($request, $imageUrl)
    {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage =$imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    private function imageExitStatus($request)
    {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->file('productImage');

        if($productImage) {
            if(file_exists($productById->productImage)){
                unlink($productById->productImage);
            }
            $imageName = $productImage->getClientOriginalName();
            $uploadPath = 'ProductImage/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath.$imageName;
        } else{
            $imageUrl = $productById->productImage;
        }

        return $imageUrl;

    }


    private function customProductValidation($request)
    {
        $rules = array(
            'productName'=>'required',
            'categoryId'=>'required',
            'manufacturerId'=>'required',
            'productPrice'=>'required',
            'productQuantity'=>'required',
            'productShortDescription'=>'required',
            'productLongDescription'=>'required',
            'publicationStatus'=>'required',
        );

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
