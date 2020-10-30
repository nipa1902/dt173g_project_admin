<?php include('../includes/header.php');
      include('../config/auth.php');
?>




<?php 

// Start by checking that we have an ID to work with
$id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval( $_GET['id'] ) : 0;
if ($id == 0) {
    echo "No such course found. Make sure you entered a valid ID in address bar.";
    return;
}
?>



<div class="container-fluid">

<h2> Uppdatera utbildning </h2>

<form>
  <div class="form-group">
    <label for="institution">Lärosäte</label>
    <input type="text" class="form-control" id="institution" placeholder=''>
  </div>
  <div class="form-group">
    <label for="coursename">Kurs/Utbildningsnamn</label>
    <input type="text" class="form-control" id="coursename" placeholder="">
  </div>
  <div class="form-group">
    <label for="startyear">Startår</label>
    <input type="text" class="form-control" id="startyear" placeholder="">
  </div>
  <div class="form-group">
    <label for="startmonth">Startmånad</label>
    <input type="text" class="form-control" id="startmonth" placeholder="">
  </div>
  <div class="form-group">
    <label for="endyear">Slutår</label>
    <input type="text" class="form-control" id="endyear" placeholder="">
  </div>
  <div class="form-group">
    <label for="endmonth">Slutmånad</label>
    <input type="text" class="form-control" id="endmonth" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary" id="createButton">Skicka</button>
</form>

<div id="message" class="font-weight-bold"></div>

</div>




<script>

// Pass the ID from PHP to JS 
const id = <?php echo $id ?>;
console.log(id);

// Message variable
let message = document.getElementById("message");
message.innerHTML = "";

// listen for the button click
document.getElementById("createButton").addEventListener("click", updateCourse);
window.addEventListener('load', (event) => {
    getCourse();
});

// Grab the course to fill the form fields
function getCourse() {
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/courses.php?id=' + id + '')
    

    .then(res => res.json())
    .then(data => {


    // If we do NOT receive a message, it's a good request. Fill the fields!
    if(!data.message) {
        
        data.forEach(course => {
            
            document.getElementById("institution").value = course.institution;
            document.getElementById("coursename").value = course.coursename;
            document.getElementById("startyear").value = course.startyear;
            document.getElementById("startmonth").value = course.startmonth;
            document.getElementById("endyear").value = course.endyear;
            document.getElementById("endmonth").value = course.endmonth;

        })
    } else {
        message.innerHTML = data.message;
    }
    })


}


// Update course on click
function updateCourse(ev) {

    // Blocks the form from reloading the page
    ev.preventDefault();

    // Variables to post
    let institution = document.getElementById("institution").value;
    let coursename = document.getElementById("coursename").value;
    let startyear = document.getElementById("startyear").value;
    let startmonth = document.getElementById("startmonth").value;
    let endyear = document.getElementById("endyear").value;
    let endmonth = document.getElementById("endmonth").value;

    // Create the new course through inputs
    let newCourse = {'institution': institution, 'coursename': coursename, 
                 'startyear': startyear, 'startmonth': startmonth,
                 'endyear': endyear, 'endmonth': endmonth};

    // Send it by PUT
    // Send it by POST as a string
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/courses.php?id=' + id + '', {
        method: 'PUT',
        body: JSON.stringify(newCourse)
    })

    .then(res => res.json())
    
    // Print the result to our message
    .then(data => message.innerHTML = (data.message))

}

</script>






<?php include('../includes/footer.php');
?>