<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $data = Desa::orderBy('name', 'asc')->get();
        return view('desa.index', ['page' => "Data Desa"], compact('data'));
    }

    public function store(Request $request, $condition)
    {
        $this->validate($request, [
            'name'      => 'required',
        ]);

        $condition == 'create' ? $data = new Desa() : $data = Desa::findOrFail($request->id);
        $data->name = $request->name;
        $request->korwil ? $data->korwil = $request->korwil : true;
        $request->korcam ? $data->korcam = $request->korcam : true;
        $request->kordes ? $data->kordes = $request->kordes : true;
        return $this->saveData($data);
    }

    public function delete($id)
    {
        $data = Desa::findOrFail($id);
        return $this->deleteData($data, $id);
    }
}
