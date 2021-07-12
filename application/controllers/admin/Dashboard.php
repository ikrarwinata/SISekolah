<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
    private $container = "admin/container";
    private $defaultPageAttribute = array(
                        'title' => "Dashboard",
                        'subtitle' => array("Admin"),
                        'bootstraps' => array(),
                        'scripts' => array(),
                        'content' => "admin/",
                        );

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("level")!="admin") {
            redirect("Home");
        }
    }

	public function index($viewrange = 0)
	{
        $this->defaultPageAttribute['content'] = "admin/home";
        $this->defaultPageAttribute['title'] = "Dashboard";
        $this->defaultPageAttribute['subtitle'] = array(
                                                    "Dashboard",
                                                    );
        $this->defaultPageAttribute['scripts'] = array(
                                                    "assets/aceadmin/js/jquery.easypiechart.min.js",
                                                    "assets/aceadmin/js/jquery.flot.min.js",
                                                    "assets/aceadmin/js/jquery.flot.pie.min.js",
                                                    "assets/aceadmin/js/jquery.flot.resize.min.js",
                                                    "assets/aceadmin/js/admin-dashboard.js",
                                                    );
        $this->load->model('Pengunjung_model');
        $colors[0] = "#d955c9";
        $colors[1] = "#68BC31";
        $colors[2] = "#2091CF";
        $colors[3] = "#AF4E96";
        $colors[4] = "#DA5430";
        $colors[5] = "#FEE074";
        $colors[6] = "#d955c9";
        $colors[7] = "#c46529";
        $colors[8] = "#f7e300";
        $colors[9] = "#9cfc00";
        $colors[10] = "#665dcf";
        $colors[11] = "#bf0079";
        $colors[12] = "#bf0006";

        if ($viewrange==0) {
            $dt = array();
            for($i=1;$i<=12;$i++){
                $startstring = strtotime("01-".$i.date("-Y 00:00:00"));
                $endstring = strtotime(date("t-").$i.date("-Y 17:00:00"));
                $dt[get_str_month($i)] = array(
                    'nilai' => $this->db->query("SELECT COUNT(*) AS total FROM pengunjung WHERE tanggal BETWEEN ".$startstring." AND ".$endstring)->row()->total,
                    'warna' => $colors[$i],
                );
            };
            $startstring = strtotime("01-01-".date("Y 00:00:00"));
            $endstring = strtotime(date("t")."-12-".date("Y 17:00:00"));
            $total = $this->db->query("SELECT COUNT(*) AS total FROM pengunjung WHERE tanggal BETWEEN ".$startstring." AND ".$endstring)->row()->total;
        }else{
            $dt = array();
            for($i=1;$i<=12;$i++){
                $dt[get_str_month($i)] = array(
                    'nilai' => $this->db->query("SELECT COUNT(*) AS total FROM pengunjung WHERE bulan = ".$i)->row()->total,
                    'warna' => $colors[$i],
                );
            };
            $total = $this->Pengunjung_model->total_rows();
        }

        $data = array(
                'viewrange' => $viewrange,
                'perc_pengunjung' => $dt,
                'total_data' => $total,
                'PageAttribute' => $this->defaultPageAttribute
                );
        $this->load->view($this->container, $data);
	}
}
