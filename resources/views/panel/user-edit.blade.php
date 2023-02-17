@extends('layout.panel')
@section('content')
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
            </div>
          </div>
          <div class="col-xl-12 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="font-weight-bolder">User Edit</h4>
              </div>
              <div class="card-body">
                <form role="form" action="{{route('user.saveFunction')}}" method="post" >
                  @csrf
                  <input type="hidden" name="id" value="{{$user->id}}" >
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" value="{{$user->password}}" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="input" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection