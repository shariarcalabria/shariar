<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $data['result'] = Pelanggan::where(function($query) use ($q) {
            $query->where('nama_lengkap', 'like', '%' . $q . '%');
            $query->orWhere('jenis_kelamin', 'like', '%' . $q . '%');
            $query->orWhere('nomor_hp', 'like', '%' . $q . '%');
            $query->orWhere('alamat', 'like', '%' . $q . '%');
            $query->orWhere('email', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;

        return view('pelanggan.listpelanggan', $data);
    }
    public function create()
    {
        return view('pelanggan.formpelanggan');
    }
    public function show()
    {
        return view('pelanggan.showpelanggan');
    }
    public function store(Request $request, Pelanggan $pelanggan = null)
    {
        $rules = [
            'nama_lengkap' => 'required',
            'nomor_hp' => 'required|numeric|min:13|regex:/^[a-zA-Z0-9+\-*\/\(\)\[\]]+$/'

        ];
        $this->validate($request, $rules);

        Pelanggan::updateOrCreate(['id' => @$pelanggan->id], $request->all());
        return redirect('/pelanggan')->with('success', 'Data berhasil disimpan');
    }
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.formpelanggan', compact('pelanggan'));
    }
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('/pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
