<script type="text/javascript">
	
	function handleChangeSupervisor(e) {
		const mobile = e.find(':selected').data('mobile');
		const email = e.find(':selected').data('email');
        $('#supervisorPhone').val(mobile);
        $('#supervisorEmail').val(email);
	}

	$(document).ready(function(){
		$('#tb-student').DataTable();
		$('#tb-journal').DataTable();

		$(document).on('click', '#btn-delete-company', function(e){
			let id = $(this).data('id');
			let compId = $('#deleteCompanyModal').find("[name='comp_id']");
			compId.val(id);
		});

		$(document).on('click', '.preOJTModal', function(e){
			let id = $(this).data('id');
			let preOjtRequirementsId = $('#preOJTModal').find("[name='preOjtRequirementsId']");
			preOjtRequirementsId.val(id);
		});

		$(document).on('click', '.postOJTModal', function(e){
			let id = $(this).data('id');
			let preOjtRequirementsId = $('#postOJTModal').find("[name='preOjtRequirementsId']");
			preOjtRequirementsId.val(id);
		});

		$(document).on('click', '.preOJTModal', function(e){
			let id = $(this).data('id');
			let preOjtRequirementsId = $('#preOJTModal').find("[name='preOjtRequirementsId']");
			preOjtRequirementsId.val(id);
		});

		$(document).on('click', '.journalViewModal', function(e){
			let id = $(this).data('id');
			let path = 'route/get.php?dd='+id+'/gettask';

			$.get(path, function(result){
				const response = JSON.parse(result);
				if (response.type) {
					let dd = JSON.parse(response.data);
					$('#journalViewModal').find('#startDate').val(dd.start_date);
					$('#journalViewModal').find('#endDate').val(dd.start_date);
					$('#journalViewModal').find('#activity').val(dd.title);
					$('#journalViewModal').find('#remarks').val(dd.remarks);
					$('#journalViewModal').find('#status').val(dd.status);
					$('#journalViewModal').find('#approvedBy').val(dd.approver);
				}
			});

		});

		$(document).on('click', '.companyRevokeModal', function(e){
			let id = $(this).data('id');
			let preOjtRequirementsId = $('#companyRevokeModal').find("[name='preOjtRequirementsId']");

			preOjtRequirementsId.val(id);
		});

		$(document).on('click', '.companyViewModal', function(e){
			let id = $(this).data('id');
			let path = 'route/get.php?dd='+id+'/getcomp';

			$.get(path, function(result){
				const response = JSON.parse(result);
				if (response.type) {
					let dd = JSON.parse(response.data);

					$('#companyViewModal').find('#compId').val(id);
					$('#companyViewModal').find('.companyName').html(dd.compName);
					$('#companyViewModal').find('.companyAddress').html(dd.compAddress);
					$('#companyViewModal').find('.companyEmail').html(dd.compEmail);
					$('#companyViewModal').find('.companyPhone').html(dd.compPhone);
					$('#companyViewModal').find('.companyType').html(dd.compTypeText);

				}
			});
		});

		$(document).on('change', '#filterProgram', function(e){
			let program = $(this).val();
        	let path = 'route/get.php?dd='+program+'/getprg2';

        	$.get(path, function(result){
				const response = JSON.parse(result);
				if (response.type) {
					let data = JSON.parse(response.data);
					$('#filterSection').empty();
					$('#filterSection').append('<option selected disabled>-- Section --</option>');
					$.each(data, function(k,i){
						let dd = '<option value="'+i.section+'">'+i.section+'</option>';
						$('#filterSection').append(dd);
					});
				}
			});
		});

	})

</script>