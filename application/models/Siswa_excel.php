<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    require(APPPATH.'third_party'.DIRECTORY_SEPARATOR.'phpspreadsheet'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Siswa_excel extends CI_Model
{

    public $table = 'siswa';
    public $id = 'nis';
    public $order = 'DESC';
    public $Header_Style = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                    'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                    'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                    'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
                )
            );
    public $LeftBorder = array(
                'borders' => array(
                    'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
                )
            );
    public $RightBorder = array(
                'borders' => array(
                    'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border right dengan garis tipis
                )
            );
    public $Separator = array(
                'alignment' => array(
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                )
            );

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
    }

    public function export(){
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Shouts')
        ->setLastModifiedBy('Shouts')
        ->setTitle('Data Siswa')
        ->setSubject('Data Siswa')
        ->setDescription('Data Siswa Tahun '.date("Y"))
        ->setKeywords('Siswa')
        ->setCategory('Siswa');

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A3', 'Data Siswa '.date("Y"));
        $spreadsheet->getActiveSheet()->mergeCells('A3:E3');
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', date("d M Y H:i"));
        $spreadsheet->getActiveSheet()->mergeCells('A4:E4');

        $startRowHeader = 6;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$startRowHeader, 'No')
        ->setCellValue('B'.$startRowHeader, 'NIS')
        ->setCellValue('C'.$startRowHeader, 'Nama Lengkap')
        ->setCellValue('D'.$startRowHeader, 'Jenis Kelamin')
        ->setCellValue('E'.$startRowHeader, 'Tempat lahir')
        ->setCellValue('F'.$startRowHeader, 'Tanggal lahir')
        ->setCellValue('G'.$startRowHeader, 'Tahun Masuk')
        ->setCellValue('H'.$startRowHeader, 'Email')
        ->setCellValue('I'.$startRowHeader, 'Hp')
        ->setCellValue('J'.$startRowHeader, 'Alamat')
        ;

        $spreadsheet->getActiveSheet()->getStyle("A".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("B".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("C".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("D".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("E".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("F".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("G".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("H".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("I".$startRowHeader)->applyFromArray($this->Header_Style);
        $spreadsheet->getActiveSheet()->getStyle("J".$startRowHeader)->applyFromArray($this->Header_Style);

        $spreadsheet->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

        $spreadsheet->getActiveSheet()->mergeCells('A1:J1');
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', $this->Profil_sekolah_model->get_profil("nama_sekolah"));
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')->applyFromArray($this->Header_Style);

        $startRowBody = $startRowHeader+1;
        $index = 0;
        $data_siswa = $this->Siswa_model->get_all();
        foreach ($data_siswa as $key => $siswa) {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$startRowBody, ++$index)
            ->setCellValue('B'.$startRowBody, $siswa->nis)
            ->setCellValue('C'.$startRowBody, $siswa->nama)
            ->setCellValue('D'.$startRowBody, $siswa->jenis_kelamin)
            ->setCellValue('E'.$startRowBody, $siswa->tempat_lahir)
            ->setCellValue('F'.$startRowBody, $siswa->tanggal_lahir)
            ->setCellValue('G'.$startRowBody, $siswa->tahun_masuk)
            ->setCellValue('H'.$startRowBody, $siswa->email)
            ->setCellValue('I'.$startRowBody, $siswa->hp)
            ->setCellValue('J'.$startRowBody, $siswa->alamat)
            ;
            $startRowBody++;
        };

        $spreadsheet->getActiveSheet()->setTitle('Data Siswa '.date('Y'));
        $spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="siswa siswi '.date("Y").'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }


    public function import($filepath){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($filepath);

        $sheet = $spreadsheet->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $res = array();
        $startImport = FALSE;
        $startColumnIndex = 0;
        for ($row = 1; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            $cellData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                            NULL,
                                            TRUE,
                                            FALSE);   

             // Sesuaikan key array dengan nama kolom di database
            if ($cellData==NULL) continue;
            if ((!isset($cellData[0][0])) && (!isset($cellData[0][1])) && ($cellData[0][0] == NULL) && ($cellData[0][1] == NULL)) continue;
            
            if ($startImport==TRUE) {
                $res[] = array(
                    "nis"=> $cellData[0][$startColumnIndex],
                    "nama"=> $cellData[0][$startColumnIndex+1],
                    "jenis_kelamin"=> $cellData[0][$startColumnIndex+2],
                    "tempat_lahir"=> $cellData[0][$startColumnIndex+3],
                    "tanggal_lahir"=> $cellData[0][$startColumnIndex+4],
                    "tahun_masuk"=> $cellData[0][$startColumnIndex+5],
                    "email"=> $cellData[0][$startColumnIndex+6],
                    "hp"=> $cellData[0][$startColumnIndex+7],
                    "alamat"=> $cellData[0][$startColumnIndex+8]
                );
            }else{
                if (
                    strtolower($cellData[0][0]) == "no" &&
                    strtolower($cellData[0][1]) == "nis" &&
                    (strtolower($cellData[0][2]) == "nama" || strtolower($cellData[0][2]) == "nama lengkap") &&
                    strtolower($cellData[0][3]) == "jenis kelamin" &&
                    strtolower($cellData[0][4]) == "tempat lahir" &&
                    strtolower($cellData[0][5]) == "tanggal lahir" &&
                    strtolower($cellData[0][6]) == "tahun masuk" &&
                    strtolower($cellData[0][7]) == "email" &&
                    strtolower($cellData[0][8]) == "hp"
                ) {
                    $startImport = TRUE;
                    $startColumnIndex = 1;
                }elseif (
                    strtolower($cellData[0][0]) == "nis" &&
                    (strtolower($cellData[0][1]) == "nama" || strtolower($cellData[0][1]) == "nama lengkap") &&
                    strtolower($cellData[0][2]) == "jenis kelamin" &&
                    strtolower($cellData[0][3]) == "tempat lahir" &&
                    strtolower($cellData[0][4]) == "tanggal lahir" &&
                    strtolower($cellData[0][5]) == "tahun masuk" &&
                    strtolower($cellData[0][6]) == "email" &&
                    strtolower($cellData[0][7]) == "hp"
                ) {
                    $startImport = TRUE;
                    $startColumnIndex = 0;
                }
            };
        };

        return $res;
    }
}

/* End of file Pelamar_model.php */
/* Location: ./application/models/Pelamar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-14 06:43:01 */
/* http://harviacode.com */