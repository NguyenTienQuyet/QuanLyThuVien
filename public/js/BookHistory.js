
$('a[data-type=active-book]').click(function(){
	var user_id = $(this).attr('user_id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

	$.ajax({
		url: '/api/v1/histories/activeHistories?userId='+user_id,
		type: 'get',
		dataType: 'json',
		success: function(data){
			$.ajax({
				url: '/api/v1/copies/'+'all',
				type: 'get',
				dataType: 'json',
				success: function(){

				},
				error: function(){
					
				}
			});
		},
		error: function(err){
			alert('Acitive histories fail');
		}
	})

})