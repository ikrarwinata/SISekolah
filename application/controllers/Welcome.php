<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require(APPPATH . 'third_party' . DIRECTORY_SEPARATOR . 'phpmailer/Exception.php');
require(APPPATH . 'third_party' . DIRECTORY_SEPARATOR . 'phpmailer/PHPMailer.php');
require(APPPATH . 'third_party' . DIRECTORY_SEPARATOR . 'phpmailer/SMTP.php');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('ipsaved')!=TRUE) {
       		$this->load->model('Pengunjung_model');
			$this->load->library('user_agent');

			$agent = $this->agent->platform().", ";
			if ($this->agent->is_browser())
			{
			        $agent .= $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			        $agent .= $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			        $agent .= $this->agent->mobile();
			}
			else
			{
			        $agent = 'Unidentified User Agent';
			}
			$ip = $this->input->ip_address();

			$date = new DateTime();
			$s = array(
				'ip'=>$ip,
				'useragent'=>$agent,
				'tanggal'=>$date->getTimestamp(),
				'bulan'=> date("m")
			);
			$this->Pengunjung_model->insert($s);
			
			$ip_data["ip"] = $ip;
			$ip_data["ipsaved"] = TRUE;

			$this->session->set_userdata($ip_data);
        }
    }

	public function index()
	{
		$this->load->model('Carousel_model');
		$this->load->model('Berita_model');
		$this->load->model('Guru_model');
		$this->load->model('Gallery_model');
        $berita = $this->Berita_model->get_limit_data(4, 0, NULL);
        $guru = $this->Guru_model->get_front_view(4, 0, NULL);

		$data = array(
			'carousel'=>TRUE,
			'gallery_data'=>$this->Gallery_model->get_limit_data(4, 0, NULL),
            'berita_data' => $berita,
            'guru_data' => $guru,
			'carousel_data'=>$this->Carousel_model->get_all(),
			'konten' => "home",
			);
		$this->load->view('container',$data);
	}

	public function berita()
	{
		$this->load->model('Berita_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/berita?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/berita?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/berita';
            $config['first_url'] = base_url() . 'Welcome/berita';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Berita_model->total_rows($q);
        $berita = $this->Berita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'berita_data' => $berita,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'konten' => "berita",
        );
		$this->load->view('container',$data);
	}

    public function detail_berita($id) 
    {
        $this->load->model('Berita_model');
        $row = $this->Berita_model->get_by_id($id);
        $berita = $this->Berita_model->get_limit_data(4, 0, NULL);
        
        if ($row) {
            $data = array(
                    'berita_data' => $berita,
                    'id' => $row->id,
                    'caption' => $row->caption,
                    'dilihat' => $row->dilihat+1,
                    'foto' => $row->foto,
                    'deskripsi' => $row->deskripsi,
                    'tanggal' => date("d M Y", $row->tanggal),
                    'user' => $row->user,
                    'konten' => "detail_berita",
                    );
            $this->Berita_model->update($row->id, array('dilihat'=>$row->dilihat+1));
            $this->load->view('container',$data);
        } else {
            $this->session->set_flashdata('ci_flash_message', 'Upsss, data yang anda cari tidak ditemukan...');
            redirect(site_url('Welcome/berita'));
        }
    }

	public function kegiatan()
	{
		$this->load->model('Kegiatan_siswa_model');
        $this->Kegiatan_siswa_model->defaultorder="ASC";
        $kegiatan = $this->Kegiatan_siswa_model->get_all();
        $data = array(
            'kegiatan_data' => $kegiatan,
            'start' => 0,
			'konten' => "kegiatan",
        );
		$this->load->view('container',$data);
	}

	public function about()
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
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_tanah");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_bangunan");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_lapangan");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_halaman");
        $profil_sekolah[] = $this->Profil_sekolah_model->get_by_id("luas_sisa");

        $data = array(
            'profil_sekolah_data' => $profil_sekolah,
            'start' => 0,
			'konten' => "about",
        );
		$this->load->view('container',$data);
	}

	public function visimisi()
	{
        $data = array(
            'visi' => $this->Profil_sekolah_model->get_by_id("visi"),
            'misi' => $this->Profil_sekolah_model->get_by_id("misi"),
            'start' => 0,
			'konten' => "visimisi",
        );
		$this->load->view('container',$data);
	}

	public function sejarah()
	{
        $data = array(
            'sejarah' => $this->Profil_sekolah_model->get_by_id("sejarah"),
            'start' => 0,
			'konten' => "sejarah",
        );
		$this->load->view('container',$data);
	}

    public function struktur()
    {
        $data = array(
            'gambar_struktur' => $this->Profil_sekolah_model->get_by_id("struktur"),
            'detail_struktur' => $this->Profil_sekolah_model->get_by_id("keterangan_struktur"),
			'konten' => "struktur",
        );
		$this->load->view('container',$data);
    }

    public function guru()
    {
		$this->load->model('Guru_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/guru?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/guru?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/guru';
            $config['first_url'] = base_url() . 'Welcome/guru';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Guru_model->total_rows($q);
        $guru = $this->Guru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'guru_data' => $guru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
			'konten' => "guru",
        );
		$this->load->view('container',$data);
    }

    public function siswa()
    {
        $this->load->model('Siswa_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/siswa?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/siswa?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/siswa';
            $config['first_url'] = base_url() . 'Welcome/siswa';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => "siswa",
        );
        $this->load->view('container', $data);
    }

    public function alumni()
    {
        $this->load->model('Alumni_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/alumni?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/alumni?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/alumni';
            $config['first_url'] = base_url() . 'Welcome/alumni';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Alumni_model->total_rows($q);
        $alumni = $this->Alumni_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'alumni_data' => $alumni,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => "alumni",
        );
        $this->load->view('container', $data);
    }

    public function prestasi()
    {
        $this->load->model('Prestasi_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/prestasi?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/prestasi?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/prestasi';
            $config['first_url'] = base_url() . 'Welcome/prestasi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Prestasi_model->total_rows($q);
        $prestasi = $this->Prestasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'prestasi_data' => $prestasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => "prestasi",
        );
        $this->load->view('container',$data);
    }

    public function fasilitas()
    {
        $this->load->model('Fasilitas_model');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/fasilitas?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/fasilitas?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/fasilitas';
            $config['first_url'] = base_url() . 'Welcome/fasilitas';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fasilitas_model->total_rows($q);
        $fasilitas = $this->Fasilitas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fasilitas_data' => $fasilitas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => "fasilitas",
        );
        $this->load->view('container',$data);
    }

    public function link2(){
        
        $data = array(
            'konten' => "baru",
        );
        $this->load->view('container',$data);
    }

    public function kontak()
    {
        $data = array(
			'konten' => "contact",
        );
		$this->load->view('container',$data);
    }

	public function gallery()
	{
		$this->load->model('Gallery_model');

		$data = array(
			'gallery_data'=>$this->Gallery_model->get_all(),
			'konten' => "gallery",
			);
		$this->load->view('container',$data);
	}

    public function psb()
    {
        $data = array(
            'visi' => $this->Profil_sekolah_model->get_by_id("visi"),
            'misi' => $this->Profil_sekolah_model->get_by_id("misi"),
            'start' => 0,
            'konten' => "psb",
        );
        $this->load->view('container', $data);
    }

    public function psb_action()
    {
        $this->load->model('Pendaftar_model');
        $this->Pendaftar_model->db
        ->where("nama", $this->input->post('nama', TRUE))
        ->where("asal_sekolah", $this->input->post('sekolah_asal', TRUE))
        ->where("tanggal_lahir", $this->input->post('tanggal_lahir', TRUE))
        ->where("hubungan_wali", $this->input->post('hubungan_ortu', TRUE))
        ->where("nama_ortu", $this->input->post('nama_ortu', TRUE));
        $row = $this->Pendaftar_model->db->get($this->Pendaftar_model->table)->row();

        if($row) {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'id' => $row->id,
                'konten' => "psb_failed",
            );
            $this->load->view('container', $data);
        }else{
            $u = strtotime("now");
            $data = array(
                'id' => $u,
                'nama' => $this->input->post('nama', TRUE),
                'asal_sekolah' => $this->input->post('sekolah_asal', TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'nilai_ujian' => $this->input->post('nilai_ujian', TRUE),
                'hubungan_wali' => $this->input->post('hubungan_ortu', TRUE),
                'nama_ortu' => $this->input->post('nama_ortu', TRUE),
                'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu', TRUE),
                'alamat_ortu' => $this->input->post('alamat_ortu', TRUE),
                'email_ortu' => $this->input->post('email_ortu', TRUE),
                'hp_ortu' => $this->input->post('hp_ortu', TRUE),
            );

            $this->Pendaftar_model->insert($data);
            
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'id' => $u,
                'konten' => "psb_success",
            );

            $this->send_psb_mail($u);

            $this->load->view('container', $data);
        }
    }

    protected function send_psb_mail($target){
        $this->load->model("Profil_sekolah_model");
        $this->load->model("Pendaftar_model");
        $dataTarget = $this->Pendaftar_model->db->where("id", $target)->get($this->Pendaftar_model->table)->row();

        $email_pengirim = $this->Profil_sekolah_model->get_by_id("email")->nilai; // Isikan dengan email pengirim
        $password_pengirim = $this->Profil_sekolah_model->get_by_id("password_email")->nilai; // Isikan dengan email pengirim
        $nama_pengirim = $this->Profil_sekolah_model->get_by_id("nama_singkat_sekolah")->nilai; // Isikan dengan nama pengirim
        $email_penerima = $this->Profil_sekolah_model->get_by_id("email_petugas_psb")->nilai; // Ambil email penerima dari inputan form
        $subjek = "Penerimaan Siswa Baru"; // Ambil subjek dari inputan form
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim; // Email Pengirim
        $mail->Password = $password_pengirim; // Isikan dengan Password email pengirim
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
        
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima, '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $message = "
<html>
<head>
<title>Penerimaan Siswa Baru</title>
</head>
<body>
<p>Pendaftar baru pada " . get_str_day() . ", " . date("d M Y H:i:s") . "</p>
<table>
<tr>
    <td>ID Pendaftar</td>
    <td>: " . $target . "</td>
</tr>
<tr>
    <td>Nama Calon " . ($dataTarget->jenis_kelamin == "Pria" ? "Siswa" : "Siswi") . "</td>
    <td>: " . $dataTarget->nama . "</td>
</tr>
<tr>
    <td>Tempat & Tgl Lahir</td>
    <td>: " . $dataTarget->tempat_lahir . ", " . $dataTarget->tanggal_lahir . "</td>
</tr>
<tr>
    <td>Nama " . $dataTarget->hubungan_wali . "</td>
    <td>: " . $dataTarget->nama_ortu . "</td>
</tr>
</table>
</body>
</html>
";

        $mail->Subject = $subjek;
        $mail->Body = $message;
        $send = $mail->send();
        if ($send) { // Jika Email berhasil dikirim
            return TRUE;
        } else { // Jika Email gagal dikirim
            return FALSE;
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error
        }
    }

	public function login(){
		if ($this->session->userdata("level")=="admin" && $this->session->userdata('keepalive')==1) {
			redirect("Admin");
		};
		$this->load->view('login');
	}

	public function login_action(){
		$this->load->model('Users_model');
		$u = $this->input->post("username");
		$p = $this->input->post("password");
		$keepalive = $this->input->post('keepalive', TRUE);
		$akun = $this->Users_model->get_row(array('username'=>$u,'password'=>md5($p)));
		if ($akun) {
			if ($u == $akun->username && md5($p) == $akun->password) {
				$array = array(
					'username'=>$u,
					'password'=>$p,
					'nama'=>$akun->nama,
					'email'=>$akun->email,
					'telp'=>$akun->telp,
					'level'=>"admin",
					'keepalive'=>$keepalive,
				);
				$this->session->set_userdata( $array );
				redirect("Admin");
				return;
			}
		}
		$this->session->set_flashdata('ci_flash_message', 'Username atau password yang anda masukan salah !');
        $this->session->set_flashdata('ci_flash_message_type', 'text-danger');
        $this->login();
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('telp');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('keepalive');
		$this->login();
	}
}
