<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $data = Penduduk::orderBy('name', 'asc')->get();
        $desa = Desa::orderBy("name", "asc")->get();
        return view('penduduk.index', ['page' => "Data Penduduk / Anggota"], compact('data', 'desa'));
    }

    public function create()
    {
        $desa = Desa::orderBy("name", "asc")->get();
        return view('penduduk.create', ["page" => "Tambah Data Penduduk"], compact("desa"));
    }

    public function store(Request $request, $condition)
    {
        $this->validate($request, [
            'rw_id'   => 'required',
            'name'      => 'required',
            'jk'        => 'required',
        ]);

        $condition == 'create' ? $data = new Penduduk() : $data = Penduduk::findOrFail($request->id);
        $data->name = $request->name;
        $data->rw_id = $request->rw_id;
        $data->jk = $request->jk;
        $request->alamat ? $data->alamat = $request->alamat : true;
        $request->phone ? $data->phone = $request->phone : true;
        return $this->saveData($data);
    }

    public function delete($id)
    {
        $data = Penduduk::findOrFail($id);
        return $this->deleteData($data, $id);
    }
}
