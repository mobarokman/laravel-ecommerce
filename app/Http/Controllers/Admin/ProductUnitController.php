<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\ProductUnit;

class ProductUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.unit.manage');
    }

    public function unitList(Request $request)
    {
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"]  = $request->input('page', 1);
        $data["search"] = $search = $request->search;

        $data['units'] = ProductUnit::where('product_units.unit_name', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('admin.unit.unit-list', $data);
    }
    

    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      


        if ($request->status) {
            $status = 1;
        } else{
            $status = 0;
        }
        dd($status);

        $validator = Validator::make($request->all(), [
            'unit_name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product-unit.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $unit = new ProductUnit;
       $unit->unit_name = $request->unit_name;
       $unit->details = $request->details;
       $unit->status = $status;
       $unit->save();

        return redirect(route('admin.product-unit.index'));
    }


    public function show($id)
    {
        $unit = ProductUnit::find($id);
        return view('admin.unit.show', ['unit' => $unit]);
    }


    public function edit($id)
    {
        $unit = ProductUnit::find($id);
        return view('admin.unit.edit', ["unit" => $unit]);
    }


    public function update(Request $request, $id)
    {
        
        if ($request->status) {
            $status = 1;
        } else{
            $status = 0;
        }

        $validator = Validator::make($request->all(), [
            'unit_name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product-unit.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

       $unit = ProductUnit::find($id);
       $unit->unit_name = $request->unit_name;
       $unit->details = $request->details;
       $unit->status = $status;
       $unit->save();

        return redirect(route('admin.product-unit.index'));
    }

    public function getDeleteModal($id){
        $unit = ProductUnit::find($id);
        return view('admin.unit.delete', ['unit' => $unit]);
    }

    public function destroy($id)
    {
        ProductUnit::find($id)->delete();
    }
}
