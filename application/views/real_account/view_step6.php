<?php
if (!empty($show)) {
    $doc_number = $show->document_number;
    $confirm_accept = $show->step6_accept;
    $checked = ($confirm_accept == "1" ? " checked " : "");
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
                                <form action="" method="POST" name="frm6" id="frm6" class="smart-wizard">
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
                                                    <div class="stepNumber animated tada">
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

                                            <p>
                                                Dengan mengisi kolom "YA" di bawah ini, saya menyatakan bahwa saya telah membaca dan menerima informasi <strong>PROFIL PERUSAHAAN PIALANG BERJANGKA</strong>, mengerti dan memahami isinya.<br/> <span class="labeling">By filling in the "Yes" below, I confirm that I have read and accepted FUTURES BROKERAGE COMPANY PROFILE information, know and understand its contents.</span>        </p>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-12">
                                                    Pernyataan Menerima<br /><span class="labeling">Receive statement</span>            </div>
                                                <div class="col-md-8 col-sm-12">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="RealAccountCompanyProfileAccept" id="RealAccountCompanyProfileAccept1" value="1" required="required" <?php
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
                                                        <input type="radio" name="RealAccountCompanyProfileAccept" id="RealAccountCompanyProfileAccept0" value="0" required="required" />Tidak<br/><span class="labeling">No</span>                </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-12">
                                                    Menyatakan Pada Tanggal<br /><span class="labeling">Stating By Date</span>            </div>
                                                <div class="col-md-8 col-sm-12">
                                                    02-03-2018            </div>
                                            </div>
                                        </div>

                                    </div>
                                    <p></p>
                                    <p>&nbsp;</p>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-o back-step btn-wide pull-left" id="prevBtn" name="prevBtn">
                                            <i class="fa fa-circle-arrow-left"></i> Back
                                        </button>
                                        <button id="btn_step6" name="btn_step6" class="btn btn-primary btn-o next-step btn-wide pull-right">
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

    $('#btn_step6').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step6_update')?>",
            type: "POST",
            data: $('#frm6').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/step7')?>";
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
        window.location.href = "<?php echo site_url('accounts/real_accounts/step5')?>";
    });


</script>