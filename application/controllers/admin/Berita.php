<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Berita"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
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
            $config['base_url'] = base_url() . 'admin/Berita/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Berita/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Berita/index';
            $config['first_url'] = base_url() . 'admin/Berita/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Berita_model->total_rows($q);
        $berita = $this->Berita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/berita/berita_list";
        $this->defaultPageAttribute['title'] = "Data Berita";
        $data = array(
            'berita_data' => $berita,
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
        $row = $this->Berita_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/berita/berita_read";
            $this->defaultPageAttribute['title'] = "Detail Berita";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Berita",
                                                        "Detail",
                                                        );
            $data = array(
                    'id' => $row->id,
                    'caption' => $row->caption,
                    'foto' => $row->foto,
                    'deskripsi' => $row->deskripsi,
                    'tanggal' => date("d M Y", $row->tanggal),
                    'user' => $row->user,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Berita'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/berita/berita_form";
        $this->defaultPageAttribute['title'] = "Tambah Data Berita";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Berita",
                                                    "Tambah Data",
                                                    );
        $this->defaultPageAttribute['scripts'] = array(
            'assets/aceadmin/ckeditor/ckeditor.js',
            'assets/aceadmin/js/admin-ckeditor.js',
        );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Berita/create_action'),
	                'id' => set_value('id'),
	                'caption' => set_value('caption'),
	                'foto' => set_value('foto'),
	                'deskripsi' => set_value('deskripsi'),
	                'tanggal' => set_value('tanggal'),
	                'user' => set_value('user', $this->session->userdata('username')),
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
            $config['upload_path']          = './files/berita';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'caption' => $this->input->post('caption',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    'tanggal' => strtotime(format_date($this->input->post('tanggal',TRUE))),
                    'user' => $this->input->post('user',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                $foto = $config['upload_path']."/"."berita_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Berita_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Berita'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Berita_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/berita/berita_form";
            $this->defaultPageAttribute['title'] = "Ubah Data Berita";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Berita",
                                                        "Ubah Data",
                                                        );
            $this->defaultPageAttribute['scripts'] = array(
                'assets/aceadmin/ckeditor/ckeditor.js',
                'assets/aceadmin/js/admin-ckeditor.js',
            );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Berita/update_action'),
                    'id' => set_value('id', $row->id),
                    'caption' => set_value('caption', $row->caption),
                    'foto' => set_value('foto', $row->foto),
                    'deskripsi' => set_value('deskripsi', $row->deskripsi),
                    'tanggal' => set_value('tanggal', date("Y-m-d", $row->tanggal)),
                    'user' => set_value('user', $row->user),
	                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Berita'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path']          = './files/berita';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'caption' => $this->input->post('caption',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    'tanggal' => strtotime(format_date($this->input->post('tanggal',TRUE))),
                    'user' => $this->input->post('user',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                unlink_safe($this->input->post('oldfoto', TRUE));
                $foto = $config['upload_path']."/"."berita_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Berita_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Berita'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Berita_model->get_by_id($id);

        if ($row) {
            if (isset($row->foto)) {
                unlink_safe($row->foto);
            }

            $this->Berita_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Berita'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Berita'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('caption', 'caption', 'trim|required');
       $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
       $this->form_validation->set_rules('user', 'user', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */