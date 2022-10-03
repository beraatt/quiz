<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Quiz
                    Oluştur</a>
            </h5>

            <form method="GET" action="">
                <div class="form-row">
                    <div class="col-md-2">
                        <input type="text" value="{{ request()->get('title') }}" name="title"
                            placeholder="Quiz Adı" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" onchange="this.form.submit()" name="status">
                            <option>Durum Seçiniz</option>
                            <option @if (request()->get('status') == 'publish') selected @endif value="publish">Aktif</option>
                            <option @if (request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                            <option @if (request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-2">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary btn-sm"> Filtreyi
                                Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru Sayısı</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }} </td>
                        <td> {{ $quiz->questions_count }} </td>
                        <td class="text-center">
                            @switch($quiz->status)
                                @case('publish')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Aktif</span>
                                @break

                                @case('passive')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Pasif</span>
                                @break

                                @case('draft')
                                    <span
                                        class="bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Taslak</span>
                                @break
                            @endswitch
                        </td>

                        <td>
                            <span title="{{ $quiz->finished_at }}">
                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}
                            </span>
                        </td>

                        <td>
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"> @method('DELETE')
                                @csrf <button type="submit" class="btn btn-sm btn-danger"><i
                                        class="fa fa-times"></i></button>

                                <a href=" {{ route('quizzes.edit', $quiz->id) }}"class="btn btn-sm btn-primary"><i
                                        class="fa fa-pen"></i></a>

                                <a href=" {{ route('questions.index', $quiz->id) }}"class="btn btn-sm btn-warning"><i
                                        class="fa fa-question"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $quizzes->withQueryString()->links() }}
    </div>

</x-app-layout>
