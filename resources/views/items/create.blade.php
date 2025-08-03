@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Add New Item
            </div>
            <div class="float-end">
                <a href="{{ route('items.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="label">Item No</label>
                    <div class="input-group">
                        <input type="text" id="item_no" name="item_no"
                            class="form-control @error('item_no') is-invalid @enderror" placeholder="Item No" required>

                        @error('item_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Item Desc</label>
                    <div class="input-group">
                        <input type="text" id="item_desc" name="item_desc"
                            class="form-control @error('item_desc') is-invalid @enderror" placeholder="Item Desc" required>

                        @error('item_desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">UOM</label>
                    <div class="input-group">
                        <input type="text" id="uom" name="uom"
                            class="form-control @error('uom') is-invalid @enderror" placeholder="UOM" required>

                        @error('uom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Kategori</label>
                    <div class="input-group">
                        <input type="text" id="kategori" name="kategori"
                            class="form-control @error('kategori') is-invalid @enderror" placeholder="Kategori" required>

                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="Add Item">
            </form>
        </div>
    </div>
@endsection
