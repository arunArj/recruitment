@extends('layouts.theme.base')
@section('dashboard')
<div class="main-content container-fluid">
    @if(session('success'))
    <div class="row justify-content-end align-items-center error-field">
        <div class="col-3  alert alert-success">
             <p>{{ session('success') }}!!</p>
        </div>
    </div>
    @endif
    @if(session('error'))
    <div class="row justify-content-end align-items-center error-field">
        <div class="col-3  alert alert-danger">
        <p>{{ session('error') }}</p>
        </div>
    </div>
    @endif
  <section class="section">
    <div class="row mb-4">
      <div class="col-md-12">
        <form method="post" action="/admin/users">
          @csrf
          <div class="card">
            <div class="card-header">
                  <h4 class="card-title">Create User</h4>
            </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-4">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ old('name') }}"  name="name" class="form-control" id="name" >
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" >
                        @error('email')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Password">password</label>
                      <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" >

                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <section id="basic-checkbox">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Select Role</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2 mb-1">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="radio" name="role" id="checkbox1" class='form-check-input' value="student" checked>
                                                <label for="checkbox1">Student</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-inline-block mr-2 mb-1">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="radio" name="role" value="admin" class='form-check-input' id="checkbox2">
                                                <label for="checkbox2">Admin</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-inline-block mr-2 mb-1">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="radio" name="role" value="recruiter" id="checkbox3" class='form-check-input'>
                                                <label for="checkbox3">Recruiter</label>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-md-4">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">

            </div>
          </div>
      </form>
      </div>
    </div>
  </section>
</div>
@endsection


