<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div id='seconds-counter'> </div>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <form method="POST" action="{{route('quiz.result',$quiz->slug)}}">
                    @csrf
                @foreach ($quiz->questions as $question)
                    <strong> #{{ $loop->iteration }} </strong> {{ $question->question }}
                    @if ($question->image)
                    <img src="{{ asset($question->image) }}" style="" class="img-responsive">
                    @endif
                    <div class="form-check mt-2">
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
                <button class="btn btn-success btn-sm btn-block mt-4" type="submit">Sınavı Bitir</button>
            </form>
            </p>
        </div>
    </div>
        <x-slot name="js">
        <script type="">
             var seconds = 5;
             var el = document.getElementById('seconds-counter');
                function incrementSeconds() {
                    seconds -= 1;
                    el.innerText = "Quizin bitmesine " + seconds + " saniye kalmıştır.";
                    if(seconds == 0){
                Swal.fire(
                    "Süreniz bitmiştir",
                    "Quiz için verilen süreniz bitmiştir. Anasayfaya yönlendiriliyorsunuz",
                    "error"
                )
                clearInterval(cancel);
                setTimeout(function() {
                    window.location.replace("http://quiz.test/panel")
                }, 2000);
                }
            }
            var cancel = setInterval(incrementSeconds, 1000);

        </script>
        <script>

        </script>
    </x-slot>
</x-app-layout>
