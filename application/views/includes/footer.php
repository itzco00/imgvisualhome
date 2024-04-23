<!--footer start-->
<!--footer end-->
  </section>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?= base_url() ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
    <!--<script src="<?= base_url() ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>-->
    <script src="<?= base_url() ?>assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="<?= base_url() ?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?= base_url() ?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?= base_url() ?>assets/js/sparkline-chart.js"></script>    
	<script src="<?= base_url() ?>assets/js/zabuto_calendar.js"></script>	
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
