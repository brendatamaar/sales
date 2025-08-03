@extends('layout.master')

@section('content')
    <div id="accordion">
        @forelse ($faqs as $faq)
            <div class="card">
                <div class="card-header" id="heading{{ $faq->id }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h5>
                </div>

                <div id="collapse{{ $faq->id }}" class="collapse show" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                    <div class="card-body">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-danger">
                <strong>No Data Found!</strong>
            </div>
        @endforelse
    </div>
@endsection
