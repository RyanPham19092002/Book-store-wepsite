function toggleStar(starIndex) {
    var stars = document.getElementsByClassName("rating");
    console.log(stars);
    for (var i = 0; i < stars.length; i++){
        if (i <= starIndex) {
            stars[i].classList.add("checked");
        }
        else {
            stars[i].classList.remove("checked"); 
        }
    }
    return starIndex;
}

function removeStars() {
    var stars = document.getElementsByClassName("rating");
    console.log(stars);
    for (var i = 0; i < 5; i++){
            stars[i].classList.remove("checked"); 
    }
    return 0;
}

