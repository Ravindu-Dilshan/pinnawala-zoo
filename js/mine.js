
AOS.init({
 once: true,
 delay:100,
 offset: 250,
 duration:1000,
});

$(window).on('load',function(){
  $('#loginMsg').modal('show');
});

$(document).ready(function() {
	$('#sideBar').click(function(e){
		e.preventDefault();
		$('.sidebar-wrapper').removeClass('.sidebar-wrapper');
	})
})

$(document).ready(function () {
	$('#Dtable').DataTable();
	$('.dataTables_length').addClass('bs-select');
});


$('.confirm_dialog').on('click',function(){
    return confirm('Are you sure?')
})