<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreHome extends Controller
{
    public function index()
    {
        //
        // model
        $list = Genre::paginate(10);
        return view('bankend.admin.genre.list',[
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

        return view('bankend.admin.genre.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $exitGenre = Genre::where('name',$request->name)->first();
        if($exitGenre){
           
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


        $genre = new Genre();
        $genre->name = $data['name'];
        $genre->slug = $data['slug'];
        $genre->status = $data['status'];
        $genre->image = $data['image'];
        $genre->save();

        if($genre){
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
        $list_edit = Genre::find($id);
        return view('bankend.admin.genre.edit',[
            'list_edit'=>$list_edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lấy thông tin từ request
        $data = $request->all();
    
        // Tìm thể loại theo ID
        $genre = Genre::find($id);
        if (!$genre) {
            return redirect()->back()->with('error', 'Thể loại không tồn tại.');
        }
    
        // Kiểm tra và xử lý ảnh mới
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Kiểm tra file có hợp lệ không
            if ($image->isValid()) {
                // Xóa ảnh cũ nếu tồn tại
                if (!empty($genre->image) && file_exists(public_path($genre->image))) {
                    unlink(public_path($genre->image));
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
            $data['image'] = $genre->image;
        }
    
        // Cập nhật dữ liệu thể loại
        $genre->name = $data['name'] ?? $genre->name;
        $genre->slug = $data['slug'] ?? $genre->slug;
        $genre->status = $data['status'] ?? $genre->status;
        $genre->image = $data['image'];
    
        // Lưu thay đổi
        if ($genre->save()) {
            return redirect()->back()->with('success', 'Sửa thể loại thành công.');
        }
    
        return redirect()->back()->with('error', 'Sửa thể loại thất bại.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        $genre = Genre::find($id);
        if (!empty($movie->image) && file_exists(public_path($genre->image))) {
            unlink(public_path($genre->image));
        }
    
        // Xóa movie
        $genre->delete();
    
        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Xóa Thành Công');

    }




   


}
