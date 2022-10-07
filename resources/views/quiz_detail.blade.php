<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Sıralamam
                                <span title=""
                                    class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-200 dark:text-gray-800">#{{ $quiz->my_rank }}
                                </span>
                            </li>
                        @endif
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
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->finished_at->diffForHumans() }}bitiyor
                                </span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                            Soru Sayısı
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->questions_count }}
                            </span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Katılımcı Sayısı
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->details['join_count'] }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Ortalama Puan
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif
                    </ul>
                    @if (count($quiz->topTen))
                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">İlk 10</h5>
                                <ul class="list-group">

                                    @foreach ($quiz->topTen as $result)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="h5">{{ $loop->iteration }}.</strong>
                                            <img class="h-8 w-8  rounded-full"
                                                src="{{ $result->user->profile_photo_url }}">
                                            <span
                                                @if (auth()->user()->id == $result->user_id) class="text-teal-600" @endif>{{ $result->user->name }}</span>
                                            <span
                                                class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-800 float-right ">{{ $result->point }}</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}
                    </p>
                    @if ($quiz->my_result)
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning btn-block btn-sm">Quizi
                            Görüntüle</a>
                        @else ($quiz->finished_at > now())
                            <a href="{{ route('quiz.join', $quiz->slug) }}"
                                class="btn btn-primary btn-block btn-sm">Quize
                                Katıl</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
