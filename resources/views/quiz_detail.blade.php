<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$quiz->title}}</h5>
            <p class="card-text">
                <div class="row">
                    <div class="col-md-4" >
                        <ul class="list-group">
                            @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                              Son Katılım Tarihi
                              <span title="{{ $quiz->finished_at}}" class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{$quiz->finished_at->diffForHumans()}} bitiyor</span>
                              @endif
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Soru Sayısı
                              <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{$quiz->questions_count}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Katılımcı Sayısı
                              <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                Ortalama Puan
                              <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">1</span>
                            </li>
                          </ul>
                    </div>
                    <div class="col-md-8">
                        {{$quiz->description}}</p>
                        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Quize Katıl</a>
                    </div>
                </div>


        </div>
    </div>
</x-app-layout>
