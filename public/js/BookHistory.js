
$('.publisher_book').click(function(){
	var publisher_id = $(this).attr('id');
	var publisher = $(this).text();
	alert(publisher_id);
	alert(publisher);
});