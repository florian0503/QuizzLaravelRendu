<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'reponses.*.texte' => 'required|string',
            'reponses.*.est_correcte' => 'boolean',
        ]);

        $question = Question::create(['titre' => $request->titre]);

        foreach ($request->reponses as $reponse) {
            Reponse::create([
                'texte' => $reponse['texte'],
                'est_correcte' => $reponse['est_correcte'] ?? false,
                'question_id' => $question->id,
            ]);
        }

        return redirect()->route('home')->with('success', 'Question créée avec succès.');
    }

    public function start()
    {
        return view('quiz.start');
    }

    public function showQuestion($index)
    {
        $questions = Question::with('reponses')->get();

        if ($index >= count($questions)) {
            return redirect()->route('quiz.finish');
        }

        $question = $questions[$index];

        return view('quiz.question', [
            'question' => $question,
            'index' => $index,
            'totalQuestions' => count($questions),
        ]);
    }

    public function submitAnswer(Request $request)
    {
        $index = $request->input('index');
        $selectedAnswers = $request->input('reponses', []);

        $userAnswers = $request->session()->get('user_answers', []);
        $userAnswers[$index] = $selectedAnswers;
        $request->session()->put('user_answers', $userAnswers);

        $nextIndex = $index + 1;
        $totalQuestions = Question::count();

        if ($nextIndex < $totalQuestions) {
            return redirect()->route('quiz.question', ['index' => $nextIndex]);
        } else {
            return redirect()->route('quiz.finish');
        }
    }

    public function answer(Request $request)
    {
        $questionIndex = $request->input('index');
        $answers = $request->input('reponses', []);

        $userAnswers = $request->session()->get('user_answers', []);
        $userAnswers[$questionIndex] = $answers;
        $request->session()->put('user_answers', $userAnswers);

        $nextIndex = $questionIndex + 1;
        $totalQuestions = Question::count();

        if ($nextIndex < $totalQuestions) {
            return redirect()->route('quiz.question', ['index' => $nextIndex]);
        } else {
            return redirect()->route('quiz.finish');
        }
    }

    public function finish(Request $request)
    {
        $userAnswers = $request->session()->get('user_answers', []);

        $questions = Question::with('reponses')->get();

        $results = [];
        foreach ($questions as $index => $question) {
            $correctAnswers = $question->reponses->where('est_correcte', true)->pluck('id')->toArray();
            $userCorrect = array_intersect($userAnswers[$index] ?? [], $correctAnswers);

            $results[] = [
                'question' => $question->titre,
                'is_correct' => count($userCorrect) === count($correctAnswers) && count($userCorrect) > 0,
            ];
        }

        return view('quiz.finish', ['results' => $results]);
    }

    public function creerQuestion()
    {
        return view('creerQuestion');
    }
}
