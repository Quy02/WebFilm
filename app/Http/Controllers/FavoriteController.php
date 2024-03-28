<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Movie $movie,int $user, int $check)
    {
        $luu = Favorite::where([
            'id_movie' => $movie->id,
            'id_customer' => $user,
            'luu' => 'yes',
        ])->first();
        $yeuthich = Favorite::where([
            'id_movie' => $movie->id,
            'id_customer' => $user,
            'yeuthich' => 'yes',
        ])->first();

        /////////// Yêu thích
        if($check == 1){

        // Check if the movie is already in favorites
        $existingFavorite = Favorite::where([
            'id_movie' => $movie->id,
            'id_customer' => $user,
        ])->first();

        if($existingFavorite && $yeuthich != null && $luu == null) {
            $existingFavorite->delete();
        }

        // If not in favorites, add it; otherwise, remove it
        if (!$existingFavorite) {
            Favorite::create([
                'id_movie' => $movie->id,
                'id_customer' => $user,
                'yeuthich' => 'yes',
            ]);
        } elseif($existingFavorite && $yeuthich != null) {
            $favorite = Favorite::where('id_movie', $movie->id)
            ->where('id_customer', $user)
            ->update(['yeuthich' => null]);                
        } elseif($existingFavorite && $yeuthich == null) {
            $favorite = Favorite::where('id_movie', $movie->id)
                ->where('id_customer', $user)
                ->update(['yeuthich' => 'yes']);
        } 

        return back();
        
        }

        //////Lưu
        if($check == 2){

            // Check if the movie is already in favorites
            $existingFavorite = Favorite::where([
                'id_movie' => $movie->id,
                'id_customer' => $user,
            ])->first();
    
            // If not in favorites, add it; otherwise, remove it
            if($existingFavorite && $yeuthich == null && $luu != null) {
                $existingFavorite->delete();
            }
            if (!$existingFavorite) {
                Favorite::create([
                    'id_movie' => $movie->id,
                    'id_customer' => $user,
                    'luu' => 'yes',
                ]);
            } elseif($existingFavorite && $luu != null) {
                $favorite = Favorite::where('id_movie', $movie->id)
                ->where('id_customer', $user)
                ->update(['luu' => null]);                
            } elseif($existingFavorite && $luu== null) {
                $favorite = Favorite::where('id_movie', $movie->id)
                    ->where('id_customer', $user)
                    ->update(['luu' => 'yes']);
            } 
            if($existingFavorite && $yeuthich == null && $luu != null) {
                $existingFavorite->delete();
            }
    
            return back();
            
            }
    }   
}