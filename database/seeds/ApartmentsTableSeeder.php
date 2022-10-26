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
                'bed_no' => 6,
                'room_no' => 5,
                'square_meters' => 35,
                'address' => 'Via alla Fiumara 15, 16149 Genova',
                'latitude' => 44.4117596,
                'longitude' =>  8.8807093,
                'is_available' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Villa in Centro a Firenze',
                'description' => 'Ampia Villa a Firenze Centro, parcheggio con posto auto dedicato. Giardino condiviso e spaziosa piscina.',
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
                    Biancheria e saponi forniti. Hairdryer and washing machine.',
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
                'title' => 'Villa Cremonini',
                'description' => 'VILLA Cremonini è una delle RESIDENZE D’EPOCA più prestigiose del nostro Paese. Progettata dal famoso architetto G. Valadier alla fine del ‘700, è una realtà unica fra i tesori dell’architettura umbra, tanto da essere chiamata LA DELIZIA DEI PIANCIANI per la sua bellezza.
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
                'user_id' => 6,
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
            [
                'user_id' => 2,
                'title' => 'Appartamento in periferia milanese',
                'description' => "Intero appartamento (bilocale) di 40 mq, confortevole, nel mezzo del vivace quartiere Isola nel centro di Milano. 
                    Pub, ristoranti e trasporti pubblici sono a pochi passi. L'appartamento si trova a 5 minuti a piedi dalla Stazione Garibaldi e a 30 minuti 
                    a piedi dal Duomo di Milano. L'appartamento è molto lumisono con doppia esposizione ed è composto da cucina, bagno e una confortevole camera da letto / soggiorno. 
                    N.B.: al momento sono presenti lavori di ristrutturazione della facciata esterna.",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 3,
                'square_meters' => 40,
                'address' => 'Isola del Bosco - Delle Corti, 20099 Sesto San Giovanni',
                'latitude' => 45.5226336,
                'longitude' =>  9.2378273,
                'is_available' => true,
            ],
            [
                'user_id' => 12,
                'title' => 'Villetta in campagna',
                'description' => "La villa è accogliente, confortevolmente arredata e completa di tutto: soggiorno, 
                    angolo cucina, bagno con doccia, balcone, parcheggio riservato e box privato per chi desidera tenere l'auto al coperto. E' situato in zona semicentrale, 
                    servitissima, la stazione ferroviaria e il Centro Concorsi della Marina sono raggiungibili a piedi, capolinea autobus per tutte le direzioni a pochi metri. 
                    Passaggio auto (con contributo) per chi preferisce arrivare in aereo. Tutti sono benvenuti!",
                'bathroom_no' => 2,
                'bed_no' => 5,
                'room_no' => 9,
                'square_meters' => 40,
                'address' => 'Via Achille Barilatti, 60127 Ancona',
                'latitude' => 43.5926770,
                'longitude' =>   13.5079302,
                'is_available' => true,
            ],
            [
                'user_id' => 16,
                'title' => 'Quadrilocale piazza Vittorio, Torino',
                'description' => "Appartamento assolutamente unico in Torino, una fusione fra storia e tecnologia, lusso e riservatezza. In una via riservata della città a 
                    ridosso della Mole Antonelliana affittiamo solo a referenziatissimi un quadrilocale con terrazzo, moderno ed elegante con particolari di lusso. Posizionato in via
                    Riberi in una palazzina di nuova costruzione, l'unità immobiliare ha una doppia esposizione con vista romantica e suggestiva creata dall' illuminazione della Mole Antonelliana
                    con ampie aperture che diventano quadri naturali e variano con le luci e le stagioni: una casa che ispira artisti, rilassa uomini e donne d'affari. vivere in una cartolina
                    mantenendo la riservatezza e la privacy. Al suo interno l'immobile è composto da un ingresso living su soggiorno con accesso ad un terrazzo, cucina abitabile a vista, due camere 
                    da letto e doppi servizi, uno con vasca, l'altro con doccia. Al piano interrato una cantina L'appartamento è totalmente arredato e corredato di ogni confort pensando al benessere in ogni 
                    sua sfumatura. L'unità immobiliare è centralissima comoda alla vita cittadina, a ristoranti e teatri pur essendo in una via riservata dalla quale tramite una scalinata si accede 
                    alla movida, senza subirne le conseguenze. Libero dal 1 novembre 2022. A parte è possibile affittare sembre nello stabile un ampio box auto doppio a € 150,00 mensili. Per informazioni 
                    e visite rivolgersi Claudia Gallipoli tel. 3932090822 ore ufficio. Scarica volantino",
                'bathroom_no' => 2,
                'bed_no' => 2,
                'room_no' => 4,
                'square_meters' => 100,
                'address' => 'piazza Vittorio, Torino',
                'latitude' => 45.0651854,
                'longitude' =>  7.6951646,
                'is_available' => true,
            ],
            [
                'user_id' => 11,
                'title' => 'Bilocale via Giovanni Botero 23, Quadrilatero Romano, Torino',
                'description' => "Adiacente piazza Solferino e precisamente in via Botero 23, in stabile
                    signorile con ascensore e videosorveglianza, affittasi bilocale ristrutturato e completamente arredato e climatizzato.
                    L'immobile è dotato di ogni comfort ed è composto da: ingresso, soggiorno con angolo cottura, camera matrimoniale, servizi e cantina.
                    La rendita catastale dell'appartamento è di € 612.0.
                    La posizione è centralissima, a poca distanza dalla stazione Porta Susa e dalle piazze Castello e San Carlo.
                    Il contratto di locazione 4 anni con cedolare secca
                    Spese condominiali mensili € 100,00
                    spese di riscaldamento mensili€ 90,00
                    Libero da fine gennaio 2023.
                    Solo referenziati!
                    Siv Real Estate srl - Via Cernaia 40, Torino.",
                'bathroom_no' => 1,
                'bed_no' => 3 ,
                'room_no' => 2,
                'square_meters' => 60,
                'address' => 'via Giovanni Botero 23, Quadrilatero Romano, Torino',
                'latitude' => 45.0715957,
                'longitude' =>  7.6784069,
                'is_available' => true,
            ],
            [
                'user_id' => 7,
                'title' => 'Appartamento in pieno centro storico',
                'description' => "Delizioso appartamento in pieno centro storico.
                    L'appartamento si trova in posizione strategica, vicino ai principali luoghi di interesse della città, è ideale per soggiorni turistici e professionali.
                    Vicinissima al porto, al Museo, al Teatro delle Muse, alla Pinacoteca, alla biblioteca comunale e all'Università di Economia.
                    Le fermate principali dell'autobus sono a pochi metri, la stazione ferroviaria è facilmente raggiungibile.
                    N.B. Il parcheggio in strada è a pagamento dalle 8 alle 20.",
                'bathroom_no' => 1,
                'bed_no' => 4,
                'room_no' => 4,
                'square_meters' => 70,
                'address' => 'Via Luigi Cadorna, 4, 60123 Ancona',
                'latitude' => 43.6164939,
                'longitude' => 13.5222869,
                'is_available' => true,
            ],
            [
                'user_id' => 15,
                'title' => 'Quadrilocale via Giuseppe Piazzi 7, Crocetta, Torino',
                'description' => "CROCETTA, Via Piazzi, pressi Corso De Gasperi , a pochi passi dal rinomato mercato della CROCETTA,
                    in elegante contesto e in zona signorile ben servita, proponiamo al piano rialzato un quadrilocale così composto: 
                    ingresso, cucina abitabile con balconcino di servizio lato cortile ,le camere sono 3 delle quali 2 matrimoniali e una 
                    cameretta più piccola ideale per studio/cameretta bimbo, doppi servizi di cui uno completo di box doccia e sanitari e un piccolo 
                    bagno di servizio con wc e lavandino. L'appartamento pur essendo al piano rialzato risulta essere abbastanza luminoso grazie alla doppia esposizione est/ovest.
                    Nell'appartamento è stato completamente ristrutturato e rinnovato , inclusi gli impianti idraulico-elettrico rifatti a nuovo, 
                    pavimenti in gres porcellanato effetto legno, nuove porte interne, la consegna è prevista il 1 novembre 2022. Ottima resa energetica dell'appartamento 
                    garantita da infissi nuovi in pvc/doppio vetro e tutti con sistema vasistas, le tapparelle sono state sostituite e motorizzate. . Riscaldamento centralizzato 
                    a radiatori con le termovalvole.
                    L'appartamento si affitta con contratto 4+4 uso abitazione, a partire dal 1 novembre 2022 vuoto NON ARREDATO.
                    Per informazioni chiamare il 3202697718 o scrivici su whatsapp
                    Iulacase Servizi Immobiliari
                    ",
                'bathroom_no' => 1,
                'bed_no' => 2,
                'room_no' => 4,
                'square_meters' => 90,
                'address' => 'via Giuseppe Piazzi 7, Crocetta, Torino',
                'latitude' => 45.0573862,
                'longitude' =>  7.6617347,
                'is_available' => true,
            ],
            [
                'user_id' => 13,
                'title' => 'Quadrilocale via Giovanni Battista Viotti 1, Via Roma, Torino',
                'description' => "via Giovanni Battista Viotti 1, Via Roma, Torino",
                'bathroom_no' => 2,
                'bed_no' => 2,
                'room_no' => 4,
                'square_meters' => 124,
                'address' => 'via Giovanni Battista Viotti 1, Via Roma, Torino',
                'latitude' => 45.0713665,
                'longitude' =>  7.6837710,
                'is_available' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Appartamento Milano centro',
                'description' => "Monolocale in centro a Milano",
                'bathroom_no' => 1,
                'bed_no' => 2,
                'room_no' => 2,
                'square_meters' => 50,
                'address' => 'Via Milano 39-41, 20010 Bareggio',
                'latitude' => 45.4857602,
                'longitude' => 9.0081741,
                'is_available' => true,
            ],
            [
                'user_id' => 4,
                'title' => 'Villa a Milano',
                'description' => "Graziosa Villa a Milano in Via Sempione ampia e con grande terrazzo, piscina piano terra e giardino",
                'bathroom_no' => 3,
                'bed_no' => 6,
                'room_no' => 7,
                'square_meters' => 250,
                'address' => 'Via Sempione 190, 20016 Pero',
                'latitude' => 45.5160808,
                'longitude' => 9.0785364,
                'is_available' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Appartamento attico a Milano',
                'description' => "Bellissimo appartamento attico a Milano",
                'bathroom_no' => 2,
                'bed_no' => 2,
                'room_no' => 3,
                'square_meters' => 100,
                'address' => 'Via Milano 39-41, 20010 Bareggio',
                'latitude' => 45.4857602,
                'longitude' => 9.0081741 ,
                'is_available' => true,
            ],
            [
                'user_id' => 7,
                'title' => 'Milano in perferia di Milano',
                'description' => "Appartamento in affitto nella periferia di Milano vicinissimo alla zona industriale",
                'bathroom_no' => 3,
                'bed_no' => 4,
                'room_no' => 5,
                'square_meters' => 200,
                'address' => 'Viale Piemonte 20013 Magenta',
                'latitude' => 45.4684365 ,
                'longitude' => 8.8810234 ,
                'is_available' => true,
            ],
            [
                'user_id' => 6,
                'title' => 'Appartamento vista duomo a Milano',
                'description' => "Appartamento vicino al centro, vista Duomo con la madonnina",
                'bathroom_no' => 2,
                'bed_no' => 6,
                'room_no' => 3,
                'square_meters' => 80,
                'address' => 'Via Magenta 34, 20087 Robecco sul Naviglio',
                'latitude' => 45.4474736 ,
                'longitude' => 8.8845996 ,
                'is_available' => true,
            ],
            [
                'user_id' => 9,
                'title' => 'Trilocale via Giambattista Viotti 1, Via Roma, Torino',
                'description' => "SANTANDREA Luxury Houses è lieta di presentare in esclusiva “La Torre”, 
                la proposta torinese di Collezione Prestige, la nuova linea di soluzioni di prestigio, che coniuga 
                la storia con l’ eleganza, l’esclusività con il comfort e la funzionalità con la tecnologia.
                    Torre Littoria, uno dei simboli più rappresentativi della città, situata in Piazza Castello, 
                    è stata completamente riconvertita offrendo soluzioni immobiliari su misura, con accesso esclusivo 
                    al piano e progettate per enfatizzare la vista a 360 gradi sulla città. Layout efficienti e funzionali 
                    si completano con un progetto di interior design di raffinatezza e modernità ed arredi firmati dai migliori brand italiani.
                    Connettività` garantita in tutti gli spazi privati e comuni, palestra dedicata, servizi esclusivi 
                    su richiesta - dalla lavanderia alla pulizia delle singole unità - attenzione al cliente, cura del dettaglio; 
                    questi sono solo alcuni dei punti di forza di Collezione Prestige, in grado di garantire un’accoglienza tipica dell’hotellerie di alta gamma anche alla residenza.",
                'bathroom_no' => 3,
                'bed_no' => 2,
                'room_no' => 3,
                'square_meters' => 123,
                'address' => 'via Giambattista Viotti 1, Via Roma, Torino',
                'latitude' => 45.0714877,
                'longitude' =>  7.6838139,
                'is_available' => true,
            ],
            [
                'user_id' => 12,
                'title' => 'Appartamento a Firenze',
                'description' => "Delizioso appartamento in pieno centro storico.
                    L'appartamento si trova in posizione strategica, vicino ai principali luoghi di interesse della città, è ideale per soggiorni turistici e professionali.
                    Vicinissima al porto, al Museo, al Teatro delle Muse, alla Pinacoteca, alla biblioteca comunale e all'Università di Economia.
                    Le fermate principali dell'autobus sono a pochi metri, la stazione ferroviaria è facilmente raggiungibile.
                    N.B. Il parcheggio in strada è a pagamento dalle 8 alle 20.",
                'bathroom_no' => 1,
                'bed_no' => 4,
                'room_no' => 4,
                'square_meters' => 70,
                'address' => 'Via dei Cardatori 1, 50124 Firenze',
                'latitude' => 43.7695145,
                'longitude' => 11.2423512,
                'is_available' => true,
            ],
            [
                'user_id' => 14,
                'title' => 'Appartamento Milano in Via Vittuone',
                'description' => "Un delicato richiamo vintage arricchisce una soluzione moderna e completa di tutti i comfort, esprimendo con stile l’essenza del quartiere. 
                    Il progetto ha mantenuto la raffinatezza degli esterni per sorprendere con i design contemporanei e ricercati degli ambienti interni. Abbandonati alla sensazione 
                    di vero benessere, nella comodità del tuo salotto a cielo aperto dove regnano il silenzio, la pace e la tranquillità.
                    Scopri un luogo in cui il fascino retrò del quartiere incontra la modernità di un progetto Living unico nel suo genere.",
                'bathroom_no' => 1,
                'bed_no' => 3,
                'room_no' => 5,
                'square_meters' => 250,
                'address' => 'Via Privata Vittuone 6, 20152 Milano',
                'latitude' => 45.4596653,
                'longitude' => 9.0877512,
                'is_available' => true,
            ],
            [
                'user_id' => 5,
                'title' => 'Appartamento a Firenze in viale Ludovico Ariosto',
                'description' => "Per i nostri ospiti mettiamo a disposizione 1 camera con letto alla francese e 
                    1 camera matrimoniale. Il bagno è completamente ristrutturato, salotto arredato di tavolo, sedie e televisiore. 
                    Uso cucina completamente arredata, una macchina del caffè a capsule e tutto l'occorente per la prima colazione.
                    Uso parcheggio privato.",
                'bathroom_no' => 1,
                'bed_no' => 2,
                'room_no' => 4,
                'square_meters' => 80,
                'address' => 'Viale Ludovico Ariosto 4, 50124 Firenze',
                'latitude' => 43.7701421, 
                'longitude' => 11.2395832,
                'is_available' => true,
            ],
            [
                'user_id' => 8,
                'title' => 'Minicasa a Firenze',
                'description' => "Nei pressi di Porta Romana, a pochi minuti a piedi dal centro storico, 
                    intimo e confortevole open space dotato di tutti i comfort: ingresso indipendente, silenzioso, luminoso, 
                    con angolo cottura, bagno con doccia e TV a schermo piatto. Negozi, ristoranti caratteristici e nota pasticceria nelle immediate vicinanze..",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 3,
                'square_meters' => 45,
                'address' => 'Via Giacomo Zanella, 50124 Firenze',
                'latitude' => 43.7702842,
                'longitude' => 11.2372913,
                'is_available' => true,
            ],
            [
                'user_id' => 6,
                'title' => 'Monolocale Zaffiro a Firenze',
                'description' => "Zaffiro è un elegante monolocale ristrutturato alla fine del 2021,  in pieno centro a Fucecchio, 
                    composto da un letto matrimoniale , piccolo angolo cucina bagno con ampia  doccia. 
                    Parcheggio gratuito nella strada , gran parte dei servizi a pochi passi",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 1,
                'square_meters' => 45,
                'address' => 'Viale dei Bambini 21, 50142 Firenze',
                'latitude' => 43.7767105,
                'longitude' => 11.2204446,
                'is_available' => true,
            ],
            [
                'user_id' => 13,
                'title' => 'Appartamento Milano in Via Giuseppe Drezza',
                'description' => 'Nell’appartamento la luminosità è una caratteristica preponderante, grazie alle grandi finestre a 
                    tutta altezza e alle viste aperte sul verde circostante, che insieme al calore del parquet in tutti i locali restituiscono una sensazione 
                    di freschezza e accoglienza. La proprietà si compone di ulteriori due camere da letto, di cui una con letto alla francese e una doppia, oltre a due bagni 
                    e un terrazzino; completano la proprietà tre cantine ed un box, con richiesta separata.',
                'bathroom_no' => 3,
                'bed_no' => 4,
                'room_no' => 7,
                'square_meters' => 200,
                'address' => 'Via Giuseppe Dezza 48, 20144 Milano',
                'latitude' => 45.4593659 ,
                'longitude' => 9.1627263,
                'is_available' => true,
            ],
            [
                'user_id' => 10,
                'title' => 'Appartamento a Prato centro',
                'description' => "Grazioso bilocale completamente ristrutturato, perfetto per una vacanza a basso costo o per soggiorni di lavoro. 
                    A due passi dalla stazione di Sesto Fiorentino, è il posto perfetto per raggiungere il centro di Firenze in pochi minuti, evitando lo stress ed il 
                    traffico della grande città. 
                    Anche il centro di Sesto Fiorentino è raggiungibile a piedi, e tutte le comodità sono a portata di mano",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 2,
                'square_meters' => 45,
                'address' => 'Via Quirico Baldinucci 65, 59100 Prato',
                'latitude' => 43.8746991,
                'longitude' => 11.1010642,
                'is_available' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Appartamento Milano in Via Giuseppe Drezza',
                'description' => 'La cucina abitabile doppia è dotata di un balcone e di un attiguo bagno lavanderia.
                    Le camere da letto sono matrimoniali, entrambe con cabina armadio dedicata, il bagno padronale è dotato di vasca idromassaggio.
                    Un guardaroba all’ingresso ed un ripostiglio nel disimpegno completano l’ottima organizzazione degli spazi della casa, inoltre vi è la possibilità di ricavare facilmente una terza camera da letto.
                    La pavimentazione è in parquet, cotto in cucina, gres porcellanato nel bagno padronale, ceramica in quello di servizio; gli infissi sono in legno doppio vetro, il riscaldamento è centralizzato con termovalvole, climatizzato, impianto di allarme volumetrico e perimetrale.
                    Completano la proprietà una cantina ed un solaio di pertinenza.',
                'bathroom_no' => 2,
                'bed_no' => 6,
                'room_no' => 8,
                'square_meters' => 150,
                'address' => 'Piazzale Costantino Nigra 2, 20158 Milano',
                'latitude' => 45.4925645,
                'longitude' => 9.1714721,
                'is_available' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Appartamento Milano Viale Gorizia',
                'description' => 'Una delle principali caratteristiche è la tranquillità e la silenziosità degli ambienti grazie all’esposizione su due piccole vie residenziali.
                    Il “Quartiere Centrale” sta vivendo una forte rivalutazione, grazie alla trasformazione dei magazzini prospicenti la stazione, già iniziata con l’apertura del “Mercato Centrale”, che diventeranno spazi per mostre ed eventi legati al design.
                    La zona offre molteplici possibilità in termini di servizi e punti di interesse così come occasioni di svago ed intrattenimento.
                    Il quartiere dispone inoltre di rinomati complessi scolastici che accolgano studenti delle scuole primarie e secondarie di ogni ordine e grado.',
                'bathroom_no' => 5,
                'bed_no' => 5,
                'room_no' => 5,
                'square_meters' => 150,
                'address' => 'Viale Gorizia 2, 20144 Milano',
                'latitude' => 45.4536513,
                'longitude' => 9.1724425,
                'is_available' => true,
            ],
            [
                'user_id' => 14,
                'title' => 'La Casa Di Gilda Napoli',
                'description' => "L'alloggio è situato in pieno centro storico di Napoli, nel quartiere mercatale della Pignasecca. 
                    Grazie alla sua posizione strategica è possibile raggiungere le altre zone della città avendo a pochi metri di distanza le quattro 
                    stazioni principali ferroviarie (cumana e circumflegrea a 200m, Linea 1 a 600m, Linea 2 a 350m e funicolare a 200m per raggiungere la zona collinare del Vomero). 
                    La Casa Di Gilda è un piccolo appartamentino appena ristrutturato, dotato di tutti i servizi necessari.",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 3,
                'square_meters' => 60,
                'address' => 'Vico Paradiso, 80135 Napoli',
                'latitude' => 40.8466226,
                'longitude' =>  14.2450021,
                'is_available' => true,
            ],
            [
                'user_id' => 11,
                'title' => 'Un grazioso e luminoso studio',
                'description' => "Un delizioso apart-studio di 30 m² luminoso e silenzioso, situato al primo piano e unico piano della Villa d’Arte, 
                    questo grazioso miniappartamento è arredato con gusto e originalità. La fermata dei bus dista a 40 metri.",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 3,
                'square_meters' => 30,
                'address' => 'Discesa Gaiola 69, 80123 Napoli',
                'latitude' => 44.3355400,
                'longitude' =>  7.4089600,
                'is_available' => true,
            ],
            [
                'user_id' => 4,
                'title' => 'Appartamento in Via San Vncenzo',
                'description' => 'L’appartamento è così composto: ingresso su zona giorno con cucina a vista, bagno con box doccia, 
                    camera da letto soppalcata e cabina armadio. L’immobile presenta le seguenti finiture: pavimentazione in ceramica ad eccezione 
                    della camera da letto in legno, infissi in alluminio doppio vetro, riscaldamento autonomo con fan coil. La soluzione è caratterizzata 
                    da travi a vista in legno originali. L’appartamento risulta perfetto per chi vuole usufruire di tutte le comodità del Centro Città.',
                'bathroom_no' => 3,
                'bed_no' => 8,
                'room_no' => 8,
                'square_meters' => 300,
                'address' => 'Via San Vincenzo 1, 20123 Milano',
                'latitude' => 45.4588723,
                'longitude' => 9.1775257,
                'is_available' => true,
            ],
            [
                'user_id' => 7,
                'title' => 'Intero Appartamento a Due Passi Dal Centro',
                'description' => "Appartamento indipendente sito in una delle zone più servite della città a pochi 
                    metri dal centro di Lecce raggiungibile a piedi, ideale per chi cerca una soluzione a due passi da Piazza Mazzini,
                    Piazza S.Oronzo e le bellezze del centro cittadino, senza rinunciare però alla tranquillità.",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 2,
                'square_meters' => 50,
                'address' => 'Via Giuseppe Zanardelli, 73100 Lecce',
                'latitude' => 40.3540152,
                'longitude' =>  18.1820211,
                'is_available' => true,
            ],
            [
                'user_id' => 4,
                'title' => 'Orange central studio',
                'description' => "La posizione è fantastica. A piedi è possibile visitare tutti i maggiori punti d'interesse della città! 
                    Si trova in una via privata vicino Campo De Fiori, quindi molto tranquilla e silenziosa.",
                'bathroom_no' => 1,
                'bed_no' => 1,
                'room_no' => 2,
                'square_meters' => 30,
                'address' => 'Via delle Zoccolette, 00186 Roma',
                'latitude' => 41.8924246,
                'longitude' =>  12.4727161,
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
