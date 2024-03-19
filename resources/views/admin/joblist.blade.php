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
                        <div class="card-header">
                            <h4 class="card-title">Job List</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    {{-- <form method="get" action="/patients">
                                        <input type="text" class="form-control" id="basicInput" placeholder="Search">
                                    </form> --}}
                                </div>
                                <div class="form-group"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($jobListings as $key => $item)
                                <div class="job-item py-3 border-bottom">
                                    <div class="mb-2"><strong>{{ $item->job_title }}</strong> (<a href="/recruiters/{{ $item->recruiter->id }}">{{ $item->recruiter->user->name }}</a>) </div>

                                    <div class="mb-2"> {{ $item->job_description }}</div>
                                    <div class="mb-2">No of Vacancy:{{ $item->no_of_vacancy }}</div>
                                    <div class="mb-2">Cut off percentage: {{ $item->percentage }}</div>
                                    <div class="mb-2">Maximum allowed Arrears: {{ $item->supply }}</div>
                                    <div class="mb-2">Status:@if ($item->status == 0) Draft @else Published @endif<button class="btn btn-outline" onclick="deleteSupplier({{ $item->id }})"
                                        data-toggle="modal" data-target="#danger">
                                        <i data-feather="send" width="20"></i>
                                    </button></div>

                                </div>
                            @endforeach
                            <div class="mt-4">
                                {{ $jobListings->links() }}
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

                        <form id="deleteSupplierForm" method="post" action="/medicines">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <select class="form-control" name="status" id="">
                                    <option value="0">Draft</option>
                                    <option value="1">Published</option>
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
            document.getElementById('deleteSupplierForm').action = '/admin/job-listing/' + id;
            // document.getElementById('deleteSupplierForm').submit();
        }

        function deleteSupplierConfirm() {

            document.getElementById('deleteSupplierForm').submit();
        }

    </script>
@endsection
