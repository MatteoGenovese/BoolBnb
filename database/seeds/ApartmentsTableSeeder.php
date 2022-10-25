<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'user_id' => 2,
                'title' => 'Appartamento Milano centro',
                'description' => "Bellissimo appartamento con vista Navigli, spazioso, home cinema, tavolo da biliardo e grill all'aperto",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 7,
                'square_meters' => 50,
                'address' => 'Via Giuditta Sidoli 19, 20129 Milano',
                'latitude' => 45.4695121,
                'longitude' =>  9.2225638,
                'is_available' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'FIERA MILANO RHO FAIR DESIGN SUITE APARTMENT WIFI',
                'description' => 'Splendido monolocale di design. Vicino metropolitana MM1 Molino Dorino e MM1 PERO a una sola fermata da Fiera Milano Rho. Ideato per confort tipo hotel suite, completo di ogni servizio. Connessione WIFI gratuita, TV, cucina, lavastoviglie, lavatrice. Stabile elegante con portineria. Situato nella via principale. Di fronte all\'immobile ci sono un Carrefour Market, lavanderia, ristoranti e pizzerie.  Parcheggio auto comodo. Gorgeous design studio.Near the underground MM1 Molino Dorino and MM1 PERO',
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 4,
                'square_meters' => 80,
                'address' => 'Via Gaetano Strambio, 20133 Milano',
                'latitude' => 45.4735692,
                'longitude' =>  9.2342087,
                'is_available' => true,
            ],
            [
                'user_id' => 4,
                'title' => 'Incantevole cottage',
                'description' => 'Prenditela con calma in questo spazio unico e rilassante. Un piccolo recinto nella campagna di Tornio è ideale per due adulti. WC e doccia in un edificio di manutenzione separato (25 m). Non c\'è cucina nel giardino, ma si può trovare un frigorifero, macchina per il caffè, forno a microonde e posate. Per un costo aggiuntivo (prenota min giorno prima dell\'arrivo): palestra, sauna, jacuzzi e lean-to (legna da ardere, barbecue) e servizi di ristorazione (cibo e bevande). Si noleggiano biciclette e ciaspole.
                    Lo spazio
                    2021 Perfettamente restaurato, piccolo, vecchio fienile. Isolamento termico, pompa di calore ad aria e riscaldatore supplementare. Piccolo, compatto, spazio di alloggio più adatto per una coppia (soppalco con letto matrimoniale). Biancheria, ecc. sono inclusi. Non ci sono tubature dell\'acqua, ma caffè e tè attendono gli ospiti. Un divano, una scrivania e un frigo sotto il loft. Al piano inferiore c\'è un piccolo angolo cottura con macchina per il caffè, bollitore e forno a microonde. Sono disponibili stoviglie di base. Doccia e WC nell\'edificio adiacente (25 m). Palestra, sauna, jacuzzi all\'aperto e lean-to (caminetto), così come i servizi di ristorazione (cibo e bevande) sono disponibili a un costo aggiuntivo. Noleggio di biciclette e racchette da neve.
                    Altre cose da tenere a mente
                    Piccolo alloggio senza acqua. Doccia e servizi igienici nel prossimo edificio. L\'annuncio riguarda principalmente i pernottamenti. Altri servizi disponibili a un costo aggiuntivo nelle vicinanze nello stesso cortile. Il sito fa parte dell\'attività (Alanko Old Cowhouse).',
                'bathroom_no' => 2,
                'bed_no' => 3,
                'room_no' => 6,
                'square_meters' => 90,
                'address' => 'Via Giuseppe Garibaldi, 21100 Varese',
                'latitude' => 45.8223989,
                'longitude' =>  8.8339222,
                'is_available' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Dentro al Parco ! Stanza condivisa 6 letti + bagno',
                'description' => 'Lo spazio
                    La stanza si trova al primo piano dell\'Ostello Costa Alta e si affaccia sui prati e i boschi circostanzi. Il luogo è un\'oasi di pace all\'interno del Parco di Monza, il più grande parco cintato in Europa. L\'Ostello si trova all\'interno di un edificio storico ristrutturato e tutelato dalle Belle Arti.
                    Accesso per gli ospiti
                    Accesso ospiti All\'interno dell\'Ostello c\'è un bar aperto tutto il giorno che fornisce anche le colazioni (incluse nel prezzo). Gli ospiti hanno a disposizione un soggiorno per il tempo libero e una cucina per preparare in autonomia pranzi e cene.
                    Altre cose da tenere a mente
                    E’ possibile noleggiare biciclette, ci sono wi-fi e parcheggio gratuiti.',
                'bathroom_no' => 1,
                'bed_no' => 3,
                'room_no' => 5,
                'square_meters' => 35,
                'address' => 'Via alla Fiumara 15, 16149 Genova',
                'latitude' => 44.4117596,
                'longitude' =>  8.8807093,
                'is_available' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Villa Roma Sud',
                'description' => 'Ampia Villa a Roma Sud,parcheggio con posto auto dedicato. Giardino condiviso e spaziosa piscina a disposizione dei condomini. ',
                'bathroom_no' => 4,
                'bed_no' => 5,
                'room_no' => 10,
                'square_meters' => 300,
                'address' => 'Via Venezia 1, 50121 Firenze',
                'latitude' => 43.7798617,
                'longitude' => 11.2634535,
                'is_available' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Logcabin mad muskox, vicino alla natura selvaggia',
                'description' => 'Tornare a una vita più semplice non è un passo indietro (Yvon Chouinard)Meno è spesso più... Se vuoi scambiare la natura con il cemento e la vita cittadina, crepare il fuoco a legna per il riscaldamento centralizzato, silenzio e tranquillità per il rumore, solitudine per il sovraffollamento, calma per l\'inquietudine, spettacolare aurora boreale per la TV e se riesci ad accettare animali selvatici nel tuo quartiere, hai proprio ragione con noi. Avere un momento memorabile emid la natura lappone. rimanere selvaggio!
                    La nostra accogliente Logcabin è il luogo ideale dove soggiornare tutto l\'anno! Quando la neve si scioglie, è un po\' più difficile raggiungere la baita. La cabina non è collegata alla corrente, ma c\'è la possibilità di ricaricare il tuo cellulare. Non c\'è acqua corrente in cabina, ma noi portiamo le taniche d\'acqua per te. La casetta si trova a circa 800 metri dal nostro alloggio (dove si trova il bagno degli ospiti e anche il vostro veicolo parcheggerà ) e si deve salire a piedi . Un annesso si trova vicino alla cabina.',
                'bathroom_no' => 2,
                'bed_no' => 4,
                'room_no' => 8,
                'square_meters' => 120,
                'address' => 'Via Terenzio Mamiani, 60125 Ancona',
                'latitude' => 43.6094756, 
                'longitude' => 13.5037499,
                'is_available' => true,
            ],
            [
                'user_id' => 5,
                'title' => 'Montenero Porta Romana new Loft ready',
                'description' => 'Questo alloggio si trova in area centrale vicino a tutto per la tua famiglia. . Cucina nuova ben equipaggiata di pentole piatti , lavastoviglie, microonde, caffè nespresso. Bagno con doccia 140x70 comoda.
                    Letto matrimoniale 140x200.
                    Biancheria e saponi forniti. Hairdryer and washing machine.
                    The apartment is floor zero, not on the street inside the typical Milan court “ringhiera”.
                    Coffee or tea is offered as breakfast. Outside many bars restaurants
                    The flat is new just painted',
                'bathroom_no' => 1,
                'bed_no' => 2,
                'room_no' => 5,
                'square_meters' => 60,
                'address' => 'Via Cairoli 3, 95036 Randazzo',
                'latitude' => 37.8766630, 
                'longitude' => 14.9462986,
                'is_available' => true,
            ],
            [
                'user_id' => 5,
                'title' => 'The Iris. Intero cottage troglodyte',
                'description' => 'The Iris. Splendido troglodyte situato in un centro di un villaggio abitato. Attrezzature di alta qualità, molto confortevoli. Esperienza unica in un ambiente eccezionale. Giardino e terrazze. Parcheggio',
                'bathroom_no' => 2,
                'bed_no' => 2,
                'room_no' => 12,
                'square_meters' => 125,
                'address' => 'Via Eleonora D\'Arborèa 5, 09070 Norbello',
                'latitude' => 40.1354788, 
                'longitude' => 8.8331905,
                'is_available' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Villa Cremmonini',
                'description' => 'VILLA Cremonini è una delle RESIDENZE D’EPOCA più prestigiose dell’Umbria. Progettata dal famoso architetto G. Valadier alla fine del ‘700, è una realtà unica fra i tesori dell’architettura umbra, tanto da essere chiamata LA DELIZIA DEI PIANCIANI per la sua bellezza.
                    Circondata da un grande parco monumentale, dalla cima di una collina domina la campagna circostante con una vista a 360° da Assisi a Spoleto, garantendo una privacy unica ed esclusiva a tutti i nostri ospiti.
                    Perfetta per grandi riunioni familiari, matrimoni, eventi, celebrazioni e incontri di lavoro privati.
                    Il Complesso è composto dalla Villa principale più l’Annesso, collegati internamente da un tunnel sotterraneo.
                    La Villa offre ampie zone soggiorno con biliardo, musica, televisione e connessione internet Wi-Fi, cucina attrezzata, ampio cortile, sala da pranzo, servizi e ascensore che la rende accessibile anche ai disabili.
                    Al piano superiore si trova una terrazza da cui godere di una vista mozzafiato.
                    Sulla sommità della collina, con vista spettacolare su Spoleto, si trova una grande piscina soleggiata (14x7 m) circondata dagli ulivi e dotata di spogliatoio e bagno.
                    Sul retro dell’edificio principale si trova la CAPPELLA PRIVATA della Villa, perfetta per cerimonie di ogni genere. Nel lato sud del parco c’è un Giardino Segreto con antichi elementi architettonici come muri, scale, una fontana, un piccolo tempio e una meridiana.
                    È possibile organizzare eventi e sono disponibili servizi extra su richiesta.',
                'bathroom_no' => 8,
                'bed_no' => 10,
                'room_no' => 15,
                'square_meters' => '500',
                'address' => 'Via Giovanni Battista Morgagni 4, 00161 Roma', 
                'latitude' => 41.9092527, 
                'longitude' => 12.5091080,
                'is_available' => true,
            ],
            [
                'user_id' => 5,
                'title' => 'Casa indipendente nel centro storico di Lecce',
                'description' => 'Casa indipendente nel Centro Storico di Lecce, vicinanze Rettorato dell\'Università, a sette minuti di cammino dalla stazione ferroviaria e a due minuti dal Duomo.
                    La casa è appena ristrutturata e dotata di impianti di climatizzazione e di riscaldamento. L\'arredamento è accurato. La struttura è molto graziosa e particolarissima, in pietra leccese, con volte a vista, è formata da un ingresso ampio, un soggiorno con soppalco -
                    dove è posizionato un letto matrimoniale - 
                    un bagno, una nuovissima cucina che si affaccia su un piccolo cortile interno. La struttura è dotata di Wi-fi e TV a schermo piatto. ',
                'bathroom_no' => 1,
                'bed_no' => 2,
                'room_no' => 3,
                'square_meters' => 72,
                'address' => 'Via Vincenzo Morelli 12, 73100 Lecce, Puglia', 
                'latitude' => 40.350560, 
                'longitude' => 18.167820,
                'is_available' => true,
            ],
            [
                'user_id' => 4,
                'title' => 'Ampio appartamento a Napoli',
                'description' => '
                    VIA MANZONI, adiacenze Istituto Sacro Cuore, 
                    proponiamo in vendita ad un quinto piano con ascensore di un signorile stabile con portiere, 
                    una libera e prestigiosa quadratura di 250 mq circa (superficie catastale 277 mq circa), 
                    con incantevole esposizione panoramica sul golfo di Napoli, composta da due ingressi, 
                    salone triplo, ampio soggiorno, quattro camere, una cucina abitabile, tre servizi, balconi. 
                    Termoautonomo. Completa la proprietà una cantina. Un posto auto condominiale assegnato ed un posto auto a rotazione.',
                'bathroom_no' => 2,
                'bed_no' => 3,
                'room_no' => 7,
                'square_meters' => 250,
                'address' => 'Via Alessandro Manzoni 8, 80123 Napoli, Campania', 
                'latitude' => 40.836570, 
                'longitude' => 14.213360,
                'is_available' => true,
            ],
        ];

        foreach ($apartments as $apartment) {
            
            $newApartment = new Apartment();
            $newApartment->user_id = $apartment['user_id'];
            $newApartment->title = $apartment['title'];
            $newApartment->description = $apartment['description'];
            $newApartment->bathroom_no = $apartment['bathroom_no'];
            $newApartment->bed_no = $apartment['bed_no'];
            $newApartment->room_no = $apartment['room_no'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->address = $apartment['address'];
            $newApartment->latitude = $apartment['latitude'];
            $newApartment->longitude = $apartment['longitude'];
            $newApartment->is_available = $apartment['is_available'];
            $newApartment->save();
        };

    }
}
