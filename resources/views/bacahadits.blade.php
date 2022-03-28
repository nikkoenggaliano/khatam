@extends('template.template')
@section('title', 'Hadits Home')

@section('content')
<section class="section">
    <div class="content">
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
        <div class="columns is-centered">
            <div class="column is-6 has-text-centered">
                <div class="box">
                    <h2 class="title">{{ $data[0]->bab }}</h2>
                    <h5 class="title">Perawi: {{ $data[0]->rawi }} | No Hadits: {{ $data[0]->no }} | Kitab:
                        {{ $data[0]->kitab }} </h5>
                    <p class="arab">{{ $data[0]->arab }}</p>
                    <p>{{ $data[0]->arti }}</p>
                    @auth
                    <div class="level is-mobile level-right">
                        <div class="level-right">
                            @if($favorites == False)
                            <a class="level-item" aria-label="like"
                                onclick="FavSurat('{{ $data[0]->rawi }}-{{ $data[0]->no }}-hadits')">
                                <span class="icon is-medium">
                                    <i class="fa-regular fa-heart"
                                        id="icon-fav-{{ $data[0]->rawi }}-{{ $data[0]->no }}-hadits"></i>
                                </span>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endauth
                </div>
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
                $("#modal-title").text("{{$data[0]->bab}}");
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