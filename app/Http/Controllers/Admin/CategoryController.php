<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
// use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        return view('admin.category.manage_category', compact('categories'));

    }

    public function categoryData(Request $request)
    {
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"] = $request->input("page", 1);
        $data["search"] = $search = $request->search;

//
        $data["categories"] = Category::with('parent')
            ->when($search, function ($query) use ($search) {
                $query->where("categories.category_name", "LIKE", "%{$search}%");
            })
            ->latest()
            ->paginate($data["perPage"]);

        return view("admin.category.category_data", $data);
    }

    public function store(Request $request)
    {

        $status = $request->has('status') ? 1 : 0;
        $featured = $request->has('featured') ? 1 : 0;
        $menu = $request > has('menu') ? 1 : 0;
        $photo = $request->file('photo');

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->slug = $request->category_name;
        $category->description = $request->des;
        $category->image = $photo;
        $category->featured = $featured;
        $category->menu = $menu;
        $category->status = $status;
        $category->save();

        return redirect('/');
    }

    public function show($id)
    {

    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit_category', ['category' => $category]);
    }

    public function update(Request $request, $category_id)
    {
        $cat_name = $request->category_name;
        $slug = Str::slug($request->category_name);
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
                'errors' => $validator->errors(),
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
            'message' => 'Successfully deleted',
        ]);
    }
}

// public function store(Request $request)
// {
//     $status = $request->has('status') ? 1 : 0;
//     $featured = $request->has('featured') ? 1 : 0;
//     $menu = $request > has('menu') ? 1 : 0;
//     $photo = $request->file('photo');

//     // if (isset($photo)) {
//     //     $photoname = $slug . '-' . uniqid() . '.' . $photo->extension();

//     //     if (!Storage::disk('public')->exists('category')) {
//     //         Storage::disk('public')->makeDirectory('category');
//     //     }
//     //     Storage::disk('public')->putFileAs('category/', $photo, $photoname);
//     // } else {
//     //     $photoname = "default.png";
//     // }

//     // $validator = Validator::make($request->all(), [
//     //     'category_name' => 'required',

//     // ]);

//     // if ($validator->fails()) {
//     //     return redirect(route('admin.category.index'))
//     //         ->withErrors($validator)
//     //         ->withInput();

//         //    return response()->json([
//         //     'fail' => true,
//         //     'errors' => $validator->errors(),
//         // ]);

// //        } else {
//         $category = new Category;
//         $category->category_name = $request->category_name;
//         $category->parent_id = $request->parent_id;
//         $category->slug = Str::slug($request->category_name);
//         $category->description = $request->description;
//         $category->image = $photoname;
//         $category->featured = $featured;
//         $category->menu = $menu;
//         $category->status = $status;
//         $category->save();
// //      }

//     return redirect(route('admin.category.index'));
//     // return response()->json([
//     //     'fail' => false,
//     //     'redirect_url' => route('admin.category.index'),
//     //     'message' => 'Successfully created a new category',
//     // ]);
// }
