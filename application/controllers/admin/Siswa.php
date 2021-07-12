<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Siswa"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
        if ($this->session->userdata("level")!="admin") {
            redirect("Home");
        }
    }

    public function index()
    {
        unlink_safe($this->input->post('xlsxpathfile', TRUE));

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Siswa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Siswa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Siswa/index';
            $config['first_url'] = base_url() . 'admin/Siswa/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/siswa/siswa_list";
        $this->defaultPageAttribute['title'] = "Data Siswa";
        $this->defaultPageAttribute['scripts'] = array(
                                                    "assets/aceadmin/js/admin-siswa.js",
                                                    );
        $data = array(
            'siswa_data' => $siswa,
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
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/siswa/siswa_read";
            $this->defaultPageAttribute['title'] = "Detail Siswa";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Siswa",
                                                        "Detail",
                                                        );
            $data = array(
                    'nis' => $row->nis,
                    'nama' => $row->nama,
                    'jenis_kelamin' => $row->jenis_kelamin,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tanggal_lahir' => $row->tanggal_lahir,
                    'tahun_masuk' => $row->tahun_masuk,
                    'email' => $row->email,
                    'hp' => $row->hp,
                    'alamat' => $row->alamat,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            $this->session->set_flashdata('ci_flash_message_type', ' text-danger ');
            redirect(site_url('admin/Siswa'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/siswa/siswa_form";
        $this->defaultPageAttribute['title'] = "Tambah Data Siswa";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Siswa",
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
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Siswa/create_action'),
	                'nis' => set_value('nis'),
	                'nama' => set_value('nama'),
	                'jenis_kelamin' => set_value('jenis_kelamin'),
	                'tempat_lahir' => set_value('tempat_lahir'),
	                'tahun_masuk' => set_value('tahun_masuk'),
	                'tanggal_lahir' => set_value('tanggal_lahir'),
	                'email' => set_value('email'),
	                'hp' => set_value('hp'),
	                'alamat' => set_value('alamat'),
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
            $data = array(
                    'nis' => $this->input->post('newnis',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'tahun_masuk' => $this->input->post('tahun_masuk',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'hp' => $this->input->post('hp',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            $this->session->set_flashdata('ci_flash_message_type', ' text-success ');
            redirect(site_url('admin/Siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/siswa/siswa_form";
            $this->defaultPageAttribute['title'] = "Ubah Data Siswa";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Siswa",
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
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Siswa/update_action'),
                    'nis' => set_value('nis', $row->nis),
                    'nama' => set_value('nama', $row->nama),
                    'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                    'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
                    'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
                    'tahun_masuk' => set_value('tahun_masuk', $row->tahun_masuk),
                    'email' => set_value('email', $row->email),
                    'hp' => set_value('hp', $row->hp),
                    'alamat' => set_value('alamat', $row->alamat),
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            $this->session->set_flashdata('ci_flash_message_type', ' text-danger ');
            redirect(site_url('admin/Siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nis', TRUE));
        } else {
            $data = array(
                    'nis' => $this->input->post('newnis',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'tahun_masuk' => $this->input->post('tahun_masuk',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'hp' => $this->input->post('hp',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    );

            $this->Siswa_model->update($this->input->post('nis', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            $this->session->set_flashdata('ci_flash_message_type', ' text-success ');
            redirect(site_url('admin/Siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            $this->session->set_flashdata('ci_flash_message_type', ' text-success ');
            redirect(site_url('admin/Siswa'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            $this->session->set_flashdata('ci_flash_message_type', ' text-danger ');
            redirect(site_url('admin/Siswa'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama', 'nama', 'trim|required');
       $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
       $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
       $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
       $this->form_validation->set_rules('tahun_masuk', 'tahun masuk', 'trim|required');
       $this->form_validation->set_rules('email', 'email', 'trim|required');
       $this->form_validation->set_rules('hp', 'hp', 'trim|required');
       $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
       $this->form_validation->set_rules('nis', 'nis', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->model("Siswa_excel");
        $this->Siswa_excel->export();
        exit();
    }

    public function set_import_excel()
    {
        $this->load->model("Siswa_excel");

        $config['upload_path']          = './files/temp';
        $config['allowed_types']        = 'xlsx';
        $config['max_size']             = 2008;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file')){
            $fls = $config['upload_path']."/".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
            rename($this->upload->data("full_path"), $fls);
        }

        $e = $this->Siswa_excel->import($fls);

        $this->defaultPageAttribute['content'] = "admin/siswa/siswa_import_list";
        $this->defaultPageAttribute['title'] = "Import Data Siswa";
        $data = array(
            'siswa_data' => $e,
            'total_rows' => count($e),
            'start' => 0,
            'action' => "admin/Siswa/import",
            'file' => $fls,
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function import()
    {
        $this->load->model("Siswa_excel");

        $e = $this->Siswa_excel->import($this->input->post('xlsxpathfile', TRUE));

        $su = 0;
        $fu = 0;
        foreach ($e as $key => $siswa) {
            $data = array(
                "nis"=> $siswa['nis'],
                "nama"=> $siswa['nama'],
                "jenis_kelamin"=> $siswa['jenis_kelamin'],
                "tempat_lahir"=> $siswa['tempat_lahir'],
                "tanggal_lahir"=> $siswa['tanggal_lahir'],
                "tahun_masuk" => $siswa['tahun_masuk'],
                "email"=> $siswa['email'],
                "hp"=> $siswa['hp'],
                "alamat"=> $siswa['alamat']
            );
            try {
                if (count($this->Siswa_model->get_by_id($siswa['nis']))>=1) {
                    $fu++;
                    continue;
                }
                $this->Siswa_model->insert($data);
                $su++;
            } catch(Exception $e) {
                $fu++;
            };
        };

        $this->session->set_flashdata('ci_flash_message', $su.' Data berhasil di import, '.$fu.' Data gagal di import');
        $this->session->set_flashdata('ci_flash_message_type', ' text-success ');

        unlink_safe($this->input->post('xlsxpathfile', TRUE));

        redirect('admin/Siswa');
    }

    public function print_all()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Siswa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Siswa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Siswa/index';
            $config['first_url'] = base_url() . 'admin/Siswa/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/siswa/siswa_print";
        $this->defaultPageAttribute['title'] = "Data Siswa";
        $this->defaultPageAttribute['subtitle'] = array("Cetak Data Siswa");
        $this->defaultPageAttribute['scripts'] = array(
            "assets/js/jQuery.print.min.js",
            "assets/js/invoice_print.js",
        );
        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view("admin/container", $data);
    }
}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-28 08:24:11 */
/* http://harviacode.com */