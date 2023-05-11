<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    public function index()
    {
        $usahas = Usaha::all();
        return view('dashboard.penilaian.index', compact('usahas'));
    }

    public function create()
    {
        return view('dashboard.penilaian.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'pemilik_usaha' => 'required',
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'hasil_bakteri' => 'required|file',
            'hasil_kimia' => 'required|file',
            'hasil_fisik' => 'required|file',
            'hasil_uji' => 'required|file',
            'sertifikat_layak_sehat' => 'required|file',
            'sertifikat_penjamak_makanan' => 'required|file',
            'sertifikat_penjamak_pj' => 'required|file',
            'hasil_pemeriksaan' => 'required|file',
            'nib' => 'required|file',
            'izin_usaha' => 'required|file',
        ]);

        $usaha = new Usaha();
        $usaha->pemilik_usaha = $request->pemilik_usaha;
        $usaha->nama_usaha = $request->nama_usaha;
        $usaha->jenis_usaha = $request->jenis_usaha;
        $usaha->save();

        $hasilBakteri = $request->file('hasil_bakteri')->store('public/sertifikat');
        $hasilKimia = $request->file('hasil_kimia')->store('public/sertifikat');
        $hasilFisik = $request->file('hasil_fisik')->store('public/sertifikat');
        $hasilUji = $request->file('hasil_uji')->store('public/sertifikat');
        $sertLayakSehat = $request->file('sertifikat_layak_sehat')->store('public/sertifikat');
        $sertPenjamakMakanan = $request->file('sertifikat_penjamak_makanan')->store('public/sertifikat');
        $sertPenjamakPJ = $request->file('sertifikat_penjamak_pj')->store('public/sertifikat');
        $hasilPemeriksaan = $request->file('hasil_pemeriksaan')->store('public/sertifikat');
        $nib = $request->file('nib')->store('public/sertifikat');
        $izin_usaha = $request->file('izin_usaha')->store('public/sertifikat');

        Hasil::create([
            'usaha_id' => $usaha->id,
            'hasil_bakteri' => asset(Storage::url($hasilBakteri)),
            'hasil_kimia' => asset(Storage::url($hasilKimia)),
            'hasil_fisik' => asset(Storage::url($hasilFisik)),
            'hasil_uji' => asset(Storage::url($hasilUji)),
            'sertifikat_layak_sehat' => asset(Storage::url($sertLayakSehat)),
            'sertifikat_penjamak_makanan' => asset(Storage::url($sertPenjamakMakanan)),
            'sertifikat_penjamak_pj' => asset(Storage::url($sertPenjamakPJ)),
            'hasil_pemeriksaan' => asset(Storage::url($hasilPemeriksaan)),
            'nib' => asset(Storage::url($nib)),
            'izin_usaha' => asset(Storage::url($izin_usaha)),
        ]);

        Alert::toast('Berhasil simpan data', 'success');
        return redirect()->route('usaha.index');
    }

    public function show($id)
    {
        $usaha = Usaha::findOrFail($id);

        return view('dashboard.penilaian.detail', compact('usaha'));
    }

    public function destroy($id)
    {
        $usaha = Usaha::findOrFail($id);
        $hasil = Hasil::findOrFail($usaha->id);

        Storage::delete('public/sertifikat/' . $hasil->hasil_bakteri);
        Storage::delete('public/sertifikat/' . $hasil->hasil_kimia);
        Storage::delete('public/sertifikat/' . $hasil->hasil_fisik);
        Storage::delete('public/sertifikat/' . $hasil->hasil_uji);
        Storage::delete('public/sertifikat/' . $hasil->sertifikat_layak_sehat);
        Storage::delete('public/sertifikat/' . $hasil->sertifikat_penjamak_makanan);
        Storage::delete('public/sertifikat/' . $hasil->sertifikat_penjamak_pj);
        Storage::delete('public/sertifikat/' . $hasil->hasil_pemeriksaan);
        Storage::delete('public/sertifikat/' . $hasil->nib);
        Storage::delete('public/sertifikat/' . $hasil->izin_usaha);

        $usaha->delete();
        $hasil->delete();

        Alert::toast('Berhasil hapus data', 'success');
        return back();
    }
}
