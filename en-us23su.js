//onload execution
window.onload = function(){
	slide.start();
}
/* slide object */
slide = {
	cls:'slideshow',
	list : [],
	dcont : null, //dots container
	active : 0,
	timer : null,
	delay : 5,
	indicator : 'dot',
	listDots : []
}
slide.start = function(i){
	var self = this;
	this.list = document.getElementsByClassName(this.cls);
	this.dcont = document.getElementById('dcont');
	for(var k = 0; k < this.list.length; k++) {
		var el = document.createElement('article');
			el.className = 'dot';
			el.onclick = function(e){
				var dot = e.target;
				console.log(self);
				self.step(dot.k);
			}
			this.dcont.appendChild(el);
			this.list[k].dot = el;
			this.list[k].dot.k = k;
	}
	console.log(this.list);
	//this.listDots = document.getElementsByClassName(this.indicator);
    //for ( var k = 0; k < this.listDots.length; k++) {
    //   this.listDots[k].classList.add("activeDot");/*.style.backgroundColor = "black";*/
	//}
	this.step();
	this.timer = setInterval(function(){slide.step()}, this.delay * 1000);
}
slide.pause = function(){
	if(this.timer)
		clearInterval(this.timer);
}
slide.resume = function(){
	this.timer = setInterval(function(){slide.step()}, this.delay * 1000);
}
slide.step = function(i){
	this.hide(this.active);
	if(i)
		this.active = i;
	else
		this.active++;
	if(this.active >= this.list.length)
		this.active = 0;
	this.show(this.active);
}
slide.hide = function(i){
	this.list[i].style.opacity = '0';
	this.list[i].dot.classList.remove('active');
	this.list[i].style.left = '-100%';
	this.list[2].style.left = '100%';
	
}
slide.show = function(i){
	this.list[i].style.opacity = '1';
	this.list[i].dot.classList.add('active');
	this.list[i].style.left = '0%';
}

// function myMap() {
//   myCenter=new google.maps.LatLng(42.6953, 23.3558);
//   var mapOptions= {
//     center:myCenter,
//     zoom:14, scrollwheel: false, draggable: true,
//     mapTypeId:google.maps.MapTypeId.ROADMAP
//   };
//   var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

//   var marker = new google.maps.Marker({
//     position: myCenter,
//   });
//   marker.setMap(map);
// }