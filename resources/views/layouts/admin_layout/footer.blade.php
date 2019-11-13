
    <!-- this two div for warpper -->
        </div>
            </div>


            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Develop by <a target="_blank" href="https://mobarokman.github.io">Mobarok Hossain</a>.
                        </div>
                      
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end second wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    {{-- <script src="{{ asset('assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script> --}}
    <!-- sparkline js -->
    <script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    {{-- <script src="{{ asset('assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/charts/morris-bundle/morris.js') }}"></script> --}}
    <!-- chart c3 js -->
    {{-- <script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/js/dashboard-ecommerce.js') }}"></script> --}}

    @yield('js')
</body>
 
</html>