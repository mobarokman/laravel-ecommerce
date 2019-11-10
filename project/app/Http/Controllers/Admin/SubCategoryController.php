<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Model\Category;
use App\Model\Subcategory;
use Validator;

class SubCategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('admin.sub_category.manage_sub_category', ['category' => $category]);
        
    }

    public function subCategoryData(Request $request){
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"] = $request->input("page", 1);
        $data["search"] = $search = $request->search;       

        $data["subcategory"] = Subcategory::when($search, function($query) use ($search){
            $query->where("sub_categories.sub_category_name", "LIKE", "%{$search}%");
        })
        ->latest()
        ->paginate($data["perPage"]);

        return view("admin.sub_category.sub_category_data", $data);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $cat_name = $request->category_name;
        $sub_cat_name = $request->sub_category_name;
        $slug = Str::slug($request->sub_category_name);
        $des = $request->description;
        $status = "0";
        
        $photo = $request->Input('photo', 'default.png');
    
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'sub_category_name' => 'required',
            'description' => 'required',
            // 'photo' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            // return redirect(route('category.index'))
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
          
        } else {
            $category = new Subcategory;
            $category->category_id = $cat_name;
            $category->sub_category_name = $sub_cat_name;
            $category->slug = $slug;
            $category->description = $des;
            $category->photo = $photo;
            $category->status = $status;
            $category->save();
        }
       //return redirect(route('category.index'));
        return response()->json([
        'fail' => false,
        'redirect_url' => route('admin.sub-category.index'),
        'message' => 'Successfully created a new category',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
