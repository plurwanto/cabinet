<?php
if (!empty($show)) {
    $doc_number = $show->document_number;
    $confirm_accept = $show->step5_accept;
    $RealAccountStepFifeSettlementOfDisputes1 = $show->step5_StepFifeSettlementOfDisputes;
    $RealAccountStepFifeDistrictCourtId1 = $show->step5_StepFifeDistrictCourtId;
    $RealAccountStepFifeBranchId1 = $show->step5_StepFifeBranchId;
    $checked = ($confirm_accept == "1" ? " checked " : "");

    $fullName = $show->FullName;
    $address = $show->Address;
    $work = ($show->work == "lainnya" ? $show->work_info : $show->work);
}
?>

<div class="row">
    <div class="col-sm-12">
        <?php echo $this->session->flashdata('msg');?>
    </div>
</div>
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">New Account Request</h4>
                </div>
                <div class="panel-body">
                    <!-- start: WIZARD ACCOUNTS -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" name="frm5" id="frm5" class="smart-wizard">
                                    <div id="wizard" class="swMain">
                                        <!-- start: WIZARD SEPS -->
                                        <ul>
                                            <li>
                                                <a href="#step1" class="selected">
                                                    <div class="stepNumber">
                                                        1
                                                    </div>
                                                    <span class="stepDesc"><small> Step 1 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2_1" class="selected">
                                                    <div class="stepNumber">
                                                        2.1
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 2.1 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2_2" class="selected">
                                                    <div class="stepNumber">
                                                        2.2
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 2.2 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step3" class="selected">
                                                    <div class="stepNumber">
                                                        3
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 3 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step4" class="selected">
                                                    <div class="stepNumber">
                                                        4
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 4 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step5" class="selected">
                                                    <div class="stepNumber animated tada">
                                                        5
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 5 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step6">
                                                    <div class="stepNumber">
                                                        6
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 6 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step7">
                                                    <div class="stepNumber">
                                                        7
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 7 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step8">
                                                    <div class="stepNumber">
                                                        8
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 8 </small> </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <input type="hidden" name="new_doc" id="new_doc" value="<?=$kode;?>">
                                            <input type="hidden" name="old_doc" id="old_doc" value="<?=$doc_number;?>">

                                            <div class="col-md-8 col-sm-6">Formulir Nomor 107.BPK.05.2</div> 

                                            <div class="col-md-4 col-sm-6">
                                                <table class="table">
                                                    <tr>
                                                        <td>Lampiran</td>
                                                        <td>:</td>
                                                        <td>Peraturan Kepala Badan Pengawas</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Perdagangan Berjangka Komoditi</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>Nomor: 107/BAPPEBTI/PER/11/2013</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <p class="text-center"><strong>PERJANJIAN PEMBERIAN AMANAT SECARA ELEKTRONIK ON- LINE</strong></p>
                                                <p class="text-center hidden 107BPK051"><strong>UNTUK TRANSAKSI KONTRAK BERJANGKA</strong></p>
                                                <p class="text-center hidden 107BPK052"><strong>UNTUK TRANSAKSI KONTRAK DERIVATIF</strong></p>
                                                <p class="text-center hidden 107BPK052"><strong>DALAM SISTEM PERDAGANGAN ALTERNATIF</strong></p>
                                                <p class="text-center hidden 107BPK052"><span class="labeling">AGREEMENT GRANT OF TRUSTEES ELECTRONIC On-Line<br />CONTRACT FOR DERIVATIVE TRANSACTIONS<br />IN THE ALTERNATIVE TRADING SYSTEM</span></p>
                                                <p>&nbsp;</p>
                                                <div class="alert alert-danger text-center"><strong>PERHATIAN !</strong><br>PERJANJIAN INI MERUPAKAN KONTRAK HUKUM HARAP DIBACA DENGAN SEKSAMA
                                                    <br /><span class="labeling">ATTENTION!<br />THIS AGREEMENT IS A LEGAL CONTRACT, PLEASE READ IT CAREFULLY</span>
                                                </div>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>

                                                <p>
                                                    Pada hari ini Selasa, tanggal 27, bulan 02, tahun  2018 , kami yang mengisi perjanjian di bawah ini: 
                                                    <br /><span class="labeling">On this day, Selasa, the 27, 02, 2018, we are filling the agreement below:</span>
                                                </p>
                                                <ol type="1">
                                                    <li>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Nama<br/><span class="labeling">Name</span></label>
                                                                <div class="col-md-6">
                                                                    <?=$fullName;?>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Pekerjaan/Jabatan<br/><span class="labeling">Job Title</span></label>
                                                                <div class="col-md-6">
                                                                    <?=$work;?>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Alamat<br/><span class="labeling">Address</span></label>
                                                                <div class="col-md-6">
                                                                    <?=$address;?>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>dalam hal ini bertindak untuk dan atas nama sendiri yang selanjutnya disebut <strong>Nasabah</strong>
                                                            <br /><span class="labeling">in this matter acting for and on behalf of itself, hereinafter called <strong>Customer</strong></span></p>
                                                    </li>
                                                    <li>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Nama<br/><span class="labeling">Name</span></label>
                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Pekerjaan/Jabatan<br/><span class="labeling">Job Title</span></label>
                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Alamat<br/><span class="labeling">Address</span></label>
                                                                <div class="col-md-6">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>dalam hal ini bertindak untuk dan atas nama <strong>PT. TOPGROWTH FUTURES</strong> yang selanjutnya disebut <strong>Pialang Berjangka,</strong>
                                                            <br /><span class="labeling">in this matter acting for and on behalf of PT. TOPGROWTH FUTURES hereinafter called Broker,</span></p>
                                                    </li>

                                                </ol>

                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>

                                                <p>Nasabah dan Pialang Berjangka secara bersama-sama selanjutnya disebut <strong>Para Pihak.</strong>
                                                    <br /><span class="labeling">Customer and Broker together hereinafter the Parties.</span></p>
                                            </div>
                                        </div>
                                        <!-- Multilateral -->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <p>Para Pihak sepakat untuk mengadakan Perjanjian Pemberian Amanat untuk melakukan transaksi penjualan maupun pembelian Kontrak Berjangka dengan ketentuan sebagai berikut:</p>
                                            </div>
                                            <div class="col-md-12 col-sm-12 table-responsive">
                                                <table class="table table-bordered">

                                                    <tr>
                                                        <td>1</td>
                                                        <td colspan="2">
                                                            <strong>Margin dan Pembayaran Lainnya</strong>
                                                            <ol type="a">
                                                                <li><strong>Nasabah menempatkan sejumlah dana</strong> (Margin) ke Rekening Terpisah <i>(Segregated Account)</i> Pialang Berjangka sebagai Margin Awal dan wajib mempertahankannya sebagaimana ditetapkan.</li>
                                                                <li>Membayar biaya-biaya yang diperlukan untuk transaksi yaitu biaya transaksi, pajak, komisi, dan biaya pelayanan, biaya bunga sesuai tingkat yang berlaku, dan biaya lainnya yang dapat dipertanggungjawabkan berkaitan dengan transaksi sesuai amanat Nasabah, maupun biaya rekening Nasabah.</li>
                                                            </ol>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm0ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][0][number]" value="1" id="RealAccountSffoForm0Number"/><input type="hidden" name="data[RealAccountSffoForm][0][read_and_understand]" id="RealAccountSffoForm0ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm0ReadAndUnderstand" data-index="0" class="" <?=$checked;?> value="1" id="RealAccountSffoForm0ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>2</td>
                                                        <td colspan="2">
                                                            <p>
                                                                <strong>Pelaksanaan Amanat</strong>
                                                            <ol type="1">
                                                                <li>Setiap amanat yang disampaikan oleh Nasabah atau kuasanya yang ditunjuk secara tertulis oleh Nasabah, dianggap sah apabila diterima oleh Pialang Berjangka sesuai dengan ketentuan yang berlaku, dapat berupa amanat tertulis yang ditandatangani oleh Nasabah atau kuasanya, amanat telepon yang direkam, dan/atau amanat transaksi elektronik lainnya.</li>
                                                                <li>Setiap amanat Nasabah yang diterima dapat langsung dilaksanakan sepanjang nilai Margin yang tersedia pada rekeningnya mencukupi dan eksekusinya tergantung pada kondisi dan sistem transaksi yang berlaku yang mungkin dapat menimbulkan perbedaan waktu terhadap proses pelaksanaan amanat tersebut. Nasabah harus mengetahui posisi Margin dan posisi terbuka sebelum memberikan amanat untuk transaksi berikutnya.</li>
                                                                <li>Amanat Nasabah hanya dapat dibatalkan dan/atau diperbaiki apabila transaksi atas amanat tersebut belum terjadi. Pialang Berjangka tidak bertanggung jawab atas kerugian yang timbul akibat tidak terlaksananya pembatalan dan/atau perbaikan sepanjang bukan karena kelalaian Pialang Berjangka.</li>
                                                                <li>Pialang Berjangka berhak menolak amanat Nasabah apabila harga yang ditawarkan atau diminta tidak wajar.</li>
                                                            </ol>

                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm1ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][1][number]" value="2" id="RealAccountSffoForm1Number"/><input type="hidden" name="data[RealAccountSffoForm][1][read_and_understand]" id="RealAccountSffoForm1ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm1ReadAndUnderstand"  data-index="1" class="" <?=$checked;?> value="1" id="RealAccountSffoForm1ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>3</td>
                                                        <td colspan="2">
                                                            <strong>Antisipasi Penyerahan Barang</strong>
                                                            <ol type="a" class="normal">
                                                                <li>Untuk kontrak-kontrak tertentu penyelesaian transaksi dapat dilakukan dengan penyerahan  atau  penerimaan   barang  (delivery)  apabila   kontrak   jatuh  tempo. Nasabah  menyadari bahwa penyerahan   atau   penerimaan  barang  mengandung risiko yang lebih besar daripada melikuidasi posisi dengan offset. Penyerahan fisik barang memiliki konsekuensi kebutuhan   dana yang lebih besar serta tambahan biaya pengelolaan barang. </li>
                                                                <li>Pialang Berjangka tidak bertanggung jawab atas klasifikasi   mutu (grade), kualitas atau tingkat toleransi atas komoditi yang diserahkan atau akan diserahkan.</li>
                                                                <li>Pelaksanaan  penyerahan  atau  penerimaan   barang  tersebut   akan   diatur   dan dijamin oleh Lembaga Kliring Berjangka.</li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm2ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][2][number]" value="3" id="RealAccountSffoForm2Number"/><input type="hidden" name="data[RealAccountSffoForm][2][read_and_understand]" id="RealAccountSffoForm2ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm2ReadAndUnderstand"  data-index="2" class="" <?=$checked;?> value="1" id="RealAccountSffoForm2ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>4</td>
                                                        <td colspan="2">
                                                            <strong>Kewajiban Memelihara Margin</strong>
                                                            <ol type="a" class="normal">
                                                                <li>Nasabah wajib memelihara / memenuhi tingkat Margin yang harus tersedia di rekening pada Pialang Berjangka sesuai dengan jumlah yang telah ditetapkan baik diminta ataupun tidak oleh Pialang Berjangka.</li>
                                                                <li>Apabila jumlah Margin memerlukan penambahan maka Pialang Berjangka wajib memberitahukan dan memintakan kepada Nasabah untuk menambah Margin segera.</li>
                                                                <li>Apabila jumlah Margin memerlukan tambahan (<i>Call Margin</i>) maka nasabah wajib melakukan penyerahan <i>Call Margin</i> selambat-lambatnya sebelum dimulai hari perdagangan berikutnya. Kewajiban Nasabah sehubungan dengan penyerahan <i>Call Margin</i> tidak terbatas pada jumlah Margin Awal.</li>
                                                                <li>Pialang Berjangka tidak berkewajiban melaksanakan amanat untuk melakukan transaksi yang baru dari Nasabah sebelum <i>Call Margin</i> dipenuhi;</li>
                                                                <li>Untuk memenuhi kewajiban <i>Call Margin</i> dan keuangan lainnya dari Nasabah, Pialang Berjangka dapat mencairkan dana Nasabah yang ada di Pialang Berjangka.</li>
                                                            </ol>

                                                        </td>                
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm3ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][3][number]" value="4" id="RealAccountSffoForm3Number"/><input type="hidden" name="data[RealAccountSffoForm][3][read_and_understand]" id="RealAccountSffoForm3ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm3ReadAndUnderstand"  data-index="3" class="" <?=$checked;?> value="1" id="RealAccountSffoForm3ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>5</td>
                                                        <td colspan="2">
                                                            <p><strong>Hak Pialang Berjangka Melikuidasi Posisi Nasabah</strong></p>
                                                            <p>Nasabah bertanggung jawab memantau/mengetahui posisi terbukanya secara terus- menerus  dan memenuhi kewajibannya. Apabila  dalam jangka waktu tertentu   dana pada rekening Nasabah  kurang   dari yang dipersyaratkan,   Pialang Berjangka dapat menutup  posisi terbuka   Nasabah  secara   keseluruhan   atau   sebagian, membatasi transaksi,   atau   tindakan  lain  untuk   melindungi diri   dalam  pemenuhan  Margin tersebut dengan terlebih dahulu memberitahu atau tanpa memberitahu Nasabah  dan Pialang Berjangka tidak bertanggung jawab atas kerugian yang timbul akibat tindakan tersebut.</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm4ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][4][number]" value="5" id="RealAccountSffoForm4Number"/><input type="hidden" name="data[RealAccountSffoForm][4][read_and_understand]" id="RealAccountSffoForm4ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm4ReadAndUnderstand"  data-index="4" class="" <?=$checked;?> value="1" id="RealAccountSffoForm4ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>6</td>
                                                        <td colspan="2">
                                                            <p><strong>Penggantian Kerugian Tidak Menyerahkan Barang</strong></p>
                                                            <p>Apabila  Nasabah  tidak mampu menyerahkan komoditi atas Kontrak  Berjangka yang jatuh tempo, Nasabah memberikan kuasa kepada Pialang Berjangka untuk meminjam atau   membeli komoditi  untuk   penyerahan   tersebut.   Nasabah   wajib  membayar secepatnya  semua  biaya, kerugian  dan   premi yang telah  dibayarkan  oleh Pialang Berjangka atas   tindakan   tersebut. Apabila   Pialang  Berjangka  harus   menerima penyerahan komoditi  atau   surat  berharga maka Nasabah  bertanggung  jawab atas penurunan nilai dari komoditi atas surat berharga tersebut.</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm5ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][5][number]" value="6" id="RealAccountSffoForm5Number"/><input type="hidden" name="data[RealAccountSffoForm][5][read_and_understand]" id="RealAccountSffoForm5ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm5ReadAndUnderstand"  data-index="5" class="" <?=$checked;?> value="1" id="RealAccountSffoForm5ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>7</td>
                                                        <td colspan="2">
                                                            <p><strong>Penggantian Kerugian Tidak Adanya Penutupan Posisi</strong><p>
                                                            <p>Apabila  Nasabah  tidak  mampu   melakukan  penutupan  atas  transaksi   yang jatuh tempo, Pialang Berjangka dapat   melakukan   penutupan  atas  transaksi   di   Bursa. Nasabah wajib membayar biaya-biaya, termasuk biaya kerugian dan premi yang telah dibayarkan oleh Pialang Berjangka, dan apabila Nasabah lalai untuk membayar biaya- biaya tersebut,   Pialang Berjangka berhak untuk   mengambil pembayaran dari dana Nasabah</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm6ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][6][number]" value="7" id="RealAccountSffoForm6Number"/><input type="hidden" name="data[RealAccountSffoForm][6][read_and_understand]" id="RealAccountSffoForm6ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm6ReadAndUnderstand"  data-index="6" class="" <?=$checked;?> value="1" id="RealAccountSffoForm6ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>8</td>
                                                        <td colspan="2">
                                                            <p><strong>Pialang Berjangka Dapat Membatasi Posisi </strong></p>
                                                            <p>Nasabah mengakui hak Pialang Berjangka untuk membatasi posisi terbuka Kontrak Berjangka  Nasabah  dan Nasabah  tidak melakukan  transaksi  melebihi batas   yang telah ditetapkan tersebut.</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm7ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][7][number]" value="8" id="RealAccountSffoForm7Number"/><input type="hidden" name="data[RealAccountSffoForm][7][read_and_understand]" id="RealAccountSffoForm7ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm7ReadAndUnderstand"  data-index="7" class="" <?=$checked;?> value="1" id="RealAccountSffoForm7ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>9</td>
                                                        <td colspan="2">
                                                            <p><strong>Tidak Ada Jaminan atas Informasi atau Rekomendasi</strong></p>
                                                            <p>Nasabah mengakui bahwa :</p>
                                                            <ol type="a">
                                                                <li>Informasi dan rekomendasi yang diberikan oleh Pialang Berjangka kepada Nasabah tidak selalu lengkap dan perlu diverifikasi.</li>
                                                                <li>Pialang Berjangka tidak menjamin bahwa informasi dan rekomendasi yang diberikan  merupakan informasi yang akurat dan lengkap.</li>
                                                                <li>Informasi dan rekomendasi yang diberikan oleh wakil Pialang Berjangka yang satu dengan yang lain mungkin berbeda karena perbedaan analisis fundamental atau teknikal. Nasabah menyadari bahwa ada kemungkinan Pialang Berjangka dan pihak terafiliasinya memiliki posisi di pasar dan memberikan rekomendasi tidak konsisten kepada Nasabah.</li>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm8ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][8][number]" value="9" id="RealAccountSffoForm8Number"/><input type="hidden" name="data[RealAccountSffoForm][8][read_and_understand]" id="RealAccountSffoForm8ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm8ReadAndUnderstand"  data-index="8" class="" <?=$checked;?> value="1" id="RealAccountSffoForm8ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>10</td>
                                                        <td colspan="2">
                                                            <strong>Pembatasan Tanggung Jawab Pialang Berjangka.</strong>
                                                            <ol type="a">
                                                                <li>Pialang Berjangka tidak bertanggung jawab untuk memberikan penilaian kepada Nasabah mengenai iklim, pasar, keadaan politik dan ekonomi nasional dan internasional, nilai kontrak berjangka, kolateral, atau memberikan nasihat mengenai keadaan pasar. Pialang Berjangka hanya memberikan pelayanan untuk melakukan transaksi secara jujur serta memberikan laporan atas transaksi tersebut. </li>
                                                                <li>Perdagangan sewaktu-waktu dapat dihentikan oleh pihak yang memiliki otoritas (Bappebti / Bursa Berjangka) tanpa pemberitahuan terlebih dahulu kepada Nasabah. Atas posisi terbuka yang masih dimiliki oleh Nasabah pada saat perdagangan tersebut dihentikan, maka akan diselesaikan (likuidasi) berdasarkan pada peraturan / ketentuan yang dikeluarkan dan ditetapkan oleh pihak otoritas tersebut, dan semua kerugian serta biaya yang timbul sebagai akibat dihentikannya transaksi oleh pihak otoritas perdagangan tersebut, menjadi beban dan tanggung jawab Nasabah sepenuhnya. </li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm9ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][9][number]" value="10" id="RealAccountSffoForm9Number"/><input type="hidden" name="data[RealAccountSffoForm][9][read_and_understand]" id="RealAccountSffoForm9ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm9ReadAndUnderstand"  data-index="9" class="" <?=$checked;?> value="1" id="RealAccountSffoForm9ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>11</td>
                                                        <td colspan="2">
                                                            <p><strong>Transaksi Harus Mematuhi Peraturan Yang Berlaku</strong><p>
                                                            <p>Semua transaksi baik yang dilakukan sendiri oleh Nasabah maupun melalui Pialang Berjangka wajib mematuhi peraturan perundang-undangan di bidang Perdagangan Berjangka, kebiasaan dan interpretasi resmi yang ditetapkan oleh Bappebti atau Bursa Berjangka.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm10ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][10][number]" value="11" id="RealAccountSffoForm10Number"/><input type="hidden" name="data[RealAccountSffoForm][10][read_and_understand]" id="RealAccountSffoForm10ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm10ReadAndUnderstand"  data-index="10" class="" <?=$checked;?> value="1" id="RealAccountSffoForm10ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>12</td>
                                                        <td colspan="2">
                                                            <p><strong>Pialang Berjangka tidak Bertanggung jawab atas Kegagalan Komunikasi</strong></p>
                                                            <p>Pialang Berjangka tidak bertanggung jawab atas keterlambatan atau tidak tepat waktunya pengiriman amanat atau informasi lainnya yang disebabkan oleh kerusakan fasilitas komunikasi atau sebab lain diluar kontrol Pialang Berjangka.</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm11ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][11][number]" value="12" id="RealAccountSffoForm11Number"/><input type="hidden" name="data[RealAccountSffoForm][11][read_and_understand]" id="RealAccountSffoForm11ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm11ReadAndUnderstand"  data-index="11" class="" <?=$checked;?> value="1" id="RealAccountSffoForm11ReadAndUnderstand"/>                </td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td colspan="2">
                                                            <strong>Konfirmasi</strong>
                                                            <ol type="a">
                                                                <li>Konfirmasi dari Nasabah dapat berupa surat, telex, media lain, secara tertulis ataupun rekaman suara.</li>
                                                                <li>Pialang Berjangka berkewajiban menyampaikan konfirmasi transaksi, laporan rekening, permintaan Call Margin, dan pemberitahuan lainnya kepada Nasabah secara akurat, benar dan secepatnya pada alamat Nasabah sesuai dengan yang tertera dalam rekening Nasabah. Apabila dalam jangka waktu 2 x 24 jam setelah amanat jual atau beli disampaikan, tetapi Nasabah belum menerima konfirmasi tertulis, Nasabah segera memberitahukan hal tersebut kepada Pialang Berjangka melalui telepon dan disusul dengan pemberitahuan tertulis.</li>
                                                                <li>Jika dalam waktu 2 x 24 jam sejak tanggal penerimaan konfirmasi tertulis tersebut tidak ada sanggahan dari Nasabah maka konfirmasi Pialang Berjangka dianggap benar dan sah.</li>
                                                                <li>Kekeliruan atas konfirmasi yang diterbitkan Pialang Berjangka akan diperbaiki oleh Pialang Berjangka sesuai keadaan yang sebenarnya dan demi hukum konfirmasi yang lama batal.</li>
                                                                <li>Nasabah tidak bertanggung jawab atas transaksi yang dilaksanakan atas rekeningnya apabila konfirmasi tersebut tidak disampaikan secara benar dan akurat.</li>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm12ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][12][number]" value="13" id="RealAccountSffoForm12Number"/><input type="hidden" name="data[RealAccountSffoForm][12][read_and_understand]" id="RealAccountSffoForm12ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm12ReadAndUnderstand"  data-index="12" class="" <?=$checked;?> value="1" id="RealAccountSffoForm12ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>14</td>
                                                        <td colspan="2">
                                                            <p><strong>Kebenaran informasi Nasabah</strong></p>
                                                            <p>Nasabah memberikan informasi yang benar dan akurat mengenai data Nasabah yang diminta oleh Pialang Berjangka dan akan memberitahukan paling lambat dalam waktu 3 (tiga) hari kerja setelah terjadi perubahan, termasuk perubahan kemampuan keuangannya untuk terus melaksanakan transaksi.</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm13ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][13][number]" value="14" id="RealAccountSffoForm13Number"/><input type="hidden" name="data[RealAccountSffoForm][13][read_and_understand]" id="RealAccountSffoForm13ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm13ReadAndUnderstand"  data-index="13" class="" <?=$checked;?> value="1" id="RealAccountSffoForm13ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>15</td>
                                                        <td colspan="2">
                                                            <p><strong>Komisi Transaksi</strong></p>
                                                            <p>Nasabah mengetahui dan menyetujui bahwa Pialang Berjangka berhak untuk memungut komisi atas transaksi yang telah dilaksanakan, dalam jumlah sebagaimana akan ditetapkan dari waktu ke waktu oleh Pialang Berjangka. Perubahan beban <i>(fees)</i> dan biaya lainnya harus disetujui secara tertulis oleh Para Pihak.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm14ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][14][number]" value="15" id="RealAccountSffoForm14Number"/><input type="hidden" name="data[RealAccountSffoForm][14][read_and_understand]" id="RealAccountSffoForm14ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm14ReadAndUnderstand"  data-index="14" class="" <?=$checked;?> value="1" id="RealAccountSffoForm14ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>16</td>
                                                        <td colspan="2">
                                                            <p><strong>Pemberian Kuasa</strong></p>
                                                            <p>Nasabah memberikan kuasa kepada Pialang Berjangka untuk menghubungi bank, lembaga keuangan, Pialang Berjangka lain, atau institusi lain yang terkait untuk memperoleh keterangan atau verifikasi mengenai informasi yang diterima dari Nasabah. Nasabah mengerti bahwa penelitian mengenai data hutang pribadi dan bisnis  dapat  dilakukan  oleh  Pialang  Berjangka  apabila  diperlukan.  Nasabah diberikan kesempatan untuk memberitahukan secara tertulis dalam jangka waktu yang telah disepakati untuk melengkapi persyaratan yang diperlukan. </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm15ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][15][number]" value="16" id="RealAccountSffoForm15Number"/><input type="hidden" name="data[RealAccountSffoForm][15][read_and_understand]" id="RealAccountSffoForm15ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm15ReadAndUnderstand"  data-index="15" class="" <?=$checked;?> value="1" id="RealAccountSffoForm15ReadAndUnderstand"/>                </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17</td>
                                                        <td colspan="2">
                                                            <p><strong>Pemindahan Dana</strong></p>
                                                            <p>Pialang Berjangka dapat setiap saat mengalihkan dana dari satu rekening ke rekening lainnya berkaitan dengan kegiatan transaksi yang dilakukan Nasabah seperti pembayaran komisi, pembayaran biaya transaksi, kliring, dan keterlambatan dalam memenuhi kewajibannya, tanpa terlebih dahulu memberitahukan kepada Nasabah. Transfer yang telah dilakukan akan segera diberitahukan secara tertulis kepada Nasabah.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm16ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][16][number]" value="17" id="RealAccountSffoForm16Number"/><input type="hidden" name="data[RealAccountSffoForm][16][read_and_understand]" id="RealAccountSffoForm16ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm16ReadAndUnderstand"  data-index="16" class="" <?=$checked;?> value="1" id="RealAccountSffoForm16ReadAndUnderstand"/>                </td>
                                                    </tr>
                                                    <tr>
                                                        <td>18</td>
                                                        <td colspan="2">
                                                            <strong>Pemberitahuan</strong>
                                                            <ol type="a">
                                                                <li>Semua komunikasi, uang, surat berharga, dan kekayaan lainnya harus dikirimkan langsung ke alamat Nasabah seperti tertera dalam rekeningnya atau alamat lain yang ditetapkan / diberitahukan secara tertulis oleh Nasabah.</li>
                                                                <li>
                                                                    Semua uang, harus disetor atau ditransfer langsung oleh Nasabah ke Rekening Terpisah <i>(Segregated Account)</i> Pialang Berjangka : 
                                                                    <dl class="dl-horizontal">
                                                                        <dt>Nama</dt><dd>PT TOPGROWTH FUTURES</dd>
                                                                        <dt>Alamat</dt><dd>Plaza Bapindo, Mandiri Tower, 28th floor
                                                                            Jl. Jend. Sudirman, Kav. 54-55 
                                                                            Jakarta 12190 – Indonesia</dd>
                                                                        <dt>Bank</dt><dd>BCA - KCU Sudirman</dd>
                                                                        <dt>No. Rekening Terpisah</dt><dd>035-311-8568 (Rupiah)</dd>
                                                                        <dt>&nbsp;</dt><dd>035-317-7718 (USD)</dd>
                                                                    </dl>
                                                                    dan dianggap sudah diterima oleh Pialang Berjangka apabila sudah ada tanda terima bukti setor atau transfer dari pegawai Pialang Berjangka.
                                                                </li>
                                                                <li>
                                                                    Semua surat berharga, kekayaan lainnya, atau komunikasi harus dikirim kepada Pialang Berjangka :
                                                                    <dl class="dl-horizontal">
                                                                        <dt>Nama</dt><dd>PT. TOPGROWTH FUTURES</dd>
                                                                        <dt>Alamat</dt><dd> Sahid Sudirman Center, 40 floor, <br/>Jl. Jend Sudirman Kav 86 <br />Jakarta 10220 - Indonesia</dd>
                                                                        <dt>Telepon</dt><dd>021 2788-9393</dd>
                                                                        <dt>Facsimile</dt><dd>021 2788-9395</dd>
                                                                        <dt>E-mail</dt><dd>compliance@topgrowthfutures.com</dd>
                                                                    </dl>
                                                                    dan dianggap sudah diterima oleh Pialang Berjangka apabila sudah ada tanda bukti penerimaan dari pegawai Pialang Berjangka.
                                                                </li>
                                                            </ol>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm17ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][17][number]" value="18" id="RealAccountSffoForm17Number"/><input type="hidden" name="data[RealAccountSffoForm][17][read_and_understand]" id="RealAccountSffoForm17ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm17ReadAndUnderstand"  data-index="17" class="" <?=$checked;?> value="1" id="RealAccountSffoForm17ReadAndUnderstand"/>                </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td colspan="2">
                                                            <p><strong>Dokumen Pemberitahuan Adanya Resiko</strong></p>
                                                            <p>Nasabah mengakui menerima dan mengerti Dokumen Pemberitahuan Adanya Resiko.</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm18ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][18][number]" value="19" id="RealAccountSffoForm18Number"/><input type="hidden" name="data[RealAccountSffoForm][18][read_and_understand]" id="RealAccountSffoForm18ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm18ReadAndUnderstand"  data-index="18" class="" <?=$checked;?> value="1" id="RealAccountSffoForm18ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>20</td>
                                                        <td colspan="2">
                                                            <strong>Jangka Waktu Perjanjian dan Pengakhiran</strong>
                                                            <ol type="a" class="normal">
                                                                <li>Perjanjian ini mulai berlaku terhitung sejak tanggal ditandatanganinya sampai disampaikannya pemberitahuan pengakhiran secara tertulis oleh Nasabah atau Pialang Berjangka.</li>
                                                                <li>Nasabah dapat mengakhiri Perjanjian ini hanya jika Nasabah sudah tidak lagi memiliki posisi terbuka dan tidak ada kewajiban Nasabah yang diemban oleh atau terhutang kepada Pialang Berjangka.</li>
                                                                <li>Pengakhiran tidak membebaskan salah satu Pihak dari tanggung jawab atau kewajiban yang terjadi sebelum pemberitahuan tersebut.</li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm19ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][19][number]" value="20" id="RealAccountSffoForm19Number"/><input type="hidden" name="data[RealAccountSffoForm][19][read_and_understand]" id="RealAccountSffoForm19ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm19ReadAndUnderstand"  data-index="19" class="" <?=$checked;?> value="1" id="RealAccountSffoForm19ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>21</td>
                                                        <td colspan="2">
                                                            <p><strong>Berakhirnya Perjanjian</strong></p>
                                                            <p>Perjanjian dapat berakhir dalam hal Nasabah :</p>
                                                            <ol type="a">
                                                                <li>dinyatakan pailit, memiliki hutang yang sangat besar, dalam proses peradilan, menjadi hilang ingatan, mengundurkan diri atau meninggal;</li>
                                                                <li>tidak dapat memenuhi atau mematuhi perjanjian ini dan / atau melakukan pelanggaran terhadapnya;</li>
                                                                <li>berkaitan dengan angka (1) dan (2) tersebut diatas, Pialang Berjangka dapat :
                                                                    <ol type="i">
                                                                        <li>meneruskan atau menutup posisi Nasabah tersebut setelah mempertimbangkannya secara cermat dan jujur ; dan</li>
                                                                        <li>menolak perintah dari Nasabah atau kuasanya.</li>
                                                                    </ol>
                                                                </li>
                                                                <li>Pengakhiran Perjanjian sebagaimana dimaksud dengan poin a dan b tersebut diatas tidak melepaskan kewajiban dari Para Pihak yang berhubungan dengan penerimaan atau kewajiban pembayaran atau pertanggungjawaban kewajiban lainnya yang timbul dari Perjanjian.</li>
                                                            </ol>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm20ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][20][number]" value="21" id="RealAccountSffoForm20Number"/><input type="hidden" name="data[RealAccountSffoForm][20][read_and_understand]" id="RealAccountSffoForm20ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm20ReadAndUnderstand"  data-index="20" class="" <?=$checked;?> value="1" id="RealAccountSffoForm20ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>22</td>
                                                        <td colspan="2">
                                                            <p><strong>Force Majeur</strong></p>
                                                            <p>Tidak ada satupun pihak di dalam perjanjian dapat diminta pertanggungjawabannya untuk suatu keterlambatan atau terhalangnya memenuhi kewajiban berdasarkan Perjanjian yang diakibatkan oleh suatu sebab yang berada di luar kemampuannya atau kekuasaannya (<i>force majeur</i>), sepanjang pemberitahuan tertulis mengenai sebab itu disampaikannya kepada pihak lain dalam Perjanjian dalam waktu tidak lebih dari 24 (dua puluh empat) jam sejak timbulnya sebab itu. Yang dimaksud dengan <i>force majeur</i> dalam Perjanjian adalah peristiwa kebakaran, bencana alam (seperti gempa bumi, banjir, angin topan, petir), pemogokan umum, huru hara, peperangan, perubahan terhadap peraturan perundang-undangan yang berlaku di bidang ekonomi, keuangan dan Perdagangan Berjangka, pembatasan yang dilakukan oleh otoritas Perdagangan Berjangka dan Bursa Berjangka serta terganggunya sistem perdagangan, kliring dan penyelesaian transaksi Kontrak Berjangka di mana transaksi dilaksanakan yang secara langsung mempengaruhi pelaksanaan pekerjaan berdasarkan Perjanjian.</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm21ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][21][number]" value="22" id="RealAccountSffoForm21Number"/><input type="hidden" name="data[RealAccountSffoForm][21][read_and_understand]" id="RealAccountSffoForm21ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm21ReadAndUnderstand"  data-index="21" class="" <?=$checked;?> value="1" id="RealAccountSffoForm21ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>23</td>
                                                        <td colspan="2">
                                                            <p><strong>Perubahan Atas lsian dalam Perjanjian Pemberian Amanat</strong></p>
                                                            <p>Perubahan atas isian dalam Perjanjian pemberian ini hanya dapat dilakukan atas persetujuan Para Pihak, atau Pialang Berjangka telah memberitahukan secara tertulis perubahan yang diinginkan, dan Nasabah tetap memberikan perintah untuk transaksi dengan tanpa memberikan tanggapan secara tertulis atas usul perubahan tersebut. Tindakan Nasabah tersebut dianggap setuju atas usul perubahan tersebut.</p>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm22ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][22][number]" value="23" id="RealAccountSffoForm22Number"/><input type="hidden" name="data[RealAccountSffoForm][22][read_and_understand]" id="RealAccountSffoForm22ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm22ReadAndUnderstand"  data-index="22" class="" <?=$checked;?> value="1" id="RealAccountSffoForm22ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>24</td>
                                                        <td colspan="2">
                                                            <strong>Penyelesaian Perselisihan</strong>
                                                            <ol type="a" class="normal">
                                                                <li>Semua perselisihan dan perbedaan pendapat yang timbul dalam pelaksanaan perjanjian ini wajib diselesaikan terlebih dahulu secara musyawarah untuk mencapai mufakat antara Para Pihak.</li>
                                                                <li>Apabila perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan secara musyawarah untuk mencapai mufakat, Para Pihak wajib memanfaatkan sarana penyelesaian perselisihan yang tersedia di Bursa Berjangka.</li>
                                                                <li>Apabila Perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan melalui cara sebagaimana dimaksud pada angka (1) dan angka (2), maka Para Pihak sepakat untuk menyelesaikan perselisihan melalui :
                                                                    <br>
                                                                    <label class="radio">
                                                                        <input type="radio" name="RealAccountStepFifeSettlementOfDisputes1" id="RealAccountStepFifeSettlementOfDisputes1Bakti" class="s51-settlement_of_disputes" <?php if ($RealAccountStepFifeSettlementOfDisputes1 == "bakti") echo " checked ";?> value="bakti" />Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI) berdasarkan Peraturan dan Prosedur BAKTI ;                            
                                                                    </label>
                                                                    <label class="radio">
                                                                        <input type="radio" name="RealAccountStepFifeSettlementOfDisputes1" id="RealAccountStepFifeSettlementOfDisputes1PengadilanNegeri" class="s51-settlement_of_disputes" <?php if ($RealAccountStepFifeSettlementOfDisputes1 == "pengadilan negeri") echo " checked ";?> value="pengadilan negeri" />Pengadilan Negeri                            </label>
                                                                    <select name="RealAccountStepFifeDistrictCourtId1" class="s51-district_court_id" id="RealAccountStepFifeDistrictCourtId1">
                                                                        <option value="">-- Pilih Pengadilan Negeri --</option>
                                                                        <optgroup label="Jakarta">
                                                                            <option value="1" <?php if ($RealAccountStepFifeDistrictCourtId1=="1") echo " selected ";?>>Jakarta Selatan</option>
                                                                        </optgroup>
                                                                    </select>      
                                                                    <span class="help-block"></span>
                                                                </li>
                                                                <li>Kantor atau kantor cabang Pialang  Berjangka  terdekat  dengan domisili Nasabah tempat penyelesaian dalam hal terjadi perselisihan.<br>
                                                                    <strong>Daftar Kantor (Pilih salah satu) :</strong>
                                                                    <select name="RealAccountStepFifeBranchId1" class="s51-branch_id" id="RealAccountStepFifeBranchId1">
                                                                        <option value="">-- Pilih Kantor Cabang --</option>
                                                                        <option value="2" <?php if ($RealAccountStepFifeBranchId1=="2") echo " selected ";?>>Kantor Cabang</option>
                                                                        <option value="1" <?php if ($RealAccountStepFifeBranchId1=="1") echo " selected ";?>>Kantor Pusat</option>
                                                                    </select>    
                                                                    <span class="help-block"></span>
                                                                </li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm23ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][23][number]" value="24" id="RealAccountSffoForm23Number"/><input type="hidden" name="data[RealAccountSffoForm][23][read_and_understand]" id="RealAccountSffoForm23ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSffoForm23ReadAndUnderstand"  data-index="23" class="" <?=$checked;?> value="1" id="RealAccountSffoForm23ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>25</td>
                                                        <td colspan="2">
                                                            <strong><b>Bahasa</strong>
                                                            <p>Perjanjian ini dibuat dalam Bahasa Indonesia..</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSffoForm24ReadAndUnderstand">Saya sudah membaca dan memahami</label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSffoForm][24][number]" value="25" id="RealAccountSffoForm24Number"/><input type="hidden" name="data[RealAccountSffoForm][24][read_and_understand]" id="RealAccountSffoForm24ReadAndUnderstand" value="0"/><input type="checkbox" name="RealAccountSffoForm24ReadAndUnderstand"  data-index="24" class="" <?=$checked;?> value="1" id="RealAccountSffoForm24ReadAndUnderstand"/>                </td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
                                        <!-- End of Multilateral -->
                                        <!-- Mini dan Regular -->

                                        <div class="row hidden 107BPK052">
                                            <div class="col-md-12 col-sm-12">
                                                <p>Para Pihak sepakat untuk mengadakan Perjanjian Pemberian Amanat untuk melakukan transaksi penjualan maupun pembelian Kontrak Derivatif dalam Sistem Perdagangan Alternatif dengan ketentuan sebagai berikut:
                                                    <br /><span class="labeling">The Parties agreed to hold the Mandate Agreement for the sale and purchase of Derivative Contracts in the Alternative Trading System with the following conditions:</span></p>
                                            </div>
                                            <div class="col-md-12 col-sm-12 table-responsive">
                                                <table class="table table-bordered">

                                                    <tr>
                                                        <td>1</td>
                                                        <td colspan="2">
                                                            <strong>Margin dan Pembayaran Lainnya<br/><span class="labeling">Margin and Other Payments</span></strong>
                                                            <ol type="a">
                                                                <li><strong>Nasabah menempatkan sejumlah dana</strong> (Margin) ke Rekening Terpisah <i>(Segregated Account)</i> Pialang Berjangka sebagai Margin Awal dan wajib mempertahankannya sebagaimana ditetapkan.
                                                                    <br/><span class="labeling">Customers placing some funds (Margin) to Segregated Account of Broker as Initial Margin and shall keep it as prescribed.</span></li>
                                                                <li>Membayar biaya-biaya yang diperlukan untuk transaksi yaitu biaya transaksi, pajak, komisi, dan biaya pelayanan, biaya bunga sesuai tingkat yang berlaku, dan biaya lainnya yang dapat dipertanggungjawabkan berkaitan dengan transaksi sesuai amanat Nasabah, maupun biaya rekening Nasabah.
                                                                    <br /><span class="labeling">To pay the costs necessary for the transaction, that transaction costs, taxes, commissions and fees, interest charges apply appropriate levels, and other costs related to the transaction can be accounted for as mandated by the Customer, and the Customer's account fees.</span></li>
                                                            </ol>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm0ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][0][number]" value="1" id="RealAccountSfftForm0Number"/><input type="hidden" name="data[RealAccountSfftForm][0][read_and_understand]" id="RealAccountSfftForm0ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][0][read_and_understand]"  data-index="0" class="" <?=$checked;?> value="1" id="RealAccountSfftForm0ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>2</td>
                                                        <td colspan="2">
                                                            <p>
                                                                <strong>Pelaksanaan Amanat<br /><span class="labeling">Transaction implementation</span></strong>
                                                            <ol type="1">
                                                                <li>Setiap transaksi Nasabah dilaksanakan secara elektronik on-line oleh Nasabah yang bersangkutan.
                                                                    <br /><span class="labeling">Every customer transaction conducted electronically on-line by the Customer;</span></li>
                                                                <li>Setiap amanat Nasabah yang diterima dapat langsung dilaksanakan sepanjang nilai Margin yang tersedia pada  rekeningnya mencukupi dan eksekusinya dapat menimbulkan perbedaan waktu terhadap proses pelaksanaan transaksi tersebut. Nasabah harus mengetahui posisi Margin dan posisi terbuka sebelum memberikan amanat untuk transaksi berikutnya.
                                                                    <br /><span class="labeling">Each customer received the mandate can be directly implementloo throughout the value Margin available on the account
                                                                        sufficient and can cause differences in execution time of the execution of the transaction process. Customers must know the position and the open position before giving a mandate for the next transaction.</span></li>
                                                                <li>Setiap transaksi Nasabah secara bilateral dilawankan dengan Penyelenggara Sistem Perdagangan  Alternatif PT. Topgrowth Futures  yang  bekerjasama dengan Pialang Berjangka.
                                                                    <br /><span class="labeling">Every customer transaction bilaterally opposed to Alternative Trading System Operator PT. Topgrowth Futures in operation with Futures Broker.</span></li>
                                                            </ol>

                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm1ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][1][number]" value="2" id="RealAccountSfftForm1Number"/><input type="hidden" name="data[RealAccountSfftForm][1][read_and_understand]" id="RealAccountSfftForm1ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][1][read_and_understand]"  data-index="1" class="" <?=$checked;?> value="1" id="RealAccountSfftForm1ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>3</td>
                                                        <td colspan="2">
                                                            <strong>Kewajiban Memelihara Margin<br /><span class="labeling">Margin Maintenance Obligations</span></strong>
                                                            <ol type="a" class="normal">
                                                                <li>Nasabah wajib memelihara / memenuhi tingkat Margin yang harus tersedia di rekening pada Pialang Berjangka sesuai dengan jumlah yang telah ditetapkan baik diminta ataupun tidak oleh Pialang Berjangka.
                                                                    <br /><span class="labeling">Customer must maintain/ meet the level of margin that should be available in the account at the Futures Broker in accordance with a predetermined amount of either requested or not by Futures Broker.</span></li>
                                                                <li>Apabila jumlah Margin memerlukan penambahan maka Pialang Berjangka wajib memberitahukan dan memintakan kepada Nasabah untuk menambah Margin segera.
                                                                    <br /><span class="labeling">If the amount of Margin requires the addition of the Futures Broker shall notify and ask the customer to add Margin immediately.</span></li>
                                                                <li>Apabila jumlah Margin memerlukan tambahan (<i>Call Margin</i>) maka nasabah wajib melakukan penyerahan <i>Call Margin</i> selambat-lambatnya sebelum dimulai hari perdagangan berikutnya. Kewajiban Nasabah sehubungan dengan penyerahan <i>Call Margin</i> tidak terbatas pada jumlah Margin Awal.
                                                                    <br /><span class="labeling">If the number require Margin Call Customer must make delivery of Margin Call at the latest before the start of the next trading day. Customer's obligations in connection with the delivery of Margin Call is not limited to the amount of initial margin.</span></li>
                                                                <li>Pialang Berjangka tidak berkewajiban melaksanakan amanat untuk melakukan transaksi yang baru dari Nasabah sebelum <i>Call Margin</i> dipenuhi;
                                                                    <br /><span class="labeling">Broker is not obliged to carry out its mandate to conduct new transactions from the Customer before the Call Margin met.</span></li>
                                                                <li>Untuk memenuhi kewajiban <i>Call Margin</i> dan keuangan lainnya dari Nasabah, Pialang Berjangka dapat mencairkan dana Nasabah yang ada di Pialang Berjangka.
                                                                    <br /><span class="labeling">To meet the Margin Call and financial liabilities other than the Customer, Broker Customers may withdraw funds in Futures Broker.</span></li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm2ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][2][number]" value="3" id="RealAccountSfftForm2Number"/><input type="hidden" name="data[RealAccountSfftForm][2][read_and_understand]" id="RealAccountSfftForm2ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][2][read_and_understand]"  data-index="2" class="" <?=$checked;?> value="1" id="RealAccountSfftForm2ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>4</td>
                                                        <td colspan="2">
                                                            <p><strong>Hak Pialang Berjangka Melikuidasi Posisi Nasabah</strong>
                                                                <br /><span class="labeling">Broker Rights to Liquidate Customer Positions</span></p>
                                                            <p>Nasabah bertanggung jawab memantau / mengetahui posisi terbukanya secara terus-menerus dan memenuhi kewajibannya. Apabila dalam jangka waktu tertentu dana pada rekening Nasabah kurang dari yang dipersyaratkan, Pialang Berjangka dapat menutup posisi terbuka Nasabah secara keseluruhan atau sebagian, membatasi transaksi, atau tindakan lain untuk melindungi dini dalam pemenuhan Margin tersebut dengan terlebih dahulu memberitahu atau tanpa memberitahu Nasabah dan Pialang Berjangka tidak bertanggung jawab atas kerugian yang timbul akibat tindakan tersebut.
                                                                <br /><span class="labeling">Customers are responsible for monitoring / knowing open position continuously and meet its obligations. If within a certain period of funds on the Client's account is less than required, Broker can close an open position Customer in whole or in part, limiting transactions, or other actions to protect themselves in the fulfillment of margin with first notifying or without notifying the Customer and Futures Broker is not responsible for damages arising from such action.</span></p>
                                                        </td>                
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm3ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][3][number]" value="4" id="RealAccountSfftForm3Number"/><input type="hidden" name="data[RealAccountSfftForm][3][read_and_understand]" id="RealAccountSfftForm3ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][3][read_and_understand]"  data-index="3" class="" <?=$checked;?> value="1" id="RealAccountSfftForm3ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>5</td>
                                                        <td colspan="2">
                                                            <p><strong>Penggantian Kerugian Tidak Adanya Penutupan Posisi</strong>
                                                                <br /><span class="labeling">Indemnification Absence of Position Closure</span></p>
                                                            <p>Apabila Nasabah tidak mampu melakukan penutupan atas transaksi yang jatuh tempo, Pialang Berjangka dapat melakukan penutupan atas transaksi di Bursa. Nasabah wajib membayar biaya-biaya, termasuk biaya kerugian dan premi yang telah dibayarkan oleh Pialang Berjangka, dan apabila Nasabah lalai untuk membayar biaya-biaya tersebut, Pialang Berjangka berhak untuk mengambil pembayaran dari dana Nasabah.
                                                                <br /><span class="labeling">If Client fails to closure on the transaction maturity, Futures Broker can be closure on customer transaction that occurs. Customer must pay the costs, including the cost of losses and premiums paid by the Futures Broker, and if the customer has failed to pay those fees, Futures Broker is entitled to take payment from customer funds. </span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm4ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][4][number]" value="5" id="RealAccountSfftForm4Number"/><input type="hidden" name="data[RealAccountSfftForm][4][read_and_understand]" id="RealAccountSfftForm4ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][4][read_and_understand]"  data-index="4" class="" <?=$checked;?> value="1" id="RealAccountSfftForm4ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>6</td>
                                                        <td colspan="2">
                                                            <p><strong>Pialang Berjangka Dapat Membatasi Posisi</strong>
                                                                <br /><span class="labeling">Futures Broker Could Limit Position</span></p>
                                                            <p>Nasabah mengakui hak Pialang Berjangka untuk membatasi posisi terbuka Kontrak Berjangka Nasabah dan Nasabah tidak melakukan transaksi melebihi batas yang telah ditetapkan tersebut.
                                                                <br /><span class="labeling">Customer acknowledges the right of the Futures Broker to limit the open position of Contracts and Customer does not perform a transaction exceeds the predetermined limit.</span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm5ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][5][number]" value="6" id="RealAccountSfftForm5Number"/><input type="hidden" name="data[RealAccountSfftForm][5][read_and_understand]" id="RealAccountSfftForm5ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][5][read_and_understand]"  data-index="5" class="" <?=$checked;?> value="1" id="RealAccountSfftForm5ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>7</td>
                                                        <td colspan="2">
                                                            <p><strong>Tidak Ada Jaminan atas Informasi atau Rekomendasi</strong>
                                                                <br /><span class="labeling">No Guarantee on information or recommendation</span></p>
                                                            <p>Nasabah mengakui bahwa :</p>
                                                            <ol type="a">
                                                                <li>Informasi dan rekomendasi yang diberikan oleh Pialang Berjangka kepada Nasabah tidak selalu lengkap dan perlu diverifikasi.
                                                                    <br /><span class="labeling">The information and recommendations provided by the Broker to the Customer is not necessarily complete and needs to be verified.</span></li>
                                                                <li>Pialang Berjangka tidak menjamin bahwa informasi dan rekomendasi yang diberikan  merupakan informasi yang akurat dan lengkap.
                                                                    <br /><span class="labeling"> Futures Broker does not guarantee that the information and recommendations provided is accurate and complete.</span></li>
                                                                <li>Informasi dan rekomendasi yang diberikan oleh wakil Pialang Berjangka yang satu dengan yang lain mungkin berbeda karena perbedaan analisis fundamental atau teknikal. Nasabah menyadari bahwa ada kemungkinan Pialang Berjangka dan pihak terafiliasinya memiliki posisi di pasar dan memberikan rekomendasi tidak konsisten kepada Nasabah.
                                                                    <br /><span class="labeling">The information and recommendations provided by the Vice Futures Broker with one another may vary due to differences in fundamental or technical analysis. Customers realize that there is a possibility Futures Broker and affiliated parties have a position in the market and provide recommendations to the Customer inconsistent.</span></li>
                                                            </ol>
                                                            </li>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm6ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][6][number]" value="7" id="RealAccountSfftForm6Number"/><input type="hidden" name="data[RealAccountSfftForm][6][read_and_understand]" id="RealAccountSfftForm6ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][6][read_and_understand]"  data-index="6" class="" <?=$checked;?> value="1" id="RealAccountSfftForm6ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>8</td>
                                                        <td colspan="2">
                                                            <strong>Pembatasan Tanggung Jawab Pialang Berjangka.</strong>
                                                            <br /><span class="labeling">Limitation of Liability of Futures Broker</span>
                                                            <ol type="a">
                                                                <li>Pialang Berjangka tidak bertanggung jawab untuk memberikan penilaian kepada Nasabah mengenai iklim, pasar, keadaan politik dan ekonomi nasional dan internasional, nilai kontrak berjangka, kolateral, atau memberikan nasihat mengenai keadaan pasar. Pialang Berjangka hanya memberikan pelayanan untuk melakukan transaksi secara jujur serta memberikan laporan atas transaksi tersebut.
                                                                    <br /><span class="labeling">Futures Broker is not responsible to provide an assessment to the Customer on climate, market, political and economic situation nationally and internationally, the value of derivatives contracts, collateral, or give advice about the state of the market. Futures Broker only provide services to transact honestly and provide a report on such transactions.</span></li>
                                                                <li>Perdagangan sewaktu-waktu dapat dihentikan oleh pihak yang memiliki otoritas (Bappebti / Bursa Berjangka) tanpa pemberitahuan terlebih dahulu kepada Nasabah. Atas posisi terbuka yang masih dimiliki oleh Nasabah pada saat perdagangan tersebut dihentikan, maka akan diselesaikan (likuidasi) berdasarkan pada peraturan / ketentuan yang dikeluarkan dan ditetapkan oleh pihak otoritas tersebut, dan semua kerugian serta biaya yang timbul sebagai akibat dihentikannya transaksi oleh pihak otoritas perdagangan tersebut, menjadi beban dan tanggung jawab Nasabah sepenuhnya.
                                                                    <br /><span class="labeling">Trading at any time can be terminated by the parties who have authority (Bappebti / Stock Exchange) without prior notice to Customer. On open positions that still owned by the Customer at the time the trade is stopped, it will be resolved (liquidation) based on the rules / regulations issued and established by the authorities, and all losses and expenses incurred as a result of the termination of the transaction by the authorities of such trade, a burden and responsibility of the Customer completely.</span></li>
                                                            </ol>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm7ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][7][number]" value="8" id="RealAccountSfftForm7Number"/><input type="hidden" name="data[RealAccountSfftForm][7][read_and_understand]" id="RealAccountSfftForm7ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][7][read_and_understand]"  data-index="7" class="" <?=$checked;?> value="1" id="RealAccountSfftForm7ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>9</td>
                                                        <td colspan="2">
                                                            <strong>Transaksi Harus Mematuhi Peraturan Yang Berlaku</strong>
                                                            <br /><span class="labeling">Transactions Must Comply with Applicable Regulations</span>
                                                            <p>Semua transaksi baik yang dilakukan sendiri oleh Nasabah maupun melalui Pialang Berjangka wajib mematuhi peraturan perundang-undangan di bidang Perdagangan Berjangka, kebiasaan dan interpretasi resmi yang ditetapkan oleh Bappebti atau Bursa Berjangka.
                                                                <br /><span class="labeling">All transactions performed by the Customer and shall abide by the laws and regulations in the field of Futures Trading, customs and official interpretation established by Bappebti or Stock Exchange.</span></p>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm8ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][8][number]" value="9" id="RealAccountSfftForm8Number"/><input type="hidden" name="data[RealAccountSfftForm][8][read_and_understand]" id="RealAccountSfftForm8ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][8][read_and_understand]"  data-index="8" class="" <?=$checked;?> value="1" id="RealAccountSfftForm8ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>10</td>
                                                        <td colspan="2">
                                                            <strong>Pialang Berjangka tidak Bertanggung jawab atas Kegagalan Komunikasi</strong>
                                                            <br /><span class="labeling">Futures Broker is not Responsible for Communication Failure</span>
                                                            <p>Pialang Berjangka tidak bertanggung jawab atas keterlambatan atau tidak tepat waktunya pengiriman amanat atau informasi lainnya yang disebabkan oleh kerusakan fasilitas komunikasi atau sebab lain diluar kontrol Pialang Berjangka.
                                                                <br /><span class="labeling">Futures Broker shall not be liable for any delay or late transmission of the orders or other damage caused by communication facilities or any other causes beyond the control of Futures Broker.</span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm9ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][9][number]" value="10" id="RealAccountSfftForm9Number"/><input type="hidden" name="data[RealAccountSfftForm][9][read_and_understand]" id="RealAccountSfftForm9ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][9][read_and_understand]"  data-index="9" class="" <?=$checked;?> value="1" id="RealAccountSfftForm9ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>11</td>
                                                        <td colspan="2">
                                                            <strong>Konfirmasi</strong><br /><span class="labeling">Confirmation</span>
                                                            <ol type="a">
                                                                <li>Konfirmasi dari Nasabah dapat berupa surat, telex, media lain, secara tertulis ataupun rekaman suara.
                                                                    <br /><span class="labeling">Confirmation of the Customer can be either a letter, telex, other media, electronic mail, in writing or recorded voice.</span></li>
                                                                <li>Pialang Berjangka berkewajiban menyampaikan konfirmasi transaksi, laporan rekening, permintaan Call Margin, dan pemberitahuan lainnya kepada Nasabah secara akurat, benar dan secepatnya pada alamat Nasabah sesuai dengan yang tertera dalam rekening Nasabah. Apabila dalam jangka waktu 2 x 24 jam setelah amanat jual atau beli disampaikan, tetapi Nasabah belum menerima konfirmasi tertulis, Nasabah segera memberitahukan hal tersebut kepada Pialang Berjangka melalui telepon dan disusul dengan pemberitahuan tertulis.
                                                                    <br /><span class="labeling">Broker shall render the transaction confirmation, account statements, request Call Margin, and other notificatio to the customer accurately, completely and immediate the address (email) the Customer as stated in the Customer's
                                                                        account, If within 2x24 hours after the mandate to sell or buy delivered, but the customer has not received a confirmation via electronic mail address and / or transaction system, the Customer immediately informed the Broker by telephone and followed by a written notice.</span></li>
                                                                <li>Jika dalam waktu 2 x 24 jam sejak tanggal penerimaan konfirmasi tertulis tersebut tidak ada sanggahan dari Nasabah maka konfirmasi Pialang Berjangka dianggap benar dan sah.
                                                                    <br /><span class="labeling">If within 2x24 hours from the date of receipt of such confirmation no objections from the Customer the confirmation Futures Broker is legal.</span></li>
                                                                <li>Kekeliruan atas konfirmasi yang diterbitkan Pialang Berjangka akan diperbaiki oleh Pialang Berjangka sesuai keadaan yang sebenarnya dan demi hukum konfirmasi yang lama batal.
                                                                    <br /><span class="labeling">The mistake on the confirmation issued Futures Broker will be fixed by the corresponding actual circumstances and previous confirmation deemed cancelled by law.</span></li>
                                                                <li>Nasabah tidak bertanggung jawab atas transaksi yang dilaksanakan atas rekeningnya apabila konfirmasi tersebut tidak disampaikan secara benar dan akurat.
                                                                    <br /><span class="labeling">Customers are not responsible for transactions carried out on the account if the confirmation is not delivered correctly and accurately.</span></li>
                                                            </ol>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm10ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][10][number]" value="11" id="RealAccountSfftForm10Number"/><input type="hidden" name="data[RealAccountSfftForm][10][read_and_understand]" id="RealAccountSfftForm10ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][10][read_and_understand]"  data-index="10" class="" <?=$checked;?> value="1" id="RealAccountSfftForm10ReadAndUnderstand"/>                </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td colspan="2">
                                                            <p><strong>Kebenaran informasi Nasabah</strong>
                                                                <br /><span class="labeling">Customer Information Truth</span>
                                                            </p>
                                                            <p>Nasabah memberikan informasi yang benar dan akurat mengenai data Nasabah yang diminta oleh Pialang Berjangka dan akan memberitahukan paling lambat dalam waktu 3 (tiga) hari kerja setelah terjadi perubahan, termasuk perubahan kemampuan keuangannya untuk terus melaksanakan transaksi.
                                                                <br /><span class="labeling">Customers provide true and accurate information about the data requested by the Customer and will inform the Futures Broker no later than within three (3) business days after the change, including changes in their financial ability to continue to carry out the transaction.</span>
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm11ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][11][number]" value="12" id="RealAccountSfftForm11Number"/><input type="hidden" name="data[RealAccountSfftForm][11][read_and_understand]" id="RealAccountSfftForm11ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][11][read_and_understand]"  data-index="11" class="" <?=$checked;?> value="1" id="RealAccountSfftForm11ReadAndUnderstand"/>                </td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td colspan="2">
                                                            <p><strong>Komisi Transaksi</strong><br /><span class="labeling">Transaction Commission</span></p>
                                                            <p>Nasabah mengetahui dan menyetujui bahwa Pialang Berjangka berhak untuk memungut komisi atas transaksi yang telah dilaksanakan, dalam jumlah sebagaimana akan ditetapkan dari waktu ke waktu oleh Pialang Berjangka. Perubahan beban <i>(fees)</i> dan biaya lainnya harus disetujui secara tertulis oleh Para Pihak.
                                                                <br /><span class="labeling">Customer acknowledges and agrees that the Futures Broker is entitled to charge a commission on transactions that have executed, in the amount as shall be determined from time to time by the IB. Amendment in fees and other expenses must be approved in writing by the Parties.</span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm12ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][12][number]" value="13" id="RealAccountSfftForm12Number"/><input type="hidden" name="data[RealAccountSfftForm][12][read_and_understand]" id="RealAccountSfftForm12ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][12][read_and_understand]"  data-index="12" class="" <?=$checked;?> value="1" id="RealAccountSfftForm12ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>14</td>
                                                        <td colspan="2">
                                                            <p><strong>Pemberian Kuasa</strong><br /><span class="labeling">Authorization</span></p>
                                                            <p>Nasabah memberikan kuasa kepada Pialang Berjangka untuk menghubungi bank, lembaga keuangan, Pialang Berjangka lain, atau institusi lain yang terkait untuk memperoleh keterangan atau verifikasi mengenai informasi yang diterima dari Nasabah. Nasabah mengerti bahwa penelitian mengenai data hutang pribadi dan bisnis  dapat  dilakukan  oleh  Pialang  Berjangka  apabila  diperlukan.  Nasabah diberikan kesempatan untuk memberitahukan secara tertulis dalam jangka waktu yang telah disepakati untuk melengkapi persyaratan yang diperlukan.
                                                                <br /><span class="labeling">Customer authorizes the Futures Broker to contact the bank, financial institution, another Futures Broker, or other relevant institutions to obtain information or verification of the information received from the Customer. Customers understand that the study of the data of personal debt and business can be conducted by the Futures Broker, if necessary. Customers are given the opportunity to inform in writing within the approved time to complete the requirements.</span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm13ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][13][number]" value="14" id="RealAccountSfftForm13Number"/><input type="hidden" name="data[RealAccountSfftForm][13][read_and_understand]" id="RealAccountSfftForm13ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][13][read_and_understand]"  data-index="13" class="" <?=$checked;?> value="1" id="RealAccountSfftForm13ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>15</td>
                                                        <td colspan="2">
                                                            <p><strong>Pemindahan Dana</strong><br /><span class="labeling">Funds Transfer</span></p>
                                                            <p>Pialang Berjangka dapat setiap saat mengalihkan dana dari satu rekening ke rekening lainnya berkaitan dengan kegiatan transaksi yang dilakukan Nasabah seperti pembayaran komisi, pembayaran biaya transaksi, kliring, dan keterlambatan dalam memenuhi kewajibannya, tanpa terlebih dahulu memberitahukan kepada Nasabah. Transfer yang telah dilakukan akan segera diberitahukan secara tertulis kepada Nasabah.</p>
                                                            <br /><span class="labeling">Futures Broker may at any time divert funds from one account to another with regard to transactions made by Customer such as commission payments, payment transaction costs, clearing and delays in fulfilling its obligations, without first notifying the Customer. Transfers are made will be immediately notified in writing to the Customer.</span></li>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm14ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][14][number]" value="15" id="RealAccountSfftForm14Number"/><input type="hidden" name="data[RealAccountSfftForm][14][read_and_understand]" id="RealAccountSfftForm14ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][14][read_and_understand]"  data-index="14" class="" <?=$checked;?> value="1" id="RealAccountSfftForm14ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>16</td>
                                                        <td colspan="2">
                                                            <p><strong>Pemberitahuan</strong><br /><span class="labeling">Notice</span></p>
                                                            <ol type="a">
                                                                <li>Semua komunikasi, uang, surat berharga, dan kekayaan lainnya harus dikirimkan langsung ke alamat Nasabah seperti tertera dalam rekeningnya atau alamat lain yang ditetapkan / diberitahukan secara tertulis oleh Nasabah.
                                                                    <br /><span class="labeling">All communications, money, securities, and other property must be sent directly to the Customer's address as still in the bill or other address specified / notified in writing by the Customer.</span>
                                                                </li>
                                                                <li>
                                                                    Semua uang, harus disetor atau ditransfer langsung oleh Nasabah ke Rekening Terpisah <i>(Segregated Account)</i> Pialang Berjangka : 
                                                                    <br /><span class="labeling">All money must be deposited or transferred directly by the Customer to the Futures Broker's Segregated Account:</span>
                                                                    <dl class="dl-horizontal">
                                                                        <dt>Nama<br /><span class="labeling">Name</span></dt><dd>PT TOPGROWTH FUTURES</dd>
                                                                        <dt>Alamat<br /><span class="labeling">Address</span></dt><dd>Plaza Bapindo, Mandiri Tower, 28th floor<br />
                                                                            Jl. Jend. Sudirman, Kav. 54-55 <br />
                                                                            Jakarta 12190 – Indonesia</dd>
                                                                        <dt>Bank<br /><span class="labeling">Bank</span></dt><dd>BCA - KCU Sudirman</dd>
                                                                        <dt>No. Rekening Terpisah<br /><span class="labeling">No. Segregated Account </span></dt><dd>035-311-8568 (Rupiah)</dd>
                                                                        <dt>&nbsp;</dt><dd>035-317-7718 (USD)</dd>
                                                                    </dl>
                                                                    dan dianggap sudah diterima oleh Pialang Berjangka apabila sudah ada tanda terima bukti setor atau transfer dari pegawai Pialang Berjangka.
                                                                    <br /><span class="labeling">And considered acceptable by the Futures Broker if there is already receipt of deposit or transfer of Futures Broker employees.</span>
                                                                </li>
                                                                <li>
                                                                    Semua surat berharga, kekayaan lainnya, atau komunikasi harus dikirim kepada Pialang Berjangka :
                                                                    <br /><span class="labeling">All securities, other property, or communication must be sent to the Futures Broker :</span>
                                                                    <dl class="dl-horizontal">
                                                                        <dt>Nama<br /><span class="labeling">Name</span></dt><dd>PT. TOPGROWTH FUTURES</dd>
                                                                        <dt>Alamat<br /><span class="labeling">Address</span></dt><dd> Sahid Sudirman Center, 40 floor, <br/>Jl. Jend Sudirman Kav 86 <br />Jakarta 10220 - Indonesia</dd>
                                                                        <dt>Telepon<br /><span class="labeling">Phone</span></dt><dd>021 2788-9393</dd>
                                                                        <dt>Facsimile<br /><span class="labeling">Facsimile</span></dt><dd>021 2788-9395</dd>
                                                                        <dt>E-mail<br /><span class="labeling">Email</span></dt><dd>compliance@topgrowthfutures.com</dd>
                                                                    </dl>
                                                                    dan dianggap sudah diterima oleh Pialang Berjangka apabila sudah ada tanda bukti penerimaan dari pegawai Pialang Berjangka.
                                                                    <br /><span class="labeling">and considered acceptable by the Futures Broker when is receipt from IB employees.</span>
                                                                </li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm15ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][15][number]" value="16" id="RealAccountSfftForm15Number"/><input type="hidden" name="data[RealAccountSfftForm][15][read_and_understand]" id="RealAccountSfftForm15ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][15][read_and_understand]"  data-index="15" class="" <?=$checked;?> value="1" id="RealAccountSfftForm15ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>17</td>
                                                        <td colspan="2">
                                                            <p><strong>Dokumen Pemberitahuan Adanya Resiko</strong>
                                                                <br /><span class="labeling">Risk Disclosure Document</span></p>
                                                            <p>Nasabah mengakui menerima dan mengerti Dokumen Pemberitahuan Adanya Resiko.
                                                                <br /><span class="labeling">Customer acknowledges acceptance and understanding of Risk Disclosure Documents. </span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm16ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][16][number]" value="17" id="RealAccountSfftForm16Number"/><input type="hidden" name="data[RealAccountSfftForm][16][read_and_understand]" id="RealAccountSfftForm16ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][16][read_and_understand]"  data-index="16" class="" <?=$checked;?> value="1" id="RealAccountSfftForm16ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>18</td>
                                                        <td colspan="2">
                                                            <strong>Jangka Waktu Perjanjian dan Pengakhiran</strong>
                                                            <br /><span class="labeling">Term of Agreement and Termination</span>
                                                            <ol type="a">
                                                                <li>Perjanjian ini mulai berlaku terhitung sejak tanggal ditandatanganinya sampai disampaikannya pemberitahuan pengakhiran secara tertulis oleh Nasabah atau Pialang Berjangka.
                                                                    <br /><span class="labeling">This Agreement shall be applicable as from the date of confirmation by the Futures Broker with the receipt of the Customer Acceptance Confirmation Proof of Futures Broker by the Client.</span></li>
                                                                <li>Nasabah dapat mengakhiri Perjanjian ini hanya jika Nasabah sudah tidak lagi memiliki posisi terbuka dan tidak ada kewajiban Nasabah yang diemban oleh atau terhutang kepada Pialang Berjangka.
                                                                    <br /><span class="labeling">Customer may terminate this Agreement only if the Customer no longer has a open position and no liability is assumed by the Customer or payable to the Futures Broker.</span></li>
                                                                <li>Pengakhiran tidak membebaskan salah satu Pihak dari tanggung jawab atau kewajiban yang terjadi sebelum pemberitahuan tersebut.
                                                                    <br /><span class="labeling">Termination does not relieve any Party from responsibility or liability incurred before the notification.</span></li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm17ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][17][number]" value="18" id="RealAccountSfftForm17Number"/><input type="hidden" name="data[RealAccountSfftForm][17][read_and_understand]" id="RealAccountSfftForm17ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][17][read_and_understand]"  data-index="17" class="" <?=$checked;?> value="1" id="RealAccountSfftForm17ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>19</td>
                                                        <td colspan="2">
                                                            <p><strong>Berakhirnya Perjanjian</strong>
                                                                <br /><span class="labeling">The Agreement termination</span></p>
                                                            <p>Perjanjian dapat berakhir dalam hal Nasabah :
                                                                <br /><span class="labeling">Agreement may terminate if the Customer:</span></p>
                                                            <ol type="a" class="normal">
                                                                <li>dinyatakan pailit, memiliki hutang yang sangat besar, dalam proses peradilan, menjadi hilang ingatan, mengundurkan diri atau meninggal;
                                                                    <br /><span class="labeling">Declared bankrupt, had a huge debt, in the judicial process, became crazy, resigns or dies; Or</span></li>
                                                                <li>tidak dapat memenuhi atau mematuhi perjanjian ini dan / atau melakukan pelanggaran terhadapnya;
                                                                    <br /><span class="labeling">They can not meet or comply with these agreements and / or violations against him.</span></li>
                                                                <li>berkaitan dengan angka (1) dan (2) tersebut diatas, Pialang Berjangka dapat :
                                                                    <br /><span class="labeling">with regard to the numbers 1 and 2 above, Broker can:</span>
                                                                    <ol type="i" class="normal">
                                                                        <li>meneruskan atau menutup posisi Nasabah tersebut setelah mempertimbangkannya secara cermat dan jujur ; dan
                                                                            <br /><span class="labeling">continue or close the Customer&#39;s position after consi it carefully and honestly; and</span></li>
                                                                        <li>menolak perintah dari Nasabah atau kuasanya.
                                                                            <br /><span class="labeling">refuse the transaction from the Customer.</span></li>
                                                                    </ol>
                                                                </li>
                                                                <li>Pengakhiran Perjanjian sebagaimana dimaksud dengan poin a dan b tersebut diatas tidak melepaskan kewajiban dari Para Pihak yang berhubungan dengan penerimaan atau kewajiban pembayaran atau pertanggungjawaban kewajiban lainnya yang timbul dari Perjanjian.
                                                                    <br /><span class="labeling">The Agreement Termination as referred to paragraphs a and  above do not remove the obligation of the Contracting Parties relating to the receipt or payment obligation or liability other obligations arising from the Agreement.</span></li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm18ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][18][number]" value="19" id="RealAccountSfftForm18Number"/><input type="hidden" name="data[RealAccountSfftForm][18][read_and_understand]" id="RealAccountSfftForm18ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][18][read_and_understand]"  data-index="18" class="" <?=$checked;?> value="1" id="RealAccountSfftForm18ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>20</td>
                                                        <td colspan="2">
                                                            <p><strong>Force Majeur</strong><br /><span class="labeling">Force Majeur</span><p>
                                                            <p>Tidak ada satupun pihak di dalam perjanjian dapat diminta pertanggungjawabannya untuk suatu keterlambatan atau terhalangnya memenuhi kewajiban berdasarkan Perjanjian yang diakibatkan oleh suatu sebab yang berada di luar kemampuannya atau kekuasaannya (<i>force majeur</i>), sepanjang pemberitahuan tertulis mengenai sebab itu disampaikannya kepada pihak lain dalam Perjanjian dalam waktu tidak lebih dari 24 (dua puluh empat) jam sejak timbulnya sebab itu. Yang dimaksud dengan <i>force majeur</i> dalam Perjanjian adalah peristiwa kebakaran, bencana alam (seperti gempa bumi, banjir, angin topan, petir), pemogokan umum, huru hara, peperangan, perubahan terhadap peraturan perundang-undangan yang berlaku di bidang ekonomi, keuangan dan Perdagangan Berjangka, pembatasan yang dilakukan oleh otoritas Perdagangan Berjangka dan Bursa Berjangka serta terganggunya sistem perdagangan, kliring dan penyelesaian transaksi Kontrak Berjangka di mana transaksi dilaksanakan yang secara langsung mempengaruhi pelaksanaan pekerjaan berdasarkan Perjanjian.
                                                                <br /><span class="labeling">None of the parties to the Agreement may be held liable for a delay or obstruction to meet obligations under the Agreement caused by a cause that is beyond his ability or his control (force majeure), along with written notice of because it was conveyed to the other party in the agreement in time not more than 24 (twenty four) hours since the onset of the cause. What is meant by Force Majeure in the Treaty is the event of fire, natural disasters (such as earthquakes, floods, hurricanes, lightning), general strikes, riots, war, changes to the legislation in force and the conditions in the economic, financial and Futures, or limitations imposed by the authorities and the Futures trading Futures Exchange as well as the disruption of the trading system, Wiring and transaction settlement futures contract in which the transaction was executed that directly affect the implementation of the work under the Agreement.</span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm19ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][19][number]" value="20" id="RealAccountSfftForm19Number"/><input type="hidden" name="data[RealAccountSfftForm][19][read_and_understand]" id="RealAccountSfftForm19ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][19][read_and_understand]"  data-index="19" class="" <?=$checked;?> value="1" id="RealAccountSfftForm19ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>21</td>
                                                        <td colspan="2">
                                                            <p><strong>Perubahan Atas lsian dalam Perjanjian Pemberian Amanat</strong>
                                                                <br /><span class="labeling">Amendment to the Mandate Agreement</span></p>
                                                            <p>Perubahan atas isian dalam Perjanjian pemberian ini hanya dapat dilakukan atas persetujuan Para Pihak, atau Pialang Berjangka telah memberitahukan secara tertulis perubahan yang diinginkan, dan Nasabah tetap memberikan perintah untuk transaksi dengan tanpa memberikan tanggapan secara tertulis atas usul perubahan tersebut. Tindakan Nasabah tersebut dianggap setuju atas usul perubahan tersebut.
                                                                <br /><span class="labeling">Amendment to the contents in this Agreement can only be done with the approval of the Parties, or the Broker has notified in writing the desired changes, and the Customer still give orders to deal with without providing a written response on the proposed amendments. Customer actions are deemed to agree on proposed amendments.</span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm20ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][20][number]" value="21" id="RealAccountSfftForm20Number"/><input type="hidden" name="data[RealAccountSfftForm][20][read_and_understand]" id="RealAccountSfftForm20ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][20][read_and_understand]"  data-index="20" class="" <?=$checked;?> value="1" id="RealAccountSfftForm20ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>22</td>
                                                        <td colspan="2">
                                                            <strong>Penyelesaian Perselisihan</strong><br /><span class="labeling">Dispute Resolution</span>
                                                            <ol type="a" class="normal">
                                                                <li>Semua perselisihan dan perbedaan pendapat yang timbul dalam pelaksanaan perjanjian ini wajib diselesaikan terlebih dahulu secara musyawarah untuk mencapai mufakat antara Para Pihak.
                                                                    <br /><span class="labeling">All disputes and disagreements that arise in the implementation of this Agreement shall be settled beforehand by discussion to reach an agreement between the Parties.</span></li>
                                                                <li>Apabila perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan secara musyawarah untuk mencapai mufakat, Para Pihak wajib memanfaatkan sarana penyelesaian perselisihan yang tersedia di Bursa Berjangka.
                                                                    <br /><span class="labeling">If the disputes and disagreements that arise can not be settled amicably to reach an agreement, the Parties shall make use of the means of dispute resolution available in the Stock Exchange.</span></li>
                                                                <li><div class="alert alert-info alert-dismissible" role="alert">Apabila Perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan melalui cara sebagaimana dimaksud pada angka (1) dan angka (2), maka Para Pihak sepakat untuk menyelesaikan perselisihan melalui :
                                                                        <br /><span class="labeling">If the disputes and differences arising can not be resolved through the procedure referred to in point (1) and the number (2), the Parties agree to settle disputes through:</span>
                                                                        <br />
                                                                        <label class="radio">
                                                                            <input type="radio" name="data[RealAccountStepFife][settlement_of_disputes_2]" id="RealAccountStepFifeSettlementOfDisputes2Bakti" class="s52-settlement_of_disputes" value="bakti" />Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI) berdasarkan Peraturan dan Prosedur BAKTI<br /><span class="labeling">Commodity Futures Trading Arbitration Service (BAKTI) based on the Rules and Procedures BAKTI;</span> ;                            
                                                                        </label>
                                                                        <label class="radio">
                                                                            <input type="radio" name="data[RealAccountStepFife][settlement_of_disputes_2]" id="RealAccountStepFifeSettlementOfDisputes2PengadilanNegeri" class="s52-settlement_of_disputes" value="pengadilan negeri" />Pengadilan Negeri / <span class="labeling">District Court</span>                            </label>
                                                                        <select name="RealAccountStepFifeDistrictCourtId2" class="s52-district_court_id" id="RealAccountStepFifeDistrictCourtId2">
                                                                            <option value="">-- Pilih Pengadilan Negeri --</option>
                                                                            <optgroup label="Jakarta">
                                                                                <option value="1">Jakarta Selatan</option>
                                                                            </optgroup>
                                                                        </select>                            </div></li>
                                                                <li>
                                                                    <div class="alert alert-info alert-dismissible" role="alert">Kantor atau kantor cabang Pialang  Berjangka  terdekat  dengan domisili Nasabah tempat penyelesaian dalam hal terjadi perselisihan.
                                                                        <br /><span class="labeling">Office or branch office Broker places nearest to the Customer's domicile in the event of a dispute settlement.</span>
                                                                        <br />
                                                                        <strong>Daftar Kantor (Pilih salah satu) :</strong>
                                                                        <br /><span class="labeling">List of Office (Choose one):</span>
                                                                        <select name="RealAccountStepFifeBranchId2" class="s52-branch_id" id="RealAccountStepFifeBranchId2">
                                                                            <option value="">-- Pilih Kantor Cabang --</option>
                                                                            <option value="2">Kantor Cabang</option>
                                                                            <option value="1">Kantor Pusat</option>
                                                                        </select>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm21ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][21][number]" value="22" id="RealAccountSfftForm21Number"/><input type="hidden" name="data[RealAccountSfftForm][21][read_and_understand]" id="RealAccountSfftForm21ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][21][read_and_understand]"  data-index="21" class="" <?=$checked;?> value="1" id="RealAccountSfftForm21ReadAndUnderstand"/>                </td>
                                                    </tr>

                                                    <tr>
                                                        <td>23</td>
                                                        <td colspan="2">
                                                            <p><strong>Bahasa</strong><br /><span class="labeling">Language</span></p>
                                                            <p>Perjanjian ini dibuat dalam Bahasa Indonesia.                    
                                                                <br /><br /><span class="labeling">This agreement is in Bahasa Indonesia. The English translation is provided only for your reference.<br /> The provisions on this agreement shall be governed by Indonesian Law.</span> </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right warning">
                                                            <strong><em><label for="RealAccountSfftForm22ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                            <input type="hidden" name="data[RealAccountSfftForm][22][number]" value="23" id="RealAccountSfftForm22Number"/><input type="hidden" name="data[RealAccountSfftForm][22][read_and_understand]" id="RealAccountSfftForm22ReadAndUnderstand_" value="0"/><input type="checkbox" name="data[RealAccountSfftForm][22][read_and_understand]"  data-index="22" class="" <?=$checked;?> value="1" id="RealAccountSfftForm22ReadAndUnderstand"/>                </td>
                                                    </tr>




                                                </table>
                                            </div>
                                        </div>

                                        <!-- End of Mini and Regular -->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <p>Demikian Perjanjian Pemberian Amanat ini dibuat oleh Para Pihak dalam keadaan sadar, sehat jasmani rohani dan tanpa unsur paksaan dari pihak manapun.
                                                    <br /><span class="labeling">This Agent Agreement concluded by the Parties in a conscious state, spiritually and physically healthy without coercion from any party.</span></p>
                                                <p class="text-center"><strong>"Saya telah membaca, mengerti dan setuju terhadap semua ketentuan yang tercantum dalam perjanjian ini".</strong></p>
                                                <p class="text-center"><span class="labeling">I have read, understood and agreed to all the points included in this agreement</span></p>
                                                <p class="text-center">Dengan mengisi kolom "YA" di bawah, saya menyatakan bahwa saya telah menerima</p>
                                                <p class="text-center"><span class="labeling">By filling in the "YES" below, I confirm that I have received</span></p>
                                                <p class="text-center hidden 107BPK051"><strong>"PERJANJIAN PEMBERIAN AMANAT TRANSAKSI KONTRAK BERJANGKA"</strong></p>
                                                <p class="text-center hidden 107BPK052"><strong>"PERJANJIAN PEMBERIAN AMANAT TRANSAKSI KONTRAK DERIVATIF"</strong></p>
                                                <p class="text-center hidden 107BPK052"><strong>"SISTEM PERDAGANGAN ALTERNATIF"</strong></p>
                                                <p class="text-center hidden 107BPK052"><span class="labeling">AGREEMENT GRANT OF TRUSTEES OF CONTRACT DERIVATIVE TRANSACTIONS<br />ALTERNATIVE TRADING SYSTEM</span></strong></p>


                                                <p class="text-center">mengerti dan juga menyetujui isinya.<br />
                                                    <span class="labeling">understand and approve of its contents.</span></p>
                                                <p>&nbsp;</p>
                                                <input type="hidden" name="data[RealAccountStepFife][settlement_of_dispute]" id="RealAccountStepFifeSettlementOfDispute"/><input type="hidden" name="data[RealAccountStepFife][district_court_id]" id="RealAccountStepFifeDistrictCourtId"/><input type="hidden" name="data[RealAccountStepFife][branch_id]" id="RealAccountStepFifeBranchId"/>        <div class="form-group">
                                                    <div class="col-md-4 col-sm-12">Pernyataan Menerima/Tidak<br /><span class="labeling">Receiving statement / No</span></div>
                                                    <div class="col-md-8 col-sm-12">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="RealAccountStepFifeAccept" id="RealAccountStepFifeAccept1" value="1" required="required" <?php
                                                            if (!empty($show)) {
                                                                if ($confirm_accept == "1") {
                                                                    echo " checked ";
                                                                } else {
                                                                    echo "";
                                                                }
                                                            }
                                                            ?>/>Ya<br/><span class="labeling">Yes</span>              
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="RealAccountStepFifeAccept" id="RealAccountStepFifeAccept0" value="0" required="required" />Tidak<br /><span class="labeling">No</span>                </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">Menerima Pada Tanggal<br /><span class="labeling">Stating By Date</span></div>
                                                    <div class="col-md-8 col-sm-6">
                                                        27-02-2018            </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <p></p>
                                    <p>&nbsp;</p>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-o back-step btn-wide pull-left" id="prevBtn" name="prevBtn">
                                            <i class="fa fa-circle-arrow-left"></i> Back
                                        </button>
                                        <button id="btn_step5" name="btn_step5" class="btn btn-primary btn-o next-step btn-wide pull-right">
                                            Next <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("input").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    $('#btn_step5').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step5_update')?>",
            type: "POST",
            data: $('#frm5').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/step6')?>";
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        $('[name="' + data.inputerror[0] + '"]').focus();
                    }
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    });

    $('#prevBtn').click(function (e) {
        e.preventDefault();
        window.location.href = "<?php echo site_url('accounts/real_accounts/step4')?>";
    });


</script>