<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume Management System</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger text-light" href="#page-top">EGM Job Application</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-strong="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-light" href="positionForm.php">Position</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-light" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </nav>


























  <!-- Contact Section -->
  <section class="page-section" id="apply">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Resume Management</h2>
          <hr class="divider my-4">














<?php
require_once "connection.php";



      $sql="SELECT candidate_id,
                  candidate_firstname,
                  candidate_lastname,
                  candidate_email,
                  candidate_phone,
                  candidate_address,
                  created_date
                  FROM tbl_candidate";
      $result=mysqli_query($connection,$sql);
?>
  <!-- DataUsers Card-->
  <div class=" mb-3">
    <div class="">
    </div>  
    <div class="card-body">
      <div class="">
        <table class="table table-hover table-condensed table-bordered" id="dataTable">
          <thead class="p-3 mb-2 bg-light font-weight-bold">
            <tr>
              <td>No.</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>E-mail</td>
              <td>Phone</td>
              <td>Address</td>
              <td>Sent Date</td>
              <td>Actions</td>
            </tr>
          </thead>
          <tbody >
            <?php 
            while ($row=mysqli_fetch_row($result)) {
              ?>
              <tr >
                <td class="text-center"><?php echo $row[0] ?></td>
                <td class="text-center""><?php echo $row[1] ?></td>
                <td class="text-center""><?php echo $row[2] ?></td>
                <td class="text-center""><?php echo $row[3] ?></td>
                <td class="text-center""><?php echo $row[4] ?></td>
                <td class="text-center""><?php echo $row[5] ?></td>
                <td class="text-center""><?php echo $row[6] ?></td>


                <td class="text-center""> 
                  <span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalView" data-toggle="tooltip" data-placement="bottom" title="View" onclick="addUser('<?php echo $row[0]; ?>')">
                    <span>Download CV</span>
                  </span>
                </td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>




















          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <!-- Footer -->
  <footer class="bg-light py-5 fixed-bottom">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - EGMedia</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>
<script>
  $(function() {

      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });

      function clear(){
        $('#frmContact')[0].reset();
        $(".custom-file-input").siblings(".custom-file-label").addClass("selected").html("Choose file...");
      }

      $('#submit').click(function(){
        submit();
      });

      var error_firstname = false;
      var error_lastname = false;
      var error_email = false;
      var error_phone = false;
      var error_address= false;
      var error_resume= false;

      $("#firstname").focusout(function() {
          check_firstname();
      });
      $("#lastname").focusout(function() {
          check_lastname();
      });
      $("#email").focusout(function() {
          check_email();
      });
      $("#phone").focusout(function() {
          check_phone();
      });
      $("#address").focusout(function() {
          check_address();
      });
      $("#resume").focusout(function() {
          check_resume();
      });

      function check_firstname() {

          if ($.trim($('#firstname').val()) == '') {
              $("#firstname_error_message").html("Input is blank!");
              $("#firstname_error_message").show();
              error_firstname = true;
          } else {
              $("#firstname_error_message").hide();
          }
      }

      function check_lastname() {

          if ($.trim($('#lastname').val()) == '') {
              $("#lastname_error_message").html("Input is blank!");
              $("#lastname_error_message").show();
              error_lastname = true;
          } else {
              $("#lastname_error_message").hide();
          }
      }

      function check_email() {

          var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

          if ($.trim($('#email').val()) == '') {
              $("#email_error_message").html("Input is blank!");
              $("#email_error_message").show();
              error_email = true;
          } else if (!(pattern.test($("#email").val()))) {
              $("#email_error_message").html("Invalid email address");
              $("#email_error_message").show();
              error_email = true;
          } else {
              $("#email_error_message").hide();
          }
      }

    function check_phone() {

        if ($.trim($('#phone').val()) == '') {
            $("#phone_error_message").html("Input is blank!");
            $("#phone_error_message").show();
            error_phone = true;
        } else {
            $("#phone_error_message").hide();
        }
    }

    function check_address() {

        if ($.trim($('#address').val()) == '') {
            $("#address_error_message").html("Input is blank!");
            $("#address_error_message").show();
            error_address = true;
        } else {
            $("#address_error_message").hide();
        }
    }

    function check_resume() {

        if ($('#resume').get(0).files.length === 0) {
            $("#resume_error_message").html("No files selected.!");
            $("#resume_error_message").show();
            error_resume = true;
        } else {
            $("#resume_error_message").hide();
        }
    }
      function submit(){

          error_firstname = false;
          error_lastname = false;
          error_email = false;
          error_phone = false;
          error_address = false;
          error_resume = false;


          check_firstname();
          check_lastname();
          check_email();
          check_phone();
          check_address();
          check_resume();


          if (error_firstname == false && error_lastname == false && error_email == false && error_phone == false && error_address == false && error_resume == false) {       

        var formData = new FormData(document.getElementById("frmContact"));

        $.ajax({
          url: "candidate.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend:function(){
            $('#submit').attr('disabled', 'disabled');
            $('#submit').val('Sending...');
          },
          success:function(data){
            $("#alert_sucess_message").show();
            $("#alert_error_message").hide();
            $('#submit').attr('disabled', false);
            $('#submit').val($('#action').val());            
            clear();
          }
        });


          } else {
              $("#alert_sucess_message").hide();
              $("#alert_error_message").show();
              return false;
          }
      }
  });








</script>