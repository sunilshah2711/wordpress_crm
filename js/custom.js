
jQuery(document).ready(function ($) {

    var table = $('#example').DataTable({
        'columnDefs': [{
           'targets': 0,
           'searchable': false,
           'orderable': false,
           'className': 'dt-body-center',
         //   'render': function (data, type, full, meta){
         //    // console.log($('<div/>').text(data).html())
         //       // return '<input type="checkbox" name="contactid[]" value="' + $('<div/>').text(data).html() + '">';
         //   }
        }],
        'order': [[1, 'asc']],
        dom: '<"top">rt<"bottom"iflp>',
     });

   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
    // Get all rows with search applied
    var rows = table.rows({ 'search': 'applied' }).nodes();
    // Check/uncheck checkboxes for all rows in the table
    $('input[type="checkbox"]', rows).prop('checked', this.checked);
 });

 // Handle click on checkbox to set state of "Select all" control
 $('#example tbody').on('change', 'input[type="checkbox"]', function(){
    // If checkbox is not checked
    if(!this.checked){
       var el = $('#example-select-all').get(0);
       // If "Select all" control is checked and has 'indeterminate' property
       if(el && el.checked && ('indeterminate' in el)){
          // Set visual state of "Select all" control
          // as 'indeterminate'
          el.indeterminate = true;
       }
    }
 });
   

 $("#tile-1 .nav-tabs a").click(function() {
   var position = $(this).parent().position();
   var width = $(this).parent().width();
     $("#tile-1 .slider").css({"left":+ position.left,"width":width});
 });
 
 var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
 var actPosition = $("#tile-1 .nav-tabs .active").position();
 $("#tile-1 .slider").css({"left":+ actPosition.left,"width": actWidth});
  
});

jQuery(document).ready(function ($) {
   var dataTable = $('#example').dataTable();
   $("#searchbox").keyup(function() {
       dataTable.fnFilter(this.value);
   });   
   
 
});

document.addEventListener('DOMContentLoaded', function() {
   
 });


 