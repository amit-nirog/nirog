<?php
echo $this->Html->css(array('dataTables.bootstrap'));
echo $this->Html->script(array('jquery.dataTables.min', 'dataTables.bootstrap.min'));
?>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Doctor Collage
            <small>Preview</small>
            <a class="btn" href="<?php echo $this->Html->url('/admin/Specialities/add');?>">Add Specilities</a>
        </h1>
        
        <ol class="breadcrumb">
            <li><a href="http://localhost/nirog/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add collage</li>
        </ol>
    </section>

    <!-- left column -->





    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                                
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>


            </div>
        </div>
    </section>






</div>
