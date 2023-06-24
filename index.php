<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12 mt-5">
                  <h1 class="text-center">CRUD POO PDO AJAX</h1>
                 <hr style="height: 1px; color: black;background-color:black">
              </div>
          </div>
          <div class="row">
              <div class="col-md-5 mx-auto">


                  <form action="" method="POST">
                      <div id="result"></div>
                      <div class="form-group">
                       <label for="">title</label>
                       <input type="text" name="title" id="title" class="form-control">
                      </div>
                      <div class="form-group">
                      <label for="Description"></label>  
                      <textarea name="description" id="description" cols="" rows="3" class="form-control">

                      </textarea>  
                      </div>
                      <div class="form-group">
                          <button type="submit" id="submit" class="btn btn-outline-primary">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
          

          <div class="row">
              <div class="col-md-12 mt-1">
                  <div id="show"></div>
                  <div id="fetch"></div>
              </div>
          </div>



      </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SINGLE RECORD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="read_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>





<!-- Edit Modal -->
<div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update">Update</button>
      </div>
    </div>
  </div>
</div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
<script>
    $(document).on("click", "#submit", function(e){
        e.preventDefault();
        
        var title = $("#title").val();
        var description = $("#description").val();
        var submit = $("#submit").val();

      $.ajax({
          url: "insert.php",
          type: "post",
          data: {
              title:title,
              description:description,
              submit:submit
          },
          success: function(data){
              fetch();
              $("#result").html(data);
          }
      })

        $("#form")[0].reset();
    });
    //Fetch Recors

    function fetch(){

        $.ajax({
          url: "fetch.php",
          type: "post",
          success: function(data){
              $("#fetch").html(data);
          }
        });
    }
fetch();

// DELETE RECORD

$(document).on("click","#del",function(e){
    e.preventDefault();

   if(window.confirm("deseas eliminar esto ??")){

    var del_id = $(this).attr("value");

$.ajax({
    url: "del.php",
    type: "post",
    data: {
        del_id:del_id
    },
    success: function(data){
        fetch();
        $("#show").html(data);
    }
});
   }else{
       return false;
   }

 
});

//Read Record

$(document).on("click","#read", function(e){
    e.preventDefault();
    
    var read_id = $(this).attr("value");

    $.ajax({
        url: "read.php",
        type: "post",
        data: {
            read_id:read_id
        },
        success: function(data){
            $("#read_data").html(data);
        }
    });
});



// Edit record

$(document).on("click","#edit", function(e){
  e.preventDefault();
  var edit_id = $(this).attr("value");

    $.ajax({
        url:"edit.php",
        type: "post",
        data: {
            edit_id:edit_id
        },
        success: function(data){
            $("#edit_data").html(data);
        }
    });
    
});

//Update Record

$(document).on("click","#update", function(e){
  e.preventDefault();
  
  var edit_title = $("#edit_title").val();
  var edit_description = $("#edit_description").val();
  var update = $("#update").val();
  var edit_id = $("#edit_id").val();

 

  $.ajax({
    url: "update.php",
    type: "post",
    data: {
      edit_id:edit_id,
      edit_title:edit_title,
      edit_description:edit_description,
      update:update
    },
    success: function(data){
      fetch();
      $("#show").html(data);
    }
  });


});

</script>


</body>
</html>
