<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return back()->with('success', 'Pesan telah ditandai sebagai dibaca.');
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate([
            'reply_body' => 'required|string|max:5000',
        ]);

        $message->update([
            'reply_body' => $request->reply_body,
            'is_read' => true,
            'replied_at' => now(),
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
