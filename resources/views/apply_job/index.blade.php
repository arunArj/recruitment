@extends('layouts.theme.base')
@section('dashboard')
    <div class="main-content container-fluid">

        <section class="section">

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">

                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Applied Jobs</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    {{-- <form method="get" action="/patients">
                                        <input type="text" class="form-control" id="basicInput" placeholder="Search">
                                    </form> --}}
                                </div>
                                <div class="form-group">
                                    {{-- <a href="/job-listing/create" style="color: #fff" class="btn btn-primary">
                                        <i data-feather="plus" width="20"></i> add new post
                                    </a> --}}
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-0">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="table-responsive">

                                <table class='table mb-0' id="table1">
                                    <thead>
                                        <tr>

                                            <th>Company</th>
                                            <th>Title</th>

                                            <th>Description</th>
                                            <th>Status</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applied as $key => $item)
                                            <tr>
                                            <td>{{ $item->joblisting->recruiter->user->name }}</td>
                                            <td>{{ $item->joblisting->job_title }}</td>

                                            <td>{{ $item->joblisting->job_description }}</td>
                                            <td>@if($item->status=='0')
                                                Applied
                                                @endif
                                                @if($item->status=='1')
                                                Selected
                                                @endif
                                                @if($item->status=='2')
                                                    Rejected
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->status =='0')
                                                    <button class="btn btn-outline"
                                                    onclick="deleteSupplier({{ $item->id }})" data-toggle="modal"
                                                    data-target="#danger">
                                                    <i data-feather="trash" width="20"></i>
                                                </button>
                                                    @endif

                                                </div>

                                            </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="mt-2">
                                {{-- {{ $jobs->links() }} --}}
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
                        <h5 class="modal-title white" id="myModalLabel120">confirm </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> you are cancelling your application  </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" onclick="deleteSupplierConfirm()" class="btn btn-danger ml-1"
                            data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Confirm</span>
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

@endsection
@section('custom-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        function deleteSupplier(id) {

            document.getElementById('deleteSupplierForm').action = '/apply-jobs/' + id;

        }

        function deleteSupplierConfirm() {

            document.getElementById('deleteSupplierForm').submit();
        }

    </script>
@endsection
