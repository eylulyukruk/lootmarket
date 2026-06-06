<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function index()
    {
        $supportMessages = SupportMessage::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('products.support-messages', compact('supportMessages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        SupportMessage::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'Open',
        ]);

        return redirect('/support-messages')
            ->with('success', 'Your support message has been sent successfully.');
    }
}
