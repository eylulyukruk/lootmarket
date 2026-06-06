<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Http\Request;

class AdminSupportMessageController extends Controller
{
    public function index()
    {
        $supportMessages = SupportMessage::with('user')
            ->latest()
            ->get();

        return view(
            'admin.support-messages.index',
            compact('supportMessages')
        );
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => ['required', 'string', 'max:2000'],
        ]);

        $supportMessage = SupportMessage::findOrFail($id);

        $supportMessage->update([
            'admin_reply' => $request->admin_reply,
            'status' => 'Answered',
            'replied_at' => now(),
        ]);

        return redirect('/admin/support-messages')
            ->with('success', 'Support reply sent successfully.');
    }
}
