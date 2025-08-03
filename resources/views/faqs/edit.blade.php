@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Edit FAQ
            </div>
            <div class="float-end">
                <a href="{{ route('faqs.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('faqs.update', $faq->id) }}" method="post">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label class="label">Question</label>
                    <div class="input-group">
                        <input type="text" id="question" name="question"
                            class="form-control @error('question') is-invalid @enderror" value="{{ $faq->question }}" placeholder="Question" required>

                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Answer</label>
                    <div class="input-group">
                        <textarea rows="5" type="text" id="answer" name="answer"
                            class="form-control @error('answer') is-invalid @enderror" placeholder="Answer" required>{{ $faq->answer }}</textarea>

                        @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Edit Data">
            </form>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
@endpush

@push('custom-scripts')
@endpush
