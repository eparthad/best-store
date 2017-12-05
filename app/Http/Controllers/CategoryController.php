<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setVar = Category::tryOut();
        echo $setVar;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        return view('admin.category.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
            'publicationStatus'=>'required',
        ]);
//        return $request->all();
//        ****
//        $category = new Category();
//
//        $category->categoryName = $request->categoryName;
//        $category->categoryDescription = $request->categoryDescription;
//        $category->publicationStatus = $request->publicationStatus;
//        $category->save();
//
//        return "Category save successfully.";
//          ***
//        Category::create($request->all());
//        return "Category created successfully.";

        DB::table('categories')->insert([
            'categoryName'=>$request->categoryName,
            'categoryDescription'=>$request->categoryDescription,
            'publicationStatus'=>$request->publicationStatus,
            'created_at'=>Carbon::now(),
        ]);

//        return "Category created successfuully";
        return redirect('/category/manage-category')->with('message', 'Category created successfully.');
    }


    public function manageCategory()
    {
//        $categories = Category::all();
        $categories = DB::table('categories')->get();
        return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function editCategory($id)
    {
        $categoryById = Category::where('id',$id)->first();

        return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }

    public function updateCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
            'publicationStatus'=>'required',
        ]);
//        dd($request->all());
        Category::updateCategory($request);

        return redirect('/category/manage-category')->with('message','Category Updated Successfully.');
    }


    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category/manage-category')->with('message','Category Info Deleted Successfully.');
    }

}
