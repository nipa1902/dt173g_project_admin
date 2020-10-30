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

<div id="message">
</div>
</div>

<script>
// Pass the ID from PHP to JS 
const id = <?php echo $id ?>;

// Message variable
let message = document.getElementById("message");
message.innerHTML = "";

// Run delete function
window.addEventListener('load', () => {
    deleteJob();
});

function deleteJob() {
    fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/jobs.php?id=' + id + '', {
    method: 'DELETE',
    })

    .then(res => res.json())
    .then(data => message.innerHTML = (data.message))
    
}
</script>



<?php include('../includes/footer.php');
?>