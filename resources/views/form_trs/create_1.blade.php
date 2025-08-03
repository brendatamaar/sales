@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Form
                    </div>
                    <div class="float-end">
                        <a href="{{ route('form_trs.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('form_trs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="label">No Document</label>
                            <div class="input-group">
                                <input type="text" id="no_document" name="no_document"
                                    class="form-control @error('no_document') is-invalid @enderror"
                                    placeholder="No Document" required>

                                @error('no_document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">No Receipt</label>
                            <div class="input-group">
                                <input type="text" id="no_receipt" name="no_receipt"
                                    class="form-control @error('no_receipt') is-invalid @enderror" placeholder="No Receipt"
                                    required>

                                @error('no_receipt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">Transfer From</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm @error('transfer_from') is-invalid @enderror"
                                    id="transfer_from" name="transfer_from">
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->site_id }}">{{ $store->site_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label">Transfer To</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm @error('transfer_to') is-invalid @enderror"
                                    id="transfer_to" name="transfer_to">
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->site_id }}">{{ $store->site_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
@endpush

@push('custom-scripts')
@endpush
