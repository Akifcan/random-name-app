$(document).ready(function(){

	function to(action, data, type, element='ul.list'){
		if(type == 'POST'){
			$.ajax({
				url: action,
				data: data,
				type: type,
			})
			.then(response => {
				response = JSON.parse(response)
				if(response[0])
					$(element).html(response[1])
			})
		}else if(type == 'GET'){
			$.ajax({
				url: action,
				type: type,
			})
			.then(response => {
				response = JSON.parse(response)
				if(response[0])
					$(element).html(response[1])
			})
		}
	}

	$('select#filterByGender').change(function(){
		const gender = $(this).val()
		const count = $('input#filterByCount').val()
		let data={'gender': gender}
		localStorage.setItem('gender', gender)
		to($(this).attr('action'), data, 'POST')
	})
	$('input#filterByCount').keyup(function(){
		const count = $(this).val()
		const gender = $('select#filterByGender').val()

		if(count>15) {
			alert('En fazla 15 tane isim listeyelebilirsiniz')
			$(this).val('')
		}
		if(count == ''){
			if(gender){
				to($(this).attr('action'), {'gender': gender}, 'POST')
			}else{
				to($(this).attr('getAllAction'), null, 'GET')
			}
		}else{

			let data={'count': count}

			if(gender){
				data = {'count': count, 'gender': gender}
			}
			console.log(data)
			to($(this).attr('action'), data, 'POST')
		}
	})
	$('button#createNewButton').click(function(){
		to($(this).attr('getAllAction'), null, 'GET')
	})
})