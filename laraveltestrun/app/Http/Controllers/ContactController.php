<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
class ContactController extends Controller {

    public function submit(ContactRequest $req) {
        $contact = new Contact ();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было отправлено!');
    }
    public function allData() //вывод всех сообщений из БД
    {
        $contact = new Contact();
        //$contact->orderBy('id','asc')->skip(1)->take('3')->get()
        return view('messages', ['data'=>$contact->orderBy('id','asc')->get()]);

    }
    public function showOneMessage($id)
    {
        $contact = new Contact();
        return view('one-message', ['data'=> $contact -> find($id)]);
    }

    public function updateMessage($id)
    {
        $contact = new Contact();
        return view('update-message', ['data'=> $contact -> find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req)
    {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено!');
    }

    public function deleteMessage($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }

}

