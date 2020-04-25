<!-- END #content -->
<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo base_url('NewTheme/') ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url('Assets/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('Assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


<!--<script src="<?php echo base_url('NewTheme/') ?>assets/js/jquery-ui.min.js"></script>-->
<script src="<?php echo base_url('NewTheme/') ?>assets/js/js.cookie.js"></script>
<script src="<?php echo base_url('NewTheme/') ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url('NewTheme/') ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('NewTheme/') ?>assets/js/jquery.slimscroll.min.js"></script>
<!--<script src="<?php echo base_url('NewTheme/') ?>assets/js/Chart.min.js"></script>-->
<!--<script src="<?php echo base_url('NewTheme/') ?>assets/js/dashboard.demo.min.js"></script>-->
<script src="<?php echo base_url('NewTheme/') ?>assets/js/apps.min.js"></script>
<!--<script src="<?php echo base_url('NewTheme/') ?>assets/js/Dashboard-Home.js"></script>-->
<!--<script src="<?php //echo base_url('NewTheme/')  ?>assets/js/Pool_Achievers.js"></script>-->

<script>
    $(document).ready(function () {
        App.init();
    });

    $(document).ready(function () {
        $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = $('#min').datepicker("getDate");
                    var max = $('#max').datepicker("getDate");
                    var startDate = new Date(data[$('#tableView').data('date_col')]);
                    if (min == null && max == null) {
                        return true;
                    }
                    if (min == null && startDate <= max) {
                        return true;
                    }
                    if (max == null && startDate >= min) {
                        return true;
                    }
                    if (startDate <= max && startDate >= min) {
                        return true;
                    }
                    return false;
                }
        );


        $("#min").datepicker({onSelect: function () {
                table.draw();
            }, changeMonth: true, changeYear: true});
        $("#max").datepicker({onSelect: function () {
                table.draw();
            }, changeMonth: true, changeYear: true});

        var table =
                $('#tableView').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'dt-copy',
                        text: '<i class="fa fa-files-o"></i><br>Copy',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'dt-pdf',
                        text: '<i class="fa fa-file-pdf-o"></i><br>PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'dt-excel',
                        text: '<i class="fa fa-file-excel-o"></i><br>Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'dt-csv',
                        text: '<i class="fa fa-file-text-o"></i><br>CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'print',
                        className: 'dt-print',
                        text: '<i class="fa fa-print"></i><br>Imprimir',
                        titleAttr: 'Imprimir'
                    }
                ]
        });
        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function () {
            table.draw();
        });
    });
</script>


</body>
</html>
