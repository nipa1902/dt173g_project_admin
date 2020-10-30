<div class="container-fluid bg-light">
<div id="websiteoutput">

<div class="row">
<div class="col-sm-3"><p class="font-weight-bold">Webbplats</p></div>
<div class="col-sm-3"><p class="font-weight-bold">URL</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Beskrivning</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Bildlänk</p></div>
</div>

</div>
</div>

<script>

fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/websites.php')

.then(res => res.json())

    .then(data => {
        data.forEach(website => {

        // Store object properties as variables

            let a = website.title;
            let b = website.url;
            let c = website.description;
            let d = website.imagelink;

            // Store html string
            let colopen = "<div class='col-sm-3'>";
            let colclose = "</div>";
            let spanopen = "<span>";
            let spanclose = "</span>";
            
            // Locate output element
            let outputEl = document.getElementById("websiteoutput");
            
            //Print
            outputEl.innerHTML +=  
                            "<div class='row'>" + colopen + a + colclose +
                            colopen + `<a href=${b}>${b}</a>` + colclose +
                            colopen + c + colclose +
                            colopen + d + spanopen +
                            `<a href=websites/update.php?id=${website.id}>U</a>` + " | " +
                            `<a href=websites/delete.php?id=${website.id}>D</a>` + spanclose + colclose + colclose;


        })
    })

</script>

