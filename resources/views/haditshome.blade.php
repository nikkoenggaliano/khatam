@extends('template.template')
@section('title', 'Hadits Home')

@section('content')


    <section class="section">
        <div class="content">

            <div class="columns is-centered">
                <div class="column is-6">
                    {{-- <div class="box"> --}}
                    <div class="field is-grouped">
                        <p class="control is-expanded">
                            <input class="input is-rounded" type="text" placeholder="Cari Hadits">
                        </p>
                        <p class="control">
                        </p>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>

        </div>
    </section>

@endsection
