<form method="post">
  <div class="box box-primary">
    <div class="box-header with-border">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title">Tambah Master Penduduk</h3>
        </div>
        <div class="col-lg-6 text-right">
          <button class="btn btn-sm btn-default">Batal</button>
          <button class="btn btn-sm btn-primary" id="simpan_penduduk">Simpan</button>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="box-body">
          <h3 class="heading">
            UMUM
          </h3>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>
                  <select class="form-control" name="ddlkelamin">
                    <?php foreach ($ReffJenisKelamin as $key => $value) { ?>
                      <option value=""><?php echo $value['JenisKelamin']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Agama</label>
                  <select class="form-control" name="ddlkelamin">
                    <?php foreach ($ReffAgama as $value) { ?>
                      <option value=""><?php echo $value['Agama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <label class="control-label">NIK</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Status Kepemilikan KTP</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffStatusKepemilikanKTP as $value) { ?>
                    <option value=""><?php echo $value['StatusKepemilikanKTP']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label">Status Rekam</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffStatusRekamKTP as $key => $value) { ?>
                    <option value=""><?php echo $value['StatusRekam']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Nomor Kartu Keluarga Sebelumnya</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Hubungan dalam Keluarga</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffHubunganDalamKeluarga as $value) { ?>
                    <option value=""><?php echo $value['HubunganDalamKeluarga']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label">Status Penduduk</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffStatusPenduduk as $key => $value) { ?>
                    <option value=""><?php echo $value['StatusPenduduk']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <h3 class="heading">
            KELAHIRAN
          </h3>
          <div class="form-group">
            <label class="control-label">Nomor Akta Kelahiran</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
              <div class="col-sm-6">
                <label class="control-label">Tanggal Lahir</label>
                <input data-date-format="dd/mm/yyyy" type="text" class="form-control" name="txttanggallahir" id="datepicker" placeholder="dd/mm/yyy">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Tempat Dilahirkan</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffTempatDilahirkan as $key => $value) { ?>
                    <option value=""><?php echo $value['TempatLahir']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label">Metode Kelahiran</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffMetodeKelahiran as $key => $value) { ?>
                    <option value=""><?php echo $value['MetodePersalinan']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label">Alamat Tempat Lahir</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Jenis Kelahiran</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffJenisKelahiran as $key => $value) { ?>
                    <option value=""><?php echo $value['JenisKelahiran']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label">Kelahiran Anak Ke</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Penolong Kelahiran</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffPenolongKelahiran as $key => $value) { ?>
                    <option value=""><?php echo $value['PenolongKelahiran']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-3">
                <label class="control-label">Berat (Kg)</label>
                <input type="text" class="form-control" name="txtnik">
              </div>
              <div class="col-sm-3">
                <label class="control-label">Panjang (Cm)</label>
                <input type="text" class="form-control" name="txtnik">
              </div>
            </div>
          </div>
          <h3 class="heading">
            KESEHATAN
          </h3>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Golongan Darah</label>
                <select class="form-control" name="ddlgolongandarah">
                  <?php foreach ($ReffGolonganDarah as $key => $value) { ?>
                    <option value=""><?php echo $value['GolonganDarah']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label">Penyandang Cacat</label>
                <select class="form-control" name="ddlpenyandangcacat">
                  <?php foreach ($ReffCacat as $key => $value) { ?>
                    <option value=""><?php echo $value['StatusCacat']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Akseptor KB</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffAkseptorKB as $key => $value) { ?>
                    <option value=""><?php echo $value['AkseptorKB']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label">Status Kehamilan</label>
                <select class="form-control" name="ddlkelamin">
                  <?php foreach ($ReffStatusKehamilan as $key => $value) { ?>
                    <option value=""><?php echo $value['StatusKehamilan']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="box-body">
          <h3 class="heading">
            ALAMAT
          </h3>
          <div class="form-group">
            <label class="control-label">Alamat Sebelumnya</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <label class="control-label">Alamat Sekarang</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <label class="control-label">Dusun / Dukuh</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">RT</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
              <div class="col-sm-6">
                <label class="control-label">RW</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Kelurahan / Desa</label>
            <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Kecamatan</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
              <div class="col-sm-6">
                <label class="control-label">Kabupaten</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Provinsi</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
              <div class="col-sm-6">
                <label class="control-label">Kode Pos</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
              <div class="col-sm-6">
                <label class="control-label">Nomor Handphone</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nomor Induk Keluarga">
              </div>
            </div>
          </div>
          <h3 class="heading">
            PENDIDIKAN DAN PEKERJAAN
          </h3>
          <div class="form-group">
            <label class="control-label">Pendidikan Dalam Kartu Keluarga / Terakhir</label>
            <select class="form-control" name="ddlkelamin">
              <?php foreach ($ReffPendidikanDalamKK as $key => $value) { ?>
                <option value=""><?php echo $value['PendidikanKK']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Pendidikan Sedang Ditempuh</label>
            <select class="form-control" name="ddlkelamin">
              <?php foreach ($ReffPendidikanSedangDitempuh as $key => $value) { ?>
                <option value=""><?php echo $value['PendidikanTempuh']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Pekerjaan</label>
            <select class="form-control" name="ddlkelamin">
              <?php foreach ($ReffPekerjaan as $key => $value) { ?>
                <option value=""><?php echo $value['Pekerjaan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <h3 class="heading">
            ORANG TUA
          </h3>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Nama Ayah</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nama Ayah">
              </div>
              <div class="col-sm-6">
                <label class="control-label">NIK Ayah</label>
                <input type="text" class="form-control" name="txtnik" placeholder="NIK Ayah">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Nama Ibu</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nama Ibu">
              </div>
              <div class="col-sm-6">
                <label class="control-label">NIK Ibu</label>
                <input type="text" class="form-control" name="txtnik" placeholder="NIK Ibu">
              </div>
            </div>
          </div>
          <h3 class="heading">
            KEWARGANEGARAAN
          </h3>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Kewarganegaraan</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nama Ibu">
              </div>
              <div class="col-sm-6">
                <label class="control-label">Nomor KITAP / KITAS</label>
                <input type="text" class="form-control" name="txtnik" placeholder="NIK Ibu">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label class="control-label">Nomor Paspor</label>
                <input type="text" class="form-control" name="txtnik" placeholder="Nama Ibu">
              </div>
              <div class="col-sm-6">
                <label class="control-label">Berlaku Hingga</label>
                <input type="text" class="form-control" name="txtnik" placeholder="NIK Ibu">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>