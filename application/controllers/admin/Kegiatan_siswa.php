<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan_siswa extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Kegiatan_siswa"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_siswa_model');
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
            $config['base_url'] = base_url() . 'admin/Kegiatan_siswa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Kegiatan_siswa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Kegiatan_siswa/index';
            $config['first_url'] = base_url() . 'admin/Kegiatan_siswa/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kegiatan_siswa_model->total_rows($q);
        $kegiatan_siswa = $this->Kegiatan_siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/kegiatan_siswa/kegiatan_siswa_list";
        $this->defaultPageAttribute['title'] = "Kegiatan siswa";
        $data = array(
            'kegiatan_siswa_data' => $kegiatan_siswa,
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
        $row = $this->Kegiatan_siswa_model->get_by_id($id);
        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/kegiatan_siswa/kegiatan_siswa_read";
            $this->defaultPageAttribute['title'] = "Detail Kegiatan siswa";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Kegiatan siswa",
                                                        "Detail",
                                                        );
            $data = array(
                    'id' => $row->id,
                    'hari' => $row->hari,
                    'kegiatan' => $row->kegiatan,
                    'jam' => $row->jam,
                    'jam_selesai' => $row->jam_selesai,
                    'foto' => $row->foto,
                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Kegiatan_siswa'));
        }
    }

    public function create() 
    {
        $this->defaultPageAttribute['content'] = "admin/kegiatan_siswa/kegiatan_siswa_form";
        $this->defaultPageAttribute['title'] = "Tambah Kegiatan";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Kegiatan siswa",
                                                    "Tambah Data",
                                                    );
        $this->defaultPageAttribute['bootstraps'] = array(
                                                    "assets/aceadmin/css/bootstrap-timepicker.min.css",
                                                    );
        $this->defaultPageAttribute['scripts'] = array(
                                                    "assets/aceadmin/js/jquery-ui.custom.min.js",
                                                    "assets/aceadmin/js/moment.min.js",
                                                    "assets/aceadmin/js/bootstrap-datetimepicker.min.js",
                                                    "assets/aceadmin/js/bootstrap-timepicker.min.js",
                                                    "assets/aceadmin/js/admin-kegiatan-form.js",
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Kegiatan_siswa/create_action'),
	                'id' => set_value('id'),
	                'hari' => set_value('hari'),
                    'kegiatan' => set_value('kegiatan'),
	                'foto' => set_value('foto'),
                    'jam' => set_value('jam'),
	                'jam_selesai' => set_value('jam_selesai'),
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
            $config['upload_path']          = './files/kegiatan';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'hari' => $this->input->post('hari',TRUE),
                    'kegiatan' => $this->input->post('kegiatan',TRUE),
                    'jam' => $this->input->post('jam',TRUE),
                    'jam_selesai' => $this->input->post('jam_selesai',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                $foto = $config['upload_path']."/"."kegiatan_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Kegiatan_siswa_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Kegiatan_siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kegiatan_siswa_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/kegiatan_siswa/kegiatan_siswa_form";
            $this->defaultPageAttribute['title'] = "Ubah Kegiatan";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Kegiatan siswa",
                                                        "Ubah Data",
                                                        );
            $this->defaultPageAttribute['bootstraps'] = array(
                                                        "assets/aceadmin/css/bootstrap-timepicker.min.css",
                                                        );
            $this->defaultPageAttribute['scripts'] = array(
                                                        "assets/aceadmin/js/jquery-ui.custom.min.js",
                                                        "assets/aceadmin/js/moment.min.js",
                                                        "assets/aceadmin/js/bootstrap-datetimepicker.min.js",
                                                        "assets/aceadmin/js/bootstrap-timepicker.min.js",
                                                        "assets/aceadmin/js/admin-kegiatan-form.js",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Kegiatan_siswa/update_action'),
                    'id' => set_value('id', $row->id),
                    'hari' => set_value('hari', $row->hari),
                    'kegiatan' => set_value('kegiatan', $row->kegiatan),
                    'jam' => set_value('jam', $row->jam),
                    'jam_selesai' => set_value('jam_selesai', $row->jam_selesai),
                    'foto' => set_value('foto', $row->foto),
	                'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Kegiatan_siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path']          = './files/kegiatan';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
            $config['max_size']             = 2008;
            $config['max_width']            = 13660;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            $data = array(
                    'hari' => $this->input->post('hari',TRUE),
                    'kegiatan' => $this->input->post('kegiatan',TRUE),
                    'jam' => $this->input->post('jam',TRUE),
                    'jam_selesai' => $this->input->post('jam_selesai',TRUE),
                    );

            if($this->upload->do_upload('foto')){
                unlink_safe($this->input->post('oldfoto', TRUE));
                $foto = $config['upload_path']."/"."kegiatan_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
                rename($this->upload->data("full_path"), $foto);
                $data['foto'] = $foto;
            }

            $this->Kegiatan_siswa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Kegiatan_siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kegiatan_siswa_model->get_by_id($id);

        if ($row) {
            if (isset($row->foto)) {
                unlink_safe($row->foto);
            }
            $this->Kegiatan_siswa_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Kegiatan_siswa'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Kegiatan_siswa'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('hari', 'hari', 'trim|required');
       $this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
       $this->form_validation->set_rules('jam', 'jam', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kegiatan_siswa.php */
/* Location: ./application/controllers/Kegiatan_siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */