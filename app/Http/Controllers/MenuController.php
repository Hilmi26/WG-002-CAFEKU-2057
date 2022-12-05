<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show data menu
        $menu = Menu::all();
        $kategori = Kategori::all();
        return view('layouts.menu', compact('menu', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //input data menu
        $data = $request->all();
        $data['foto'] = Storage::put('menu', $request->file('foto'));
        Menu::create($data);
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu, $id)
    {
        //edit data menu
        $menu = Menu::find($id);
        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('menu');
            $menu->nama = $request->nama;
            $menu->foto = $foto;
            $menu->harga = $request->harga;
            $menu->keterangan = $request->keterangan;
            $menu->kategori_id = $request->kategori_id;
            $menu->save();
        } else {
            $menu->nama = $request->nama;
            $menu->foto;
            $menu->harga = $request->harga;
            $menu->keterangan = $request->keterangan;
            $menu->kategori_id = $request->kategori_id;
            $menu->save();
        }
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu, $id)
    {
        //delete data menu
        Menu::find($id)->delete();
        return redirect('menu');
    }
}
