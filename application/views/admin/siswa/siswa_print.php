    <div class="row" style="margin-bottom: 10px">
        <button id="print_js" class="btn btn-md btn-primary pull-right"><i class="fa fa-print"></i>&nbsp;Print</button>
        <div class="col-lg-8 col-md-8 col-sm-8">
            Offset Tanda Tangan : <input type="number" min="15" max="99999999999" id="plc-offset" value="55">&nbsp;<small>Naikan nilai ini jika tempat tanda tangan kurang kebawah atau terlalu tinggi</small>
        </div>
        <div class="d-none hidden" id="print-title">Data Siswa</div>
    </div>

    <hr class="mt-5 mb-5">

    <div class="card">
        <div class="card-body">
            <div class="printable">
                <table width="100%">
                    <tr>
                        <td rowspan="5" width="15%" class="text-center">
                            <img src="<?php echo (base_url('assets/images/Kemenag-Logo.png')) ?>" alt="" style="width: 70px; height: 70px;">
                        </td>
                        <td width="70%" class="text-center">
                            <span style="font-size: 14px;"><strong>KEMENTRIAN AGAMA</strong></span>
                        </td>
                        <td rowspan="5" width="15%" class="text-center">
                            <img src="<?php echo (base_url('assets/images/ddi-color.jpg')) ?>" alt="" style="width: 70px; height: 70px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span style="font-size: 14px;">MADRASAH TSANAWIYAH</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span style="font-size: 14px;">DARUD DA’WAH WAL-IRSYAD (DDI) KOTA HARAPAN</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span style="font-size: 14px;">KEC. MUARA SABAK TIMUR KAB. TANJUNG JABUNG TIMUR PROVINSI JAMBI</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span style="font-size: 9px;">Alamat : Kompleks DDI Jalan Melati No 22 Kota Harapan NSM :312150901061 NPSN :10505338. Kode Pos 36561</span>
                        </td>
                    </tr>
                </table>
                <hr style="border: 1px solid black;">
                <div class="table-responsive">
                    <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat / tanggal Lahir</th>
                                <th>Hp</th>
                                <th>Tahun Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($siswa_data as $siswa) {
                            ?>
                                <tr>
                                    <td width="40px" class="text-center"><?php echo ++$start ?></td>
                                    <td><?php echo $siswa->nis ?></td>
                                    <td><?php echo $siswa->nama ?></td>
                                    <td><?php echo $siswa->jenis_kelamin ?></td>
                                    <td><?php echo $siswa->tempat_lahir . ", " . $siswa->tanggal_lahir ?></td>
                                    <td><?php echo $siswa->hp ?></td>
                                    <td><?php echo $siswa->tahun_masuk ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <table width="100%" style="margin-top: 55px;" id="table-signature">
                    <tr>
                        <td width="46%" style="padding-left:25px;color: black"><strong>Catatan :</strong></td>
                        <td width="2%">&nbsp;</td>
                        <td width="30%" style="text-align:center;color: black"></td>
                        <td width="2%">&nbsp;</td>
                        <td width="30%" style="text-align:center;color: black"><strong>Mengetahui,</strong></td>
                    </tr>
                    <tr height="100px">
                        <td rowspan="2" style="border: 1px solid black;">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="border-bottom: 1px solid black;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td style="text-align:center;color: black"></td>
                        <td>&nbsp;</td>
                        <td style="text-align:left;color: black">NIP. </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>