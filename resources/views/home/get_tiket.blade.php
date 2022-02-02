@extends('layouts.front.master')
@section('title','Contact Page') 
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Tiket Minimum Price <strong>(1000৳)</strong></h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Get Tiket</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-person-square"></i>
                <h4>Name</h4>
                <p>{{auth()->user()->full_name}}</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Phone</h4>
                <p>{{auth()->user()->phone_number}}</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
          	@include('_message')
            <form action="" method="post" >
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" value="{{auth()->user()->full_name}}" readonly>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="phone" id="phone" value="{{auth()->user()->phone_number}}" readonly>
                </div>
              </div>
              <div class="form-group mt-3">
                <div>
                    <strong>Payment By:</strong>
                    <label><input type="radio" name="colorRadio" value="cash">
                      Hand<img src="{{asset('/')}}assets/front/img/cashhand.png" width="50px" title="Cash on Hand">
                    </label>
                    <label><input type="radio" name="colorRadio" value="bkash"> 
                     <img src="{{asset('/')}}assets/front/img/cashbkash.svg" width="50px">
                    </label>
                    <label><input type="radio" name="colorRadio" value="bank">
                     Bank<img src="{{asset('/')}}assets/front/img/cashbank.jpg" width="50px"></label>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12 form-group">
                  <input type="number" name="amount" class="form-control" id="amount" min="500" placeholder="Please enter send amount">
                </div>
              </div>
              <div class="my-3">
                <div class="payment cash">
                  <label><b>Cash on Hand Payment</b></label>
                  <div class="row ">
                    <div class="col-md-6 form-group mt-3">
                      <input type="text" class="form-control" name="paymet_reciver_name" placeholder="Please enter payment reciver name">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <input type="text" class="form-control" name="paymet_reciver_number" placeholder="Please enter payment reciver number">
                    </div>
                  </div>
                </div>
                <div class="payment bkash">
                  <label><b>Bkash Payment</b></label><br>
                  <label>Please send your amount in this number 0180000000</label>
                  <div class="row ">
                    <div class="col-md-6 form-group  mt-3">
                      <input type="text" class="form-control" name="bkash_transaction_id" placeholder="Please enter bkash transaction id">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <input type="text" class="form-control" name="bkash_three_digit" placeholder="Please enter last three digit">
                    </div>
                  </div>
                </div>
                <div class="payment bank">
                  <label><b>Bank Payment</b></label>
                  <div class="row ">
                    <div class="col-md-6 form-group  mt-3">
                      <input type="text" class="form-control" name="bank_transaction_id" placeholder="Please enter bank transaction id">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <input type="text" class="form-control" name="paymet_reciver_name" placeholder="Please enter bank name">
                    </div>
                  </div>
                </div>
              </div>
              <div><button class="btn btn-success pt-2 mt-3" type="submit">SEND</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
<style>
.payment{
  display: none;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".payment").hide();
        $(targetBox).show();
    });
});
</script>
@endsection