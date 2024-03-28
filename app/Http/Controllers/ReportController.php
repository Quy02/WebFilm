<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Movie;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $baocao = new Report;
        $baocao->id_movie = $request->id_movie;
        $baocao->name_movie = $request->name_movie;
        $baocao->id_customer = $request->id_customer;
        $baocao->name_customer = $request->name_customer;
        $baocao->content = $request->content;
        $baocao->save();

        return back();
    }

    public function deleteReport($id)
    {
        // Tìm báo cáo theo id
        $report = Report::find($id);

        // Kiểm tra xem báo cáo có tồn tại không
        if (!$report) {
            return back()->with('error', 'Báo cáo không tồn tại.');
        }

        // Xóa báo cáo
        $report->delete();

        // Redirect về trang trước đó với thông báo thành công
        return back()->with('success', 'Báo cáo đã được xóa thành công.');
    }
}