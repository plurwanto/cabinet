<?php
if (!empty($fileList)) {

    $companyname = $fileList->CompanyName;
    $companyaddress = $fileList->CompanyAddress;
    $companyphone = $fileList->CompanyPhone;
    $companymail = $fileList->CompanyMail;
    $companylogo = $fileList->CompanyLogo;
    $mailprotocol = $fileList->MailProtocol;
    $mailhost = $fileList->MailHost;
    $mailname = $fileList->MailName;
    $mailuser = $fileList->MailUser;
    $mailpass = $fileList->MailPass;
    $mailport = $fileList->MailPort;
}
?>
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <?php
            $msg = $this->session->flashdata('msg');
            if ($msg)
                echo $msg;
            ?>
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">System Configuration</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" id="frmsysconfig" action="<?php echo base_url();?>settings/sysconfig/update" enctype="multipart/form-data">
                        <div class="col-lg-6 col-md-12">
                            <fieldset>
                                <legend>Company Information</legend>
                                <div class="form-group">
                                    <input type="hidden" name="img_exist" id="img_exist" value="<?=$companylogo;?>">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <?php
                                            if (empty($companylogo)) {
                                                ?>
                                                <img src="<?php echo base_url();?>assets/images/no_image.png" alt="photo" id="noimage">
                                            <?php } else {?>
                                                <img src="<?php echo base_url('uploads/logo/') . $companylogo;?>" alt="photo" id="noimage">
                                            <?php }?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo" accept="image/*"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>

                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Company Name
                                    </label>
                                    <input type="text" class="form-control" id="company" name="company" value="<?=$companyname;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Address
                                    </label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?=$companyaddress;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Phone
                                    </label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?=$companyphone;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Email
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?=$companymail;?>">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <fieldset>
                                <legend>Mail Setup</legend>
                                <div class="form-group">
                                    <label>
                                        SMTP Protocol
                                    </label>
                                    <input type="text" class="form-control" id="mailprotocol" name="mailprotocol" value="<?=$mailprotocol;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        SMTP Host
                                    </label>
                                    <input type="text" class="form-control" id="mailhost" name="mailhost" value="<?=$mailhost;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Email Name
                                    </label>
                                    <input type="text" class="form-control" id="mailname" name="mailname" value="<?=$mailname;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Email Address
                                    </label>
                                    <input type="text" class="form-control" id="mailaccount" name="mailaccount" value="<?=$mailuser;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Email Password
                                    </label>
                                    <input type="text" class="form-control" id="mailpassword" name="mailpassword" value="<?=$mailpass;?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                        SMTP Port
                                    </label>
                                    <input type="text" class="form-control" id="port" name="port" value="<?=$mailport;?>">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <button type="submit" class="btn btn-o btn-info">
                                <i class="ti-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
