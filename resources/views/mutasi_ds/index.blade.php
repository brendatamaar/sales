@extends('layout.master')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form_upload_mutasi_tag_bin" method="POST" action="{{ url('import-excel-mutasi-d') }}"
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
            <h1 class="card-title">Manage Mutasi D</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Import Excel Mutasi D
            </button>
            <a class="btn btn-success" href="{{ url('download-template-mutasi-d') }}" class="text-decoration-none"><i
                    class="fa fa-download"></i>
                Download import template</a>
            <a href="{{ url('delete-all-mutasi-d') }}" class="btn btn-danger"><i class="fa fa-trash"></i>
                Delete All</a>
            <a href="{{ url('generate-barcode-mutasi-d') }}" target="_blank" class="btn btn-warning"><i
                    class="fa fa-print"></i>
                Cetak Barcode</a>
            <a href="{{ url('generate-qr-mutasi-d') }}" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i>
                Cetak QR Code</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Kertas Mutasi</th>
                            <th scope="col">Site ID</th>
                            <th scope="col">Site Name</th>
                            <th scope="col">Tag Bin Location</th>
                            <th scope="col">Area</th>
                            <th scope="col">Zone</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mutasi_ds as $mutasi_d)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $mutasi_d->no_kertas }}</td>
                                <td>{{ $mutasi_d->site_id }}</td>
                                <td>{{ $mutasi_d->site_name }}</td>
                                <td>{{ $mutasi_d->tag_bin_location }}</td>
                                <td>{{ $mutasi_d->area }}</td>
                                <td>{{ $mutasi_d->zone }}</td>
                                <td>{{ $mutasi_d->status }}</td>
                                <td>{{ $mutasi_d->cek }}</td>
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
            {{ $mutasi_ds->links() }}

        </div>
    </div>
@endsection
