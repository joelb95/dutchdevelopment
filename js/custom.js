$(document).ready(function() {
    var table = $('#table-dttt').DataTable();
    $("<button type='button' class='btn btn-default btn-left' data-toggle='modal' data-target='#insert-project'>Project Toevoegen</button>").prependTo("div.dataTables_filter");
 
} );

function deleteProject(id) {
  //Just a pass
  confirm = "confirm";
  
  $.ajax({
    type: "POST",
    url: "delete_project.php",
    data: {
      confirm: confirm,
      id : id
    },
    success: function (data) {
      location.reload();
    }
  });
}