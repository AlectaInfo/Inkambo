function menuImageMouseOver(imgID) {
		var img = $('#' + imgID);
		if(img.attr('isSelected') == 1) {
			return;
		}
		
		img.animate({
			opacity: 1
		}, 50);
}
	
function menuImageMouseOut(imgID) {
		var img = $('#' + imgID);
		if(img.attr('isSelected') == 1) {
			return;
		}
		img.animate({
			opacity: .3
		}, 50);
}