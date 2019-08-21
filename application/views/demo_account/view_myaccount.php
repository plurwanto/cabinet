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
                    <h4 class="panel-title">Demo Account  <span class="text-bold">List</span></h4>
                    <div class="panel-tools" >
                        <button class="btn btn-info btn-sm btn-o add-event" onclick="add_demo_account()"><i class="glyphicon glyphicon-plus"></i> Add New</button>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="table" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Platform ID</th>
                                <th>Password</th>
                                <th>Request</th>
                                <th>Activate</th>
                                <th>Expired</th>
                                <th>Type</th>
                                <th>Platform</th>
                                <th>Product</th>
<!--                                <th style="width:70px;">Action</th>-->
                            </tr>
                        </thead>
                        <?php
                        if (!empty($list_myAccount)) {
                            foreach ($list_myAccount as $value) {
                                $created = strtotime($value['created']);
                                $active = strtotime($value['activate']);
                                $request = date("d-m-Y H:i:s", $created);
                                if (!empty($active)) {
                                    $active_date = date("d-m-Y H:i:s", $active);
                                    $timestamp = $value['activate'];
                                    $expires = date('d-m-Y H:i:s', strtotime('+30 days', strtotime($timestamp)));
                                    $date_diff = ($expires - strtotime($timestamp)) / 86400;
                                } else {
                                    $active_date = "";
                                    $expires = "";
                                }
                                ?>
                                <tr>
                                    <td nowrap><?=$value['platform_login'];?></td>
                                    <td nowrap><?=$value['platform_password'];?></td>
                                    <td nowrap><?=$request;?></td>
                                    <td nowrap><?=$active_date;?></td>
                                    <td nowrap><?=$value['expired'];?></td>
                                    <td nowrap><?=$value['Type'];?></td>
                                    <td nowrap><?=$value['Platform'];?></td>
                                    <td nowrap><?=$value['Product'];?></td>
        <!--                                    <td nowrap><a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(<?=$value['id'];?>)"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_data(<?=$value['id'];?>)"><i class="fa fa-times fa fa-white"></i></a></td>-->
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </table>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            var save_method;
            var table;
            $(document).ready(function () {
                nProgress();
                var table = $('#table').DataTable({
                    aaSorting: [],
                    columnDefs: [
                        {targets: 0, bSortable: false},
                        {targets: 1, bSortable: false},
                        {targets: 2, bSortable: false},
                        {targets: 3, bSortable: false, searchable: false},
                        {targets: 4, bSortable: false, searchable: false},
                        {targets: 5, bSortable: false, searchable: false},
                        {targets: 6, bSortable: false, searchable: false},
                        {targets: 7, bSortable: false, searchable: false}
                        //  {targets: 8, bSortable: false, searchable: false}

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
                $("#slt_type").change(function () {
                    var value = $(this).val();
                    if (value > 0) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('demo_accounts/get_data_accountType')?>",
                            cache: false,
                            data: {modul: 'platform', id: value},
                            success: function (respond) {
                                $("#slt_platform").html(respond);
                            }
                        })
                    } else {
                        $("#slt_platform").html('');
                    }
                });
                $("#slt_platform").change(function () {
                    var value = $(this).val();
                    if (value > 0) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('demo_accounts/get_data_platform')?>",
                            cache: false,
                            data: {modul: 'product', id: value},
                            success: function (respond) {
                                $("#slt_product").html(respond);
                            }
                        })
                    } else {
                        $("#slt_product").html('');
                        $('#slt_product').prop('disabled', false);
                    }
                });
                $('#slt_product').prop('disabled', false);
            });

            function add_demo_account()
            {
                save_method = 'add';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#modal_form').modal('show');
                $('.modal-title').text('Add Demo Account');
                // $('[name="name"]').focus();
            }

            function edit_data(id)
            {
                save_method = 'update';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $.ajax({
                    url: "<?php echo site_url('demo_accounts/myAccount_edit')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data)
                    {
                        //alert(response.data.account_type_id);
                        $('[name="id"]').val(data.id);
                        $('[name="slt_type"]').val(data.account_type_id);
                        $('[name="slt_platform"]').val(data.platform_id);
                        $('[name="slt_product"]').val(data.product_id);
                        $('[name="status"]').val(data.Status);
                        $('#modal_form').modal('show');
                        $('.modal-title').text('Edit Account Demo');
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
                    url = "<?php echo site_url('demo_accounts/myAccount_ajax_add')?>";
                } else {
                    url = "<?php echo site_url('demo_accounts/myAccount_ajax_update')?>";
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
                            nProgress();
                            $('#modal_form').modal('hide');
                            location.reload();
                            //reload_table();
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
                        url: "<?php echo site_url('demo_accounts/myAccount_ajax_delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            $('#modal_form').modal('hide');
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });
                }
            }

            function nProgress() {
                NProgress.start();
                setTimeout(function () {
                    NProgress.done();
                    $('.fade').removeClass('out');
                }, 1000);
            }

        </script>

        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Category Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Account Type</label>
                                    <div class="col-md-6">
                                        <select id="slt_type" name="slt_type" class="form-control">
                                            <option value="" >Please Select</option>
                                            <?php
                                            foreach ($list_account_type as $value) {
                                                $selected = ($this->input->post('slt_type') == $value['id'] ? $selected = ' selected ' : '');
                                                echo "<option value='" . $value['id'] . "' $selected >" . $value['Name'] . " </option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Platforms</label>
                                    <div class="col-md-6">
                                        <select id="slt_platform" name="slt_platform" class="form-control">
                                            <option value="" >Please Select</option>
                                            <?php
                                            foreach ($list_platform as $value) {
                                                $selected = ($this->input->post('slt_platform') == $value['id'] ? $selected = ' selected ' : '');
                                                echo "<option value='" . $value['id'] . "' $selected >" . $value['Name'] . " </option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Product</label>
                                    <div class="col-md-6">
                                        <select id="slt_product" name="slt_product" class="form-control">

                                            <?php
                                            if (!empty($list_product)) {
                                                foreach ($list_product as $value) {
                                                    $selected = ($this->input->post('slt_product') == $value['id'] ? $selected = ' selected ' : '');
                                                    echo "<option value='" . $value['id'] . "' $selected >" . $value['Name'] . " </option>";
                                                }
                                            }
                                            ?>
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