<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klasifikasi_arsip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Klasifikasi_arsip_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','klasifikasi_arsip/klasifikasi_arsip_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Klasifikasi_arsip_model->json();
    }

    public function read($id) 
    {
        $row = $this->Klasifikasi_arsip_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'indeks' => $row->indeks,
		'kode_folder' => $row->kode_folder,
		'kode_surat' => $row->kode_surat,
		'masalah' => $row->masalah,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','klasifikasi_arsip/klasifikasi_arsip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi_arsip'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'TAMBAH',
            'action' => site_url('klasifikasi_arsip/create_action'),
	    'id' => set_value('id'),
	    'indeks' => set_value('indeks'),
	    'kode_folder' => set_value('kode_folder'),
	    'kode_surat' => set_value('kode_surat'),
	    'masalah' => set_value('masalah'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','klasifikasi_arsip/klasifikasi_arsip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'indeks' => $this->input->post('indeks',TRUE),
		'kode_folder' => $this->input->post('kode_folder',TRUE),
		'kode_surat' => $this->input->post('kode_surat',TRUE),
		'masalah' => $this->input->post('masalah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Klasifikasi_arsip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('klasifikasi_arsip'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Klasifikasi_arsip_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'UPDATE',
                'action' => site_url('klasifikasi_arsip/update_action'),
		'id' => set_value('id', $row->id),
		'indeks' => set_value('indeks', $row->indeks),
		'kode_folder' => set_value('kode_folder', $row->kode_folder),
		'kode_surat' => set_value('kode_surat', $row->kode_surat),
		'masalah' => set_value('masalah', $row->masalah),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','klasifikasi_arsip/klasifikasi_arsip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi_arsip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'indeks' => $this->input->post('indeks',TRUE),
		'kode_folder' => $this->input->post('kode_folder',TRUE),
		'kode_surat' => $this->input->post('kode_surat',TRUE),
		'masalah' => $this->input->post('masalah',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Klasifikasi_arsip_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klasifikasi_arsip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Klasifikasi_arsip_model->get_by_id($id);

        if ($row) {
            $this->Klasifikasi_arsip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klasifikasi_arsip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi_arsip'));
        }
    }

    function indeksautocomplate(){
        autocomplate_json('klasifikasi_arsip', 'indeks');
    }

    function kode_folderautocomplate(){
        autocomplate_json('klasifikasi_arsip', 'kode_folder');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('indeks', 'indeks', 'trim|required');
	$this->form_validation->set_rules('kode_folder', 'kode folder', 'trim|required');
	//$this->form_validation->set_rules('kode_surat', 'kode surat', 'trim|required');
	//$this->form_validation->set_rules('masalah', 'masalah', 'trim|required');
	//$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "klasifikasi_arsip.xls";
        $judul = "klasifikasi_arsip";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Indeks");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Folder");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Masalah");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Klasifikasi_arsip_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->indeks);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_folder);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->masalah);
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
        header("Content-Disposition: attachment;Filename=DAFTAR KLASIFIKASI ARSIP.doc");

        $data = array(
            'klasifikasi_arsip_data' => $this->Klasifikasi_arsip_model->get_all(),
            'start' => 0,
            'logo_instansi' => base_url('assets/foto_profil/').$this->session->userdata('logo_instansi'),
            'nama_instansi' => $this->session->userdata('nama_instansi'),
            'alamat_instansi' => $this->session->userdata('alamat_instansi'),
            'email_instansi' => $this->session->userdata('email_instansi'),
            'notelp_instansi' => $this->session->userdata('notelp_instansi'),
            'website_instansi' => $this->session->userdata('website_instansi'),
        );
        
        $this->load->view('klasifikasi_arsip/klasifikasi_arsip_doc',$data);
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
        $pdf->Cell(192,6,'DAFTAR KLASIFIKASI ARSIP',0,1,'C');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(30,6,'INDEKS',1,0,'C');
        $pdf->Cell(40,6,'KODE FOLDER',1,0,'C');
        $pdf->Cell(30,6,'KODE SURAT',1,0,'C');
        $pdf->Cell(90,6,'MASALAH',1,1,'C');

       $pdf->SetFont('Times', '', 10);
        $klasifikasi_arsip = $this->Klasifikasi_arsip_model->get_all();
        $no = 1;
        foreach ($klasifikasi_arsip as $row){
            $pdf->Cell(30,6,$row->indeks,1,0,'C');
            $pdf->Cell(40,6,$row->kode_folder,1,0,'C');
            $pdf->Cell(30,6,$row->kode_surat,1,0,'C');
            $pdf->Cell(90,6,$row->masalah,1,1,'L');
        }
        $pdf->SetTitle('DAFTAR KLASIFIKASI ARSIP');
        $pdf->Output();
    }
}

/* End of file Klasifikasi_arsip.php */
/* Location: ./application/controllers/Klasifikasi_arsip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-06 08:04:52 */
/* http://harviacode.com */