<script src="<?php echo base_url('assets/components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<form method="post" id="form_kk">
  <div class="box box-primary">
    <div class="box-header with-border">
      <?php foreach ($detail_kk as $value) { ?>
      <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title">
            <a href="<?php echo base_url('kk/daftar_kk'); ?>">
              <i class="fa fa-mail-reply"></i>
            </a>
            <span>Edit Master KK</span>
          </h3>
        </div>
        <div class="col-lg-6 text-right">
          <button class="btn btn-sm btn-default">Batal</button>
          <button type="button" class="btn btn-sm btn-primary" id="simpan_kk">Simpan</button>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-6">
        <div class="box-body">
          <div class="form-group">
            <label class="control-label">Nomor Kartu Keluarga</label>
            <input type="text" class="form-control" id="txtnokk" name="txtnokk" value="<?php echo $value['NomorKK']; ?>" disabled>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="box-body">
          <div class="form-group">
            <label class="control-label">NIK Kepala Keluarga</label>
            <input type="text" class="form-control" name="txtnik"  value="<?php echo $value['NIK']; ?>" disabled">
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
                    <td><?php echo $value['NamaLengkap']; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $value['Alamat']; ?></td>
                  </tr>
                  <tr>
                    <td>RT/RW</td>
                    <td>:</td>
                    <td><?php echo $value['RT'].'/'.$value['RW']; ?></td>
                  </tr>
                  <tr>
                    <td>Desa/Kelurahan</td>
                    <td>:</td>
                    <td><?php echo $value['Kelurahan']; ?></td>
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
                    <td><?php echo $value['Kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Kabupaten/Kota</td>
                    <td>:</td>
                    <td><?php echo $value['Kabupaten']; ?></td>
                  </tr>
                  <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td><?php echo $value['KodePos']; ?></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td><?php echo $value['Provinsi']; ?></td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <?php } ?>
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

<div class="modal fade" id="modalUpdate" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <i class="fa fa-question-circle"></i> <span>Konfirmasi</span>
          </h4>
      </div>
      <div class="modal-body">
        <label class="control-label">Data Diri</label>
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <td style="width: 35%;">Nama Lengkap</td>
                    <td style="width:10px;">:</td>
                    <td><span id="namalengkap"></span></td>
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
        <div class="form-group">
            <label class="control-label">Alasan</label>
            <select class="form-control" name="ddlKeterangan" id="keterangan">
              <option value="Kematian">Kematian</option>
              <option value="Kepindahan">Kepindahan</option>
              <option value="Pernikahan">Pernikahan</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>                         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a id="update_kk" data-id="0" class="btn btn-primary update">Simpan</a>
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
            <i class="fa fa-question-circle"></i> <span>Konfirmasi Kartu Keluarga</span>
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
    loadtable();

        var tableAnggota = $('#tableAnggota').DataTable( {
          "paging": true,
          "ajax": "<?php echo base_url('kk/loadTable/tmp_u/anggota'); ?>",
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
              { "data": "TempatLahir" },
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

      $('#tambah_keluarga').click(function() {
        $('#tableAnggota').attr('style', 'width:100% !important');
          tableAnggota.ajax.reload();
        $("#modalAnggota").modal('show');
      });

      $(document).on('click','#update_kk', function() {
        var nik = $(this).attr('data-id');
        $('#modalUpdate').modal('hide');
      })

      $(document).on('click','.remove', function() {
        $(this).closest('tr').remove();
        var nik = $(this).attr('data-id');
        var nokk = $('#txtnokk').val();
        var ket = $('#keterangan').val();
        
        $.ajax({
          url: '<?php echo base_url('kk/hapus_tmp'); ?>',
          type : 'post',
          data : { 'NIK' : nik , 'table' : 'tmp_u', 'ket' : ket },
          dataType: 'json',
          success: function(data) {
            $("#tableKK").find("tr:gt(1)").remove();
            loadtable();
            alert('Hapus data sukses');
          },
          error: function(error) {
            
          }
        })
      });

      $(document).on('click','#konfirmasi', function() {
        $('#modalUpdate').modal('show');
        var nik = $(this).attr('data-id');
        $('#update_kk').attr('data-id',nik);
          $.ajax({
            url: '<?php echo base_url('kk/detail_penduduk_by_nik/'); ?>'+nik,
            type : 'post',
            //data : { 'NIK' : nik },
            dataType: 'json',
            success: function(response) {
              console.log(response);
              $.each(response, function(key,val) {
                $('#namalengkap').text(val.NamaLengkap);
                $('#alamat').text(val.Alamat);
                $('#rtrw').text(val.RT+'/'+val.RW);
                $('#desa').text(val.Kelurahan);
                $('#kodepos').text(val.KodePos);
                $('#kecamatan').text(val.Kecamatan);
                $('#kabupaten').text(val.Kabupaten);
                $('#provinsi').text(val.Provinsi);
              })
            },
            error: function(error) {

            }
          })
      })
      
      $('#simpan_kk').click(function() {
        var nokk = $('#txtnokk').val();

        $.ajax({
          url: '<?php echo base_url('kk/detail_penduduk_join_temp/kepala/m_temp_kk_update'); ?>',
          type : 'post',
          dataType: 'json',
          success: function(response1) {
            $.each(response1, function(key,val1) {
              $('#kepalakeluarga').text(val1.NamaLengkap);
              $('#alamat').text(val1.Alamat);
              $('#rtrw').text(val1.AlamatRT+'/'+val1.AlamatRW);
              $('#desa').text(val1.AlamatKelurahan);
              $('#kodepos').text(val1.AlamatKodePos);
              $('#kecamatan').text(val1.AlamatKecamatan);
              $('#kabupaten').text(val1.AlamatKabupaten);
              $('#provinsi').text(val1.AlamatProvinsi);
            })
          }
        })

        $.ajax({
            url: '<?php echo base_url('kk/detail_kk_temp/m_temp_kk_update'); ?>',
            type : 'post',
            data : { 'NoKK' : nokk},
            dataType: 'json',
            success: function(response) {
              $("#tablePreviewKK1").find("tr:gt(0)").remove();
              $("#tablePreviewKK2").find("tr:gt(0)").remove();

              $.each(response, function(key,val) {

                var html = '';
                html += '<tr>';
                html += '<td>'+no+'</td>';
                html += '<td>'+val.NamaLengkap+'</td>';
                html += '<td>'+val.NIK+'</td>';
                html += '<td>'+val.JenisKelamin+'</td>';
                html += '<td>'+val.AlamatTempatLahir+'</td>';
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
                html += '<td>'+val.StatusKawin+'</td>';
                html += '<td>'+val.HubunganDalamKeluarga+'</td>';
                html += '<td>'+val.Kewarganegaraan+'</td>';
                html += '<td>'+val.NomorPaspor+'</td>';
                html += '<td>'+val.NomorKitasKitap+'</td>';
                html += '<td>'+val.NamaAyah+'</td>';
                html += '<td>'+val.NamaIbu+'</td>';
                html += '<td>';
                html += '</tr>';

                $('#tablePreviewKK2').append(html);
              });
            }
        })

        $('#nokk').text(nokk);
        $('#modalPreviewKK').modal('show');
      })
  });

  function loadtable() {
    var nokk = $('#txtnokk').val();
    $.ajax({
      url: '<?php echo base_url('kk/loadTableKK/tmp_u/anggota'); ?>',
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
          html += '<a data-id='+val.NIK+' type="button" id="konfirmasi" class="btn btn-sm btn-danger konfirmasi"><i class="fa fa-trash"></i></a>';
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
    var nik = data;
    $.ajax({
      url: '<?php echo base_url('kk/simpan_tmp/temp_u'); ?>',
      type : 'post',
      data : { 'NIK' : nik },
      dataType: 'json',
      success: function(response) {

      }
    })

    $('#modalAnggota').modal('hide');
  }

</script>

