@extends('fontend.black')
@section('title', 'Contact')
@section('content')
<div class="container text-center">
    <h1>
        Gửi thư cho chúng tôi
    </h1>
    <form action="/contact" method="post">
        <div class="container py-5 w">
          <form class="p-md-5 border rounded-3 bg-body-tertiary">
            @csrf
            <input type="hidden" name="uid" value="{{session('user_id')}}">
            <div class="mb-3">
              <label class="form-label" for="contact_title">
                Tiêu đề
              </label>
              <input type="text" name="contact_title" class="form-control" id="contact_title">
            </div>
              <div class="mb-3">
                <label for="contac_content" class="form-label">Nội dung</label>
                <textarea class="form-control" name="contact_content" id="contac_content" rows="3"></textarea>
              </div>
            <button class="w-100 btn btn-lg btn-primary">Send</button>
          </form>

   
</div>
    </form>
</div>
@endsection