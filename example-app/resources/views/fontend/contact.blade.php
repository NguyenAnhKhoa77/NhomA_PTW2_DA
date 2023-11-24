@extends('fontend.black')
@section('title', 'Contact')
@section('content')
<div class="container text-center">
    <h1>
        Liên hệ với chúng tôi
    </h1>
    <form action="/contact" method="post">
        <div class="container py-5 w">
          <form class="p-md-5 border rounded-3 bg-body-tertiary">

            <!-- Name input -->

            <div class="form-floating mb-3">

            <label class="form-label" for="name">Name</label>

              <input type="text" name="name" class="form-control" />

            </div>



            <!-- Email input -->

            <div class="form-floating mb-3">
              <label class="form-label" for="email">Email address</label>
              <input type="email" name="email" class="form-control" />


            </div>



            <!-- Message input -->

            <div class="form-floating mb-3">
              <label class="form-label" for="msg">Message</label>
              <textarea class="form-control" name="msg" rows="4"></textarea>


            </div>



            <!-- Checkbox -->

            <div class="form-check d-flex justify-content-left mb-3">

              <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />

              <label class="form-check-label" for="form4Example4">

                Send me a copy of this message

              </label>

            </div>



            <!-- Submit button -->

            <button class="w-100 btn btn-lg btn-primary">Send</button>

          </form>

   
</div>
Resources
    </form>
</div>
@endsection