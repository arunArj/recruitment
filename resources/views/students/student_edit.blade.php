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
        <form method="POST" enctype="multipart/form-data" action="/students/update/{{$student->id}}">
          @method('PATCH')
          @csrf
          <div class="card">
            <div class="card-header">
                  <h4 class="card-title">Update Bio</h4>
            </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-4">

                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" value="{{ $student->course }}"  name="course" class="form-control" id="course" >
                        @error('course')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror


                    </div>

                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" name="dob" value="{{ $student->dob }}" class="form-control" id="dob" >
                        @error('dob')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" name="mobile" value="{{ $student->mobile }}" class="form-control" id="mobile" >

                      @error('mobile')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <section id="input-file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Upload Files</h4>
                        </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        @if ($student->image)
                                        <img src="{{ asset('images/' . $student->image) }}" height="120px" width="160px" alt="Uploaded Image">

                                    @endif
                                        <div class="form-file">
                                            <label for="customFile2"> Image</label>
                                            <input type="file" class="form-file-input" id="customFile" name="image">
                                        </div>
                                        <div id="image-preview-container">

                                            <img id="image-preview" src="#" alt="Image Preview" style="display: none;height:100px;width:160px;">
                                        </div>
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-file">
                                            <label for="customFile2"> Resume</label>
                                            <input type="file" class="form-file-input" id="customFile2" name="resume">
                                        </div>
                                        <div id="image-preview-container" class="mt-4">
                                            @if($student->resume!=null)
                                            <a href="{{asset('pdf/' . $student->resume) }}" target="_blank"> view Resume</a>
                                            @endif
                                        </div>
                                        @error('resume')
                                        <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="percentage">Percentage</label>
                                        <input type="text" name="percentage" value="{{ $student->percentage }}" class="form-control" id="percentage" >
                                        @error('percentage')
                                          <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="no_of_backlog">No Of Arrears</label>
                                        <input type="text" name="no_of_backlog" value="{{ $student->no_of_backlog }}" class="form-control" id="no_of_backlog" >
                                        @error('no_of_backlog')
                                          <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" id="address" >{{ $student->address }}</textarea>
                                        @error('address')
                                          <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                </div>
                                @if (Auth()->user()->role == 'admin')
                                <div class="col-lg-6 col-md-12">

                                    <div class="form-group">
                                        <label for="status"> Status</label>
                                       <Select name="status" id="status" class="form-control">
                                        <option value="0" @if ($student->user->status =='0')
                                            selected
                                        @endif>inactive</option>
                                        <option value="1" @if ($student->user->status =='1')
                                            selected
                                        @endif>active</option>
                                       </Select>
                                    </div>

                                </div>
                                @endif
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


