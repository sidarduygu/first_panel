@extends('panel.layout.app')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Order List</h5>
                <a class="btn btn-primary" href="{{route('order.create')}}">Add</a>
            </div>
            <div class="card">
                <h5 class="card-header">Bordered Table</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>customer_id</th>
                                    <th>ammount</th>
                                    <th>shipping_address</th>
                                    <th>order_address</th>
                                    <th>order_email</th>
                                    <th>order_date</th>
                                    <th>order_status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{$order->customer_id}}</strong>
                                    </td>
                                    <td>{{$order->ammount}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                    <td>{{$order->order_address}}</td>
                                    <td>{{$order->order_email}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.edit', $order->id)}}"><i
                                                        class="bx bx-edit-alt me-2"></i> Edit</a>
                                                <form action="{{route('order.destroy', $order->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item"><i class="bx bx-trash me-2"></i>
                                                        Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection
