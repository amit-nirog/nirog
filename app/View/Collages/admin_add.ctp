

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Doctor Collage
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/nirog/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add collage</li>
        </ol>
    </section>





    <section class="content">
        <?php $x = $this->Session->flash(); ?>
        <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Collage name</h3>
                    </div>


                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Add Collage Name</label>
                            <input type="text" class="form-control Colname" name="data[Collage][collage_name]" placeholder="Doctor collage name">
                            <input type="hidden" class="form-control colstat" name="data[Collage][status]" value="1" placeholder="collage  name">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary coll">Add</button>
                    </div>







                </div>
            </div>
            <script>
                $(function () {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": false,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": false,
                        "autoWidth": false
                    });
                });
            </script>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Collage List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Collage Name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: DocCollageList">
                                        <tr>
                                            <td data-bind="text: id">vcv</td>
                                            <td data-bind="text: CollageName">sdfds</td>
                                            <td><input type="submit" value="Delete" data-bind="click: $root.click,attr: {'id':id}" class="btn btn-success delcol"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>


                    </div>
                </div>
            </section>
        </div>
    </section>
</div>






<?php echo $this->Html->script('knockout-3.4.0'); ?>
<script type="text/javascript">
    var CollageName;
    var ur = "<?php echo $this->Html->url('/', true) ?>";

    var DocCollageVm = function () {
        var me = this;
        me.CollageName = ko.observable();
        me.ID = ko.observable();
        me.DocCollageList = ko.observableArray([]);

        $('.coll').on("click", function () {
            var colname = $('.Colname').val();
            var colstat = $('.colstat').val();
            $.post("" + ur + "admin/Collages/add", {
                "data[Collage][collage_name]": colname,
                "data[Collage][status]": colstat
                

            }, function (d) {
                
                    me.DocCollageList.push({
                    CollageName: d.collage_name,
                    id: d.id,
                });
            });
                
        });
        
       me.click = function (d, e) {
            
            var id = e.currentTarget.id;
            $.post("" + ur + "admin/Collages/delete", {"data[Collage][id]": id}, function (d) {
                
            });
            me.DocCollageList.remove(d);
        }



        me.getCollageList = function () {
            me.DocCollageList([]);
            $.get("" + ur + "admin/Collages/getCollages.json", function (d) {

                for (i in d.data) {
                    dt = d.data[i].Collage;

                    me.DocCollageList.push({
                        CollageName: dt.collage_name,
                        id: dt.id,
                    });
                }
            })
        }
        me._init = function () {
            me.getCollageList();
        };
        me._init();
    }

    var DocCollage = new DocCollageVm();
    ko.applyBindings(DocCollage, $('.DocCollage')[0])
</script>











