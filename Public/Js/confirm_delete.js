$('#form_delete').click(function(){

	if(confirm('Delete')){

		$.get('index.php',{action:'delete'});

	}else{

		console.log('invalide');

	}
});



