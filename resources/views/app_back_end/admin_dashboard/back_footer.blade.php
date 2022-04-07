<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Dashhopper Backoffice</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="../assets/global/plugins/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="/app_back_styles/dist/js/scripts.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="/app_back_styles/dist/assets/demo/chart-area-demo.js"></script>
                <script src="/app_back_styles/dist/assets/demo/chart-bar-demo.js"></script>
                    <!-- <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> -->
                        <!-- <script src="../assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script> -->
                            <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
                                <script src="../assets/global/plugins/bootstrap.bundle.min.js"></script>  
                                    <!-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script> --> 
                                        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
                                            <script src="../assets/global/scripts/jquery.inputmask.js"></script> 
                                                <script src="../assets/global/scripts/jquery.inputmask_updated.js"></script>        
                                                    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
                                                        <script src="../assets/global/plugins/jquery.dataTables.min.js" type="text/javascript"></script>        
                                                            <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
                                                                <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
                                                                <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
                                                            <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
                                                        @include('app_back_end.back_scripts.dash_load')
                                                    @include('app_back_end.back_scripts.add_documents')	
                                                @include('app_back_end.back_scripts.sidenav_menu')
                                            @include('velhopper.back_scripts.manage_bus_units')  
                                        @include('velhopper.back_scripts.manage_employees')   
                                    @include('velhopper.back_scripts.manage_schedules')   
                                @include('velhopper.back_scripts.navbars_table')
                            @include('velhopper.back_scripts.manage_list_of_users')
                        @include('velhopper.back_scripts.add_documents')	
                    @include('velhopper.back_scripts.manage_contents_scripts')
                @include('velhopper.back_scripts.subscribers_table')
            @include('velhopper.back_scripts.user_registration_scripts')
        @include('velhopper.back_scripts.jobs_table_scripts')
    </body>
</html>