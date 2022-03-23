@extends('template.template')
@section('title', 'Hadits Home')

@section('content')
    <section class="section">
        <div class="content">

            <div class="columns is-centered">
                <div class="column is-6 has-text-centered">
                    <div class="box">
                        <h2 class="title">{{ $data[0]->bab }}</h2>
                        <h5 class="title">Perawi: {{ $data[0]->rawi }} | No Hadits: {{ $data[0]->no }} | Kitab:
                            {{ $data[0]->kitab }} </h5>
                        <p class="arab">{{ $data[0]->arab }}</p>
                        <p>{{ $data[0]->arti }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
