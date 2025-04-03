<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryHome extends Controller
{
    public function index()
    {
        //
        // model
        $list = Country::all();
        return view('bankend.admin.country.list',[
            'list'=>$list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            // kiểm tra có danh mục đó chcuwa
            // thêm không bỏ chống

        return view('bankend.admin.country.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $exitContry = Country::where('name',$request->name)->first();
        if($exitContry){
           
            return redirect()->back()->with("error"," danh mục đã tồn tại");

        }
        $request->validate([
            'name' => 'required',
        ],[
            "name"=>"Không được bỏ chống tên danh mục"
        ]);

        $data = $request->all();

        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/movies'), $new_image);
            $data['image'] = 'uploads/movies/' . $new_image;
        } else {
            // Nếu không upload ảnh, gán giá trị mặc định
            $data['image'] = 'uploads/movies/default.jpg';
        }

        $country = new Country();
        $country->name = $data['name'];
        $country->slug = $data['slug'];
        $country->status = $data['status'];
        $country->image = $data['image'];
        $country->save();

        if($country){
            return redirect()->back()->with("success","Thêm danh mục thành công");
        }
        return redirect()->back()->with('error','Thêm danh mục thật bại');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $list_edit = Country::find($id);
        return view('bankend.admin.country.edit',[
            'list_edit'=>$list_edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $country =  Country::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Kiểm tra file có hợp lệ không
            if ($image->isValid()) {
                // Xóa ảnh cũ nếu tồn tại
                if (!empty($country->image) && file_exists(public_path($country->image))) {
                    unlink(public_path($country->image));
                }
    
                // Upload ảnh mới
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/movies'), $imageName);
                $data['image'] = 'uploads/movies/' . $imageName;
            } else {
                return redirect()->back()->with('error', 'Ảnh tải lên không hợp lệ.');
            }
        } else {
            // Giữ nguyên ảnh cũ nếu không có ảnh mới
            $data['image'] = $country->image;
        }


   
        $country->name = $data['name'];
        $country->slug = $data['slug'];
        $country->status = $data['status'];
        $country->image = $data['image'];
        $country->save();

        if($country){
            return redirect()->back()->with("success","Sửa mới thể loại thành công");
        }
        return redirect()->back()->with('error','Sửa mới thể loại thật bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $country = Country::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa Thành Công');

    }
    public function hideAll()
    {
        Country::query()->update(['status' => 2]); // Cập nhật trạng thái thành 0 (ẩn)
        return redirect()->back()->with('success', 'Đã ẩn tất cả quốc gia.');
    }
    
    public function onAll()
    {
        Country::query()->update(['status' => 1]); // Cập nhật trạng thái thành 0 (ẩn)
        return redirect()->back()->with('success', 'Đã bật tất cả quốc gia.');
    }
}
