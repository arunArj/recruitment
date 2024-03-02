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
        <form method="POST" action="/job-listing">
          @csrf
          <div class="card">
            <div class="card-header">
                  <h4 class="card-title">Post Vacancy</h4>
            </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-4">

                    <div class="form-group">
                        <label for="job_title">Job title</label>
                        <input type="text" value="{{ old('job_title') }}"  name="job_title" class="form-control" id="job_title" >
                        @error('job_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" name="job_description">{{old('job_description')}}</textarea>
                        @error('job_description')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="percentage">percentage</label>
                      <input type="text" name="percentage" value="{{ old('percentage') }}" class="form-control" id="percentage" >

                      @error('percentage')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="no_of_vacancy">No of Vacancy</label>
                      <input type="text" name="no_of_vacancy" value="{{ old('no_of_vacancy') }}" class="form-control" id="no_of_vacancy" >

                      @error('no_of_vacancy')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="supply">Supply</label>
                      <input type="text" name="supply" value="{{ old('supply') }}" class="form-control" id="supply" >

                      @error('supply')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
          </div>

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


