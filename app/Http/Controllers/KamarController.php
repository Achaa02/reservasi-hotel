<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    
    public function index(){
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function create(){
        return view('kamar.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_kamar' => 'required|unique:kamars,nama_kamar|max:255',
            'tipe_kamar' => 'required|max:255',
            'harga' => 'required',
            'kapasitas' => 'required',            
            'ketersediaan' => 'nullable|in:Tersedia,Tidak Tersedia,Sedang Digunakan',
        ]);
        
        $data = $request->all();
        $data['ketersediaan'] = $data['ketersediaan'] ?? 'Tersedia';  // Default ke 'Tersedia' jika tidak diberikan

        Kamar::create($data);
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit($id){       
        $kamar = Kamar::findOrFail($id); 
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_kamar' => 'required|max:255|unique:kamars,nama_kamar,' . $id,
            'tipe_kamar' => 'required|max:255',
            'harga' => 'required|string',
            'kapasitas' => 'required',            
            'ketersediaan' => 'nullable|in:Tersedia,Tidak Tersedia,Sedang Digunakan',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->only(['nama_kamar', 'tipe_kamar', 'harga', 'kapasitas', 'ketersediaan']));
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }
    
    public function destroy($id){
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
