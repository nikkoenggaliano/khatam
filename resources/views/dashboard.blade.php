@extends('template.template')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="columns is-centered" style="display: none">
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
                <i class="fa-solid fa-calendar-days"></i>
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
                            <p class="title has-text-centered mt-5">{{ $hari_ini }}</p>
                        </div>
                    </div>
                    <p class="card-footer has-text-centered"
                        style="background-color: {{ $hari_ini >= 10 ? '#31b776' : '#e7ebef' }}">Target harian
                        {{ $hari_ini }}/10</p>
                </div>
            </div>
            <div class="column is-4">
                <div class="card depan">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Total Ayat yang sudah dibaca</p>
                        </header>
                        <div class="content">
                            <p class="title has-text-centered mt-5">{{ $semua_dibaca }}/6236</p>
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
                            <p class="title has-text-centered mt-5">{{ 6236 - $semua_dibaca }}/6236</p>
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
                            <p class="card-header-title has-text-centered">Hadits Harian ({{ $hadits[0]->bab }})</p>
                        </header>
                        <p class="mt-3 has-text-right arab">
                            {{ $hadits[0]->arab }}

                        </p>
                        <p class="mt-2 has-text-left">
                            {{ $hadits[0]->arti }}
                        </p>
                    </div>
                    <p class="card-footer has-text-centered" style="background-color: #e7ebef">Perawi
                        : {{ $hadits[0]->rawi }} || No Hadits: {{ $hadits[0]->no }}
                    </p>
                </div>
            </div>
            <div class="column is-6">
                <div class="card">
                    <div class="card-content">
                        <header class="card-header">
                            <p class="card-header-title has-text-centered">Ayat Harian
                                ( {{ $quran[0]->nama_surah }}[{{ $quran[0]->surat_id }}])({{ $quran[0]->ayat_id }}
                                )
                            </p>
                        </header>
                        <p class="mt-3 has-text-right arab">
                            {{ $quran[0]->arab }}
                        </p>
                        <p class="mt-2 has-text-left">
                            {{ $quran[0]->bacaan }}
                        </p>
                        <p class="mt-2 has-text-left">
                            {{ $quran[0]->arti }}
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
