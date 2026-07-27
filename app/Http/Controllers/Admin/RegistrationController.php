<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->program) {
            $query->where('program', $request->program);
        }

        $registrations = $query->latest()->get();

        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(Registration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function approve(Registration $registration)
    {
        $registration->update(['status' => 'approved']);
        return back()->with('success', 'Pendaftaran telah disetujui.');
    }

    public function reject(Registration $registration)
    {
        $registration->update(['status' => 'rejected']);
        return back()->with('success', 'Pendaftaran telah ditolak.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return back()->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
