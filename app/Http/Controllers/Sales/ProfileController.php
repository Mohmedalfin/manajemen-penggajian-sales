<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Sales;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
    
        $sales = $user->sales; 
        
        $isProfileExists = $sales ? true : false;

        return view('sales.profil', compact('user', 'sales', 'isProfileExists'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $validatedData = $request->validated();

        $salesData = [
            'nama_lengkap'  => $validatedData['nama_lengkap'],
            'kontak'         => $validatedData['kontak'],
            'alamat'        => $validatedData['alamat'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
        ];

        if ($request->hasFile('foto')) {
            if ($user->sales && $user->sales->foto) {
                Storage::disk('public')->delete($user->sales->foto);
            }
            $salesData['foto'] = $request->file('foto')->store('profil_sales', 'public');
        }

        
        if ($user->sales_id) {
            $sales = Sales::findOrFail($user->sales_id);
            $sales->update($salesData);
            
        } else {
            $sales = Sales::create($salesData);
            
            $user->sales_id = $sales->id;
            $user->save(); 
        }

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}