<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view(
            'admin.pengaturan.index',
            compact('user')
        );
    }

    public function updatePassword(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email',

            'password_lama' => 'required',

            'password_baru' => 'nullable|min:6',

            'password_baru_confirmation' =>
                'nullable|same:password_baru'

        ]);

        $user = Auth::user();

        if(
            !Hash::check(
                $request->password_lama,
                $user->password
            )
        )
        {
            return back()->with(
                'error',
                'Password lama tidak sesuai'
            );
        }

        $data = [

            'name' => $request->name,

            'email' => $request->email

        ];

        if($request->filled('password_baru'))
        {
            $data['password'] =
                Hash::make(
                    $request->password_baru
                );
        }

        $user->update($data);

        return back()->with(
            'success',
            'Data akun berhasil diperbarui'
        );
    }
}