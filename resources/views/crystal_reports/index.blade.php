@extends('layout.master')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form_upload_crystal-report" method="POST" action="{{ url('import-excel-crystal-report') }}"
                    accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import File Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="file" id="fileInput" name="file" required />
                            <div id="countSheet" class="form-text text-info"></div>
                        </div>
                        <div class="my-3">
                            <label for="sheet" class="form-label">Masukkan urutan sheet</label>
                            <input type="text" class="form-control" id="sheet" name="sheet"
                                aria-describedby="textHelp">
                            <div id="textHelp" class="form-text text-danger">Pastikan urutan sheet yang akan diimport
                                sesuai dengan sheet yang ada di file Excel.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import
                            file</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Crystal Report</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Import Excel Crystal Report
            </button>
            <a class="btn btn-success" href="{{ url('download-template-crystal-report') }}" class="text-decoration-none"><i
                    class="fa fa-download"></i>
                Download import template</a>
            <a href="{{ url('delete-all-crystal-report') }}" class="btn btn-danger"><i class="fa fa-trash"></i>
                Delete All</a>
            <a href="{{ url('generate-barcode-crystal-report') }}" target="_blank" class="btn btn-warning"><i
                    class="fa fa-print"></i>
                Cetak Barcode</a>
            <a href="{{ url('generate-qr-crystal-report') }}" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i>
                Cetak QR Code</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Site ID</th>
                            <th scope="col">Site Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Location Type</th>
                            <th scope="col">Category</th>
                            <th scope="col">Item No</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Barcode</th>
                            <th scope="col">UOM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($crystal_reports as $crystal_report)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $crystal_report->site_sid }}</td>
                                <td>{{ $crystal_report->site_name }}</td>
                                <td>{{ $crystal_report->location }}</td>
                                <td>{{ $crystal_report->location_type }}</td>
                                <td>{{ $crystal_report->category }}</td>
                                <td>{{ $crystal_report->item_no }}</td>
                                <td>{{ $crystal_report->item_name }}</td>
                                <td>{{ $crystal_report->barcode }}</td>
                                <td>{{ $crystal_report->uom }}</td>
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
            {{ $crystal_reports->links() }}

        </div>
    </div>
@endsection
