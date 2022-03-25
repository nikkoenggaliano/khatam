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

<section class="section">
    <div class="content">

        <div id="modal-ter" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Modal title</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="content">
                        <h1>Hello World</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices
                            eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate
                            semper dui. Fusce erat odio, sollicitudin vel erat vel, interdum mattis neque.</p>
                        <h2>Second level</h2>
                        <p>Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque
                            condimentum maximus mi, sit amet commodo arcu rutrum id. Proin pretium urna vel cursus
                            venenatis. Suspendisse potenti. Etiam mattis sem rhoncus lacus dapibus facilisis. Donec at
                            dignissim dui. Ut et neque nisl.</p>
                        <ul>
                            <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet.</li>
                            <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis.</li>
                            <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus.</li>
                            <li>Ut non enim metus.</li>
                        </ul>
                        <h3>Third level</h3>
                        <p>Quisque ante lacus, malesuada ac auctor vitae, congue <a href="#">non ante</a>. Phasellus
                            lacus ex, semper ac tortor nec, fringilla condimentum orci. Fusce eu rutrum tellus.</p>
                        <ol>
                            <li>Donec blandit a lorem id convallis.</li>
                            <li>Cras gravida arcu at diam gravida gravida.</li>
                            <li>Integer in volutpat libero.</li>
                            <li>Donec a diam tellus.</li>
                            <li>Aenean nec tortor orci.</li>
                            <li>Quisque aliquam cursus urna, non bibendum massa viverra eget.</li>
                            <li>Vivamus maximus ultricies pulvinar.</li>
                        </ol>
                        <blockquote>Ut venenatis, nisl scelerisque sollicitudin fermentum, quam libero hendrerit ipsum,
                            ut blandit est tellus sit amet turpis.</blockquote>
                        <p>Quisque at semper enim, eu hendrerit odio. Etiam auctor nisl et <em>justo sodales</em>
                            elementum. Maecenas ultrices lacus quis neque consectetur, et lobortis nisi molestie.</p>
                        <p>Sed sagittis enim ac tortor maximus rutrum. Nulla facilisi. Donec mattis vulputate risus in
                            luctus. Maecenas vestibulum interdum commodo.</p>
                        <p>Suspendisse egestas sapien non felis placerat elementum. Morbi tortor nisl, suscipit sed mi
                            sit amet, mollis malesuada nulla. Nulla facilisi. Nullam ac erat ante.</p>
                        <h4>Fourth level</h4>
                        <p>Nulla efficitur eleifend nisi, sit amet bibendum sapien fringilla ac. Mauris euismod metus a
                            tellus laoreet, at elementum ex efficitur.</p>
                        <p>Maecenas eleifend sollicitudin dui, faucibus sollicitudin augue cursus non. Ut finibus
                            eleifend arcu ut vehicula. Mauris eu est maximus est porta condimentum in eu justo. Nulla id
                            iaculis sapien.</p>
                        <p>Phasellus porttitor enim id metus volutpat ultricies. Ut nisi nunc, blandit sed dapibus at,
                            vestibulum in felis. Etiam iaculis lorem ac nibh bibendum rhoncus. Nam interdum efficitur
                            ligula sit amet ullamcorper. Etiam tristique, leo vitae porta faucibus, mi lacus laoreet
                            metus, at cursus leo est vel tellus. Sed ac posuere est. Nunc ultricies nunc neque, vitae
                            ultricies ex sodales quis. Aliquam eu nibh in libero accumsan pulvinar. Nullam nec nisl
                            placerat, pretium metus vel, euismod ipsum. Proin tempor cursus nisl vel condimentum. Nam
                            pharetra varius metus non pellentesque.</p>
                        <h5>Fifth level</h5>
                        <p>Aliquam sagittis rhoncus vulputate. Cras non luctus sem, sed tincidunt ligula. Vestibulum at
                            nunc elit. Praesent aliquet ligula mi, in luctus elit volutpat porta. Phasellus molestie
                            diam vel nisi sodales, a eleifend augue laoreet. Sed nec eleifend justo. Nam et sollicitudin
                            odio.</p>
                        <h6>Sixth level</h6>
                        <p>Cras in nibh lacinia, venenatis nisi et, auctor urna. Donec pulvinar lacus sed diam
                            dignissim, ut eleifend eros accumsan. Phasellus non tortor eros. Ut sed rutrum lacus. Etiam
                            purus nunc, scelerisque quis enim vitae, malesuada ultrices turpis. Nunc vitae maximus
                            purus, nec consectetur dui. Suspendisse euismod, elit vel rutrum commodo, ipsum tortor
                            maximus dui, sed varius sapien odio vitae est. Etiam at cursus metus.</p>
                        </ul>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success">Save changes</button>
                    <button class="button">Cancel</button>
                </footer>
            </div>
        </div>

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
                            <a class="level-item" aria-label="like"
                                onclick="FavSurat('{{ $item->surat_id }}-{{ $item->ayat_id }}-surat')">
                                <span class="icon is-medium">
                                    <i class="fa-regular fa-heart"
                                        id="icon-fav-{{ $item->surat_id }}-{{ $item->ayat_id }}-surat"></i>

                                </span>
                            </a>
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
                                            <p class="mt-3 ml-6 mb-1 bold">{{ $quick_data[$i]->nama_surah }}
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
                $("#modal-ter").show()
                $("#icon-fav-" + me).removeClass("fa-regular fa-heart").addClass("fa-solid fa-heart");
                const data_post = {
                    data: me
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('api.fav') }}",
                    data: data_post,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data)
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            }
</script>

@endauth

@endsection