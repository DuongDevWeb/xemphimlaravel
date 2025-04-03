<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryHome extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // model
        $list = Category::paginate(10);
        return view('bankend.admin.category.list',[
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

        return view('bankend.admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $exitCategory = Category::where('name',$request->name)->first();
        if($exitCategory){
           
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


        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->status = $data['status'];
        $category->image = $data['image'];
        $category->save();

        if($category){
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
        $list_edit = Category::find($id);
        return view('bankend.admin.category.edit',[
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
        
        $category =  Category::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Kiểm tra file có hợp lệ không
            if ($image->isValid()) {
                // Xóa ảnh cũ nếu tồn tại
                if (!empty($category->image) && file_exists(public_path($category->image))) {
                    unlink(public_path($category->image));
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
            $data['image'] = $category->image;
        }
        
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->status = $data['status'];
        $category->image = $data['image'];
        $category->save();

        if($category){
            return redirect()->back()->with("success","Sửa mới danh mục thành công");
        }
        return redirect()->back()->with('error','Sửa mới danh mục thật bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm category với id
        $category = Category::find($id);
    
        // Kiểm tra xem category có tồn tại không
        if ($category) {
            // Xóa nếu tồn tại
            $category->delete();
            return redirect()->back()->with('success', 'Xóa Thành Công');
        } else {
            // Nếu không tìm thấy category, trả về thông báo lỗi
            return redirect()->back()->with('error', 'Danh mục không tồn tại');
        }
    }
    

    public function hideAll()
    {
        Category::query()->update(['status' => 2]); // Cập nhật trạng thái thành 0 (ẩn)
        $count = Category::where('status', 2)->count();
        return redirect()->back()->with('success', 'Đã ẩn tất cả danh mục.');
    }
    
    public function onAll()
    {
        Category::query()->update(['status' => 1]); // Cập nhật trạng thái thành 0 (ẩn)
        $count = Category::where('status', 1)->count(); 
        return redirect()->back()->with('success', 'Đã bật tất cả danh mục.');
    }
    
   



}
