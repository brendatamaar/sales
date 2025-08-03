@extends('layout.master')

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form_upload_mutasi_tag_bin" method="POST" action="{{ url('import-excel-mutasi-tagbin') }}"
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
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                {!! session('error') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-body">
            <h1 class="card-title">Manage Mutasi Tag Bin</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Import Excel Mutasi Tag Bin
            </button>
            <a class="btn btn-success" href="{{ url('download-template-mutasi-tagbin') }}" class="text-decoration-none"><i
                    class="fa fa-download"></i>
                Download import template</a>
            <a href="{{ url('delete-all-mutasi-tagbin') }}" class="btn btn-danger"><i class="fa fa-trash"></i>
                Delete All</a>
            <a href="{{ url('generate-barcode-mutasi-tagbin') }}" target="_blank" class="btn btn-warning"><i
                    class="fa fa-print"></i>
                Cetak Barcode</a>
            <a href="{{ url('generate-qr-mutasi-tagbin') }}" target="_blank" class="btn btn-warning"><i
                    class="fa fa-print"></i>
                Cetak QR Code</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Site ID</th>
                            <th scope="col">Site Name</th>
                            <th scope="col">Tag Bin Location</th>
                            <th scope="col">Area</th>
                            <th scope="col">Zone</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mutasi_tag_bins as $mutasi_tag_bin)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $mutasi_tag_bin->site_id }}</td>
                                <td>{{ $mutasi_tag_bin->site_name }}</td>
                                <td>{{ $mutasi_tag_bin->tag_bin_location }}</td>
                                <td>{{ $mutasi_tag_bin->area }}</td>
                                <td>{{ $mutasi_tag_bin->zone }}</td>
                                <td>{{ $mutasi_tag_bin->status }}</td>
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
            {{ $mutasi_tag_bins->links() }}

        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
@endpush

@push('custom-scripts')
    <script type="text/javascript">
        function countSheetsInExcel(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                var sheetCount = workbook.SheetNames.length;
                $("#countSheet").empty();
                $('#countSheet').append("Jumlah sheet di dalam file Excel: " + sheetCount + " sheet")
            };
            reader.readAsBinaryString(file);
        }

        var input = document.getElementById('fileInput');
        input.addEventListener('change', function(e) {
            var file = e.target.files[0];
            countSheetsInExcel(file);
        });

        function submitForm(input) {
            document.getElementById('excel-csv-import-form').submit();
        }
    </script>
@endpush
