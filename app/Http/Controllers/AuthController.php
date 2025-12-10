<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'temp_id' => 'required',
        ]);

        // Hardcoded admin Temp ID
        $adminId = 'admin123';

        if ($request->temp_id === $adminId) {
            // Store admin session
            session(['admin' => [
                'id' => $adminId,
                'name' => 'Admin User',
                'role' => 'admin',
            ]]);

            return redirect('/admin/products');
        }

        return back()->with('error', 'Invalid Admin ID');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect('/');
    }
}
