<div class="content-wrapper">    
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $button; ?> DATA DAFTAR ARSIP</h3>
                    </div>
                    <form action="<?php echo $action; ?>" method="post">
                
                    <table class='table table-bordered>'        

                	    <tr><td width='200'>No. Berkas <?php echo form_error('no_berkas') ?></td><td><input type="text" class="form-control" name="no_berkas" id="no_berkas" placeholder="No Berkas" value="<?php echo $no_berkas; ?>" /></td></tr>
                	    <tr><td width='200'>No. Item Arsip <?php echo form_error('no_item_arsip') ?></td><td><input type="text" class="form-control" name="no_item_arsip" id="no_item_arsip" placeholder="No Item Arsip" value="<?php echo $no_item_arsip; ?>" /></td></tr>
                	    <tr><td width='200'>Kode Klasifikasi <?php echo form_error('kode_klasifikasi') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="kode_klasifikasi" id="kode_klasifikasi" placeholder="Kode Klasifikasi" value="<?php echo $kode_klasifikasi; ?>" /></td></tr>
                	    
                        <tr><td width='200'>Uraian Informasi Arsip <?php echo form_error('uraian') ?></td><td> <textarea class="form-control" rows="3" name="uraian" id="uraian" placeholder="Uraian"><?php echo $uraian; ?></textarea></td></tr>
                	    <tr><td width='200'>Tanggal (Surat Teregistrasi) <?php echo form_error('tgl_registrasi') ?></td><td><input type="date" class="form-control" name="tgl_registrasi" id="tgl_registrasi" placeholder="Tgl Registrasi" value="<?php echo $tgl_registrasi; ?>" /></td></tr>
                	    <tr><td width='200'>Jumlah <?php echo form_error('jumlah') ?></td><td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td></tr>
                	    
                        <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td></tr>
                	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button> 
                	    <a href="<?php echo site_url('daftar_arsip') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
    	            </table>
                    </form>        
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">KODE KLASIFIKASI ARSIP</h3>
                    </div>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th>Kode Surat</th>
                                <th>Masalah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($klasifikasi_arsip as $x) { ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $x->kode_surat;?></td>
                                <td><?php echo $x->masalah;?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#kode_klasifikasi").autocomplete({
            source: "<?php echo base_url('daftar_arsip/kode_klasifikasiautocomplate')?>",
            minLength: 1
        });				
    });
</script>