//Slider script
var slideIndex=1;
setTimeout(showSlides(slideIndex),1000);

function nextOrPrevSlide(n){

    showSlides(slideIndex += n);
    console.log("blubb");
    
}
function setCurrentSlide(n) {

    showSlides(slideIndex = n);
  }

function showSlides(n) {
    console.log("triggered");
 
    
    var i;
    var highlightHeadlineSlides = document.getElementsByClassName("highlightHeaderSlides");
    var highlightContentSlides = document.getElementsByClassName("highlightContentSlides")
    var highlightImgSlided = document.getElementsByClassName("highlightImgSlides");
    var dots = document.getElementsByClassName("dot");
    
    if(document.readyState="complete" && 
    highlightImgSlided &&
    highlightHeadlineSlides && 
    highlightContentSlides && 
    dots){
        // n stays in range 1>=n<=numberOfSlides
        if (n > highlightImgSlided.length) {slideIndex = 1}
        if (n < 1) {slideIndex = highlightImgSlided.length}
    
        //display none to all slides
        for (i = 0; i < highlightImgSlided.length; i++) {
            highlightHeadlineSlides[i].style.display = "none";
            highlightImgSlided[i].style.display = "none";
            highlightContentSlides[i].style.display = "none";
        }
        //removes style active from all dots
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        //sets the content we wanna show
        highlightHeadlineSlides[slideIndex-1].style.display = "block";
        highlightImgSlided[slideIndex-1].style.display = "block";
        highlightContentSlides[slideIndex-1].style.display = "block";

        //sets the active dot
        dots[slideIndex-1].className += " active";

       
    }
    
  }