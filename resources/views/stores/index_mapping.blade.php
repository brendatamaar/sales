@extends('layout.master')

@section('content')
    <!-- Pop-up Alert -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" id="successAlert" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" id="errorAlert" role="alert">
            {!! session('error') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Manage Region Mapping</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Region</th>
                        <th scope="col">Data No</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mappings as $mapping)
                        <tr>
                            <td data-content="Region Id">{{ $mapping->region_id }}</td>
                            <td data-content="Data No">{{ $mapping->data_no }}</td>
                            <td data-content="Action">
                                <button class="btn btn-primary edit-btn" data-id="{{ $mapping->id }}"
                                    data-no="{{ $mapping->data_no }}" data-name="{{ $mapping->region_id }}"
                                    data-toggle="modal" data-target="#editModal">Edit</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <span class="text-danger">
                                    <strong>No User Found!</strong>
                                </span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $mappings->links() }}
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Mapping for <span id="region_name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_mapping" method="POST" action="{{ url('stores/update-mapping') }}" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="data_no">Data No:</label>
                            <select class="form-select" id="data_no" name="data_no">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <input type="hidden" id="region_id" name="region_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm('#update_mapping')">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var id = $(this).data('id');
                var dataNo = $(this).data('no');
                var regName = $(this).data('name');
                $('#region_id').val(id);
                $('#data_no').val(dataNo);
                $('#region_name').text(regName);
            });
        });

        function submitForm(formId) {
            $(formId).submit();
        }
    </script>
@endpush
