<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function index()
    {
        $data = Rw::orderBy('name', 'asc')->get();
        $desa = Desa::orderBy("name", "asc")->get();
        return view('rw.index', ['page' => "Data Rw"], compact('data', 'desa'));
    }

    public function store(Request $request, $condition)
    {
        $this->validate($request, [
            'desa_id'   => 'required',
            'name'      => 'required',
        ]);

        $condition == 'create' ? $data = new Rw() : $data = Rw::findOrFail($request->id);
        $data->name = $request->name;
        $data->desa_id = $request->desa_id;
        $request->lurah ? $data->lurah = $request->lurah : true; 
        return $this->saveData($data);
    }

    public function delete($id)
    {
        $data = Rw::findOrFail($id);
        return $this->deleteData($data, $id);
    }
}
