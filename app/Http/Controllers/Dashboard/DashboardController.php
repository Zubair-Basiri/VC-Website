<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashHome()
    {
        return view('dashboard.dashHome');
    }

    public function showMessage()
    {
        $messages = Contact::latest()->get();

        return view('dashboard.showMessage', compact('messages'));
    }

    
    public function submitMessage(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Message submitted successfully.');
    }

    public function destroyMessage($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
    
}
