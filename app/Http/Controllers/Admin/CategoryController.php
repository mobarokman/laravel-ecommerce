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
use Carbon\Carbon;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('admin.category.manage_category');
    }

    public function categoryData(Request $request){
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"] = $request->input("page", 1);
        $data["search"] = $search = $request->search;       
        $data["subCat"] = Subcategory::all();
        $data["category"] = Category::when($search, function($query) use ($search){
            $query->where("categories.category_name", "LIKE", "%{$search}%");
        })
        ->latest()
        ->paginate($data["perPage"]);

        // dd($data["category"]);
        return view("admin.category.category_data", $data);
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $cat_name = $request->category_name;
        $slug = Str::slug( $request->category_name);
        $des = $request->description;
        $status = "1";
        
        $photo = $request->Input('photo', 'default.png');
    
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
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
            $category = new Category;
            $category->category_name = $cat_name;
            $category->slug = $slug;
            $category->description = $des;
            $category->photo = $photo;
            $category->status = $status;
            $category->save();
        }
       //return redirect(route('category.index'));
        return response()->json([
        'fail' => false,
        'redirect_url' => route('admin.category.index'),
        'message' => 'Successfully created a new category',
        ]);
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit_category', ['category' => $category]);
    }

    
    public function update(Request $request, $category_id)
    {
        $cat_name = $request->category_name;
        $slug = Str::slug( $request->category_name);
        $des = $request->description;
        $status = $request->status;
        
        $photo = $request->Input('photo', 'default.png');
    
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'description' => 'required',
            // 'photo' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validator->fails()) {
            // return redirect(route('admin.category.edit'))
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
          
        } else {
            $category = Category::find($category_id);
            $category->category_name = $cat_name;
            $category->slug = $slug;
            $category->description = $des;
            $category->photo = $photo;
            $category->status = $status;
            $category->save();
        }
        //return redirect(route('admin.category.index'));
        return response()->json([
        'fail' => false,
        'message' => 'Successfully created a new category',
        ]);
    }

 
    public function destroy($category_id)
    {
        Category::find($category_id)->delete();
        return response()->json([
            'message' => 'Successfully deleted'
        ]);
    }
}
