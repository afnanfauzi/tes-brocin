<!-- jQuery -->
<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Daftar Dosen')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2 class="text-uppercase">Daftar dosen</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <div class="col-md-10">
                    <p>Berikut adalah daftar dosen </p>
                  </div>
  
                  <table class="table table-striped table-bordered dt-responsive nowrap" id="table-dosen" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>

                    </tr>
                    </thead>
                    </table>

                 </div>
               </div>
            </div>
        </div> 
    </div>
  </div> 


  <!-- MULAI MODAL FORM INFO-->
  <div class="modal fade" id="tampilkan-info" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul-info"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="column">
                      <table style="font-size: 15px;">
                        <tr>
                            <td width="700px" style="vertical-align: top; padding-left: 5px;"><label for="nama_dosen"  class="control-label">Nama Dosen :</label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-left: 5px;><label for="id" id= "nama_dosen" class="control-label" id="id"></label></td>
                        </tr>
                        <tr>
                            <td width="200px" style="padding-left: 5px; padding-top: 7px;"><label for="nama_dosen"  class="control-label">Mahasiswa yang diampu :</label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-left: 5px;><label for="id" id= "nama_dosen" class="control-label" id="id"></label></td>
                        </tr>
                      </table>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
   </div>
<!-- AKHIR MODAL -->
        

@endsection



    <!-- JAVASCRIPT -->
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        });
  
  
  
        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
            $('#table-dosen').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('dosen.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id', 
                        name: 'id', 'visible': false
                    },
                    {
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', orderable: false,searchable: false
                    },
                    {
                        data: 'dosen.kd_dosen', 
                        name: 'dosen.kd_dosen' 
                    },
                    {
                        data: 'dosen.nama_dosen', 
                        name: 'dosen.nama_dosen' 
                    },
                    {
                        data: 'dosen.alamat', 
                        name: 'dosen.alamat' 
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,searchable: false
                    },
  
                ],
                columnDefs: [
                    {
                        targets: 2,
                        render: $.fn.dataTable.render.number('.', '.', 0, '00000')
                    }
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
  

          //TOMBOL INFO DAN TAMPIKAN DATA BERDASARKAN ID kegiatan KE MODAL
      $(document).on("click", ".open-info", function () {
        var info_id = $(this).data('id');
        $.get('dosen/' + info_id , function(data){
            console.log(data.success[0].nama_dosen);
            $('#tampilkan-info').modal('show');
            $('#modal-judul-info').html("Info Dosen");
            $('.modal-body #nama_dosen').text(data.success[0].nama_dosen);
            
            
            });
        });
  
    </script>
  
    <!-- JAVASCRIPT -->
    

