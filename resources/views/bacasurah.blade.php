@extends('template.template')
@section('title', 'Khataman - ' . $data[0]->nama_surah)


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
            <div class="has-text-centered mb-4">
                <h3 class="">Surah-Surah Paling Sering Dicari</h3>
            </div>
            @php
                
                $indexing = [
                    0 => [0, 3],
                    1 => [3, 6],
                    2 => [6, 9],
                ];
                
            @endphp

            <div class="columns is-10 is-centered mt-2">
                <div class="columns">
                    @for ($x = 0; $x < 3; $x++)
                        <div class="column is-4">
                            <table class="table is-fullwidth">
                                <tbody>
                                    @for ($i = $indexing[$x][0]; $i < $indexing[$x][1]; $i++)
                                        <tr>
                                            <td>
                                                <div class="no-ayat mt-2">
                                                    <span>{{ $quick_data[$i]->id }}.</span>
                                                </div>
                                                <div class="nama-surah">
                                                    <a href="{{ route('baca-surah', ['id' => $quick_data[$i]->id]) }}">
                                                        <p class="mt-3 ml-6 mb-1 bold">{{ $quick_data[$i]->nama_surah }}
                                                            ({{ $quick_data[$i]->arti }})</p>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection
