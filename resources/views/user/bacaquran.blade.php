@extends('template.template')
@section('title', "Baca Qur'an")
<style>
    .ayat {
        font-family: 'litelpmq';
        font-size: 30px;
    }

    #ayat {
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

</style>
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-12">
                <div class="card">
                    <div class="card-content">
                        <header class="card-haeder">
                            <p class="card-header-title has-text-centered" id="nama-surat">
                                {{ $data[0]->nama_surah }}({{ $data[0]->surat_id }})</p>
                        </header>
                        <div class="content">
                            <div class="no-ayat">
                                <span id="no-ayat">{{ $data[0]->ayat_id }}</span>
                            </div>
                            <p class="mt-4 ayat has-text-right" id="ayat">{{ $data[0]->arab }}</p>
                            <p class="mt-2 ayat has-text-left" id="bacaan">{{ $data[0]->bacaan }}</p>
                            <p class="mt-2 ayat has-text-left" id="arti">{{ $data[0]->arti }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns" style="display: none;" id="button-next">
            <div class="column has-text-centered">
                <button class="button is-info">Selanjutnya</button>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $("#button-next").css("display", "block");
            }, 3000);
            const regex_number_surah = /(\d+)/gm;
            var nama_surat = $("#nama-surat").text();
            const surat_id = nama_surat.match(regex_number_surah)
            const noayat = $("#no-ayat").text();
            console.log(surat_id[0], noayat);

            const data_post = {
                'ayat': noayat,
                'surat': surat_id[0]
            }

            $.ajax({
                type: "POST",
                url: "{{ route('api.bacaquran') }}",
                data: data_post,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(err) {
                    console.log(err);
                }

            })
        });
    </script>
@endsection
