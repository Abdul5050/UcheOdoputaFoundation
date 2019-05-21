<?php 

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'skt-charity'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {
	//array of all custom font types.
	$font_types = array( '' => '',
		'ABeeZee' => 'ABeeZee',
		'Abel' => 'Abel',
		'Abril Fatface' => 'Abril Fatface',
		'Aclonica' => 'Aclonica',
		'Acme' => 'Acme',
		'Actor' => 'Actor',
		'Adamina' => 'Adamina',
		'Advent Pro' => 'Advent Pro',
		'Aguafina Script' => 'Aguafina Script',
		'Akronim' => 'Akronim',
		'Aladin' => 'Aladin',
		'Aldrich' => 'Aldrich',
		'Alegreya' => 'Alegreya',
		'Alegreya Sans SC' => 'Alegreya Sans SC',
		'Alegreya SC' => 'Alegreya SC',
		'Alex Brush' => 'Alex Brush',
		'Alef' => 'Alef',
		'Alfa Slab One' => 'Alfa Slab One',
		'Alice' => 'Alice',
		'Alike' => 'Alike',
		'Alike Angular' => 'Alike Angular',
		'Allan' => 'Allan',
		'Allerta' => 'Allerta',
		'Allerta Stencil' => 'Allerta Stencil',
		'Allura' => 'Allura',
		'Almendra' => 'Almendra',
		'Almendra Display' => 'Almendra Display',
		'Almendra SC' => 'Almendra SC',
		'Amiri' => 'Amiri',
		'Amarante' => 'Amarante',
		'Amaranth' => 'Amaranth',
		'Amatic SC' => 'Amatic SC',
		'Amethysta' => 'Amethysta',
		'Amita' => 'Amita',
		'Anaheim' => 'Anaheim',
		'Andada' => 'Andada',
		'Andika' => 'Andika',
		'Annie Use Your Telescope' => 'Annie Use Your Telescope',
		'Anonymous Pro' => 'Anonymous Pro',
		'Antic' => 'Antic',
		'Antic Didone' => 'Antic Didone',
		'Antic Slab' => 'Antic Slab',
		'Anton' => 'Anton',
		'Angkor' => 'Angkor',
		'Arapey' => 'Arapey',
		'Arbutus' => 'Arbutus',
		'Arbutus Slab' => 'Arbutus Slab',
		'Architects Daughter' => 'Architects Daughter',
		'Archivo White' => 'Archivo White',
		'Archivo Narrow' => 'Archivo Narrow',
		'Arial' => 'Arial',
		'Arimo' => 'Arimo',
		'Arya' => 'Arya',
		'Arizonia' => 'Arizonia',
		'Armata' => 'Armata',
		'Artifika' => 'Artifika',
		'Arvo' => 'Arvo',
		'Asar' => 'Asar',
		'Asap' => 'Asap',
		'Asset' => 'Asset',
		'Astloch' => 'Astloch',
		'Asul' => 'Asul',
		'Atomic Age' => 'Atomic Age',
		'Aubrey' => 'Aubrey',
		'Audiowide' => 'Audiowide',
		'Autour One' => 'Autour One',
		'Average' => 'Average',
		'Average Sans' => 'Average Sans',
		'Averia Gruesa Libre' => 'Averia Gruesa Libre',
		'Averia Libre' => 'Averia Libre',
		'Averia Sans Libre' => 'Averia Sans Libre',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Battambang' => 'Battambang',
		'Bad Script' => 'Bad Script',
		'Bayon' => 'Bayon',
		'Balthazar' => 'Balthazar',
		'Bangers' => 'Bangers',
		'Basic' => 'Basic',
		'Baumans' => 'Baumans',
		'Belgrano' => 'Belgrano',
		'Belleza' => 'Belleza',
		'BenchNine' => 'BenchNine',
		'Bentham' => 'Bentham',
		'Berkshire Swash' => 'Berkshire Swash',
		'Bevan' => 'Bevan',
		'Bigelow Rules' => 'Bigelow Rules',
		'Bigshot One' => 'Bigshot One',
		'Bilbo' => 'Bilbo',
		'Bilbo Swash Caps' => 'Bilbo Swash Caps',
		'Biryani' => 'Biryani',
		'Bitter' => 'Bitter',
		'White Ops One' => 'White Ops One',
		'Bokor' => 'Bokor',
		'Bonbon' => 'Bonbon',
		'Boogaloo' => 'Boogaloo',
		'Bowlby One' => 'Bowlby One',
		'Bowlby One SC' => 'Bowlby One SC',
		'Brawler' => 'Brawler',
		'Bree Serif' => 'Bree Serif',
		'Bubblegum Sans' => 'Bubblegum Sans',
		'Bubbler One' => 'Bubbler One',
		'Buda' => 'Buda',
		'Buenard' => 'Buenard',
		'Butcherman' => 'Butcherman',
		'Butcherman Caps' => 'Butcherman Caps',
		'Butterfly Kids' => 'Butterfly Kids',
		'Cabin' => 'Cabin',
		'Cabin Condensed' => 'Cabin Condensed',
		'Cabin Sketch' => 'Cabin Sketch',
		'Cabin' => 'Cabin',
		'Caesar Dressing' => 'Caesar Dressing',
		'Cagliostro' => 'Cagliostro',
		'Calligraffitti' => 'Calligraffitti',
		'Cambay' => 'Cambay',
		'Cambo' => 'Cambo',
		'Candal' => 'Candal',
		'Cantarell' => 'Cantarell',
		'Cantata One' => 'Cantata One',
		'Cantora One' => 'Cantora One',
		'Capriola' => 'Capriola',
		'Cardo' => 'Cardo',
		'Carme' => 'Carme',
		'Carrois Gothic' => 'Carrois Gothic',
		'Carrois Gothic SC' => 'Carrois Gothic SC',
		'Carter One' => 'Carter One',
		'Caveat' => 'Caveat',
		'Caveat Brush' => 'Caveat Brush',
		'Catamaran' => 'Catamaran',
		'Caudex' => 'Caudex',
		'Cedarville Cursive' => 'Cedarville Cursive',
		'Ceviche One' => 'Ceviche One',
		'Changa One' => 'Changa One',
		'Chango' => 'Chango',
		'Chau Philomene One' => 'Chau Philomene One',
		'Chenla' => 'Chenla',
		'Chela One' => 'Chela One',
		'Chelsea Market' => 'Chelsea Market',
		'Cherry Cream Soda' => 'Cherry Cream Soda',
		'Cherry Swash' => 'Cherry Swash',
		'Chewy' => 'Chewy',
		'Chicle' => 'Chicle',
		'Chivo' => 'Chivo',
		'Chonburi' => 'Chonburi',
		'Cinzel' => 'Cinzel',
		'Cinzel Decorative' => 'Cinzel Decorative',
		'Clicker Script' => 'Clicker Script',
		'Coda' => 'Coda',
		'Codystar' => 'Codystar',
		'Combo' => 'Combo',
		'Comfortaa' => 'Comfortaa',
		'Coming Soon' => 'Coming Soon',
		'Condiment' => 'Condiment',
		'Content' => 'Content',
		'Contrail One' => 'Contrail One',
		'Convergence' => 'Convergence',
		'Cookie' => 'Cookie',
		'Comic Sans MS' => 'Comic Sans MS',
		'Copse' => 'Copse',
		'Corben' => 'Corben',
		'Courgette' => 'Courgette',
		'Cousine' => 'Cousine',
		'Coustard' => 'Coustard',
		'Covered By Your Grace' => 'Covered By Your Grace',
		'Crafty Girls' => 'Crafty Girls',
		'Creepster' => 'Creepster',
		'Creepster Caps' => 'Creepster Caps',
		'Crete Round' => 'Crete Round',
		'Crimson' => 'Crimson',
		'Croissant One' => 'Croissant One',
		'Crushed' => 'Crushed',
		'Cuprum' => 'Cuprum',
		'Cutive' => 'Cutive',
		'Cutive Mono' => 'Cutive Mono',
		'Damion' => 'Damion',
		'Dangrek' => 'Dangrek',
		'Dancing Script' => 'Dancing Script',
		'Dawning of a New Day' => 'Dawning of a New Day',
		'Days One' => 'Days One',
		'Dekko' => 'Dekko',
		'Delius' => 'Delius',
		'Delius Swash Caps' => 'Delius Swash Caps',
		'Delius Unicase' => 'Delius Unicase',
		'Della Respira' => 'Della Respira',
		'Denk One' => 'Denk One',
		'Devonshire' => 'Devonshire',
		'Dhurjati' => 'Dhurjati',
		'Didact Gothic' => 'Didact Gothic',
		'Diplomata' => 'Diplomata',
		'Diplomata SC' => 'Diplomata SC',
		'Domine' => 'Domine',
		'Donegal One' => 'Donegal One',
		'Doppio One' => 'Doppio One',
		'Dorsa' => 'Dorsa',
		'Dosis' => 'Dosis',
		'Dr Sugiyama' => 'Dr Sugiyama',
		'Droid Sans' => 'Droid Sans',
		'Droid Sans Mono' => 'Droid Sans Mono',
		'Droid Serif' => 'Droid Serif',
		'Duru Sans' => 'Duru Sans',
		'Dynalight' => 'Dynalight',
		'EB Garamond' => 'EB Garamond',
		'Eczar' => 'Eczar',
		'Eagle Lake' => 'Eagle Lake',
		'Eater' => 'Eater',
		'Eater Caps' => 'Eater Caps',
		'Economica' => 'Economica',
		'Ek Mukta' => 'Ek Mukta',
		'Electrolize' => 'Electrolize',
		'Elsie' => 'Elsie',
		'Elsie Swash Caps' => 'Elsie Swash Caps',
		'Emblema One' => 'Emblema One',
		'Emilys Candy' => 'Emilys Candy',
		'Engagement' => 'Engagement',
		'Englebert' => 'Englebert',
		'Enriqueta' => 'Enriqueta',
		'Erica One' => 'Erica One',
		'Esteban' => 'Esteban',
		'Euphoria Script' => 'Euphoria Script',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Exo 2' => 'Exo 2',
		'Expletus Sans' => 'Expletus Sans',
		'Fanwood Text' => 'Fanwood Text',
		'Fascinate' => 'Fascinate',
		'Fascinate Inline' => 'Fascinate Inline',
		'Fasthand' => 'Fasthand',
		'Faster One' => 'Faster One',
		'Federant' => 'Federant',
		'Federo' => 'Federo',
		'Felipa' => 'Felipa',
		'Fenix' => 'Fenix',
		'Finger Paint' => 'Finger Paint',
		'Fira Mono' => 'Fira Mono',
		'Fira Sans' => 'Fira Sans',
		'Fjalla One' => 'Fjalla One',
		'Fjord One' => 'Fjord One',
		'Flamenco' => 'Flamenco',
		'Flavors' => 'Flavors',
		'Fondamento' => 'Fondamento',
		'Fontdiner Swanky' => 'Fontdiner Swanky',
		'Forum' => 'Forum',
		'Francois One' => 'Francois One',
		'FreeSans' => 'FreeSans',
		'Freckle Face' => 'Freckle Face',
		'Fredericka the Great' => 'Fredericka the Great',
		'Fredoka One' => 'Fredoka One',
		'Fresca' => 'Fresca',
		'Freehand' => 'Freehand',
		'Frijole' => 'Frijole',
		'Fruktur' => 'Fruktur',
		'Fugaz One' => 'Fugaz One',
		'Gafata' => 'Gafata',
		'Galdeano' => 'Galdeano',
		'Galindo' => 'Galindo',
		'Gentium Basic' => 'Gentium Basic',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Geo' => 'Geo',
		'Georgia' => 'Georgia',
		'Geostar' => 'Geostar',
		'Geostar Fill' => 'Geostar Fill',
		'Germania One' => 'Germania One',
		'Gilda Display' => 'Gilda Display',
		'Give You Glory' => 'Give You Glory',
		'Glass Antiqua' => 'Glass Antiqua',
		'Glegoo' => 'Glegoo',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Goblin One' => 'Goblin One',
		'Gochi Hand' => 'Gochi Hand',
		'Gorditas' => 'Gorditas',
		'Gurajada' => 'Gurajada',
		'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
		'Graduate' => 'Graduate',
		'Grand Hotel' => 'Grand Hotel',
		'Gravitas One' => 'Gravitas One',
		'Great Vibes' => 'Great Vibes',
		'Griffy' => 'Griffy',
		'Gruppo' => 'Gruppo',
		'Gudea' => 'Gudea',
		'Gidugu' => 'Gidugu',
		'GFS Didot' => 'GFS Didot',
		'GFS Neohellenic' => 'GFS Neohellenic',
		'Habibi' => 'Habibi',
		'Hammersmith One' => 'Hammersmith One',
		'Halant' => 'Halant',
		'Hanalei' => 'Hanalei',
		'Hanalei Fill' => 'Hanalei Fill',
		'Handlee' => 'Handlee',
		'Hanuman' => 'Hanuman',
		'Happy Monkey' => 'Happy Monkey',
		'Headland One' => 'Headland One',
		'Henny Penny' => 'Henny Penny',
		'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
		'Hind' => 'Hind',
		'Hind Siliguri' => 'Hind Siliguri',
		'Hind Vadodara' => 'Hind Vadodara',
		'Holtwood One SC' => 'Holtwood One SC',
		'Homemade Apple' => 'Homemade Apple',
		'Homenaje' => 'Homenaje',
		'IM Fell' => 'IM Fell',
		'Itim' => 'Itim',
		'Iceberg' => 'Iceberg',
		'Iceland' => 'Iceland',
		'Imprima' => 'Imprima',
		'Inconsolata' => 'Inconsolata',
		'Inder' => 'Inder',
		'Indie Flower' => 'Indie Flower',
		'Inknut Antiqua' => 'Inknut Antiqua',
		'Inika' => 'Inika',
		'Irish Growler' => 'Irish Growler',
		'Istok Web' => 'Istok Web',
		'Italiana' => 'Italiana',
		'Italianno' => 'Italianno',
		'Jacques Francois' => 'Jacques Francois',
		'Jacques Francois Shadow' => 'Jacques Francois Shadow',
		'Jim Nightshade' => 'Jim Nightshade',
		'Jockey One' => 'Jockey One',
		'Jaldi' => 'Jaldi',
		'Jolly Lodger' => 'Jolly Lodger',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Joti One' => 'Joti One',
		'Judson' => 'Judson',
		'Julee' => 'Julee',
		'Julius Sans One' => 'Julius Sans One',
		'Junge' => 'Junge',
		'Jura' => 'Jura',
		'Just Another Hand' => 'Just Another Hand',
		'Just Me Again Down Here' => 'Just Me Again Down Here',
		'Kadwa' => 'Kadwa',
		'Kdam Thmor' => 'Kdam Thmor',
		'Kalam' => 'Kalam', 
		'Kameron' => 'Kameron',
		'Kantumruy' => 'Kantumruy',
		'Karma' => 'Karma',
		'Karla' => 'Karla',
		'Kaushan Script' => 'Kaushan Script',
		'Kavoon' => 'Kavoon',
		'Keania One' => 'Keania One',
		'Kelly Slab' => 'Kelly Slab',
		'Kenia' => 'Kenia',
		'Khand' => 'Khand',
		'Khmer' => 'Khmer',
		'Khula' => 'Khula',
		'Kite One' => 'Kite One',
		'Knewave' => 'Knewave',
		'Kotta One' => 'Kotta One',
		'Kranky' => 'Kranky',
		'Kreon' => 'Kreon',
		'Kristi' => 'Kristi',
		'Koulen' => 'Koulen',
		'Krona One' => 'Krona One',
		'Kurale' => 'Kurale',
		'Lakki Reddy' => 'Lakki Reddy',
		'La Belle Aurore' => 'La Belle Aurore',
		'Lancelot' => 'Lancelot',
		'Laila' => 'Laila',
		'Lato' => 'Lato',
		'Lateef' => 'Lateef',
		'League Script' => 'League Script',
		'Leckerli One' => 'Leckerli One',
		'Ledger' => 'Ledger',
		'Lekton' => 'Lekton',
		'Lemon' => 'Lemon',
		'Libre Baskerville' => 'Libre Baskerville',
		'Life Savers' => 'Life Savers',
		'Lilita One' => 'Lilita One',
		'Limelight' => 'Limelight',
		'Linden Hill' => 'Linden Hill',
		'Lobster' => 'Lobster',
		'Lobster Two' => 'Lobster Two',
		'Londrina Outline' => 'Londrina Outline',
		'Londrina Shadow' => 'Londrina Shadow',
		'Londrina Sketch' => 'Londrina Sketch',
		'Londrina Solid' => 'Londrina Solid',
		'Lora' => 'Lora',
		'Love Ya Like A Sister' => 'Love Ya Like A Sister',
		'Loved by the King' => 'Loved by the King',
		'Lovers Quarrel' => 'Lovers Quarrel',
		'Lucida Sans Unicode' => 'Lucida Sans Unicode',
		'Luckiest Guy' => 'Luckiest Guy',
		'Lusitana' => 'Lusitana',
		'Lustria' => 'Lustria',
		'Macondo' => 'Macondo',
		'Macondo Swash Caps' => 'Macondo Swash Caps',
		'Magra' => 'Magra',
		'Maiden Orange' => 'Maiden Orange',
		'Mallanna' => 'Mallanna',
		'Mandali' => 'Mandali',
		'Mako' => 'Mako',
		'Marcellus' => 'Marcellus',
		'Marcellus SC' => 'Marcellus SC',
		'Marck Script' => 'Marck Script',
		'Margarine' => 'Margarine',
		'Marko One' => 'Marko One',
		'Marmelad' => 'Marmelad',
		'Marvel' => 'Marvel',
		'Martel' => 'Martel',
		'Martel Sans' => 'Martel Sans',
		'Mate' => 'Mate',
		'Mate SC' => 'Mate SC',
		'Maven Pro' => 'Maven Pro',
		'McLaren' => 'McLaren',
		'Meddon' => 'Meddon',
		'MedievalSharp' => 'MedievalSharp',
		'Medula One' => 'Medula One',
		'Megrim' => 'Megrim',
		'Meie Script' => 'Meie Script',
		'Merienda' => 'Merienda',
		'Merienda One' => 'Merienda One',
		'Merriweather' => 'Merriweather',
		'Metal' => 'Metal',
		'Metal Mania' => 'Metal Mania',
		'Metamorphous' => 'Metamorphous',
		'Metrophobic' => 'Metrophobic',
		'Michroma' => 'Michroma',
		'Milonga' => 'Milonga',
		'Miltonian' => 'Miltonian',
		'Miltonian Tattoo' => 'Miltonian Tattoo',
		'Miniver' => 'Miniver',
		'Miss Fajardose' => 'Miss Fajardose',
		'Miss Saint Delafield' => 'Miss Saint Delafield',
		'Modak' => 'Modak',
		'Modern Antiqua' => 'Modern Antiqua',
		'Molengo' => 'Molengo',
		'Molle' => 'Molle',
		'Moulpali' => 'Moulpali',
		'Monda' => 'Monda',
		'Monofett' => 'Monofett',
		'Monoton' => 'Monoton',
		'Monsieur La Doulaise' => 'Monsieur La Doulaise',
		'Montaga' => 'Montaga',
		'Montez' => 'Montez',
		'Montserrat' => 'Montserrat',
		'Montserrat Alternates' => 'Montserrat Alternates',
		'Montserrat Subrayada' => 'Montserrat Subrayada',
		'Mountains of Christmas' => 'Mountains of Christmas',
		'Mouse Memoirs' => 'Mouse Memoirs',
		'Moul' => 'Moul',
		'Mr Bedford' => 'Mr Bedford',
		'Mr Bedfort' => 'Mr Bedfort',
		'Mr Dafoe' => 'Mr Dafoe',
		'Mr De Haviland' => 'Mr De Haviland',
		'Mrs Saint Delafield' => 'Mrs Saint Delafield',
		'Mrs Sheppards' => 'Mrs Sheppards',
		'Muli' => 'Muli',
		'Mystery Quest' => 'Mystery Quest',
		'Neucha' => 'Neucha',
		'Neuton' => 'Neuton',
		'New Rocker' => 'New Rocker',
		'News Cycle' => 'News Cycle',
		'Niconne' => 'Niconne',
		'Nixie One' => 'Nixie One',
		'Nobile' => 'Nobile',
		'Nokora' => 'Nokora',
		'Norican' => 'Norican',
		'Nosifer' => 'Nosifer',
		'Nosifer Caps' => 'Nosifer Caps',
		'Nova Mono' => 'Nova Mono',
		'Noticia Text' => 'Noticia Text',
		'Noto Sans' => 'Noto Sans',
		'Noto Serif' => 'Noto Serif',
		'Nova Round' => 'Nova Round',
		'Numans' => 'Numans',
		'Nunito' => 'Nunito',
		'NTR' => 'NTR',
		'Offside' => 'Offside',
		'Oldenburg' => 'Oldenburg',
		'Oleo Script' => 'Oleo Script',
		'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
		'Open Sans' => 'Open Sans',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Oranienbaum' => 'Oranienbaum',
		'Orbitron' => 'Orbitron',
		'Odor Mean Chey' => 'Odor Mean Chey',
		'Oregano' => 'Oregano',
		'Orienta' => 'Orienta',
		'Original Surfer' => 'Original Surfer',
		'Oswald' => 'Oswald',
		'Over the Rainbow' => 'Over the Rainbow',
		'Overlock' => 'Overlock',
		'Overlock SC' => 'Overlock SC',
		'Ovo' => 'Ovo',
		'Oxygen' => 'Oxygen',
		'Oxygen Mono' => 'Oxygen Mono',
		'Palanquin Dark' => 'Palanquin Dark',
		'Peddana' => 'Peddana',
		'Poppins' => 'Poppins',
		'PT Mono' => 'PT Mono',
		'PT Sans' => 'PT Sans',
		'PT Sans Caption' => 'PT Sans Caption',
		'PT Sans Narrow' => 'PT Sans Narrow',
		'PT Serif' => 'PT Serif',
		'PT Serif Caption' => 'PT Serif Caption',
		'Pacifico' => 'Pacifico',
		'Paprika' => 'Paprika',
		'Parisienne' => 'Parisienne',
		'Passero One' => 'Passero One',
		'Passion One' => 'Passion One',
		'Patrick Hand' => 'Patrick Hand',
		'Patrick Hand SC' => 'Patrick Hand SC',
		'Patua One' => 'Patua One',
		'Paytone One' => 'Paytone One',
		'Peralta' => 'Peralta',
		'Permanent Marker' => 'Permanent Marker',
		'Petit Formal Script' => 'Petit Formal Script',
		'Petrona' => 'Petrona',
		'Philosopher' => 'Philosopher',
		'Piedra' => 'Piedra',
		'Pinyon Script' => 'Pinyon Script',
		'Pirata One' => 'Pirata One',
		'Plaster' => 'Plaster',
		'Palatino Linotype' => 'Palatino Linotype',
		'Play' => 'Play',
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display',
		'Playfair Display SC' => 'Playfair Display SC',
		'Podkova' => 'Podkova',
		'Poiret One' => 'Poiret One',
		'Poller One' => 'Poller One',
		'Poly' => 'Poly',
		'Pompiere' => 'Pompiere',
		'Pontano Sans' => 'Pontano Sans',
		'Port Lligat Sans' => 'Port Lligat Sans',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Prata' => 'Prata',
		'Pragati Narrow' => 'Pragati Narrow',
		'Preahvihear' => 'Preahvihear',
		'Press Start 2P' => 'Press Start 2P',
		'Princess Sofia' => 'Princess Sofia',
		'Prociono' => 'Prociono',
		'Prosto One' => 'Prosto One',
		'Puritan' => 'Puritan',
		'Purple Purse' => 'Purple Purse',
		'Quando' => 'Quando',
		'Quantico' => 'Quantico',
		'Quattrocento' => 'Quattrocento',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Questrial' => 'Questrial',
		'Quicksand' => 'Quicksand',
		'Quintessential' => 'Quintessential',
		'Qwigley' => 'Qwigley',
		'Racing Sans One' => 'Racing Sans One',
		'Radley' => 'Radley',
		'Rajdhani' => 'Rajdhani',
		'Raleway Dots' => 'Raleway Dots',
		'Raleway' => 'Raleway',
		'Rambla' => 'Rambla',
		'Ramabhadra' => 'Ramabhadra',
		'Ramaraja' => 'Ramaraja',
		'Rammetto One' => 'Rammetto One',
		'Ranchers' => 'Ranchers',
		'Rancho' => 'Rancho',
		'Ranga' => 'Ranga',
		'Ravi Prakash' => 'Ravi Prakash',
		'Rationale' => 'Rationale',
		'Redressed' => 'Redressed',
		'Reenie Beanie' => 'Reenie Beanie',
		'Revalia' => 'Revalia',
		'Rhodium Libre' => 'Rhodium Libre',
		'Ribeye' => 'Ribeye',
		'Ribeye Marrow' => 'Ribeye Marrow',
		'Righteous' => 'Righteous',
		'Risque' => 'Risque',
		'Roboto' => 'Roboto',
		'Roboto Condensed' => 'Roboto Condensed',
		'Roboto Mono' => 'Roboto Mono',
		'Roboto Slab' => 'Roboto Slab',
		'Rochester' => 'Rochester',
		'Rock Salt' => 'Rock Salt',
		'Rokkitt' => 'Rokkitt',
		'Romanesco' => 'Romanesco',
		'Ropa Sans' => 'Ropa Sans',
		'Rosario' => 'Rosario',
		'Rosarivo' => 'Rosarivo',
		'Rouge Script' => 'Rouge Script',
		'Rozha One' => 'Rozha One',
		'Rubik' => 'Rubik',
		'Rubik One' => 'Rubik One',
		'Rubik Mono One' => 'Rubik Mono One',
		'Ruda' => 'Ruda',
		'Rufina' => 'Rufina',
		'Ruge Boogie' => 'Ruge Boogie',
		'Ruluko' => 'Ruluko',
		'Rum Raisin' => 'Rum Raisin',
		'Ruslan Display' => 'Ruslan Display',
		'Russo One' => 'Russo One',
		'Ruthie' => 'Ruthie',
		'Rye' => 'Rye',
		'Sacramento' => 'Sacramento',
		'Sail' => 'Sail',
		'Salsa' => 'Salsa',
		'Sanchez' => 'Sanchez',
		'Sancreek' => 'Sancreek',
		'Sahitya' => 'Sahitya',
		'Sansita One' => 'Sansita One',
		'Sarpanch' => 'Sarpanch',
		'Sarina' => 'Sarina',
		'Satisfy' => 'Satisfy',
		'Scada' => 'Scada',
		'Scheherazade' => 'Scheherazade',
		'Schoolbell' => 'Schoolbell',
		'Seaweed Script' => 'Seaweed Script',
		'Sarala' => 'Sarala',
		'Sevillana' => 'Sevillana',
		'Seymour One' => 'Seymour One',
		'Shadows Into Light' => 'Shadows Into Light',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shanti' => 'Shanti',
		'Share' => 'Share',
		'Share Tech' => 'Share Tech',
		'Share Tech Mono' => 'Share Tech Mono',
		'Shojumaru' => 'Shojumaru',
		'Short Stack' => 'Short Stack',
		'Sigmar One' => 'Sigmar One',
		'Suranna' => 'Suranna',
		'Suravaram' => 'Suravaram',
		'Suwannaphum' => 'Suwannaphum',
		'Signika' => 'Signika',
		'Signika Negative' => 'Signika Negative',
		'Simonetta' => 'Simonetta',
		'Siemreap' => 'Siemreap',
		'Sirin Stencil' => 'Sirin Stencil',
		'Six Caps' => 'Six Caps',
		'Skranji' => 'Skranji',
		'Slackey' => 'Slackey',
		'Smokum' => 'Smokum',
		'Smythe' => 'Smythe',
		'Sniglet' => 'Sniglet',
		'Snippet' => 'Snippet',
		'Snowburst One' => 'Snowburst One',
		'Sofadi One' => 'Sofadi One',
		'Sofia' => 'Sofia',
		'Sonsie One' => 'Sonsie One',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Source Code Pro' => 'Source Code Pro',
		'Source Sans Pro' => 'Source Sans Pro',
		'Special I am one' => 'Special I am one',
		'Spicy Rice' => 'Spicy Rice',
		'Spinnaker' => 'Spinnaker',
		'Spirax' => 'Spirax',
		'Squada One' => 'Squada One',
		'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
		'Stalemate' => 'Stalemate',
		'Stalinist One' => 'Stalinist One',
		'Stardos Stencil' => 'Stardos Stencil',
		'Stint Ultra Condensed' => 'Stint Ultra Condensed',
		'Stint Ultra Expanded' => 'Stint Ultra Expanded',
		'Stoke' => 'Stoke',
		'Stoke' => 'Stoke',
		'Strait' => 'Strait',
		'Sura' => 'Sura',
		'Sumana' => 'Sumana',
		'Sue Ellen Francisco' => 'Sue Ellen Francisco',
		'Sunshiney' => 'Sunshiney',
		'Supermercado One' => 'Supermercado One',
		'Swanky and Moo Moo' => 'Swanky and Moo Moo',
		'Syncopate' => 'Syncopate',
		'Symbol' => 'Symbol',
		'Timmana' => 'Timmana',
		'Taprom' => 'Taprom',
		'Tangerine' => 'Tangerine',
		'Tahoma' => 'Tahoma',
		'Teko' => 'Teko',
		'Telex' => 'Telex',
		'Tenali Ramakrishna' => 'Tenali Ramakrishna',
		'Tenor Sans' => 'Tenor Sans',
		'Terminal Dosis' => 'Terminal Dosis',
		'Terminal Dosis Light' => 'Terminal Dosis Light',
		'Text Me One' => 'Text Me One',
		'The Girl Next Door' => 'The Girl Next Door',
		'Tienne' => 'Tienne',
		'Tillana' => 'Tillana',
		'Tinos' => 'Tinos',
		'Titan One' => 'Titan One',
		'Titillium Web' => 'Titillium Web',
		'Trade Winds' => 'Trade Winds',
		'Trebuchet MS' => 'Trebuchet MS',
		'Trocchi' => 'Trocchi',
		'Trochut' => 'Trochut',
		'Trykker' => 'Trykker',
		'Tulpen One' => 'Tulpen One',
		'Ubuntu' => 'Ubuntu',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Ubuntu Mono' => 'Ubuntu Mono',
		'Ultra' => 'Ultra',
		'Uncial Antiqua' => 'Uncial Antiqua',
		'Underdog' => 'Underdog',
		'Unica One' => 'Unica One',
		'UnifrakturCook' => 'UnifrakturCook',
		'UnifrakturMaguntia' => 'UnifrakturMaguntia',
		'Unkempt' => 'Unkempt',
		'Unlock' => 'Unlock',
		'Unna' => 'Unna',
		'VT323' => 'VT323',
		'Vampiro One' => 'Vampiro One',
		'Varela' => 'Varela',
		'Varela Round' => 'Varela Round',
		'Vast Shadow' => 'Vast Shadow',
		'Vesper Libre' => 'Vesper Libre',
		'Verdana' => 'Verdana',
		'Vibur' => 'Vibur',
		'Vidaloka' => 'Vidaloka',
		'Viga' => 'Viga',
		'Voces' => 'Voces',
		'Volkhov' => 'Volkhov',
		'Vollkorn' => 'Vollkorn',
		'Voltaire' => 'Voltaire',
		'Waiting for the Sunrise' => 'Waiting for the Sunrise',
		'Wallpoet' => 'Wallpoet',
		'Walter Turncoat' => 'Walter Turncoat',
		'Warnes' => 'Warnes',
		'Wellfleet' => 'Wellfleet',
		'Wendy One' => 'Wendy One',
		'Wire One' => 'Wire One',
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
		'Yantramanav' => 'Yantramanav',
		'Yellowtail' => 'Yellowtail',
		'Yeseva One' => 'Yeseva One',
		'Yesteryear' => 'Yesteryear',
		'Zeyada' => 'Zeyada'
	);

	//array of all font sizes.
	$font_sizes = array( 
		'10px' => '10px',
		'11px' => '11px',
	);
	for($n=12;$n<=100;$n+=1){
		$font_sizes[$n.'px'] = $n.'px';
	}
	
	// Pull all the pages into an array
	 $options_pages = array();
	 $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	 $options_pages[''] = 'Select a page:';
	 foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	 }

	// array of section content.
	$section_text = array(
		1 => array(
			'section_title'		=> '',
			'menutitle'			=> '',
			'bgcolor' 			=> '#f9f8f8',
			'bgimage'			=> '',
			'class'				=> 'sponserhome',
			'content'			=> '<div class="sponserleftimage"><img src="'.get_template_directory_uri().'/images/Sponsor-an-Orphan-CHILD.jpg" alt="" /></div>
			<div class="sponsercontent">
			<div class="sponserdonate">$2250 To Go</div>
			<h2>Sponsor an Orphan CHILD</h2>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, libero vitae posuere euismod, dui velit imperdiet diam, molestie ultricies elit orci vitae purus. Praesent hendrerit, nulla vel sodales porttitor, justo nunc venenatis metus, sed pulvinar ante dui non ex. Cras pretium tincidunt porttitor. Mauris quis semper sapien.
			[readmore-link align="left" bgcolor="#323233" color="#fff" button="Donate Now!" links="#"] 
			</div>
<div class="sponserrightimage"><img src="'.get_template_directory_uri().'/images/persent-donation.png" alt="" /></div>

',
		),
		
		2 => array(
			'section_title'	=> 'Events list',
			'menutitle'		=> '',
			'bgcolor' 		=> '',
			'bgimage'		=> get_template_directory_uri().'/images/eventlist-bg.jpg',
			'class'			=> '',
			'content'		=> '[oureventdate eventdate="18" eventmonth="MAR" eventyear="" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#"][oureventdate eventdate="18" eventmonth="MAR" eventyear="2016" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#" class="last"][oureventdate eventdate="18" eventmonth="MAR" eventyear="2016" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#"][oureventdate eventdate="18" eventmonth="MAR" eventyear="" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#" class="last"][oureventdate eventdate="18" eventmonth="MAR" eventyear="" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#"][oureventdate eventdate="18" eventmonth="MAR" eventyear="2016" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#" class="last"]'
		),
		
	
		3 => array(
			'section_title'	=> 'Our Donators',
			'menutitle'		=> '',
			'bgcolor' 		=> '#f9f8f8',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[ourdonators show="4"]'
		),
		

		4 => array(
			'section_title'	=> '',
			'menutitle'		=> 'needyourhelp',
			'bgcolor' 		=> '',
			'bgimage'		=> get_template_directory_uri().'/images/need-your-help-bg.jpg',
			'class'			=> '',
			'content'		=> '<div class="needyourhelp-content"><h1>We need your Help</h1>
			<h3>Let’s Stop This hunger and fullfill their happiness</h3>
			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare, libero vitae posuere euismod, dui velit imperdiet diam, molestie ultricies elit orci vitae purus. Praesent hendrerit, nulla vel sodales porttitor, justo nunc venenatis metus, sed pulvinar ante dui non ex. Cras pretium tincidunt porttitor.
			
			[readmore-link align="left" bgcolor="#f25f43" color="#fff" button="Learn More" links="#"] 
			
			</div>'
		),

		5 => array(
			'section_title'	=> 'Latest News',
			'menutitle'		=> '',
			'bgcolor' 		=> '#f9f8f8',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[latestposts show="2"]'
		),
 
		
	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'skt-charity'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'skt-charity'),
		'desc' => __('Upload your site logo here', 'skt-charity'),
		'id' => 'logo',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(		
		'desc' => __('add here your custom logo height without px', 'skt-charity'),
		'id' => 'logoheight',
		'std' => '35',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Custom CSS', 'skt-charity'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'skt-charity'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');

// font family start 
	$options[] = array(
		'name' => __('Font Faces', 'skt-charity'),
		'desc' => __('Select font for the body text', 'skt-charity'),
		'id' => 'bodyfontface',
		'type' => 'select',
		'std' => 'PT Sans',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the textual logo', 'skt-charity'),
		'id' => 'logofontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font family for header top Phone number', 'skt-charity'),
		'id' => 'hdrtopfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for the navigation text', 'skt-charity'),
		'id' => 'navfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for section heading text.', 'skt-charity'),
		'id' => 'headfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );

	$options[] = array(
		'desc' => __('Select font face for the Footer heading', 'skt-charity'),
		'id' => 'ftfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h1 heading', 'skt-charity'),
		'id' => 'h1fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font face for the h2 heading', 'skt-charity'),
		'id' => 'h2fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h3 heading', 'skt-charity'),
		'id' => 'h3fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h4 heading', 'skt-charity'),
		'id' => 'h4fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h5 heading', 'skt-charity'),
		'id' => 'h5fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h6 heading', 'skt-charity'),
		'id' => 'h6fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	
		
// font sizes start	
	$options[] = array(
		'name' => __('Font Sizes', 'skt-charity'),
		'desc' => __('Select font size for body text', 'skt-charity'),
		'id' => 'bodyfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo', 'skt-charity'),
		'id' => 'logofontsize',
		'type' => 'select',
		'std' => '41px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for navigation', 'skt-charity'),
		'id' => 'navfontsize',
		'type' => 'select',
		'std' => '15px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section title', 'skt-charity'),
		'id' => 'sectitlesize',
		'type' => 'select',
		'std' => '34px',
		'options' => $font_sizes );

	$options[] = array(
		'desc' => __('Select Footer Up Towing Emergency font size left', 'skt-charity'),
		'id' => 'towingemergencyh2',
		'std' => '41px',
		'type' => 'select',
		'options' => $font_sizes);
		
	$options[] = array(
		'desc' => __('Select Footer Up Towing Emergency call us font size Right', 'skt-charity'),
		'id' => 'towingemergencyh3',
		'std' => '32px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select font size for footer title', 'skt-charity'),
		'id' => 'ftfontsize',
		'type' => 'select',
		'std' => '25px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for footer title follow us', 'skt-charity'),
		'id' => 'ftfllowusfontsize',
		'type' => 'select',
		'std' => '15px',
		'options' => $font_sizes );	

	$options[] = array(
		'desc' => __('Select font size for header top phone number', 'skt-charity'),
		'id' => 'hdrtopfontsize',
		'type' => 'select',
		'std' => '16px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select h1 font size', 'skt-charity'),
		'id' => 'h1fontsize',
		'std' => '40px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h2 font size', 'skt-charity'),
		'id' => 'h2fontsize',
		'std' => '34px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h3 font size', 'skt-charity'),
		'id' => 'h3fontsize',
		'std' => '23px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h4 font size', 'skt-charity'),
		'id' => 'h4fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h5 font size', 'skt-charity'),
		'id' => 'h5fontsize',
		'std' => '17px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h6 font size', 'skt-charity'),
		'id' => 'h6fontsize',
		'std' => '16px',
		'type' => 'select',
		'options' => $font_sizes);

	// font colors start
	$options[] = array(
		'name' => __('Font Colors', 'skt-charity'),
		'desc' => __('Select font color for the body text', 'skt-charity'),
		'id' => 'bodyfontcolor',
		'std' => '#2e2e2e',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for textual logo', 'skt-charity'),
		'id' => 'logofontcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for textual logo tagline', 'skt-charity'),
		'id' => 'logotagfontcolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(		
		'desc' => __('Select font color for header top strip ', 'skt-charity'),
		'id' => 'hdrtopfontcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(		
		'desc' => __('Select icon color for header top strip', 'skt-charity'),
		'id' => 'topheadericoncolor',
		'std' => '#ffffff',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color for navigation', 'skt-charity'),
		'id' => 'navfontcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for navigation hover', 'skt-charity'),
		'id' => 'navhovercolor',
		'std' => '#f25f43',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for slider below four boxes', 'skt-charity'),
		'id' => 'fourcolumncolor',
		'std' => '#ffffff',
		'type' => 'color');
				
	$options[] = array(
		'desc' => __('Select font color for slider below four boxes title and link', 'skt-charity'),
		'id' => 'fourtitlecolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for sponser donate amount', 'skt-charity'),
		'id' => 'sponserdonatecolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font color for event list date and date border-bottom', 'skt-charity'),
		'id' => 'eventlistdatecolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font color for section title', 'skt-charity'),
		'id' => 'sectitlecolor',
		'std' => '#383838',
		'type' => 'color');				

	$options[] = array(
		'desc' => __('Select font color for section title last word', 'skt-charity'),
		'id' => 'sectitlelastcolor',
		'std' => '#f25f43',
		'type' => 'color');				
		

	$options[] = array(
		'desc' => __('Select font color for our donator text', 'skt-charity'),
		'id' => 'ourdonatortextcolor',
		'std' => '#2e2e2e',
		'type' => 'color');				

	$options[] = array(
		'desc' => __('Select font color for Our Donator amount', 'skt-charity'),
		'id' => 'donationamountcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for Latest news content', 'skt-charity'),
		'id' => 'newstextcolor',
		'std' => '#626161',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for widget title', 'skt-charity'),
		'id' => 'wdgttitleccolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer title', 'skt-charity'),
		'id' => 'foottitlecolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer', 'skt-charity'),
		'id' => 'footdesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer menu ', 'skt-charity'),
		'id' => 'footermenucolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select hover/active font color for footer menu ', 'skt-charity'),
		'id' => 'footermenucurrent',
		'std' => '#f25f43',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for footer left text (copyright)', 'skt-charity'),
		'id' => 'copycolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for footer links', 'skt-charity'),
		'id' => 'copylinks',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for footer links', 'skt-charity'),
		'id' => 'copylinkshover',
		'std' => '#f25f43',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color for links / anchor tags', 'skt-charity'),
		'id' => 'linkcolor',
		'std' => '#000000',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for links / anchor tags on hover', 'skt-charity'),
		'id' => 'linkhovercolor',
		'std' => '#f25f43',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for sidebar li a', 'skt-charity'),
		'id' => 'sidebarfontcolor',
		'std' => '#3b3b3b',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for sidebar li a', 'skt-charity'),
		'id' => 'sidebarfonthvcolor',
		'std' => '#f25f43',
		'type' => 'color');			

	$options[] = array(
		'desc' => __('Select color for testimonials description', 'skt-charity'),
		'id' => 'tmndesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for Testimonials title', 'skt-charity'),
		'id' => 'tmn_titlefontcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for Testimonials designation', 'skt-charity'),
		'id' => 'tmn_titledesfontcolor',
		'std' => '#f25f43',
		'type' => 'color');			

		
	$options[] = array(
		'desc' => __('Select font color for social icons', 'skt-charity'),
		'id' => 'socialfontcolor',
		'std' => '#8b929d',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select hover color for social icons', 'skt-charity'),
		'id' => 'socialfonthvcolor',
		'std' => '#f25f43',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h1 font color', 'skt-charity'),
		'id' => 'h1fontcolor',
		'std' => '#383838',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select h2 font color', 'skt-charity'),
		'id' => 'h2fontcolor',
		'std' => '#383838',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h3 font color', 'skt-charity'),
		'id' => 'h3fontcolor',
		'std' => '#383838',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h4 font color', 'skt-charity'),
		'id' => 'h4fontcolor',
		'std' => '#383838',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h5 font color', 'skt-charity'),
		'id' => 'h5fontcolor',
		'std' => '#383838',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h6 font color', 'skt-charity'),
		'id' => 'h6fontcolor',
		'std' => '#262626',
		'type' => 'color');	

	// Background start		
	$options[] = array(	
		'name' => __('Background Colors', 'skt-charity'),	
		'desc' => __('Select background color for top header strip', 'skt-charity'),
		'id' => 'topheaderbg',
		'std' => '#2a2a2b',
		'type' => 'color');

	$options[] = array(	
		'desc' => __('Select background color for top header strip right change Orange color', 'skt-charity'),
		'id' => 'topheaderrightbg',
		'std' => '#f25f43',
		'type' => 'color');	
		
	$options[] = array(	
		'desc' => __('Select border color for top header strip right link seprater ', 'skt-charity'),
		'id' => 'topheaderrightbd',
		'std' => '#fe927e',
		'type' => 'color');			

	$options[] = array(	
		'desc' => __('Select background color for header', 'skt-charity'),
		'id' => 'headerbg',
		'std' => '#000000',
		'type' => 'color');	

	$options[] = array(		
		'desc' => __('Select opacity background for header', 'skt-charity'),
		'id' => 'headerbgopacity',
		'std' => '0.1',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,'0.1'=>0.1,'0'=>0));		

	$options[] = array(
		'desc' => __('Select background color for first section', 'skt-charity'),
		'id' => 'firstsectionbgcolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Upload your First Section background image', 'skt-charity'),
		'id' => 'firstsectionbgimage',
		'std' => get_template_directory_uri()."/images/section-1-bg.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Select background color for slider below four boxes', 'skt-charity'),
		'id' => 'fourcolumnbg',
		'std' => '',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select border color for slider below four boxes', 'skt-charity'),
		'id' => 'fourcolumnbd',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select background color for slider below four boxes hover', 'skt-charity'),
		'id' => 'fourcolumnhoverbg',
		'std' => '#fe6346',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color sponser donate amount ', 'skt-charity'),
		'id' => 'sponserdonatebgcolor',
		'std' => '#f25f43',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color for event list', 'skt-charity'),
		'id' => 'eventlistbgcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select border color for event list', 'skt-charity'),
		'id' => 'eventlistbdcolor',
		'std' => '#d5d4d4',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for event date', 'skt-charity'),
		'id' => 'eventlistdatebg',
		'std' => '#2a2a2b',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background hover color for event date', 'skt-charity'),
		'id' => 'eventlistdatehvbg',
		'std' => '#f25f43',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color for section our donator', 'skt-charity'),
		'id' => 'ourdonatorbgcolor',
		'std' => '#ffffff',
		'type' => 'color');		
	
	$options[] = array(
		'desc' => __('Select background color for section our Donator amount', 'skt-charity'),
		'id' => 'donatorambgcolor',
		'std' => '#f25f43',
		'type' => 'color');		

	$options[] = array(			
		'desc' => __('Select border color for latest news content title border-bottom', 'skt-charity'),
		'id' => 'newstitlebdcolor',
		'std' => '#eceaeb',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select background color for latest news content area', 'skt-charity'),
		'id' => 'newsshadowcolor',
		'std' => '#ECEBEB',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select background color for latest news content area', 'skt-charity'),
		'id' => 'newsbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select Border color for News date', 'skt-charity'),
		'id' => 'datenewsbdcolor',
		'std' => '#f25f43',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select Background color for News date', 'skt-charity'),
		'id' => 'datenewshvbgcolor',
		'std' => '#f25f43',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select Border color for News date hover', 'skt-charity'),
		'id' => 'datenewshvbdcolor',
		'std' => '#ffffff',
		'type' => 'color');	
 
	$options[] = array(			
		'desc' => __('Select Background color for read more button', 'skt-charity'),
		'id' => 'readmorebuttonbg',
		'std' => '#323233',
		'type' => 'color');	
	
	$options[] = array(			
		'desc' => __('Select Background hover color for read more button', 'skt-charity'),
		'id' => 'readmorebuttonbghover',
		'std' => '#f25f43',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color for gallery hover', 'skt-charity'),
		'id' => 'galhvcolor',
		'std' => '#f25f43',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color for social icon', 'skt-charity'),
		'id' => 'socialbgcolor',
		'std' => '',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select background color for social icon', 'skt-charity'),
		'id' => 'socialbghvcolor',
		'std' => '',
		'type' => 'color');	


	$options[] = array(
		'desc' => __('Select background color for footer', 'skt-charity'),
		'id' => 'footerbgcolor',
		'std' => '#202020',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for copyright section', 'skt-charity'),
		'id' => 'copybgcolor',
		'std' => '#000000',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for sidebar widget', 'skt-charity'),
		'id' => 'sidebarbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for top search form', 'skt-charity'),
		'id' => 'searchbgcolor',
		'std' => '#f25f43',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials inner pages', 'skt-charity'),
		'id' => 'testimonialinnerbgcolor',
		'std' => '#716E6E',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials pagination', 'skt-charity'),
		'id' => 'tmnpagerbg',
		'std' => '#ffffff',
		'type' => 'color');	
				
	$options[] = array(
		'desc' => __('Select active color for testimonials pagination', 'skt-charity'),
		'id' => 'tmnpagerbgactive',
		'std' => '#f25f43',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for sidebar widget title', 'skt-charity'),
		'id' => 'widgettitlebgcolor',
		'std' => '#f25f43',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select background color for toggle menu', 'skt-charity'),
		'id' => 'togglemenu',
		'std' => '#f25f43',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for toggle menu on responsive view', 'skt-charity'),
		'id' => 'tgmenuresponsivebg',
		'std' => '#2a2a2b',
		'type' => 'color');																		

// Border colors
	$options[] = array(			
		'name' => __('Border Colors', 'skt-charity'),		
		'desc' => __('Select border color for inner pages title', 'skt-charity'),
		'id' => 'pagestitlebdcolor',
		'std' => '#e8e8e8',
		'type' => 'color');		
		
	$options[] = array(	
		'desc' => __('Select border color for all footer ', 'skt-charity'),
		'id' => 'footermenuborder',
		'std' => '#27292a',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for iframe', 'skt-charity'),
		'id' => 'iframeborder',
		'std' => '#e5e5e4',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for sidebar li a', 'skt-charity'),
		'id' => 'sidebarliaborder',
		'std' => '#2c2c2c',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border hover color for four boxes below the slider', 'skt-charity'),
		'id' => 'foubxborderhover',
		'std' => '#fe6346',
		'type' => 'color');		
		
	// Default Buttons		
	$options[] = array(
		'name' => __('Button Colors', 'skt-charity'),		
		'desc' => __('Select background color for button', 'skt-charity'),
		'id' => 'btnbgcolor',
		'std' => '#323232',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select hover background color for button', 'skt-charity'),
		'id' => 'btnbghvcolor',
		'std' => '#f25f43',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color button', 'skt-charity'),
		'id' => 'btntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color button on hover', 'skt-charity'),
		'id' => 'btntxthvcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select border color button', 'skt-charity'),
		'id' => 'btnbordercolor',
		'std' => '#292929',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select button border color on hover', 'skt-charity'),
		'id' => 'btnborderhvcolor',
		'std' => '#d75339',
		'type' => 'color');	

 
	$options[] = array(
		'desc' => __('Select active border bottom color for filter gallery', 'skt-charity'),
		'id' => 'galleryactivebc',
		'std' => '#f25f43',
		'type' => 'color');			

	// Slider Caption colors
	$options[] = array(	
		'name' => __('Slider Caption Title', 'skt-charity'),			
		'desc' => __('Select font color for slider title', 'skt-charity'),
		'id' => 'slidetitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font for the slide title', 'skt-charity'),
		'id' => 'slidetitlefontface',
		'type' => 'select',
		'std' => 'Roboto Condensed',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font size for slider title', 'skt-charity'),
		'id' => 'slidetitlefontsize',
		'type' => 'select',
		'std' => '38px',
		'options' => $font_sizes );

	$options[] = array(		
		'name' => __('Slider Caption Description', 'skt-charity'),			
		'desc' => __('Select font color for slider description', 'skt-charity'),
		'id' => 'slidedesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
	
	$options[] = array(
		'desc' => __('Select font for the slide description', 'skt-charity'),
		'id' => 'slidedescfontface',
		'type' => 'select',
		'std' => 'PT Sans',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font size for slider description', 'skt-charity'),
		'id' => 'slidedescfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );

	$options[] = array(		
		'name' => __('Slider Caption Read More Button', 'skt-charity'),			
		'desc' => __('Select font color for slider button', 'skt-charity'),
		'id' => 'slidebtntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(		
		'desc' => __('Select Background color for slider button ', 'skt-charity'),
		'id' => 'slidebtnbgcolor',
		'std' => '#f25f43',
		'type' => 'color');		
			
	// Slider controls colors		
	$options[] = array(
		'name' => __('Slider controls Colors', 'skt-charity'),
		'desc' => __('Select background color for slider navigation', 'skt-charity'),
		'id' => 'sldnavbg',
		'std' => '#1a1b1f',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select background color for slider navigation hover', 'skt-charity'),
		'id' => 'sldnavhvbg',
		'std' => '#f25f43',
		'type' => 'color');
	
	$options[] = array(	
		'desc' => __('Select background color for slider pager', 'skt-charity'),
		'id' => 'sldpagebg',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for slider pager active', 'skt-charity'),
		'id' => 'sldpagehvbg',
		'std' => '#f25f43',
		'type' => 'color');	
		
	$options[] = array(
		'name' => __('Woocommerce Page Layout', 'skt-charity'),
		'desc' => __('Select layout. eg:right-sidebar, left-sidebar, full-width', 'skt-charity'),
		'id' => 'woocommercelayout',
		'type' => 'select',
		'std' => 'woocommercesitefull',
		'options' => array('woocommerceright'=>'Woocommerce Right Sidebar', 'woocommerceleft'=>'Woocommerce Left Sidebar', 'woocommercesitefull'=>'Woocommerce Full Width') );		
		
	$options[] = array(
		'name' => __('Blog Single Layout', 'skt-charity'),
		'desc' => __('Select layout. eg:left sidebar, right sidebar, full width,no sidebar', 'skt-charity'),
		'id' => 'singlelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Blog Single Right Sidebar', 'singleleft'=>'Blog Single Left Sidebar', 'sitefull'=>'Blog Single Full Width', 'nosidebar'=>'Blog Single No Sidebar') );	
		
	$options[] = array(
		'name' => __('Excerpt Length Manageable', 'skt-charity'),
		'desc' => __('manage custom excerpt length for donated member boxes', 'skt-charity'),
		'id' => 'donerbxexcerptlength',
		'std' => '10',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('manage custom excerpt length for home page latest news', 'skt-charity'),
		'id' => 'hmlatestnewsexcerptlength',
		'std' => '25',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Select excerpt length for blog posts', 'skt-charity'),
		'id' => 'blogexcerptlength',
		'std' => '50',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Select custom excerpt length for testimonials', 'skt-charity'),
		'id' => 'testimonialsexcerptlength',
		'std' => '60',
		'type' => 'text');	
		
	$options[] = array(	
		'name' => __('Read More Text Button', 'skt-charity'),		
		'desc' => __('Change your read more button text for blog templates', 'skt-charity'),
		'id' => 'blogreadmoretext',
		'std' => 'Read More >',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Responsive View Menu Text changeable', 'skt-charity'),
		'desc' => __('Change menu text on responsive view', 'skt-charity'),
		'id' => 'menuwordchange',
		'std' => 'Menu',
		'type' => 'text');				

	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'skt-charity'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Services Four Boxes For Section','skt-charity'),
		'desc'	=> __('Services box 1','skt-charity'),
		'id' 	=> 'box1',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image  for first box.', 'skt-charity'),
		'id' => 'boximg1',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Services box 2','skt-charity'),
		'id' 	=> 'box2',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image  for second box.', 'skt-charity'),
		'id' => 'boximg2',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Services box 3','skt-charity'),
		'id' 	=> 'box3',
		'type'	=> 'select',
		'options' => $options_pages,
	);	
	
	$options[] = array(		
		'desc' => __('upload image  for third box.', 'skt-charity'),
		'id' => 'boximg3',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Services box 4','skt-charity'),
		'id' 	=> 'box4',
		'type'	=> 'select',
		'options' => $options_pages,
	);	
	
	$options[] = array(		
		'desc' => __('upload image  for fourth box.', 'skt-charity'),
		'id' => 'boximg4',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');	
	
	$options[] = array(	
		'desc'	=> __('Fifth Services box for frontpage section','skt-charity'),
		'id' 	=> 'box5',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image  for fifth box.', 'skt-charity'),
		'id' => 'boximg5',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Six Services box for frontpage section','skt-charity'),
		'id' 	=> 'box6',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image  for six box.', 'skt-charity'),
		'id' => 'boximg6',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');		
	
	$options[] = array(
		'desc' => __('Donate Now Button Text for Pages', 'skt-charity'),
		'id' => 'donatebutton',
		'std' => 'Donate Now!',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('enter here your custom excerpt length for help donation four boxes', 'skt-charity'),
		'id' => 'donatebxexcerptlength',
		'std' => '10',
		'type' => 'text');	
		
	
	$options[] = array(			
			'desc'	=> __('Check to hide our donation services four column section', 'skt-charity'),
			'id'	=> 'hidefourbxsec',
			'type'	=> 'checkbox',
			'std'	=> '');

	$options[] = array(
		'name' => __('Number of Sections', 'skt-charity'),
		'desc' => __('Select number of sections', 'skt-charity'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '5',
		'options' => array_combine(range(1,30), range(1,30)) );

	$numsecs = of_get_option( 'numsection', 5 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section ".$n."</h3>", 'skt-charity'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'skt-charity'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section ID', 'skt-charity'),
			'desc'	=> __('Enter your section ID here. SECTION ID MUST BE IN SMALL LETTERS ONLY AND DO NOT ADD SPACE OR SYMBOL.'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Background Color', 'skt-charity'),
			'desc' => __('Select background color for section', 'skt-charity'),
			'id' => 'sectionbgcolor'.$n,
			'std' => ( ( isset($section_text[$n]['bgcolor']) ) ? $section_text[$n]['bgcolor'] : '' ),
			'type' => 'color');
			
		$options[] = array(
			'name' => __('Background Image', 'skt-charity'),
			'id' => 'sectionbgimage'.$n,
			'class' => '',
			'std' => ( ( isset($section_text[$n]['bgimage']) ) ? $section_text[$n]['bgimage'] : '' ),
			'type' => 'upload');

		$options[] = array(
			'name' => __('Section CSS Class', 'skt-charity'),
			'desc' => __('Set class for this section.', 'skt-charity'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name'	=> __('Hide Section', 'skt-charity'),
			'desc'	=> __('Check to hide this section', 'skt-charity'),
			'id'	=> 'hidesec'.$n,
			'type'	=> 'checkbox',
			'std'	=> '');

		$options[] = array(
			'name' => __('Section Content', 'skt-charity'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}

	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'skt-charity'),
		'type' => 'heading');
		
		
	$options[] = array(
		'name' => __('Inner Page Banner', 'skt-charity'),
		'desc' => __('Upload inner page banner for site', 'skt-charity'),
		'id' => 'innerpagebanner',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/default-banner.jpg",
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Slider Effects and Timing', 'skt-charity'),
		'desc' => __('Select slider effect.','skt-charity'),
		'id' => 'slideefect',
		'std' => 'random',
		'type' => 'select',
		'options' => array('random'=>'Random', 'fade'=>'Fade', 'fold'=>'Fold', 'sliceDown'=>'Slide Down', 'sliceDownLeft'=>'Slide Down Left', 'sliceUp'=>'Slice Up', 'sliceUpLeft'=>'Slice Up Left', 'sliceUpDown'=>'Slice Up Down', 'sliceUpDownLeft'=>'Slice Up Down Left', 'slideInRight'=>'SlideIn Right', 'slideInLeft'=>'SlideIn Left', 'boxRandom'=>'Box Random', 'boxRain'=>'Box Rain', 'boxRainReverse'=>'Box Rain Reverse', 'boxRainGrow'=>'Box Rain Grow', 'boxRainGrowReverse'=>'Box Rain Grow Reverse' ));
		
	$options[] = array(
		'desc' => __('Animation speed should be multiple of 100.', 'skt-charity'),
		'id' => 'slideanim',
		'std' => 500,
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add slide pause time.', 'skt-charity'),
		'id' => 'slidepause',
		'std' => 4000,
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide Controllers', 'skt-charity'),
		'desc' => __('Hide/Show Direction Naviagtion of slider.','skt-charity'),
		'id' => 'slidenav',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Hide/Show pager of slider.','skt-charity'),
		'id' => 'slidepage',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Pause Slide on Hover.','skt-charity'),
		'id' => 'slidepausehover',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Yes', 'false'=>'No'));
		
		
	$options[] = array(
		'name' => __('Use any slider shortcode', 'skt-charity'),
		'desc' => __('you add any slider pluging shortcode here', 'skt-charity'),
		'id' => 'slidershortcode',
		'std' => '',
		'type' => 'textarea');
		
		
	$options[] = array(
		'name' => __('Slider Image 1', 'skt-charity'),
		'desc' => __('First Slide', 'skt-charity'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 1', 'skt-charity'),
		'id' => 'slidetitle1',
		'std' => '<strong>WE NEED YOUR SUPPORT TO</strong> ACCOMMODATE, FEED AND EDUCATE.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc1',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo...',
		'type' => 'textarea');

	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton1',
		'std' => 'DONATE NOW!',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl1',
		'std' => '#',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'skt-charity'),
		'desc' => __('Second Slide', 'skt-charity'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 2', 'skt-charity'),
		'id' => 'slidetitle2',
		'std' => '<strong>WE NEED YOUR SUPPORT TO</strong> ACCOMMODATE, FEED AND EDUCATE.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc2',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo...',
		'type' => 'textarea');

	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton2',
		'std' => 'DONATE NOW!',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl2',
		'std' => '#',
		'type' => 'text');			
	
	$options[] = array(
		'name' => __('Slider Image 3', 'skt-charity'),
		'desc' => __('Third Slide', 'skt-charity'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 3', 'skt-charity'),
		'id' => 'slidetitle3',
		'std' => '<strong>WE NEED YOUR SUPPORT TO</strong> ACCOMMODATE, FEED AND EDUCATE.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc3',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo...',
		'type' => 'textarea');	
	
	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton3',
		'std' => 'DONATE NOW!',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl3',
		'std' => '#',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 4', 'skt-charity'),
		'desc' => __('Fourth Slide', 'skt-charity'),
		'id' => 'slide4',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider4.jpg",
		'type' => 'upload');
		
$options[] = array(
		'desc' => __('Title 4', 'skt-charity'),
		'id' => 'slidetitle4',
		'std' => '<strong>WE NEED YOUR SUPPORT TO</strong> ACCOMMODATE, FEED AND EDUCATE.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc4',
		'std' => 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo...',
		'type' => 'textarea');

	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton4',
		'std' => 'DONATE NOW!',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl4',
		'std' => '#',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 5', 'skt-charity'),
		'desc' => __('Fifth Slide', 'skt-charity'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 5', 'skt-charity'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');	
		
	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton5',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 6', 'skt-charity'),
		'desc' => __('Sixth Slide', 'skt-charity'),
		'id' => 'slide6',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 6', 'skt-charity'),
		'id' => 'slidetitle6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton6',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl6',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 7', 'skt-charity'),
		'desc' => __('Seventh Slide', 'skt-charity'),
		'id' => 'slide7',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 7', 'skt-charity'),
		'id' => 'slidetitle7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc7',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton7',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl7',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 8', 'skt-charity'),
		'desc' => __('Eighth Slide', 'skt-charity'),
		'id' => 'slide8',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 8', 'skt-charity'),
		'id' => 'slidetitle8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton8',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl8',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 9', 'skt-charity'),
		'desc' => __('Ninth Slide', 'skt-charity'),
		'id' => 'slide9',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 9', 'skt-charity'),
		'id' => 'slidetitle9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton9',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl9',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 10', 'skt-charity'),
		'desc' => __('Tenth Slide', 'skt-charity'),
		'id' => 'slide10',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 10', 'skt-charity'),
		'id' => 'slidetitle10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-charity'),
		'id' => 'slidedesc10',
		'std' => '',
		'type' => 'textarea');
	
	$options[] = array(
		'desc' => __('Slide Button Text', 'skt-charity'),
		'id' => 'slidebutton10',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Button Url', 'skt-charity'),
		'id' => 'slideurl10',
		'std' => '',
		'type' => 'text');	

	//Footer SETTINGS
	$options[] = array(
		'name' => __('Header And Footer', 'skt-charity'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header Right links', 'skt-charity'),
		'desc' => __('Header right link Donate and Become a Volunteer', 'skt-charity'),
		'id' => 'headerrightlink',
		'std' => '<span class="donateuser"><i class="fa  fa-heart-o fa-lg"></i><a href="">Donate</a></span>
                  <span class="donateuser"><i class="fa  fa-user fa-lg"></i><a href="">Become a Volunteer</a></span>',
		'type' => 'textarea');


	$options[] = array(
		'name' => __('Footer Layout', 'skt-charity'),
		'desc' => __('footer Select layout. eg:Boxed, 1, 2, 3 and 4', 'skt-charity'),
		'id' => 'footerlayout',
		'type' => 'select',
		'std' => 'threecolumn',
		'options' => array('onecolumn'=>'Footer 1 column', 
		'twocolumn'=>'Footer 2 column', 'threecolumn'=>'Footer 3 column', 'fourcolumn'=>'Footer 4 column', ) );	
		
/*	$options[] = array(
		'name' => __('Footer Customer Services', 'skt-charity'),
		'desc' => __('customer services text title for footer', 'skt-charity'),
		'id' => 'aboutustitle',
		'std' => 'customer services',
		'type' => 'text');

	$options[] = array(
		'name' => __('Footer Nav Menu Quick link single column', 'skt-charity'),
		'desc' => __('Quick link text title for footer', 'skt-charity'),
		'id' => 'navmenutitle',
		'std' => 'Quick link',
		'type' => 'text');
*/
		
	$options[] = array(
		'name' => __('Footer Title', 'skt-charity'),
		'desc' => __('Footer Title 1.', 'skt-charity'),
		'id' => 'footertitle1',
		'std' => 'Charity',
		'type' => 'text');	

	$options[] = array(
		'desc' => __('Footer Title 2.', 'skt-charity'),
		'id' => 'footertitle2',
		'std' => 'Recent Posts',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Footer Title 3.', 'skt-charity'),
		'id' => 'footertitle3',
		'std' => 'Newsletter Signup',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Footer Title 4.', 'skt-charity'),
		'id' => 'footertitle4',
		'std' => 'Quick Link',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Footer Address Title', 'skt-charity'),
		'desc' => __('Add contact title here', 'skt-charity'),
		'id' => 'contacttitle',
		'std' => 'CHARITY',
		'type' => 'text');	

	$options[] = array(	
		'desc' => __('Add company address1 here.', 'skt-charity'),
		'id' => 'address',
		'std' => 'Street 238,52 tempor Donec ultricies mattis nulla',
		'type' => 'text');
		
	$options[] = array(	
		'desc' => __('Add company address2 here.', 'skt-charity'),
		'id' => 'address2',
		'std' => 'id porttitor. Vestibulum ante ipsum primis',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Add phone number here.', 'skt-charity'),
		'id' => 'phone',
		'std' => '233 456 7895',
		'type' => 'text');
 
	$options[] = array(
		'desc' => __('Add email address here.', 'skt-charity'),
		'id' => 'email',
		'std' => 'demo@companyname.com',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add company url here with http://.', 'skt-charity'),
		'id' => 'weblink',
		'std' => 'http://sktthemes.net',
		'type' => 'text');

	$options[] = array(
		'desc' => __('add social icon name and link in the shortcodes.  NOTE: Icon name should be in lowercase without space.(exa.phone) More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/', 'skt-charity'),
		'id' => 'footersocialicons',
		'std' => '<h6>Follow Us</h6>[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
    [social icon="google-plus" link="#"]
	[social icon="youtube" link="#"]	
	[social icon="instagram" link="#"]	
[/social_area]',
		'type' => 'textarea');		
		
		$options[] = array(
		'name' => __('Google Map', 'skt-charity'),
		'desc' => __('Use iframe code url here. DO NOT APPLY IFRAME TAG', 'skt-charity'),
		'id' => 'googlemap',
		'std' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d336003.6066860609!2d2.349634820486094!3d48.8576730786213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x040b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1433482358672',
		'type' => 'textarea');
			
	$options[] = array(
		'name' => __('Footer Copyright', 'skt-charity'),
		'desc' => __('Copyright Text for your site.', 'skt-charity'),
		'id' => 'copytext',
		'std' => '&copy; Copyright <a href="#">Charity Theme</a> 2016 All Rights Reserved',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Footre Text Link', 'skt-charity'),
		'id' => 'ftlink',
		'std' => 'Design by <a href="'.esc_url('http://www.sktthemes.net/').'" target="_blank" rel="nofollow">SKT Themes</a>',
		'type' => 'textarea',);

	//Short codes
	$options[] = array(
		'name' => __('Short Codes', 'skt-charity'),
		'type' => 'heading');	
	
	$options[] = array(
		'name' => __('Photo Gallery', 'skt-charity'),
		'desc' => __('[photogallery filter="true"]', 'skt-charity'),
		'type' => 'info');			
			
		
	$options[] = array(
		'name' => __('Testimonials', 'skt-charity'),
		'desc' => __('[testimonials]', 'skt-charity'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Testimonials Listing', 'skt-charity'),
		'desc' => __('[testimonials-lists show="10"]', 'skt-charity'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Contact Form', 'skt-charity'),
		'desc' => __('[contactform to_email="test@example.com" title="Contact Form"] 
', 'skt-charity'),
		'type' => 'info');		
		
	$options[] = array(
		'name' => __('Latest News', 'skt-charity'),
		'desc' => __('[latestposts show="2"]', 'skt-charity'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Footer posts', 'skt-charity'),
		'desc' => __('[footer-posts show="2"]', 'skt-charity'),
		'type' => 'info');	
				
	$options[] = array(
		'name' => __('Our Donator', 'skt-charity'),
		'desc' => __('[ourdonators show="4"]', 'skt-charity'),
		'type' => 'info');					

	$options[] = array(
		'name' => __('Search Form', 'skt-charity'),
		'desc' => __('[searchform] 
', 'skt-charity'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Headings', 'skt-charity'),
		'desc' => __('[heading underline="yes" align="left"]Our Donators[/heading]', 'skt-charity'),
		'type' => 'info');					

	$options[] = array(
		'name' => __('Read More Button', 'skt-charity'),
		'desc' => __('[readmore-link align="left" bgcolor="#f25f43" color="#ffffff" button="Read More" links="#"]', 'skt-charity'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Event List', 'skt-charity'),
		'desc' => __('[oureventdate eventdate="18" eventmonth="MAR" eventyear="" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#"][oureventdate eventdate="18" eventmonth="MAR" eventyear="2016" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#" class="last"][oureventdate eventdate="18" eventmonth="MAR" eventyear="2016" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#"][oureventdate eventdate="18" eventmonth="MAR" eventyear="" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#" class="last"][oureventdate eventdate="18" eventmonth="MAR" eventyear="" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#"][oureventdate eventdate="18" eventmonth="MAR" eventyear="2016" eventtitle="Praesent aliquamar cut sapien." eventtiming="July 31 / 10:00 am - 6:00 pm" eventlocation="Washington DC United States" link="#" class="last"]', 'skt-charity'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Social Icons ( Note: More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/)', 'skt-charity'),
		'desc' => __('[social_area][social icon="facebook" link="#"][social icon="twitter" link="#"][social icon="linkedin" link="#"]
		[social icon="pinterest" link="#"][social icon="google-plus" link="#"][social icon="youtube" link="#"]
	[social icon="wordpress" link="#"][social icon="flickr" link="#"][social icon="skype" link="#"][/social_area]', 'skt-charity'),
		'type' => 'info');

	// Support					
	$options[] = array(
		'name' => __('Our Themes', 'skt-charity'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('SKT Charity WordPress theme has been Designed and Created by <a href="'.esc_url('http://sktthemes.net/').'" target="_blank">SKT Themes</a>', 'skt-charity'),
		'type' => 'info');	

	 $options[] = array(
		'desc' => __('<a href="'.esc_url('http://sktthemes.net/').'" target="_blank"><img src="'.get_template_directory_uri().'/images/sktskill.jpg"></a>', 'skt-charity'),
		'type' => 'info');	
	return $options;
}