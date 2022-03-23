@extends('template.template')
@section('title', 'Hadits Home')

@section('content')


    <section class="section">
        <div class="content">

            <div class="columns is-centered">
                <div class="column is-6 has-text-centered">
                    <h1 style="font-family: 'Hurricane', cursive; color: rgb(23, 192, 113); font-size: 80px">Khataman -
                        Hadits</h1>
                    <form action="{{ route('cari-hadits') }}" method="POST" autocomplete="OFF" id="haditsform">
                        @csrf
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input is-rounded" type="text" placeholder="Masukan Sebuah Kata..."
                                    name="hadits" id="ip-hadits">
                            </p>
                        </div>
                        {{-- <input type="submit" class="button is-info is-rounded" value="Cari Hadits"> --}}
                        <button class="button is-info is-rounded" onclick="frontclear()">Cari Hadits</button>
                    </form>
                </div>
            </div>
            @isset($data)
                <div class='container has-text-centered'>
                    <div class='columns is-centered'>
                        <div class='column is-8'>
                            <div>
                                <h3 class='title mt-2'>Hasil Pencarian Hadits</h3>
                                <hr>
                            </div>
                            @if (count($data) < 1)
                                <h2>Maaf Pencarian tidak menemukan apapun!</h2>
                            @else
                                <h4 class='title mt-2'>Ditemukan {{ count($data) }} hasil pencarian</h4>
                                <table class='table' id="table-hadits">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bab</th>
                                            <th>Kitab</th>
                                            <th>Perawi (No Hadits)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><a href="{{ route('baca-hadits', ['rawi' => $item->rawi, 'no' => $item->no]) }}"
                                                        target="_blank">{{ $item->bab }}</a></td>
                                                <td>{{ $item->kitab }}</td>
                                                <td>{{ $item->rawi }} ({{ $item->no }})</td>
                                            </tr>
                                        @endforeach
                            @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endisset

        </div>
    </section>

@endsection

@section('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="{{ URL::asset('js/stem.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-hadits').DataTable({});
        });

        function frontclear() {
            const clear = stem($("#ip-hadits").val());
            $("#ip-hadits").val(clear);
            $("#haditsform").submit();
            return false;
        }
    </script>
@endsection
