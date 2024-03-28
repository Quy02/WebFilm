<?php
namespace App\Http\Controllers;
use App\Models\Star;
use Illuminate\Http\Request; // Make sure to import Request

// ...

class StarController extends Controller
{
    public function store(Request $request)
    {

        $check = Star::where([
            'id_movie' => $request->id_movie,
            'id_customer' => $request->id_customer,
        ])->first();
        // Lưu giá trị vào cơ sở dữ liệu
        if(!$check)
        {
        $Star = new Star();
        $Star->id_movie = $request->id_movie;
        $Star->id_customer = $request->id_customer;
        $Star->Star = $request->diem; 
        $Star->save();
        return back();
        }
        else
        $check->delete();
        $Star = new Star();
        $Star->id_movie = $request->id_movie;
        $Star->id_customer = $request->id_customer;
        $Star->Star = $request->diem; 
        $Star->save();
        return back();
    }
}