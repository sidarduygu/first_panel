@extends('layout.panel')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="{{route('user.add')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User</a>
                </div>
              </div>
              <div class="row">
                <div class="card-header px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">Manager</p>
                            <p class="text-xs text-secondary mb-0">Organization</p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">Online</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                          </td>
                          <td class="align-middle">
                            <a href="{{route('user.edit', ['id' => $user->id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Edit
                            </a>
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
    </div>
  </main>

@endsection