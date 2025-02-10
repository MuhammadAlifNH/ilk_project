<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal; // Pastikan model Jadwal sudah ada
use App\Models\User; // Pastikan model User sudah ada

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file (opsional, bisa disesuaikan aturan validasinya)
        $request->validate([
            'foto'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'schedule_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'jadwal_id'      => 'nullable|integer|exists:jadwals,id',
        ]);

        $messages = [];

        // Proses upload gambar profil
        if ($request->hasFile('foto')) {
            $profilePath = $request->file('foto')->store('profiles', 'public');

            // Simpan path ke kolom foto di tabel users
            $user = Auth::user(); // Ensure this returns an instance of the User model
            dd($user);
            $user->foto = $profilePath;
            $user->save();

            $messages[] = "Profile image berhasil diupload.";
        }

        // Proses upload gambar jadwal
        // if ($request->hasFile('schedule_image') && $request->filled('jadwal_id')) {
        //     $schedulePath = $request->file('schedule_image')->store('schedules', 'public');

        //     // Temukan jadwal berdasarkan id yang diberikan
        //     $jadwal = Jadwal::find($request->jadwal_id);
        //     if ($jadwal) {
        //         $jadwal->schedule_image = $schedulePath;
        //         $jadwal->save();
        //         $messages[] = "Schedule image berhasil diupload.";
        //     } else {
        //         $messages[] = "Jadwal tidak ditemukan.";
        //     }
        // }

        // if (empty($messages)) {
        //     return back()->withErrors(['msg' => 'Tidak ada file yang diupload.']);
        // }

        // return back()->with('success', implode(' ', $messages));
    }
}
