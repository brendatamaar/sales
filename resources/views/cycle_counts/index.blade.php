@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Cycle Count</h1>
            @can('create-user')
                <a href="{{ route('cycle_counts.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add
                    Upload Cycle Count</a>
            @endcan
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Site Id</th>
                            <th>Category</th>
                            <th>Item Code</th>
                            <th>Barcode Item</th>
                            <th>Item Name</th>
                            <th>Uom</th>
                            <th>Location</th>
                            <th>Loc Detail</th>
                            <th>QTY Sistem WMS</th>
                            <th>Qty Available WMS</th>
                            <th>Qty Allocated WMS</th>
                            <th>QTY Nav</th>
                            <th>QTY Fisik</th>
                            <th>Selisih Fisik vs WMS</th>
                            <th>HIT/MISS FIsik vs WMS</th>
                            <th>Total Qty Item WMS</th>
                            <th>Selisih WMS vs NAV</th>
                            <th>HIT/MISS Vs Nav</th>
                            <th>Note</th>
                            <th>Upload Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cycle_counts as $cycle_count)
                            <tr>
                                <td>{{ $cycle_count->site_id }}</td>
                                <td>{{ $cycle_count->category }}</td>
                                <td>{{ $cycle_count->item_code }}</td>
                                <td>{{ $cycle_count->barcode_item }}</td>
                                <td>{{ $cycle_count->item_name }}</td>
                                <td>{{ $cycle_count->uom }}</td>
                                <td>{{ $cycle_count->location }}</td>
                                <td>{{ $cycle_count->lottable_2 }}</td>
                                <td>{{ $cycle_count->qty_sistem_wms }}</td>
                                <td>{{ $cycle_count->qty_fisik }}</td>
                                <td>{{ $cycle_count->hit_miss }}</td>
                                <td>{{ $cycle_count->upload_date }}</td>
                                <td></td>

                            </tr>
                        @empty
                            <td colspan="5">
                                <span class="text-danger">
                                    <strong>No Data Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>

            </div>
            {{ $cycle_counts->links() }}

        </div>
    </div>
@endsection
