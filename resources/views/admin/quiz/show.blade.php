<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" > <a href="{{route('quizzes.index') }}" class="btn btn-sm btn-secondary"> <i
                class="fa fa-arrow-left"></i> Quizlere Dön</a>
            <h5 class="card-title"></h5>
            <p class="card-text">
            <div class="row " >
                <div class="col-md-4">
                    <ul class="list-group">
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
                    {{ $quiz->description }} <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Puan</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz->result as $result)
                            <tr>
                                <td>{{$result->user->name}}</td>
                                <td>{{$result->point}}</td>
                                <td>{{$result->correct}}</td>
                                <td>{{$result->wrong}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
