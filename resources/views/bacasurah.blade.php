@extends('template.template')
@section('title', 'Baca Surah Al Maidah')


@section('content')
    <style>
        .ayat {
            font-family: 'litelpmq';
            font-size: 30px;
            line-height: 2.2;
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

        .bold {
            font-weight: bold;
        }

    </style>

    <section class="section">
        <div class="content">
            <div class="has-text-centered">
                <h1>{{ $data[0]->nama_surah }} ({{ $data[0]->surah_arti }})</h1>
            </div>
            <div class="ayat has-text-centered">
                <p class="">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
            </div>
            @foreach ($data as $item)
                <div class="columns is-centered">
                    <div class="column is-7">
                        <div class="box">
                            <div class="no-ayat">
                                <span>{{ $item->ayat_id }}</span>
                            </div>
                            <p class="ayat has-text-right">{{ $item->arab }}</p>
                            <p class="bacaan has-text-left">{{ $item->bacaan }}</p>
                            <p class="arti has-text-left">{{ $item->arti }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
