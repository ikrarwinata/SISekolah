<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    require(APPPATH.'third_party'.DIRECTORY_SEPARATOR.'phpspreadsheet'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Guru_excel extends CI_Model
{

    public $table = 'guru';
    public $id = 'id';
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
        $this->load->model('Guru_model');
    }

    public function export(){
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Shouts')
        ->setLastModifiedBy('Shouts')
        ->setTitle('Data Guru')
        ->setSubject('Data Guru')
        ->setDescription('Data Guru Tahun '.date("Y"))
        ->setKeywords('Guru')
        ->setCategory('Guru');

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A3', 'Data Guru '.date("Y"));
        $spreadsheet->getActiveSheet()->mergeCells('A3:E3');
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', date("d M Y H:i"));
        $spreadsheet->getActiveSheet()->mergeCells('A4:E4');

        $startRowHeader = 6;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$startRowHeader, 'No')
        ->setCellValue('B'.$startRowHeader, 'Nama')
        ->setCellValue('C'.$startRowHeader, 'Jenis Kelamin')
        ->setCellValue('D'.$startRowHeader, 'Jabatan')
        ->setCellValue('E'.$startRowHeader, 'Tempat lahir')
        ->setCellValue('F'.$startRowHeader, 'Tanggal lahir')
        ->setCellValue('G'.$startRowHeader, 'Email')
        ->setCellValue('H'.$startRowHeader, 'Hp')
        ->setCellValue('I'.$startRowHeader, 'Alamat')
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

        $spreadsheet->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

        $spreadsheet->getActiveSheet()->mergeCells('A1:I1');
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', $this->Profil_sekolah_model->get_profil("nama_sekolah"));
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($this->Header_Style);

        $startRowBody = $startRowHeader+1;
        $index = 0;
        $data_guru = $this->Guru_model->get_all();
        foreach ($data_guru as $key => $guru) {
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$startRowBody, ++$index)
            ->setCellValue('B'.$startRowBody, $guru->nama)
            ->setCellValue('C'.$startRowBody, $guru->jenis_kelamin)
            ->setCellValue('D'.$startRowBody, $guru->jabatan)
            ->setCellValue('E'.$startRowBody, $guru->tempat_lahir)
            ->setCellValue('F'.$startRowBody, $guru->tanggal_lahir)
            ->setCellValue('G'.$startRowBody, $guru->email)
            ->setCellValue('H'.$startRowBody, $guru->hp)
            ->setCellValue('I'.$startRowBody, $guru->alamat)
            ;
            $startRowBody++;
        };

        $spreadsheet->getActiveSheet()->setTitle('Data Guru '.date('Y'));
        $spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="guru '.date("Y").'.xlsx"');
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
        $useID = FALSE; 
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
                    "nama" => $cellData[0][$startColumnIndex + 1],
                    "jabatan" => $cellData[0][$startColumnIndex + 3],
                    "jenis_kelamin" => $cellData[0][$startColumnIndex + 2],
                    "tempat_lahir" => $cellData[0][$startColumnIndex + 4],
                    "tanggal_lahir" => $cellData[0][$startColumnIndex + 5],
                    "email" => $cellData[0][$startColumnIndex + 6],
                    "hp" => $cellData[0][$startColumnIndex + 7],
                    "alamat" => $cellData[0][$startColumnIndex + 8]
                );
            }else{
                if (
                    strtolower($cellData[0][0]) == "no" &&
                    strtolower($cellData[0][1]) == "nama" &&
                    strtolower($cellData[0][2]) == "jenis kelamin" &&
                    strtolower($cellData[0][3]) == "jabatan" &&
                    strtolower($cellData[0][4]) == "tempat lahir" &&
                    strtolower($cellData[0][5]) == "tanggal lahir"
                ) {
                    $startImport = TRUE;
                    $startColumnIndex = 1;
                }elseif (
                    strtolower($cellData[0][0]) == "nama" &&
                    strtolower($cellData[0][1]) == "jenis kelamin" &&
                    strtolower($cellData[0][2]) == "jabatan" &&
                    strtolower($cellData[0][3]) == "tempat lahir" &&
                    strtolower($cellData[0][4]) == "tanggal lahir"
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