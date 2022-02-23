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

    .bold {
        font-weight: bold;
    }

</style>

@section('content')

    <section class="section">
        <div class="content">
            <div class="titles">
                <h2>Daftar Surah</h2>
            </div>
            @php
                
                $indexing = [
                    0 => [0, 38],
                    1 => [38, 76],
                    2 => [76, 114],
                ];
                
            @endphp
            <div class="columns">
                @for ($x = 0; $x < 3; $x++)
                    <div class="column is-4">
                        <table class="table is-fullwidth">
                            <tbody>
                                @for ($i = $indexing[$x][0]; $i < $indexing[$x][1]; $i++)
                                    <tr>
                                        <td>
                                            <div class="no-ayat mt-2">
                                                <span>{{ $data[$i]->id }}.</span>
                                            </div>
                                            <div class="nama-surah">
                                                <a href="{{ route('baca-surah', ['id' => $data[$i]->id]) }}">
                                                    <p class="mt-3 ml-6 mb-1 bold">{{ $data[$i]->nama_surah }}
                                                        ({{ $data[$i]->arti }})</p>
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
    </section>
@endsection
