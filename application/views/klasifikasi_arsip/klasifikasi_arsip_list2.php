<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/rowGroup.dataTables.min.css">
<style>
tr.group,
tr.group:hover {
    background-color: #ddd !important;
}
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">DAFTAR KLASIFIKASI ARSIP</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('klasifikasi_arsip/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-warning btn-sm"'); ?>
		<?php echo anchor(site_url('klasifikasi_arsip/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
        <?php echo anchor(site_url('klasifikasi_arsip/pdf'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF', 'target="BLANK" class="btn btn-danger btn-sm"'); ?> 

    </div>
        <table class="table table-bordered table-striped display" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No.</th>
        		    <th>Indeks</th>
        		    <th>Kode Folder</th>
        		    <th>Kode Surat</th>
        		    <th>Masalah</th>
        		    <th>Keterangan</th>
        		    <th width="200px">Aksi</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
<script src="<?php echo base_url('assets/datatables/jquery-3.5.1.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.rowGroup.min.js') ?>"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "klasifikasi_arsip/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "indeks"},{"data": "kode_folder"},{"data": "kode_surat"},{"data": "masalah"},{"data": "keterangan"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[2, 'desc']],
                    rowGroup: {
                        dataSrc: 2
                    },
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>