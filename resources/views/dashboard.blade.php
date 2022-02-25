@extends('template.template')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-four-fifths">
                <div class="notification" id="alert-notify">
                    <button class="delete"></button>
                    Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut,
                    porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum
                    <a>felis venenatis</a> efficitur.
                </div>
            </div>
        </div>
        <div class="target-khatam has-text-right">
            <p>
                Target khatam: 29 Juli 2022
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-calendar">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
            </p>
        </div>

        <div class="columns">
            <div class="column is-4">
                <div class="card depan">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Jumlah Ayat yang dibaca hari ini</p>
                        </header>
                        <div class="content">
                            <p class="title has-text-centered mt-5">10</p>
                        </div>
                    </div>
                    <p class="card-footer has-text-centered" style="background-color: #e7ebef;">Target harian 10/10</p>
                </div>
            </div>
            <div class="column is-4">
                <div class="card depan">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Total Ayat yang sudah dibaca</p>
                        </header>
                        <div class="content">
                            <p class="title has-text-centered mt-5">6.236</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card depan">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Sisa Ayat yang belum</p>
                        </header>
                        <div class="content">
                            <p class="title has-text-centered mt-5">6.236</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="card">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Hadits Harian</p>
                        </header>
                        <p class="mt-2">
                            حَدَّثَنَا هِشَامُ بْنُ عَمَّارٍ حَدَّثَنَا يَحْيَى بْنُ حَمْزَةَ حَدَّثَنِي ثَوْرُ بْنُ يَزِيدَ
                            عَنْ خَالِدِ بْنِ مَعْدَانَ عَنْ رَبِيعَةَ بْنِ الْغَازِ أَنَّهُ سَأَلَ عَائِشَةَ عَنْ صِيَامِ
                            رَسُولِ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فَقَالَتْ كَانَ يَتَحَرَّى صِيَامَ
                            الِاثْنَيْنِ وَالْخَمِيسِ

                        </p>
                        <p class="mt-2">
                            Telah menceritakan kepada kami Hisyam bin Ammar berkata, telah menceritakan kepada kami Yahya
                            bin Hamzah berkata, telah menceritakan kepadaku Tsaur bin Yazid dari Khalid bin Ma'dan dari
                            Rabi'ah bin Al Ghaz Bahwasanya ia bertanya kepada Aisyah tentang puasanya Rasulullah shallallahu
                            'alaihi wasallam. Maka Aisyah pun menjawab, "Beliau selalu puasa senin dan kamis. "
                        </p>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="card">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Ayat Harian (Surah Yasin[36])(40)</p>
                        </header>
                        <p class="mt-2">
                            لَا الشَّمْسُ يَنْۢبَغِيْ لَهَآ اَنْ تُدْرِكَ الْقَمَرَ وَلَا الَّيْلُ سَابِقُ النَّهَارِ
                            ۗوَكُلٌّ فِيْ فَلَكٍ يَّسْبَحُوْنَ
                        </p>
                        <p class="mt-2">
                            lasy-syamsu yambagī lahā an tudrikal-qamara wa lal-lailu sābiqun-nahār, wa kullun fī falakiy
                            yasbaḥụn
                        </p>
                        <p class="mt-2">
                            Tidaklah mungkin bagi matahari mengejar bulan dan malam pun tidak dapat mendahului siang.
                            Masing-masing beredar pada garis edarnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column has-text-centered">
                <a class="button is-info mb-3" href="{{ route('bacaquran') }}">Baca Qur'an</a>
            </div>
        </div>
    </div>

@endsection
