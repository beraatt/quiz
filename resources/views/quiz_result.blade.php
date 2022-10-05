<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Sonucu </x-slot>
    <div class="card">
        <div class="card-body">
<span>Puan: {{$quiz->my_result->point}}</span>
            <div role="alert">
                <div class="border border-t-0  border-blue-600 rounded-b bg-blue-100 px-4 py-3 ">
                    <i class="fa fa-circle"></i> İşaretlediğiniz Şık <br>
                    <i class="fa fa-check-circle text-green-600"></i> Doğru Cevap<br>
                    <i class="fa fa-times-circle text-red-600"></i> Yanlış Cevap<br>

                </div>
              </div>

            <p class="card-text">
                @csrf
                @foreach ($quiz->questions as $question)
                <small>Bu soruya <strong>%{{$question->true_percent}}</strong> oranında doğru cevap verildi </small> <br>
                    @if ($question->correct_answer == $question->my_answer->answer)
                        <i class="fa fa-check-circle text-green-600"></i>
                    @else
                        <i class="fa fa-times-circle text-red-600"></i>
                    @endif
                    <strong> #{{ $loop->iteration }} </strong> {{ $question->question }}
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" style="" class="img-responsive">
                    @endif
                    <div class="form-check mt-2">
                        @if ('answer1' == $question->correct_answer)
                            <i class="fa fa-check-circle text-green-500"></i>
                        @elseif ('answer1' == $question->my_answer->answer)
                            <i class="fa fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ('answer2' == $question->correct_answer)
                            <i class="fa fa-check-circle text-green-500"></i>
                        @elseif ('answer2' == $question->my_answer->answer)
                            <i class="fa fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ('answer3' == $question->correct_answer)
                            <i class="fa fa-check-circle text-green-500"></i>
                        @elseif ('answer3' == $question->my_answer->answer)
                            <i class="fa fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ('answer4' == $question->correct_answer)
                            <i class="fa fa-check-circle text-green-500"></i>
                        @elseif ('answer4' == $question->my_answer->answer)
                            <i class="fa fa-circle"></i>
                        @endif
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
