@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Upload Data Sampling
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="label">File 1</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file1">
                        <label class="custom-file-label" for="file1">Choose file 1</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">File 2</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file2">
                        <label class="custom-file-label" for="file1">Choose file 2</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Import">
            </form>
        </div>
    </div>
@endsection
