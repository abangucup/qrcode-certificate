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
        $this->validate($request, [
            'pemilik_usaha' => 'required',
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',

            'hasil_bakteri' => 'nullable|file', // HASIL PEMERIKSAAN LABORATORIUM

            // 'hasil_kimia' => 'nullable|file', // HAPUS
            'hasil_fisik' => 'nullable|file', //FORM INSPEKSI KESEHATAN LINGKUNGAN
            // 'hasil_uji' => 'nullable|file', // HAPUS
            'sertifikat_layak_sehat' => 'nullable|file', //SERTIFIKAT LAIK HYGIENE SANITASI
            'sertifikat_penjamak_makanan' => 'nullable|file', //SERTIFIKAT PELATIHAN KEAMANAN PANGAN SIAP SAJI BAGI PENJAMAH PANGAN / SERTIFIKAT HYGIENE SANITASI BAGI OPERATOR DEPOT AIR MINUM
            'sertifikat_penjamak_pj' => 'nullable|file', //SERTIFIKAT PELATIHAN KEAMANAN PANGAN SIAP SAJI BAGI PENAGGUNG JAWAB / PEMILIK TPP
            'hasil_pemeriksaan' => 'nullable|file', // HASIL VERIFIKASI LAPANGAN
            'nib' => 'nullable|file', //NOMOR INDUK BERUSAHA (NIB)
            'izin_usaha' => 'nullable|file', //REKOMENDASI
        ]);

        $usaha = new Usaha();
        $usaha->pemilik_usaha = $request->pemilik_usaha;
        $usaha->nama_usaha = $request->nama_usaha;
        $usaha->jenis_usaha = $request->jenis_usaha;
        $usaha->save();

        // Hasil::create([
        //     'usaha_id' => $usaha->id,

        // ]);
        $hasil = new Hasil();
        $hasil->usaha_id = $usaha->id;

        if ($request->file('hasil_bakteri')) {
            $hasilBakteriPath = $request->file('hasil_bakteri')->store('sertifikat', 'public');
            $hasil->hasil_bakteri = 'storage/' . $hasilBakteriPath;
        }
        // if ($request->file('hasil_kimia')) {
        //     $hasilKimiaPath = $request->file('hasil_kimia')->store('sertifikat', 'public');
        //     $hasil->hasil_kimia = 'storage/' . $hasilKimiaPath;
        // }
        if ($request->file('hasil_fisik')) {
            $hasilFisikPath = $request->file('hasil_fisik')->store('sertifikat', 'public');
            $hasil->hasil_fisik = 'storage/' . $hasilFisikPath;
        }
        // if ($request->file('hasil_uji')) {
        //     $hasilUjiPath = $request->file('hasil_uji')->store('sertifikat', 'public');
        //     $hasil->hasil_uji = 'storage/' . $hasilUjiPath;
        // }
        if ($request->file('sertifikat_layak_sehat')) {
            $sertLayakSehatPath = $request->file('sertifikat_layak_sehat')->store('sertifikat', 'public');
            $hasil->sertifikat_layak_sehat = 'storage/' . $sertLayakSehatPath;
        }
        if ($request->file('sertifikat_penjamak_makanan')) {
            $sertPenjamakMakananPath = $request->file('sertifikat_penjamak_makanan')->store('sertifikat', 'public');
            $hasil->sertifikat_penjamak_makanan = 'storage/' . $sertPenjamakMakananPath;
        }
        if ($request->file('sertifikat_penjamak_pj')) {
            $sertPenjamakPJPath = $request->file('sertifikat_penjamak_pj')->store('sertifikat', 'public');
            $hasil->sertifikat_penjamak_pj = 'storage/' . $sertPenjamakPJPath;
        }
        if ($request->file('hasil_pemeriksaan')) {
            $hasilPemeriksaanPath = $request->file('hasil_pemeriksaan')->store('sertifikat', 'public');
            $hasil->hasil_pemeriksaan = 'storage/' . $hasilPemeriksaanPath;
        }
        if ($request->file('nib')) {
            $nibPath = $request->file('nib')->store('sertifikat', 'public');
            $hasil->nib = 'storage/' . $nibPath;
        }
        if ($request->file('izin_usaha')) {
            $izinUsahaPath = $request->file('izin_usaha')->store('sertifikat', 'public');
            $hasil->izin_usaha = 'storage/' . $izinUsahaPath;
        }

        $hasil->save();


        Alert::toast('Berhasil simpan data', 'success');
        return redirect()->route('usaha.index');
    }

    public function show($id)
    {
        $usaha = Usaha::findOrFail($id);

        return view('dashboard.penilaian.detail', compact('usaha'));
    }

    public function edit($id)
    {
        $usaha = Usaha::findOrFail($id);
        return view('dashboard.penilaian.edit', compact('usaha'));
    }

    public function update(Request $request, $id)
    {
        $usaha = Usaha::findOrFail($id);

        $this->validate($request, [
            'pemilik_usaha' => 'required',
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'hasil_bakteri' => 'nullable|mimes:pdf',
            // 'hasil_kimia' => 'nullable|mimes:pdf',
            'hasil_fisik' => 'nullable|mimes:pdf',
            // 'hasil_uji' => 'nullable|mimes:pdf',
            'sertifikat_layak_sehat' => 'nullable|mimes:pdf',
            'sertifikat_penjamak_makanan' => 'nullable|mimes:pdf',
            'sertifikat_penjamak_pj' => 'nullable|mimes:pdf',
            'hasil_pemeriksaan' => 'nullable|mimes:pdf',
            'nib' => 'nullable|mimes:pdf',
            'izin_usaha' => 'nullable|mimes:pdf',
        ]);

        $usaha->update([
            'pemilik_usaha' => $request->pemilik_usaha,
            'nama_usaha' => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
        ]);

        // Check if the files are uploaded and update them accordingly

        if ($request->hasFile('hasil_bakteri')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->hasil_bakteri));
            $usaha->hasil->hasil_bakteri = 'storage/' . $request->file('hasil_bakteri')->store('sertifikat', 'public');
        }

        // if ($request->hasFile('hasil_kimia')) {
        //     Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->hasil_kimia));
        //     $usaha->hasil->hasil_kimia = 'storage/' . $request->file('hasil_kimia')->store('sertifikat', 'public');
        // }

        if ($request->hasFile('hasil_fisik')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->hasil_fisik));
            $usaha->hasil->hasil_fisik = 'storage/' . $request->file('hasil_fisik')->store('sertifikat', 'public');
        }

        // if ($request->hasFile('hasil_uji')) {
        //     Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->hasil_uji));
        //     $usaha->hasil->hasil_uji = 'storage/' . $request->file('hasil_uji')->store('sertifikat', 'public');
        // }

        if ($request->hasFile('sertifikat_layak_sehat')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->sertifikat_layak_sehat));
            $usaha->hasil->sertifikat_layak_sehat = 'storage/' . $request->file('sertifikat_layak_sehat')->store('sertifikat', 'public');
        }

        if ($request->hasFile('sertifikat_penjamak_makanan')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->sertifikat_penjamak_makanan));
            $usaha->hasil->sertifikat_penjamak_makanan = 'storage/' . $request->file('sertifikat_penjamak_makanan')->store('sertifikat', 'public');
        }

        if ($request->hasFile('sertifikat_penjamak_pj')) {
            Storage::delete(str_replace('storage/', '', $usaha->hasil->sertifikat_penjamak_pj));
            $usaha->hasil->sertifikat_penjamak_pj = 'storage/' . $request->file('sertifikat_penjamak_pj')->store('sertifikat', 'public');
        }

        if ($request->hasFile('hasil_pemeriksaan')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->hasil_pemeriksaan));
            $usaha->hasil->hasil_pemeriksaan = 'storage/' . $request->file('hasil_pemeriksaan')->store('sertifikat', 'public');
        }

        if ($request->hasFile('nib')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->nib));
            $usaha->hasil->nib = 'storage/' . $request->file('nib')->store('sertifikat', 'public');
        }

        if ($request->hasFile('izin_usaha')) {
            Storage::delete(str_replace('storage/', 'public/', $usaha->hasil->izin_usaha));
            $usaha->hasil->izin_usaha = 'storage/' . $request->file('izin_usaha')->store('sertifikat', 'public');
        }

        $usaha->hasil->save();

        Alert::toast('Berhasil update data', 'success');
        return redirect()->route('usaha.index');
    }

    public function destroy(Usaha $usaha)
    {
        $hasil = $usaha->hasil;

        if ($usaha->hasil->hasil_bakteri != null) {
            Storage::delete(str_replace('storage/', 'public/', $hasil->hasil_bakteri));
        }

        // if ($usaha->hasil->hasil_kimia != null) {
        //     Storage::delete(str_replace('storage/', 'public/', $hasil->hasil_kimia));
        // }

        if ($usaha->hasil->hasil_fisik != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->hasil_fisik
            ));
        }

        // if ($usaha->hasil->hasil_uji != null) {
        //     Storage::delete(str_replace(
        //         'storage/',
        //         'public/',
        //         $hasil->hasil_uji
        //     ));
        // }

        if ($usaha->hasil->sertifikat_layak_sehat != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->sertifikat_layak_sehat
            ));
        }

        if ($usaha->hasil->sertifikat_penjamak_makanan != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->sertifikat_penjamak_makanan
            ));
        }

        if ($usaha->hasil->sertifikat_penjamak_pj != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->sertifikat_penjamak_pj
            ));
        }

        if ($usaha->hasil->hasil_pemeriksaan != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->hasil_pemeriksaan
            ));
        }

        if ($usaha->hasil->nib != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->nib
            ));
        }
        if ($usaha->hasil->izin_usaha != null) {
            Storage::delete(str_replace(
                'storage/',
                'public/',
                $hasil->izin_usaha
            ));
        }

        // $usaha = Usaha::where('id', $hasil->usaha_id)->first();
        $hasil->delete();
        $usaha->delete();

        Alert::toast('Berhasil hapus data usaha', 'success');
        return back();
    }
}
