<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;

use App\Models\Info;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\History;
use App\Models\Star;

use DB;

class IndexController extends Controller
{
    
    public function locphim() {
        // Lấy giá trị từ $_GET
        $genre_get = isset($_GET['genre']) ? $_GET['genre'] : '';
        $country_get = isset($_GET['country']) ? $_GET['country'] : '';
        $year_get = isset($_GET['year']) ? $_GET['year'] : '';
    
        // Lấy dữ liệu từ model Movie
        $movie = Movie::query();

        if ($genre_get) {
         $movie = $movie
        ->join('movie_genre', 'movies.id', '=', 'movie_genre.movie_id')
        ->where('movie_genre.genre_id', '=', $genre_get);
        }
    
        if ($country_get) {
            $movie = $movie->where('country_id', '=', $country_get);
        }
    
        if ($year_get) {
            $movie = $movie->where('year', '=', $year_get);
        }
        $movie = $movie->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.locphim', compact('movie'));
    }

    
    public function timkiem()
    {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
         
          $title = 'Tìm kiếm phim:'.$_GET['search'];
            $description = 'Tìm kiếm phim:'.$_GET['search'];
            $image = url('uploads/movie/Love-like-the-Galaxy13.jpg');

            $movie = Movie::withCount('episode')->where('title','LIKE','%'.$search.'%')->orderBy('ngaycapnhat','DESC')->paginate(10);

            return view('pages.timkiem', compact('search','movie','title','description','image'));

        }else{
            return redirect()->to('/');
        }
        
        

    }
    public function home(){
        $info = Info::find(1);

        $title = $info->title;
        $description = $info->description;
        $image = url('uploads/movie/Love-like-the-Galaxy13.jpg');


        $phimhot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
        
        $category_home = Category::with(['movie'=> function($q)
                                                                {
                                                                 $q->withCount('episode')->where('status',1); 
                                                                }   
                                                            ])->orderBy('position','ASC')->where('status',1)->get();

    	return view('pages.home', compact('category_home','phimhot','title','description','image'));
    }
    public function category($slug){

        $cate_slug = Category::where('slug',$slug)->first();

        $title = $cate_slug->title;
        $description = $cate_slug->description;
        $image = '';
        $movie = Movie::withCount('episode')->where('category_id',$cate_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.category', compact('cate_slug','movie','title','description','image'));
    }
    public function year($year){
      
        $title = 'Năm phim: '.$year;
        $description = 'Tìm phim năm :'.$year;
        $image = '';
        $year = $year;
        $movie = Movie::withCount('episode')->where('year',$year)->orderBy('ngaycapnhat','DESC')->paginate(40);
        return view('pages.year', compact('year','movie','title','description','image'));
    }
    public function tag($tag){
        $title = $tag;
        $description = $tag;
        $image = '';
        $tag = $tag;
        $movie = Movie::withCount('episode')->where('tags','LIKE','%'.$tag.'%')->orderBy('ngaycapnhat','DESC')->paginate(40);
        return view('pages.tag', compact('tag','movie','title','description','image'));
    }
    public function genre($slug){
       
        $genre_slug = Genre::where('slug',$slug)->first();
        $title = $genre_slug->title;
        $description = $genre_slug->description;
        $image = '';
        //nhiu the loai
        $movie_genre = Movie_Genre::where('genre_id',$genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi){
            $many_genre[] = $movi->movie_id;
        }
        
        $movie = Movie::withCount('episode')->whereIn('id',$many_genre)->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.genre', compact('genre_slug','movie','title','description','image'));
    }
    public function country($slug){
      
        $country_slug = Country::where('slug',$slug)->first();
         $image = '';
        $title = $country_slug->title;
        $description = $country_slug->description;
        $movie = Movie::withCount('episode')->where('country_id',$country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.country', compact('country_slug','movie','title','description','image'));
    }
    public function movie($slug){

       

        $movie = Movie::with('category','genre','country','movie_genre')->where('slug',$slug)->where('status',1)->first();


        
        ///Yêu thích
        $isFavorite = optional(Favorite::where([
            'id_movie' => $movie->id,
            'id_customer' => session('customer_id')
        ])->first())->yeuthich;
        /////lưu
        $isSave = optional(Favorite::where([
            'id_movie' => $movie->id,
            'id_customer' => session('customer_id')
        ])->first())->luu;
        //Số lượng yêu thích
        $favoriteCount = Favorite::where([
            'id_movie' => $movie->id,
            'yeuthich' => 'yes',
        ])->count();
        $saveCount = Favorite::where([
            'id_movie' => $movie->id,
            'luu' => 'yes',
        ])->count();

        $comments = Comment::where('id_movie', $movie->id)
        ->orderBy('id', 'desc') // Sắp xếp theo 'id'
        ->get();
        //danhgia
        $danhgia = Star::where('id_movie', $movie->id)->avg('star');
        $danhgia2 = Star::where('id_customer', session('customer_id'))->where('id_movie', $movie->id)->count();


        $title = $movie->title;
        $description = $movie->description;
        $image = url('uploads/movie/'.$movie->image);

        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();

        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        
        //lay 3 tập gần nhất
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(3)->get();
        // lấy tổng tập phim đã thêm
        
        $episode_current_list = Episode::with('movie')->where('movie_id',$movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();


        //increase movie views
        $count_views = $movie->count_views; //12908
        $count_views= $count_views + 1; 
        $movie->count_views = $count_views;
        $movie->save();
       
    	return view('pages.movie', compact('movie','related','episode','episode_tapdau','episode_current_list_count','title','description','image','isFavorite','comments','favoriteCount','saveCount', 'isSave','danhgia','danhgia2'));
    }

    public function watch($slug,$tap){
        $movie = Movie::with('category','genre','country','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();
        $title = 'Xem phim: '.$movie->title;
        $description = $movie->description;
        $image = url('uploads/movie/'.$movie->image);

        $idMovies = History::where('id_customer', session('customer_id'))
        ->pluck('id_movie')
        ->toArray();
        $related = Movie::whereNotIn('id', $idMovies)->get();


        $danhgia = Star::where('id_customer', session('customer_id'))->where('id_movie', $movie->id)->value('Star');

        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap, 4,1);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }

        // return response()->json($movie);
    	return view('pages.watch', compact('movie','episode','tapphim','related','title','description','image','danhgia'));
    }
    public function episode(){
    	return view('pages.episode');
    }
}
