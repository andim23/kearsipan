<!doctype html>
<html> 
    <head>
        <title>DAFTAR ISI ARSIP</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>

        @page Section1 {size:595.45pt 841.7pt; margin:1.0in 1.25in 1.0in 1.25in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
        div.Section1 {page:Section1;}

        @page Section2 {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:0.5in 0.5in 0.5in 0.5in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
        div.Section2 {page:Section2;}

            .f1 { 
                font-family: Arial, Helvetica, sans-serif;
                font-size: 18px;
                font-weight: bold;
            }
            .f2 {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 16px;
                font-weight: bold;
            }
            .f3 {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 16px;
            }
            .f4 {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
            }
            .center {
                text-align: center;
            }
            
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }

        </style>
    </head>
    <body>
    <div class="Section2">
        <table style="width:100%; margin-top: 5px;border:0px;">
            <tr style="border-bottom: 1px solid">
                <td width="100" style="border-bottom: 1px solid">
                    <img width="100" height="100" src="<?php echo $logo_instansi;?>">
                </td>
                <td style="border-bottom: 1px solid">
                    <span class="f1"><?php echo $nama_instansi;?></span><br>
                    <span class="f3"><?php echo $alamat_instansi;?><br>
                    Telp/Fax: <?php echo $notelp_instansi;?></span><br>
                    <span class="f4">Email: <?php echo $email_instansi." Website: ".$website_instansi;?></span>
                    
                </td>
            </tr>
        </table>
        <br><br>
        <span class="f2"><center>DAFTAR ISI ARSIP<br>Bulan: ...</center></span>
        <br><table class="word-table" style="margin-bottom: 10px">
            <tr style="background-color: #cec9c9">
        <th style="text-align: center" width="30">No. Berkas</th>
        <th style="text-align: center" width="30">No. Item Arsip</th>
        <th style="text-align: center" width="30">Kode Klasifikasi</th>
        <th style="text-align: center" width="70">Uraian Informasi Arsip</th>
        <th style="text-align: center" width="50">Tgl. (Surat Teregistrasi)</th>
        <th style="text-align: center" width="20">Jumlah</th>
        <th style="text-align: center" width="40">Keterangan</th>
        
            </tr><?php
            foreach ($daftar_arsip_data as $daftar_arsip)
            {
                ?>
                <tr>
              <td><?php echo $daftar_arsip->no_berkas ?></td>
              <td><?php echo $daftar_arsip->no_item_arsip ?></td>
              <td><?php echo $daftar_arsip->kode_klasifikasi ?></td>
              <td><?php echo $daftar_arsip->uraian ?></td>
              <td><?php echo shortdate_indo($daftar_arsip->tgl_registrasi) ?></td>
              <td style="text-align: center"><?php echo $daftar_arsip->jumlah ?></td>
              <td><?php echo $daftar_arsip->keterangan ?></td>    
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    </body>
</html>