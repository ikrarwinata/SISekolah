<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Gallery"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
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
            $config['base_url'] = base_url() . 'admin/Gallery/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Gallery/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Gallery/index';
            $config['first_url'] = base_url() . 'admin/Gallery/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Gallery_model->total_rows($q);
        $gallery = $this->Gallery_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/gallery/gallery_list";
        $this->defaultPageAttribute['title'] = "Gallery Sekolah";
        $data = array(
            'gallery_data' => $gallery,
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
        $this->defaultPageAttribute['content'] = "admin/gallery/gallery_form";
        $this->defaultPageAttribute['title'] = "Tambah Foto Gallery";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Gallery",
                                                    "Tambah Foto",
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Gallery/create_action'),
	                'id' => set_value('id'),
	                'file' => set_value('file'),
	                'caption' => set_value('caption'),
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
            $config['upload_path']          = './files/gallery';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'caption' => $this->input->post('caption',TRUE),
                    );

            if($this->upload->do_upload('file')){
                $foto = $config['upload_path']."/"."gallery_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['file'] = $foto;
            }

            $this->Gallery_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Gallery'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/gallery/gallery_form";
            $this->defaultPageAttribute['title'] = "Ubah Foto Gallery";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Gallery",
                                                        "Ubah Foto",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Gallery/update_action'),
                    'id' => set_value('id', $row->id),
                    'file' => set_value('file', $row->file),
                    'caption' => set_value('caption', $row->caption),
	                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Gallery'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path']          = './files/gallery';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'caption' => $this->input->post('caption',TRUE),
                    );

            if($this->upload->do_upload('file')){
                unlink_safe($this->input->post('oldfile', TRUE));

                $foto = $config['upload_path']."/"."gallery_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['file'] = $foto;
            }

            $this->Gallery_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Gallery'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gallery_model->get_by_id($id);

        if ($row) {
            if (isset($row->file)) {
                unlink_safe($row->file);
            }

            $this->Gallery_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Gallery'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Gallery'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('caption', 'caption', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */