@extends('template.template')
@section('title', 'Hadits Home')

@section('content')
<section class="section">
    <div class="content">
        <div class="columns is-centered">
            <div class="column is-6 has-text-centered">
                <div class="box">
                    @if ($type == 'hadits')
                    <h2 class="title">{{ $data[0]->bab }}</h2>

                    <h5 class="title">Perawi: {{ $data[0]->rawi }} | No Hadits: {{ $data[0]->no }} | Kitab: {{
                        $data[0]->kitab }} </h5>
                    @else
                    <h2 class="title">{{ $data[0]->nama_surah }}</h2>

                    <h5 class="title">Surah: {{ $data[0]->nama_surah }} [{{$data[0]->surah_arti}}] | Ayat: {{
                        $data[0]->ayat_id }} </h5>
                    @endif

                    <p class="arab">{{ $data[0]->arab }}</p>
                    <p>{{ $data[0]->arti }}</p>
                </div>
                <textarea class="textarea is-medium is-primary" placeholder="Masukan Teks Bahasa"
                    id="comments">{{$fav[0]->comments}}</textarea>
                <button class="button is-info is-rounded mt-3" onclick="UpdateComments()">Perbaharui Komentar</button>
            </div>
        </div>

    </div>
</section>
@endsection


@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function UpdateComments(){
        const comments = $("#comments").val()
        //alert(comments);
        const data = JSON.stringify({
            type: 'favorite',
            ids: '{{$fav[0]->id}}',
            data: {
                comments: comments
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('api.update.things') }}",
            data: {
                data: data
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: data,
                    showConfirmButton: false,
                    timer: 1500
                })
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
</script>
@endsection