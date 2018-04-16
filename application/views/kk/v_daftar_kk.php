<div class="box box-primary">
    <div class="box-header with-border">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title"><?php echo $breadcrumb; ?></h3>
        </div>
        <div class="col-lg-6 text-right">
          <a href="<?php echo base_url('kk/tambah_kk'); ?>" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i> <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="box-body">
          <table id="tableKK" class="table table-bordered table-striped">
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
              <?php foreach ($daftar_kk as $value) { ?>
                <tr>
                  <td><?php echo $value['NIK']; ?></td>
                  <td><?php echo $value['NamaLengkap']; ?></td>
                  <td><?php echo $value['JenisKelamin']; ?></td>
                  <td><?php echo $value['TempatLahir']; ?></td>
                  <td><?php echo $value['AlamatKelurahan']; ?></td>
                  <td><?php echo $value['AlamatRT'].'/'.$value['AlamatRW']; ?></td>
                  <td style="max-width: 75px !important" class="text-center">
                    <a href data-id="<?php echo $value['NomorKartuKeluarga']; ?>" id="lihat_kk" class="btn btn-sm btn-info">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo base_url('kk/edit_kk/'.$value['NomorKartuKeluarga']); ?>" class="btn btn-sm btn-success">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table> 
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
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url('assets/components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
        var table = $('#tableKK').DataTable( {
          "paging": true,
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
          }
        });

    $(document).on('click','#lihat_kk', function() {
        var kk = $(this).attr('data-id');
        $('#nokk').text(kk);
          $.ajax({
            url: '<?php echo base_url('master/detail_kepala_keluarga'); ?>',
            type : 'post',
            data : { 'NoKK' : kk },
            dataType: 'json',
            success: function(response) {
              alert(response);

              $.each(response, function(key,val) {
                $('#kepalakeluarga').text(val.NamaLengkap);
                $('#alamat').text(val.Alamat);
                $('#rtrw').text(val.RT+'/'+val.RW);
                $('#desa').text(val.Kelurahan);
                $('#kodepos').text(val.KodePos);
                $('#kecamatan').text(val.Kecamatan);
                $('#kabupaten').text(val.Kabupaten);
                $('#provinsi').text(val.Provinsi);
              })

              $.ajax({
                url: '<?php echo base_url('master/detail_anggota_keluarga'); ?>',
                type : 'post',
                data : { 'NoKK' : kk },
                dataType: 'json',
                success: function(response1) {

                  $.each(response1, function(key,val1) {
                    var html = '';
                    html += '<tr>';
                    html += '<td>'+val1.NamaLengkap+'</td>';
                    html += '<td>'+val1.NIK+'</td>';
                    html += '<td>'+val1.JenisKelamin+'</td>';
                    html += '<td>'+val1.TempatLahir+'</td>';
                    html += '<td>'+val1.TanggalLahir+'</td>';
                    html += '<td>'+val1.Agama+'</td>';
                    html += '<td>'+val1.PendidikanKK+'</td>';
                    html += '<td>'+val1.Pekerjaan+'</td>';
                    html += '<td>';
                    html += '</tr>';

                    $('#tablePreviewKK1').append(html);

                    var html = '';
                    html += '<tr>';
                    html += '<td>'+val1.StatusKawin+'</td>';
                    html += '<td>'+val1.HubunganDalamKeluarga+'</td>';
                    html += '<td>'+val1.Kewarganegaraan+'</td>';
                    html += '<td>'+val1.NomorPaspor+'</td>';
                    html += '<td>'+val1.NomorKitasKitap+'</td>';
                    html += '<td>'+val1.NamaAyah+'</td>';
                    html += '<td>'+val1.NamaIbu+'</td>';
                    html += '<td>';
                    html += '</tr>';

                    $('#tablePreviewKK2').append(html);
                  })
                },
                error: function(error) {

                }
              })
            },
            error: function(error) {

            }
          })
          $('#modalPreviewKK').modal('show');
          return false;
    })

    $('#simpan').click(function() {
        $.ajax({
          url: '<?php echo base_url('master/simpan_kk'); ?>',
          type : 'post',
          dataType: 'json',
          success: function(response) {
            if(response.success != false) {
              alert('Data berhasil di simpan');
            } else {
              alert('Eror Data di simpan');
            }
          }
        })
        $('#modalPreviewKK').modal('hide');
    })
  })
</script>