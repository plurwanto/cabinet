<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Add <span class="text-bold">Menu</span></h4>
                    <div class="panel-tools" >

                    </div>
                </div>
                <div class="panel-body">
                    <form method='post' name="frmmenu" id="frmmenu" action="<?php echo base_url();?>settings/menu/ajax_add_menu" class="form-horizontal">
                        <input type="hidden" value="<?=$kode;?>" name="id"/> 
                        <input type="hidden" value="" name="userId"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Menu Name</label>
                                <div class="col-md-9 err">
                                    <input type="text" id="menuName" name="menuName" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Link / URL</label>
                                <div class="col-md-9">
                                    <input type="text" id="menuUrl" name="menuUrl" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Controller / Alias</label>
                                <div class="col-md-9">
                                    <input type="text" id="alias" name="alias" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Sort After</label>
                                <div class="col-md-9">
                                    <select name="sortBy" id="sortBy" class="form-control" >
                                        <option <?php if ($sortBy == "") echo "selected";?> value="">Baris Awal</option>
                                        <?php
                                        foreach ($parent as $value) {
                                            $selected = ($this->input->post('sortBy') == $value['menu_name'] ? $selected = ' selected ' : '');
                                            echo "<option value='" . $value['sort_order'] . '|' . $value['id'] . "' $selected >" . $value['menu_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Icon</label>
                                <div class="col-md-9">
                                    <input type="text" id="icon" name="icon" class="form-control">
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

                        <button type="button" class="btn btn-info btn-o" onclick="window.location.href = '<?=base_url();?>settings/menu'">Cancel</button>
                        <button type="submit" name='btnsave' id='btnsave' class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            var save_method;
            var table;

            $(document).ready(function () {

                table = $('#table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        "url": "<?php echo site_url('settings/menu/ajax_list')?>",
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [-1],
                            "orderable": false,
                        },
                    ],

                });

                $('#frmmenu').submit(function (e) {
                    e.preventDefault();
                    var me = $(this);

                    $.ajax({
                        url: me.attr('action'),
                        type: 'post',
                        dataType: 'json',
                        data: me.serialize(),
                        success: function (response) {
                            if (response.success == true) {
                                setTimeout(function () {
                                    location = '<?php echo site_url();?>/settings/menu';
                                }, 1000);
                            } else {
                                $.each(response.messages, function (key, value) {
                                    var element = $('#' + key);
                                    element.closest('div.err')
                                            .removeClass('has-error')
                                            .addClass(value.length > 0 ? 'has-error' : '')
                                            .find('.text-danger')
                                            .remove();

                                    element.after(value);
                                });
                            }
                        }
                    });
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
