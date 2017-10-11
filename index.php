
<html>
<title>ILR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="styles.css">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Chemistry Department<br>Undergrad ILR</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" onclick="set_hidden('showcase');w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
    <a href="#showcase" onclick="set_hidden('addStudent');w3_close()" class="w3-bar-item w3-button w3-hover-white">Add Student</a>
    <a href="#services" onclick="set_hidden('addStudent');w3_close()" class="w3-bar-item w3-button w3-hover-white">Other Thing</a>

  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Chemistry Department Undergrad ILR</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px"></div>

  <!-- Header -->




  <!-- Add Student -->
  <div class="w3-container hide" id="addStudent" style="margin-top:75px;visibility:hidden">
    <h1 class="w3-xxxlarge w3-text-red"><b>Add Student</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">

    <form class ="stuform" method="post">
    <label>Student Name: </label><input class="stuform" type="text" name="studentName" maxlength="70" required>
    <label>StudentID: </label><input class = "stuform" type="text" name="studentID" maxlength="6" required>
    <label>Entry Date: </label><input class = "stuform" type="date" name="date" id="entryDate" required readonly>
    <p>
    <label>Major:</label> <select class = "stuform" name="major" id='major'  onchange="makeOther();checkOther();"required>
          <option value="chemistry" >Chemistry</option>
          <option value="biochemestry" >Biochemistry</option>
          <option value="OtherMenu" >Other</option>
        </select>
    <div id=otherDiv>
    </div>
    <label>Semester:</label> <select class = "stuform" name="semester"  required>
          <option value="null" ></option>
          <option value="fall" >fall</option>
          <option value="spring" >spring</option>
          <option value="summer" >summer</option>
        </select>
    <label>Year: </label><select class = "stuform" name="year" id='year' required>
    </select>

  </p>
    <label>Select picture to upload</label> <input type="file" name="stupicture" id="StuPic">


    <input type="submit" name="submit" value="Submit">


    </form>
  </div>


<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></p></div>






<script>
let date = new Date();
document.getElementById('entryDate').valueAsDate = date;
let otherExists = false;
let select = document.getElementById('year');




for(let i=date.getFullYear()-4;i < date.getFullYear(); i++){
  console.log(i);
  let opt = document.createElement('option');
  opt.value = i;
  opt.innerHTML =i;
  select.appendChild(opt);
}



function makeOther(){

  let major = document.getElementById('major').value;
    if (major == 'Other' && !otherExists){
      let element = document.getElementById("otherDiv");
      console.log(element);
         let field = document.createElement('input');
         //input class = "stuform" id="other" type="text" name="other" maxlength="25" style="visibility:hidden"
         field.type = "text";
         field.name = "other";
         field.id='other';
         otherExists = true;

         element.appendChild(field);
    }
    else{
      otherExists = false;
       let element = document.getElementById('otherDiv');
       let child = document.getElementById("other");
       element.removeChild(child);

    }


 }




function checkOther(){
let major = document.getElementById('major').value;
  if (major == 'Other'){
     document.getElementById('other').style.visibility ='visible';
  }
}

function set_hidden(section){
  let divs = document.body.getElementsByClassName('hide');
  for(let i=0;i<divs.length;i++){
     document.getElementsByClassName('hide')[i].style.visibility ="hidden";
  }
  //document.getElementById(section).style.position = 'absolute';
  document.getElementById(section).style.visibility = 'visible';
}

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}


// Modal Image Gallery
function onClick(element){
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}



</script>

<?php
include 'QueryHandler.php';
include 'SecureInput.php';
include 'DebugToConsole.php';

$major = $_POST['major'];

if($major == 'Other'){

  $major = $_POST['other'];

}

if(isset($_POST['submit'])){

   QueryHandler::insert_student($_POST['studentID'],$_POST['studentName'],$major,$_POST['year'],$_POST['semester']);

   if(count($_FILES) > 0) {
   if(is_uploaded_file($_FILES['stupicture']['tmp_name'])) {
   mysql_connect("localhost", "root", "","capstone");
   mysql_select_db ("capstone");
   $imgData =addslashes(file_get_contents($_FILES['stupicture']['tmp_name']));
   $imageProperties = getimageSize($_FILES['stupicture']['tmp_name']);
   $sql = "INSERT INTO students(stupicture ,imageData)
   VALUES('{$imageProperties['mime']}', '{$imgData}')";
   $current_id = mysql_query($sql) or die("<script>console.log('picture failed');</script>" . mysql_error());
   if(isset($current_id)) {
   header("Location: listImages.php");
   }}}



}





?>


</body>
</html>
