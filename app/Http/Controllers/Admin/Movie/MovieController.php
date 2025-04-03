<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Admin\Category\CategoryHome;
use App\Http\Controllers\Admin\Genre\GenreHome;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Server;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::paginate(10);

        return view('bankend.admin.movie.list',[
           "movies"=>$movies
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       // Lấy tất cả các genres để dễ dàng sử dụng trong view
        $categorys = Category::all(); 
        $countrys = Country::all();
        $genres = Genre::all(); 
        $server = Server::all();
        return view('bankend.admin.movie.add',[
            "categorys"=>$categorys,
            "countrys"=>$countrys,
            "genres"=>$genres,
            "server"=>$server
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $movies = new Movie();
        $movies->name = $data['name'];
        $movies->slug = $data['slug'];
        $movies->status = $data['status'];

        $movies->tags = $data['tags'];
        $movies->description = $data['description'];
        $movies->image = $data['image'];
        $movies->country_id = $data['country_id'];
        $movies->category_id = $data['category_id'];
        $movies->server_id = $data['server_id'];
        $movies->vskc = $data['vskc'];
        $movies->thoiluong = $data['thoiluong'];
        $movies->video = $data['video'];
       $movies->save();
        if (!empty($data['genre'])) {
            $movies->genres()->sync($data['genre']); // `attach()` để lưu mối quan hệ
        }
    
        return redirect()->back()->with('success', 'Thêm Phim Thành Công');


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
        $movie = Movie::findOrFail($id); // Tìm phim theo ID, nếu không có sẽ trả về lỗi 404
        $genres = Genre::all(); // Lấy tất cả thể loại
        $categorys = Category::all(); // Lấy tất cả danh mục
        $countrys = Country::all(); // Lấy tất cả quốc gia
        $server = Server::all();
    
        return view('bankend.admin.movie.edit',[
            'genres' => $genres, 
            'categorys' => $categorys,
            'countrys' => $countrys,
            'movie' => $movie,
            'server'=>$server
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    
    $data = $request->all();
    // Tìm phim cần cập nhật
    $movie = Movie::findOrFail($id);
    
    // Kiểm tra nếu có ảnh mới được upload
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu có
        if (!empty($movie->image) && file_exists(public_path($movie->image))) {
            unlink(public_path($movie->image)); // Xóa ảnh cũ nếu tồn tại
        }

        // Upload ảnh mới
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Đặt tên cho ảnh mới
        $image->move(public_path('uploads/movies'), $imageName); // Di chuyển ảnh vào thư mục uploads/movies
        $data['image'] = 'uploads/movies/' . $imageName; // Cập nhật đường dẫn ảnh mới
    } else {
        // Nếu không có ảnh mới, giữ ảnh cũ
        $data['image'] = $movie->image;
    }
    if (empty($data['video'])) {
        // Nếu không có video, đặt giá trị bằng chuỗi rỗng thay vì null
        $data['video'] = '';
    }


    // Cập nhật các trường khác của phim
    $movie->name = $data['name'];
    $movie->slug = $data['slug'];
    $movie->status = $data['status'];
    $movie->tags = $data['tags'];
    $movie->description = $data['description'];
    $movie->image = $data['image'];
    $movie->country_id = $data['country_id'];
    $movie->category_id = $data['category_id'];
    $movie->server_id = $data['server_id'];
    $movie->vskc = $data['vskc'];
    $movie->thoiluong = $data['thoiluong'];
    $movie->video = $data['video'];

    // Cập nhật thể loại (nếu có)
    if (!empty($data['genre'])) {
        $movie->genres()->sync($data['genre']); // Cập nhật mối quan hệ với genres
    }

    // Lưu thay đổi
    $movie->save();

    // Trả về thông báo thành công
    return redirect()->route('movie.index')->with('success', 'Sửa Phim Thành Công');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm phim theo ID
        $movie = Movie::find($id);
    
        // Kiểm tra nếu phim không tồn tại
        if (!$movie) {
            return redirect()->back()->with('error', 'Xóa Thất Bại: Phim không tồn tại');
        }
    
        // Xóa các thể loại liên quan (trong bảng movie_genre)
        $movie->genres()->detach();
    
        // Xóa ảnh nếu tồn tại
        if (!empty($movie->image) && file_exists(public_path($movie->image))) {
            unlink(public_path($movie->image));
        }
    
        // Xóa movie
        $movie->delete();
    
        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Xóa Thành Công');
    }
    
}
