@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Frequently Asked Questions</h1>
            {{-- @can('create-user') --}}
            <a href="{{ route('faqs.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add
                FAQ</a>
            {{-- @endcan --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faqs as $faq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $faq->question }}</td>
                            <td style="white-space: pre-line;">{{ $faq->answer }}</td>
                            <td>
                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('faqs.edit', $faq->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
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
            {{ $faqs->links() }}

        </div>
    </div>

@endsection
