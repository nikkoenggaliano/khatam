@extends('template.template')
@section('title', 'Hadits Home')

@section('content')
    <section class="section">
        <div class="content">

            <div class="columns is-centered">
                {{-- <a href=""><i class="fa-solid fa-clipboard has-text-left"></i></a> --}}
                <div class="column is-6">
                    <textarea class="textarea is-medium is-primary" placeholder="Masukan Teks Bahasa" id="indo"></textarea>
                </div>
                <div class="column is-6">
                    <textarea class="textarea is-medium is-primary arab has-text-right" id="pegonarab"></textarea>
                    {{-- <textarea class="textarea is-medium is-primary arab has-text-right" placeholder="Hasil Pegon akan keluar di sini" id="pegonarab" disabled></textarea> --}}
                </div>
            </div>
            <div class="columns has-text-centered is-centered">
                <div class="column">
                    <button class="button is-info is-rounded" id="pegonbutton">Pegonkan!</button>
                    <button class="button is-primary is-rounded" id="copypegon" onclick="copyToClipboard(' #pegonarab')" style="display: none;"><i class="fa-solid fa-copy"></i> Pegon!</button>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
<script src="{{ URL::asset('js/pegon.js') }}"></script>
<script>

$("#pegonbutton").click(function(){

    let teksindo = $("#indo").val();
    $("#pegonarab").text(pegonkan(teksindo));
    $("#copypegon").show();

});

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>


@endsection
