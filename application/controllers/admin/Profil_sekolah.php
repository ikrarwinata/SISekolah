<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_sekolah extends CI_Controller
{
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Profil_sekolah"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_sekolah_model');
        $this->load->library('form_validation');
        if ($this->session->userdata("level")!="admin") {
            redirect("Home");
        }
    }

    public function index()
    {
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("nama_sekolah");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("nama_singkat_sekolah");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("alamat");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("provinsi");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("kode_pos");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("no_stats");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("no_sk_kanwil");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("akreditasi");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("phone");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("email");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("password_email");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_tanah");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_bangunan");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_lapangan");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_halaman");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_sisa");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("email_petugas_psb");

        $this->defaultPageAttribute['content'] = "admin/profil_sekolah/profil_sekolah_list";
        $this->defaultPageAttribute['title'] = "Profil Sekolah";
        $this->defaultPageAttribute['subtitle'] = array(
            'Profil Sekolah', 'Informasi Dasar'
        );

        $data = array(
            'profil_sekolah_data' => $profil_sekolah,
            'start' => 0,
            'action' => "admin/Profil_sekolah/update_profil",
            'urlback'=>"admin/Profil_sekolah",
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function visimisi()
    {
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("visi");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("misi");

        $this->defaultPageAttribute['content'] = "admin/profil_sekolah/profil_sekolah_list";
        $this->defaultPageAttribute['title'] = "Visi & Misi";
        $this->defaultPageAttribute['subtitle'] = array(
            'Profil Sekolah', 'Visi Misi'
        );
        $this->defaultPageAttribute['scripts'] = array(
            'assets/aceadmin/ckeditor/ckeditor.js',
            'assets/aceadmin/js/admin-ckeditor.js',
        );

        $data = array(
            'profil_sekolah_data' => $profil_sekolah,
            'start' => 0,
            'action' => "admin/Profil_sekolah/update_profil",
            'urlback'=>"admin/Profil_sekolah/visimisi",
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function sejarah()
    {
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("sejarah");

        $this->defaultPageAttribute['content'] = "admin/profil_sekolah/profil_sekolah_list";
        $this->defaultPageAttribute['title'] = "Sejarah Sekolah";
        $this->defaultPageAttribute['subtitle'] = array(
            'Profil Sekolah', 'Sejarah Sekolah'
        );
        $this->defaultPageAttribute['scripts'] = array(
            'assets/aceadmin/ckeditor/ckeditor.js',
            'assets/aceadmin/js/admin-ckeditor.js',
        );

        $data = array(
            'profil_sekolah_data' => $profil_sekolah,
            'start' => 0,
            'action' => "admin/Profil_sekolah/update_profil",
            'urlback'=>"admin/Profil_sekolah/sejarah",
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }

    public function struktur()
    {
        $this->defaultPageAttribute['content'] = "admin/profil_sekolah/struktur_sekolah_list";
        $this->defaultPageAttribute['title'] = "Struktur Organisasi";
        $this->defaultPageAttribute['subtitle'] = array(
            'Profil Sekolah', 'Struktur Organisasi'
        );
        $this->defaultPageAttribute['scripts'] = array(
            'assets/aceadmin/ckeditor/ckeditor.js',
            'assets/aceadmin/js/admin-ckeditor.js',
        );

        $data = array(
            'gambar_struktur' => $this->Profil_sekolah_model->get_by_id("struktur"),
            'detail_struktur' => $this->Profil_sekolah_model->get_by_id("keterangan_struktur"),
            'action' => "admin/Profil_sekolah/update_struktur",
            'urlback'=>"admin/Profil_sekolah/struktur",
            'PageAttribute' => $this->defaultPageAttribute
        );
        $this->load->view($this->container, $data);
    }
    
    public function update_profil() 
    {   
        $ids = $this->input->post('id', TRUE);
        for($i = 0; $i < count($ids); $i++){
            $data = array(
                'nilai' => $this->input->post('nilai', TRUE)[$i],
                );
            $this->Profil_sekolah_model->update($ids[$i], $data);
        }

        $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
        redirect(site_url($this->input->post('urlback', TRUE)));
    }
    
    public function update_struktur() 
    {   
        $config['upload_path']          = './files/profil_sekolah';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
        $config['max_size']             = 2008;
        $config['max_width']            = 13660;
        $config['max_height']           = 7680;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('struktur')){
            unlink_safe($this->Profil_sekolah_model->get_profil("struktur"));

            $foto = $config['upload_path']."/"."struktur_img".strtotime(date("d-m-Y H:i:s")).$this->upload->data("file_ext");
            rename($this->upload->data("full_path"), $foto);
            $struktur = array(
                'nilai' => $foto,
                );
            $this->Profil_sekolah_model->update("struktur", $struktur);
        }
        

        $this->Profil_sekolah_model->update("keterangan_struktur", array('nilai'=>$this->input->post('keterangan_struktur', TRUE)));
        $this->session->set_flashdata('ci_flash_message', 'Data berhasil diperbarui');
        redirect(site_url($this->input->post('urlback', TRUE)));
    }

}

/* End of file Profil_sekolah.php */
/* Location: ./application/controllers/Profil_sekolah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */