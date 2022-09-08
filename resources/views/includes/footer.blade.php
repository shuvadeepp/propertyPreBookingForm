    
        </div>
    </div>
    <footer>
        <p style="text-align: center;"> Copyright {{ date("Y") }} All Rights Reserved </p>
        <p style="text-align: center; color:gray;"> Design By : Shuvadeep Podder </p>
    </footer>


    <!-- BOOTSTRAP CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- select2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- datepicker CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- validation local CND -->
    <script src="{{ asset('public/js/validatorchklist.js') }}"></script>
    <!-- Datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#dataTable').DataTable({
            "lengthMenu": [ [ 10, 20, 30, -1], [ 10, 20, 30, "All"] ],
            });
        });
    </script>
    <!-- select2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/js/sweetAlert.js') }}"></script>
    <!-- Box navbar dynamic -->
    <script>
        $(document).ready(function () {
            jQuery(function ($) {
            var path = window.location.href; 
            // because the 'href' property of the DOM element is the absolute path
        
            /* $('ul li a').each(function () {
                if (this.href === path) {
                    console.log(path,this.href);
                    $(this).addClass('active');
                }
            }); */
            $('nav div a').each(function () {
                if (this.href === path) {
                    console.log(path,this.href);
                    $(this).addClass('active');
                }
            });
            });
        });
    </script>
    <!-- moment.min.js -->
    <script src="https://momentjs.com/downloads/moment.min.js"></script>