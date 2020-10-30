<?php include('../includes/header.php');
      include('../config/auth.php');
?>




<?php 

// Start by checking that we have an ID to work with
$id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval( $_GET['id'] ) : 0;
if ($id == 0) {
    echo "No such job found. Make sure you entered a valid ID in address bar.";
    return;
}
?>



<div class="container-fluid">

<h2> Uppdatera utbildning </h2>

<form>
  <div class="form-group">
    <label for="workplace">Arbetsplats</label>
    <input type="text" class="form-control" id="workplace" placeholder=''>
  </div>
  <div class="form-group">
    <label for="title">Arbetstitel</label>
    <input type="text" class="form-control" id="title" placeholder="">
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
document.getElementById("createButton").addEventListener("click", updateJob);
window.addEventListener('load', (event) => {
    getjob();
});

// Grab the job to fill the form fields
function getjob() {
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/jobs.php?id=' + id + '')
    

    .then(res => res.json())
    .then(data => {


    // If we do NOT receive a message, it's a good request. Fill the fields!
    if(!data.message) {
        
        data.forEach(job => {
            
            document.getElementById("workplace").value = job.workplace;
            document.getElementById("title").value = job.title;
            document.getElementById("startyear").value = job.startyear;
            document.getElementById("startmonth").value = job.startmonth;
            document.getElementById("endyear").value = job.endyear;
            document.getElementById("endmonth").value = job.endmonth;

        })
    } else {
        message.innerHTML = data.message;
    }
    })


}


// Update job on click
function updateJob(ev) {

    // Blocks the form from reloading the page
    ev.preventDefault();

    // Variables to post
    let workplace = document.getElementById("workplace").value;
    let title = document.getElementById("title").value;
    let startyear = document.getElementById("startyear").value;
    let startmonth = document.getElementById("startmonth").value;
    let endyear = document.getElementById("endyear").value;
    let endmonth = document.getElementById("endmonth").value;

    // Create the new job through inputs
    let newjob = {'workplace': workplace, 'title': title, 
                 'startyear': startyear, 'startmonth': startmonth,
                 'endyear': endyear, 'endmonth': endmonth};

    // Send it by PUT
    // Send it by POST as a string
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/jobs.php?id=' + id + '', {
        method: 'PUT',
        body: JSON.stringify(newjob)
    })

    .then(res => res.json())
    
    // Print the result to our message
    .then(data => message.innerHTML = (data.message))

}

</script>






<?php include('../includes/footer.php');
?>