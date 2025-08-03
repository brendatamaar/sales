@extends('layout.master')

@push('plugin-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')
    <div class="row justify-content-center">
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
                <form method="POST" action="{{ route('form_trs.store_2') }}">
                    @csrf
                    <input type="hidden" id="form_id" name="form_id" value="{{ $form_trs->id }}" required>

                    <div id="main-container">
                        <div class="group-container border p-3 rounded">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nota_penjualan">Nota Penjualan:</label>
                                    <input type="text" name="form_trs[0][note_penjualan]" id="nota_penjualan"
                                        class="form-control" placeholder="Nota Penjualan" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="promise_date">Promise Date:</label>
                                    <input type="text" name="form_trs[0][promise_date]" id="promise_date"
                                        class="form-control datepicker" placeholder="Pilih Tanggal" required>
                                </div>
                            </div>

                            <div class="fields-container">
                                <div class="field-row">
                                    <label class="label">Pilih Item TR</label>
                                    <div class="form-row">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <select class="form-control" onchange="populateFields(this)">
                                                    <option value="" selected>Pilih Item</option>
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->item_id }}" data-no="{{ $item->item_no }}"
                                                            data-desc="{{ $item->item_desc }}"
                                                            data-code="{{ $item->kategori }}"
                                                            data-uom="{{ $item->uom }}">{{ $item->item_desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="form_trs[0][items][0][item_no]"
                                                id="field-0-0-item_no" class="form-control">
                                            <input type="hidden" name="form_trs[0][items][0][item_desc]"
                                                id="field-0-0-item_desc" class="form-control">
                                            <input type="hidden" name="form_trs[0][items][0][item_code]"
                                                id="field-0-0-item_code" class="form-control">
                                            <input type="hidden" name="form_trs[0][items][0][uom]" id="field-0-0-uom"
                                                class="form-control">
                                            <div class="form-group col-md-4">
                                                <input type="text" name="form_trs[0][items][0][qty]" id="field-qty"
                                                    class="form-control" placeholder="Qty">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button type="button" class="btn btn-info add-field-btn">Tambah Item
                                                    Baru</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-danger remove-group-btn">Hapus Form TR</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="button" id="add-group-btn" class="btn btn-primary">Tambah Form TR</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush

@push('custom-scripts')
    <script>
        function populateFields(selectElement) {
            // Dapatkan data dari option yang dipilih
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const itemNo = selectedOption.getAttribute('data-no');
            const itemDesc = selectedOption.getAttribute('data-desc');
            const itemCode = selectedOption.getAttribute('data-code');
            const itemUom = selectedOption.getAttribute('data-uom');

            // Temukan elemen input yang berhubungan
            const fieldRow = selectElement.closest('.field-row');
            const fieldItemNoInput = fieldRow.querySelector('input[name$="[item_no]"]');
            const fieldItemDescInput = fieldRow.querySelector('input[name$="[item_desc]"]');
            const fieldItemCodeInput = fieldRow.querySelector('input[name$="[item_code]"]');
            const fieldUomInput = fieldRow.querySelector('input[name$="[uom]"]');

            // Isi field name dan field value
            fieldItemNoInput.value = itemNo;
            fieldItemDescInput.value = itemDesc;
            fieldItemCodeInput.value = itemCode;
            fieldUomInput.value = itemUom;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi flatpickr pada datepicker yang sudah ada
            flatpickr(".datepicker", {});

            document.getElementById('add-group-btn').addEventListener('click', function() {
                let mainContainer = document.getElementById('main-container');
                let groupIndex = mainContainer.children.length;
                let newGroup = document.createElement('div');
                newGroup.classList.add('group-container');
                newGroup.innerHTML = `
                    <div class="border p-3 rounded mt-4">
                        <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nota_penjualan-${groupIndex}">Nota Penjualan:</label>
                            <input type="text" name="form_trs[${groupIndex}][note_penjualan]" id="nota_penjualan-${groupIndex}"
                            class="form-control" placeholder="Nota Penjualan" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="promise_date-${groupIndex}">Promise Date:</label>
                            <input type="text" name="form_trs[${groupIndex}][promise_date]" id="promise_date-${groupIndex}"
                                class="form-control datepicker" placeholder="Pilih Tanggal" required>
                        </div>
                    </div>

                    <div class="fields-container">
                        <div class="field-row">
                            <label class="label">Pilih Item TR</label>

                            <div class="form-row">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <select class="form-control" onchange="populateFields(this)">
                                            <option value="" selected>Pilih Item</option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item->item_id }}" data-no="{{ $item->item_no }}"
                                                    data-desc="{{ $item->item_desc }}" data-code="{{ $item->kategori }}"
                                                    data-uom="{{ $item->uom }}">{{ $item->item_desc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="form_trs[${groupIndex}][items][0][item_no]" id="field-item_no"
                                        class="form-control">
                                    <input type="hidden" name="form_trs[${groupIndex}][items][0][item_desc]" id="field-item_desc"
                                        class="form-control">
                                    <input type="hidden" name="form_trs[${groupIndex}][items][0][item_code]" id="field-item_code"
                                        class="form-control">
                                    <input type="hidden" name="form_trs[${groupIndex}][items][0][uom]" id="field-uom"
                                        class="form-control">
                                    <div class="form-group col-md-4">
                                        <input type="text" name="form_trs[${groupIndex}][items][0][qty]" id="field-qty"
                                            class="form-control" placeholder="Qty">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="button" class="btn btn-info add-field-btn">Tambah Item Baru</button>
                                    </div>
                                </div>

                                </div>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="button" class="btn btn-danger remove-group-btn">Hapus Form TR</button>
                        </div>
                    </div>
                `;
                mainContainer.appendChild(newGroup);
                attachAddFieldHandler(newGroup, groupIndex);
                attachRemoveGroupHandler(newGroup);

                // Inisialisasi flatpickr untuk datepicker yang baru
                flatpickr(`#promise_date-${groupIndex}`, {});
            });

            function attachAddFieldHandler(groupContainer, groupIndex) {
                groupContainer.querySelector('.add-field-btn').addEventListener('click', function() {
                    let fieldsContainer = groupContainer.querySelector('.fields-container');
                    let fieldIndex = fieldsContainer.children.length;
                    let newField = document.createElement('div');
                    newField.classList.add('field-row');
                    newField.innerHTML = `
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select class="form-control" onchange="populateFields(this)">
                                    <option value="" selected>Pilih Item</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->item_id }}" data-no="{{ $item->item_no }}"
                                            data-desc="{{ $item->item_desc }}" data-code="{{ $item->kategori }}"
                                            data-uom="{{ $item->uom }}">{{ $item->item_desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="form_trs[${groupIndex}][items][${fieldIndex}][item_no]" id="field-${groupIndex}-${fieldIndex}-item_no"
                            class="form-control">
                            <input type="hidden" name="form_trs[${groupIndex}][items][${fieldIndex}][item_desc]" id="field-${groupIndex}-${fieldIndex}-item_desc"
                                class="form-control">
                            <input type="hidden" name="form_trs[${groupIndex}][items][${fieldIndex}][item_code]" id="field-${groupIndex}-${fieldIndex}-item_code"
                                class="form-control">
                            <input type="hidden" name="form_trs[${groupIndex}][items][${fieldIndex}][uom]" id="field-${groupIndex}-${fieldIndex}-uom"
                                class="form-control">
                            <div class="form-group col-md-4">
                                <input type="text" name="form_trs[${groupIndex}][items][${fieldIndex}][qty]" id="field-${groupIndex}-${fieldIndex}-qty"
                                    class="form-control" placeholder="Qty">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="button" class="btn btn-danger remove-field-btn">Hapus Item</button>
                            </div>
                        </div>
                        
                    `;
                    fieldsContainer.appendChild(newField);
                    attachRemoveFieldHandler(newField);
                });
            }

            function attachRemoveFieldHandler(fieldContainer) {
                fieldContainer.querySelector('.remove-field-btn').addEventListener('click', function() {
                    fieldContainer.remove();
                });
            }

            function attachRemoveGroupHandler(groupContainer) {
                groupContainer.querySelector('.remove-group-btn').addEventListener('click', function() {
                    groupContainer.remove();
                });
            }

            // Attach handlers to the initial group
            let initialGroup = document.querySelector('.group-container');
            attachAddFieldHandler(initialGroup, 0);
            attachRemoveGroupHandler(initialGroup);
        });
    </script>
@endpush
