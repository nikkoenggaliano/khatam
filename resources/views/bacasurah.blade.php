@extends('template.template')



@section('content')
<link href="https://fonts.googleapis.com/css2?family=Lateef&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet"> 
<style>
    .ayat {
        font-family: 'Lateef', cursive;
        font-size: 50px;
    }

    .no-ayat span {
        padding: 10px;
        background: #000000;
        color: #ffffff;
    }

    #bacaan {
        font-size: 20px;
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
        @foreach ($data as $item)
            <div class="box">
                <div class="no-ayat">
                    <span>{{$item->ayat_id}}</span>
                </div>
                <p class="ayat has-text-right">{{$item->arab}}</p>
                <p class="bacaan has-text-right">{{$item->bacaan}}</p>
                <p class="arti has-text-right">{{$item->arti}}</p>
            </div>
        @endforeach

    </div>
</section>

@endsection