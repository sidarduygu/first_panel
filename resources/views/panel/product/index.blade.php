
@extends('panel.layout.app')
@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5>Product List</h5>
        <a class="btn btn-primary" href="{{route('product.create')}}">Add</a>
      </div>
      <div class="card">
        <h5 class="card-header">Products</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>email</th>
                    <th>password</th>
                    <th>full_name</th>
                    <th>billing_address</th>
                    <th>default_shipping_address</th>
                    <th>country</th>
                    <th>phone</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->email}}</strong></td>
                  <td>{{$product->password}}</td>
                  <td>{{$product->full_name}}</td>
                  <td>{{$product->billing_address}}</td>
                  <td>{{$product->default_shipping_address}}</td>
                  <td>{{$product->country}}</td>
                  <td>{{$product->phone}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('product.edit', $product->id)}}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                       <form action="{{route('product.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item"><i class="bx bx-trash me-2"></i> Delete</button>
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
