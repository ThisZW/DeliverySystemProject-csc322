@extends('layouts.layout')

@section('header-extra')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script>
    paypal.Button.render({
      env: 'production', // Or 'sandbox',

      commit: true, // Show a 'Pay Now' button

      style: {
        color: 'gold',
        size: 'small'
      },

      payment: function(data, actions) {
        /* 
         * Set up the payment here 
         */
      },

      onAuthorize: function(data, actions) {
        /* 
         * Execute the payment here 
         */
      },

      onCancel: function(data, actions) {
        /* 
         * Buyer cancelled the payment 
         */
      },

      onError: function(err) {
        /* 
         * An error occurred during the transaction 
         */
      }
    }, '#paypal-button');
  </script>
@endsection

@section('content')
<div class="checkout-container main">
 
<div class="row">
  <div class="col-75">
    <div class="container">
      @if (session()->has('cart'))
      <form method="POST" action="{{ route('placeOrder')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <h3><b>Billing Information</b></h3>
            <div class="form-group row">
              <div class="col-md-6">
              <label for="name"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="name" name="name" value="{{$data['name']}}" readonly="readonly">
            </div>
              <div class="col-md-6">
              <label for="phone-number"><i class="fa fa-phone"></i> Phone number</label>
              <input type="text" id="phone_number" name="phone_number" value="212-008-774">
            </div>
          </div>
          @if (Auth::guest())
          <div class="row">
            <div class="col-md-6">
              <label for="file"><i class="fa fa-file"></i>Self Identification Proofs.</label>
              <input type="file" id="verification" name="verification" required="required">
            </div>
          </div>
          <br>
          @endif
            
          </div>
          
          <div class="col-md-12">
            <h3><strong>Payments</strong></h3>
          <p>
          </p>  
          <label for="payment_method"><i class="fa fa-credit-card"></i> Payment Method</label>
          <select>
          <option value="volvo">paypal</option>
          </select>
          <p>
          </p>

            <!-- <label for="cname">Promo Code</label>
            <input type="text" id="cname" name="cardname" placeholder="YAYROUGE"> -->
            <br><br>
            <h4><b>Order</b></h4>
            <h5><b>Estimated Subtotal</b>: {{$data['subtotal']}}</h5>

          </div>

        </div>
        <label>
         <!--  <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing -->
        </label>
        <input type="submit" value=" Checkout With Paypal" class = "btc">
        
      </form>
      @else
      {{"Your shopping cart is empty!"}}
      @endif
    </div>
  </div>

</div>
</div> 
<!--
Delivery Information
______
Name
Phone Number
Address
Payment Method(dropdown -> Paypal, Visa, MasterCard)

Subtotal
(Place Order)




Account:
	Customer page -> Infos....  Order history(rating ->product deliver store).
	Deiliver person page-> Info.... Delivery History(rating)...  Delivery queue...
Delivery:
	Grid map:  alg........ -> fjdsaklfjdlks;ajfkldsajflk;das//

Rating:

Cook/Superuser page-> .......


-->
@endsection