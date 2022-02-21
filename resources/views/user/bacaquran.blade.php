@extends('template.template')
<style>
    .ayat {
        font-family: 'Noto Sans Arabic';
        font-size: 30px;
    }

    .no-ayat span {
        padding: 10px;
        background: #000000;
        color: #ffffff;
    }

    #bacaan {
        font-size: 20px;
    }

    #arti {
        font-size: 22px;
    }

    #nama-surat {
        display: block;
    }
</style>
@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-12">
            <div class="card">
                <div class="card-content">
                    <header class="card-haeder">
                        <p class="card-header-title has-text-centered" id="nama-surat">Surat Yasin</p>
                    </header>
                    <div class="content">
                        <div class="no-ayat">
                            <span>40</span>
                        </div>
                        <p class="mt-4 ayat has-text-right" id="ayat">لَا الشَّمْسُ يَنْۢبَغِيْ لَهَآ اَنْ تُدْرِكَ الْقَمَرَ وَلَا الَّيْلُ سَابِقُ النَّهَارِ ۗوَكُلٌّ فِيْ فَلَكٍ يَّسْبَحُوْنَ</p>
                        <p class="mt-2 ayat has-text-left" id="bacaan">lasy-syamsu yambagī lahā an tudrikal-qamara wa lal-lailu sābiqun-nahār, wa kullun fī falakiy yasbaḥụn</p>
                        <p class="mt-2 ayat has-text-left" id="arti">Tidaklah mungkin bagi matahari mengejar bulan dan malam pun tidak dapat mendahului siang. Masing-masing beredar pada garis edarnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column has-text-centered">
            <button class="button is-info">Selanjutnya</button>
        </div>
    </div>
</div>
@endsection