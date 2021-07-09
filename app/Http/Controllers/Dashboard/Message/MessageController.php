<?php

namespace App\Http\Controllers\Dashboard\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('dashboard.messages.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        session()->flash('success', __('dashboard.statuses.message_deleted'));
    }
}
