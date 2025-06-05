// resources/js/data/destinations.js

const destinations = [
    {
        id: 1,
        slug: 'Pantai-Sendiki',
        image: '/assets/img/destination/sendiki.jpeg',
        location: 'Malang',
        rating: '4.4',
        title: 'Pantai Sendiki',
        price: '120000',
        description:
            'Pantai Sendiki di Malang Selatan menawarkan pasir putih lembut dan pemandangan laut biru yang memukau. Dikelilingi tebing karst dan vegetasi hijau, pantai ini cocok untuk relaksasi dan fotografi. Ombaknya yang tenang ideal untuk berenang dan aktivitas keluarga.',

        fullDescription: `Pantai Sendiki terletak di Desa Sendiki, Kecamatan Donomulyo, Kabupaten Malang. Pantai ini terkenal dengan pasir putihnya yang bersih dan air laut yang jernih kebiruan. Keunikan Pantai Sendiki terletak pada formasi tebing karst yang mengelilingi pantai, menciptakan panorama alam dramatis yang memanjakan mata. Vegetasi hijau di sekitar pantai menambah kesan alami dan asri.

Pengunjung dapat menikmati berbagai aktivitas seperti berenang di zona aman, berjemur di pasir putih, atau menjelajah tebing karst. Saat air surut, terumbu karang tepian pantai menjadi spot menarik untuk snorkeling. Fasilitas pendukung seperti gazebo dan warung seafood segar tersedia di area pantai. Sunset di Pantai Sendiki menjadi momen magis dengan siluet perahu nelayan dan gradasi warna langit jingga keemasan.`,

        address: 'wilayah Tambakrejo, Sumbermanjing Wetan, Malang, Jawa Timur',
        categories: ['Wisata Bahari', 'Pantai', 'Spot Fotografi'],
        facilities: [
            'Area Parkir Luas',
            'Toilet Umum',
            'Warung Makan Seafood',
            'Gazebo',
            'Penyewaan Pelampung',
            'Area Camping',
        ],
        coordinates: [-8.4168124, 112.7053386],
        nearbyLodging: [
            'Villa Karst Sendiki',
            'Homestay Lestari Sendiki',
            'Resort Pantai Timur Malang',
        ],
        nearbyFood: [
            'Warung Seafood Bu Rini',
            'Depot Ikan Bakar Sendiki',
            'Cafe Pantai Karst View',
        ],
        nearbySouvenirs: [
            'Pasar Kerajinan Donomulyo',
            'Toko Oleh-oleh Khas Pantai Sendiki',
            'Sentra Kerang Hias Malang Selatan',
        ],
    },
    {
        id: 2,
        slug: 'ujung-kulon',
        image: '/assets/img/destination/Taman-Nasional-Ujung-Kulon.jpg',
        location: 'Banten',
        rating: '4.7',
        title: 'Taman Nasional Ujung Kulon',
        price: '150000',
        description: `Taman Nasional Ujung Kulon merupakan taman nasional tertua di Indonesia yang ditetapkan sebagai Situs Warisan Dunia UNESCO. Terletak di ujung barat daya Pulau Jawa, taman nasional ini menjadi habitat terakhir badak bercula satu (Rhinoceros sondaicus) yang sangat langka.
        
        Kawasan ini memiliki keanekaragaman hayati yang luar biasa dengan hutan hujan tropis, pantai, dan ekosistem laut yang masih sangat alami. Selain badak Jawa, terdapat berbagai satwa langka lainnya seperti banteng, rusa, lutung, dan berbagai jenis burung endemik.`,
        fullDescription: `Taman Nasional Ujung Kulon menawarkan pengalaman petualangan yang tak terlupakan. Pengunjung dapat melakukan berbagai aktivitas seperti trekking, bird watching, snorkeling, dan camping. Pulau Peucang dan Pulau Handeleum adalah destinasi favorit untuk aktivitas wisata bahari dengan pantai berpasir putih dan air laut yang jernih.
        
        Untuk mencapai kawasan ini, pengunjung harus melalui perjalanan yang cukup menantang. Dari Jakarta, perjalanan dilanjutkan ke Labuan kemudian menggunakan kapal menuju kawasan taman nasional. Fasilitas akomodasi tersedia di beberapa pulau dengan pilihan homestay atau camping ground.`,
        address:
            'Taman Nasional Ujung Kulon, Kec. Sumur, Kab. Pandeglang, Banten',
        categories: ['Wisata Alam', 'Taman Nasional', 'Pantai'],
        facilities: [
            'Pusat Informasi',
            'Camping Ground',
            'Homestay',
            'Penyewaan Perahu',
        ],
        coordinates: [-6.760833, 105.367222],
        nearbyLodging: [
            'Peucang Island Lodge',
            'Handeleum Island Camp',
            'Labuan Homestay',
        ],
        nearbyFood: [
            'Warung Nelayan Labuan',
            'Seafood Pantai Carita',
            'Rumah Makan Sunda Labuan',
        ],
        nearbySouvenirs: [
            'Kerajinan Baduy Labuan',
            'Souvenir Ujung Kulon',
            'Produk Laut Kering Labuan',
        ],
    },
    {
        id: 3,
        slug: 'kebun-raya-bogor',
        image: '/assets/img/destination/kebun-raya-bogor.jpeg',
        location: 'Bogor',
        rating: '4.7',
        title: 'Kebun Raya Bogor',
        price: '30000',
        description: `Kebun Raya Bogor adalah kebun botani tertua di Indonesia yang didirikan pada tahun 1817. Dengan luas 87 hektar, kebun ini menyimpan koleksi lebih dari 15.000 jenis tumbuhan dari seluruh dunia. Lokasi yang strategis di pusat kota Bogor membuatnya mudah diakses oleh wisatawan.
        
        Kebun ini tidak hanya berfungsi sebagai tempat konservasi dan penelitian, tetapi juga sebagai tempat rekreasi dan edukasi. Udara yang sejuk dan pemandangan hijau yang asri menjadikannya tempat yang sempurna untuk berlibur bersama keluarga.`,
        fullDescription: `Kebun Raya Bogor memiliki berbagai zona tematik yang menarik untuk dijelajahi. Terdapat Taman Meksiko dengan koleksi kaktus, Taman Obat dengan tanaman herbal, dan Danau Gunting yang menjadi ikon kebun raya. Pengunjung dapat berkeliling menggunakan kereta wisata atau berjalan kaki menyusuri jalur-jalur yang telah disediakan.
        
        Fasilitas yang tersedia sangat lengkap, mulai dari museum zoologi, perpustakaan, hingga area piknik. Kebun Raya Bogor juga sering menjadi lokasi pre-wedding dan berbagai acara outdoor lainnya. Waktu kunjungan terbaik adalah pagi atau sore hari untuk menghindari terik matahari.`,
        address:
            'Jl. Ir. H. Juanda No.13, Paledang, Kec. Bogor Tengah, Kota Bogor, Jawa Barat',
        categories: ['Wisata Edukasi', 'Kebun Raya', 'Taman'],
        facilities: [
            'Toilet',
            'Mushola',
            'Kereta Wisata',
            'Museum',
            'Area Piknik',
        ],
        coordinates: [-6.597222, 106.799722],
        nearbyLodging: [
            'Hotel Salak The Heritage',
            'Aston Bogor Hotel',
            'Guest House IPB',
        ],
        nearbyFood: [
            'Asinan Betawi Pak Kumis',
            'Soto Bogor Pak Man',
            'Tahu Gejrot Raos',
        ],
        nearbySouvenirs: ['Keripik Bogor', 'Dodol Garut', 'Talas Bogor'],
    },
    {
        id: 4,
        slug: 'gunung-bromo',
        image: '/assets/img/destination/bromo.jpg',
        location: 'Malang',
        rating: '4.8',
        title: 'Gunung Bromo',
        price: '200000',
        description: `Gunung Bromo adalah salah satu gunung berapi aktif yang paling terkenal di Indonesia. Terletak dalam kawasan Taman Nasional Bromo Tengger Semeru, gunung ini menawarkan pemandangan sunrise yang spektakuler dan landscape yang sangat unik dengan lautan pasir yang luas.
        
        Keindahan Gunung Bromo tidak hanya terletak pada puncaknya, tetapi juga pada kawasan di sekitarnya yang memiliki keunikan geologis dan budaya. Masyarakat Tengger yang tinggal di sekitar gunung masih mempertahankan tradisi dan budaya yang kental.`,
        fullDescription: `Untuk mencapai puncak Bromo, pengunjung dapat memilih beberapa rute pendakian. Rute paling populer adalah melalui Cemoro Lawang dengan menggunakan jeep 4WD menuju Lautan Pasir, kemudian dilanjutkan dengan trekking ringan ke puncak kawah. Sunrise di Penanjakan adalah momen yang paling ditunggu-tunggu pengunjung.
        
        Aktivitas lain yang dapat dilakukan adalah berkuda di Lautan Pasir, mengunjungi Pura Luhur Poten, dan menjelajahi desa-desa tradisional Tengger. Akomodasi tersedia mulai dari homestay hingga hotel berbintang. Waktu terbaik berkunjung adalah musim kemarau (April-Oktober) untuk cuaca yang cerah.`,
        address: 'Podokoyo, Kec. Tosari, Kab. Pasuruan, Jawa Timur',
        categories: ['Wisata Alam', 'Gunung', 'Sunrise'],
        facilities: [
            'Area Parkir',
            'Homestay',
            'Warung Makan',
            'Penyewaan Jeep',
            'Penyewaan Kuda',
        ],
        coordinates: [-7.942494, 112.953011],
        nearbyLodging: [
            'Hotel Bromo Permai',
            'Jiwa Jawa Resort Bromo',
            'Homestay Cemoro Lawang',
        ],
        nearbyFood: [
            'Warung Tengger Asri',
            'Rumah Makan Bromo Permai',
            'Kedai Kopi Lawang',
        ],
        nearbySouvenirs: [
            'Kerajinan Tengger',
            'Kopi Gunung Bromo',
            'Pakaian Adat Tengger',
        ],
    },
];

export const getDestinationBySlug = (slug) => {
    return destinations.find((dest) => dest.slug === slug);
};

export const getDestinationById = (id) => {
    return destinations.find((dest) => dest.id === parseInt(id));
};

// Export default untuk memudahkan import
export default destinations;

// Named exports tetap tersedia
export { destinations };
