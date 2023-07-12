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
            'hasil_bakteri' => 'nullable|file',
            'hasil_kimia' => 'nullable|file',
            'hasil_fisik' => 'nullable|file',
            'hasil_uji' => 'nullable|file',
            'sertifikat_layak_sehat' => 'nullable|file',
            'sertifikat_penjamak_makanan' => 'nullable|file',
            'sertifikat_penjamak_pj' => 'nullable|file',
            'hasil_pemeriksaan' => 'nullable|file',
            'nib' => 'nullable|file',
            'izin_usaha' => 'nullable|file',
        ]);

        $usaha = new Usaha();
        $usaha->pemilik_usaha = $request->pemilik_usaha;
        $usaha->nama_usaha = $request->nama_usaha;
        $usaha->jenis_usaha = $request->jenis_usaha;
        $usaha->save();

        if ($request->file('hasil_bakteri')) {
            $hasilBakteriPath = $request->file('hasil_bakteri')->store('public/sertifikat');
        }
        if ($request->file('hasil_kimia')) {
            $hasilKimiaPath = $request->file('hasil_kimia')->store('public/sertifikat');
        }
        if ($request->file('hasil_fisik')) {
            $hasilFisikPath = $request->file('hasil_fisik')->store('public/sertifikat');
        }
        if ($request->file('hasil_uji')) {
            $hasilUjiPath = $request->file('hasil_uji')->store('public/sertifikat');
        }
        if ($request->file('sertifikat_layak_sehat')) {
            $sertLayakSehatPath = $request->file('sertifikat_layak_sehat')->store('public/sertifikat');
        }
        if ($request->file('sertifikat_penjamak_makanan')) {
            $sertPenjamakMakananPath = $request->file('sertifikat_penjamak_makanan')->store('public/sertifikat');
        }
        if ($request->file('sertifikat_penjamak_pj')) {
            $sertPenjamakPJPath = $request->file('sertifikat_penjamak_pj')->store('public/sertifikat');
        }
        if ($request->file('hasil_pemeriksaan')) {
            $hasilPemeriksaanPath = $request->file('hasil_pemeriksaan')->store('public/sertifikat');
        }
        if ($request->file('nib')) {
            $nibPath = $request->file('nib')->store('public/sertifikat');
        }
        if ($request->file('izin_usaha')) {
            $izinUsahaPath = $request->file('izin_usaha')->store('public/sertifikat');
        }


        Hasil::create([
            'usaha_id' => $usaha->id,
            'hasil_bakteri' => $hasilBakteriPath,
            'hasil_kimia' => $hasilKimiaPath,
            'hasil_fisik' => $hasilFisikPath,
            'hasil_uji' => $hasilUjiPath,
            'sertifikat_layak_sehat' => $sertLayakSehatPath,
            'sertifikat_penjamak_makanan' => $sertPenjamakMakananPath,
            'sertifikat_penjamak_pj' => $sertPenjamakPJPath,
            'hasil_pemeriksaan' => $hasilPemeriksaanPath,
            'nib' => $nibPath,
            'izin_usaha' => $izinUsahaPath,
        ]);

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
            'hasil_kimia' => 'nullable|mimes:pdf',
            'hasil_fisik' => 'nullable|mimes:pdf',
            'hasil_uji' => 'nullable|mimes:pdf',
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
            Storage::delete($usaha->hasil->hasil_bakteri);
            $usaha->hasil->hasil_bakteri = $request->file('hasil_bakteri')->store('public/sertifikat');
        }

        if ($request->hasFile('hasil_kimia')) {
            Storage::delete($usaha->hasil->hasil_kimia);
            $usaha->hasil->hasil_kimia = $request->file('hasil_kimia')->store('public/sertifikat');
        }

        if ($request->hasFile('hasil_fisik')) {
            Storage::delete($usaha->hasil->hasil_fisik);
            $usaha->hasil->hasil_fisik = $request->file('hasil_fisik')->store('public/sertifikat');
        }

        if ($request->hasFile('hasil_uji')) {
            Storage::delete($usaha->hasil->hasil_uji);
            $usaha->hasil->hasil_uji = $request->file('hasil_uji')->store('public/sertifikat');
        }

        if ($request->hasFile('sertifikat_layak_sehat')) {
            Storage::delete($usaha->hasil->sertifikat_layak_sehat);
            $usaha->hasil->sertifikat_layak_sehat = $request->file('sertifikat_layak_sehat')->store('public/sertifikat');
        }

        if ($request->hasFile('sertifikat_penjamak_makanan')) {
            Storage::delete($usaha->hasil->sertifikat_penjamak_makanan);
            $usaha->hasil->sertifikat_penjamak_makanan = $request->file('sertifikat_penjamak_makanan')->store('public/sertifikat');
        }

        if ($request->hasFile('sertifikat_penjamak_pj')) {
            Storage::delete($usaha->hasil->sertifikat_penjamak_pj);
            $usaha->hasil->sertifikat_penjamak_pj = $request->file('sertifikat_penjamak_pj')->store('public/sertifikat');
        }

        if ($request->hasFile('hasil_pemeriksaan')) {
            Storage::delete($usaha->hasil->hasil_pemeriksaan);
            $usaha->hasil->hasil_pemeriksaan = $request->file('hasil_pemeriksaan')->store('public/sertifikat');
        }

        if ($request->hasFile('nib')) {
            Storage::delete($usaha->hasil->nib);
            $usaha->hasil->nib = $request->file('nib')->store('public/sertifikat');
        }

        if ($request->hasFile('izin_usaha')) {
            Storage::delete($usaha->hasil->izin_usaha);
            $usaha->hasil->izin_usaha = $request->file('izin_usaha')->store('public/sertifikat');
        }

        $usaha->hasil->save();

        Alert::toast('Berhasil update data', 'success');
        return redirect()->route('usaha.index');
    }

    public function destroy($id)
    {
        $hasil = Hasil::findOrFail($id);

        Storage::delete([
            $hasil->hasil_bakteri,
            $hasil->hasil_kimia,
            $hasil->hasil_fisik,
            $hasil->hasil_uji,
            $hasil->sertifikat_layak_sehat,
            $hasil->sertifikat_penjamak_makanan,
            $hasil->sertifikat_penjamak_pj,
            $hasil->hasil_pemeriksaan,
            $hasil->nib,
            $hasil->izin_usaha,
        ]);

        $usaha = Usaha::where('id', $hasil->usaha_id)->first();
        $usaha->delete();

        Alert::toast('Berhasil hapus data usaha', 'success');
        return back();
    }
}
