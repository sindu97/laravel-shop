
//var timeslots = ["8:00 am  9:00 am","9:00 am  10:00 am","10:00 am  11:00 am","11:00 am  12:00 pm","12:00 pm  13:00 pm","13:00 pm  14:00 pm","14:00 pm  15:00 pm","15:00 pm  16:00 pm","16:00 pm  17:00 pm","17:00 pm  18:00 pm"];

var timeslots = [];
var existing_times = [];
var disable_times = [];
$('.date-picker-2').popover({
	html : true, 
	content: function() {
	  return $("#example-popover-2-content").html();
	},
	title: function() {
	  return $("#example-popover-2-title").html();
	}
});

var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
$(".date-picker-2").datepicker({
	dateFormat:"yy-mm-dd",
	minDate: tomorrow,
	onSelect: function(dateText) {
		alert(dateText);
		$.ajax({
		  url: "http://localhost/elite/test/data",
		  async: false,

		  data: {dateText:dateText}
		}).done(function(data) {
			alert('rahan');
			alert(data);
			var ram = json_decode(data);
			alert(ram);
			$.each(JSON.parse(data),function(k,val){
				$.each(val.existing_array,function(k1,val1){
					existing_times.push(val1);
				});
				$.each(val.disable_array,function(k2,val2){
					disable_times.push(val2);
				});
				//existing_times.push(val);
			});
			
			
		});
		$(this).attr('value',dateText);
		var html = "";
		$('#example-popover-2-title').html('<b>Avialable Appiontments</b>');
		for (x in timeslots) {
			console.log();
			var timeexist = '';
			var disableexist = '';
			
			if(existing_times.indexOf(timeslots[x]) > -1)
			{
				timeexist = "Already Booked";
				
			}
			if(disable_times.indexOf(timeslots[x]) > -1)
			{
				disableexist = "Not available";
				
			}
			
			if(timeexist || disableexist){
				html += '<input '+((timeexist=='' && disableexist=='') ? '' : 'disabled')+' type="radio" value="'+timeslots[x]+'" name="timeslotradio" class="timeslotradio"><span  class="btn '+((timeexist=='' && disableexist=='') ? 'btn-success' : 'btn-danger')+' timeslot_button">'+timeslots[x]+'</span><br>';
				html+= timeexist ? '&nbsp;&nbsp;'+timeexist+'<br>' : disableexist ? '&nbsp;&nbsp;'+disableexist+'<br>' : ''; 
				
			}else{
				html += '<input type="radio" value= "'+timeslots[x]+'" name="timeslotradio" class="timeslotradio"><span  class="btn btn-success timeslot_button">'+timeslots[x]+'</span><br><br>';
				
			}
			
		}
		
		$('#example-popover-2-content').html('Avialable Appiontments On <strong>'+dateText+'</strong><br>'+html);
		$('.date-picker-2').popover('show');
		$('.timeslotradio').click(function(){
			var time_value = $(this).val();
			$('#timeslot_html').html(time_value);
			$('#timeslot').val(time_value);
			$('.date-picker-2').popover('hide');
			
		});
		existing_times = [];
		disable_times = [];
	
	}
});
$(document).ready(function(){
	$('.timeslotradio').change(function(){
		var time_value = $(this).val();
		$('#timeslot_html').html(time_value);
		$('#timeslot').val(time_value);
		$('.date-picker-2').popover('hide');
		
	});
	
	// on submit appointment form
	
	$("#app_form").submit(function(event){
	    var date_picker = $(".date-picker-2");
	    
	    if(date_picker.val() == "" || $("#timeslot").val() == ""){
	        event.preventDefault();
	        alert("please select date and time first");
	    }
	    
	    
	})
	
	
});
