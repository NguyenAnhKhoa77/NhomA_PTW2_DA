<?php
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Xử lý logic khi submit form thành công

        // Trả về response
        return redirect()->route('home')->with('success', 'Submit form thành công!');
    }
}
