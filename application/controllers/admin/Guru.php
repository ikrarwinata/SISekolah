<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Guru"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
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
            $config['base_url'] = base_url() . 'admin/Guru/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Guru/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Guru/index';
            $config['first_url'] = base_url() . 'admin/Guru/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Guru_model->total_rows($q);
        $guru = $this->Guru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/guru/guru_list";
        $this->defaultPageAttribute['title'] = "Data Guru";
        $this->defaultPageAttribute['scripts'] = array(
                                                    "assets/aceadmin/js/admin-guru.js",
                                                    );
        $data = array(
            'guru_data' => $guru,
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
        $row = $this->Guru_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/guru/guru_read";
            $this->defaultPageAttribute['title'] = "Detail Guru";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Guru",
                                                        "Detail",
                                                        );
            $data = array(
                    'nip' => $row->nip,
                    'nama' => $row->nama,
                    'jabatan' => $row->jabatan,
                    'jenis_kelamin' => $row->jenis_kelamin,
                    'tempat_lahir' => $row->tempat_lahir,
                    'tanggal_lahir' => $row->tanggal_lahir,
                    'email' => $row->email,
                    'hp' => $row->hp,
                    'alamat' => $row->alamat,
                    'foto' => $row->foto,
                    'fb' => $row->fb,
                    'twitter' => $row->twitter,
                    'whatsapp' => $row->whatsapp,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            $this->session->set_flashdata('ci_flash_message_type', ' text-danger ');
            redirect(site_url('admin/Guru'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/guru/guru_form";
        $this->defaultPageAttribute['title'] = "Tambah Data Guru";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Guru",
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
                                                    "assets/aceadmin/js/admin-guru-form.js",
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Guru/create_action'),
	                'nip' => set_value('nip'),
	                'nama' => set_value('nama'),
	                'jabatan' => set_value('jabatan'),
	                'jenis_kelamin' => set_value('jenis_kelamin', "Pria"),
	                'tempat_lahir' => set_value('tempat_lahir'),
	                'tanggal_lahir' => set_value('tanggal_lahir'),
	                'email' => set_value('email'),
	                'hp' => set_value('hp'),
	                'alamat' => set_value('alamat'),
	                'foto' => set_value('foto'),
	                'fb' => set_value('fb'),
	                'twitter' => set_value('twitter'),
	                'whatsapp' => set_value('whatsapp'),
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
            $config['upload_path']          = './files/guru';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'nip' => $this->input->post('newnip',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'jabatan' => $this->input->post('jabatan',TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'hp' => $this->input->post('hp',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'fb' => $this->input->post('fb',TRUE),
                    'twitter' => $this->input->post('twitter',TRUE),
                    'whatsapp' => $this->input->post('whatsapp',TRUE),
                    );

            if($this->upload->do_upload('file')){
                $foto = $config['upload_path']."/"."guru_pp".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Guru_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            $this->session->set_flashdata('ci_flash_message_type', ' text-success ');
            redirect(site_url('admin/Guru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/guru/guru_form";
            $this->defaultPageAttribute['title'] = "Ubah Data Guru";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Guru",
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
                                                        "assets/aceadmin/js/admin-guru-form.js",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Guru/update_action'),
                    'nip' => set_value('nip', $row->nip),
                    'nama' => set_value('nama', $row->nama),
                    'jabatan' => set_value('jabatan', $row->jabatan),
                    'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                    'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
                    'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
                    'email' => set_value('email', $row->email),
                    'hp' => set_value('hp', $row->hp),
                    'alamat' => set_value('alamat', $row->alamat),
                    'foto' => set_value('foto', $row->foto),
                    'fb' => set_value('fb', $row->fb),
                    'twitter' => set_value('twitter', $row->twitter),
                    'whatsapp' => set_value('whatsapp', $row->whatsapp),
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            $this->session->set_flashdata('ci_flash_message_type', ' text-danger ');
            redirect(site_url('admin/Guru'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nip', TRUE));
        } else {
            $config['upload_path']          = './files/guru';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'nip' => $this->input->post('newnip',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'jabatan' => $this->input->post('jabatan',TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'hp' => $this->input->post('hp',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'fb' => $this->input->post('fb',TRUE),
                    'twitter' => $this->input->post('twitter',TRUE),
                    'whatsapp' => $this->input->post('whatsapp',TRUE),
                    );

            if($this->upload->do_upload('file')){
                unlink_safe($this->input->post('oldfoto', TRUE));

                $foto = $config['upload_path']."/"."guru_pp".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Guru_model->update($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            $this->session->set_flashdata('ci_flash_message_type', ' text-success ');
            redirect(site_url('admin/Guru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            if (isset($row->foto)) {
                unlink_safe($row->foto);
            }
            $this->Guru_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            $this->session->set_flashdata('ci_flash_message_type', ' text-success ');
            redirect(site_url('admin/Guru'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            $this->session->set_flashdata('ci_flash_message_type', ' text-danger ');
            redirect(site_url('admin/Guru'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama', 'nama', 'trim|required');
       $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
       $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
       $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
       $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
       $this->form_validation->set_rules('email', 'email', 'trim|required');
       $this->form_validation->set_rules('hp', 'hp', 'trim|required');
       $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
       $this->form_validation->set_rules('fb', 'fb', 'trim');
       $this->form_validation->set_rules('twitter', 'twitter', 'trim');
       $this->form_validation->set_rules('whatsapp', 'whatsapp', 'trim');
       $this->form_validation->set_rules('nip', 'nip', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->model("Guru_excel");
        $this->Guru_excel->export();
        exit();
    }

    public function set_import_excel()
    {
        $this->load->model("Guru_excel");

        $config['upload_path']          = './files/temp';
        $config['allowed_types']        = 'xlsx';
        $config['max_size']             = 2008;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file')){
            $fls = $config['upload_path']."/".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
            rename($this->upload->data("full_path"), $fls);
        }

        $e = $this->Guru_excel->import($fls);

        $this->defaultPageAttribute['content'] = "admin/guru/guru_import_list";
        $this->defaultPageAttribute['title'] = "Import Data Guru";
        $data = array(
            'guru_data' => $e,
            'total_rows' => count($e),
            'start' => 0,
            'action' => "admin/Guru/import",
            'file' => $fls,
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function import()
    {
        $this->load->model("Guru_excel");

        $e = $this->Guru_excel->import($this->input->post('xlsxpathfile', TRUE));

        $su = 0;
        $fu = 0;
        foreach ($e as $key => $guru) {
            $data = array(
                "nip"=> $guru['nip'],
                "nama"=> $guru['nama'],
                "jabatan"=> $guru['jabatan'],
                "jenis_kelamin"=> $guru['jenis_kelamin'],
                "tempat_lahir"=> $guru['tempat_lahir'],
                "tanggal_lahir"=> $guru['tanggal_lahir'],
                "email"=> $guru['email'],
                "hp"=> $guru['hp'],
                "alamat"=> $guru['alamat']
            );
            try {
                if (count($this->Guru_model->get_by_id($guru['nip']))>=1) {
                    $fu++;
                    continue;
                }
                $this->Guru_model->insert($data);
                $su++;
            } catch(Exception $e) {
                $fu++;
            };
        };

        $this->session->set_flashdata('ci_flash_message', $su.' Data berhasil di import, '.$fu.' Data gagal di import');
        $this->session->set_flashdata('ci_flash_message_type', ' text-success ');

        unlink_safe($this->input->post('xlsxpathfile', TRUE));

        redirect('admin/Guru');
    }

    public function print_all()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/Guru/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Guru/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Guru/index';
            $config['first_url'] = base_url() . 'admin/Guru/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Guru_model->total_rows($q);
        $guru = $this->Guru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/guru/guru_print";
        $this->defaultPageAttribute['title'] = "Data Guru";
        $this->defaultPageAttribute['subtitle'] = array("Cetak Data Guru");
        $this->defaultPageAttribute['scripts'] = array(
            "assets/js/jQuery.print.min.js",
            "assets/js/invoice_print.js",
        );
        $data = array(
            'guru_data' => $guru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view('admin/container', $data);
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-27 19:48:26 */
/* http://harviacode.com */