@extends('template.template')
@section('title', 'My Favorites')

@section('content')


<section class="section">
    {{-- modal --}}
    <div id="modal-comments" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title" id="modal-title"></p>
                <button class="delete" aria-label="close" onclick="CloseModal('modal-comments');"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">
                    <div class="columns is-centered">
                        <input type="hidden" value="" id="ids-surah">
                        <div class="column is-12">
                            <textarea class="textarea is-medium is-primary" disabled placeholder="Tidak ada komentar"
                                id="comments"></textarea>
                        </div>

                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                {{-- <button class="button is-success" onclick="SaveFavorites();">Save changes</button> --}}
                <button class="button" onclick="CloseModal('modal-comments');">Cancel</button>
            </footer>
        </div>
    </div>
    {{-- modal --}}
    <div class="content">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="select is-rounded">
                    <select id="carisurat">
                        <option {{ $type=='Ayat' ? 'selected' : "" }} value="surat">Ayat Favorite</option>
                        <option {{ $type=='Hadits' ? 'selected' : "" }} value="hadits">Hadits Favorite</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='container has-text-centered'>
            <div class='columns is-centered'>
                <div class='column is-8'>
                    <div>
                        <h3 class='title mt-2'>Daftar {{$type}} Favoritemu</h3>
                        <hr>
                    </div>
                    <table class='table' id="table-fav">
                        <thead>
                            <tr>
                                <th>No</th>
                                @if ($type == 'Ayat')
                                <th>Nama Surat</th>
                                <th>Ayat</th>
                                @else
                                <th>Perawi (NO)</th>
                                <th>BAB</th>
                                @endif
                                <th>Catatan</th>
                                <th>Tanggal Favorite</th>
                            </tr>


                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                @if ($type == 'Ayat')
                                <td><a
                                        href="{{ route('readfav', ['type' => 'ayat', 'sumber' => $item->sumber, 'no' => $item->no]); }}">{{$item->nama_surah}}
                                        ({{$item->arti}})</a></td>
                                <td>{{$item->no}}</td>
                                @else
                                <td>{{$item->rawi}} ({{$item->no}})</td>
                                <td><a
                                        href="{{ route('readfav', ['type' => 'hadits', 'sumber' => $item->sumber, 'no' => $item->no]); }}">
                                        {{$item->bab}}</a></td>
                                </a></td>
                                @endif
                                <td><button class="button is-danger is-light is-small"
                                        onclick="lihatcatatan('{{$type == 'Ayat' ? 'surat' : 'hadits'}}-{{$item->sumber}}-{{$item->no}}')">Lihat
                                        Catatan</button></td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
            $('#table-fav').DataTable({});
        });

    $('#carisurat').on('change', function(e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

        var url_red = "{{ route('myfavorites', ['type' => ':id']) }}";
        url_red = url_red.replace(':id', valueSelected);
        window.location.href = url_red;
    });


    function lihatcatatan(params){
        const pecah = params.split('-');
        const datas = JSON.stringify({
            type: pecah[0],
            sumber: pecah[1],
            no: pecah[2]
        });
        $.ajax({
            type: "POST",
            url: "{{ route('api.get.things') }}",
            data: {
                ask: 'comments',
                types: "favorite",
                data: datas
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                $("#comments").val(data)
                $("#modal-comments").addClass("is-active");
            },
            error: function(err){
                Swal.fire({
                    icon: 'error',
                    title: err,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }

    function CloseModal(ids){
        $("#"+ids).removeClass("is-active");
        $("#ids-surah").val('');
        $("#comments").val('');
    }

</script>
@endsection