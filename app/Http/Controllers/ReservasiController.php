<?php 
namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{ 
    public function index(){
        $reservasis = Reservasi::all();
        $kamars = Kamar::all(); // Pastikan variabel kamars diambil dari database
        return view('reservasi.index', compact('reservasis', 'kamars'));
    }

    public function pelanggan(){
        $reservasis = Reservasi::all();
        return view('pelanggan.pelanggan', compact('reservasis'));
    }

    public function create(){
        $kamars = Kamar::all();
        $user = auth()->check() ? auth()->user() : null; // Ambil data pengguna jika login
        return view('reservasi.create', compact('kamars', 'user'));
    }
    
    public function store(Request $request){
    $data = $request->all();
    $kamar = Kamar::find($data['kamars_id']);
    
    if ($kamar && $kamar->ketersediaan == 'Sedang Digunakan') {
        return redirect()->back()->with('error', 'Kamar yang Anda pilih sedang digunakan, pilih kamar lain.');
    }

    if (auth()->check()) {
        $data['user_id'] = auth()->id();
    }

    $reservasi = Reservasi::create($data);
    if ($kamar) {
        $kamar->ketersediaan = 'Sedang Digunakan';
        $kamar->save();
    }

    return redirect()->route('reservasi.create')->with('success', 'Reservasi berhasil ditambahkan!');
    }

    public function destroy($id){
        $reservasi = Reservasi::findOrFail($id);
        $kamar = Kamar::find($reservasi->kamars_id);
    
        // Kembalikan ketersediaan kamar menjadi 'Tersedia' saat reservasi dihapus
        if ($kamar) {
            $kamar->ketersediaan = 'Tersedia';
            $kamar->save();
        }

        $reservasi->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }
       
}
