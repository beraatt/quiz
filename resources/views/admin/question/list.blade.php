<x-app-layout>
    <x-slot name="header">{{$quiz->title}} quizine ait sorular</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <a href="{{route('questions.create',$quiz->id) }}" class="btn btn-sm btn-primary"> <i
                        class="fa fa-plus"></i> Soru Oluştur</a>

        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Soru</th>
                    <th scope="col">Fotoğraf</th>
                    <th scope="col">1. Cevap</th>
                    <th scope="col">2. Cevap</th>
                    <th scope="col">3. Cevap</th>
                    <th scope="col">4. Cevap</th>
                    <th scope="col" >Dogru Cevap</th>
                    <th scope="col">Islemler</th>
                </tr>
                @foreach ($quiz->questions as $question)
                <tr>
                    <td>{{ $question->question }} </td>
                    <td>
                        @if ($question->image)
                            <a href="{{asset($question->image)}}" target="_blanck" class="btn btn-sm btn-light">Görüntüle</a>
                        @endif

                    </td>
                    <td>{{ $question->answer1 }}</td>
                    <td>{{ $question->answer2 }}</td>
                    <td>{{ $question->answer3 }}</td>
                    <td>{{ $question->answer4 }}</td>
                    <td class="text-success" style="text-align: center">{{ Str::substr($question->correct_answer, -1, 1) }}. Cevap</td>
                    <td>
                        <form action="{{ route('questions.destroy', [$quiz->id,$question->id]) }}" method="POST"> @method('DELETE')
                            @csrf <button type="submit" class="btn btn-sm btn-danger"><i
                                    class="fa fa-times"></i></button>

                            <a href=" {{ route('questions.edit', [$quiz->id,$question->id]) }}"class="btn btn-sm btn-primary"><i
                                    class="fa fa-pen"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</x-app-layout>