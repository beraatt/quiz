<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
class MainController extends Controller
{

    public function dashboard()
    { /* Yalnızca statüsü aktif olan quizleri listeliyoruz. */
        $quizzes = Quiz::where('status', 'publish')->where(function($query){
            $query->whereNull('finished_at')->orWhere('finished_at','>',now());
        })->withCount('questions')->paginate(5);

        $results = auth()->user()->results;
        return view('dashboard', compact('quizzes', 'results'));
    }
    /* sluga göre quiz detaylarını görüntüleme */
    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('my_result', 'result', 'topTen.user')->withCount('questions')->first() ?? abort(404, 'Quiz Bulunamadı');
        return view('quiz_detail', compact('quiz'));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions.my_answer', 'my_result')->first() ?? abort(404, 'Quiz Bulunamadı');

        if ($quiz->my_result) {
            return view('quiz_result', compact('quiz'));
        }
        return view('quiz', compact('quiz'));
    }
    /* kullanıcının sınavı sonucunda sonuçlarını hesapladığımız bölüm */
    public function result(Request $request, $slug)
    {
        $quiz = Quiz::withCount('questions')->whereSlug($slug)->first() ?? abort(404, 'Qiuz Bulunamadı');
        $correct = 0;
        $question_count = 0;

        if ($quiz->my_result) {
            abort(404, "Bu Quiz'e daha önce girdiniz");
        }

        foreach ($quiz->questions as $question) {
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)
            ]);
            $question_count += 1;
            if ($question->correct_answer === $request->post($question->id)) {
                $correct = $correct + 1;
            }
        }
        /* puan hesaplayan işlem */
        $point = floor((100 / count($quiz->questions)) * $correct);
        /* yanlış soru sayısını bulan işlem */
        $wrong = $question_count - $correct;


        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong,
        ]);


        return redirect()->route('quiz_detail', $quiz->slug)->withSuccess("Başarıyla Quiz'i bitirdin. Puanın: " . $point);
    }
}
