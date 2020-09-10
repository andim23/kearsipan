<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftar_arsip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Daftar_arsip_model');
        $this->load->model('Klasifikasi_arsip_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','daftar_arsip/daftar_arsip_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Daftar_arsip_model->json();
    }

    public function read($id) 
    {
        $row = $this->Daftar_arsip_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id' => $row->id,
        		'no_berkas' => $row->no_berkas,
        		'no_item_arsip' => $row->no_item_arsip,
        		'kode_klasifikasi' => $row->kode_klasifikasi,
        		'uraian' => $row->uraian,
        		'tgl_registrasi' => $row->tgl_registrasi,
        		'jumlah' => $row->jumlah,
        		'keterangan' => $row->keterangan,
    	    );
            $this->template->load('template','daftar_arsip/daftar_arsip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftar_arsip'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'TAMBAH',
            'action' => site_url('daftar_arsip/create_action'),
	    'id' => set_value('id'),
	    'no_berkas' => set_value('no_berkas'),
	    'no_item_arsip' => set_value('no_item_arsip'),
	    'kode_klasifikasi' => set_value('kode_klasifikasi'),
	    'uraian' => set_value('uraian'),
	    'tgl_registrasi' => set_value('tgl_registrasi'),
	    'jumlah' => set_value('jumlah'),
	    'keterangan' => set_value('keterangan'),
        'klasifikasi_arsip' => $this->Klasifikasi_arsip_model->get_kode_surat(),
	);
        $this->template->load('template','daftar_arsip/daftar_arsip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_berkas' => $this->input->post('no_berkas',TRUE),
		'no_item_arsip' => $this->input->post('no_item_arsip',TRUE),
		'kode_klasifikasi' => $this->input->post('kode_klasifikasi',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'tgl_registrasi' => $this->input->post('tgl_registrasi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Daftar_arsip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('daftar_arsip'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Daftar_arsip_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'UPDATE',
                'action' => site_url('daftar_arsip/update_action'),
        		'id' => set_value('id', $row->id),
        		'no_berkas' => set_value('no_berkas', $row->no_berkas),
        		'no_item_arsip' => set_value('no_item_arsip', $row->no_item_arsip),
        		'kode_klasifikasi' => set_value('kode_klasifikasi', $row->kode_klasifikasi),
        		'uraian' => set_value('uraian', $row->uraian),
        		'tgl_registrasi' => set_value('tgl_registrasi', $row->tgl_registrasi),
        		'jumlah' => set_value('jumlah', $row->jumlah),
        		'keterangan' => set_value('keterangan', $row->keterangan),
                'klasifikasi_arsip' => $this->Klasifikasi_arsip_model->get_kode_surat(),
        	);
            $this->template->load('template','daftar_arsip/daftar_arsip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftar_arsip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'no_berkas' => $this->input->post('no_berkas',TRUE),
		'no_item_arsip' => $this->input->post('no_item_arsip',TRUE),
		'kode_klasifikasi' => $this->input->post('kode_klasifikasi',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
		'tgl_registrasi' => $this->input->post('tgl_registrasi',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Daftar_arsip_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('daftar_arsip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Daftar_arsip_model->get_by_id($id);

        if ($row) {
            $this->Daftar_arsip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('daftar_arsip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftar_arsip'));
        }
    }


    function kode_klasifikasiautocomplate(){
        autocomplate_json('klasifikasi_arsip', 'kode_surat');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_berkas', 'no berkas', 'trim|required');
	$this->form_validation->set_rules('no_item_arsip', 'no item arsip', 'trim|required');
	$this->form_validation->set_rules('kode_klasifikasi', 'kode klasifikasi', 'trim|required');
	$this->form_validation->set_rules('uraian', 'uraian', 'trim|required');
	$this->form_validation->set_rules('tgl_registrasi', 'tgl registrasi', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daftar_arsip.xls";
        $judul = "daftar_arsip";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "No Berkas");
	xlsWriteLabel($tablehead, $kolomhead++, "No Item Arsip");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Klasifikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Uraian");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Registrasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Daftar_arsip_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_berkas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_item_arsip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_klasifikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->uraian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_registrasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DAFTAR ISI ARSIP.doc");

        $data = array(
            'daftar_arsip_data' => $this->Daftar_arsip_model->get_all(),
            'start' => 0,
            'logo_instansi' => base_url('assets/foto_profil/').$this->session->userdata('logo_instansi'),
            'nama_instansi' => $this->session->userdata('nama_instansi'),
            'alamat_instansi' => $this->session->userdata('alamat_instansi'),
            'email_instansi' => $this->session->userdata('email_instansi'),
            'notelp_instansi' => $this->session->userdata('notelp_instansi'),
            'website_instansi' => $this->session->userdata('website_instansi'),
        );
        
        $this->load->view('daftar_arsip/daftar_arsip_doc',$data);
    }

    function pdf() {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(22,20,$pdf->Image(base_url('assets/foto_profil/').$this->session->userdata('logo_instansi'),10,10,20,20),0,0,'C');        
        $pdf->Cell(240,5,$this->session->userdata('nama_instansi'),0,1);
        $pdf->SetFont('Times', '', 12);   
        $pdf->Cell(22,5,'',0,0);  
        $pdf->Cell(240,5,$this->session->userdata('alamat_instansi'),0,1);
        $pdf->SetFont('Times', '', 12);   
        $pdf->Cell(22,5,'',0,0);  
        $pdf->Cell(240,5,'Telp/Fax: '.$this->session->userdata('notelp_instansi'),0,1);
        $pdf->SetFont('Times', '', 11);   
        $pdf->Cell(22,5,'',0,0);  
        $pdf->Cell(240,5,'Email: '.$this->session->userdata('email_instansi').' Website: '.$this->session->userdata('website_instansi'),0,1);
        $pdf->Cell(22,3,'','B',0);  
        $pdf->Cell(240,3,'','B',1);


        $pdf->Cell(10,5,'',0,1);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 11);
        // mencetak string 
        $pdf->Cell(270,6,'DAFTAR ISI ARSIP',0,1,'C');
        $pdf->Cell(270,6,'BULAN : ....',0,1,'C');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(30,6,'No. Berkas',1,0,'C');
        $pdf->Cell(30,6,'No. Item Arsip',1,0,'C');
        $pdf->Cell(30,6,'Kode Klasifikasi',1,0,'C');
        $pdf->Cell(70,6,'Uraian Informasi Arsip',1,0,'C');
        $pdf->Cell(50,6,'Tgl. (Surat Teregistrasi)',1,0,'C');
        $pdf->Cell(20,6,'Jumlah',1,0,'C');
        $pdf->Cell(40,6,'Keterangan',1,1,'C');

       $pdf->SetFont('Times', '', 10);
        $daftar_arsip = $this->db->get('daftar_arsip')->result();
        $no = 1;
        foreach ($daftar_arsip as $row){
            $pdf->Cell(30,6,$row->no_berkas,1,0,'L');
            $pdf->Cell(30,6,$row->no_item_arsip,1,0,'L');
            $pdf->Cell(30,6,$row->kode_klasifikasi,1,0,'L');
            $pdf->Cell(70,6,$row->uraian,1,0,'L');
            $pdf->Cell(50,6,shortdate_indo($row->tgl_registrasi),1,0,'L');
            $pdf->Cell(20,6,$row->jumlah,1,0,'C');
            $pdf->Cell(40,6,$row->keterangan,1,1,'L');
        }
        $pdf->SetTitle('DAFTAR ISI ARSIP');
        $pdf->Output();
    }

}

/* End of file Daftar_arsip.php */
/* Location: ./application/controllers/Daftar_arsip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-06 05:08:41 */
/* http://harviacode.com */