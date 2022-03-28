<?php
namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function transaksi()
    {
        return view('report.form');
    }

    public function reportTransaksi(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        if ($start > $end) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Maaf tanggal yang anda masukan tidak sesuai",
            ]);
            return back();

        } else {
            $transaksi = Transaksi::whereBetween('tgl_beli', [$start, $end])
                ->get();
                $total = 0;

            foreach ($transaksi as $value) {
                $total += $value->total;
            }
            // $total = Transaksi::select('user_id', DB::raw('sum(user_id) as nama_pembeli'))->groupBy('user_id')->first();
            // dd($total);
            // dd($article);
            // $pdf = \PDF::loadView('admin.report.article_report', ['article' => $article]);
            // return $pdf->download('article-report.pdf');
            return view('report.cetak-report', ['transaksi' => $transaksi, 'total' => $total]);
        }

    }
    public function export_excel()
	{
		return Excel::download(new TransaksiExport, 'transaksi.xlsx');
	}
}

