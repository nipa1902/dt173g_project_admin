<?php include('../includes/header.php');
      include('../config/auth.php');
?>

<?php 
// Start by checking that we have an ID to work with
$id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ) ? intval( $_GET['id'] ) : 0;
if ($id == 0) {
    echo "No such website found. Make sure you entered a valid ID in address bar.";
    return;
}
?>



<div class="container-fluid">

<h2> Uppdatera utbildning </h2>

<form>
<div class="form-group">
    <label for="title">Webbplats</label>
    <input type="text" class="form-control" id="title" placeholder="">
  </div>
  <div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" placeholder="">
  </div>
  <div class="form-group">
    <label for="description">Beskrivning</label>
    <input type="text" class="form-control" id="description" placeholder="">
  </div>
  <div class="form-group">
    <label for="imagelink">Bildlänk</label>
    <input type="text" class="form-control" id="imagelink" placeholder="">
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
document.getElementById("createButton").addEventListener("click", updateWebsite);
window.addEventListener('load', (event) => {
    getWebsite();
});

// Grab the website to fill the form fields
function getWebsite() {
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/websites.php?id=' + id + '')
    

    .then(res => res.json())
    .then(data => {


    // If we do NOT receive a message, it's a good request. Fill the fields!
    if(!data.message) {
        
        data.forEach(website => {
            
            document.getElementById("title").value = website.title;
            document.getElementById("url").value = website.url;
            document.getElementById("description").value = website.description;
            document.getElementById("imagelink").value = website.imagelink;

        })
    } else {
        message.innerHTML = data.message;
    }
    })


}


// Update website on click
function updateWebsite(ev) {

    // Blocks the form from reloading the page
    ev.preventDefault();

    // Variables to post
    let title = document.getElementById("title").value;
    let url = document.getElementById("url").value;
    let description = document.getElementById("description").value;
    let imagelink = document.getElementById("imagelink").value;

    // Create the new website through inputs
    let newWebsite = {'title': title, 'url': url, 
                 'description': description, 'imagelink': imagelink};

    // Send it by PUT
    // Send it by POST as a string
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/websites.php?id=' + id + '', {
        method: 'PUT',
        body: JSON.stringify(newWebsite)
    })

    .then(res => res.json())
    
    // Print the result to our message
    .then(data => message.innerHTML = (data.message))

}

</script>






<?php include('../includes/footer.php');
?>