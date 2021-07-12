<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Gambar Slider"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');
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
            $config['base_url'] = base_url() . 'admin/Carousel/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Carousel/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Carousel/index';
            $config['first_url'] = base_url() . 'admin/Carousel/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Carousel_model->total_rows($q);
        $carousel = $this->Carousel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/carousel/carousel_list";
        $this->defaultPageAttribute['title'] = "Gambar Slider";
        $data = array(
            'carousel_data' => $carousel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/carousel/carousel_form";
        $this->defaultPageAttribute['title'] = "Tambah Gambar Slider";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Carousel",
                                                    "Tambah Slider",
                                                    );

        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Carousel/create_action'),
	                'id' => set_value('id'),
	                'file' => set_value('file'),
	                'header' => set_value('header'),
	                'text' => set_value('text'),
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
                    'header' => $this->input->post('header',TRUE),
                    'text' => $this->input->post('text',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                $foto = $config['upload_path']."/"."carousel_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['file'] = $foto;
            }

            $this->Carousel_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Carousel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Carousel_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/carousel/carousel_form";
            $this->defaultPageAttribute['title'] = "Ubah Gambar Slider";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Carousel",
                                                        "Ubah Slider",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Carousel/update_action'),
                    'id' => set_value('id', $row->id),
                    'file' => set_value('file', $row->file),
                    'header' => set_value('header', $row->header),
                    'text' => set_value('text', $row->text),
	                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Carousel'));
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
                    'header' => $this->input->post('header',TRUE),
                    'text' => $this->input->post('text',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                unlink_safe($this->input->post('oldfile', TRUE));

                $foto = $config['upload_path']."/"."carousel_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['file'] = $foto;
            }

            $this->Carousel_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Carousel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Carousel_model->get_by_id($id);

        if ($row) {
            if (isset($row->file)) {
                unlink_safe($row->file);
            };

            $this->Carousel_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Carousel'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Carousel'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('header', 'header', 'trim|required');
       $this->form_validation->set_rules('text', 'text', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Carousel.php */
/* Location: ./application/controllers/Carousel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */