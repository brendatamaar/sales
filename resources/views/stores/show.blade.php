@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('stores.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
        <div class="card-body">

            <div class="mb-3 row">
                <label for="site_id" class="col-md-4 col-form-label text-md-end text-start"><strong>Site Id:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $store->site_id }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="site_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Site Name:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $store->site_name }}
                </div>
            </div>
        </div>
    </div>
@endsection
