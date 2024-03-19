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
        <form method="post" action="{{ route('training.update', $training->id) }}">
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header">
                  <h4 class="card-title">Edit Training Model</h4>
            </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select name="type" class="form-control" id="type">
                        <option value="internship" {{ $training->type == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="workshop" {{ $training->type == 'workshop' ? 'selected' : '' }}>Workshop</option>
                      </select>
                      @error('type')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="topic">Topic</label>
                      <input type="text" name="topic" value="{{ $training->topic }}" class="form-control" id="topic" >
                      @error('topic')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="duration">Duration</label>
                      <input type="text" name="duration" value="{{ $training->duration }}" class="form-control" id="duration" >
                      @error('duration')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="start">Start Date</label>
                      <input type="date" name="start" value="{{ $training->start }}" class="form-control" id="start" >
                      @error('start')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="end">End Date</label>
                      <input type="date" name="end" value="{{ $training->end }}" class="form-control" id="end" >
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
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
          </div>
      </form>
      </div>
    </div>
  </section>
</div>
@endsection
