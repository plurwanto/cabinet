<?php
if (!empty($show)) {
    $doc_number = $show->document_number;
    $confirm_accept = $show->step3_accept;
    $step3_accounts_type = $show->step3_accounts_type;
    $step3_accounts_platform = $show->step3_accounts_platform;
    $step3_accounts_product = $show->step3_accounts_product;

    $fullName = $show->FullName;
    $birthday = $show->BirthDay;
    $birth_place = $show->birth_place;
    $address = $show->Address;
    $zipcode = $show->ZipCode;
    $identity_number = $show->identity_number;

    $investment_experience = ($show->investment_experience == "1" ? "Ya, " . $show->areas_of_investment : "Tidak" );
    $account_purpose = ($show->account_purpose == "lainnya" ? $show->account_purpose_info : $show->account_purpose);
    $npwp = $show->npwp;
    $gender = ($show->Gender == "M" ? "laki-laki" : "Perempuan");
    $marital_status = $show->marital_status;
    $spouse = $show->spouse;
    $mother = $show->mother;
    $HomePhoneNumber = $show->HomePhoneNumber;
    $MobilePhoneNumber = $show->MobilePhoneNumber;
    $home_ownership = ($show->home_ownership == "lainnya" ? $show->home_ownership_info : $show->home_ownership);
    $FaxNumber = $show->FaxNumber;

    $have_family_in = $show->have_family_in;
    $bankruptcy = $show->bankruptcy;

    $name_emergency = $show->name;
    $phone_number_emergency = $show->phone_number;
    $relationship_emergency = $show->relationship;
    $address_emergency = $show->address;
    $zip_code_emergency = $show->zip_code;

    $work = ($show->work == "lainnya" ? $show->work_info : $show->work);
    $company_name_work = $show->company_name;
    $line_of_business_work = $show->line_of_business;
    $position_work = $show->position;
    $working_period_work = $show->working_period;
    $ex_working_period_work = $show->ex_working_period;
    $office_address_work = $show->office_address;
    $zip_code_work = $show->zip_code;
    $phone_number_work = $show->phone_number;
    $facsimile_number_work = $show->facsimile_number;

    $income_per_year_id = $show->income_per_year_id;
    $home_location = $show->home_location;
    $value_svto = $show->value_svto;
    $bank_deposits = $show->bank_deposits;
    $total = $show->total;
    $other = $show->other;

    $BankId = $show->BankId;
    $RekNumber = $show->RekNumber;
    $RekName = $show->RekName;
    $Description = $show->Description;
    $Status = $show->Status;

    $photo_profile = $show->photo_profile;
    $photo_identity = $show->photo_identity;
    $photo_bank_account = $show->photo_bank_account;
    $photo_additional1 = $show->photo_additional1;
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
                                <form action="" method="POST" name="frm3" id="frm3" class="smart-wizard">
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
                                                    <div class="stepNumber animated tada">
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
                                        <div class="row">
                                            <input type="hidden" name="new_doc" id="new_doc" value="<?=$kode;?>">
                                            <input type="hidden" name="old_doc" id="old_doc" value="<?=$doc_number;?>">
                                            <div class="col-md-8 col-sm-6">Formulir Nomor 107.BPK.03</div> 
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
                                            <p>&nbsp;</p>
                                            <div class="col-md-12 col-sm-12">
                                                <p class="text-center"><strong>APLIKASI PEMBUKAAN REKENING TRANSAKSI</strong></p>
                                                <p class="text-center"><strong>SECARA ELEKTRONIK ON-LINE</strong></p>
                                                <p class="text-center"><strong><span class="labeling">APPLICATION DUE ACCOUNT OPENING<br/>ELECTRONIC ON-LINE</span></strong></p>
                                            </div>
                                            <div class="col-md-8 col-sm-4">
                                                <div class="form-group">
                                                    <label for="RealAccountAccountTypeId" class="col-md-4 col-sm-12">Tipe Akun<br/><span class="labeling">Account Type</span></label>
                                                    <div class="col-md-5 col-sm-5">
                                                        <select name="RealAccountAccountTypeId" class="form-control" id="RealAccountAccountTypeId">
                                                            <option value="">-- Select Account Type --</option>
                                                            <?php
                                                            foreach ($list_account_type as $value) {
                                                                $selected = ($step3_accounts_type == $value['id'] ? $selected = ' selected ' : '');
                                                                echo "<option value='" . $value['id'] . "' $selected >" . $value['Name'] . " </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-4">
                                                <div class="form-group">
                                                    <label for="RealAccountPlatformId" class="col-md-4 col-sm-12">Platform<br/><span class="labeling">Platform</span></label>
                                                    <div class="col-md-5 col-sm-12">
                                                        <select name="RealAccountPlatformId" class="form-control" id="RealAccountPlatformId" required="required">
                                                            <option value="">-- Select Platform --</option>
                                                            <?php
                                                            foreach ($list_platform as $value) {
                                                                $selected = ($step3_accounts_platform == $value['id'] ? $selected = ' selected ' : '');
                                                                echo "<option value='" . $value['id'] . "' $selected >" . $value['Name'] . " </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-4">
                                                <div class="form-group">
                                                    <label for="RealAccountProductId" class="col-md-4 col-sm-12">Product<br/><span class="labeling">Product</span></label>
                                                    <div class="col-md-5 col-sm-12">
                                                        <select name="RealAccountProductId" class="form-control" id="RealAccountProductId" required="required">
                                                            <option value="">-- Select Platform --</option>
                                                            <?php
                                                            foreach ($list_product as $value) {
                                                                $selected = ($step3_accounts_product == $value['id'] ? $selected = ' selected ' : '');
                                                                echo "<option value='" . $value['id'] . "' $selected >" . $value['Name'] . " </option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 text-right">
                                                Tanggal: 20 February 2018
                                            </div>
                                            <h4>&nbsp;</h4>
                                            <div class="col-md-12 col-sm-12">
                                                <h4>DATA PRIBADI</h4>
                                                <hr>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nama Lengkap<br/><span class="labeling">Full Name</span></label>
                                                        <div class="col-md-6">
                                                            <?=$fullName;?>      
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Tempat, Tgl Lahir<br/><span class="labeling">Place, Birth Date</span></label>
                                                        <div class="col-md-6">
                                                            <?=$birth_place . ", " . date('d-m-Y', strtotime($birthday));?>              
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">No. PASSPORT / passport<br/><span class="labeling">Identity Number</span></label>
                                                        <div class="col-md-6">
                                                            <?=$identity_number;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pengalaman Investasi<br/><span class="labeling">Investment Experience</span></label>
                                                        <div class="col-md-6">
                                                            <?=$investment_experience;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Tuj. Buka Rekening<br/><span class="labeling">Purpose of Account Opening </span></label>
                                                        <div class="col-md-6">
                                                            <?=$account_purpose;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">NPWP<br/><span class="labeling">NPWP</span></label>
                                                        <div class="col-md-6">
                                                            <?=$npwp;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Jenis Kelamin<br/><span class="labeling">Gender</span></label>
                                                        <div class="col-md-6">
                                                            <?=$gender;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Status Perkawinan<br/><span class="labeling">Marital Status</span></label>
                                                        <div class="col-md-6">
                                                            <?=$marital_status;?>                                                                     
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nama Suami/Istri<br/><span class="labeling">Name of Husband / Wife</span></label>
                                                        <div class="col-md-6">
                                                            <?=$spouse;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Ibu Kandung<br/><span class="labeling">Mother s Maiden Name</span></label>
                                                    <div class="col-md-6">
                                                        <?=$mother;?>
                                                        Ca             
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat Rumah<br/><span class="labeling">Home Address</span></label>
                                                    <div class="col-md-6">
                                                        <?=$address;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Kode Pos<br/><span class="labeling">Postal Code</span></label>
                                                    <div class="col-md-6">
                                                        <?=$zipcode;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Status Rumah<br/><span class="labeling">HOme Status</span></label>
                                                    <div class="col-md-6">
                                                        <?=$home_ownership;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">No. Telp Rumah<br/><span class="labeling">Phone Number</span></label>
                                                    <div class="col-md-6">
                                                        <?=$HomePhoneNumber;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">No. Faksimili Rumah<br/><span class="labeling">Facsimile</span></label>
                                                    <div class="col-md-6">
                                                        <?=$FaxNumber;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">No. Handphone<br/><span class="labeling">Mobile Number</span></label>
                                                    <div class="col-md-6">
                                                        <?=$MobilePhoneNumber;?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <hr>
                                                <div class="col-md-8 col-sm-8">Memiliki anggota keluarga yang bekerja di BAPPEBTI/Bursa Berjangka/Kliring Berjangka?  <br/><span class="labeling">Having a family member who worked in BAPPEBTI / Futures Exchange / Clearing House?</span></div>
                                                <div class="col-md-4 col-sm-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="RealAccountProfileHaveFamilyIn" id="RealAccountProfileHaveFamilyIn0" disabled="disabled" value="0" <?php if ($have_family_in == "0") echo " checked ";?> />Tidak            </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="RealAccountProfileHaveFamilyIn" id="RealAccountProfileHaveFamilyIn1" disabled="disabled" value="1" <?php if ($have_family_in == "1") echo " checked ";?>/>Ya            </label>
                                                </div>

                                                <div  class="col-md-8 col-sm-8">Apakah anda telah dinyatakan pailit oleh pengadilan?  <br/><span class="labeling">Do you have been declared bankrupt by the court?</span></div>
                                                <div class="col-md-4 col-sm-4">

                                                    <label class="radio-inline">
                                                        <input type="radio" name="data[RealAccountProfile][bankruptcy]" id="RealAccountProfileBankruptcy0" disabled="disabled" value="0" <?php if ($bankruptcy == "0") echo " checked ";?> />Tidak            </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="data[RealAccountProfile][bankruptcy]" id="RealAccountProfileBankruptcy1" disabled="disabled" value="1" <?php if ($bankruptcy == "1") echo " checked ";?> />Ya            </label>
                                                </div>
                                            </div>

                                        </div>

                                        <h4>&nbsp;</h4>
                                        <div class="col-md-12 col-sm-12">
                                            <h4>PIHAK YANG DIHUBUNGI DALAM KEADAAN DARURAT<br /><span class="labeling">CONTACT THE PARTY IN AN EMERGENCY</span></h4>
                                            <hr>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Lengkap<br/><span class="labeling">Full Name</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$name_emergency;?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nomor Telepon<br/><span class="labeling">Phone Number</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$phone_number_emergency;?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Hubungan<br/><span class="labeling">Relationship</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$relationship_emergency;?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat Rumah<br/><span class="labeling">Home Address</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$address_emergency;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Kode Pos<br/><span class="labeling">Postal Code</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$zip_code_emergency;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4>&nbsp;</h4>
                                        <div class="col-md-12 col-sm-12">
                                            <h4>PEKERJAAN<br/><span class="labeling">Jobs Information</span></h4>
                                            <hr>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Pekerjaan<br/><span class="labeling">Occupation</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$work;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Perusahaan<br/><span class="labeling">Company Name</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$company_name_work;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Bidang Usaha<br/><span class="labeling">Business Field</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$line_of_business_work;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jabatan<br/><span class="labeling">Title</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$position_work;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Lama Bekerja<br/><span class="labeling">Length of work</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$working_period_work;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Di Kantor Sebelumnya<br/><span class="labeling">Length of Work in Previous Office</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$ex_working_period_work;?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat<br/><span class="labeling">Address</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$office_address_work;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Kode Pos<br/><span class="labeling">Postal Code</span></label>
                                                    <div class="col-md-6 col-sm-12">


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Telepon Kantor<br/><span class="labeling">Office Phone</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$phone_number_work;?>     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Fax Kantor<br/><span class="labeling">Fax Number</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$facsimile_number_work;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4>&nbsp;</h4>

                                        <div class="col-md-12 col-sm-12">
                                            <h4>Daftar Kekayaan<br/><span class="labeling">List of Wealth</span></h4>
                                            <hr>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Penghasilan Per Tahun<br/><span class="labeling">Annual Income</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$income_per_year_id;?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">&nbsp;</div>
                                            <div class="col-md-12 col-sm-12">
                                                <p><strong>Daftar Kekayaan</strong></p>
                                            </div>


                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Rumah Lokasi<br/><span class="labeling">Home Location</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$home_location;?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nilai NJOP<br/><span class="labeling">HOuse Tax Value</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$value_svto;?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Deposit Bank<br/><span class="labeling">Time Deposit</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$bank_deposits;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jumlah <br/><span class="labeling">Total</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$total;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Lainnya<br/><span class="labeling">The Other</span></label>
                                                    <div class="col-md-6 col-sm-12">
                                                        <?=$other;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                            </div>
                                        </div>

                                        <h4>&nbsp;</h4>
                                        <div class="col-md-12 col-sm-12">
                                            <h4>Bank<br/><span class="labeling">Bank Information</span></h4>
                                            <hr>

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nama Bank<br/><span class="labeling">Bank</span></label>
                                                        <div class="col-md-6 col-sm-12">

                                                            wwwwwwwww                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Cabang<br/><span class="labeling">Branch</span></label>
                                                        <div class="col-md-6 col-sm-12">

                                                            wwwwwwww                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nomor Telepon<br/><span class="labeling">Phone Number</span></label>
                                                        <div class="col-md-6 col-sm-12">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Nomor Account<br/><span class="labeling">Account Number</span></label>
                                                        <div class="col-md-6 col-sm-12">
                                                            <?=$RekNumber;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Atas Nama<br/><span class="labeling">Account Name</span></label>
                                                        <div class="col-md-6 col-sm-12">
                                                            <?=$RekName;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Swift Code<br/><span class="labeling">Swift Code</span></label>
                                                        <div class="col-md-6 col-sm-12">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Jenis Tabungan<br/><span class="labeling">Account Type</span></label>
                                                        <div class="col-md-6 col-sm-12">

                                                            Giro                          
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>
                                        </div>

                                        <h4>&nbsp;</h4>
                                        <div class="col-md-12 col-sm-12">
                                            <h4>DOKUMEN YANG DILAMPIRKAN<br /><span class="labeling">Required Document</span></h4>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <label class="control-label">Foto Terkini<br/><span class="labeling">Update Foto</span></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
                                                        <?php
                                                        if (empty($photo_profile)) {
                                                            ?>
                                                            <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_profile" id="noimage">
                                                        <?php } else {?>
                                                            <img src="<?php echo base_url('uploads/profile/') . $photo_profile;?>" alt="photo_profile" id="noimage">
                                                        <?php }?>
                                                    </div>                        
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <label class="control-label">KTP/SIM/PASSPORT<br/><span class="labeling">Identity Type : KTP/SIM/PASSPORT</span></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
                                                        <?php
                                                        if (empty($photo_identity)) {
                                                            ?>
                                                            <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_identity" id="noimage">
                                                        <?php } else {?>
                                                            <img src="<?php echo base_url('uploads/profile/') . $photo_identity;?>" alt="photo_identity" id="noimage">
                                                        <?php }?>
                                                    </div>                           
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <label class="control-label">Rekening Koran Bank(3 Bulan Terakhir )/ Tagihan Kartu Kredit/ Rekening Listrik/ Telepon<br/><span class="labeling">Bank Current Account (3 Months) / Credit Card / Account Electricity / Phone</span></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
                                                        <?php
                                                        if (empty($photo_bank_account)) {
                                                            ?>
                                                            <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_bank_account" id="noimage">
                                                        <?php } else {?>
                                                            <img src="<?php echo base_url('uploads/profile/') . $photo_bank_account;?>" alt="photo_bank_account" id="noimage">
                                                        <?php }?>
                                                    </div>                           
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <label class="control-label">Dokumen Tambahan<br/><span class="labeling">Additional Documents</span></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
                                                        <?php
                                                        if (empty($photo_additional1)) {
                                                            ?>
                                                            <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_additional1" id="noimage">
                                                        <?php } else {?>
                                                            <img src="<?php echo base_url('uploads/profile/') . $photo_additional1;?>" alt="photo_additional1" id="noimage">
                                                        <?php }?>
                                                    </div>                                 
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12">
                                                <p class="help-block">File gambar tipe jpg atau png, dengan ukuran maksimal 512KB per file.<br/><span class="labeling">The image file types jpg or png, with a maximum size of 512KB per file.</span></p>
                                            </div>
                                        </div>
                                        <h4>&nbsp;</h4>
                                        <div class="col-md-12 col-sm-12">
                                            <p><strong>PERNYATAAN KEBENARAN DAN TANGGUNG JAWAB<br/><span class="labeling">STATEMENT OF TRUTH AND RESPONSIBILITY</span></strong></p>
                                            <p>
                                                Dengan mengisi kolom "YA" di bawah ini, saya menyatakan bahwa semua informasi dan semua dokumen yang saya lampirkan dalam APPLIKASI PEMBUKAAN REKENING TRANSAKSI SECARA ELEKTRONIK ON-LINE adalah benar dan tepat, Saya akan bertanggung jawab penuh apabila dikemudian hari terjadi sesuatu hal sehubungan dengan ketidakbenaran data yang saya berikan.<br/><span class="labeling">By filling in the column "YES" below, I certify that all the information and all the documents that I attach in APPLICATION ACCOUNT OPENING TRANSACTION ELECTRONIC ON-LINE is right and proper, I will take full responsibility if in the future something happens in connection with unrighteousness the data that I have provided.</span>        </p>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-12">
                                                    Pernyataan kebenaran dan tanggung jawab <br/><span class="labeling">STATEMENT OF TRUTH AND RESPONSIBILITY</span>            </div>
                                                <div class="col-md-8 col-sm-12">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="RealAccountProfileAccept" id="RealAccountProfileAccept1" value="1" required="required" <?php
                                                        if (!empty($show)) {
                                                            if ($confirm_accept == "1") {
                                                                echo " checked ";
                                                            } else {
                                                                echo "";
                                                            }
                                                        }
                                                        ?>/>Ya<br /><span class="labeling">Yes</span>                
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="RealAccountProfileAccept" id="RealAccountProfileAccept0" value="0" required="required" />Tidak<br /><span class="labeling">No</span>                </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-6">
                                                    Menyatakan Pada Tanggal<br /><span class="labeling">Stating Date</span>            
                                                </div>
                                                <div class="col-md-8 col-sm-6">
                                                    20-02-2018            
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
                                        <button id="btn_step3" name="btn_step3" class="btn btn-primary btn-o next-step btn-wide pull-right">
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

        $("#RealAccountAccountTypeId").change(function () {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('real_accounts/get_data_accountType')?>",
                    cache: false,
                    data: {modul: 'platform', id: value},
                    success: function (respond) {
                        $("#RealAccountPlatformId").html(respond);
                    }
                })
            } else {
                $("#RealAccountPlatformId").html('');
            }
        });
        $("#RealAccountPlatformId").change(function () {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('real_accounts/get_data_platform')?>",
                    cache: false,
                    data: {modul: 'product', id: value},
                    success: function (respond) {
                        $("#RealAccountProductId").html(respond);
                    }
                })
            } else {
                $("#RealAccountProductId").html('');
                $('#RealAccountProductId').prop('disabled', false);
            }
        });
    });

    $('#btn_step3').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step3_update')?>",
            type: "POST",
            data: $('#frm3').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/step4')?>";
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
        window.location.href = "<?php echo site_url('accounts/real_accounts/step2_2')?>";
    });


</script>