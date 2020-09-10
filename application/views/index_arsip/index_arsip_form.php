<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $button; ?> DATA INDEKS ARSIP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
             
<table class='table table-bordered'>        

	    <tr><td width='200'>Nama (Filing Segment) <?php echo form_error('filing_segment') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="filing_segment" id="filing_segment" placeholder="Filing Segment" value="<?php echo $filing_segment; ?>" /></td></tr>
	    <tr><td width='200'>Indexing Order <?php echo form_error('indexing_order') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="indexing_order" id="indexing_order" placeholder="Indexing Order" value="<?php echo $indexing_order; ?>" /></td></tr>
	    <tr><td width='200'>Kode Indeks <?php echo form_error('kode_index') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="kode_index" id="kode_index" placeholder="Kode Index" value="<?php echo $kode_index; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button> 
	    <a href="<?php echo site_url('index_arsip') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#filing_segment").autocomplete({
            source: "<?php echo base_url('index_arsip/filing_segmentautocomplate')?>",
            minLength: 1
        });	
        $("#indexing_order").autocomplete({
            source: "<?php echo base_url('index_arsip/indexing_orderautocomplate')?>",
            minLength: 1
        });	
        $("#kode_index").autocomplete({
            source: "<?php echo base_url('index_arsip/kode_indexautocomplate')?>",
            minLength: 1
        });				
    });
</script>