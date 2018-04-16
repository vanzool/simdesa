<form method="post">
<div class="row">
    <div class="col-lg-12">
        <div class="header-title text-center">
            <h3 style="margin-top: 0;">KARTU KELUARGA</h3>
        </div>
        <div class="header-subtitle text-center">
            <h4 style="margin-top: 0;margin-bottom: 50px; ">NO. <span id="nokk"></span></h4>
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

    </div>
  </div>



<table class="table table-bordered" id="tablePreviewKK1">
    <thead>
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Lengkap</th>
            <th style="text-align: center;">NIK</th>
            <th style="text-align: center;">Jenis Kelamin</th>
            <th style="text-align: center;">Tempat Lahir</th>
            <th style="text-align: center;">Tanggal Lahir</th>
            <th style="text-align: center;">Agama</th>
            <th style="text-align: center;">Pendidikan</th>
            <th style="text-align: center;">Pekerjaan</th>
        </tr>
        <tr>
            <th style="text-align: center;"></th>
            <th style="text-align: center;">(1)</th>
            <th style="text-align: center;">(2)</th>
            <th style="text-align: center;">(3)</th>
            <th style="text-align: center;">(4)</th>
            <th style="text-align: center;">(5)</th>
            <th style="text-align: center;">(6)</th>
            <th style="text-align: center;">(7)</th>
            <th style="text-align: center;">(8)</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<br>
<table class="table table-bordered" id="tablePreviewKK2">
    <thead>
        <tr>
            <th style="text-align: center;vertical-align: middle;" rowspan="2">No</th>
            <th style="text-align: center;vertical-align: middle;" rowspan="2">Status Perkawinan</th>
            <th style="text-align: center;vertical-align: middle;" rowspan="2">Status Hubungan<br> Dengan Keluarga</th>
            <th style="text-align: center;vertical-align: middle;" rowspan="2">Kewarganegaraan</th>
            <th style="text-align: center;" colspan="2">Dokumen Imigrasi</th>
            <th style="text-align: center;" colspan="2">Nama Orang Tua</th>
        </tr>
        <tr>
            <th style="text-align: center;">No.Paspor</th>
            <th style="text-align: center;">No. KITAS / KITAP</th>
            <th style="text-align: center;">Ayah</th>
            <th style="text-align: center;">Ibu</th>
        </tr>
        <tr>
            <th style="text-align: center;"></th>
            <th style="text-align: center;">(9)</th>
            <th style="text-align: center;">(10)</th>
            <th style="text-align: center;">(11)</th>
            <th style="text-align: center;">(12)</th>
            <th style="text-align: center;">(13)</th>
            <th style="text-align: center;">(14)</th>
            <th style="text-align: center;">(15)</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</form>
<script src="<?php echo base_url('assets/components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
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