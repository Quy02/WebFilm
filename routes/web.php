<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\CustomerController;

Route::get('/login2', [CustomerController::class, 'showLoginForm'])->name('login2');
Route::post('/login2', [CustomerController::class, 'login']);
Route::get('/register2', [CustomerController::class, 'showRegistrationForm'])->name('register2');
Route::post('/register2', [CustomerController::class, 'register']);
Route::get('/logout2', [CustomerController::class, 'logout'])->name('logout2');

/////Yêu thích và lưu
Route::post('/favorite/{movie}/{user}/{check}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');
Route::get('/yeuthich', [MovieController::class, 'showMoviesByIds'])->name('yeuthich');
Route::get('/luu', [MovieController::class, 'showMoviesSave'])->name('luu');

/////Bình luận
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');

/////lịch sử
Route::post('/save-history/{movie}/{customerId}', [HistoryController::class, 'SaveHistory'])->name('SaveHistory');
Route::delete('/delete-history/{customerId}', [HistoryController::class, 'deleteHistory'])->name('deleteHistory');
Route::get('/history', [MovieController::class, 'showHistory'])->name('history');
/////Báo cáo
Route::post('/baocao/store', [ReportController::class, 'store'])->name('report.store');
Route::get('/baocao', [ReportController::class, 'show'])->name('report');
Route::get('/delete-report/{id}', [ReportController::class, 'deleteReport'])->name('delete.report');

/////Đánh giá
Route::post('/danhgia/store', [StarController::class, 'store'])->name('danhgia.store');
// Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
/////

Route::get('/', [IndexController::class, 'home'])->name('homepage');

Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class, 'watch']);
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');
Route::get('/locphim', [IndexController::class, 'locphim'])->name('locphim');
// Route::get('/yeuthich', [IndexController::class, 'locphim'])->name('yeuthich');
Route::post('/add-rating', [IndexController::class, 'add_rating'])->name('add-rating');

Auth::routes([
  //'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Admin route
Route::post('resorting', [CategoryController::class,'resorting'])->name('resorting');
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('comment', CommentController::class);
Route::resource('customer', CustomerController::class);
//them tap phim
Route::get('add-episode/{id}', [EpisodeController::class,'add_episode'])->name('add-episode');
Route::resource('episode', EpisodeController::class);
Route::get('select-movie', [EpisodeController::class,'select_movie'])->name('select-movie');
Route::get('/update-year-phim', [MovieController::class, 'update_year'])->name('update-year-phim');
Route::get('/update-topview-phim', [MovieController::class, 'update_topview'])->name('update-topview-phim');
Route::get('/update-season-phim', [MovieController::class, 'update_season'])->name('update-season-phim');
Route::post('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
//thong tin website
Route::resource('info', InfoController::class);
//thay đổi dữ liệu movie bằng ajax
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');
Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/phude-choose', [MovieController::class, 'phude_choose'])->name('phude-choose');
Route::get('/trangthai-choose', [MovieController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');
Route::post('/update-image-movie-ajax', [MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');
Route::post('/watch-video', [MovieController::class, 'watch_video'])->name('watch-video');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
