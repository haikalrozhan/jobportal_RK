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
                            @if ($errors->has('avatar'))
                                <div class="text-danger">{{ $errors->first('avatar') }}</div>
                            @endif
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
                                @if ($errors->has('address'))
                                    <div class="text-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="p-2">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="{{ Auth::user()->profile->phone_number }}">
                                @if ($errors->has('phone_number'))
                                    <div class="text-danger">{{ $errors->first('phone_number') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="experience" class="p-2">Experience</label>
                                <textarea name="experience" id="experience" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
                                @if ($errors->has('experience'))
                                    <div class="text-danger">{{ $errors->first('experience') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bio" class="p-2">Bio</label>
                                <textarea name="bio" id="bio" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
                                @if ($errors->has('bio'))
                                    <div class="text-danger">{{ $errors->first('bio') }}</div>
                                @endif
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
                        <p>Phone Number: {{ Auth::user()->profile->phone_number }}</p>
                        <p>Experience: {{ Auth::user()->profile->experience }}</p>
                        <p>Bio: {{ Auth::user()->profile->bio }}</p>
                        <p>Member Since: {{ date('d F Y', strtotime(Auth::user()->profile->created_at)) }}</p>
                        @if (!empty(Auth::user()->profile->cover_letter))
                            <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                        @else
                            <p class="text-warning">Please upload your cover letter</p>
                        @endif

                        @if (!empty(Auth::user()->profile->resume))
                            <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                        @else
                            <p class="text-warning">Please upload your resume</p>
                        @endif
                    </div>
                </div>

                <div class="card mt-3">
                    <form action="{{ route('coverletter') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-header">Update Cover Letter</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_letter">
                            @if ($errors->has('cover_letter'))
                                <div class="text-danger">{{ $errors->first('cover_letter') }}</div>
                            @endif
                            <button class="btn btn-success btn my-2 float-end" type="submit">Update</button>
                        </div>
                    </form>

                </div>
                <div class="card mt-3">
                    <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-header">Update Resume</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="resume">
                            @if ($errors->has('resume'))
                                <div class="text-danger">{{ $errors->first('resume') }}</div>
                            @endif
                            <button type="submit" class="btn btn-success btn my-2 float-end">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
