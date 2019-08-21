<?php
if (!empty($show)) {
    $doc_number = $show->document_number;
    $confirm_accept = $show->step7_accept;
    $fullName = $show->FullName;
    $birthday = $show->BirthDay;
    $birth_place = $show->birth_place;
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
                                <form action="" method="POST" name="frm7" id="frm7" class="smart-wizard">
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
                                                    <div class="stepNumber animated tada">
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


                                            <div class="col-md-8 col-sm-6">Formulir Nomor 107.BPK.07</div> 
                                            <div class="col-md-4 col-sm-6">
                                                <table class="table">
                                                    <tr>
                                                        <td>Lampiran</td>
                                                        <td>:</td>
                                                        <td>Peraturan Kepala Badan Pengawas</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>Perdagangan Berjangka Komoditi</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>Nomor: 107/BAPPEBTI/PER/11/2013</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <p class="text-center"><strong>PERNYATAAN BERTANGGUNG JAWAB ATAS</strong></p>
                                                <p class="text-center"><strong>KODE AKSES TRANSAKSI NASABAH <i>(Personal Access Password)</i></strong></p>
                                                <p class="text-center"><span class="labeling">STATEMENT ON RESPONSIBILITY FOR<br />TRANSACTIONS ACCESS CODE (Personal Access Password) </span></p>
                                                <p>Yang mengisi formulir di bawah ini:<br/><span class="labeling">I,hereby :</span></p>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-sm-12 control-label">Nama Lengkap<br /><span class="labeling">Full Name </span></label>
                                                        <div class="col-md-4 col-sm-12">
                                                            <?=$fullName;?>                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-sm-12 control-label">Tempat, Tgl Lahir<br /><span class="labeling">Place, Birth Date</span></label>
                                                        <div class="col-md-4 col-sm-12">
                                                            <?=$birth_place . ", " . date('d-m-Y', strtotime($birthday));?>               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-sm-12 control-label">Alamat Rumah<br /><span class="labeling">Home Address</span></label>
                                                        <div class="col-md-4 col-sm-12">
                                                            <?=$address;?>               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-sm-12 control-label">Kode Pos<br /><span class="labeling">Postal Code</span></label>
                                                        <div class="col-md-4 col-sm-12">
                                                            <?=$zipcode;?>               
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-sm-12 control-label">No. PASSPORT / passport<br /><span class="labeling">Identity Number</span></label>
                                                        <div class="col-md-4 col-sm-12">
                                                            <?=$identity_number;?>               
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>
                                                    Dengan mengisi kolom "YA" di bawah ini, saya menyatakan bahwa saya bertanggungjawab
                                                    sepenuhnya terhadap kode akses transaksi Nasabah <i>(Personal Access Password)</i>
                                                    dan tidak menyerahkan kode akses transaksi Nasabah <i>(Personal Access Password)</i> ke pihak lain, 
                                                    terutama kepada pegawai Pialang Berjangka atau pihak yang memiliki kepentingan dengan
                                                    Pialang Berjangka.
                                                    <br /><span class="labeling">By filling in the column "YES" below, I declare that I am fully responsible for the Transaction Access Code (Personal Access Password) and will not handover this Transaction Access Code (Personal Access Password) to others, especially to the Futures Brokerage Company�s employees or parties involved to the Company.</span>
                                                </p>
                                                <div class="alert alert-danger text-center">
                                                    <strong>PERHATIAN !!!</strong>
                                                    <br /><span class="labeling">ATTENTION !!!</span>
                                                    <br>
                                                    Pialang Berjangka, Wakil Pialang Berjangka, pegawai pialang berjangka, atau pihak yang
                                                    memiliki kepentingan dengan Pialang Berjangka dilarang menerima kode akses transaksi
                                                    Nasabah <i>(Personal Access Password)</i>.
                                                    <br /><span class="labeling">Futures Brokerage Company, Licensed Brokers, Futures Brokerage Company�s employee, or parties involved to Brokerage Company are prohibited from receiving Transaction Access Code (Personal Access Password).</span>
                                                </div>

                                                <p>
                                                    Demikianlah surat pernyataan ini dibuat dengan sebenarnya dalam keadaan sadar, 
                                                    sehat jasmani dan rohani serta tanpa paksaan apapun dari pihak manapun.
                                                    <br /><span class="labeling">Thus I draw this Statement in a conscious conditions, physically and mentally healthy and without any coercion from any party.</span>
                                                </p>
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-12">
                                                        Pernyataan Menerima/Tidak<br /><span class="labeling">Receive statement / Not</span>            </div>
                                                    <div class="col-md-8 col-sm-12">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="RealAccountAccessResponsibilityAccept" id="RealAccountAccessResponsibilityAccept1" value="1" required="required" <?php
                                                            if (!empty($show)) {
                                                                if ($confirm_accept == "1") {
                                                                    echo " checked ";
                                                                } else {
                                                                    echo "";
                                                                }
                                                            }
                                                            ?>/>Ya<br /><span class="labeling">Yes</span>                </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="RealAccountAccessResponsibilityAccept" id="RealAccountAccessResponsibilityAccept0" value="0" required="required" />Tidak <br /><span class="labeling">No</span>                </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        Pernyataan Pada Tanggal            </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        02-03-2018            </div>
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
                                        <button id="btn_step7" name="btn_step7" class="btn btn-primary btn-o next-step btn-wide pull-right">
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

    $('#btn_step7').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step7_update')?>",
            type: "POST",
            data: $('#frm7').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/step8')?>";
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
        window.location.href = "<?php echo site_url('accounts/real_accounts/step6')?>";
    });


</script>