const debug = false;
function console_log(msg){
    if(debug == true){
        console.log(msg);
    }
}

/*** start onscroll coding *****/
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.second-header').addClass("active1");
    }
    else{
        $('.second-header').removeClass("active1");
    }
});

/*** start accordion coding *****/

 $(".accordion").on("click", ".accordion-header", function() {
    $(this).toggleClass("active").next().slideToggle();
 });



// function openCity(evt, cityName) {
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }
//     document.getElementById(cityName).style.display = "block";
//     evt.currentTarget.className += " active";
// }

// Get the element with id="defaultOpen" and click on it
// document.getElementById("defaultOpen").click();

/*** start testimonia coding *****/

$(document).ready(function(){
    $(".testimonial-carousel").owlCarousel({
        items:2,
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true,
        loop: true,
    });
});