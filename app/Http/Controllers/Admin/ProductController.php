<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductUnit;
use App\Model\Supplier;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;

class ProductController extends Controller
{

    public function index()
    {
        $data["categories"] = Category::latest()->get();
        $data['suppliers'] = Supplier::latest()->get();
        $data['tags'] = Tag::latest()->get();
        $data['productUnits'] = ProductUnit::get();
        //  dd($data["suppliers"]);
        return view('admin.product.manage_product', $data);
    }

    public function productData(Request $request)
    {
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"] = $request->input("page", 1);
        $data["search"] = $search = $request->search;
        $data["products"] = Product::when($search, function ($query) use ($search) {
            $query->where("products.product_name", "LIKE", "%{$search}%");
        })
            ->select('products.*')
            ->latest('products.created_at')
            ->paginate($data["perPage"]);
        //   dd($data["products"] );
        //   die();
        return view('admin.product.product_data', $data);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        return dd($request->headers->get('Content-Type'));

        // work with photo
        $slug = Str::slug($request->product_name);
        $photo = $request->file('photo');
        dd($photo);

        if (isset($photo)) {
            $photoname = $slug . '-' . uniqid() . '.' . $photo->extension();

            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }
            Storage::disk('public')->putFileAs('category/', $photo, $photoname);
        } else {
            $photoname = "default.png";
        }
        // dd($photoname);

        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        } else {
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->slug = Str::slug($request->product_name);
            $product->photo = $photoname;
            $product->purchase_price = $request->purchase_price;
            $product->sale_price = $request->sale_price;
            $product->sub_category_id = $request->category;
            $product->supplier_id = $request->supplier;
            $product->tag_id = $request->tag;
            $product->weight = $request->weight;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->description = $request->description;
            $product->stock_quantity = $request->stock_quantity;
            $product->min_quantity = $request->min_quantity;
            $product->save();
        }
        return response()->json([
            'fail' => false,
            'message' => 'successfully created',
        ]);

    }

    public function show($id)
    {
        // $product = Product::find($id);
        $product = Product::find($id);
        // dd($sub);
        return view('admin.product.single_product', ['product' => $product]);
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
