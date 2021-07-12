<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Users"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
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
            $config['base_url'] = base_url() . 'admin/Users/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/Users/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/Users/index';
            $config['first_url'] = base_url() . 'admin/Users/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->defaultPageAttribute['content'] = "admin/users/users_list";
        $this->defaultPageAttribute['title'] = "Data Akun Administrator";
        $data = array(
            'users_data' => $users,
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
        $this->defaultPageAttribute['content'] = "admin/users/users_form";
        $this->defaultPageAttribute['title'] = "Tambah Akun Administrator";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Users",
                                                    "Tambah Akun Administrator",
                                                    );
        $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Users/create_action'),
	                'username' => set_value('username'),
	                'password' => set_value('password'),
	                'nama' => set_value('nama'),
	                'email' => set_value('email'),
	                'telp' => set_value('telp'),
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
            if (count($this->Users_model->get_by_id($this->input->post('newusername', TRUE)))>=1) {
                $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
                $this->create();
                return FALSE;
            }

            $data = array(
                    'username' => $this->input->post('newusername',TRUE),
                    'password' => md5($this->input->post('password',TRUE)),
                    'nama' => $this->input->post('nama',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'telp' => $this->input->post('telp',TRUE),
                    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
            redirect(site_url('admin/Users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->defaultPageAttribute['content'] = "admin/users/users_form";
            $this->defaultPageAttribute['title'] = "Ubah Data Users";
            $this->defaultPageAttribute['subtitle'] = array(
                                                        "Users",
                                                        "Ubah Data",
                                                        );
            $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('admin/Users/update_action'),
                    'username' => set_value('username', $row->username),
                    'password' => set_value('password', NULL),
                    'nama' => set_value('nama', $row->nama),
                    'email' => set_value('email', $row->email),
                    'telp' => set_value('telp', $row->telp),
	                    'PageAttribute' => $this->defaultPageAttribute
                    );
            $this->load->view($this->container, $data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } else {
            if ($this->input->post('username', TRUE)!=$this->input->post('newusername', TRUE)) {
                if (count($this->Users_model->get_by_id($this->input->post('newusername', TRUE)))>=1) {
                    $this->session->set_flashdata('ci_flash_message', 'Berhasil menambahkan data');
                    $this->create();
                    return FALSE;
                }
            }
            
            $data = array(
                    'username' => $this->input->post('newusername',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'telp' => $this->input->post('telp',TRUE),
                    );

            if ($this->input->post('password', TRUE)!=NULL) {
                $data["password"]=md5($this->input->post('password',TRUE));
            }

            $this->Users_model->update($this->input->post('username', TRUE), $data);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
            redirect(site_url('admin/Users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('ci_flash_message', 'Data berhasil dihapus');
            redirect(site_url('admin/Users'));
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('admin/Users'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('password', 'password', 'trim');
       $this->form_validation->set_rules('nama', 'nama', 'trim|required');
       $this->form_validation->set_rules('email', 'email', 'trim|required');
       $this->form_validation->set_rules('telp', 'telp', 'trim|required');
       $this->form_validation->set_rules('username', 'username', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */