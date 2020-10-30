<?php include('../includes/header.php');
      include('../config/auth.php');
?>

<div class="container-fluid">

<h2> Lägg till ny webbplats </h2>

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

let message = document.getElementById("message");
message.innerHTML = "";

// listen for the button click
document.getElementById("createButton").addEventListener("click", addWebsite);

// Post the course via FETCH
function addWebsite(ev) {

    // Blocks the form from reloading the page
    ev.preventDefault();

    // Variables to post
    let title = document.getElementById("title").value;
    let url = document.getElementById("url").value;
    let description = document.getElementById("description").value;
    let imagelink = document.getElementById("imagelink").value;

    // Create the new course through inputs
    let newWebsite = {'title': title, 'url': url, 
                 'description': description, 'imagelink': imagelink};

    // Send it by POST as a string
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/websites.php', {
        method: 'POST',
        body: JSON.stringify(newWebsite)
    })

    .then(res => res.json())
    
    // Print the result to our message
    .then(data => message.innerHTML = (data.message))

}

</script>



<?php include('../includes/footer.php');
?>