
<div class="container-fluid bg-light">
<div id="joboutput">

<div class="row">
<div class="col-sm-3"><p class="font-weight-bold">Arbetsplats</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Arbetstitel</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Startdatum</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Slutdatum</p></div>
</div>

</div>
</div>

<script>

fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/jobs.php')

.then(res => res.json())

    .then(data => {
        data.forEach(job => {

        // Store object properties as variables

            let a = job.workplace;
            let b = job.title;
            let c = job.startyear;
            let d = job.startmonth;
            let e = job.endyear;
            let f = job.endmonth;


            // Store html string
            let colopen = "<div class='col-sm-3'>";
            let colclose = "</div>";
            let spanopen = "<span>";
            let spanclose = "</span>";
            
            // Locate output element
            let outputEl = document.getElementById("joboutput");
            
            //Print
            outputEl.innerHTML +=   
                            "<div class='row'>" + colopen + a + colclose +
                            colopen + b + colclose +
                            colopen + c + "/" + d + colclose +
                            colopen + e + "/" + f + spanopen +
                            `<a href=jobs/update.php?id=${job.id}>U</a>` + " | " +
                            `<a href=jobs/delete.php?id=${job.id}>D</a>` + spanclose + colclose + colclose ;

        })
    })

</script>

