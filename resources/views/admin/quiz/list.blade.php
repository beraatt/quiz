<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card " >
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Quiz Oluştur</a>
            </h5>
            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" value="{{ request()->get('title') }}" name="title"
                            placeholder="Quiz Adı" class="form-control" id="search">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" onchange="this.form.submit()" name="status">
                            <option>Durum Seçiniz</option>
                            <option @if (request()->get('status') == 'publish') selected @endif value="publish">Aktif</option>
                            <option @if (request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                            <option @if (request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-3 mt-1">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary btn-sm"> Filtreyi Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <table class="table table-bordered  ">
            <thead>
                <tr class="text-center">
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru Sayısı</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody id="content">
                @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }} </td>
                        <td class="text-center"> {{ $quiz->questions_count }} </td>
                        <td class="text-center">
                            @switch($quiz->status)
                                @case('publish')
                                    @if (!$quiz->finished_at)
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Aktif</span>
                                    @elseif ($quiz->finished_at > now())
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Aktif</span>
                                    @else
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-200 dark:text-gray-900">Tarihi
                                            Dolmuş</span>
                                    @endif
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

                        <td class="text-center">
                            <span title="{{ $quiz->finished_at }}">
                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"> @method('DELETE') @csrf
                                <a class="btn btn-secondary dropdown-toggle"  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" >
                                    <i class="fa-solid fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('quizzes.details', $quiz->id) }}">Quiz Detayları</a></li>
                                    <li><a class="dropdown-item" href="{{ route('quizzes.edit', $quiz->id) }}">Quiz Düzenle</a></li>
                                    <li><a class="dropdown-item" href="{{ route('questions.index', $quiz->id) }}">Sorular</a></li>
                                    <li><a onclick="return confirm('Quiz silinecektir. Silinsin mi?');" class="dropdown-item" type="submit" >Sil</a></li>
                                  </ul>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer">
        {{ $quizzes->withQueryString()->links() }}
    </div>
    </div>
</x-app-layout>
