@extends('template.template')
@section('title', "Baca Qur'an Online")

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
            <div class="columns has-text-centered">
                <div class="column">
                    <div class="select is-rounded">
                        <select id="carisurat">
                            <option selected value="000">Silahkan Cari surat di sini</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}">[{{ $item->id }}] {{ $item->nama_surah }}
                                    ({{ $item->arti }})
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
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

@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#carisurat').select2();
        });

        $('#carisurat').on('change', function(e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected != '000' && parseInt(valueSelected) >= 1 && parseInt(valueSelected) <= 114) {

                var url_red = "{{ route('baca-surah', ['id' => ':id']) }}";
                url_red = url_red.replace(':id', valueSelected);
                window.location.href = url_red;
            }
            //console.log(valueSelected);
        });
    </script>
@endsection
