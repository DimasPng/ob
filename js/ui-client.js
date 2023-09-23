+function ($) {

  $(function(){

  	console.log("test");


  	if(localStorage.getItem('index'))
  	{
  		console.log(localStorage.getItem('index'));
  		console.log($(".navi .nav li").eq(localStorage.getItem('index')));
  		$(".navi > .nav > li").eq(localStorage.getItem('index')).addClass("active");
  	}

  	$(".navi  .nav li").on( "click", function() {
  	   indx =  $(this).index();
  	   console.log(indx);
	   localStorage.setItem('index', indx);
	});

  	






  	// Checks for ie
    var isIE = !!navigator.userAgent.match(/MSIE/i) || !!navigator.userAgent.match(/Trident.*rv:11\./);
    isIE && $('html').addClass('ie');

 	// Checks for iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
	var ua = window['navigator']['userAgent'] || window['navigator']['vendor'] || window['opera'];
	(/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua) && $('html').addClass('smart');

  });
}(jQuery);
