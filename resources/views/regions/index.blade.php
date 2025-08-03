@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Region</h1>
            @can('create-user')
                <a href="{{ route('stores.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add
                    New
                    Store</a>

                <a href="{{ route('stores.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>Manage
                    Region</a>
            @endcan
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Site Id</th>
                        <th scope="col">Site Name</th>
                        <th scope="col">Region</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stores as $store)
                        <tr>
                            <td data-content="Site Id">{{ $store->site_id }}</td>
                            <td data-content="Site Name">{{ $store->site_name }}</td>
                            <td data-content="Region">{{ $store->regions->reg_name }}</td>
                            <td data-content="Action">
                                <form action="{{ route('stores.destroy', $store->site_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('stores.show', $store->site_id) }}" class="btn btn-warning btn-xs"><i
                                            class="bi bi-eye"></i> Show</a>

                                    @can('edit-store')
                                        <a href="{{ route('stores.edit', $store->site_id) }}" class="btn btn-primary btn-xs"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                    @endcan

                                    @can('delete-store')
                                        <button type="submit" class="btn btn-danger btn-xs"
                                            onclick="return confirm('Do you want to delete this role?');"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    @endcan

                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5">
                            <span class="text-danger">
                                <strong>No User Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{ $stores->links() }}

        </div>
    </div>
@endsection
