<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset('assets/images/p-logo1.jpg') }}" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">


                <li class='sidebar-title'>Main Menu</li>



                <li class="sidebar-item  ">

                    <a href="/dashboard" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>


                </li>

                {{-- <li class="sidebar-item ">

            <a href="/patients" class='sidebar-link'>
                <i data-feather="home" width="20"></i>
                <span>Patients</span>
            </a>


        </li> --}}


                <li class="sidebar-item active  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="archive" width="20"></i>
                        <span>Menu</span>
                    </a>


                    <ul class="submenu">
                        @if (Auth()->user()->role == 'recruiter')
                            <li>
                                <a href="/profile" class="active">Credentials</a>
                            </li>
                            <li>
                                <a href="/recruiters/edit/{{ Auth()->user()->recruiter->id }}" class="active">Update
                                    pofile</a>
                            </li>
                            <li>
                                <a href="/recruiter/job-listing">Job List</a>
                            </li>
                            <li>
                                <a href="/recruiters/{{Auth()->user()->recruiter->id }}">View profile</a>
                            </li>
                        @endif
                        @if (Auth()->user()->role == 'admin')
                            <li>
                                <a href="/profile" class="active">Credentials</a>
                            </li>
                            <li>
                                <a href="/admin/users">Users</a>
                            </li>
                            <li>
                                <a href="/admin/job-listing">Job Listing</a>
                            </li>
                            <li>
                                <a href="/admin/view-company">Recruiters</a>
                            </li>
                        @endif
                        @if (Auth()->user()->role == 'student')
                        <li>
                            <a href="/profile">Credentials</a>
                        </li>
                        <li>
                            <a href="/students/{{Auth()->user()->student->id}}/edit">Manage Bio @if (Auth()->user()->status=='1')
                                <i data-feather="check" width="20" style="color: rgb(34, 155, 207)"></i>
                            @endif</a>
                        </li>
                        <li>
                            <a href="/students/job-listing">Oppertunities </a>
                        </li>
                        <li>
                            <a href="/students/apply-jobs">Applied List</a>
                        </li>
                    @endif


                    </ul>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
