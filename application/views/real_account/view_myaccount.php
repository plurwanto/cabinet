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
                    <h4 class="panel-title">Real Account  <span class="text-bold">List</span></h4>
                    <div class="panel-tools" >
                        <?php
//                        echo "<pre>";
//                        print_r($unfinished_accounts[0]['document_number']);
//                        echo "</pre>";
                        $no_dok = $unfinished_accounts[0]['document_number'];
                        if (empty($unfinished_accounts)) {
                            ?>
                            <a href="<?php echo base_url()?>accounts/real_accounts/step1" class="btn btn-info btn-sm btn-o add-event"><i class="glyphicon glyphicon-plus"></i> Add New</a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo base_url()?>real_accounts/request/<?php echo $no_dok;?>" class="btn btn-info btn-sm btn-o add-event"><i class="glyphicon glyphicon-plus"></i> Add New</a>
                        <?php }?>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="table_accounts" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Request</th>
                                <th>Activate</th>
                                <th>Status</th>
                                <th style="width:70px;">Action</th>
                            </tr>
                        </thead>
                        <?php
                        if (!empty($list_myAccounts)) {
                            foreach ($list_myAccounts as $value) {
                                $status = ($value['status'] == 'ACTIVE' ? '<span class="label label-sm label-success">ACTIVE</span>' : ($value['status'] == 'PENDING' ? '<span class="label label-sm label-warning">PENDING</span>' : '<span class="label label-sm label-danger">EXPIRED</span>'));
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
                                    <td nowrap><?=$value['document_number'];?></td>
                                    <td nowrap><?=$request;?></td>
                                    <td nowrap><?=$value['created'];?></td>
                                    <td nowrap><?=$status;?></td>
                                    <td nowrap><a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(<?=$value['id'];?>)"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Unfinished <span class="text-bold">registration</span></h4>
                    <div class="panel-tools" >
                    </div>
                </div>
                <div class="panel-body">
                    <form id="frm_myaccount_pending" name="frm_myaccount_pending" method="GET" action="">
                        <table id="table" class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Last Step</th>
                                    <th>Action</th>
    <!--                                <th style="width:70px;">Action</th>-->
                                </tr>
                            </thead>
                            <?php
                            if (!empty($unfinished_accounts)) {
                                foreach ($unfinished_accounts as $value) {
                                    ?>
                                    <tr>
                                        <td nowrap><?=$value['document_number'];?></td>
                                        <td nowrap><?=$value['last_step'];?></td>
                                        <td nowrap>
                                            <a href="<?php echo base_url()?>real_accounts/request/<?=$value['document_number'];?>" class="btn btn-info btn-sm btn-o add-event"><i class="glyphicon glyphicon-new-window"></i> Continue</a>
                                            <a class="btn btn-info btn-sm btn-o add-event" href="javascript:void(0)" title="Delete" onclick="delete_data(<?=$value['document_number'] . "," . $value['user_id'];?>)"><i class="fa fa-times fa fa-white"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        </table>
                    </form>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            var save_method;
            var table;
            $(document).ready(function () {
                nProgress();
//                var table = $('#table_accounts').DataTable({
//                    aaSorting: [],
//                    columnDefs: [
//                        {targets: 0, bSortable: false},
//                        {targets: 1, bSortable: false},
//                        {targets: 2, bSortable: false},
//                        {targets: 3, bSortable: false, searchable: false},
//                        {targets: 3, bSortable: false, searchable: false}
//                        
//                    ],
//                });
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
                            url: "<?php echo base_url('real_accounts/get_data_accountType')?>",
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
                            url: "<?php echo base_url('real_accounts/get_data_platform')?>",
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

            function add_real_account()
            {
                save_method = 'add';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#modal_form').modal('show');
                $('.modal-title').text('Add Real Account');
                // $('[name="name"]').focus();
            }

            function edit_data(id)
            {
                save_method = 'update';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $.ajax({
                    url: "<?php echo site_url('real_accounts/myAccount_edit')?>/" + id,
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
                        $('.modal-title').text('Edit Account Real');
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
                    url = "<?php echo site_url('real_accounts/myAccount_ajax_add')?>";
                } else {
                    url = "<?php echo site_url('real_accounts/myAccount_ajax_update')?>";
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

            function delete_data(nodok, id)
            {
                if (confirm('Are you sure delete this data?'))
                {
                    $.ajax({
                        url: "<?php echo site_url('real_accounts/ajax_delete')?>/" + nodok + "/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
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


    </div>
</div>