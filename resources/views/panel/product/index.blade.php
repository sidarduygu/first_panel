
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
                    <th>sku</th>
                    <th>name</th>
                    <th>price</th>
                    <th>weight</th>
                    <th>descriptions</th>
                    <th>thumbnail</th>
                    <th>image</th>
                    <th>category</th>
                    <th>stock</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$product->sku}}</strong></td>
                  <td>{{$product->name}}</td>
                  <td><img src="{{$product->image}}"  class="w-75"  alt=""></td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->weight}}</td>
                  <td>{{$product->descriptions}}</td>
                  <td>{{$product->thumbnail}}</td>
                  <td>{{$product->category}}</td>
                  <td>{{$product->stock}}</td>
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
