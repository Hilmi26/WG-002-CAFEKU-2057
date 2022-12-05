<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //show data order
        return view('layouts.order');
    }

    public function store(Request $request)
    {
        //deklarasi variabel
        $nama = $request->nama;
        $status = $request->status;

        $menus = $request->jml_pesanan;
        $menu = explode(',', $menus);
        $jml_pesanan = count($menu);

        $hargaMenu = $request->ttl_pesanan;
        $ttl_pesanan = $jml_pesanan * $hargaMenu;

        $order = new Pembayaran();
        $bayar = $order->totalPembayaran($ttl_pesanan, $status);

        $diskon = $order->diskon($ttl_pesanan, $status);

        $data = [
            'nama' => $nama,
            'jml_pesanan' => $jml_pesanan,
            'ttl_pesanan' => $ttl_pesanan,
            'status' => $status,
            'diskon' => $diskon,
            'ttl_pembayaran' => $bayar,
        ];
        return view('layouts.order', compact('data'));
    }
}

//interface
interface Order
{
    //method
    public function diskon($ttl_pesanan, $status);
}

//implements class
class Diskon implements Order
{
    public function diskon($ttl_pesanan, $status)
    {
        if ($status == 'Member' && $ttl_pesanan >= 100000) {
            $diskon = 20 / 100; //deklarasi variable dengan nilai diskon 20%
            $total_diskon = $ttl_pesanan * $diskon; //perhitungan total diskon
            return $total_diskon;
        } elseif ($status == 'Member' && $ttl_pesanan < 100000) {
            $diskon = 10 / 100; //deklarasi variable dengan nilai diskon 10%
            $total_diskon = $ttl_pesanan * $diskon; //perhitungan total diskon
            return $total_diskon;
        } else {
            $diskon = 0 / 100; //deklarasi variable dengan nilai diskon 0%
            $total_diskon = $ttl_pesanan * $diskon; //perhitungan total diskon
            return $total_diskon;
        }
    }
}

//inheritance class
class Pembayaran extends Diskon
{
    public function totalPembayaran($ttl_pesanan, $status)
    {
        $pesanan = (int) $ttl_pesanan; //deklarasi variable total pesanan
        $diskon = (int) $this->diskon($ttl_pesanan, $status); //deklarasi variable total diskon
        $totalPembayaran = $pesanan - $diskon; //hitung total Pembayaran
        return $totalPembayaran;
    }
}
