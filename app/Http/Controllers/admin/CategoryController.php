<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorySaveRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        $data['result'] = $categories;

        return view('admin.categories.index',$data);
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function save(CategorySaveRequest $request)
    {
        $input = $request->validated();
        
        
        $ins_arr = [
            'name' =>$input['category_name'],
        ];

         Category::create($ins_arr);

        return redirect()->route('admin.category.list')->with('success','Your category saved successfully');
    }

    public function edit(Request $request,$id)
    {
        $productId = decrypt($id);

        $editdata = Category::find($productId);

        if(empty($editdata))
        {
            return redirect()->route('admin.category.list')->with('danger','No category exist');
        }

        if($request->isMethod('post'))
        {
            $validated =$request->validate([
                'category_name' => 'required',
            ]);

            $editdata->name = $validated['category_name'];

            $editdata->save();

            return redirect()->route('admin.category.list')->with('success','Your category is updated successfully');
        }

        $data['editdata'] = $editdata;

        return view('admin.categories.edit',$data);
    }
}
