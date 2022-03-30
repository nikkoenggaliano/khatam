@extends('template.template')
@section('title', $data[0]->nama_surah)


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

    .bacaan {
        font-size: 18px;
        font-style: italic;
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
                <button class="button is-success" onclick="SaveFavorites();">Save changes</button>
                <button class="button" onclick="CloseModal('modal-ter');">Cancel</button>
            </footer>
        </div>
    </div>
    {{-- modal --}}
</div>

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
                    <p class="ayat has-text-right mt-4">{{ $item->arab }}</p>
                    <p class="bacaan has-text-left">{{ $item->bacaan }}</p>
                    <p class="arti has-text-left">{{ $item->arti }}</p>

                    @auth
                    <div class="level is-mobile level-right">
                        <div class="level-right">
                            {{-- <a class="level-item" aria-label="reply">
                                <span class="icon is-small">
                                    <i class="fas fa-reply" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a class="level-item" aria-label="retweet">
                                <span class="icon is-small">
                                    <i class="fas fa-retweet" aria-hidden="true"></i>
                                </span>
                            </a> --}}
                            @if (!in_array($item->ayat_id, $favorites))


                            <a class="level-item" aria-label="like"
                                onclick="FavSurat('{{ $item->surat_id }}-{{ $item->ayat_id }}-surat')">
                                <span class="icon is-medium">
                                    <i class="fa-regular fa-heart"
                                        id="icon-fav-{{ $item->surat_id }}-{{ $item->ayat_id }}-surat"></i>

                                </span>
                            </a>
                            @endif
                            {{-- <span class="icon is-medium">
                                <i class="fa-solid fa-heart"></i>
                            </span> --}}
                        </div>
                    </div>
                    @endauth


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
                @for ($x = 0; $x < 3; $x++) <div class="column is-4">
                    <table class="table is-fullwidth">
                        <tbody>
                            @for ($i = $indexing[$x][0]; $i < $indexing[$x][1]; $i++) <tr>
                                <td>
                                    <div class="no-ayat mt-2">
                                        <span>{{ $quick_data[$i]->id }}.</span>
                                    </div>
                                    <div class="nama-surah">
                                        <a href="{{ route('baca-surah', ['id' => $quick_data[$i]->id]) }}">
                                            <p class="mt-3 ml-6 mb-1 bold">{{
                                                $quick_data[$i]->nama_surah }}
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


@section('scripts')
@auth
<script>
    function FavSurat(me) {
                $("#modal-ter").addClass("is-active");
                //$("#icon-fav-" + me).removeClass("fa-regular fa-heart").addClass("fa-solid fa-heart");
                const ide = $('title').text().split(" - ");
                $("#modal-title").text(ide[1]);
                console.log(ide);
                $("#ids-surah").val(me);
                return false;

    }
    function CloseModal(ids){
        $("#"+ids).removeClass("is-active");
        $("#ids-surah").val('');
        $("#comments").val('');
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
        $.ajax({
            type: "POST",
            url: "{{ route('api.fav') }}",
            data: data_post,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data == 'Ok'){
                    $("#icon-fav-" + idts).removeClass("fa-regular fa-heart").addClass("fa-solid fa-heart");
                    CloseModal('modal-ter');
                }else if(data == 'Already'){
                    $("#icon-fav-" + idts).removeClass("fa-solid fa-heart").addClass("fa-regular fa-heart");
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

@endauth

@endsection