<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('pages.registration');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:150',
            'place_of_birth' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'address' => 'nullable|string',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'parent_name' => 'required|string|max:150',
            'parent_phone' => 'required|string|max:20',
            'program' => 'required|in:Tahfidz,TPA,Madrasah,Lainnya',
        ]);

        // Generate registration number
        $count = Registration::whereYear('created_at', now()->year)->count() + 1;
        $regNumber = 'AZZ/' . now()->format('Ym') . '/' . str_pad($count, 4, '0', STR_PAD_LEFT);
        $validated['registration_number'] = $regNumber;
        $validated['status'] = 'pending';

        Registration::create($validated);

        return redirect()->route('registration')->with('success', true);
    }
}
