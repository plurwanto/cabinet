<?php
if (!empty($show)) {
    $doc_number = $show->document_number;
    $confirm_accept = $show->step8_accept;
    $fullName = $show->FullName;
    $address = $show->Address;
    $zipcode = $show->ZipCode;
    $identity_number = $show->identity_number;
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
                                <form action="" method="POST" name="frm8" id="frm8" class="smart-wizard">
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
                                                    <div class="stepNumber">
                                                        5
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 5 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step6" class="selected">
                                                    <div class="stepNumber">
                                                        6
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 6 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step7" class="selected">
                                                    <div class="stepNumber">
                                                        7
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 7 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step8" class="selected">
                                                    <div class="stepNumber animated tada">
                                                        8
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 8 </small> </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <input type="hidden" name="new_doc" id="new_doc" value="<?=$kode;?>">
                                            <input type="hidden" name="old_doc" id="old_doc" value="<?=$doc_number;?>">

                                            <div class="col-md-12 col-sm-12">
                                                <div style="text-align: center; clear: both; margin: 20px 0 20px 0; font: bold 20px arial">Surat Pernyataan</div>

                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td width="215">Nama<br /><span class="labeling">Name</span></td>
                                                            <td width="20" style="text-align: center;">:</td>
                                                            <td><?=$fullName;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Account<br /><span class="labeling">No. Account</span></td>
                                                            <td style="text-align: center;">:</td>
                                                            <td><em>« Menyusul »</em></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td>Alamat<br /><span class="labeling">Address</span></td>
                                                            <td style="text-align: center;">:</td>
                                                            <td><?=$address;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Telepon<br /><span class="labeling">Telephone</span></td>
                                                            <td style="text-align: center;">:</td>
                                                            <td><?=$MobilePhoneNumber;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No. PASSPORT / passport<br /><span class="labeling">No. Identity</span></td>
                                                            <td style="text-align: center;">:</td>
                                                            <td><?=$identity_number;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hari, Tanggal dan Jam<br /><span class="labeling">Day, Date and Hours</span></td>
                                                            <td style="text-align: center;">:</td>
                                                            <td><?=date('d-m-Y H:i:s');?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>&nbsp;</p>
                                                <p>Dengan ini memberikan pernyataan dengan sebenar-benarnya dan sejujurnya dalam keadaan
                                                    sadar, sehat jasmani dan rohani serta tanpa paksaan apapun dari pihak manapun sebagai 
                                                    berikut, bahwa saya sudah :
                                                    <br /><span class="labeling">
                                                        Hereby give statements truthfully and honestly in a conscious state, physically and mentally healthy and without any coercion from any party as follows, that I have:
                                                    </span></p>

                                                <ol id="ol-pernyataan">
                                                    <li>Mengetahui profile perusahaan PT Topgrowth Futures.<br /><span class="labeling">Known the company profile of PT Topgrowth Futures.</span></li>
                                                    <li>Membaca dengan seksama dan mengerti :<br /><span class="labeling">Read Carefully</span>
                                                        <ol type="a">
                                                            <li style="margin-bottom: 0px !important;">Isi Dokumen Pemberitahuan Adanya Risiko Yang Harus Disampaikan Oleh Pialang Berjangka (DPAR) ;<br /><span class="labeling">the contents of Risk Disclosure Documents Presented By Broker (DPAR);</span></li>
                                                            <li style="margin-bottom: 0px !important;">isi Perjanjian Pemberian Amanat ; dan<br /><span class="labeling">the contents of the Mandate Agreement; and</span></li>
                                                            <li style="margin-bottom: 0px !important;">istilah-istilah dalam perdagangan berjangka.<br /><span class="labeling">terms in futures trading.</span></li>
                                                        </ol>
                                                    </li>
                                                    <li>Memahami dan mengerti   :<br /><span class="labeling">Fully Understood</span>
                                                        <ol type="a">
                                                            <li style="margin-bottom: 0px !important;">isi Dokumen Pemberitahuan Adanya Risiko Yang Harus Disampaikan Oleh Pialang Berjangka (DPAR) ;<br /><span class="labeling">the contents of Risk Disclosure Documents Presented By Broker (DPAR);</span></li>
                                                            <li style="margin-bottom: 0px !important;">isi Perjanjian Pemberian Amanat ; dan<br /><span class="labeling">the contents of the Mandate Agreement; and</span></li>
                                                            <li style="margin-bottom: 0px !important;">istilah-istilah dalam perdagangan berjangka.<br /><span class="labeling">terms in futures trading.</span> </li>
                                                        </ol>
                                                    </li>
                                                    <li>Mengisi Aplikasi Pembukaan Rekening Transaksi dan semua informasi serta dokumen pendukung lainnya adalah benar dan tepat sesuai dengan aslinya dan saya akan bertanggungjawab penuh apabila dikemudian hari terjadi sesuatu hal yang sehubungan dengan ketidak benaran data yang diberikan.
                                                        <br /><span class="labeling">Filled the Trading Account Opening Application and that all information and other supporting documents submitted are true and correct in accordance with the original, and I will be fully responsible if something happens in the future with respect to the untruth data given.</span></li>
                                                    <li>Memahami, mengerti dan mengetahui apabila ada ketidaklengkapan pada pengisian Aplikasi Pembukaan Rekening adalah atas kehendak saya sendiri dan saya akan bertanggungjawab penuh apabila dikemudian hari terjadi sesuatu hal yang sehubungan dengan ketidaklengkapan pada pengisian aplikasi  tersebut
                                                        <br /><span class="labeling">Understood and known that when there is incompleteness in filling the Account Opening Application is of my own will and I will be fully responsible if something happens in the future with respect to the incompleteness in filling the application</span></li>
                                                    <li>Memahami dan telah mendapat penjelasan mengenai mekanisme transaksi perdagangan berjangka yang akan saya lakukan sendiri.
                                                        <br /><span class="labeling">Understood and have been briefed on the mechanism of futures trading that I would do by myself.</span></li>
                                                    <li>Memahami dan mengerti tentang tata cara bertransaksi perdagangan berjangka dan juga telah melakukan simulasi transaksi perdagangan berjangka pada PT Topgrowth Futures.
                                                        <br /><span class="labeling">Understood the procedures to conduct the futures trading transaction and also have conducted simulated futures trading at PT Topgrowth Futures.</span></li>
                                                    <li>Mengetahui, memahami, mengerti, menerima dan menyetujui ketentuan-ketentuan yang ada pada Trading Rules.
                                                        <br /><span class="labeling">Known, understood, accepted and agreed to the provisions contained in the Trading Rules.</span></li>
                                                    <li>Memahami dan mengerti bahwa dalam bertransaksi perdagangan Berjangka disamping mempunyai peluang keuntungan yang besar tetapi juga mempunyai resiko kerugian sebagaimana yang disebutkan di dalam Dokumen Pemberitahuan Adanya Resiko.
                                                        <br /><span class="labeling">Understood that besides having great profit opportunities, futures trading transaction also have the risk of loss as mentioned in the Risk Disclosure Documents.</span></li>
                                                    <li>Memahami dan mengerti bahwa untuk melakukan transaksi di Perdagangan Berjangka, saya harus menempatkan sejumlah dana/margin dan berkewajiban memelihara kecukupan margin tersebut dalam melakukan transaksi, sehingga sewaktu-waktu bisa saja saya berkewajiban untuk menambah sejumlah dana/margin untuk memelihara posisi terbuka saya.
                                                        <br /><span class="labeling">Understood that to do transactions in Futures Trading, I need to put some funds / margin and obliged to maintain the margin requirement of the transaction, so that at any time I might need to add some funds / margin to maintain my positions.</span></li>
                                                    <li>Memahami, mengerti dan mengetahui kegunaan / fungsi dari sistem Cabinet (Investor Management System) selain untuk melakukan registrasi online, juga berfungsi untuk melakukan segala sesuatu yang berhubungan dengan setoran dana maupun penarikan dana
                                                        <br /><span class="labeling">Understood and known that the use / function of the Cabinet system (Investor Management System) in addition to online registration, is also to serve everything related to the deposit of funds and withdrawals.</span></li>
                                                    <li>Mengetahui dan memahami bahwa password pada platform trading bersifat rahasia dan hanya diberikan kepada saya sebagai nasabah.
                                                        <br /><span class="labeling">Knowing and understanding that the password used on the trading platform is confidential and only given to me as a client.</span></li>
                                                    <li>Mengetahui, memahami dan menyetujui bahwa transaksi dilaksanakan melalui sistem online/elektronik sehingga apabila password tersebut jatuh/diberikan kepada pihak lain sekalipun pegawai PT Topgrowth Futures, maka hal tersebut menjadi tanggujawab saya sepenuhnya sebagai nasabah.
                                                        <br /><span class="labeling">Known, understood and agreed that the transaction was executed through the online system / selectronics so that when the password fell to other parties’ hand and / or provided to other parties even if it is employees of PT Topgrowth Futures, then it becomes entirely my responsibility as client.</span></li>
                                                    <li>Mengetahui, mengerti dan memahami bahwa PT Topgrowth Futures tidak pernah mengeluarkan, menawarkan, menjanjikan, memberikan harapan, mengiming-imingi atau melakukan tindakan-tindakan yang pada intinya menjanjikan keuntungan tetap (fixed income) atau bagi hasil (profit sharing) atau janji pasti untung (profit guarantee) kepada siapapun baik kepada saya sebagai calon nasabah atau sebagai nasabah maupun pihak-pihak lain untuk melakukan investasi berjangka pada PT Topgrowth Futures. 
                                                        <br /><span class="labeling">Known, understood and acknowledged that PT Topgrowth Futures never issuing, offering, promising, giving hope, lure or perform actions that are essentially promising a fixed income or for profit sharing or profit guarantee to me as a prospective client or as client and to other parties to invest in PT Topgrowth futures.</span></li>
                                                    <li>Mengetahui, mengerti dan memahami apabila dikemudian hari saya melakukan tindakan-tindakan sebagaimana yang disebutkan pada poin 13 dan 14, maka hal tersebut sepenuhnya menjadi tanggungjawab saya sebagai nasabah dan tidak melibatkan PT Topgrowth Futures dalam permasalahan dimaksud.
                                                        <br /><span class="labeling">Known and understood that if in the future I do or accept the acts mentioned in points 13 and 14, then it will become entirely my responsibility as a client and will not involve PT Topgrowth Futures on issues referred.</span> </li>
                                                    <li>Mengetahui, memahami dan mengerti bahwa transaksi yang akan saya lakukan berada dalam mekanisme Sistem Perdagangan Alternatif (SPA) untuk produk Forex, Stodex dan Loco London Gold, dimana PT TOPGROWTH FUTURES sebagai Pialang (peserta SPA) dan PT PROLINDO BUANA SEMESTA sebagai Pedagang (penyelenggara SPA).<br /> PT TOPGROWTH FUTURES hanya sebagai Pialang yang menyediakan fasilitas dan informasi yang mendukung nasabah bertransaksi dan keputusan sepenuhnya ada pada saya sebagai nasabah.
                                                        <br /><span class="labeling">Known, comprehended and understood that the transaction I will do is in the mechanism of Alternative Trading System (SPA) for Forex products, Stodex and Loco London Gold, where PT TOPGROWTH FUTURES is as Broker (participant of SPA) and PT Prolindo BUANA SEMESTA is as Traders ( provider of SPA).<br /> PT TOPGROWTH FUTURES is only as a broker to provide facilities and information that support customer transactions, whereas decision is entirely on me as a clien </span></li>
                                                    <li>Membaca, memahami dan mengerti semua pernyataan-pernyataan tersebut diatas poin (1-16) secara jujur dan sebenar-benarnya dalam keadaan sadar, sehat jasmani dan rohani serta tanpa paksaan apapun dari pihak manapun.
                                                        <br /><span class="labeling">Read and understood all the statements above mentioned in points 1-16 honestly, truthfully, in a conscious state, physically and mentally healthy and without any coercion from any party.</span></li>
                                                </ol>

                                                <p style="border-top:1px solid #ccc;padding-top:5px;text-align:center">
                                                    <label for="RealAccountWaiverClientAccept" style="position: relative; top: -3px; font-weight: bold; cursor: pointer;">
                                                        <input type="hidden" name="data[RealAccountWaiverClient][accept]" id="RealAccountWaiverClientAccept_" value="0"/><input type="checkbox" name="RealAccountWaiverClientAccept"  class="form-control" value="1" id="RealAccountWaiverClientAccept"/>        Dengan ini saya menyatakan telah membaca, mengerti, memahami dan menyetujui <b>seluruh</b> pernyataan di atas dan segala hal yang timbul akan menjadi tanggungjawab saya sepenuhnya.
                                                        <br /><span class="labeling">I certify that I have read, understood and agreed with all the above and all matters arising will be entirely my responsibility.</span>
                                                    </label>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <p>&nbsp;</p>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-o back-step btn-wide pull-left" id="prevBtn" name="prevBtn">
                                            <i class="fa fa-circle-arrow-left"></i> Back
                                        </button>
                                        <button id="btn_step8" name="btn_step8" class="btn btn-primary btn-o next-step btn-wide pull-right">
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

    $('#btn_step8').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step8_update')?>",
            type: "POST",
            data: $('#frm8').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/myaccount')?>";
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
        window.location.href = "<?php echo site_url('accounts/real_accounts/step7')?>";
    });


</script>