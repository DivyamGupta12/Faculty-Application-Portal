
<?php
$server = "localhost";
$username = "root";
$password = "mysql123";
$database = "mydatabase";

$conn = mysqli_connect($server, $username, $password, $database,3307);
session_start();

// Check if connection to MySQL server is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the database if it doesn't exist
$sql="CREATE DATABASE IF NOT EXISTS mydatabase";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Establish connection to the newly created database
$conn=mysqli_connect($server,$username,$password,$database,3307);

// Check if connection to the database is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create tables in the database
$sql="CREATE TABLE IF NOT EXISTS `phd_thesis` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `role` VARCHAR(255) NOT NULL , `ongoing/completed` VARCHAR(255) NOT NULL ,  `year` VARCHAR(255) NOT NULL  , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS `masters_deg` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `role` VARCHAR(255) NOT NULL , `ongoing/completed` VARCHAR(255) NOT NULL ,  `year` VARCHAR(255) NOT NULL  , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);


$sql="CREATE TABLE IF NOT EXISTS`bachelors_deg` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `role` VARCHAR(255) NOT NULL , `ongoing/completed` VARCHAR(255) NOT NULL ,  `year` VARCHAR(255) NOT NULL  , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

?>

<?php
if(isset($_POST['phd_scholar'], $_POST['phd_thesis'], $_POST['phd_role'], $_POST['phd_ths_status'], $_POST['phd_ths_year'])) {
    $names = $_POST['phd_scholar'];
    $titles = $_POST['phd_thesis'];
    $roles = $_POST['phd_role'];
    $statuses = $_POST['phd_ths_status'];
    $years = $_POST['phd_ths_year'];
    

    // Prepare and execute query
    foreach ($names as $key => $author) {
        $name = $names[$key];
        $title = $titles[$key];
        $role=$roles[$key];
        $status=$statuses[$key];
        $year=$years[$key];
       

        $sql = "INSERT INTO `phd_thesis` (`name`, `title`, `role`, `ongoing/completed`,`year`)
                VALUES ('$name', '$title', '$role', '$status', '$year')";

        if(mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<?php
if(isset($_POST['pg_scholar'], $_POST['pg_thesis'], $_POST['pg_role'], $_POST['pg_status'], $_POST['pg_ths_year'])) {
    $names = $_POST['pg_scholar'];
    $titles = $_POST['pg_thesis'];
    $roles = $_POST['pg_role'];
    $statuses = $_POST['pg_status'];
    $years = $_POST['pg_ths_year'];
    
    

    // Prepare and execute query
    foreach ($names as $key => $author) {
        $name = $names[$key];
        $title = $titles[$key];
        $role=$roles[$key];
        $status=$statuses[$key];
        $year=$years[$key];
       

        $sql = "INSERT INTO `masters_deg` (`name`, `title`, `role`, `ongoing/completed`,`year`)
                VALUES ('$name', '$title', '$role', '$status', '$year')";

        if(mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<?php
if(isset($_POST['ug_scholar'], $_POST['ug_thesis'], $_POST['ug_role'], $_POST['ug_status'], $_POST['ug_ths_year'])) {
    $names = $_POST['ug_scholar'];
    $titles = $_POST['ug_thesis'];
    $roles = $_POST['ug_role'];
    $statuses = $_POST['ug_status'];
    $years = $_POST['ug_ths_year'];
    
    

    // Prepare and execute query
    foreach ($names as $key => $author) {
        $name = $names[$key];
        $title = $titles[$key];
        $role=$roles[$key];
        $status=$statuses[$key];
        $year=$years[$key];
       

        $sql = "INSERT INTO `bachelors_deg` (`name`, `title`, `role`, `ongoing/completed`,`year`)
                VALUES ('$name', '$title', '$role', '$status', '$year')";

        if(mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    header("location: page7relinfo.php");
}
?>
<html>
<head>
	<title>Academic Experience </title>
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


	
</head>
<style type="text/css">
	body { background : linear-gradient(135deg, #CEDCA6, #f0f7ee); padding-top:0px!important;}

</style>
<body>
<div class="container-fluid" style="background-color: cornsilk; margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

        		<h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
    			<h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
    			

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
			<h3 style="color: #515e5e; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3>

<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}

span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  /*margin-bottom: 20px!important;*/

}
hr{
  border-top: 1px solid #025198 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}
.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}
.btn-primary {
  padding: 9px;
}
</style>
<script type="text/javascript">
             
            $(function () {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";

var counter_thesis=1;
var counter_course=1;
var counter_pg_thesis=1;
var counter_ug_thesis=1;

  $(document).ready(function(){
  
  $("#add_thesis").click(function(){
          create_tr();
          create_serial('thesis_sup');
          create_input('phd_scholar[]', 'Scholar','phd_scholar'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_thesis[]', 'Title of Thesis','phd_thesis'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_role[]', 'Role','phd_role'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup', false,true);
          create_input('phd_ths_status[]', 'Ongoing/Completed', 'phd_ths_status'+counter_thesis,'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_ths_year[]', 'Ongoing Since/ Year of Completion', 'phd_ths_year'+counter_thesis,'thesis_sup',counter_thesis, 'thesis_sup',true);
          counter_thesis++;
          return false;
    });


 
  $("#add_pg_thesis").click(function(){
          create_tr();
          create_serial('pg_thesis_sup');
          create_input('pg_scholar[]', 'Scholar','pg_scholar'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_thesis[]', 'Title of Thesis','pg_thesis'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_role[]', 'Role','pg_role'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup', false,true);
          create_input('pg_status[]', 'Ongoing/Completed', 'pg_status'+counter_pg_thesis,'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_ths_year[]', 'Ongoing Since/ Year of Completion', 'pg_ths_year'+counter_pg_thesis,'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup',true);
          counter_pg_thesis++;
          return false;
    });

  $("#add_ug_thesis").click(function(){
          create_tr();
          create_serial('ug_thesis_sup');
          create_input('ug_scholar[]', 'Scholar','ug_scholar'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_thesis[]', 'Title of Thesis','ug_thesis'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_role[]', 'Role','ug_role'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup', false,true);
          create_input('ug_status[]', 'Ongoing/Completed', 'ug_status'+counter_ug_thesis,'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_ths_year[]', 'Ongoing Since/ Year of Completion', 'ug_ths_year'+counter_ug_thesis,'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup',true);
          counter_ug_thesis++;
          return false;
    });

});
  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
     tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function deleterow(e){
    var rowid=$(e).attr("data-id");
    var textbox=$("#id"+rowid).val();
    $.ajax({
            type: "POST",
            url  : "https://ofa.iiti.ac.in/facrec_che_2023_july_02/Acd_ind/deleterow/",
            data: {id: textbox},
                success: function(result) { 
                if(result.status=="OK"){
                $('.row_'+rowid).remove();
                            //remove_row('award',rowid, 'award');
                }
                   
                }});

   
    }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false, datepicker_set=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='Supervisor with no Co-supervisor'>Supervisor with no Co-supervisor</option>";
      sel.innerHTML+="<option value='Supervisor with Co-supervisor'>Supervisor with Co-supervisor</option>";
      sel.innerHTML+="<option value='Co-Supervisor'>Co-Supervisor</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
     $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
    
  }
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    
  }
</script>




<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
              <input type="hidden" name="ci_csrf_token" value="" />
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong>q w <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a href="logout.php" class="btn btn-sm btn-success  pull-right" style ="background-color: rgb(202,39,71);">Logout</a>
                    </div>
                  </div>
                
                
        </legend>

  
<!-- PHD Theses supervision -->


<h4 style="text-align:center; font-weight: bold; color: #060606;">13. Research Supervision:</h4>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading" style="color: #252527; background-color: #f99090;">(A) PhD Thesis Supervision  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_thesis" style = "background-color: #4dad32;">Add Details</button></div>
        <div class="panel-body">

              <table class="table table-bordered">
                  <tbody id="thesis_sup">
                  
                  <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-3"> Name of Student/Research Scholar </th>
                    <th class="col-md-2"> Title of Thesis</th>
                    <th class="col-md-2"> Role</th>
                    <th class="col-md-2"> Ongoing/Completed</th>
                    <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                    <!-- <th class="col-md-2"> </th> -->
                    
                  </tr>


                                    
                  <tr height="60px" class="row_1">
                   
                    <td class="col-md-1"> 
                      1                      </td>
                    <td class="col-md-2"> 
                      <input id="id1" name="id[]" type="hidden"  class="form-control input-md" required=""> 

                        <input id="phd_scholar1" name="phd_scholar[]" type="text" placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis1" name="phd_thesis[]" type="text"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role1" name="phd_role[]" type="text" value="Supervisor with no Co-supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option selected='selected' value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option  value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status1" name="phd_ths_status[]" type="text"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year1" name="phd_ths_year[]" type="text" placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                    
                  <tr height="60px" class="row_2">
                   
                    <td class="col-md-1"> 
                      2                      </td>
                    <td class="col-md-2"> 
                      <input id="id2" name="id[]" type="hidden"  class="form-control input-md" required=""> 

                        <input id="phd_scholar2" name="phd_scholar[]" type="text" placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis2" name="phd_thesis[]" type="text" placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role2" name="phd_role[]" type="text" value="Supervisor with no Co-supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option selected='selected' value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option  value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status2" name="phd_ths_status[]" type="text" placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year2" name="phd_ths_year[]" type="text" placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide2" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                    
                  <tr height="60px" class="row_3">
                   
                    <td class="col-md-1"> 
                      3                      </td>
                    <td class="col-md-2"> 
                      <input id="id3" name="id[]" type="hidden" class="form-control input-md" required=""> 

                        <input id="phd_scholar3" name="phd_scholar[]" type="text" placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis3" name="phd_thesis[]" type="text" placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role3" name="phd_role[]" type="text" value="Supervisor with Co-supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option  value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status3" name="phd_ths_status[]" type="text" placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year3" name="phd_ths_year[]" type="text" placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide3" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


<!-- Master Theses supervision -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading" style="color: #252527; background-color: #f99090;">(B). M.Tech/M.E./Master's Degree  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_pg_thesis" style = "background-color: #4dad32;">Add Details</button></div>
              <div class="panel-body">

                    <table class="table table-bordered">
                        <tbody id="pg_thesis_sup">
                        
                        <tr height="30px">
                          <th class="col-md-1"> S. No.</th>
                          <th class="col-md-3"> Name of Student/Research Scholar </th>
                          <th class="col-md-2"> Title of Thesis</th>
                          <th class="col-md-2"> Role</th>
                          <th class="col-md-2"> Ongoing/Completed</th>
                          <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                          
                        </tr>


                                                
                        <tr height="60px" class="row_1">
                         
                          <td class="col-md-1"> 
                            1                            </td>
                          <td class="col-md-2"> 
                            <input id="id1" name="id[]" type="hidden" class="form-control input-md" required=""> 

                              <input id="pg_scholar1" name="pg_scholar[]" type="text" placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis1" name="pg_thesis[]" type="text" placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role1" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status1" name="pg_status[]" type="text" placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year1" name="pg_ths_year[]" type="text" placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_2">
                         
                          <td class="col-md-1"> 
                            2                            </td>
                          <td class="col-md-2"> 
                            <input id="id2" name="id[]" type="hidden"  class="form-control input-md" required=""> 

                              <input id="pg_scholar2" name="pg_scholar[]" type="text" placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis2" name="pg_thesis[]" type="text"  placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role2" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status2" name="pg_status[]" type="text"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year2" name="pg_ths_year[]" type="text" placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide2" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_3">
                         
                          <td class="col-md-1"> 
                            3                            </td>
                          <td class="col-md-2"> 
                            <input id="id3" name="id[]" type="hidden" class="form-control input-md" required=""> 

                              <input id="pg_scholar3" name="pg_scholar[]" type="text" placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis3" name="pg_thesis[]" type="text" placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role3" name="pg_role[]" type="text" value="Supervisor with Co-supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status3" name="pg_status[]" type="text"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year3" name="pg_ths_year[]" type="text"   placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide3" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>




<!-- Bachelor Theses supervision -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading" style="color: #252527; background-color: #f99090;">(C) B.Tech/B.E./Bachelor's Degree &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_ug_thesis" style = "background-color: #4dad32;">Add Details</button></div>
              <div class="panel-body">

                    <table class="table table-bordered">
                        <tbody id="ug_thesis_sup">
                        
                        <tr height="30px">
                          <th class="col-md-1"> S. No.</th>
                          <th class="col-md-3"> Name of Student </th>
                          <th class="col-md-2"> Title of Project</th>
                          <th class="col-md-2"> Role</th>
                          <th class="col-md-2"> Ongoing/Completed</th>
                          <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                          
                        </tr>


                                                
                        <tr height="60px" class="row_1">
                         
                          <td class="col-md-1"> 
                            1                            </td>
                          <td class="col-md-2"> 
                            <input id="id1" name="id[]" type="hidden"   class="form-control input-md" required=""> 

                              <input id="ug_scholar1" name="ug_scholar[]" type="text"   placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis1" name="ug_thesis[]" type="text"   placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role1" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status1" name="ug_status[]" type="text"   placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year1" name="ug_ths_year[]" type="text"   placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_2">
                         
                          <td class="col-md-1"> 
                            2                            </td>
                          <td class="col-md-2"> 
                            <input id="id2" name="id[]" type="hidden" value="205"  class="form-control input-md" required=""> 

                              <input id="ug_scholar2" name="ug_scholar[]" type="text"   placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis2" name="ug_thesis[]" type="text"   placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role2" name="pg_role[]" type="text" value="Co-Supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status2" name="ug_status[]" type="text"   placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year2" name="ug_ths_year[]" type="text"   placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide2" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        <tr height="60px" class="row_3">
                         
                          <td class="col-md-1"> 
                            3                            </td>
                          <td class="col-md-2"> 
                            <input id="id3" name="id[]" type="hidden" value="206"  class="form-control input-md" required=""> 

                              <input id="ug_scholar3" name="ug_scholar[]" type="text"  placeholder="Research Scholar" class="form-control input-md" required=""> 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis3" name="ug_thesis[]" type="text"   placeholder="Title of Thesis" class="form-control input-md" required=""> 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role3" name="pg_role[]" type="text" value="Supervisor with Co-supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" required="">
                                <option value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option selected='selected' value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status3" name="ug_status[]" type="text" value="Amet vero facere am"  placeholder="Ongoing/Completed" class="form-control input-md" required=""> 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year3" name="ug_ths_year[]" type="text" value="1983"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" required=""> 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide3" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      <!-- Courses Taken -->

            <!-- Button -->

            <div class="form-group">
              
              <div class="col-md-1">
                <a href="page5exp.php" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
              </div>

              <div class="col-md-11">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
                
              </div>
              
            </div>

            <!-- <div class="form-group">
              <label class="col-md-5 control-label" for="submit"></label>
              <div class="col-md-4">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-primary">SUBMIT</button>

              </div>
            </div> -->

            </fieldset>
            </form>
            
            

        </div>
    </div>
</div>

<div id="footer"></div>
</body>
</html>

<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script>