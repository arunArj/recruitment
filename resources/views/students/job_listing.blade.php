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
                            <h4 class="card-title">Job List</h4>
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
                                            <th>No of Vacancy</th>
                                            <th>Cut off percentage</th>
                                            <th> maximum allowed Arrers</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $key => $item)
                                            <tr>
                                            <td><a href="/recruiters/{{$item->recruiter->id}}">{{$item->recruiter->user->name}}</a></td>
                                            <td>{{ $item->job_title }}</td>

                                            <td>{{ $item->job_description }}</td>
                                            <td>{{ $item->no_of_vacancy }}</td>
                                            <td>{{ $item->percentage }}</td>
                                            <td>{{ $item->supply }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <button class="btn btn-outline"
                                                        onclick="deleteSupplier({{ $item->id }})" data-toggle="modal"
                                                        data-target="#danger">
                                                        <i data-feather="send" width="20"></i>
                                                    </button>
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
                        <h5 class="modal-title white" id="myModalLabel120"> Confirm </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> do you want to apply for this oppertunity</p>
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

            document.getElementById('deleteSupplierForm').action = '/students/apply-job/' + id;

        }

        function deleteSupplierConfirm() {

            document.getElementById('deleteSupplierForm').submit();
        }

    </script>
@endsection
