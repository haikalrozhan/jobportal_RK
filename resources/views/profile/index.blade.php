@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if (empty(Auth::user()->profile->avatar))
                    <img src="{{ asset('avatar/avatar.jpg') }}" style="width: 100%;">
                @else
                    <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" style="width: 100%;">
                @endif
                <div class="card mt-3">
                    <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-header">Update Your Avatar</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="avatar">
                            <button class="btn btn-success btn my-2 float-end" type="submit">Update</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-5">
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">

                    <form action="{{ route('userProfile.store') }}" method="POST">@csrf

                        <div class="card-header">Update Your Profile</div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="address" class="p-2">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ Auth::user()->profile->address }}">
                            </div>
                            <div class="form-group">
                                <label for="experience" class="p-2">Experience</label>
                                <textarea name="experience" id="experience" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="bio" class="p-2">Bio</label>
                                <textarea name="bio" id="bio" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
                            </div>
                            <div class="form-group pt-2">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <div class="col-md-4">

                <div class="card mt-3">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <p>Name: {{ Auth::user()->name }}</p>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <p>Address: {{ Auth::user()->profile->address }}</p>
                        <p>Experience: {{ Auth::user()->profile->experience }}</p>
                        <p>Bio: {{ Auth::user()->profile->bio }}</p>
                        <p>Member Since: {{ date('d F Y', strtotime(Auth::user()->profile->created_at)) }}</p>
                        @if (!empty(Auth::user()->profile->cover_letter))
                            <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                        @else
                            <p>Please upload your cover letter</p>
                        @endif

                        @if (!empty(Auth::user()->profile->resume))
                            <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                        @else
                            <p>Please upload your resume</p>
                        @endif
                    </div>
                </div>

                <div class="card mt-3">
                    <form action="{{ route('coverletter') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-header">Update Cover Letter</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_letter">
                            <button class="btn btn-success btn my-2 float-end" type="submit">Update</button>
                        </div>
                    </form>

                </div>
                <div class="card mt-3">
                    <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-header">Update Resume</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="resume">
                            <button type="submit" class="btn btn-success btn my-2 float-end">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
