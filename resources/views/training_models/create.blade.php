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
        <form method="post" action="{{ route('training.store') }}">
          @csrf
          <div class="card">
            <div class="card-header">
                  <h4 class="card-title">Create Training Model</h4>
            </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select name="type" class="form-control" id="type">
                        <option value="internship">Internship</option>
                        <option value="workshop">Workshop</option>
                      </select>
                      @error('type')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="topic">Topic</label>
                      <input type="text" name="topic" value="{{ old('topic') }}" class="form-control" id="topic" >
                      @error('topic')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="duration">Duration</label>
                      <input type="text" name="duration" value="{{ old('duration') }}" class="form-control" id="duration" >
                      @error('duration')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="start">Start Date</label>
                      <input type="date" name="start" value="{{ old('start') }}" class="form-control" id="start" >
                      @error('start')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="end">End</label>
                      <input type="date" name="end" value="{{ old('end') }}" class="form-control" id="end" >
                      @error('end')
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
