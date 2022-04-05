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
        font-style: italic;
    }

    #arti {
        font-size: 20px;
    }

    #nama-surat {
        display: block;
    }
</style>
@section('content')
<div class="container">
    {{-- modal --}}
    <div id="modal-ter" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title" id="modal-title"></p>
                <button class="delete" aria-label="close" onclick="CloseModal('modal-ter');"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">
                    <div class="columns is-centered">
                        <input type="hidden" value="" id="ids-surah">
                        <div class="column is-12">
                            <textarea class="textarea is-medium is-primary"
                                placeholder="Masukan sebuah catatan, atau kosongi saja langsung"
                                id="comments"></textarea>
                        </div>

                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" style="display: block" id="buttonsavefav"
                    onclick="SaveFavorites();">Save Favorites</button>
                <button class="button" onclick="CloseModal('modal-ter');">Cancel</button>
            </footer>
        </div>
    </div>
    {{-- modal --}}
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
                        <p class="mt-2 has-text-left" id="bacaan">{{ $data[0]->bacaan }}</p>
                        <p class="mt-2 has-text-left" id="arti">{{ $data[0]->arti }}</p>
                    </div>
                </div>
                {{-- favorite --}}
                <div class="level is-mobile level-right">
                    <div class="level-right">
                        <a class="level-item" aria-label="like" onclick="FavSurat();">
                            <span class="icon is-large">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                        </a>
                    </div>
                </div>
                {{-- favorite --}}
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column has-text-centered" style="display: none;" id="button-next">
            <button class="button is-info" onclick="NextAyat();">Selanjutnya</button>
        </div>
        <div class="column has-text-centered" style="display: block;" id="loading-button">
            <i class="fas fa-sync fa-spin fa-2x"></i>
        </div>
    </div>

</div>
@endsection


@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
            setTimeout(() => {
                $("#button-next").css("display", "block");
                $("#loading-button").css("display", "none");
            }, 3000);
            //     //     const regex_number_surah = /(\d+)/gm;
            //     //     var nama_surat = $("#nama-surat").text();
            //     //     const surat_id = nama_surat.match(regex_number_surah)
            //     //     const noayat = $("#no-ayat").text();
            //     //     const data_post = {
            //     //         'ayat': noayat,
            //     //         'surat': surat_id[0]
            //     //     }

            //     //     $.ajax({
            //     //         type: "POST",
            //     //         url: "{{ route('api.bacaquran') }}",
            //     //         data: data_post,
            //     //         headers: {
            //     //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     //         },
            //     //         success: function(data) {
            //     //             console.log(data)
            //     //         },
            //     //         error: function(err) {
            //     //             console.log(err);
            //     //         }

            //     //     })
        });

        function NextAyat() {
            $("#button-next").css("display", "none");
            $("#loading-button").css("display", "block");

            const regex_number_surah = /(\d+)/gm;
            var nama_surat = $("#nama-surat").text();
            const surat_id = nama_surat.match(regex_number_surah)
            const noayat = $("#no-ayat").text();
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
                    const datas = data[0];
                    let nama_surat = datas.nama_surah + "(" + datas.surat_id + ")";
                    let no_ayat = datas.ayat_id;
                    let ayat = datas.arab;
                    let bacaan = datas.bacaan;
                    let arti = datas.arti;
                    $("#nama-surat").text(nama_surat);
                    $("#no-ayat").text(no_ayat);
                    $("#ayat").text(ayat);
                    $("#bacaan").text(bacaan);
                    $("#arti").text(arti);
                    setTimeout(() => {
                        $("#button-next").css("display", "block");
                        $("#loading-button").css("display", "none");
                    }, 3000);
                },
                error: function(err) {
                    console.log(err)
                }
            })

        }
        function CloseModal(ids){
            $("#"+ids).removeClass("is-active");
            $("#ids-surah").val('');
            $("#comments").val('');
        }
        function FavSurat() {
                const regex_number_surah = /(\d+)/gm;
                const nama_surat = $("#nama-surat").text();
                const surat_id = nama_surat.match(regex_number_surah)[0]
                const ayat_id  = $("#no-ayat").text();
                $("#ids-surah").val(surat_id+"-"+ayat_id+"-surat");
                $("#modal-title").text(nama_surat.trim());
                $("#modal-ter").addClass("is-active");
                return false;
        }

        function SaveFavorites(){
            const idts = $("#ids-surah").val();
            const comments = $("#comments").val();
            console.log(comments);
            const datas = JSON.stringify({
                id: idts,
                comments: comments
            });
            const data_post = { data: datas }
            $("#buttonsavefav").css('display', 'none');
            $.ajax({
                type: "POST",
                url: "{{ route('api.fav') }}",
                data: data_post,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data == 'Ok'){
                        Swal.fire({
                            icon: 'success',
                            title: "Catatan berhasil disimpan",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        CloseModal('modal-ter');
                    }else if(data == 'Already'){
                        Swal.fire({
                            icon: 'success',
                            title: "Catatan sudah pernah disimpan",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        CloseModal('modal-ter');
                    }else{
                        console.log('Something Wrong '+data);
                        CloseModal('modal-ter');
                    }
                },
                error: function(err) {
                    CloseModal('modal-ter');
                    console.log(err)
                }
            })
        }
</script>
@endsection