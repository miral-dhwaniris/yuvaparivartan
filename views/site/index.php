
<link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>

<script>
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
                        eventClick: function(calEvent, jsEvent, view) {
                            window.location="index.php?r=agenda/update&id="+calEvent.id;
                        },
                        dayClick: function(date, jsEvent, view) {
//                            alert('Clicked on: ' + date.format());
//                            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
//                            alert('Current view: ' + view.name);
//                            $(this).css('background-color', 'red');

                              window.location="index.php?r=agenda/index&date="+date.format();

                        },
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
//			defaultDate: '2016-01-12',
                        defaultDate: '<?php echo date("Y-m-d"); ?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
                                <?php 
                                $agendaModel = app\models\Agenda::find()->all();
                                for($i=0;$i<count($agendaModel);$i++)
                                {
                                    $agendaModelSingle = $agendaModel[$i];
                                    
                                    ?>
                                        {
                                            id: '<?php echo $agendaModelSingle->id; ?>',
                                            title: '<?php echo $agendaModelSingle->activity; ?>',
                                            start: '<?php echo $agendaModelSingle->agenda_date; ?>',
                                            end: '<?php echo $agendaModelSingle->agenda_date; ?>',
                                            backgroundColor: '<?php 
                                            
                                                if($agendaModelSingle->status == "")
                                                {
                                                    echo eventRemainingColor();
                                                }
                                                if($agendaModelSingle->status == "1")
                                                {
                                                    echo eventDoneColor();
                                                }
                                            
                                            ?>'
                                        },
                                    <?php
                                }
                                
                                
                                ?> 
//				{
//					title: 'All Day Event',
//					start: '2016-01-01'
//				},
//				{
//					title: 'Long Event',
//					start: '2016-01-07',
//					end: '2016-01-10'
//				},
//				{
//					id: 999,
//					title: 'Repeating Event',
//					start: '2016-01-09T16:00:00'
//				},
//				{
//					id: 999,
//					title: 'Repeating Event',
//					start: '2016-01-16T16:00:00'
//				},
//				{
//					title: 'Conference',
//					start: '2016-01-11',
//					end: '2016-01-13'
//				},
//				{
//					title: 'Meeting',
//					start: '2016-01-12T10:30:00',
//					end: '2016-01-12T12:30:00'
//				},
//				{
//					title: 'Lunch',
//					start: '2016-01-12T12:00:00'
//				},
//				{
//					title: 'Meeting',
//					start: '2016-01-12T14:30:00'
//				},
//				{
//					title: 'Happy Hour',
//					start: '2016-01-12T17:30:00'
//				},
//				{
//					title: 'Dinner',
//					start: '2016-01-12T20:00:00'
//				},
//				{
//					title: 'Birthday Party',
//					start: '2016-01-13T07:00:00'
//				},
//				{
//					title: 'Click for Google',
//					url: 'http://google.com/',
//					start: '2016-01-28'
//				}
			]
		});
		
	});

</script>
<style>

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
<div id='calendar'></div>
