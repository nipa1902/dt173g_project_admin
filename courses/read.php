<div class="container-fluid bg-light">
<div id="courseoutput">

<div class="row">
<div class="col-sm-3"><p class="font-weight-bold">Lärosäte</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Utbildning</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Startdatum</p></div>
<div class="col-sm-3"><p class="font-weight-bold">Slutdatum</p></div>
</div>
</div>
</div>


<script>

fetch('http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/api/courses.php')

.then(res => res.json())

    .then(data => {
        data.forEach(course => {

        // Store object properties as variables

            let a = course.institution;
            let b = course.coursename;
            let c = course.startyear;
            let d = course.startmonth;
            let e = course.endyear;
            let f = course.endmonth;


            // Store html string
            let colopen = "<div class='col-sm-3'>";
            let colclose = "</div>";
            let spanopen = "<span>";
            let spanclose = "</span>";
            
            // Locate output element
            let outputEl = document.getElementById("courseoutput");
            
            //Print -- we use spans for update/delete placement so Bootstrap does not get mad
            outputEl.innerHTML +=  
                            "<div class='row'>" + colopen + a + colclose +
                            colopen + b + colclose +
                            colopen + c + "/" + d + colclose +
                            colopen + e + "/" + f + spanopen +
                            `<a href=courses/update.php?id=${course.id}>U</a>` + " | " +
                            `<a href=courses/delete.php?id=${course.id}>D</a>` + spanclose + colclose + colclose ;


        })
    })

</script>

