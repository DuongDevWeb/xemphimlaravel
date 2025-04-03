<?php

namespace App\Http\Controllers\Fontend\UserFontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;

class UserFontedController extends Controller
{


    public function Homeplay(){
       
        
        $category = Category::orderBy('id','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','ASC')->get();
        $country = country::orderBy('id','ASC')->get();
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();
        $movie = Movie::where('status',1)->paginate(20);
        $category_home = Category::with('movies')->orderBy('id', 'desc')->where('status', 1)->get();
        return view('fontend.user.home',compact('category','country','genre','category_home','randomMovies','movie'));
    }
 public function category($slug)
    {
        $category = Category::where('status', 1)->get();
        $country = Country::where('status', 1)->get();
        $genre = Genre::get();

        $category_slug = Category::where('slug', $slug)->first();
        if (!$category_slug) {
            return redirect('/')->with('error', 'Danh mục không tồn tại.');
        }

        $movie = Movie::where('category_id', $category_slug->id)->orderBy('id', 'DESC')->paginate(20);
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();

        return view('fontend.user.category.categoryhome', compact('category', 'country', 'genre', 'category_slug', 'movie', 'randomMovies'));
    }
    
   

    // Trang xem phim theo slug
    // Phương thức movie
    public function movie($slug)
    {
        // Lấy danh mục, quốc gia và thể loại phim
        $category = Category::where('status', 1)->get();
        $country = Country::get();
        $genre = Genre::get();

        // Lấy thông tin phim
        $movie = Movie::with('category', 'genres', 'country')
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();
        // Kiểm tra nếu phim không tồn tại
        if (!$movie) {
            return redirect('/')->with('error', 'Phim không tồn tại.');
        }

        // Phân trang phim cùng danh mục
        $moviesByCategory = Movie::where('category_id', $movie->category_id)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(20);

        // Lấy danh sách phim ngẫu nhiên
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();

        // Trả về view
        return view('fontend.movie.playvideo', compact('category', 'country', 'genre', 'movie', 'moviesByCategory', 'randomMovies'));
    }

    // Trang tổng hợp quốc gia
    public function countryHome()
    {
        $category = Category::where('status', 1)->get();
        $country = Country::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();
        return view('fontend.user.country.countryhome', compact('category', 'country', 'genre', 'randomMovies'));
    }

    
    // Trang quốc gia theo slug
    public function country($slug)
    {
        $category = Category::where('status', 1)->get();
        $country = Country::where('status', 1)->get();
        $genre = Genre::get();

        $country_slug = Country::where('slug', $slug)->first();
        if (!$country_slug) {
            return redirect('/')->with('error', 'Quốc gia không tồn tại.');
        }

        $movie = Movie::where('country_id', $country_slug->id)->orderBy('id', 'DESC')->paginate(20);
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();

        return view('fontend.countryplay.contryplay', compact('category', 'country', 'genre', 'country_slug', 'movie', 'randomMovies'));
    }


    
    // Trang tổng hợp thể loại
    public function genreHome()
    {
        $category = Category::where('status', 1)->get();
        $country = Country::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();

        return view('fontend.user.genre.genrehome', compact('category', 'country', 'genre', 'randomMovies'));
    }

    // slug genre

   
    public function genre($slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        
        // 
        $genre = Genre::orderBy('id', 'ASC')->get();
        $country = Country::orderBy('id', 'ASC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $randomMovies = Movie::inRandomOrder()->limit(10)->get();
        if (!$genre_slug) {
            abort(404, 'Thể loại không tồn tại.');
        }
    
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $movi) {
            $many_genre[] = $movi->movie_id;
        }
    
        $movie = Movie::whereIn('id', $many_genre)->paginate(20);
    
        return view('fontend.genrplay.genreplay',compact('category','genre','country','genre_slug','movie_genre','many_genre','randomMovies','movie'));
    }

    //  tìm kiếm
    public function search()
    {
        try {
            // Lấy dữ liệu danh mục, quốc gia, thể loại
            $category = Category::where('status', 1)->get();
            $country = Country::where('status', 1)->get();
            $genre = Genre::where('status', 1)->get();
            $randomMovies = Movie::inRandomOrder()->limit(10)->get();
    
            // Lấy từ khóa tìm kiếm từ request
            $search = request()->input('search');
    
            // Kiểm tra nếu từ khóa trống
            if (empty($search)) {
                return redirect('/')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
            }
    
            // Tìm kiếm phim theo tên
            $movie = Movie::where('name', 'LIKE', '%' . $search . '%')
            ->where('status', 1) 
            ->orderBy('id', 'DESC') 
            ->paginate(20);
    
            // Nếu không có kết quả
            if ($movie->isEmpty()) {
                return view('fontend.error.404', compact('category', 'country', 'genre', 'randomMovies','movie','search'))
                    ->with('error', 'Không tìm thấy kết quả nào.');
            }
    
            // Trả về kết quả tìm kiếm
            return view('fontend.error.moviett', compact('category', 'country', 'genre', 'randomMovies', 'movie', 'search'));
        } catch (\Throwable $ex) {
            return view('fontend.error.404', compact('category', 'country', 'genre', 'randomMovies'))
                ->with('error', 'Đã xảy ra lỗi trong quá trình tìm kiếm.');
        }
    }
    
    // tag

    public function videosByTag($tag)
{
    // Lấy danh mục, quốc gia, thể loại để hiển thị giao diện
    $category = Category::where('status', 1)->get();
    $country = Country::where('status', 1)->get();
    $genre = Genre::where('status', 1)->get();
    $randomMovies = Movie::inRandomOrder()->limit(10)->get();

    // Tìm kiếm các video có tag tương ứng
    $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')
        ->where('status', 1)
        ->paginate(20); // Phân trang

    // Nếu không tìm thấy video
    if ($movie->isEmpty()) {
        return view('fontend.error.404')->with('error', 'Không tìm thấy video nào với tag: ' . $tag);
    }

    return view('fontend.error.tag', compact('category', 'country', 'genre', 'randomMovies', 'movie', 'tag'));
}

}


