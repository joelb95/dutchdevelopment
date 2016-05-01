$(document).ready(function() {
  // Directories
  var incl = "incl";
    var content = incl + "/content";
      var modal = content + "/modal";
  
  // Scripts
  var modal_php = modal + "/modal.php";
  
  // Modal
  $('.person').click(function() {
    var name = $(this).attr('data-name');
    
    $.ajax({
      type : 'post',
      url : modal_php, 
      data : {
        name : name
      }, 
      success : function(data) {
        $('#myModal').replaceWith(data);
        $('#myModal').modal('show')
      }
    });
  });
  
  // var table = $('#table-dttt').DataTable();
  // $("<button type='button' class='btn btn-default btn-left' data-toggle='modal' data-target='#insert-project'>Project Toevoegen</button>").prependTo("div.dataTables_filter");
 
} );

// function deleteProject(id) {
//   //Just a pass
//   confirm = "confirm";
  
//   $.ajax({
//     type: "POST",
//     url: "delete_project.php",
//     data: {
//       confirm: confirm,
//       id : id
//     },
//     success: function (data) {
//       location.reload();
//     }
//   });
// }