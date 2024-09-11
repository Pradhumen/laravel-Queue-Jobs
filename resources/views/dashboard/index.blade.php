@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Email Job Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.startJobs') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>To</th>
                    <th>Subject</th>
                    <th>Body</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            <input type="checkbox" name="job_ids[]" value="{{ $job->id }}">
                        </td>
                        <td>{{ $job->to }}</td>
                        <td>{{ $job->subject }}</td>
                        <td>{{ $job->body }}</td>
                        <td>{{ $job->status ?? 'Pending' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Start Selected Jobs</button>
    </form>
</div>
@endsection
