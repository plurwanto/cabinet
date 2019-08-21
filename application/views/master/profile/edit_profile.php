<div class="col-sm-12">
    <?php echo $this->session->flashdata('msg');?>
</div>
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable">
                <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                    <li class="active">
                        <a data-toggle="tab" href="#panel_edit_personal">
                            Personal Data
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#panel_edit_bank">
                            Bank Account
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#panel_edit_document">
                            Document Attachment
                        </a>
                    </li>
                </ul>
                <?php
                if (!empty($user_profile)) {
                    $userId = $user_profile[0]['UserId'];
                    $fullName = $user_profile[0]['FullName'];
                    $email = $user_profile[0]['Email'];
                    $Hphone = $user_profile[0]['HomePhoneNumber'];
                    $Mphone = $user_profile[0]['MobilePhoneNumber'];
                    $Wphone = $user_profile[0]['WorkPhoneNumber'];
                    $address = $user_profile[0]['Address'];
                    $provinceId = $user_profile[0]['Province'];
                    $province = $user_profile[0]['prov'];
                    $city = $user_profile[0]['kabupaten'];
                    $cityId = $user_profile[0]['City'];
                    $zipcode = $user_profile[0]['ZipCode'];
                    $birthday = $user_profile[0]['BirthDay'];
                    $religi = $user_profile[0]['Religion'];
                    $fax = $user_profile[0]['FaxNumber'];
                    $birth_place = $user_profile[0]['birth_place'];
                    $identity_type_id = $user_profile[0]['identity_type_id'];
                    $identity_number = $user_profile[0]['identity_number'];
                    $investment_experience = $user_profile[0]['investment_experience'];
                    $areas_of_investment = $user_profile[0]['areas_of_investment'];
                    $account_purpose = $user_profile[0]['account_purpose'];
                    $account_purpose_info = $user_profile[0]['account_purpose_info'];
                    $npwp_flag = $user_profile[0]['npwp_flag'];
                    $npwp = $user_profile[0]['npwp'];
                    $spouse = $user_profile[0]['spouse'];
                    $mother = $user_profile[0]['mother'];
                    $marital_status = $user_profile[0]['marital_status'];
                    $home_ownership = $user_profile[0]['home_ownership'];
                    $have_family_in = $user_profile[0]['have_family_in'];
                    $bankruptcy = $user_profile[0]['bankruptcy'];

                    $day = substr($birthday, 8, 2);
                    $month = substr($birthday, 5, 2);
                    $year = substr($birthday, 0, 4);

                    $kab = $this->profile_model->get_kabupatenById($provinceId);
                }

                $username_emergency = (!empty($user_emergency) ? $user_emergency->name : "");
                $phone_emergency = (!empty($user_emergency) ? $user_emergency->phone_number : "");
                $relation_emergency = (!empty($user_emergency) ? $user_emergency->relationship : "");
                $address_emergency = (!empty($user_emergency) ? $user_emergency->address : "");
                $zipcode_emergency = (!empty($user_emergency) ? $user_emergency->zip_code : "");

                $work_work = (!empty($user_work) ? $user_work->work : "");
                $work_info_work = (!empty($user_work) ? $user_work->work_info : "");
                $company_name_work = (!empty($user_work) ? $user_work->company_name : "");
                $line_of_business_work = (!empty($user_work) ? $user_work->line_of_business : "");
                $position_work = (!empty($user_work) ? $user_work->position : "");
                $working_period_work = (!empty($user_work) ? $user_work->working_period : "");
                $ex_working_period_work = (!empty($user_work) ? $user_work->ex_working_period : "");
                $office_address_work = (!empty($user_work) ? $user_work->office_address : "");
                $zip_code_work = (!empty($user_work) ? $user_work->zip_code : "");
                $phone_number_work = (!empty($user_work) ? $user_work->phone_number : "");
                $facsimile_number_work = (!empty($user_work) ? $user_work->facsimile_number : "");

                $income_list_asset = (!empty($user_list_assets) ? $user_list_assets->income_per_year_id : "");
                $home_location_list_asset = (!empty($user_list_assets) ? $user_list_assets->home_location : "");
                $value_svto_list_asset = (!empty($user_list_assets) ? $user_list_assets->value_svto : "");
                $bank_deposits_list_asset = (!empty($user_list_assets) ? $user_list_assets->bank_deposits : "");
                $total_list_asset = (!empty($user_list_assets) ? $user_list_assets->total : "");
                $other_list_asset = (!empty($user_list_assets) ? $user_list_assets->other : "");

                $photo_profile = (!empty($user_picture) ? $user_picture->photo_profile : "");
                $photo_identity = (!empty($user_picture) ? $user_picture->photo_identity : "");
                $photo_bank_account = (!empty($user_picture) ? $user_picture->photo_bank_account : "");
                $photo_additional1 = (!empty($user_picture) ? $user_picture->photo_additional1 : "");
                $photo_additional2 = (!empty($user_picture) ? $user_picture->photo_additional2 : "");
                $photo_additional3 = (!empty($user_picture) ? $user_picture->photo_additional3 : "");
                ?>
                <div class="tab-content">
                    <div id="panel_edit_personal" class="tab-pane fade in active">
                        <form action="<?php echo base_url();?>master/profile/update_personal" id="form1" name="form1" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend>
                                    Personal Data
                                </legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group err">
                                            <label class="control-label">
                                                Full Name <span class="symbol required"></span>
                                            </label>
                                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?=$userId;?>">
                                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$fullName;?>">
                                            <span class="help-block"></span>
                                        </div>
                                        <label class="control-label">
                                            Place & Date of Birth <span class="symbol required"></span>
                                        </label> 
                                        <div class='row'>
                                            <div class='col-sm-4'>    
                                                <div class='form-group err'>
                                                    <input type="text" name="place" id="place" class="form-control" value="<?=$birth_place;?>">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class='col-sm-2'>    
                                                <div class='form-group err'>
                                                    <select name="dd" id="dd" class="form-control">
                                                        <option value="">Day</option>
                                                        <?php
                                                        for ($i = 1; $i <= 31; $i++) {
                                                            $dd = ($i <= 9 ? "0" . $i : $i);
                                                            $selected = ($i == $day ? $selected = ' selected ' : '');
                                                            echo "<option value='$dd' $selected>" . $i . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-sm-3'>
                                                <div class='form-group err'>
                                                    <select name="mm" id="mm" class="form-control">
                                                        <option value="">Month</option>
                                                        <?php
                                                        $globallib = new globallib();
                                                        for ($i = 1; $i <= 12; $i++) {
                                                            $bulan = $globallib->bulan($i);
                                                            $mm = ($i <= 9 ? "0" . $i : $i);
                                                            $selected = ($i == $month ? $selected = ' selected ' : '');
                                                            echo "<option value='" . $mm . "' $selected>" . $bulan . "</option>";
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class='col-sm-3'>
                                                <div class='form-group err'>
                                                    <select name="yyyy" id="yyyy" class="form-control">
                                                        <option value="">Year</option>
                                                        <?php
                                                        $now = date('Y');
                                                        for ($a = 1900; $a <= $now; $a++) {
                                                            $selected = ($a == $year ? $selected = ' selected ' : '');
                                                            echo "<option value = '" . $a . "' $selected>" . $a . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Identity Number <span class="symbol required"></span>
                                            </label>
                                            <div class='row'>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group'>
                                                        <select name="UserIdentityTypeId" id="UserIdentityTypeId" class="form-control">
                                                            <option value="1" <?php if ($user_profile[0]['identity_type_id'] == "1") echo " selected ";?>>KTP / ID</option>
                                                            <option value="2" <?php if ($user_profile[0]['identity_type_id'] == "2") echo " selected ";?>>SIM / Driving License</option>
                                                            <option value="3" <?php if ($user_profile[0]['identity_type_id'] == "3") echo " selected ";?>>PASSPORT </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group err'>
                                                        <input type="text" name="UserIdentityNumber" id="UserIdentityNumber" class="form-control" value="<?=$identity_number;?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Investment experience <span class="symbol required"></span>
                                            </label>
                                            <div class='row'>
                                                <div class='col-sm-6'>    
                                                    <div class="form-group err">
                                                        <select name="UserInvestmentExperience" id="UserInvestmentExperience" class="form-control">
                                                            <option value="0" <?php if ($user_profile[0]['investment_experience'] == "0") echo " selected ";?>>No</option>
                                                            <option value="1" <?php if ($user_profile[0]['investment_experience'] == "1") echo " selected ";?>>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group err'>
                                                        <input type="text" name="UserAreasOfInvestment" id="UserAreasOfInvestment" class="form-control" value="<?=$areas_of_investment;?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Purpose of Account Opening <span class="symbol required"></span>
                                            </label>
                                            <div class='row'>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group'>
                                                        <select name="UserAccountPurpose" id="UserAccountPurpose" class="form-control">
                                                            <option value="gain" <?php if ($user_profile[0]['account_purpose'] == "gain") echo " selected ";?>>Gain / gain</option>
                                                            <option value="lindung nilai" <?php if ($user_profile[0]['account_purpose'] == "lindung nilai") echo " selected ";?>>Lindung Nilai / hedging</option>
                                                            <option value="spekulasi" <?php if ($user_profile[0]['account_purpose'] == "spekulasi") echo " selected ";?>>Spekulasi / speculation</option>
                                                            <option value="lainnya" <?php if ($user_profile[0]['account_purpose'] == "lainnya") echo " selected ";?>>Lainnya / others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group err'>
                                                        <input type="text" name="UserAccountPurposeInfo" id="UserAccountPurposeInfo" class="form-control" value="<?=$account_purpose_info;?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                NPWP <span class="symbol required"></span>
                                            </label>
                                            <div class='row'>
                                                <div class='col-sm-6'>    
                                                    <div class="form-group err">
                                                        <select name="UserNpwpFlag" id="UserNpwpFlag" class="form-control">
                                                            <option value="0" <?php if ($user_profile[0]['npwp_flag'] == "0") echo " selected ";?>>Tidak / Unavailable</option>
                                                            <option value="1" <?php if ($user_profile[0]['npwp_flag'] == "1") echo " selected ";?>>Ada / Available</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group err'>
                                                        <input type="text" name="UserNpwp" id="UserNpwp" class="form-control" value="<?=$npwp;?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Gender <span class="symbol required"></span>
                                            </label>
                                            <br>
                                            <input type="radio" value="M" name="gender" id="male" <?php if ($user_profile[0]['Gender'] == "M") echo " checked ";?>>
                                            Male
                                            <input type="radio" value="F" name="gender" id="female" <?php if ($user_profile[0]['Gender'] == "F") echo " checked ";?>>
                                            Female
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Marital Status <span class="symbol required"></span>
                                            </label>
                                            <select id="UserMaritalStatus" name="UserMaritalStatus" class="form-control">
                                                <option value="tidak kawin" <?php if ($user_profile[0]['marital_status'] == "tidak kawin") echo " selected ";?>>Unmarried</option>
                                                <option value="kawin" <?php if ($user_profile[0]['marital_status'] == "kawin") echo " selected ";?>>Married</option>
                                                <option value="janda" <?php if ($user_profile[0]['marital_status'] == "janda") echo " selected ";?>>Widow</option>
                                                <option value="duda" <?php if ($user_profile[0]['marital_status'] == "duda") echo " selected ";?>>Widower</option>
                                            </select>
                                        </div>
                                        <div class="form-group err">
                                            <label class="control-label">
                                                Name of Husband / Wife
                                            </label>
                                            <input type="text" class="form-control" id="UserSpouse" name="UserSpouse" value="<?=$spouse;?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group err">
                                            <label class="control-label">
                                                Mother s Maiden Name <span class="symbol required"></span>
                                            </label>
                                            <input type="text" class="form-control" id="UserMother" name="UserMother" value="<?=$mother;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Address <span class="symbol required"></span>
                                            </label>
                                            <textarea class="form-control" name="address" id="address"><?=$address;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Province <span class="symbol required"></span>
                                            </label>
                                            <select class="form-control" id="provinsi" name="provinsi">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($provinsi as $prov) {
                                                    $selected = ($prov['id'] == $provinceId ? $selected = ' selected ' : '');
                                                    echo "<option value='$prov[id]' $selected >$prov[name]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                City <span class="symbol required"></span>
                                            </label>
                                            <select id="kabupaten-kota" name="kabupaten-kota" class="form-control">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($kab as $data) {
                                                    $selected = ($data['id'] == $cityId ? $selected = ' selected ' : '');
                                                    echo "<option value='$data[id]' $selected >$data[name]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Zip Code <span class="symbol required"></span>
                                            </label>
                                            <input class="form-control" type="text" name="zipcode" id="zipcode" value="<?=$zipcode;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                House Ownership
                                            </label>
                                            <div class='row'>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group'>
                                                        <select name="UserHomeOwnership" id="UserHomeOwnership" class="form-control">
                                                            <option value="pribadi" <?php if ($user_profile[0]['home_ownership'] == "pribadi") echo " selected ";?>>Pribadi / own house</option>
                                                            <option value="keluarga" <?php if ($user_profile[0]['home_ownership'] == "keluarga") echo " selected ";?>>Keluarga / family</option>
                                                            <option value="sewa/kontrak" <?php if ($user_profile[0]['home_ownership'] == "sewa/kontrak") echo " selected ";?>>Sewa/Kontrak  / rent</option>
                                                            <option value="lainnya" <?php if ($user_profile[0]['home_ownership'] == "lainnya") echo " selected ";?>>Lainnya / others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group'>
                                                        <input type="text" name="UserHomeOwnershipInfo" id="UserHomeOwnershipInfo" class="form-control" value="<?=$home_ownership;?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-sm-4'>    
                                                <div class='form-group'>
                                                    <label>Home Number</label>
                                                    <input type="text" class="form-control" id="home_number" name="home_number" value="<?=$Hphone;?>">
                                                </div>
                                            </div>
                                            <div class='col-sm-4'>
                                                <div class='form-group'>
                                                    <label>Mobile Number <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?=$Mphone;?>">
                                                </div>
                                            </div>
                                            <div class='col-sm-4'>
                                                <div class='form-group'>
                                                    <label>Work Number</label>
                                                    <input type="text" class="form-control" id="work_number" name="work_number" value="<?=$Wphone;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Fax Number
                                            </label>
                                            <input class="form-control" type="text" name="fax" id="fax" value="<?=$fax;?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">
                                                Religion
                                            </label>
                                            <select id="religion" name="religion" class="form-control">
                                                <option value="ISLAM" <?php if ($user_profile[0]['Religion'] == "ISLAM") echo " selected ";?>>ISLAM</option>
                                                <option value="KRISTEN" <?php if ($user_profile[0]['Religion'] == "KRISTEN") echo " selected ";?>>KRISTEN</option>
                                                <option value="KATOLIK" <?php if ($user_profile[0]['Religion'] == "KATOLIK") echo " selected ";?>>KATOLIK</option>
                                                <option value="HINDU" <?php if ($user_profile[0]['Religion'] == "HINDU") echo " selected ";?>>HINDU</option>
                                                <option value="BUDHA" <?php if ($user_profile[0]['Religion'] == "BUDHA") echo " selected ";?>>BUDHA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Having a family member who worked in BAPPEBTI / Futures Exchange / Clearing House?
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Do you have been declared bankrupt by the court?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="radio" value="0" name="UserHaveFamilyIn" id="UserHaveFamilyIn0" <?php if ($user_profile[0]['have_family_in'] == "0") echo " checked ";?>>
                                            No
                                            <input type="radio" value="1" name="UserHaveFamilyIn" id="UserHaveFamilyIn1" <?php if ($user_profile[0]['have_family_in'] == "1") echo " checked ";?>>
                                            Yes
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" value="0" name="UserBankruptcy" id="UserBankruptcy0" <?php if ($user_profile[0]['bankruptcy'] == "0") echo " checked ";?>>
                                            No
                                            <input type="radio" value="1" name="UserBankruptcy" id="UserBankruptcy1" <?php if ($user_profile[0]['bankruptcy'] == "1") echo " checked ";?>>
                                            Yes
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    CONTACT THE PARTY IN AN EMERGENCY
                                </legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Full Name <span class="symbol required"></span>
                                            </label>
                                            <input class="form-control" type="text" name="UserEmergencyContactName" id="UserEmergencyContactName" value="<?=$username_emergency;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Phone Number <span class="symbol required"></span>
                                            </label>
                                            <input class="form-control" type="text" name="UserEmergencyContactPhoneNumber" id="UserEmergencyContactPhoneNumber" value="<?=$phone_emergency;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Relationship <span class="symbol required"></span>
                                            </label>
                                            <input class="form-control" type="text" name="UserEmergencyContactRelationship" id="UserEmergencyContactRelationship" value="<?=$relation_emergency;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Home Address <span class="symbol required"></span>
                                            </label>
                                            <textarea cols="30" rows="3" class="form-control" name="UserEmergencyContactAddress" id="UserEmergencyContactAddress"><?=$address_emergency;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Postal Code <span class="symbol required"></span>
                                            </label>
                                            <input class="form-control" type="text" name="UserEmergencyContactZipCode" id="UserEmergencyContactZipCode" value="<?=$zipcode_emergency;?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    Jobs Informations
                                </legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Occupation <span class="symbol required"></span>
                                            </label>
                                            <div class='row'>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group'>
                                                        <select name="UserWorkWork" id="UserWorkWork" class="form-control">
                                                            <option value="swasta" <?php if ($work_work == "swasta") echo " selected ";?>>Swasta / employee</option>
                                                            <option value="wiraswasta" <?php if ($work_work == "wiraswasta") echo " selected ";?>>Wiraswasta / businessman</option>
                                                            <option value="ibu rumah tangga" <?php if ($work_work == "ibu rumah tangga") echo " selected ";?>>Ibu Rumah Tangga / housewife</option>
                                                            <option value="profesional" <?php if ($work_work == "profesional") echo " selected ";?>>Profesional / professional</option>
                                                            <option value="pegawai negeri" <?php if ($work_work == "pegawai negeri") echo " selected ";?>>Pegawai Negeri / government employee</option>
                                                            <option value="mahasiswa" <?php if ($work_work == "mahasiswa") echo " selected ";?>>Mahasiswa / student</option>
                                                            <option value="lainnya" <?php if ($work_work == "lainnya") echo " selected ";?>>Lainnya / others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-sm-6'>    
                                                    <div class='form-group'>
                                                        <input type="text" name="UserWorkWorkInfo" id="UserWorkWorkInfo" class="form-control" value="<?=$work_info_work;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Name of Company
                                            </label>
                                            <input class="form-control" type="text" name="UserWorkCompanyName" id="UserWorkCompanyName"  value="<?=$company_name_work;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Business Field
                                            </label>
                                            <input class="form-control" type="text" name="UserWorkLineOfBusiness" id="UserWorkLineOfBusiness" value="<?=$line_of_business_work;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Title
                                            </label>
                                            <input class="form-control" type="text" name="UserWorkPosition" id="UserWorkPosition" value="<?=$position_work;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Length of Services
                                            </label>
                                            <input class="form-control" type="number" name="UserWorkWorkingPeriod" id="UserWorkWorkingPeriod" value="<?=$working_period_work;?>" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Length of Services in Previous Office
                                            </label>
                                            <input class="form-control" type="number" name="UserWorkExWorkingPeriod" id="UserWorkExWorkingPeriod" value="<?=$ex_working_period_work;?>" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Company Address
                                            </label>
                                            <textarea cols="30" rows="3" class="form-control" name="UserWorkOfficeAddress" id="UserWorkOfficeAddress"><?=$office_address_work;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Postal Code
                                            </label>
                                            <input class="form-control" type="text" name="UserWorkZipCode" id="UserWorkZipCode" value="<?=$zip_code_work;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Office Phone Number
                                            </label>
                                            <input class="form-control" type="text" name="UserWorkPhoneNumber" id="UserWorkPhoneNumber" value="<?=$phone_number_work;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Office Fax Number
                                            </label>
                                            <input class="form-control" type="text" name="UserWorkFacsimileNumber" id="UserWorkFacsimileNumber" value="<?=$facsimile_number_work;?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    Wealth List
                                </legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Annual Income
                                            </label>
                                            <div class='form-group'>
                                                <select name="UserListOfAssetIncomePerYearId" id="UserListOfAssetIncomePerYearId" class="form-control">
                                                    <?php
                                                    foreach ($master_income_per_year as $value) {
                                                        $selected = ($income_list_asset == $value['id'] ? $selected = ' selected ' : '');
                                                        echo "<option value='" . $value['id'] . "' $selected >" . $value['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Location of House
                                            </label>
                                            <input class="form-control" type="text" name="UserListOfAssetHomeLocation" id="UserListOfAssetHomeLocation" value="<?=$home_location_list_asset;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                House Tax Value / NJOP
                                            </label>
                                            <input class="form-control" type="text" name="UserListOfAssetValueSvto" id="UserListOfAssetValueSvto" value="<?=$value_svto_list_asset;?>">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Time Deposit
                                            </label>
                                            <input class="form-control" type="text" name="UserListOfAssetBankDeposits" id="UserListOfAssetBankDeposits" value="<?=$bank_deposits_list_asset;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Total 
                                            </label>
                                            <input class="form-control" type="text" name="UserListOfAssetTotal" id="UserListOfAssetTotal" value="<?=$total_list_asset;?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Others 
                                            </label>
                                            <input class="form-control" type="text" name="UserListOfAssetOther" id="UserListOfAssetOther" value="<?=$other_list_asset;?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <span class="symbol required"></span> Required Fields
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <p>
                                        By clicking UPDATE, you are agreeing to the Policy and Terms &amp; Conditions.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-default btn-wide" type="button" id="btn_back" onclick="window.location.href = '<?=base_url();?>master/profile'">
                                        Back <i class="fa fa-arrow-circle-left"></i>
                                    </button>
                                    <button class="btn btn-info btn-wide" id="btn_account" type="submit">
                                        Update <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div id="panel_edit_bank" class="tab-pane fade">
                        <div class="panel panel-white">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">Payment <span class="text-bold">List</span></h4>
                                <div class="panel-tools" >
                                    <button class="btn btn-info btn-sm btn-o add-event" onclick="add_users_bank()"><i class="glyphicon glyphicon-plus"></i> Add New</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="table" class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Bank Name</th>
                                            <th>Account Holder Name</th>
                                            <th>Account Number</th>
                                            <th>Status</th>
                                            <th style="width:80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <div id="panel_edit_document" class="tab-pane fade">
                        <form action="<?php echo base_url();?>master/profile/update_user_picture" id="form_photo" name="form_photo" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" id="user_id_photo" name="user_id_photo" value="<?=$userId;?>">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Update Foto <span class="symbol required"></span>
                                        </label>
                                        <input type="hidden" name="img_exist_photo_profile" id="img_exist_photo_profile" value="<?=$photo_profile;?>">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if (empty($photo_profile)) {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_profile" id="noimage">
                                                <?php } else {?>
                                                    <img src="<?php echo base_url('uploads/profile/') . $photo_profile;?>" alt="photo_profile" id="noimage">
                                                <?php }?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo_profile" accept="image/*"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>
                                                <!--<a href="javascript:void(0)" class="btn btn-default" onclick="delete_photo_profile('<?=$userId;?>');">Remove</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Identity Type : KTP/SIM/PASSPORT <span class="symbol required"></span>
                                        </label>
                                        <input type="hidden" name="img_exist_photo_identity" id="img_exist_photo_identity" value="<?=$photo_identity;?>">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if (empty($photo_identity)) {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_identity" id="noimage">
                                                <?php } else {?>
                                                    <img src="<?php echo base_url('uploads/profile/') . $photo_identity;?>" alt="photo_identity" id="noimage">
                                                <?php }?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo_identity" accept="image/*"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>
                                                <!--<a href="javascript:void(0)" class="btn btn-default" onclick="delete_photo_identity('<?=$userId;?>');">Remove</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Bank Current Account (3 Months) / Credit Card <span class="symbol required"></span>
                                        </label>
                                        <input type="hidden" name="img_exist_photo_bank_account" id="img_exist_photo_bank_account" value="<?=$photo_bank_account;?>">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if (empty($photo_bank_account)) {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo_bank_account" id="noimage">
                                                <?php } else {?>
                                                    <img src="<?php echo base_url('uploads/profile/') . $photo_bank_account;?>" alt="photo_bank_account" id="noimage">
                                                <?php }?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo_bank_account" accept="image/*"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>
                                                <!--<a href="javascript:void(0)" class="btn btn-default" onclick="delete_photo_bank_account('<?=$userId;?>');">Remove</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Additional Documents
                                        </label>
                                        <input type="hidden" name="photo_additional1" id="photo_additional1" value="<?=$photo_additional1;?>">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if (empty($photo_additional1)) {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo" id="noimage">
                                                <?php } else {?>
                                                    <img src="<?php echo base_url('uploads/profile/') . $photo_additional1;?>" alt="photo" id="noimage">
                                                <?php }?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo_additional1" accept="image/*"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>
                                                <!--<a href="javascript:void(0)" class="btn btn-default" onclick="delete_photo('<?=$userId;?>');">Remove</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Additional Documents
                                        </label>
                                        <input type="hidden" name="photo_additional2" id="photo_additional2" value="<?=$photo_additional2;?>">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if (empty($photo_additional2)) {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo" id="noimage">
                                                <?php } else {?>
                                                    <img src="<?php echo base_url('uploads/profile/') . $photo_additional2;?>" alt="photo" id="noimage">
                                                <?php }?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo_additional2" accept="image/*"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>
                                                <!--<a href="javascript:void(0)" class="btn btn-default" onclick="delete_photo('<?=$userId;?>');">Remove</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Additional Documents
                                        </label>
                                        <input type="hidden" name="photo_additional3" id="photo_additional3" value="<?=$photo_additional3;?>">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if (empty($photo_additional3)) {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/default-user.png" alt="photo" id="noimage">
                                                <?php } else {?>
                                                    <img src="<?php echo base_url('uploads/profile/') . $photo_additional3;?>" alt="photo" id="noimage">
                                                <?php }?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="photo_additional3" accept="image/*"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancel</a>
<!--                                                <a href="javascript:void(0)" class="btn btn-default" onclick="delete_photo('<?=$userId;?>');">Remove</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <span class="symbol required"></span> Required Fields
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <p>
                                        By clicking UPDATE, you are agreeing to the Policy and Terms &amp; Conditions.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-default btn-wide" type="button" id="btn_back" onclick="window.location.href = '<?=base_url();?>master/profile'">
                                        Back <i class="fa fa-arrow-circle-left"></i>
                                    </button>
                                    <button class="btn btn-info btn-wide" id="btn_account" type="submit">
                                        Update <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                ($('#UserInvestmentExperience').val() == 0 ? $('#UserAreasOfInvestment').hide() : "");
                ($('#UserAccountPurpose').val() != "lainnya" ? $('#UserAccountPurposeInfo').hide() : "");
                ($('#UserNpwpFlag').val() == 0 ? $('#UserNpwp').hide() : "");
                ($('#UserHomeOwnership').val() != "lainnya" ? $('#UserHomeOwnershipInfo').hide() : "");
                $('#UserWorkWorkInfo').hide();
                $('#UserHomeOwnershipInfo').hide();
                ($('#UserWorkWork').val() != "lainnya" ? $('#UserWorkWorkInfo').hide() : $('#UserWorkWorkInfo').show());

                NProgress.start();
                $.ajaxSetup({
                    type: "POST",
                    url: "<?php echo base_url('master/profile/get_data_city')?>",
                    cache: false,
                });

                $("#provinsi").change(function () {
                    var value = $(this).val();
                    if (value > 0) {
                        $.ajax({
                            data: {modul: 'kabupaten', id: value},
                            success: function (respond) {
                                $("#kabupaten-kota").html(respond);
                            }
                        })
                    } else {
                        $("#kabupaten-kota").html('');
                    }
                });

                table = $('#table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        "url": "<?php echo site_url('master/profile/ajax_list')?>",
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [-1],
                            "orderable": false,
                        },
                    ],

                });

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

            $('#UserIdentityTypeId').on('change', function () {
                $('#UserIdentityNumber').focus();
            });
            $('#UserInvestmentExperience').on('change', function () {
                var val = $(this).val();
                if (val == 1) {
                    $('#UserAreasOfInvestment').show();
                    $('#UserAreasOfInvestment').focus();
                } else {
                    $('#UserAreasOfInvestment').hide();
                }
            });
            $('#UserAccountPurpose').on('change', function () {
                var val = $(this).val();
                if (val == "lainnya") {
                    $('#UserAccountPurposeInfo').show();
                    $('#UserAccountPurposeInfo').focus();
                } else {
                    $('#UserAccountPurposeInfo').hide();
                }
            });
            $('#UserNpwpFlag').on('change', function () {
                var val = $(this).val();
                if (val == 1) {
                    $('#UserNpwp').show();
                    $('#UserNpwp').focus();
                } else {
                    $('#UserNpwp').hide();
                }
            });
            $('#UserWorkWork').on('change', function () {
                var val = $(this).val();
                if (val == "lainnya") {
                    $('#UserWorkWorkInfo').show();
                    $('#UserWorkWorkInfo').focus();
                } else {
                    $('#UserWorkWorkInfo').hide();
                }
            });
            $('#UserHomeOwnership').on('change', function () {
                var val = $(this).val();
                if (val == "lainnya") {
                    $('#UserHomeOwnershipInfo').show();
                    $('#UserHomeOwnershipInfo').focus();
                } else {
                    $('#UserHomeOwnershipInfo').hide();
                }
            });

//            $.validator.setDefaults({
//                submitHandler: function () {
//                    alert("submitted!");
//                    setTimeout(function () {
//                        location = '<?php echo site_url();?>/master/profile';
//                    }, 1000);
//                }
//            });

            $('#form1').submit(function (e) {
                e.preventDefault();
                var me = $(this);
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: new FormData(this), //me.serialize(),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status == true)
                        {
                            setTimeout(function () {
                                location = '<?php echo site_url();?>/master/profile';
                            }, 1000);
                        } else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                                $('[name="' + data.inputerror[0] + '"]').focus();
                            }
                        }
//                        if (response.success == true) {
//                            setTimeout(function () {
//                                location = '<?php echo site_url();?>/master/profile';
//                            }, 1000);
//                        } else {
//                            $.each(response.messages, function (key, value) {
//                                var element = $('#' + key);
//                                //$('#UserIdentityNumber').focus();
//                                element.closest('div.err')
//                                        .removeClass('has-error')
//                                        .addClass(value.length > 0 ? 'has-error' : '')
//                                        .find('.text-danger')
//                                        .remove();
//
//                                element.after(value);
//                            });
//                        }
                    }
                });
            });

            $('#form_photo').submit(function (e) {
                e.preventDefault();
                var me = $(this);
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: new FormData(this), //me.serialize(),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status == true)
                        {
                            setTimeout(function () {
                                location = '<?php echo site_url();?>/master/profile';
                            }, 1000);
                        } else
                        {
                            alert("Please Upload Your Documents...!");
                        }
                    }
                });
            });

            function add_users_bank()
            {
                save_method = 'add';
                $('#form_payment')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#modal_form').modal('show');
                $('.modal-title').text('Add Payment');
                $('[name="rekNumber"]').focus();
            }


            function edit_bank(id, bId, rekNumb)
            {
                save_method = 'update';
                $('#form_payment')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();

                $.ajax({
                    url: "<?php echo site_url('master/profile/ajax_edit')?>/" + id + "/" + bId + "/" + rekNumb,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data)
                    {
                        $('[name="id"]').val(data.UserId);
                        $('[name="bankName"]').val(data.BankId);
                        $('[name="rekNumber"]').val(data.RekNumber);
                        $('[name="temp_bankName"]').val(data.BankId);
                        $('[name="temp_rekNumber"]').val(data.RekNumber);
                        $('[name="rekName"]').val(data.RekName);
                        $('[name="status"]').val(data.Status);
                        $('#modal_form').modal('show');
                        $('.modal-title').text('Edit Bank');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }

            function reload_table()
            {
                table.ajax.reload(null, false); //reload datatable ajax 
            }

            function save()
            {
                $('#btnSave').text('Saving...'); //change button text
                $('#btnSave').attr('disabled', true); //set button disable 
                var url;

                if (save_method == 'add') {
                    url = "<?php echo site_url('master/profile/ajax_add')?>";
                } else {
                    url = "<?php echo site_url('master/profile/ajax_update')?>";
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#form_payment').serialize(),
                    dataType: "JSON",
                    success: function (data)
                    {
                        if (data.status)
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                        } else
                        {
                            for (var i = 0; i < data.inputerror.length; i++)
                            {
                                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                            }
                        }
                        $('#btnSave').text('Save');
                        $('#btnSave').attr('disabled', false);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                        $('#btnSave').text('save'); //change button text
                        $('#btnSave').attr('disabled', false); //set button enable 
                    }
                });
            }

            function delete_bank(id, bId, rekNumb)
            {
                if (confirm('Are you sure delete this data?'))
                {
                    $.ajax({
                        url: "<?php echo site_url('master/profile/ajax_delete')?>/" + id + "/" + bId + "/" + rekNumb,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });

                }
            }

            function delete_photo_profile(id)
            {
                if (confirm('Are you sure delete this picture?'))
                {
                    $.ajax({
                        url: "<?php echo site_url('master/profile/remove_photo')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            alert('picture was deleted..!');
                            $("#noimage").attr("src", "<?php echo base_url();?>assets/images/default-user.png");
                            $("#img_exist_photo_profile").val('');
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });

                }
            }
        </script>

        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Bank Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form_payment" class="form-horizontal">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Bank Name</label>
                                    <div class="col-md-9">
                                        <select id="bankName" name="bankName" class="form-control">
                                            <option value="">Please Select</option>
                                            <?php
                                            foreach ($list_bank as $value) {
                                                echo "<option value='" . $value['id'] . "'>" . $value['BankName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                        <input name="temp_bankName" type="hidden">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Account Number</label>
                                    <div class="col-md-9">
                                        <input name="rekNumber" placeholder="Account Number" class="form-control" type="text">
                                        <span class="help-block"></span>
                                        <input name="temp_rekNumber" type="hidden">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Account Name</label>
                                    <div class="col-md-9">
                                        <input name="rekName" placeholder="Account Name" value="<?=$fullName;?>" readonly="readonly" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select id="status" name="status" class="form-control">
                                            <option value="Y" >Aktive</option>
                                            <option value="T" >Not Aktive</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-o" data-dismiss="modal">Cancel</button>
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-info">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->
    </div>
</div>