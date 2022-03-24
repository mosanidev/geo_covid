function displayForm1() {
    var form1 = document.getElementById("form1");
    var map = document.getElementById("map");

    if (form1.style.display == "none")
    {
        form1.style.display = "block";
        map.style.right = "0px";
        map.style.top = "80px";
        map.classList.add("w-50");
        map.classList.add("position-fixed");

        if (form2.style.display == "block") 
        {
            form2.style.display = "none";
        }

    } else {
        form1.style.display = "none";
        map.classList.remove("w-50");
        map.classList.remove("position-fixed");
        map.style.right = "0px";
        map.style.top = "0px";
    }
}

function displayForm2() {
    var form2 = document.getElementById("form2");
    var map = document.getElementById("map");

    if (form2.style.display == "none")
    {
        form2.style.display = "block";
        map.style.right = "0px";
        map.style.top = "80px";
        map.classList.add("w-50");
        map.classList.add("position-fixed");

        if (form1.style.display == "block") 
        {
            form1.style.display = "none";
        }
    } else {
        form2.style.display = "none";
        map.classList.remove("w-50");
        map.classList.remove("position-fixed");
        map.style.right = "0px";
        map.style.top = "0px";
    }
}

function displayForm1_() {
    var form1 = document.getElementById("form1");
    var map = document.getElementById("map");

    if (form1.style.display == "none")
    {
        form1.style.display = "block";
        map.style.right = "0px";
        map.style.top = "80px";
        map.classList.add("w-50");
        map.classList.add("position-fixed");
    } 
} 

function displayForm2_() {
    var form2 = document.getElementById("form2");
    var map = document.getElementById("map");

    if (form2.style.display == "none")
    {
        form2.style.display = "block";
        map.style.right = "0px";
        map.style.top = "80px";
        map.classList.add("w-50");
        map.classList.add("position-fixed");

    }
}

