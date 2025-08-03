@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Items</h1>
            @can('create-items')
                <a href="{{ route('items.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add
                    New
                    Items</a>
            @endcan
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item No</th>
                        <th scope="col">Item Desc</th>
                        <th scope="col">UOM</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td data-content="No">{{ $loop->iteration }}</td>
                            <td data-content="Item No">{{ $item->item_no }}</td>
                            <td data-content="Item Desc">{{ $item->item_desc }}</td>
                            <td data-content="UOM">{{ $item->uom }}</td>
                            <td data-content="Kategori">{{ $item->kategori }}</td>
                            <td data-content="Action">
                                <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-xs"><i
                                            class="bi bi-pencil-square"></i> Edit</a>


                                    <button type="submit" class="btn btn-danger btn-xs"
                                        onclick="return confirm('Do you want to delete this role?');"><i
                                            class="bi bi-trash"></i> Delete</button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5">
                            <span class="text-danger">
                                <strong>No Item Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{ $items->links() }}

        </div>
    </div>
@endsection
