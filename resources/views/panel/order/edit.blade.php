@extends('panel.layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit</h4>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->

            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Order</h5>
                        <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                        <form action="{{route('order.update', $order->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">customer_id</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$order->customer_id}}" name="customer_id"
                                        id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">ammount</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$order->ammount}}"
                                        name="ammount" id="basic-default-company" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">shipping_address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$order->shipping_address}}" name="shipping_address"
                                        id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">order_address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$order->order_address}}" name="order_address"
                                        id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">order_email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$order->order_email}}"
                                        name="order_email" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">order_date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$order->order_date}}"
                                        name="order_date" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">order_status</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$order->order_status}}"
                                        name="order_status" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->





    @endsection
