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
                    <div class="card">

                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Students List</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    {{-- <form method="get" action="/patients">
                                        <input type="text" class="form-control" id="basicInput" placeholder="Search">
                                    </form> --}}
                                </div>
                                <div class="form-group">
                                    {{-- <a href="/user/create" style="color: #fff" class="btn btn-primary">
                                        <i data-feather="plus" width="20"></i> add new user
                                    </a> --}}
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-0">

                            <div class="table-responsive">

                                <table class='table mb-0' id="table1">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($appliedList as $key => $item)
                                            <tr>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->email }}</td>

                                            <td>{{ $item->user->student->course }}</td>


                                            <td> @if ($item->status=='0')
                                                registered
                                            @endif
                                            @if ($item->status=='1')
                                                completed
                                            @endif
                                        </td>


                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{-- <a href="{{asset('pdf/'.$item->user->student->resume)}}" style="color: #727e8c;" target="_blank">
                                                      Resume</a> --}}

                                                      {{-- <button class="btn btn-outline"
                                                      onclick="applyForm({{ $item->id }})" data-toggle="modal"
                                                      data-target="#bulk-delete">
                                                      <i data-feather="thumbs-up" width="20"></i>
                                                  </button> --}}
                                                    <button class="btn btn-outline"
                                                        onclick="deleteSupplier({{ $item->id }})" data-toggle="modal"
                                                        data-target="#danger">
                                                        <i data-feather="send" width="20"></i>
                                                    </button>
                                                    {{-- <a href="{{asset('images/'.$item->user->student->image)}}" style="color: #727e8c;" target="_blank">
                                                        Image</a> --}}
                                                </div>

                                            </td>

                                            </tr>
                                            @empty
                                            <tr><td colspan="8" class="text-center">No Records yet</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <div class="modal-info mr-1 mb-1 d-inline-block">


        <!--Danger theme Modal -->
        <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title white" id="myModalLabel120">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> updating post status </p>
                    </div>
                    <div class="modal-footer">

                        <form id="deleteSupplierForm" method="post" action="/">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <select class="form-control" name="status" id="">
                                    <option value="0">Applied</option>
                                    <option value="1">Completed</option>
                                </select>
                            </div>
                        </form>

                        <button type="button" onclick="deleteSupplierConfirm()" class="btn btn-info ml-1"
                        data-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Confirm</span>
                    </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal-danger mr-1 mb-1 d-inline-block">
        <!--Danger theme Modal -->
        <div class="modal fade text-left" id="bulk-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel122"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title white" id="myModalLabel122">Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> You are about to select this student </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" onclick="formSubmitConfirm()" class="btn btn-info ml-1"
                            data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Confirm</span>
                        </button>
                        <form id="applyjobForm" method="post" action="/job-listing/">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="status" value="1">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('custom-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        function deleteSupplier(id) {
            // var supplierId = document.getElementById('supplier_id').value;
            document.getElementById('deleteSupplierForm').action = '/training/student-list/' + id;
            // document.getElementById('deleteSupplierForm').submit();
        }

        function deleteSupplierConfirm() {

            document.getElementById('deleteSupplierForm').submit();
        }
        function applyForm(id) {

            document.getElementById('applyjobForm').action = '/apply-jobs/' + id;
            // document.getElementById('deleteSupplierForm').submit();
        }

        function formSubmitConfirm() {

            document.getElementById('applyjobForm').submit();
        }
    </script>
@endsection
