<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Reponse;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Données des questions et réponses
        $questions = [
            [
                'titre' => 'Quelle est la capitale de la France ?',
                'reponses' => [
                    ['texte' => 'Paris', 'est_correcte' => true],
                    ['texte' => 'Londres', 'est_correcte' => false],
                    ['texte' => 'Berlin', 'est_correcte' => false],
                    ['texte' => 'Madrid', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Quel est le plus grand océan du monde ?',
                'reponses' => [
                    ['texte' => 'Océan Atlantique', 'est_correcte' => false],
                    ['texte' => 'Océan Pacifique', 'est_correcte' => true],
                    ['texte' => 'Océan Indien', 'est_correcte' => false],
                    ['texte' => 'Océan Arctique', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Quelle planète est connue comme la planète rouge ?',
                'reponses' => [
                    ['texte' => 'Mars', 'est_correcte' => true],
                    ['texte' => 'Vénus', 'est_correcte' => false],
                    ['texte' => 'Jupiter', 'est_correcte' => false],
                    ['texte' => 'Saturne', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Combien y a-t-il de continents sur Terre ?',
                'reponses' => [
                    ['texte' => '5', 'est_correcte' => false],
                    ['texte' => '6', 'est_correcte' => false],
                    ['texte' => '7', 'est_correcte' => true],
                    ['texte' => '8', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Qui a écrit "Les Misérables" ?',
                'reponses' => [
                    ['texte' => 'Victor Hugo', 'est_correcte' => true],
                    ['texte' => 'Charles Baudelaire', 'est_correcte' => false],
                    ['texte' => 'Honoré de Balzac', 'est_correcte' => false],
                    ['texte' => 'Gustave Flaubert', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Quelle est la plus petite unité vivante ?',
                'reponses' => [
                    ['texte' => 'La cellule', 'est_correcte' => true],
                    ['texte' => 'L organe', 'est_correcte' => false],
                    ['texte' => 'Le tissu', 'est_correcte' => false],
                    ['texte' => 'L atome', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Quel élément chimique a pour symbole O ?',
                'reponses' => [
                    ['texte' => 'Oxygène', 'est_correcte' => true],
                    ['texte' => 'Or', 'est_correcte' => false],
                    ['texte' => 'Osmium', 'est_correcte' => false],
                    ['texte' => 'Oganesson', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Quelle est la langue la plus parlée dans le monde ?',
                'reponses' => [
                    ['texte' => 'Chinois', 'est_correcte' => true],
                    ['texte' => 'Anglais', 'est_correcte' => false],
                    ['texte' => 'Espagnol', 'est_correcte' => false],
                    ['texte' => 'Hindi', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Quelle est la valeur de pi (approximativement) ?',
                'reponses' => [
                    ['texte' => '3.14', 'est_correcte' => true],
                    ['texte' => '3.15', 'est_correcte' => false],
                    ['texte' => '3.13', 'est_correcte' => false],
                    ['texte' => '3.16', 'est_correcte' => false],
                ],
            ],
            [
                'titre' => 'Qui a peint La Joconde ?',
                'reponses' => [
                    ['texte' => 'Léonard de Vinci', 'est_correcte' => true],
                    ['texte' => 'Michel-Ange', 'est_correcte' => false],
                    ['texte' => 'Raphaël', 'est_correcte' => false],
                    ['texte' => 'Donatello', 'est_correcte' => false],
                ],
            ],
        ];

        foreach ($questions as $q) {
            $question = Question::create(['titre' => $q['titre']]);
            foreach ($q['reponses'] as $reponse) {
                Reponse::create([
                    'texte' => $reponse['texte'],
                    'est_correcte' => $reponse['est_correcte'],
                    'question_id' => $question->id,
                ]);
            }
        }
    }
}
