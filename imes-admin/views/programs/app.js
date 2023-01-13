<script type="text/javascript">

	function refreshCityMuns() {
		$('#citymun').empty();
		$('#citymun').append($('<option>', {value: '', text: '-- Please Select City/Municipality --'}));
	}

	function handleChangeProvince(e) {
		const prov = e.val();
        const path = 'route/get.php?dd='+prov+'/getprv';

        refreshCityMuns();
		$.get(path, function(result){
			const response = JSON.parse(result);
			if (response.type) {
				let citymuns = response.data;

				$.each(citymuns, function(key, val) {
					$('#citymun').append($('<option>', { 
				        value: key,
				        text : val 
				    }));	
				});
			}
		});
	}

	$(document).ready(function(){

		$('#tb-programs').DataTable();

		$(document).on('click', '#btn-delete-user', function(e){
			let id = $(this).data('id');
			let userId = $('#deleteUserModal').find("[name='user_id']");

			userId.val(id);
		});
	})
</script>