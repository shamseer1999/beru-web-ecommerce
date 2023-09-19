<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController
{
    
    public function index()
    {
        $banners = Banner::orderBy('id','DESC')->paginate(10);

        $data['result'] = $banners;

        return view('admin.banners.index',$data);
    }

    public function add()
    {
        return view('admin.banners.add');
    }

    public function save(Request $request)
    {
        $filename="";
        if($request->hasFile('image')){
            // Todo:image crop
            $extension = $request->image->extension();
            $filename = Str::random(7).'_'.time().'_banner.'.$extension;
            $request->image->storeAs('public/banners',$filename);
        }

        $ins_arr = [
            'banner_name' =>$request->banner_name,
            'banner_image' =>$filename
        ];

        Banner::create($ins_arr);
        return redirect()->route('admin.banner.list')->with('success','Your banner saved successfully');
    }

    public function edit(Request $request,$id)
    {
        $bannerId = decrypt($id);

        $editdata = Banner::find($bannerId);

        if(empty($editdata))
        {
            return redirect()->route('admin.banner.list')->with('danger','No banner exist');
        }

        if($request->isMethod('post'))
        {
            // $validated =$request->validate([
            //     'product_name' => 'required',
            //     'price' => 'required|numeric',
            //     'category' => 'required',
            // ]);

            if($request->hasFile('image'))
            {
                Storage::delete('banners/'.$editdata->banner_image);

                $extension = $request->image->extension();
                $filename = Str::random(7).'_'.time().'_banner.'.$extension;
                $request->image->storeAs('public/banners',$filename);

                $editdata->banner_image = $filename;
            }

            $editdata->banner_name = $request->banner_name;

            $editdata->save();

            return redirect()->route('admin.banner.list')->with('success','Your banner is updated successfully');
        }

        $data['editdata'] = $editdata;

        return view('admin.banners.edit',$data);
    }
}
