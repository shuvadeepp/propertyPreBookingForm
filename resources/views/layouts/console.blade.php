<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.doctype')
    </head>
    <body>

        <div class="page-container">
            <!--  ==== **||PAGE CONTAINER **||====  -->
                        
                        @yield('innercontent')
            <!--  ==== **||PAGE CONTAINER **||====  -->
        </div>

        @include('includes.footer')
    </body>
</html>