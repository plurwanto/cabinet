<div class="col-sm-12">
    <?php
    $msg = $this->session->flashdata('msg');
    if ($msg)
        echo $this->session->flashdata('msg');
    ?>
</div>
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">User Level <span class="text-bold">List</span></h4>
                    <div class="panel-tools" >
<!--                        <a class = "btn btn-info btn-sm btn-o add-event" href = "<?php echo site_url()?>/settings/menu/add_menu/"><i class = "glyphicon glyphicon-plus"></i> Add New</a>-->
                    </div>
                </div>
                <div class="panel-body">
                    <table id="table" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Userlevel ID</th>
                                <th>Userlevel Name</th>
                                <th>Status</th>
                                <th style="width:145px;">Action</th>
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
                        "url": "<?php echo site_url('settings/permissions/ajax_list')?>",
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
                            "orderable": true,
                        },
                        {
                            "targets": [-4],
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
