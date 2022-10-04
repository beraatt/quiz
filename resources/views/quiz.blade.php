<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                @foreach ($quiz->questions as $question)
                    <strong> # {{ $loop->iteration }} </strong> {{ $question->question }}
                    @if ($question->image)
                    <img src="{{ asset($question->image) }}" class="img-responsive">
                    @endif
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->id }}1"
                            value="answer1">
                        <label class="form-check-label" for="{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="{{ $question->id }}2" value="answer2">
                        <label class="form-check-label" for="{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="{{ $question->id }}3" value="answer3">
                        <label class="form-check-label" for="{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="{{ $question->id }}4" value="answer4">
                        <label class="form-check-label" for="{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </p>
        </div>
    </div>
</x-app-layout>
