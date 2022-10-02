<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveData($data)
    {
        if ($data->save()) {
            return back()->with(['flash' => "Berhasil memperbaharui data"]);
        } else {
            return back()->with(['flash' => "Terjadi kesalahan"]);
        }
    }


    public function uploadImage(Request $request, $name, $path)
    {
        if ($request->hasFile($name)) {
            return $request->file($name)->store('uploads/' . $path . '');
        }
    }

    public function deleteData($data, $id)
    {
        if ($data->delete($id)) {
            return back()->with(['flash' => "Berhasil menghapus data"]);
        } else {
            return back()->with(['gagal' => "Terjadi kesalahan"]);
        }
    }
}
