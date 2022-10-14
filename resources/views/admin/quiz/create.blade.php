<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quizzes.store') }}"> @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="4" >{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" @if (old('finished_at')) checked @endif id="isFin">
                    <label>Bitiş tarihi olacak mi?</label>
                </div>
                <div id="finishinput" @if (!old('finished_at')) style="display: none" @endif
                    class="form-group mt-2">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control"
                        value="{{ old('finished_at') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary btn-sm btn-block mt-2 ">Quiz Oluştur</button>
                </div>
            </form>
        </div>

    </div>
    <x-slot name="js">
        <script>
            $('#isFin').change(function() {
                if ($('#isFin').is(':checked')) {
                    $('#finishinput').show();
                } else {
                    $('#finishinput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>
