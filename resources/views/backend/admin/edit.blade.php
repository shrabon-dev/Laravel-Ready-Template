@extends('layouts.masterdashboard')
@section('dashboard_body')



<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Account</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                    <li class="breadcrumb-item active">
                        Edit Account 
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid page__container">

        <div class="row">
            <div class="col-lg-9 pr-lg-0">

                <div class="page-section">
                    <form action="{{ route('admin.info.change') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $error }}</strong>
                                </div>
                            @endforeach
                        @endif
                    <h4>Basic Information</h4>
                    <div class="list-group list-group-form">
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="col-form-label form-label col-sm-3">Your photo</label>
                                <div class="col-sm-9 media align-items-center">
                                    <a href="" class="media-left mr-16pt">
                                        @if (auth()->user()->profile_photo)
                                        <img src="{{ asset('uploads/profile') }}/{{ auth()->user()->profile_photo }}" alt="people" width="56" class="rounded-circle">
                                        @else
                                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="people" width="56" class="rounded-circle">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <div class="custom-file">
                                            <input name="profile_photo" type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="form-label col-form-label col-sm-3">First name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ auth()->user()->name }}" class="form-control" name="name" placeholder="Your name ...">
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="form-label col-form-label col-sm-3">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="phone" value="{{ auth()->user()->phone }}" name="phone" class="form-control"  placeholder="Your phone number...">
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="form-label col-form-label col-sm-3">Email address</label>
                                <div class="col-sm-9">
                                    <input type="email" value="{{ auth()->user()->email }}" class="form-control" name="email" placeholder="Your email address ...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-nav__content">
                        <button type="submit" class="btn btn-accent">Save changes</button>
                    </div>
                </form>
                </div>

                {{-- password changes form start --}}
                <div class="page-section">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                         <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                         </div>
                        @endforeach
                    @endif
                    <form method="post" action="{{ route('admin.password.change') }}">

                        @csrf

                    <h4>Password Change</h4>
                    <div class="list-group list-group-form">
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="form-label col-form-label col-sm-3">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password"  name="current_password" class="form-control @error('current_password')
                                    is-invalid
                                    @enderror" placeholder="Current password">
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="form-label col-form-label col-sm-3">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="New password">
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="form-group row align-items-center mb-0">
                                <label class="form-label col-form-label col-sm-3">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-nav__content">
                        <button type="submit" class="btn btn-accent">Save changes</button>
                    </div>
                </form>
                </div>

            </div>
            {{-- <div class="col-lg-3 page-nav">
                <div class="page-section pt-lg-112pt">
                    <nav class="nav page-nav__menu">
                        <a class="nav-link active" href="edit-account.html">Basic Information</a>
                        <a class="nav-link" href="edit-account-profile.html">Profile &amp; Privacy</a>
                        <a class="nav-link" href="edit-account-notifications.html">Email Notifications</a>
                        <a class="nav-link" href="edit-account-password.html">Change Password</a>
                    </nav>

                </div>
            </div> --}}

        </div>

</div>

@endsection
