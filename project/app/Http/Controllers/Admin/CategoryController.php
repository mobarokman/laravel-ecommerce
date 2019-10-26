<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Category;
use Validator;

use Carbon\Carbon;
class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::paginate(10);
        return view('category.manage_category',  ['category' => $category]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $cat_name = Str::slug( $request->category_name);
        $des = $request->description;
        $photo = $request->photo;
        $status = "1";
       

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'description' => 'required',
            'photo' => 'required',
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
            $category->description = $des;
            $category->photo = $photo;
            $category->status = $status;
            $category->save();
        }
       //return redirect(route('category.index'));
        return response()->json([
        'fail' => false,
        'redirect_url' => route('category.index'),
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
