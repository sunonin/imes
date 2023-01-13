<script type="text/javascript">
	
	function handleChangeSupervisor(e) {
		const mobile = e.find(':selected').data('mobile');
		const email = e.find(':selected').data('email');
        $('#supervisorPhone').val(mobile);
        $('#supervisorEmail').val(email);
	}

	$(document).ready(function(){
		$('#tb-departments').DataTable();

		$(document).on('click', '#btn-delete-company', function(e){
			let id = $(this).data('id');
			let compId = $('#deleteCompanyModal').find("[name='departmentId']");
			compId.val(id);
		});
	})

</script>