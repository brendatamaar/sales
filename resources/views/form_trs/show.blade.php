@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('form_trs.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
        <div class="card-body">
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Form TR</h2>

                        <table>
                            <tr>
                                <td>No Document</td>
                                <td>:</td>
                                <td>{{ $form_trs->no_document }}</td>
                            </tr>
                            <tr>
                                <td>No Receipt</td>
                                <td>:</td>
                                <td>{{ $form_trs->no_receipt }}</td>
                            </tr>
                            <tr>
                                <td>Created by</td>
                                <td>:</td>
                                <td>{{ $form_trs->createdBy->name }}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>:</td>
                                <td>{{ $form_trs->created_at->format('d/m/Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <h5>Transfer From:</h5>
                        <p>{{ $form_trs->transferFrom->site_name }}<br>{{ $form_trs->transferFrom->regions->reg_name }}</p>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <h5>Transfer To:</h5>
                        <p>{{ $form_trs->transferTo->site_name }}<br>{{ $form_trs->transferTo->regions->reg_name }}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>TRS ID</th>
                                    <th>Nota Penjualan</th>
                                    <th>Promise Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($form_trs->trs as $trs)
                                    <tr>
                                        <td>{{ $trs->id }}</td>
                                        <td>{{ $trs->nota_penjualan }}</td>
                                        <td>{{ $trs->promise_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Item Code</th>
                                        <th>Item QTY</th>
                                    </tr>
                                    @foreach ($trs->item_trs as $item)
                                        <tr>
                                            <td>{{ $item->item_desc }}</td>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->qty }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <h5>Created By</h5>
                        <p>{{ $form_trs->createdBy->name }}</p>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <h5>Approved By</h5>
                        <p>{{ $form_trs->approvedBy->name ?? '-' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
