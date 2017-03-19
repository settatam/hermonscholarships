@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->



    <div class="container">

     <div class=" starter-template">
        <h1></h1>
      </div>
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-md-6">
         <div class="main-image">
            <img  src="/images/students/{{$photo->photos}}"  class="img-reponsive js-mediaFit" alt="{{$photo->photos}}"  />
         </div>
          <br/>
       <div class="row">
          @if( count($additional_images) )
             <div  class="col-md-2 thumbnails clearfix">
                <a href="#" class=""><img  class="img-responsive" src="/images/students/{{$photo->photos}}" alt="" title=""></a>
             </div>
            @foreach ($additional_images as $details )
            <div  class="col-md-2 thumbnails clearfix">
                <a href="#" class=""><img class="img-responsive"  src="/images/students/additionalimages/{{$details->images}}" alt="" title=""></a>
             </div>
            @endforeach
          @endif
        </div>




          <p class="margin-top-40">

          <p>{{--$student->created_at--}}</p>
            {{--$student->description--}}
          </p>

        <hr/>


       <div class="media">
               <h3 class="">Fill the form below to provide a future for: {{$student->fullname()}}</h3>
                <hr/>



                <form action="/charge" method="post" id="payment-form">

                <fieldset>

                  <label for="card-element">
                    Credit or debit card
                  </label>

                  <div id="card-element">&nbsp;</div>

                <div class="form-group">
                  <label for="firstname">First Name: <span>*</span></label>
                  <input type="text" class="form-control required" id="firstname" name="firstname">

                </div>


                <div class="form-group">
                  <label for="lastname">Last Name: <span>*</span></label>
                  <input type="text" class="form-control required" id="lastname" name="lastname">
                </div>

                <div class="form-group">
                  <label for="lastname">Email: <span>*</span></label>
                  <input type="text" class="form-control required" id="email" name="email">
                </div>

                <div class="form-group">
                  <label for="lastname">Phone: <span>*</span></label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>

              </fieldset>
              <!-- Used to display form errors -->
              <div id="card-errors"></div>

              <button class="cta btn btn-primary" type="submit">CONTINUE</button>


            </form>

            <fieldset>
              <h2> Payment Details </h2>

            </fieldset>

            </div>
        </div>

        <div class="col-md-6 student-details">
          <h1> {{ $student->fullname()}} </h1>

          <p>{{ $student->fullname() }} is a {{ $student->formatDate()}} old pupil of All Nations Nursery and Primary School, Lagos Nigeria. When she grows up, she want to be a Medical Doctor.
            <p> With $12 a month, you can provide a future for {{ $student->fullname() }}. To Support her, please click the sponsor button below.</p>
          </p>

          <a href="#" class="cta"> SPONSOR {{ $student->fullname() }} </a>

        </div>


       </div><!-- /.row -->
        <div class="row"></div>
     </div>
   </div>
@endsection

<script src="https://js.stripe.com/v3/"></script>
<script>



// Create a Stripe client
var stripe = Stripe('pk_test_VGtQtFHvb7JYFUwKTAejqKuZ');



// Create an instance of Elements
var elements = stripe.elements();

console.log(elements)

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '24px',
    fontFamily: 'Helvetica Neue',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  const displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  alert('yes');

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});
</script>
