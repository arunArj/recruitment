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
        <form method="POST" enctype="multipart/form-data" action="/recruiters/update/{{$recruiters->id}}">
          @method('PATCH')
            @csrf
          <div class="card">
            <div class="card-header">
                  <h4 class="card-title">Update Profile</h4>
            </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">About The Company</label>
                        <textarea class="form-control" name="desc" style="height: 200px">{{$recruiters->desc}}</textarea>
                        @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror


                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" style="height: 200px">{{$recruiters->address}}</textarea>
                         @error('address')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  </div>
                  {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$recruiters->email}}">
                         @error('email')
                           <small class="text-danger">{{ $email }}</small>
                        @enderror
                    </div>
                  </div> --}}
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$recruiters->phone}}">
                         @error('phone')
                           <small class="text-danger">{{$message }}</small>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Sub Heading</label>
                        <input type="text" class="form-control" name="sub_title" value="{{$recruiters->sub_title}}">
                         @error('sub_title')
                           <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                  </div>
                  @if(Auth()->user()->role == 'admin')
                  <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="status"> Status</label>
                        <Select name="status" id="status" class="form-control">
                            <option value="0" @if ($recruiters->user->status =='0')
                                selected
                            @endif>inactive</option>
                            <option value="1" @if ($recruiters->user->status =='1')
                                selected
                            @endif>active</option>
                        </Select>
                        </div>
                    </div>
                @endif
                </div>
              </div>
          </div>
          <section id="input-file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Banner</h4>
                        </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        @if ($recruiters->image)
                                        <img id="image-preview" src="{{ asset('images/' . $recruiters->image) }}" height="245px" width="100%" alt="Uploaded Image">
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" id="customFile" name="image">
                                        </div>
                                        <div id="image-preview-container">

                                        </div>
                                    </div>

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


@section('custom-script')
    <script>
        $(document).ready(function() {

    // Handle file input change event
    $('#customFile').change(function() {
        // Check if file is selected
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Set the image source and show the image preview
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').show();
            }

            // Read the selected file as data URL
            reader.readAsDataURL(this.files[0]);
        }
    });
});

    </script>
@endsection
