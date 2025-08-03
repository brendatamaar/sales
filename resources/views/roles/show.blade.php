@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('stores.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
        <div class="card-body">

            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    {{ $role->name }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Permissions:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                    @if ($role->name=='Super Admin')
                        <span class="badge bg-dark">All</span>
                    @else
                        @forelse ($rolePermissions as $permission)
                            <h5><span class="badge">{{ $permission->name }}</span></h5>
                        @empty
                        @endforelse
                    @endif
                </div>
            </div>
    </div>
    </div>
@endsection
