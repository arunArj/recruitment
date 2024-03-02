<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Company Profile </title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ URL::asset('company/assets/vendors/themify-icons/css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('company/assets/css/johndoe.css') }}">

</head>
@php
if($profile->image==null){
$image = 'placeholder.png';
}else{
    $image = $profile->image;
}
@endphp
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <a href="components.html" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i class="ti-shift-left-alt"></i> Components</a>
    <header class="header" style="
      background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{asset('images/'.$image)}});
  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{asset('images/'.$profile->image)}});

    ">
        <div class="container">

            <div class="header-content">
                {{-- <h4 class="header-subtitle" >Hello, We are</h4> --}}
                <h1 class="header-title">{{$profile->user->name}}</h1>
                <h6 class="header-mono" >{{$profile->sub_title}}</h6>
                {{-- <button class="btn btn-primary btn-rounded"><i class="ti-printer pr-2"></i>view Resume</button> --}}
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div id="about" class="row about-section">
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Who are we ?</h3>
                <span class="line mb-5"></span>

                <p class="mt-20">{{$profile->desc}}</p>

            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">contact Info</h3>
                <span class="line mb-5"></span>
                <ul class="mt40 info list-unstyled">

                    <li><span>Email</span> : {{$profile->user->email}}</li>
                    <li><span>Phone</span> : {{$profile->phone}}</li>
                    <li><span>Address</span> :{{$profile->address}}</li>
                </ul>

            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light"><a href="/job-listing">Job Lists</a></h3>
                <span class="line mb-5"></span>
                @foreach ($profile->jobListing as $item)
                <div class="row">
                    <div class="col-1 text-danger pt-1"></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>{{$item->job_title}}</h6>
                        {{-- <p class="subtitle"> {{$item->job_description}}</p> --}}
                        <hr>
                    </div>
                </div>
                @endforeach

                {{-- <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-paint-bucket icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Web Development</h6>
                        <p class="subtitle">Lorem ipsum dolor sit consectetur.</p>
                        <hr>
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Digital Marketing</h6>
                        <p class="subtitle">voluptate commodi illo voluptatib.</p>
                        <hr>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>



    <section class="section bg-dark py-5">
        <div class="container text-center">
            {{-- <h2 class="text-light mb-5 font-weight-normal">A Good Candidate?</h2> --}}
            <a href="/dashboard" class="btn bg-primary w-lg" >Go back</a>
        </div>
    </section>

    <footer class="footer py-3">
        <div class="container">
            <p class="small mb-0 text-light">

            </p>
        </div>
    </footer>

	<!-- core  -->



</body>
</html>
