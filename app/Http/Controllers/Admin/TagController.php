<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class TagController extends Controller
{

    public function index()
    {
        return view('admin.tag.manage_tag');
    }

    public function tagData(Request $request)
    {
        $data["perPage"] = $request->input("perPage", 5);
        $data["page"] = $request->input("page", 1);
        $data["search"] = $search = $request->search;
        $data["tags"] = Tag::when($search, function ($query) use ($search) {
            $query->where("tags.tag_name", "LIKE", "%{$search}%");
        })
            ->latest()
            ->paginate($data["perPage"]);

        return view('admin.tag.tag_data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tag_name = $request->tag_name;
        $slug = Str::slug($request->tag_name);

        $validator = Validator::make($request->all(), [
            'tag_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        } else {
            $tag = new Tag;
            $tag->tag_name = $tag_name;
            $tag->slug = $slug;
            $tag->save();
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
        $tag = Tag::find($id);
        return view('admin.tag.edit_tag', ['tag' => $tag]);
    }

    public function update(Request $request, $tag_id)
    {
        $tag_name = $request->tag_name;
        $slug = Str::slug($request->tag_name);

        $validator = Validator::make($request->all(), [
            'tag_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        } else {
            $tag = Tag::find($tag_id);
            $tag->tag_name = $tag_name;
            $tag->slug = $slug;
            $tag->save();
        }
        return response()->json([
            'fail' => false,
            'message' => 'Successfully updated',
        ]);
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        return response()->json([
            'message' => 'Successfully deleted',
        ]);
    }
}
