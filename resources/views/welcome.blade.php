@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="py-3">Recent Jobs</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col">Companies</th>
                        <th scope="col">Jobs</th>
                        <th scope="col">Address</th>
                        <th scope="col">Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($jobs as $job)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td><img src="{{ asset('avatar/avatar.jpg') }}" alt="" width="80"></td>
                            <td>Position: {{ $job->position }} &nbsp;<i class="fa-regular fa-clock"></i>&nbsp;
                                {{ $job->type }}
                            </td>
                            <td><i class="fa-solid fa-earth-americas"></i>&nbsp; Address: {{ $job->address }}</td>
                            <td><i class="fa-regular fa-calendar-check"></i>&nbsp; Date:
                                {{ $job->created_at->diffForHumans() }}
                            </td>
                            <td><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}"><button
                                        class="btn btn-success btn-sm">Apply</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<style>
    .fa-solid,
    .fa-regular {
        color: #4183D7;
    }

</style>
