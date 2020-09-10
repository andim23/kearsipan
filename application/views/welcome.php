<div class="content-wrapper">
    <section class="content">
    	<div class="row">    		
     		<div class="col-md-12">
        		<?php echo alert('alert-info', 'Selamat Datang '.$this->session->userdata('full_name'), 'Selamat Datang Di Halaman Utama Sistem Informasi Kearsipan')?>
    		</div>
    	</div>

    	<div class="row">
     		<div class="col-md-12">
        		<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Sistem Informasi Kearsipan</h3>

		          <div class="box-tools pull-right">
		            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
		                    title="Collapse">
		              <i class="fa fa-minus"></i></button>
		            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
		              <i class="fa fa-times"></i></button>
		          </div>
		        </div>
		        <div class="box-body">
		          Aplikasi ini bertujuan memberikan gambaran umum kepada peserta didik untuk memahami kegiatan dan proses pengarsipan dokumen surat. Aplikasi ini sederhana dan sangat mudah dipahami. 
		        </div>
		        <!-- /.box-body -->
		        <div class="box-footer">
		          Versi 1.1-2020
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->
		    </div>
		</div>
    	<div class="row">
    		<div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-purple">
	            <div class="inner">
	              <h3>150</h3>

	              <p>Agenda Surat Masuk</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-android-mail"></i>
	            </div>
	            <a href="<?php echo base_url('agenda_surat_masuk');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
    		<div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>150</h3>

	              <p>Surat Keluar</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-ios-email"></i>
	            </div>
	            <a href="<?php echo base_url('agenda_surat_keluar');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
    		<div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3>150</h3>

	              <p>Daftar Isi Arsip</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-android-list"></i>
	            </div>
	            <a href="<?php echo base_url('daftar_arsip');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
    		<div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3>150</h3>

	              <p>Daftar Index Arsip</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-ios-list"></i>
	            </div>
	            <a href="<?php echo base_url('index_arsip');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	    </div>
    </section> 

</div>
