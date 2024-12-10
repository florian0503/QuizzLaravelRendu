<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class CreerQuestionController extends Controller
{
    /**
     * Affiche le formulaire de création de question.
     */
    public function creerQuestion(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('creerQuestion');
    }

    /**
     * Enregistre une nouvelle question et ses réponses.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
//       dd($request->all());
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'reponses' => 'required|array|min:4',
            'reponses.*.texte' => 'required|string|max:255',
            'reponses.*.est_correcte' => 'sometimes|boolean',
        ]);

        try {
            $question = Question::create([
                'titre' => $validated['titre'],
            ]);

            foreach ($validated['reponses'] as $reponseData) {
                $question->reponses()->create([
                    'texte' => $reponseData['texte'],
                    'est_correcte' => $reponseData['est_correcte'] ?? false,
                ]);
            }

            return redirect()->route('creerQuestion')->with('success', 'Question enregistrée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('creerQuestion')->with('error', 'Erreur lors de l\'enregistrement. Veuillez réessayer.');
        }
    }
}
