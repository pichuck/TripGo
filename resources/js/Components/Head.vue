<template>
    <head>
        <!-- ========== Meta Tags ========== -->

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="author" content="pixel-drop" />

        <meta
            name="description"
            content="TripGo adalah mesin saran perjalanan yang didukung oleh kecerdasan buatan yang membantu Anda menemukan tempat-tempat terbaik untuk dikunjungi di Indonesia khususnya Pulau Jawa. TripGo memberikan rekomendasi perjalanan yang disesuaikan berdasarkan minat unik Anda dengan memanfaatkan algoritma canggih dan data real-time. TripGo menawarkan panduan menyeluruh untuk membantu Anda mengatur perjalanan yang sempurna, terlepas dari preferensi Anda untuk atraksi terbaik, transit yang nyaman, penginapan yang sesuai, atau cuaca yang bagus. Platform mutakhir ini menjamin pengalaman perjalanan yang sempurna dengan menyelesaikan masalah perjalanan yang umum terjadi secara efektif dan memberikan solusi yang berguna dan dapat diandalkan untuk membuat setiap perjalanan menjadi luar biasa."
        />

        <!-- ======== Page title ============ -->

        <title>{{ pageTitle }}</title>

        <!--<< Favcion >>-->
        <!-- <link rel="shortcut icon" href="assets/img/favicon.svg" /> -->
        <!--<< Bootstrap min.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" /> -->
        <!--<< All Min Css >>-->
        <!-- <link rel="stylesheet" href="assets/css/all.min.css" /> -->
        <!--<< Animate.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/animate.css" /> -->
        <!--<< Magnific Popup.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/magnific-popup.css" /> -->
        <!--<< MeanMenu.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/meanmenu.css" /> -->
        <!--<< Swiper Bundle.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" /> -->
        <!--<< Datepickerboot.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/datepickerboot.css" /> -->
        <!--<< Nice Select.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/nice-select.css" /> -->
        <!--<< Color.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/color.css" /> -->
        <!--<< Main.css >>-->
        <!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
    </head>
</template>

<script>
export default {
    name: 'HeadComponent',
    props: {
        pageTitle: {
            type: String,
            default: 'Default Page Title',
        },
    },
};
</script>
