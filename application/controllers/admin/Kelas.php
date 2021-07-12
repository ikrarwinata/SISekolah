<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Kelas"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
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
            $config['base_url'] = base_url() . 'admin/Kelas/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Kelas/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Kelas/index';
            $config['first_url'] = base_url() . 'admin/Kelas/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kelas_model->total_rows($q);
        $kelas = $this->Kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/kelas/kelas_list";
        $this->defaultPageAttribute['title'] = "Data Kelas";
        $data = array(
            'kelas_data' => $kelas,
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
        $row = $this->Kelas_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/kelas/kelas_read";
            $this->defaultPageAttribute['title'] = "Detail Kelas";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Kelas",
                                                        "Detail",
                                                        );
            $data = array(
                    'id' => $row->id,
                    'kelas' => $row->kelas,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Kelas'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/kelas/kelas_form";
        $this->defaultPageAttribute['title'] = "Tambah Data Kelas";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Kelas",
                                                    "Tambah Data",
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Kelas/create_action'),
	                'id' => set_value('id'),
	                'kelas' => set_value('kelas'),
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
                    'kelas' => $this->input->post('kelas',TRUE),
                    );

            $this->Kelas_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/kelas/kelas_form";
            $this->defaultPageAttribute['title'] = "Ubah Data Kelas";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Kelas",
                                                        "Ubah Data",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Kelas/update_action'),
                    'id' => set_value('id', $row->id),
                    'kelas' => set_value('kelas', $row->kelas),
	                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                    'kelas' => $this->input->post('kelas',TRUE),
                    );

            $this->Kelas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Kelas'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Kelas'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */