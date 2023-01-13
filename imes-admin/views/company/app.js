<script type="text/javascript">
	
	function handleChangeSupervisor(e) {
		const mobile = e.find(':selected').data('mobile');
		const email = e.find(':selected').data('email');
        $('#supervisorPhone').val(mobile);
        $('#supervisorEmail').val(email);
	}

	$(document).ready(function(){
		$('#tb-company').DataTable();

		$(document).on('click', '#btn-delete-company', function(e){
			let id = $(this).data('id');
			let compId = $('#deleteCompanyModal').find("[name='comp_id']");
			compId.val(id);
		});

		$(document).on('click', '#btn-assessment-link', function(e){
			let id = $(this).data('id');
			let compId = $('#assessmentLinkModal').find("[name='comp_id']");
			compId.val(id);
		});
	})

</script>