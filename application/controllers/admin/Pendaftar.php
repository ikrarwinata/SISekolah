<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
        'title' => "Penerimaan Siswa Baru",
        'subtitle' => array("Data"),
        'bootstraps' => array(),
        'scripts' => array(),
        'content' => "admin/",
    );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pendaftar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pendaftar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pendaftar/index.html';
            $config['first_url'] = base_url() . 'pendaftar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pendaftar_model->total_rows($q);
        $pendaftar = $this->Pendaftar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->defaultPageAttribute['content'] = "admin/pendaftar/pendaftar_list";

        $data = array(
            'pendaftar_data' => $pendaftar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function read($id) 
    {
        $row = $this->Pendaftar_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/pendaftar/pendaftar_read";
            $this->defaultPageAttribute['title'] = "Penerimaan Siswa Baru";
            $this->defaultPageAttribute['subtitle'] = array("Penerimaan Siswa Baru", "Detail Pendaftar");

            $data = array(
            'id' => $row->id,
            'nama' => $row->nama,
            'asal_sekolah' => $row->asal_sekolah,
            'tempat_lahir' => $row->tempat_lahir,
            'tanggal_lahir' => $row->tanggal_lahir,
            'jenis_kelamin' => $row->jenis_kelamin,
            'nilai_ujian' => $row->nilai_ujian,
            'hubungan_wali' => $row->hubungan_wali,
            'nama_ortu' => $row->nama_ortu,
            'pekerjaan_ortu' => $row->pekerjaan_ortu,
            'alamat_ortu' => $row->alamat_ortu,
            'email_ortu' => $row->email_ortu,
            'hp_ortu' => $row->hp_ortu,
                'PageAttribute' => $this->defaultPageAttribute
	    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendaftar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftar/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'asal_sekolah' => set_value('asal_sekolah', $row->asal_sekolah),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'nilai_ujian' => set_value('nilai_ujian', $row->nilai_ujian),
		'hubungan_wali' => set_value('hubungan_wali', $row->hubungan_wali),
		'nama_ortu' => set_value('nama_ortu', $row->nama_ortu),
		'pekerjaan_ortu' => set_value('pekerjaan_ortu', $row->pekerjaan_ortu),
		'alamat_ortu' => set_value('alamat_ortu', $row->alamat_ortu),
		'email_ortu' => set_value('email_ortu', $row->email_ortu),
		'hp_ortu' => set_value('hp_ortu', $row->hp_ortu),
	    );
            $this->load->view('pendaftar/pendaftar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'nilai_ujian' => $this->input->post('nilai_ujian',TRUE),
		'hubungan_wali' => $this->input->post('hubungan_wali',TRUE),
		'nama_ortu' => $this->input->post('nama_ortu',TRUE),
		'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
		'email_ortu' => $this->input->post('email_ortu',TRUE),
		'hp_ortu' => $this->input->post('hp_ortu',TRUE),
	    );

            $this->Pendaftar_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendaftar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendaftar_model->get_by_id($id);

        if ($row) {
            $this->Pendaftar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendaftar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('nilai_ujian', 'nilai ujian', 'trim|required');
	$this->form_validation->set_rules('hubungan_wali', 'hubungan wali', 'trim|required');
	$this->form_validation->set_rules('nama_ortu', 'nama ortu', 'trim|required');
	$this->form_validation->set_rules('pekerjaan_ortu', 'pekerjaan ortu', 'trim|required');
	$this->form_validation->set_rules('alamat_ortu', 'alamat ortu', 'trim|required');
	$this->form_validation->set_rules('email_ortu', 'email ortu', 'trim|required');
	$this->form_validation->set_rules('hp_ortu', 'hp ortu', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pendaftar.xls";
        $judul = "pendaftar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Ujian");
	xlsWriteLabel($tablehead, $kolomhead++, "Hubungan Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp Ortu");

	foreach ($this->Pendaftar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nilai_ujian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hubungan_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp_ortu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pendaftar.doc");

        $data = array(
            'pendaftar_data' => $this->Pendaftar_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/pendaftar/pendaftar_doc',$data);
    }

}

/* End of file Pendaftar.php */
/* Location: ./application/controllers/Pendaftar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-18 19:07:05 */
/* http://harviacode.com */
