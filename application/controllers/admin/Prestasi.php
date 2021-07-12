<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Prestasi"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Prestasi_model');
        $this->load->library('form_validation');
        if ($this->session->userdata("level")!="admin") {
            redirect("Home");
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Prestasi/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Prestasi/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Prestasi/index';
            $config['first_url'] = base_url() . 'admin/Prestasi/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Prestasi_model->total_rows($q);
        $prestasi = $this->Prestasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/prestasi/prestasi_list";
        $this->defaultPageAttribute['title'] = "Data Prestasi";
        $data = array(
            'prestasi_data' => $prestasi,
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
        $row = $this->Prestasi_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/prestasi/prestasi_read";
            $this->defaultPageAttribute['title'] = "Detail Prestasi";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Prestasi",
                                                        "Detail",
                                                        );
            $data = array(
                    'id' => $row->id,
                    'nama' => $row->nama,
                    'tingkat' => $row->tingkat,
                    'foto' => $row->foto,
                    'tanggal' => $row->tanggal,
                    'deskripsi' => $row->deskripsi,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Prestasi'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/prestasi/prestasi_form";
        $this->defaultPageAttribute['title'] = "Tambah Data Prestasi";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Prestasi",
                                                    "Tambah Data",
                                                    );
        $this->defaultPageAttribute['bootstraps'] = array(
                                                    "assets/aceadmin/css/jquery-ui.custom.min.css",
                                                    "assets/aceadmin/css/bootstrap-datepicker3.min.css"
                                                    );
        $this->defaultPageAttribute['scripts'] = array(
                                                    "assets/aceadmin/js/jquery-ui.custom.min.js",
                                                    "assets/aceadmin/js/bootstrap-datepicker.min.js",
                                                    "assets/aceadmin/js/jquery.maskedinput.min.js",
                                                    "assets/aceadmin/js/date-picker-dom.js",
                                                    'assets/aceadmin/ckeditor/ckeditor.js',
                                                    'assets/aceadmin/js/admin-ckeditor.js',
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Prestasi/create_action'),
	                'id' => set_value('id'),
	                'nama' => set_value('nama'),
	                'tingkat' => set_value('tingkat'),
	                'foto' => set_value('foto'),
	                'tanggal' => set_value('tanggal'),
	                'deskripsi' => set_value('deskripsi'),
                    'PageAttribute' => $this->defaultPageAttribute
                );
        $this->load->view($this->container, $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']          = './files/profil_sekolah';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'nama' => $this->input->post('nama',TRUE),
                    'tingkat' => $this->input->post('tingkat',TRUE),
                    'tanggal' => $this->input->post('tanggal',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                $foto = $config['upload_path']."/"."prestasi_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Prestasi_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Prestasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Prestasi_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/prestasi/prestasi_form";
            $this->defaultPageAttribute['title'] = "Ubah Data Prestasi";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Prestasi",
                                                        "Ubah Data",
                                                        );
            $this->defaultPageAttribute['bootstraps'] = array(
                                                        "assets/aceadmin/css/jquery-ui.custom.min.css",
                                                        "assets/aceadmin/css/bootstrap-datepicker3.min.css"
                                                        );
            $this->defaultPageAttribute['scripts'] = array(
                                                        "assets/aceadmin/js/jquery-ui.custom.min.js",
                                                        "assets/aceadmin/js/bootstrap-datepicker.min.js",
                                                        "assets/aceadmin/js/jquery.maskedinput.min.js",
                                                        "assets/aceadmin/js/date-picker-dom.js",
                                                        'assets/aceadmin/ckeditor/ckeditor.js',
                                                        'assets/aceadmin/js/admin-ckeditor.js',
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Prestasi/update_action'),
                    'id' => set_value('id', $row->id),
                    'nama' => set_value('nama', $row->nama),
                    'tingkat' => set_value('tingkat', $row->tingkat),
                    'foto' => set_value('foto', $row->foto),
                    'tanggal' => set_value('tanggal', $row->tanggal),
                    'deskripsi' => set_value('deskripsi', $row->deskripsi),
	                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Prestasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path']          = './files/profil_sekolah';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'nama' => $this->input->post('nama',TRUE),
                    'tingkat' => $this->input->post('tingkat',TRUE),
                    'tanggal' => $this->input->post('tanggal',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                unlink_safe($this->input->post('oldfoto', TRUE));

                $foto = $config['upload_path']."/"."prestasi_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Prestasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Prestasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Prestasi_model->get_by_id($id);

        if ($row) {
            if (isset($row->foto)) {
                unlink_safe($row->foto);
            }

            $this->Prestasi_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Prestasi'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Prestasi'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama', 'nama', 'trim|required');
       $this->form_validation->set_rules('tingkat', 'tingkat', 'trim|required');
       $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
       $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Prestasi.php */
/* Location: ./application/controllers/Prestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 09:36:18 */
/* http://harviacode.com */