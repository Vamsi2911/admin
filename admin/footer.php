<!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                     <li>
                        <!--Copyrights Reserved for Technical Hub.-->
                                <!--&copy; <script>document.write(new Date().getFullYear())</script>-->
                        </li>
                        
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    Made with <i class="fa fa-heart heart"></i> by <a href="http://technicalhub.io" target="_blank">T - HUB</a>
                </div>
            </div>
        </footer>



    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


<!-- Tooltip js -->
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>


    <?php
        if(@$_SESSION['alert']=="") {
            ?>
                <script type="text/javascript">
                    $(document).ready(function(){

                        demo.initChartist();

                        $.notify({
                            icon: 'ti-gift',
                            message: " Hello <?php echo $_SESSION['username']; ?> ! Welcome to <b>VEDA 2018 </b> ."

                        },{
                            type: 'success',
                            timer: 4000
                        });

                    });
                </script>
        <?php
            $_SESSION['alert']="success";
        }
    ?>