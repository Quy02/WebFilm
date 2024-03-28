<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function saveHistory(Movie $movie, int $customerId)
    {
        // Kiểm tra xem đã tồn tại lịch sử chưa
        $existingHistory = History::where('id_movie', $movie->id)
                                  ->where('id_customer', $customerId)
                                  ->first();

        if (!$existingHistory) {
            // Nếu chưa có lịch sử, tạo mới
            History::create([
                'id_movie' => $movie->id,
                'id_customer' => $customerId,
                'watched' => 'yes',
            ]);
        } else {
            // Nếu đã có lịch sử, xóa và tạo mới
            $existingHistory->delete();
            History::create([
                'id_movie' => $movie->id,
                'id_customer' => $customerId,
                'watched' => 'yes',
            ]);
        }

        // Trả về giá trị không cần thiết
        return redirect()->to('xem-phim/'.$movie->slug.'/tap-1');
        // return redirect()->to('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode);
    }
    public function deleteHistory(int $customerId)
    {
        History::where('id_customer', $customerId)->delete();
        return back();

    }
}