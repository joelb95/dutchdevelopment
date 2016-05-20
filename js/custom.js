$(document).ready(function() {
  // Directories
  var incl = "incl";
    var content = incl + "/content";
      var modal = content + "/modal";
  
  // Scripts
  var modalprofile_php = modal + "/modal_profile.php";
  var modalalert_php = modal + "/modal_alert.php";
  var modalproject_php = modal + "/modal_project.php";
  
  //-----------------------------------//
  
  // Modal Profile
  $('.person').click(function() {
    var name = $(this).attr('data-name');
    
    $.ajax({
      type : 'post',
      url : modalprofile_php, 
      data : {
        name : name
      }, 
      success : function(data) {
        $('#myProfile').replaceWith(data);
        $('#myProfile').modal('show')
      }
    });
  });
  
  // Modal Alert
  $('.btn-del').click(function() {
    var id = $(this).attr('data-id');
    
    $.ajax({
      type : 'post',
      url : modalalert_php, 
      data : {
        id : id
      }, 
      success : function(data) {
        $('#myAlert').replaceWith(data);
        $('#myAlert').modal('show')
      }
    });
  });
  
  // Modal Project
  $('.test').click(function() {
    var name = $(this).attr('data-name');
    
    $.ajax({
      type : 'post',
      url : modalproject_php, 
      data : {
        name : name
      }, 
      success : function(data) {
        $('#myProject').replaceWith(data);
        $('#myProject').modal('show')
      }
    });
  });
});