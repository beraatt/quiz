<x-app-layout>
        <x-slot name="header">Quiz Oluştur</x-slot>
                <div class="card">
                        <div class="card-body">
                                <form method="POST" action="{{route('quizzes.store')}}"> @csrf
                                                <div class="form-group">
                                                        <label>Quiz Başlığı</label>
                                                        <input type="text" name="title" class="form-control" required>
                                                </div>
                                                <div class="form-group mt-2">
                                                        <label>Quiz Açıklama</label>
                                                        <textarea name="description" class="form-control" rows="4"></textarea>
                                                </div>
                                                <div class="form-group mt-2" >
                                                        <input id="isfinish" type="checkbox">
                                                        <label>Bitiş tarihi olacak mı</label>
                                                </div>
                                                <div style="display: none" class="form-group mt-2" >
                                                        <label>Bitiş Tarihi</label>
                                                        <input type="datetime-local" name="finished_at" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Oluştur</button>
                                                </div>

                
                                </form>
                        </div>
                </div>  
                <x-slot name="js">
                        <script>
                                $(#isfinish).change(function(){
                                        alert('çalıştı')
                                })
                        </script>
                </x-slot>            
</x-app-layout>
