<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"> <i
                        class="fa fa-plus"></i> Quiz Oluştur</a>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }} </td>
                        <td>{{ $quiz->status }}</td>
                        <td>{{ $quiz->finished_at }}</td>
                        <td>
                            <a href=" {{ route('quizzes.edit', $quiz->id) }}"class="btn btn-sm btn-primary"><i
                                    class="fa fa-pen"></i></a>
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"> @method('DELETE')
                                @csrf <button type="submit" class="btn btn-sm btn-danger"><i
                                        class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $quizzes->links() }}
    </div>

</x-app-layout>
