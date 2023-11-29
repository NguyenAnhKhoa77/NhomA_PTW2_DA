<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Comments;
use Illuminate\Http\Request;
use Exception;

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

    public function contactForm(Request $request)
    {
        //Validate
        $request->validate([
            'uid' => 'required|int',
            'contact_title' => 'required|string',
            'contact_content' => 'required|string',
        ]);
        //Add contact
        $contact = new Contact([
            'user_id' => $request->input('uid'),
            'title' => $request->input('contact_title'),
            'content' => $request->input('contact_content')
        ]);
        //Add thanh cong
        if ($contact->save()) {
            return redirect("contact")->withSuccess('Gui thu thanh cong');
        }
        //Add that bai
        return back()->withErrors('Gui thu that bai!');
    }
}
