<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ukm;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    public function index()
    {
        $data = DB::table('ukm')
        ->join('pendaftaran', 'ukm.id', '=', 'pendaftaran.id_ukm')
        ->select('ukm.*', 'pendaftaran.*')
        ->get();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.product.index', compact('data'));
    }

}
