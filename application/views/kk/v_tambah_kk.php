<script src="<?php echo base_url('assets/components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<form method="post" id="form_kk">
  <div class="box box-primary">
    <div class="box-header with-border">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title">
            <a href="<?php echo base_url('kk/daftar_kk'); ?>">
              <i class="fa fa-mail-reply"></i>
            </a>
            <span>Master KK</span>
          </h3>
        </div>
        <div class="col-lg-6 text-right">
          <button class="btn btn-sm btn-default">Batal</button>
          <button type="button" class="btn btn-sm btn-primary" id="simpan">
            <i class="fa fa-save"></i> <span>Simpan</span></button>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-6">
        <div class="box-body">
          <div class="form-group">
            <label class="control-label">Nomor Kartu Keluarga</label>
            <input type="text" class="form-control" id="txtnokk" name="txtnokk" placeholder="Nomor Kartu Keluarga">
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-body">
          <div class="form-group">
            <label class="control-label">NIK Kepala Keluarga</label>
            <input type="text" class="form-control pencarian" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="box-body">
          <div class="row">
            <div class="col-lg-6 text-left">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td style="width: 35%;">Nama Kepala Keluarga</td>
                    <td style="width:10px;">:</td>
                    <td><span id="kepalakeluarga"></span></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><span id="alamat"></span></td>
                  </tr>
                  <tr>
                    <td>RT/RW</td>
                    <td>:</td>
                    <td><span id="rtrw"></span></td>
                  </tr>
                  <tr>
                    <td>Desa/Kelurahan</td>
                    <td>:</td>
                    <td><span id="desa"></span></td>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="col-lg-6">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td style="width: 35%;">Kecamatan</td>
                    <td style="width:10px;">:</td>
                    <td><span id="kecamatan"></span></td>
                  </tr>
                  <tr>
                    <td>Kabupaten/Kota</td>
                    <td>:</td>
                    <td><span id="kabupaten"></span></td>
                  </tr>
                  <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td><span id="kodepos"></span></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td><span id="provinsi"></span></td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="box-body">
          <button type="button" id="tambah_keluarga" class="btn btn-default btn-sm" style="margin:10px 0;">
            <i class="fa fa-plus"></i> <span>Tambah Anggota Keluarga</span>
          </button>
          <table class="table table-bordered" id="tableKK">
            <thead>
              <tr>
                <th>NIK</th>
                <th>NAMA LENGKAP</th>
                <th>KELURAHAN</th>
                <th>TEMPAT LAHIR</th>
                <th>TANGGAL LAHIR</th>
                <th>AGAMA</th>
                <th>PENDIDIKAN</th>
                <th>PEKERJAAN</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="modalKepala" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data Penduduk</h4>
      </div>
      <div class="modal-body">
        <table id="tableKepala" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NIK</th>
              <th>Nama Kepala KK</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Dusun</th>
              <th>RT / RW</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAnggota" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data Anggota Penduduk</h4>
      </div>
      <div class="modal-body">
        <table id="tableAnggota" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NIK</th>
              <th>Nama Kepala KK</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Dusun</th>
              <th>RT / RW</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>                         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalKonfirmasi" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <i class="fa fa-question-circle"></i> <span>Konfirmasi</span>
          </h4>
      </div>
      <div class="modal-body">
        <span id="isi"></span>                           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalPreviewKK" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <i class="fa fa-question-circle"></i> <span>Preview Kartu Keluarga</span>
          </h4>
      </div>
      <div class="modal-body">
        <?php $this->load->view('kk/v_preview_kk'); ?>                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
 
        $('#simpan_kk').attr('disabled', true);
        var table = $('#tableKepala').DataTable( {
          "paging": true,
          "ajax": "<?php echo base_url('kk/loadTable/tmp_c/kepala'); ?>",
          "bLengthChange": true,
          "iDisplayLength": 10,
          "oLanguage": {
            "sZeroRecords": "Tidak Ada Data",
            "sSearch": "Pencarian _INPUT_",
            "sLengthMenu": "Tampilkan _MENU_ data",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty": "0 data",
            "oPaginate": {
              "sNext": "<i class='fa fa-angle-right'></i>",
              "sPrevious": "<i class='fa fa-angle-left'></i>"
            }
          },
          "columns": [
              { "data": "NIK" },
              { "data": "NamaLengkap" },
              { "data": "JenisKelamin" },
              { "data": "Alamat" },
              { "data": "Dusun" },
              { "data": "RT" },
              {
                sortable: false,
                "render": function ( data, type, row, meta ) {
                  return '<a id="data" class="btn btn-sm btn-primary" onclick="insert(this, \''+row.NIK+'\')" href="javascript:void(0)"><i class="fa fa-plus"></i></a>';
                }
              },
          ]
        });

        var tableAnggota = $('#tableAnggota').DataTable( {
          "paging": true,
          "ajax": "<?php echo base_url('kk/loadTable/tmp_c/anggota'); ?>",
          "bLengthChange": true,
          "iDisplayLength": 10,
          "oLanguage": {
            "sZeroRecords": "Tidak Ada Data",
            "sSearch": "Pencarian _INPUT_",
            "sLengthMenu": "Tampilkan _MENU_ data",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty": "0 data",
            "oPaginate": {
              "sNext": "<i class='fa fa-angle-right'></i>",
              "sPrevious": "<i class='fa fa-angle-left'></i>"
            }
          },
          "columns": [
              { "data": "NIK" },
              { "data": "NamaLengkap" },
              { "data": "JenisKelamin" },
              { "data": "Alamat" },
              { "data": "Dusun" },
              { "data": "RT" },
              {
                sortable: false,
                "render": function ( data, type, row, meta ) {
                  return '<a id="data" class="btn btn-sm btn-primary" onclick="insert2(this, \''+row.NIK+'\')" href="javascript:void(0)"><i class="fa fa-plus"></i></a>';
                }
              },
          ]
        });

      $(".pencarian").focusin(function() {
        if($('#txtnokk').val() != '') {
          $('#tableKepala').attr('style', 'width:100% !important');
          table.ajax.reload();
          $("#txtnokk").css({"border": "1px solid #d2d6de"});
          $("#modalKepala").modal('show');
        } else {
          $("#modalKonfirmasi").modal('show');
          $('#isi').text('No. Kartu Keluarga Harus Diisi');
          $('#txtnokk').focus().css({"border": "1px solid red"});
        }    
      });

      $('#tambah_keluarga').click(function() {
        $('#tableAnggota').attr('style', 'width:100% !important');
          tableAnggota.ajax.reload();
        $("#modalAnggota").modal('show');
      });

      $(document).on('click','.remove', function() {
        $(this).closest('tr').remove();
        var nik = $(this).attr('data-id');
        var nokk = $('#txtnokk').val();

        $.ajax({
          url: '<?php echo base_url('kk/hapus_temporary/tmp_c'); ?>',
          type : 'post',
          data : { 'NIK' : nik },
          dataType: 'json',
          success: function(data) {
            
          },
          error: function(error) {
            
          }
        })
      });

      $('#simpan').click(function() {
        var nokk = $('#txtnokk').val();
        
        $.ajax({
          url: '<?php echo base_url('kk/simpan_kartu_keluarga'); ?>',
          type : 'post',
          data : { 'NoKK' : nokk},
          dataType: 'json',
          success: function(simpankk) {
            if(simpankk.success) {
              alert('data berhasil');
            }
            
          }
        })
      })

      /*
      $('#simpan_kk').click(function() {
        var nokk = $('#txtnokk').val();

        $.ajax({
          url: '<?php //echo base_url('kk/get_temporary_kk/tmp_c/kepala/'); ?>'+nokk,
          type : 'post',
          dataType: 'json',
          success: function(response1) {
            console.log(response1);
            $.each(response1, function(key,val1) {
              $('#kepalakeluarga').text(val1.NamaLengkap);
              $('#alamat').text(val1.Alamat);
              $('#rtrw').text(val1.RT+'/'+val1.RW);
              $('#desa').text(val1.Kelurahan);
              $('#kodepos').text(val1.KodePos);
              $('#kecamatan').text(val1.Kecamatan);
              $('#kabupaten').text(val1.Kabupaten);
              $('#provinsi').text(val1.Provinsi);
            })
          }
        })

        $.ajax({
            url: '<?php //echo base_url('kk/get_temporary_kk/tmp_c/anggota/'); ?>'+nokk,
            type : 'post',
            //data : { 'NoKK' : nokk},
            dataType: 'json',
            success: function(response) {
              $("#tablePreviewKK1").find("tr:gt(0)").remove();
              $("#tablePreviewKK2").find("tr:gt(0)").remove();
              var no = 1;
              $.each(response, function(key,val) {

                var html = '';
                html += '<tr>';
                html += '<td>'+no+'</td>';
                html += '<td>'+val.NamaLengkap+'</td>';
                html += '<td>'+val.NIK+'</td>';
                html += '<td>'+val.JenisKelamin+'</td>';
                html += '<td>'+val.Alamat+'</td>';
                html += '<td>'+val.TanggalLahir+'</td>';
                html += '<td>'+val.Agama+'</td>';
                html += '<td>'+val.PendidikanKK+'</td>';
                html += '<td>'+val.Pekerjaan+'</td>';
                html += '<td>';
                html += '</tr>';

                $('#tablePreviewKK1').append(html);

                var html = '';
                html += '<tr>';
                html += '<td>'+no+'</td>';
                html += '<td>'+val.StatusPerkawinan+'</td>';
                html += '<td>'+val.StatusHubunganDalamKeluarga+'</td>';
                html += '<td>'+val.Kewarganegaraan+'</td>';
                html += '<td>'+val.NomorPaspor+'</td>';
                html += '<td>'+val.NomorKitasKitap+'</td>';
                html += '<td>'+val.NamaAyah+'</td>';
                html += '<td>'+val.NamaIbu+'</td>';
                html += '<td>';
                html += '</tr>';

                $('#tablePreviewKK2').append(html);
                no++;
              });
            }
        })

        $('#nokk').text(nokk);
        $('#modalPreviewKK').modal('show');
      })
      */
  });

  function loadtable(param) {
    var nokk = $('#txtnokk').val();
    $.ajax({
      url: '<?php echo base_url('kk/loadTableKK/tmp_c/'); ?>'+ param,
      type : 'post',
      data : { 'NomorKK' : nokk },
      dataType: 'json',
      success: function(response) {
        $.each(response.data, function(key,val) {
          var html = '';
          html += '<tr>';
          html += '<td>'+val.NIK+'</td>';
          html += '<td>'+val.NamaLengkap+'</td>';
          html += '<td>'+val.JenisKelamin+'</td>';
          html += '<td>'+val.TempatLahir+'</td>';
          html += '<td>'+val.TanggalLahir+'</td>';
          html += '<td>'+val.Agama+'</td>';
          html += '<td>'+val.Pendidikan+'</td>';
          html += '<td>'+val.Pekerjaan+'</td>';
          html += '<td>';
          if(param != 'kepala') {
            html += '<a data-id='+val.NIK+' type="button" id="konfirmasi" class="btn btn-sm btn-danger remove"><i class="fa fa-trash"></i></a>';
          }
          html += '</td>';
          html += '</tr>';

          $('#tableKK').append(html);
        });
      },
      error: function(error) {

      }
    })
  }

  function insert(txt, data) {
    $('#simpan_kk').attr('disabled', false);
    var nik = data;
    var nokk = $('#txtnokk').val();

    $.ajax({
      url: '<?php echo base_url('kk/simpan_tmp'); ?>',
      type : 'post',
      data : { 'NIK' : nik, 'NoKK' : nokk, 'status' : 'kepala', 'table' : 'tmp_c' },
      dataType: 'json',
      success: function(data) {
        loadtable('kepala');
        $("#modalKepala").modal('hide');
      },
      error: function(error) {
            
      }
    }) 
  }

  function insert2(txt, data) {
    var nik = data;
    var nokk = $('#txtnokk').val();
    
    $.ajax({
      url: '<?php echo base_url('kk/simpan_tmp'); ?>',
      type : 'post',
      data : { 'NIK' : nik, 'NoKK' : nokk, 'status' : 'anggota', 'table' : 'tmp_c' },
      dataType: 'json',
      success: function(data) {
        
        loadtable('kepala');
        loadtable('anggota');
        $("#modalAnggota").modal('hide');
      },
      error: function(error) {
            
      }
    })
  }

</script>

