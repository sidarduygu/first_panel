@extends('frontend.layout.app')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>cart</h2>
                        <ul>
                            <li><a href="javascript:void(0)">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="cart-section section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->cartItems as $cartItem)
                        <tr>
                            <td>
                                <a href="javascript:void(0)"><img src="{{$cartItem->product->thumbnail}}" alt="cart"
                                        class=" "></a>
                            </td>
                            <td><a href="javascript:void(0)">{{$cartItem->product->name}}</a>
                                <div class="mobile-cart-content">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                    value="{{$cartItem->quantity}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">${{$cartItem->price}}</h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color"><a href="javascript:void(0)" class="icon"><i
                                                    class="ti-close"></i></a></h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>${{$cartItem->price}}</h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control input-number"
                                            value="{{$cartItem->quantity}}">
                                    </div>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="icon"><i class="ti-close"></i></a></td>
                            <td>
                                <h2 class="td-color">${{$cartItem->cartPrice}}</h2>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                        <tr>
                            <td>total price :</td>
                            <td>
                                <h2>$6935.00</h2>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{route('payment.index')}}" class="btn btn-normal">continue shopping</a> <a
                    href="{{route('payment.index')}}" class="btn btn-normal ms-3">check out</a></div>
        </div>
    </div>
</section>
<!--section end-->
@endsection