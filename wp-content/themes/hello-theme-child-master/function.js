jQuery(document).ready(function(){
    //https://jobsearchspreadsheet.staging.jibberjobber.com/wp-content/uploads/2022/12/header-background.png
    //
    //
    //
    
	var scrollTop     = jQuery(window).scrollTop(),
    elementOffset = jQuery('.ekit-template-content-header').offset().top,
    distance      = ( scrollTop);
	if(distance >= 150){
		jQuery('.ekit-template-content-header').addClass('header-bg-image')
	}else{
		jQuery('.ekit-template-content-header').removeClass('header-bg-image')
	}
    var scroll = jQuery(window).scrollTop();
    jQuery(window).scroll(function (event) {
    	var scroll = jQuery(window).scrollTop();
    	if(scroll >= 150){
			jQuery('.ekit-template-content-header').addClass('header-bg-image')
		}else{
			jQuery('.ekit-template-content-header').removeClass('header-bg-image')
		}
	});
})