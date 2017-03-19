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

                  <label for="card-element">Card</label>
                  <div id="card-element"></div>

                <fieldset>

                  <label for="card-element">
                    Credit or debit card
                  </label>

                  <div id="card-element">&nbsp;</div>

                  <h2> ENTER YOUR DETAILS </h3>
                  <hr>

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


            <fieldset>
              <h2> Payment Details </h2>

              <div class="form-group">
                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                <div class="input-group">
                  <div class="input-group-addon">$</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="12">
                  <div class="input-group-addon">.00</div>
                </div>
              </div>

              <div class="form-group">
                <label for="cardnmber">Card Number: <span>*</span></label>
                <input type="text" class="form-control required" id="email" name="email">
              </div>

              <div class="form-group">
                <label for="cardname">Name on Card: <span>*</span></label>
                <input type="text" class="form-control required" id="email" name="email">
              </div>

              <div class="form-group">
                <label for="expirydate">Expiry Date: <span>*</span></label>
                <input type="text" class="form-control required" id="email" name="email">
              </div>

              <div class="form-group">
                <label for="expirydate">Zip Code: <span>*</span></label>
                <input type="text" class="form-control required" id="email" name="email">
              </div>


            </fieldset>
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_VGtQtFHvb7JYFUwKTAejqKuZ"
                data-amount="12"
                data-name="HermonScholarships.com"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
          </form>

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
