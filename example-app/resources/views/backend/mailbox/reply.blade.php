@extends('backend.header')
@section('content')

<div class="container text-center">
    <h3>Gửi đến {{$user->email}}</h3>
    <form action="{{route('mailbox.reply',$mails['id'])}}" method="post">
        <div class="container py-5 w">
          <form class="p-md-5 border rounded-3 bg-body-tertiary">
            @csrf
            <input type="hidden" name="receiver" value="{{$user->id}}">
            <div class="mb-3">
              <label class="form-label" for="title">
                Tiêu đề
              </label>
              <input type="text" name="title" class="form-control" id="title">
            </div>
              <div class="mb-3">
                <label for="contac_content" class="form-label">Nội dung</label>
                <textarea class="form-control" name="content" id="contac_content" rows="3"></textarea>
              </div>
            <button class="w-100 btn btn-lg btn-primary">Send</button>
          </form>

   
</div>
    </form>
</div>
@endsection