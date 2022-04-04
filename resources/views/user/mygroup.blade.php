@extends('template.template')
@section('title', 'My Grouping')

@section('content')


<section class="section">
    {{-- modal --}}
    <div id="modal-comments" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title" id="modal-title">Tambahkan Kelompok</p>
                <button class="delete" aria-label="close" onclick="CloseModal('modal-comments');"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">
                    <div class="columns is-centered">
                        {{-- <form method="POST" autocomplete="OFF"> --}}
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-success" type="text" id="judul"
                                            placeholder="Masukan Judul Grup">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea is-medium is-primary"
                                            placeholder="Masukan Catatan Grup" id="catatan"></textarea>
                                    </div>
                                </div>
                            </div>
                            {{--
                        </form> --}}

                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" onclick="savegroup()">Save changes</button>
                <button class="button" onclick="CloseModal('modal-comments');">Cancel</button>
            </footer>
        </div>
    </div>
    {{-- modal --}}
    <div class="content">
        <div class="columns">
            <div class="column has-text-centered">
                <button class="button is-rounded is-medium is-info" onclick="openmodal();">Tambah Kelompok</button>
            </div>
        </div>
        <div class='container has-text-centered'>
            <div class='columns is-centered'>
                <div class='column is-12'>
                    <div>
                        <h3 class='title mt-2'>Daftar Kelompok</h3>
                        <hr>
                    </div>
                    <table class='table' id="table-group">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nama Kelompok</th>
                                <th>Tanggal Favorite</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr data-child-value="{{$item->desc}}">
                                <td class="details-control"></td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->title}}</td>
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
<style>
    td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
    }
</style>
<script>
    function format(value) {
      return '<p><b>' + value + '</b></p>';
    }
    $(document).ready(function () {
        var table = $("#table-group").DataTable({});

        $('#table-group').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              console.log(tr.data('child-value'));
              row.child(format(tr.data('child-value'))).show();
              tr.addClass('shown');
          }
      });
    });

    function openmodal(){
        $("#modal-comments").addClass("is-active");
    }

    function CloseModal(ids){
        $("#"+ids).removeClass("is-active");
        $("#ids-surah").val('');
        $("#comments").val('');
    }

    function savegroup(){

        const judul = $("#judul").val();
        const catatan = $("#catatan").val();

        //console.log(judul,catatan);
        if(judul.length < 5){

            Swal.fire({
                icon: 'error',
                title: 'Judul Terlalu Pendek',
                showConfirmButton: false,
                timer: 1500
            });

            return false;

        }
        const datas = JSON.stringify({
            title: judul,
            desc: catatan,
        });
        $.ajax({
            type: "POST",
            url: "{{ route('api.insert.things') }}",
            data: {
                types: "group",
                data: datas
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data == "ok"){
                    Swal.fire({
                        icon: 'success',
                        title: "Group Berhasil Ditambahkan",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    CloseModal('modal-comments');
                    location.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: data,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
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