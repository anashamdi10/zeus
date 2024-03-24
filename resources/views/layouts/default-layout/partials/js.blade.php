<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/config.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>

<!-- Datepickr js -->

<script src="{{asset('assets/js/datepicker/daterange-picker/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/daterange-picker/daterangepicker.js')}}"></script>
    
    
    <!-- owl.carousel.js -->
    <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
    
    
    <!-- jquery.counterup -->
    <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
    
     <!-- dataTables -->
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    
    <!-- summernote -->
    <script src="{{asset('assets/js/jquery.ui.min.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/styles.js')}}"></script>
    
    
    <!-- select2 -->
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>


<!-- Scripts start-->
@stack('scripts')
<!-- Scripts Ends-->

<!-- Scrollable js -->
<script src="{{asset('assets/js/scrollable/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/scrollable/scrollable-custom.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>

<script type="text/javascript">
    let editors = document.querySelectorAll(".ckeditor");
    for(const editor of editors){
        CKEDITOR.replace( editor, {
            on: {
                contentDom: function( evt ) {
                    // Allow custom context menu only with table elemnts.
                    evt.editor.editable().on( 'contextmenu', function( contextEvent ) {
                        var path = evt.editor.elementPath();
        
                        if ( !path.contains( 'table' ) ) {
                            contextEvent.cancel();
                        }
                    }, null, null, 5 );
                }
            }
        } );
    }
</script>