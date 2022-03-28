@extends('template.template')
@section('title', 'My Favorites')

@section('content')


<section class="section">
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
                                <th>Tanggal Favorite</th>
                            </tr>


                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                @if ($type == 'Ayat')
                                <td>{{$item->nama_surah}} ({{$item->arti}})</td>
                                <td>{{$item->no}}</td>
                                @else
                                <td>{{$item->rawi}} ({{$item->no}})</td>
                                <td>{{$item->bab}}</td>
                                @endif
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
<script src="{{ URL::asset('js/stem.js') }}"></script>
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
</script>
@endsection