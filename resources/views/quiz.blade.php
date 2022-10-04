<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                @foreach ($quiz->questions as $question)
                    <strong> # {{ $loop->iteration }} </strong> {{ $question->question }}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->name }}"
                            value="answer1" >
                        <label class="form-check-label" for="{{ $question->name }}">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->name }}"
                            value="answer2" >
                        <label class="form-check-label" for="{{ $question->name }}">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->name }}"
                            value="answer3" >
                        <label class="form-check-label" for="{{ $question->name }}">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->name }}"
                            value="answer4" >
                        <label class="form-check-label" for="{{ $question->name }}">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                    <hr>
                @endforeach
            </p>
        </div>
    </div>
</x-app-layout>
