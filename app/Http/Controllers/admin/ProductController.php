<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ProductSaveRequest;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController
{
    public function index()
    {
        $products = Product::with('category')->where('status',1)->orderBy('id','DESC')->paginate(10);
        $data['result'] = $products;

        return view('admin.products.index',$data);
    }

    public function add()
    {
        $data['categories'] = Category::all();

        return view('admin.products.add',$data);
    }

    public function save(ProductSaveRequest $request)
    {
        $input = $request->validated();
        //dd($input);
        $filename ='';

        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename = Str::random(7).'_'.time().'_product.'.$extension;
            $request->image->storeAs('products',$filename);
        }
        
        $ins_arr = [
            'name' =>$input['product_name'],
            'price' =>$input['price'],
            'category_id' =>$input['category'],
            'is_favorite' =>$input['faveroite'],
            'image' =>$filename
        ];

        Product::create($ins_arr);

        return redirect()->route('admin.product.list')->with('success','Your produuct saved successfully');
    }

    public function edit(Request $request,$id)
    {
        $productId = decrypt($id);

        $editdata = Product::find($productId);

        if(empty($editdata))
        {
            return redirect()->route('admin.product.list')->with('danger','No product exist');
        }

        if($request->isMethod('post'))
        {
            $validated =$request->validate([
                'product_name' => 'required',
                'price' => 'required|numeric',
                'category' => 'required',
            ]);

            if($request->hasFile('image'))
            {
                $extension = $request->image->extension();
                $filename = Str::random(7).'_'.time().'_product.'.$extension;
                $request->image->storeAs('products',$filename);

                $editdata->image = $filename;
            }

            $editdata->name = $validated['product_name'];

            $editdata->price = $validated['price'];

            $editdata->category_id = $validated['category'];

            $editdata->is_favorite = $request->faveroite;

            $editdata->save();

            return redirect()->route('admin.product.list')->with('success','Your product is updated successfully');
        }

        $data['editdata'] = $editdata;

        $data['categories'] = Category::all();

        return view('admin.products.edit',$data);
    }

    public function delete(Request $request,$id)
    {
        $productId = decrypt($id);

        $editdata = Product::find($productId);

        if(empty($editdata))
        {
            return redirect()->route('admin.product.list')->with('danger','No product exist');
        }

        $editdata->status = 0;

        $editdata->save();

        return redirect()->route('admin.product.list')->with('success','Your product is deleted successfully');
    }
}
