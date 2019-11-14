<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\Model\Supplier;

class SupplierController extends Controller
{

    public function index()
    {
        return view('admin.supplier.manage_supplier');
    }

    public function supplierData(Request $request)
    {
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"] = $request->input("page", 1);
        $data["search"] = $search = $request->search;
        $data["suppliers"] = Supplier::when($search, function($query) use ($search){
            $query->where("suppliers.company_name", "LIKE", "%{$search}%");
        })
        ->latest()
        ->paginate($data["perPage"]);
        //dd($data["suppliers"]);
        return view('admin.supplier.supplier_data', $data);
    }


    public function create()
    {
        //
    }

 

    public function store(Request $request)
    {
        $company_name = $request->company_name;
        $slug = Str::slug($request->company_name);
        $contact_name = $request->contact_name;
        $email = $request->email;
        $phone = $request->phone;
        $fax = $request->fax;
        $address = $request->address;
        $description = $request->description;
        $status = "1";

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'address'  => 'required',

        ]);

        if($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        } else {
            $supplier = new Supplier;
            $supplier->company_name = $company_name;
            $supplier->slug = $slug;
            $supplier->contact_name = $contact_name;
            $supplier->email = $email;
            $supplier->phone = $phone;
            $supplier->fax = $fax;
            $supplier->address = $address;
            $supplier->description = $description;
            $supplier->status = $status;
            $supplier->save();
        }
        return response()->json([
            'fail' => false,
            'message' => 'Successfully created',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit_supplier', ['supplier' => $supplier]);
    }

    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'email'  => 'required|email',
            'phone'  => 'required',
            'address'  => 'required',

        ]);

        if($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        } else {
            $supplier = Supplier::find($id);
            $supplier->company_name = $request->company_name;
            $supplier->slug = Str::slug($request->company_name);
            $supplier->contact_name = $request->contact_name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->fax = $request->fax;
            $supplier->address = $request->address;
            $supplier->description = $request->description;
            $supplier->status = "1";
            $supplier->save();
        }
        return response()->json([
            'fail' => false,
            'message' => 'Successfully created',
        ]);
    }

    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return response()->json([
            'message' => 'Successfully deleted'
        ]);
    }
}
