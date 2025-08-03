@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Add New Store
            </div>
            <div class="float-end">
                <a href="{{ route('stores.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('stores.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="label">Site Id</label>
                    <div class="input-group">
                        <input type="text" id="site_id" name="site_id"
                            class="form-control @error('site_id') is-invalid @enderror" placeholder="Site Id" required>

                        @error('site_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Store Name</label>
                    <div class="input-group">
                        <input type="text" id="site_name" name="site_name"
                            class="form-control @error('site_name') is-invalid @enderror" placeholder="Store Name" required>

                        @error('site_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Region</label>
                    <div class="input-group">
                        <select class="custom-select custom-select-sm @error('region_id') is-invalid @enderror" id="region_id" name="region_id">
                            @forelse ($regions as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Add Store">
            </form>
        </div>
    </div>
@endsection
