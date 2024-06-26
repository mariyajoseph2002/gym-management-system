<?php include('dbconnect.php');?>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row ">
			<div class="col-md-4">
			<form  action="" id="new_sch">
				<div class="card">
					<div class="card-header">
						<b>Session Schedules</b>
						<!-- <span class="float:right"><button class="btn btn-primary btn-block btn-sm col-sm-2 float-right"  id="new_schedule">
					<i class="fa fa-plus"></i> New Entry
				</button></span> -->
					</div>	
					
	
		
				<div class="card-body">
                <input type="hidden" name="sch_id">
					<hr class="mb-3">
                    <div class="form-group">
					   <label class="control-label" ><b>Slot</b></label>
					    <input class="form-control" id="sch_slot" type="text" name="sch_slot"  required><br>
                    </div><div class="form-group">

					   <!-- <label  class="control-label" for="Emp_lname"><b>Slot end time</b></label> -->
					   <!-- <input class="form-control" id="time_to"  type="text" name="time_to" required><br> -->
                      </div>
</div>
				
					
					
					<!-- <label for="password"><b>Password</b></label> -->
					<!-- <input class="form-control" id="password"  type="password" name="password" required> -->
					
				
			<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3" name="submit"> Save</button>
								<button class="btn btn-sm btn-primary col-sm-3 " type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
		</div>
	</form>
</div>
	
			<div class="card-body">
			<b>Schedule List</b>	

<div class="card-body">
						<table class="table table-bordered table-condensed table-hover">
							<colgroup>
								<col width="1%">
								<col width="3%">
								<col width="2%">
								
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Schedule slots</th>
									<th class="">Action</th>
									</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$member =  $conn->query("SELECT * from tbl_schedule order by sch_id asc");
								while($row=$member->fetch_array()):
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p><b><?php echo ucwords($row['sch_slot']) ?></b></p>
										 
									</td>
								
									<td class="text-center">
										
										<button class="btn btn-sm btn-outline-primary edit_sch" type="button" data-sch_id="<?php echo $row['sch_id'] ?>" data-sch_slot="<?php echo $row['sch_slot'] ?>" >Edit</button>
 										
									</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
	</div>
			</div>
</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
	.avatar {
	    display: flex;
	    border-radius: 100%;
	    width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
	    border: 3px solid;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: calc(100%);
	    border-radius: 100%;
	}
		input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
a.fc-daygrid-event.fc-daygrid-dot-event.fc-event.fc-event-start.fc-event-end.fc-event-past {
    cursor: pointer;
}
a.fc-timegrid-event.fc-v-event.fc-event.fc-event-start.fc-event-end.fc-event-past {
    cursor: pointer;
}
</style>
 <script>
	function _reset(){
		$('#new_sch').get(0).reset()
		$('#new_sch input,#new_sch textarea').val('')
	}
	$('#new_sch').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_sch',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else
				 alert_toast("this schedule already exist,refresh the page to continue")
			}
		})
	})
	$('.edit_sch').click(function(){
		start_load()
		var cat = $('#new_sch')
		cat.get(0).reset()
		cat.find("[name='sch_id']").val($(this).attr('data-sch_id'))
		cat.find("[name='sch_slot']").val($(this).attr('data-sch_slot'))
		
		end_load()
	}) 
 	/* $('#new_schedule').click(function(){
		uni_modal('New Schedule','manage_schedule2.php')
	})
	$('.edit_sch').click(function(){
	uni_modal('Edit schedule','manage_schedule2.php?sch_id='+$(this).attr('data-sch_id'))
}) */
$('.delete_sch').click(function(){
		_conf("Are you sure to delete this schedule?","delete_sch",[$(this).attr('data-sch_id')])
	})
	function delete_sch($sch_id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_sch',
			method:'POST',
			data:{sch_id:$sch_id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	/* $('.view_alumni').click(function(){
		uni_modal("Bio","view_alumni.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_alumni').click(function(){
		_conf("Are you sure to delete this alumni?","delete_alumni",[$(this).attr('data-id')])
	})
	
	  function delete_alumni($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_alumni',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	} */
	/*  var calendarEl = document.getElementById('calendar');
    var calendar;
	document.addEventListener('DOMContentLoaded', function() {
   

        start_load()
		 $.ajax({
		 	url:'ajax.php?action=get_schecdule',
		 	method:'POST',
		 	data:{faculty_id: $(this).val()},
		 	success:function(resp){
		 		if(resp){
		 			resp = JSON.parse(resp)
		 					var evt = [] ;
		 			if(resp.length > 0){
		 					Object.keys(resp).map(k=>{
		 						var obj = {};
		 							obj['title']=resp[k].name
		 							obj['data_id']=resp[k].id
		 							obj['daysOfWeek']=resp[k].dow
		 							obj['startRecur']=resp[k].date_from
		 							obj['endRecur']=resp[k].date_to
		 							obj['startTime']=resp[k].time_from
		 							obj['endTime']=resp[k].time_to
		 							evt.push(obj)
		 					})

		 		}
		 				  calendar = new FullCalendar.Calendar(calendarEl, {
				          headerToolbar: {
				            left: 'prev,next today',
				            center: 'title',
				            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
				          },
				          initialDate: '<?php echo date('Y-m-d') ?>',
				          weekNumbers: true,
				          navLinks: true,
				          editable: false,
				          selectable: true,
				          nowIndicator: true,
				          dayMaxEvents: true, 
				          events: evt,
				          eventClick: function(e,el) {
							   var data =  e.event.extendedProps;
								uni_modal('Manage Schedule Details','manage_schedule.php?id='+data.data_id)

							  }
				        });
		 	}
		 	},complete:function(){
		 		calendar.render()
		 		end_load()
		 	}
		 })

  });   */
</script>
