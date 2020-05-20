
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/backend/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/popper/popper.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
 -->
<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

</script>

@yield('script')

</body>

</html>