<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Verification Demo Account  <span class="text-bold">List</span></h4>
                    <div class="panel-tools" >

                    </div>
                </div>
                <div class="panel-body">
                    <table id="table" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Request</th>
                                <th>Type</th>
                                <th>Platform</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th style="width:70px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
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
                        "url": "<?php echo site_url('demo_accounts/ajax_list')?>",
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [-1],
                            "orderable": false,
                        },
                        {
                            "targets": [-2],
                            "orderable": false,
                        },
                        {
                            "targets": [-3],
                            "orderable": false,
                        },
                        {
                            "targets": [-4],
                            "orderable": false,
                        },
                        {
                            "targets": [-5],
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

                $("#modal_form").on('hidden.bs.modal', function () {
                    $("#form").find('.err').removeClass('has-error');
                    $("#form").find('.text-danger').remove();
                });

            });

            function edit_data(id)
            {
                save_method = 'update';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();

                $.ajax({
                    url: "<?php echo site_url('demo_accounts/ajax_edit')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data)
                    {
                        $('[name="id"]').val(data.id);
                        $('#userId').val(data.user_id);
                        $('#name').text(data.FullName);
                        $('#email').text(data.Email);
                        $('#request_date').text(data.createdby);
                        $('#temp_request').val(data.createdby);
                        $('#type').text(data.Type);
                        $('#platform').text(data.Platform);
                        $('#temp_platform').val(data.Platform);
                        $('#platform_id').val(data.platform_login);
                        $('#platform_pwd').val(data.platform_password);
                        $('#platform_pin').val(data.services_pin);
                        $('#modal_form').modal('show');
                        $('.modal-title').text('Update Platform Demo Account');
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
                    url = "<?php echo site_url('demo_accounts/ajax_add')?>";
                } else {
                    url = "<?php echo site_url('demo_accounts/ajax_update')?>";
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function (response)
                    {
                        if (response.success == true) {
                            location.reload();
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
                        url: "<?php echo site_url('demo_accounts/ajax_delete')?>/" + id,
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

        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Demo Account Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        <div class="user-left">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">Member Information</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><span id="name"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td><span id="email"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Request Date:</td>
                                                        <td><span id="request_date"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Type:</td>
                                                        <td><span id="type"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Platform:</td>
                                                        <td><span id="platform"></span></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <input type="hidden" id="userId" name="userId">
                                        <input type="hidden" id="temp_platform" name="temp_platform">
                                        <input type="hidden" id="temp_request" name="temp_request">
                                        <div class="col-md-8 err">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Platform ID <span class="symbol required"></span>
                                                </label>
                                                <input type="text" id="platform_id" name="platform_id" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-8 err">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Platform Password <span class="symbol required"></span>
                                                </label>
                                                <input type="text" id="platform_pwd" name="platform_pwd" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-8 err">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Confirm Password <span class="symbol required"></span>
                                                </label>
                                                <input type="text" id="platform_confirm" name="platform_confirm" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="col-md-8 err">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Services PIN
                                                </label>
                                                <input type="text" id="platform_pin" name="platform_pin" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-o" data-dismiss="modal" id="cancel">Cancel</button>
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-info">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->
    </div>
</div>