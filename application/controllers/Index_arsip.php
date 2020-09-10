<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index_arsip extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        is_login();
        $this->load->model('Index_arsip_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','index_arsip/index_arsip_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Index_arsip_model->json();
    }

    public function read($id) 
    {
        $row = $this->Index_arsip_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'filing_segment' => $row->filing_segment,
		'indexing_order' => $row->indexing_order,
		'kode_index' => $row->kode_index,
	    );
            $this->template->load('template','index_arsip/index_arsip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index_arsip'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'TAMBAH',
            'action' => site_url('index_arsip/create_action'),
	    'id' => set_value('id'),
	    'filing_segment' => set_value('filing_segment'),
	    'indexing_order' => set_value('indexing_order'),
	    'kode_index' => set_value('kode_index'),
	);
        $this->template->load('template','index_arsip/index_arsip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'filing_segment' => $this->input->post('filing_segment',TRUE),
		'indexing_order' => $this->input->post('indexing_order',TRUE),
		'kode_index' => $this->input->post('kode_index',TRUE),
	    );

            $this->Index_arsip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('index_arsip'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Index_arsip_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'UPDATE',
                'action' => site_url('index_arsip/update_action'),
		'id' => set_value('id', $row->id),
		'filing_segment' => set_value('filing_segment', $row->filing_segment),
		'indexing_order' => set_value('indexing_order', $row->indexing_order),
		'kode_index' => set_value('kode_index', $row->kode_index),
	    );
            $this->template->load('template','index_arsip/index_arsip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index_arsip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'filing_segment' => $this->input->post('filing_segment',TRUE),
		'indexing_order' => $this->input->post('indexing_order',TRUE),
		'kode_index' => $this->input->post('kode_index',TRUE),
	    );

            $this->Index_arsip_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('index_arsip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Index_arsip_model->get_by_id($id);

        if ($row) {
            $this->Index_arsip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index_arsip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index_arsip'));
        }
    }

    function filing_segmentautocomplate(){
        autocomplate_json('klasifikasi_arsip', 'masalah');
    }

    function indexing_orderautocomplate(){
        autocomplate_json('klasifikasi_arsip', 'kode_folder');
    }

    function kode_indexautocomplate(){
        autocomplate_json('klasifikasi_arsip', 'kode_surat');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('filing_segment', 'filing segment', 'trim|required');
	$this->form_validation->set_rules('indexing_order', 'indexing order', 'trim|required');
	$this->form_validation->set_rules('kode_index', 'kode index', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "index_arsip.xls";
        $judul = "index_arsip";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Filing Segment");
	xlsWriteLabel($tablehead, $kolomhead++, "Indexing Order");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Index");

	foreach ($this->Index_arsip_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->filing_segment);
	    xlsWriteLabel($tablebody, $kolombody++, $data->indexing_order);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_index);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DAFTAR INDEKS ARSIP.doc");

        $data = array(
            'index_arsip_data' => $this->Index_arsip_model->get_all(),
            'start' => 0,
            'logo_instansi' => base_url('assets/foto_profil/').$this->session->userdata('logo_instansi'),
            'nama_instansi' => $this->session->userdata('nama_instansi'),
            'alamat_instansi' => $this->session->userdata('alamat_instansi'),
            'email_instansi' => $this->session->userdata('email_instansi'),
            'notelp_instansi' => $this->session->userdata('notelp_instansi'),
            'website_instansi' => $this->session->userdata('website_instansi'),
        );
        
        $this->load->view('index_arsip/index_arsip_doc',$data);
    }

    function pdf() {
        $this->load->library('pdf');
        $pdf = new FPDF('p', 'mm', 'A4');
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
        $pdf->Cell(170,3,'','B',1);


        $pdf->Cell(10,5,'',0,1);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 11);
        // mencetak string 
        $pdf->Cell(192,6,'DAFTAR INDEKS ARSIP',0,1,'C');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(60,6,'Nama (Filing Segment)',1,0,'C');
        $pdf->Cell(60,6,'Indexing Order',1,0,'C');
        $pdf->Cell(60,6,'Kode Indeks',1,1,'C');

       $pdf->SetFont('Times', '', 10);
        $index_arsip = $this->db->get('index_arsip')->result();
        $no = 1;
        foreach ($index_arsip as $row){
            $pdf->Cell(10,6,$no++,1,0,'C'); 
            $pdf->Cell(60,6,$row->filing_segment,1,0,'L');
            $pdf->Cell(60,6,$row->indexing_order,1,0,'C');
            $pdf->Cell(60,6,$row->kode_index,1,1,'C');
        }
        $pdf->SetTitle('DAFTAR INDEKS ARSIP');
        $pdf->Output();
    }


}

/* End of file Index_arsip.php */
/* Location: ./application/controllers/Index_arsip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-06 05:08:41 */
/* http://harviacode.com */