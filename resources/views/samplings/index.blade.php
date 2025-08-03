@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Sampling</h1>
            @can('create-user')
                <a href="{{ route('samplings.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add
                    Upload Sampling</a>
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
                        @forelse ($samplings as $sampling)
                            <tr>
                                <td>{{ $sampling->site_id }}</td>
                                <td>{{ $sampling->category }}</td>
                                <td>{{ $sampling->item_code }}</td>
                                <td>{{ $sampling->barcode_item }}</td>
                                <td>{{ $sampling->item_name }}</td>
                                <td>{{ $sampling->uom }}</td>
                                <td>{{ $sampling->location }}</td>
                                <td>{{ $sampling->loc_detail }}</td>
                                <td>{{ $sampling->qty_sistem_wms }}</td>
                                <td>{{ $sampling->qty_available_wms }}</td>
                                <td>{{ $sampling->qty_allocated_wms }}</td>
                                <td>{{ $sampling->qty_nav }}</td>
                                <td>{{ $sampling->qty_fisik }}</td>
                                <td>{{ $sampling->selisih_fisik_wms }}</td>
                                <td>{{ $sampling->hit_miss_fisik_wms }}</td>
                                <td>{{ $sampling->total_qty_item_wms }}</td>
                                <td>{{ $sampling->selisih_wms_nav }}</td>
                                <td>{{ $sampling->hit_miss_wms_nav }}</td>
                                <td>{{ $sampling->note }}</td>
                                <td>{{ $sampling->upload_date }}</td>
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
            {{ $samplings->links() }}

        </div>
    </div>
@endsection
