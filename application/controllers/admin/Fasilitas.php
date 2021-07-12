<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Fasilitas"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Fasilitas_model');
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
            $config['base_url'] = base_url() . 'admin/Fasilitas/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Fasilitas/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Fasilitas/index';
            $config['first_url'] = base_url() . 'admin/Fasilitas/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fasilitas_model->total_rows($q);
        $fasilitas = $this->Fasilitas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/fasilitas/fasilitas_list";
        $this->defaultPageAttribute['title'] = "Sarana & Prasarana Sekolah";
        $data = array(
            'fasilitas_data' => $fasilitas,
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
        $row = $this->Fasilitas_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/fasilitas/fasilitas_read";
            $this->defaultPageAttribute['title'] = "Detail Fasilitas";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Fasilitas",
                                                        "Detail",
                                                        );
            $data = array(
                    'id' => $row->id,
                    'gambar' => $row->gambar,
                    'nama' => $row->nama,
                    'jumlah' => $row->jumlah,
                    'deskripsi' => $row->deskripsi,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Fasilitas'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/fasilitas/fasilitas_form";
        $this->defaultPageAttribute['title'] = "Tambah Fasilitas";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Fasilitas",
                                                    "Tambah Data",
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Fasilitas/create_action'),
	                'id' => set_value('id'),
	                'gambar' => set_value('gambar'),
                    'nama' => set_value('nama'),
	                'jumlah' => set_value('jumlah'),
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
                    'jumlah' => $this->input->post('jumlah',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    );

            if($this->upload->do_upload('gambar')){
                $foto = $config['upload_path']."/"."fasilitas_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['gambar'] = $foto;
            }

            $this->Fasilitas_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Fasilitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fasilitas_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/fasilitas/fasilitas_form";
            $this->defaultPageAttribute['title'] = "Ubah Fasilitas";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Fasilitas",
                                                        "Ubah Data",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Fasilitas/update_action'),
                    'id' => set_value('id', $row->id),
                    'gambar' => set_value('gambar', $row->gambar),
                    'nama' => set_value('nama', $row->nama),
                    'jumlah' => set_value('jumlah', $row->jumlah),
                    'deskripsi' => set_value('deskripsi', $row->deskripsi),
	                'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Fasilitas'));
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
                    'jumlah' => $this->input->post('jumlah',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                    );

            if($this->upload->do_upload('gambar')){
                unlink_safe($this->input->post('oldgambar', TRUE));

                $foto = $config['upload_path']."/"."fasilitas_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['gambar'] = $foto;
            }

            $this->Fasilitas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Fasilitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fasilitas_model->get_by_id($id);

        if ($row) {
            if (isset($row->gambar)) {
                unlink_safe($row->gambar);
            }
            $this->Fasilitas_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Fasilitas'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Fasilitas'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama', 'nama', 'trim|required');
       $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fasilitas.php */
/* Location: ./application/controllers/Fasilitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */