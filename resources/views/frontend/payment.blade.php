@extends('frontend.layout.app')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>checkout</h2>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form action="{{route('payment.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="theme-form">
                                <div class="row check-out ">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Phone</label>
                                        <input type="text" name="phone" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Email Address</label>
                                        <input type="email" name="email" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Country</label>
                                        <select name="country" id="country">
                                            <option value="Turkey">Turkey</option>
                                            <option value="Yunanista">Yunanista</option>
                                            <option value="America">America</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Address</label>
                                        <input type="text" name="address" value="" placeholder="Street address">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Town/City</label>
                                        <input type="text" name="city" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">State / County</label>
                                        <input type="text" name="state" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">Postal Code</label>
                                        <input type="text" name="zip_code" value="" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @foreach ($cart->cartItems as $cartItem)
                                        <li><img src="{{$cartItem->product->thumbnail}}" alt="">
                                            {{$cartItem->product->name}} × {{$cartItem->quantity
                                            }}<span>${{$cartItem->price}}</span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count">${{$cartPrice}}</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment_type "value="cash" >
                                                        <label for="payment-2">Cash On Delivery<span
                                                                class="small-text">Please send a check to Store Name,
                                                                Store Street, Store Town, Store State / County, Store
                                                                Postcode.</span></label>
                                                    </div>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right"><button class="btn-normal btn">Place Order</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

@endsection