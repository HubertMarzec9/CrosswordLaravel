<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CrosswordQuestion;
use App\Models\CrosswordSet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $crosswordSets = [
            [
                'date' => now()->toDateString(),
                'holiday' => 'Światowy Dzień Recyklingu,',
            ],
            [
                'date' => now()->addDay()->toDateString(),
                'holiday' => 'Dzień Stolarza',
            ],
        ];

        $crosswordQuestions = [
            [
                'set_id' => 1,
                'question' => 'Materiał, który może być poddany procesowi recyklingu',
                'answer' => 'Plastik',
            ],
            [
                'set_id' => 1,
                'question' => 'Najpopularniejszy kolor kontenerów do segregacji odpadów',
                'answer' => 'Niebieski',
            ],
            [
                'set_id' => 1,
                'question' => 'Proces przekształcania zużytych materiałów w nowe produkty',
                'answer' => 'Recykling',
            ],
            [
                'set_id' => 1,
                'question' => 'Odpady, które mogą być ponownie wykorzystane lub przetworzone',
                'answer' => 'Surowcewtórne',
            ],
            [
                'set_id' => 1,
                'question' => 'Rodzaj odpadów, które można przetworzyć na kompost',
                'answer' => 'Organiczne',
            ],
            [
                'set_id' => 1,
                'question' => 'Kontener na zużyte papierowe opakowania',
                'answer' => 'Niebieski',
            ],
            [
                'set_id' => 1,
                'question' => 'Zasada, zgodnie z którą odpady powinny być przetwarzane',
                'answer' => 'Zrównoważony',
            ],
            [
                'set_id' => 1,
                'question' => 'Materiał, który jest wykorzystywany do produkcji butelek na napoje',
                'answer' => 'Szkło',
            ],
            [
                'set_id' => 1,
                'question' => 'Organizacja, która promuje recykling i ochronę środowiska',
                'answer' => 'Greenpeace',
            ],
            [
                'set_id' => 1,
                'question' => 'Materiał, który jest wykorzystywany do produkcji gazet i czasopism',
                'answer' => 'Papier',
            ],
            [
                'set_id' => 1,
                'question' => 'Inicjatywa polegająca na ponownym wykorzystaniu produktów',
                'answer' => 'Recycling',
            ],
            [
                'set_id' => 1,
                'question' => 'Miejsce, gdzie można oddać zużyte baterie i akumulatory',
                'answer' => 'Punktsegregacji',
            ],
            [
                'set_id' => 1,
                'question' => 'Rodzaj odpadów, które można przetworzyć na energię',
                'answer' => 'Spalanie',
            ],
            [
                'set_id' => 1,
                'question' => 'Ruch społeczny, który promuje recykling i oszczędzanie energii',
                'answer' => 'Ekoaktywizm',
            ],
            [
                'set_id' => 1,
                'question' => 'Rodzaj opakowania, które jest najczęściej recyklowane',
                'answer' => 'Plastikowe',
            ],
            [
                'set_id' => 2,
                'question' => 'Stolarz używa tego narzędzia do cięcia drewna wzdłuż',
                'answer' => 'Piła',
            ],
            [
                'set_id' => 2,
                'question' => 'Podstawowe narzędzie stolarskie do mierzenia odległości',
                'answer' => 'Miarka',
            ],
            [
                'set_id' => 2,
                'question' => 'Stolarka, która jest połączeniem dwóch kawałków drewna pod kątem prostym',
                'answer' => 'Wspornik',
            ],
            [
                'set_id' => 2,
                'question' => 'Najczęściej stosowany materiał do wykańczania mebli',
                'answer' => 'Lakier',
            ],
            [
                'set_id' => 2,
                'question' => 'Narzędzie do wycinania otworów okrągłych w drewnie',
                'answer' => 'Wiertło',
            ],
            [
                'set_id' => 2,
                'question' => 'Wysuwane elementy mebli, np. szuflady',
                'answer' => 'Wysuwane',
            ],
            [
                'set_id' => 2,
                'question' => 'Połączenie drewna za pomocą gwoździ lub śrub',
                'answer' => 'Złącze',
            ],
            [
                'set_id' => 2,
                'question' => 'Wokół otworu w desce, żeby śruba nie pękła drewna',
                'answer' => 'niewiem',
            ],
            [
                'set_id' => 2,
                'question' => 'Drewniane elementy mebli, zabezpieczone lakierem',
                'answer' => 'Wykończenie',
            ],
            [
                'set_id' => 2,
                'question' => 'Rodzaj drewna charakteryzujący się wysoką twardością',
                'answer' => 'Dąb',
            ],
            [
                'set_id' => 2,
                'question' => 'Proces szlifowania drewna w celu uzyskania gładkiej powierzchni',
                'answer' => 'Szlifowanie',
            ],
            [
                'set_id' => 2,
                'question' => 'Płynna substancja stosowana do wykończenia drewna',
                'answer' => 'Olej',
            ],
            [
                'set_id' => 2,
                'question' => 'Element mebli wykonany z drewna, służący do przechowywania',
                'answer' => 'Szafka',
            ],
            [
                'set_id' => 2,
                'question' => 'Narzędzie stosowane do mocowania elementów drewnianych',
                'answer' => 'Gwoździe',
            ],
            [
                'set_id' => 2,
                'question' => 'Drewniany element zastosowany do usztywnienia konstrukcji',
                'answer' => 'Podpora',
            ],
        ];

        foreach ($crosswordSets as $crosswordSet) {
            CrosswordSet::create($crosswordSet);
        }

        foreach ($crosswordQuestions as $crosswordQuestion) {
            CrosswordQuestion::create($crosswordQuestion);
        }

    }
}
