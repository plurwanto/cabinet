<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Menu List: <span class="text-bold"><?=$userlevelname->UserLevelName;?></span></h4>
                    <div class="panel-tools" >
<!--                        <a class = "btn btn-info btn-sm btn-o add-event" href = "<?php echo site_url()?>/settings/menu/add_menu/"><i class = "glyphicon glyphicon-plus"></i> Add New</a>-->
                    </div>
                </div>
                <div class="panel-body">
                    <form action='<?php echo base_url();?>settings/permissions/ajax_set_permissions' name='frmpermissions' method='post' class="form-horizontal">
                        <input type="hidden" name="userlevelID" id="userlevelID" value="<?=$userlevelname->UserLevelID;?>">
                        <table id="table" class="table table-bordered table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Add <input type="checkbox" name="chkadd_all" id="chkadd_all"></th>
                                    <th>Edit <input type="checkbox" name="chkedit_all" id="chkedit_all"></th>
                                    <th>Delete <input type="checkbox" name="chkdelete_all" id="chkdelete_all"></th>
                                    <th>View <input type="checkbox" name="chkview_all" id="chkview_all"></th>
                                    <th>Show/Hide <input type="checkbox" name="chkshow_all" id="chkshow_all"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_menu as $value) {
                                    $cheked_add = ($value['user_add'] == "Y" ? "checked value='" . $value['menu_id'] . "'" : "value='" . $value['menu_id'] . "'");
                                    $cheked_edit = ($value['user_edit'] == "Y" ? "checked value='" . $value['menu_id'] . "'" : "value='" . $value['menu_id'] . "'");
                                    $cheked_delete = ($value['user_delete'] == "Y" ? "checked value='" . $value['menu_id'] . "'" : "value='" . $value['menu_id'] . "'");
                                    $cheked_view = ($value['user_view'] == "Y" ? "checked value='" . $value['menu_id'] . "'" : "value='" . $value['menu_id'] . "'");
                                    $cheked_show = ($value['show_menu'] == "1" ? "checked value='1'" : "value='0'");
                                    ?>
                                    <tr>
                                        <td><input type="hidden" name="menu_id[]" id="menu_id" value="<?=$value['menu_id'];?>"/><?=($value['parent_id'] == "0" ? $value['menu_name'] : "->" . $value['menu_name']);?></td>
                                        <td><input type="checkbox" class="checkbox1" name="chkadd[<?=$value['menu_id'];?>]" id="chkadd" <?=$cheked_add;?>></td>
                                        <td><input type="checkbox" class="checkbox2" name="chkedit[<?=$value['menu_id'];?>]" id="chkedit" <?=$cheked_edit;?>></td>
                                        <td><input type="checkbox" class="checkbox3" name="chkdelete[<?=$value['menu_id'];?>]" id="chkdelete" <?=$cheked_delete;?>></td>
                                        <td><input type="checkbox" class="checkbox4" name="chkview[<?=$value['menu_id'];?>]" id="chkview" <?=$cheked_view;?>></td>
                                        <td><input type="checkbox" class="checkbox5" name="chkshow[<?=$value['menu_id'];?>]" id="chkshow" <?=$cheked_show;?>></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-info btn-o" onclick="window.location.href = '<?=base_url();?>settings/permissions'">Cancel</button>
                        <button type="submit" name='btnsave' id='btnsave' class="btn btn-info">Save</button>
                    </form>

                </div>
            </div>

        </div>

        <script type="text/javascript">
            var save_method;
            var table;

            $(document).ready(function () {
                ($('.checkbox1:checked').length == $('.checkbox1').length ? $("#chkadd_all")[0].checked = true : $("#chkadd_all")[0].checked = false)
                ($('.checkbox2:checked').length == $('.checkbox2').length ? $("#chkedit_all")[0].checked = true : $("#chkedit_all")[0].checked = false)
                ($('.checkbox3:checked').length == $('.checkbox3').length ? $("#chkdelete_all")[0].checked = true : $("#chkdelete_all")[0].checked = false)
                ($('.checkbox4:checked').length == $('.checkbox4').length ? $("#chkview_all")[0].checked = true : $("#chkview_all")[0].checked = false)   
                ($('.checkbox5:checked').length == $('.checkbox5').length ? $("#chkshow_all")[0].checked = true : $("#chkshow_all")[0].checked = false)
                
                $("#chkadd_all").change(function () {
                    var status = this.checked;
                    var menu = $('#menu_id').val();
                    $('.checkbox1').each(function (x) {
                        this.checked = status;
                    });
                });
                $('.checkbox1').change(function () {
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if (this.checked == false) { //if this item is unchecked
                        $("#chkadd_all")[0].checked = false; //change "select all" checked status to false
                    }
                    if ($('.checkbox1:checked').length == $('.checkbox1').length) {
                        $("#chkadd_all")[0].checked = true; //change "select all" checked status to true
                    }
                });

                $("#chkedit_all").change(function () {
                    var status = this.checked;
                    $('.checkbox2').each(function () {
                        this.checked = status;
                    });
                });
                $('.checkbox2').change(function () {
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if (this.checked == false) { //if this item is unchecked
                        $("#chkedit_all")[0].checked = false; //change "select all" checked status to false
                    }
                    //check "select all" if all checkbox items are checked
                    if ($('.checkbox2:checked').length == $('.checkbox2').length) {
                        $("#chkedit_all")[0].checked = true; //change "select all" checked status to true
                    }
                });

                $("#chkdelete_all").change(function () {
                    var status = this.checked;
                    $('.checkbox3').each(function () {
                        this.checked = status;
                    });
                });
                $('.checkbox3').change(function () {
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if (this.checked == false) { //if this item is unchecked
                        $("#chkdelete_all")[0].checked = false; //change "select all" checked status to false
                    }
                    //check "select all" if all checkbox items are checked
                    if ($('.checkbox3:checked').length == $('.checkbox3').length) {
                        $("#chkdelete_all")[0].checked = true; //change "select all" checked status to true
                    }
                });

                $("#chkview_all").change(function () {
                    var status = this.checked;
                    $('.checkbox4').each(function () {
                        this.checked = status;
                    });
                });
                $('.checkbox4').change(function () {
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if (this.checked == false) { //if this item is unchecked
                        $("#chkview_all")[0].checked = false; //change "select all" checked status to false
                    }
                    //check "select all" if all checkbox items are checked
                    if ($('.checkbox4:checked').length == $('.checkbox4').length) {
                        $("#chkview_all")[0].checked = true; //change "select all" checked status to true
                    }
                });

                $("#chkshow_all").change(function () {
                    var status = this.checked;
                    $('.checkbox5').each(function () {
                        this.checked = status;
                    });
                });
                $('.checkbox5').change(function () {
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if (this.checked == false) { //if this item is unchecked
                        $("#chkshow_all")[0].checked = false; //change "select all" checked status to false
                    }
                    //check "select all" if all checkbox items are checked
                    if ($('.checkbox5:checked').length == $('.checkbox5').length) {
                        $("#chkshow_all")[0].checked = true; //change "select all" checked status to true
                    }
                });
            });

            function add_menu()
            {
                save_method = 'add';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#modal_form').modal('show');
                $('.modal-title').text('Add Setup Menu');
            }

            function edit_data(id)
            {
                save_method = 'update';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();

                $.ajax({
                    url: "<?php echo site_url('settings/menu/ajax_edit')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data)
                    {
                        $('[name="id"]').val(data.Id);
                        $('[name="type"]').val(data.Type);
                        $('[name="subjectName"]').val(data.SubjectMail);
                        $('[name="editor1"]').text(data.BodyMail);
                        area(data.BodyMail);
                        $('[name="status"]').val(data.Status);
                        $('#modal_form').modal('show');
                        $('.modal-title').text('Edit Mail Template');
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
                    url = "<?php echo site_url('settings/menu/ajax_add')?>";
                } else {
                    url = "<?php echo site_url('settings/menu/ajax_update')?>";
                }


                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function (data)
                    {
                        if (data.status)
                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                            location.reload();
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

            function delete_data(id)
            {
                if (confirm('Are you sure delete this data?'))
                {
                    $.ajax({
                        url: "<?php echo site_url('settings/ajax_delete')?>/" + id,
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

        </script>
    </div>
</div>
