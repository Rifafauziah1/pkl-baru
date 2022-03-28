<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }
    public function headings(): array
    {
        return[
            'No',
            'Nama Pembeli',
            'Tanggal Beli',
            'Jumlah Buku',
            'Harga',
            'Total',
            'Uang',
            'Kembalian',
        ];
    }
}
