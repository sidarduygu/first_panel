
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
                        <h5 class="mb-0">Edit User</h5>
                        <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                        <form action="{{route('customer.update', $customer->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$customer->email}}" name="email" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$customer->password}}" name="password" id="basic-default-company" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">full_name</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$customer->full_name}}" name="full_name" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">billing_address</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$customer->billing_address}}" name="billing_address" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">default_shipping_address</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$customer->default_shipping_address}}" name="default_shipping_address" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">country</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$customer->country}}" name="country" id="basic-default-name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$customer->phone}}" name="phone" id="basic-default-name" />
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
