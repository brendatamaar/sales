@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Form TR</h1>
            @can('create-form_trs')
                <a href="{{ route('form_trs.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add
                    New
                    Form TR</a>
            @endcan
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Document</th>
                        <th scope="col">No Receipt</th>
                        <th scope="col">Transfer From</th>
                        <th scope="col">Transfer To</th>
                        <th scope="col">Status Form</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Updated By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($form_trs as $form_tr)
                        <tr>
                            <td scope="row" data-content="#">{{ $loop->iteration }}</td>
                            <td data-content="Name">{{ $form_tr->no_document }}</td>
                            <td data-content="NIK">{{ $form_tr->no_receipt }}</td>
                            <td data-content="Email">{{ $form_tr->transferFrom->site_name }}</td>
                            <td data-content="Email">{{ $form_tr->transferTo->site_name }}</td>
                            <td data-content="Email">{{ $form_tr->status_form }}</td>
                            <td data-content="Region">{{ $form_tr->createdBy->name }}</td>
                            <td data-content="Site Name">{{ $form_tr->approvedBy->name ?? '-' }}</td>
                            <td>
                                @if(Auth::user()->can('approve-form_trs'))
                                <form action="{{ route('form_trs.approve', $form_tr->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Approve</button>
                                </form>
                                @endif
                                <a href="{{ route('form_trs.show', $form_tr->id) }}" class="btn btn-success btn-sm"><i
                                        class="bi bi-eye"></i> Detail</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5">
                            <span class="text-danger">
                                <strong>No Form Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{ $form_trs->links() }}

        </div>
    </div>
@endsection
