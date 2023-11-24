<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Comments;

class ControllerView extends Controller
{
    public function Home()
    {
        $productsMale = Product::where('sex', 'like', '1')->take(6)->get();
        $productsFemale = Product::where('sex', 'like', '2')->take(6)->get();
        $productsAccessory = Product::where('sex', 'like', '3')->take(6)->get();
        return view('fontend.index', compact('productsMale', 'productsFemale', 'productsAccessory'));
    }

    public function comment()
    {
        $comment = new Comments();
        $oldId = request('product_id');
        $newId = decrypt($oldId);
        $comment->product_id = $newId;
        $comment->comment = request('comment');
        $comment->save();
        return redirect()->back();
    }



    public function checkout()
    {
        return view('fontend.checkout');
    }


    public function contact()
    {
        return view('fontend.contact');
    }

    public function contactForm()
    {
        $contact = new Contact();
        $contact->name = request('name');
        $contact->email = request('email');
        $contact->msg = request('msg');
        $contact->save();
        return redirect()->back();
    }
}
