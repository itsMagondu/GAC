
    
   <!-- configurable script -->
<script type="text/javascript">
theimage = new Array();


// The dimensions of ALL the images should be the same or some of them may look stretched or reduced in Netscape 4.
// Format: theimage[...]=[image URL, link URL, name/description]
theimage[0]=["images/Law Enforcement1.jpg", "", ""];
theimage[1]=["images/Law-enforcement.jpg", "", ""];
theimage[2]=["images/law-enforcement-career.jpg", "", ""];
///// Plugin variables

playspeed=2000;// The playspeed determines the delay for the "Play" button in ms
//#####
//key that holds where in the array currently are
i=0;


//###########################################
window.onload=function(){

	//preload images into browser
	preloadSlide();

	//set the first slide
	SetSlide(0);

	//autoplay
	PlaySlide();
}

//###########################################
function SetSlide(num) {
	//too big
	i=num%theimage.length;
	//too small
	if(i<0)i=theimage.length-1;

	//switch the image
	document.images.imgslide.src=theimage[i][0];

}


//###########################################
function PlaySlide() {
	if (!window.playing) {
		PlayingSlide(i+1);
		if(document.slideshow.play){
			document.slideshow.play.value="   Stop   ";
		}
	}
	else {
		playing=clearTimeout(playing);
		if(document.slideshow.play){
			document.slideshow.play.value="   Play   ";
		}
	}
	// if you have to change the image for the "playing" slide
	if(document.images.imgPlay){
		setTimeout('document.images.imgPlay.src="'+imgStop+'"',1);
		imgStop=document.images.imgPlay.src
	}
}


//###########################################
function PlayingSlide(num) {
	playing=setTimeout('PlayingSlide(i+1);SetSlide(i+1);', playspeed);
}


//###########################################
function preloadSlide() {
	for(k=0;k<theimage.length;k++) {
		theimage[k][0]=new Image().src=theimage[k][0];
	}
}


</script>


<!-- slide show HTML -->
<form name="slideshow">

<table border="1" cellpadding="2" cellspacing="0">
<tr>
	<td align="center">
	<script type="text/javascript">
		document.write('<img name="imgslide" id="imgslide" src="'+theimage[0][0]+'" border="0" width=750px; height=350px;>')
	</script>
	</td>
</tr>
</table>

</form>