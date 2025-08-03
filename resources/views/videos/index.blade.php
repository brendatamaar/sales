@extends('layout.master')

@section('content')
    <a href="{{ route('videos.create') }}" class="btn btn-success btn-sm mb-4 mx-2"><i class="bi bi-plus-circle"></i> Upload
        New
        Video</a>
    @foreach ($videos as $video)
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $video->title }}</h5>
                    <video width="100%" controls>
                        <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <p class="mt-5">
                        Created by {{ $video->user->name }}
                        <br>
                        Uploaded at {{ $video->created_at }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
