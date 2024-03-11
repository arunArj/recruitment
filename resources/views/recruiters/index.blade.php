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
                            <h4 class="card-title">Recruiters List</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    {{-- <form method="get" action="/patients">
                                        <input type="text" class="form-control" id="basicInput" placeholder="Search">
                                    </form> --}}
                                </div>
                                <div class="form-group">
                                    {{-- <a href="/admin/users/create" style="color: #fff" class="btn btn-primary">
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

                                            <th>#</th>
                                            <th>Name</th>

                                            <th>Email</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recruiters as $key => $item)
                                            <tr>
                                                <td>{{++$key}}</td>
                                            <td><a href="/recruiters/{{$item->id}}">{{ $item->user->name }}</a></td>

                                            <td>{{ $item->user->email }}</td>
                                            <td>@if ($item->status=='0')
                                                not verified
                                            @else
                                                verified
                                            @endif</td>

                                            {{-- <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($item->role=='student')
                                                    <a href="/students/{{$item->student->id}}/edit" style="color: #727e8c;">
                                                        <i data-feather="edit" width="20"></i></a>
                                                    @endif
                                                    @if ($item->role=='recruiter')
                                                    <a href="/recruiters/edit/{{$item->recruiter->id}}" style="color: #727e8c;">
                                                        <i data-feather="edit" width="20"></i></a>
                                                    @endif
                                                    <button class="btn btn-outline"
                                                        onclick="deleteSupplier({{ $item->id }})" data-toggle="modal"
                                                        data-target="#danger">
                                                        <i data-feather="trash" width="20"></i>
                                                    </button>
                                                </div>

                                            </td> --}}

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <div class="modal-danger mr-1 mb-1 d-inline-block">


        <!--Danger theme Modal -->
        <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel120">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> you are about to delete this record</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" onclick="deleteSupplierConfirm()" class="btn btn-danger ml-1"
                            data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Delete</span>
                        </button>
                        <form id="deleteSupplierForm" method="post" action="">
                            @method('DELETE')
                            @csrf
                        </form>

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
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel122">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> you are about to delete these record</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" onclick="bulkDeleteRecord()" class="btn btn-danger ml-1"
                            data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Delete</span>
                        </button>
                        <form id="deleteSupplierForm" method="post" action="/job-listing/">
                            @method('DELETE')
                            @csrf
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
            document.getElementById('deleteSupplierForm').action = '/users/' + id;
            // document.getElementById('deleteSupplierForm').submit();
        }

        function deleteSupplierConfirm() {

            document.getElementById('deleteSupplierForm').submit();
        }

    </script>
@endsection
