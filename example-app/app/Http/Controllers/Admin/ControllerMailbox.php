<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use App\Models\Mails;
use Illuminate\Http\Request;

class ControllerMailbox extends Controller
{
    public function mailbox()
    {
        $mails = Contact::all();
        $users = User::all();
        return view('backend.mailbox.mailbox',compact('mails','users'));
    }
    
    public function readmail($id)
    {
        $mails = Contact::find($id);
        $user = User::find($mails->user_id);
        return view('backend.mailbox.read-mail',compact('mails','user'));
    }
    
    public function reply($id)
    {
        $mails = Contact::find($id);
        $user = User::find($mails->user_id);
        return view('backend.mailbox.reply',compact('mails','user'));
    }
    
    public function replyForm($id, Request $request)
    {
        $request->validate([
            'receiver' => 'required|int',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
        //Add contact
        $mailbox = new Mails([
            'receive_user_id' => $request->input('receiver'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        //Add thanh cong
        if ($mailbox->save()) {
            return back()->withSuccess('Gui thu thanh cong');
        }
        //Add that bai
        return back()->withErrors('Gui thu that bai!');
    }
    
}
