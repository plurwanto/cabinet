<?php
if (!empty($show)) {
    $confirm_accept = $show->step1_accept;
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
                                <form action="" method="POST" name="frm1" id="frm1" class="smart-wizard">
                                    <div id="wizard" class="swMain">
                                        <!-- start: WIZARD SEPS -->
                                        <ul>
                                            <li>
                                                <a href="#step1" class="selected">
                                                    <div class="stepNumber animated tada">
                                                        1
                                                    </div>
                                                    <span class="stepDesc"><small> Step 1 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2_1">
                                                    <div class="stepNumber">
                                                        2.1
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 2.1 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2_2">
                                                    <div class="stepNumber">
                                                        2.2
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 2.2 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step3">
                                                    <div class="stepNumber">
                                                        3
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 3 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step4">
                                                    <div class="stepNumber">
                                                        4
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 4 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step5">
                                                    <div class="stepNumber">
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
                                        <!-- end: WIZARD SEPS -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="new_doc" id="new_doc" value="<?=$kode;?>">
                                                <input type="hidden" name="old_doc" id="old_doc" value="<?=$doc_number;?>">
                                                <p>Formulir Nomor 107.PBK.01</p>
                                                <table style="width: 100%;" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Lampiran</td>
                                                            <td>:</td>
                                                            <td>&nbsp;Peraturan Kepala Badan Pengawas</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;Perdagangan Berjangka Komoditi</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;Nomor : 107/BAPPEBTI/PER/11/2013</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>&nbsp;</p>
                                                <p><strong>PROFIL PERUSAHAAN PIALANG BERJANGKA</strong><br /><span class="labeling">Company Profile</span></p>
                                                <p>&nbsp;</p>
                                                <table style="height: 263px;" width="787" cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama<br /><span class="labeling">Company Name</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>&nbsp; PT. Topgrowth Futures</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat<br /><span class="labeling">Address</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>&nbsp;&nbsp;Sahid Sudirman Center, 40 floor, Jl. Jend Sudirman Kav 86 Jakarta 10220 Indonesia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No. Telephone<br /><span class="labeling">Telephone</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>&nbsp;&nbsp;021 2788-9393</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Faksimili<br /><span class="labeling">Facsimile</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>&nbsp;&nbsp;021 2788-9395</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email<br /><span class="labeling">Email</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>&nbsp; <a href="mailto:customercare@topgrowthfutures.com">customercare@topgrowthfutures.com</a>&nbsp;/&nbsp;<a href="mailto:csonline@topgrowthfutures.com">csonline@topgrowthfutures.com</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Home Page<br /><span class="labeling">Website</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>&nbsp; http://www.topgrowthfutures.com</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><strong>Susunan Pengurus Perusahaan,</strong><br /><span class="labeling">The composition of the Company's Management,</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Komisaris Utama<br /><span class="labeling">The Main Commisioner</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>
                                                                <p>&nbsp; Kiki Abdulrachman B</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Komisaris<br /><span class="labeling">Commissioner</span></td>
                                                            <td>&nbsp;:&nbsp;</td>
                                                            <td>
                                                                <p>&nbsp;&nbsp;Surya Mulyana</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Direktur Utama<br /><span class="labeling">President Director</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>
                                                                <p>&nbsp; Imanuddin Basri</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Direktur<br /><span class="labeling">Director</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>
                                                                <p>&nbsp; Ruliaty Natalin Djunudi</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Direktur Kepatuhan<br /><span class="labeling">Director Of Compliance</span></td>
                                                            <td>&nbsp;:</td>
                                                            <td>
                                                                <p>&nbsp; Sigit Wibowo</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr />
                                                <table cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Susunan Pemegang Saham Perusahaan<br /><span class="labeling">The composition of the Company's Shareholders</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; Kiki Abdulrachman B : 90%<br />&nbsp; Surya Mulyana &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; : 10%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor dan Tanggal Izin Usaha dari BAPPEBTI<br /><span class="labeling">Business License Number and Date of BAPPEBTI</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; No. 300/BAPPEBTI/SI/III/2004</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <p>&nbsp;</p>
                                                                <strong>Nomor dan Tanggal Keanggotaan Bursa Berjangka</strong><br /><span class="labeling">Number and Date of the Futures Exchange Membership</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jakarta Futures Exchange</td>
                                                            <td>:</td>
                                                            <td>&nbsp; SPAB-059/BBJ/01/04<br />&nbsp; Tanggal 19 Januari 2004</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Indonesia Commodity and Derivative Exchange</td>
                                                            <td>:</td>
                                                            <td>&nbsp; 047/SPKB/ICDX/Dir/IX/2010<br />&nbsp; Tanggal 27 September 2010</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <p>&nbsp;</p>
                                                                <strong>Nomor dan Tanggal Keanggotaan Lembaga Kliring Berjangka</strong><br /><span class="labeling">Number and Date of Approval For Alternative Trading System Participants</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jakarta Futures Exchange</td>
                                                            <td>:</td>
                                                            <td>&nbsp; 21/AK-KBI/III/2004<br />&nbsp; Tanggal 17 April 2014</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Indonesia Commodity and Derivative Exchange<br /><span class="labeling">Director</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; 012/SPKK/ISI-TF/X/2010<br />&nbsp; Tanggal 20 Oktober 2010</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor dan Tanggal Persetujuan Sebagai Peserta Sistem Perdagangan Alternatif<br /><span class="labeling">Director</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; 1275/BAPPEBTI/SP/7/2007<br />&nbsp; Tanggal 10 Juli 2007</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Penyelenggara Sistem Perdagangan Alternatif<br /><span class="labeling">Operator Name Alternative Trading System</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; PT Prolindo Buana Semesta</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kontrak Berjangka yang di Perdagangkan<br /><span class="labeling">Futures</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; GOLDGR, CPOTR</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kontrak Derivatif Syariah Yang Di perdagangkan<br /><span class="labeling">The contract Traded Derivatives Sharia</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp; -</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <p>&nbsp;</p>
                                                                <strong>Kontrak Derivatif Dalam Sistem Perdagangan Alternatif</strong><br /><span class="labeling">Derivative contracts In the Alternative Trading System</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>- Foreign Exchange</td>
                                                            <td>:</td>
                                                            <td>&nbsp; USD/CHF, USD/JPY, AUD/USD, EUR/USD, GBP/USD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>- Futures Index</td>
                                                            <td>:</td>
                                                            <td>&nbsp; Index Saham Hongkong, Index Saham Jepang, Index Saham Korea</td>
                                                        </tr>
                                                        <tr>
                                                            <td>- Loco London Gold (LLG) / XUL10</td>
                                                            <td>:</td>
                                                            <td>&nbsp; LLG / XAUUSD10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>- CFD</td>
                                                            <td>:</td>
                                                            <td>&nbsp; DJC05ID, SPC50ID, NQC20ID, FTC10ID, DXC25ID, CLSCID, Silvid, CLSCID</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <p>&nbsp;</p>
                                                                <strong>Kontrak Derivatif Dalam Sistem Perdagangan Alternatif dengan volume minimum 0,1 ( nol koma satu) lot yang Di Perdagangkan</strong><br /><span class="labeling">Derivative contracts In the Alternative Trading System with a minimum volume of 0.1 (zero point one) lot traded</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>- Foreign Exchange</td>
                                                            <td>:</td>
                                                            <td>&nbsp; USD/CHF, USD/JPY, AUD/USD, EUR/USD, GBP/USD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>- Futures Index</td>
                                                            <td>:</td>
                                                            <td>&nbsp; Index Saham Hongkong, Index Saham Jepang, Index Saham Korea</td>
                                                        </tr>
                                                        <tr>
                                                            <td>- Loco London Gold (LLG) / XUL10</td>
                                                            <td>:</td>
                                                            <td>&nbsp; LLG / XAUUSD10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya secara rinci yang dibebankan kepada Nasabah</td>
                                                            <td>:</td>
                                                            <td>&nbsp; Biaya secara rinci dapat dilihat di Peraturan Perdagangan (Trading Rules)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor atau Alamat email jika terjadi Keluhan</td>
                                                            <td>:</td>
                                                            <td>&nbsp; compliance@topgrowthfutures.com</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <p>&nbsp;</p>
                                                                <strong>Sarana penyelesaian perselisihan yang digunakan apabila terjadi perselisihan</strong><br /><span class="labeling">Means of dispute resolution used in any disputes</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><ol style="list-style-type: undefined;">
                                                                    <li style="text-align: justify;">Semua perselisihan dan perbedaan pendapat yang timbul dalam pelaksanaan Perjanjian ini wajib diselesaikan terlebih dahulu secara musyawarah untuk mencapai mufakat antara Para Pihak. <br /><span class="labeling">All disputes and disagreements that arise in the implementation of this Agreement shall be settled beforehand by discussion to reach an agreement between the Parties.</span></li>
                                                                    <li style="text-align: justify;">Apabila perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan secara musyawarah untuk mencapai mufakat, Para Pihak wajib memanfaatkan sarana penyelesaian perselisihan yang tersedia di Bursa Berjangka. <br /><span class="labeling">If the disputes and disagreements that arise can not be settled amicably to reach an agreement, the Parties shall make use of the means of dispute resolution available in the Futures Exchange.</span></li>
                                                                    <li style="text-align: justify;">Apabila perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan melalui cara sebagaimana dimaksud pada angka (1) dan angka (2), maka Para Pihak sepakat untuk menyelesaikan perselisihan melalui Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI) berdasarkan Peraturan dan Prosedur Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI)/Pengadilan Negeri. <br /><span class="labeling">If the disputes and differences arising can not be resolved through the procedure referred to in point (1) and the number (2), the Parties agree to settle disputes through the Arbitration Board Commodity Futures Trading (BAKTI) based on the Rules and Procedures Arbitration Board Commodity Futures Trading (BAKTI) / General Court.</span></li>
                                                                </ol></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table style="height: 295px;" width="668" cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">Nama - nama Wakil Pialang Berjangka yang Berkerja di Perusahaan Pialang Berjangka<br /><span class="labeling">Names IB Working in Corporate Broker</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1.&nbsp;&nbsp; Kiki Abdulrachman B</td>
                                                            <td>13. Chrisanto Tri Anggoro</td>
                                                            <td>25. Tedyanto Tedjosoewignjo</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.&nbsp;&nbsp; Mercida Juliana</td>
                                                            <td>14. Denny Kesuma Djaya</td>
                                                            <td>26. Shanty Kurniawati</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3.&nbsp;&nbsp; Narif Rahmat Santosa</td>
                                                            <td>15. Reza Permana</td>
                                                            <td>27. Go Yudianto Gode</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.&nbsp;&nbsp; Titisari Dewajanti</td>
                                                            <td>16. Shanly Yulias</td>
                                                            <td>28. Sigit Wibowo</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.&nbsp;&nbsp; Yenny Thomas</td>
                                                            <td>17. Gleen Hector Sumeleh</td>
                                                            <td>29. Eko Hadi Prijanto</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6.&nbsp;&nbsp; Novita Sari</td>
                                                            <td>18. Kwok Young</td>
                                                            <td>30. Ruliaty Natalin Djunudi</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7. &nbsp; Ade Yunus</td>
                                                            <td>19. Candra Jaya Palatehan</td>
                                                            <td>31. Tri Joko Laksana</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8.&nbsp;&nbsp; Bernardus Yudhy Prasetya</td>
                                                            <td>20. Herlina Sujanto</td>
                                                            <td>32. Eko Mulyono</td>
                                                        </tr>
                                                        <tr>
                                                            <td>9.&nbsp;&nbsp; Hana Kristiono</td>
                                                            <td>21. The Li Fat</td>
                                                            <td>33. Vetrayani Renova Sinaga</td>
                                                        </tr>
                                                        <tr>
                                                            <td>10. Hanry Widiyanto</td>
                                                            <td>22. Ratih Wijayandaru</td>
                                                            <td>34. Sri Subaktiyani</td>
                                                        </tr>
                                                        <tr>
                                                            <td>11.&nbsp;-</td>
                                                            <td>23. Mark Alexander Wibawa</td>
                                                            <td>35. Teguh Novianto</td>
                                                        </tr>
                                                        <tr>
                                                            <td>12. Ainur Fatik</td>
                                                            <td>24. Agustinus Widyo Pramono</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama - nama Wakil Pialang Berjangka yang secara khusus di tunjuk oleh Pialang Berjangka untuk melakukan verifikasi dalam rangka penerimaan Nasabah elektronik online<br /><span class="labeling">Names of the IB specifically designated by the Futures Broker to conduct verification in order electronics online Customer acceptance</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp;<ol style="list-style-type: undefined;">
                                                                    <li>Sri Subaktiyani</li>
                                                                    <li>Vetrayani Renova Sinaga</li>
                                                                    <li>Tri Joko Laksana</li>
                                                                    <li>Gleen Hector Sumeleh</li>
                                                                </ol></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;Nomor Rekening Terpisah ( Seagregated Account) Perusahaan Pialang Berjangka<br /><span class="labeling">Seagregated Account</span></td>
                                                            <td>:</td>
                                                            <td>&nbsp;&nbsp; Bank BCA Sudirman : 035-311-8568 (Rupiah)<br />&nbsp;&nbsp; Bank BCA Sudirman : 035-317-7718 (US Dollar)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <p><small>*) Isi sesuai dengan kontrak yang diperdagangkan<br/><span class="labeling"> Fill in accordance with the contracts traded</span></small></p>
                                                        <p>&nbsp;</p>
                                                        <p class="text-center"><strong>PERNYATAAN TELAH MEMBACA PROFIL PERUSAHAAN PIALANG BERJANGKA<br /><span class="labeling">STATEMENT HAS BEEN READING FUTURES BROKERAGE COMPANY PROFILE</span></strong></p>
                                                        <p>
                                                            Dengan mengisi kolom "YA" di bawah ini, saya menyatakan bahwa saya telah membaca dan menerima informasi <strong>PROFIL PERUSAHAAN PIALANG BERJANGKA</strong>, mengerti dan memahami isinya.<br/> <span class="labeling">By filling in the "Yes" below, I confirm that I have read and accepted FUTURES BROKERAGE COMPANY PROFILE information, know and understand its contents.</span>        </p>
                                                        <div class="form-group">
                                                            <div class="col-md-4 col-sm-12">
                                                                Pernyataan Menerima <span class="symbol required"></span><br /><span class="labeling">Receive statement</span>            </div>
                                                            <div class="col-md-8 col-sm-12">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="RealAccountCompanyProfileAccept" id="RealAccountCompanyProfileAccept1" value="1" <?php
                                                                    if (!empty($show)) {
                                                                        if ($confirm_accept == "1") {
                                                                            echo " checked ";
                                                                        } else {
                                                                            echo "";
                                                                        }
                                                                    }
                                                                    ?>/>Ya<br/>
                                                                    <span class="labeling">Yes</span>
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="RealAccountCompanyProfileAccept" id="RealAccountCompanyProfileAccept0" value="0" <?php
                                                                    if (!empty($show)) {
                                                                        if ($confirm_accept == "0") {
                                                                            echo " checked ";
                                                                        } else {
                                                                            echo "";
                                                                        }
                                                                    }
                                                                    ?>/>Tidak<br/>
                                                                    <span class="labeling">No</span>
                                                                </label>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-4 col-sm-12">
                                                                Menyatakan Pada Tanggal<br /><span class="labeling">Stating By Date</span>
                                                            </div>
                                                            <div class="col-md-8 col-sm-12">
                                                                09-02-2018           
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p></p>
                                                <p>&nbsp;</p>
                                                <div class="form-group">
                                                    <button id="btn_step1" name="btn_step1" class="btn btn-primary btn-o next-step btn-wide pull-right">
                                                        Next <i class="fa fa-arrow-circle-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
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

    $('#btn_step1').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step1_update')?>",
            type: "POST",
            data: $('#frm1').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/step2_1')?>";
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
</script>


