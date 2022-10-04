<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Puan
                                <span title=""
                                    class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-800">{{ $quiz->my_result->point }}
                                </span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Doğru Sayısı
                                <span title=""
                                    class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800">{{ $quiz->my_result->correct }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Yanlış Sayısı
                                <span title=""
                                    class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-800">{{ $quiz->my_result->wrong }}
                                </span>
                            </li>
                        @endif
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Son Katılım Tarihi
                                <span title="{{ $quiz->finished_at }}"
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->finished_at->diffForHumans() }}
                                    bitiyor</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                            Soru Sayısı
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Katılımcı Sayısı
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Ortalama Puan
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif

                    </ul>
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}</p>
                    @if ($quiz->my_result)
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning btn-block btn-sm">Quizi Görüntüle</a>
                    @else
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block btn-sm">Quize
                        Katıl</a>
                    @endif

                </div>
            </div>


        </div>
    </div>
</x-app-layout>
