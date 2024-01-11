jQuery(document).ready(function ($) {

  //Delete modal for any model row
  $(function () {
    $('.js-sweetalert').on('click', function () {

          var token = $("meta[name='csrf-token']").attr("content");
          $route=$(this).data("route");

          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this item!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#dc3545",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
          }, function () {
         
              $.ajax(
                  {
                      url:  $route ,
                      type: 'DELETE',
                      data: {
                          "_token": token,
                      },
                      success: function (){
                      }
                  });
        
                  swal({
                      title: "Deleted",
                      text: "Your item has been deleted.",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonColor: "#007bff",
                      confirmButtonText: "Ok",
                      closeOnConfirm: false
                  },function(){
                      location.reload();
                  });
          });
        
    });
  });
  //end delete modal

  //view task modal
  $(document).on('click', '.viewTaskModal', function (event) {
    $this = $(this);
    $id = $this.attr('id');
    $row = $this.attr('data-attr-row');
    $title = $this.attr('data-attr-title');
    $description = $this.attr('data-attr-description');

    $('#view-task-id').text($id);
    $('#view-task-row-number').val($row);
    $('#view-task-title').text($title);
    $('#view-task-description').text($description);

  });
  //end view task modal

});