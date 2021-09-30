/* ========================================================================

Full Calendar Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function () {

        render_ajax_event();

        var updtaeEvent = null;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });


        var calendar = $('#calendar').fullCalendar({
            header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week : 'week',
                day  : 'day'
            },     
            timeZone: "Asia/Kolkata",
            defaultView: "month",       
            events: APP_URL + "/admin/fullcalender",

            eventRender: function (event, element, view) {
                element
                .find(".fc-content")
                .prepend("<span class='closeBtn material-icons'>&times;</span>");
                element.find(".closeBtn").on("click", function(e) {
                    e.preventDefault();
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: APP_URL + '/admin/fullcalenderAjax',
                            data: {
                                    id: event.id,
                                    type: 'delete'
                            },
                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            
                            }
                        });
                    }
                    return false;
                });  
            },
            selectable: true,
            selectHelper: true,
            displayEventTime: false,
            select: function (start, end, allDay) {
                start = moment(start).format('DD-MM-YYYY 00:00'); 
                end = moment(end).format('DD-MM-YYYY 00:00'); 
                $('#add_event_title').val('');
                $('#add_event_start').val(start);
                $('#add_event_end').val(end);
                $('#add-event-modal').modal('show');
            },
            editable: true,
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                $.ajax({
                    url: APP_URL + '/admin/fullcalenderAjax',
                    data: {
                        title: event.title,
                        start: start,
                        end: end,
                        id: event.id,
                        type: 'update'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event Updated Successfully");
                    
                    }
                });
            },
            eventClick: function (event) {
                $('#update-event').prop('disabled',false);
                updtaeEvent = event;
                var start = moment(event.start).format('DD-MM-YYYY HH:mm'); 
                var end = (event.end) ? moment(event.end).format('DD-MM-YYYY HH:mm') : ''; 
                $('#update_event_id').val(event.id);
                $('#update_event_title').val(event.title);
                $('#update_event_start').val(start);
                $('#update_event_end').val(end);
                $('#update-event-modal').modal('show');           
            }

        });

        $('#update-event').on('click', function(e) {
            $('#update-event').prop('disabled',true);
            e.preventDefault();
            var title = $('#update_event_title').val();
            var start = $('#update_event_start').val();
            var end = $('#update_event_end').val();
            var id = $('#update_event_id').val();
            if (title && start && id) {
                $.ajax({
                    url: APP_URL + "/admin/fullcalenderAjax",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event Updated Successfully");
                        var event = updtaeEvent;
                        event.title = data.title;
                        event.start = data.start;
                        event.end = data.end;
                        $('#calendar').fullCalendar('updateEvent',event);
                        $('#calendar').fullCalendar('unselect');
                    
                    }
                });
            }
            $('#update-event-modal').modal('hide');
        });

        $('.ft-clock').on('click', function() {
            render_ajax_event();
        });

        $('#save-event').on('click', function() {
            var title = $('#add_event_title').val();
            var start = $('#add_event_start').val();
            var end = $('#add_event_end').val();
            if (title && start) {
                $.ajax({
                    url: APP_URL + "/admin/fullcalenderAjax",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event Created Successfully");
                        $('#calendar').fullCalendar('renderEvent',
                            {
                                id: data.id,
                                title: data.title,
                                start: data.start,
                                end:  data.end
                            },true);

                        $('#calendar').fullCalendar('unselect');
                        render_ajax_event();
                    }
                });
            }
            $('#add-event-modal').modal('hide');
        });        

        $(".event-datepicker-d1").datetimepicker({ 
            dateFormat: 'dd-mm-yy', 
            onSelect: function () {
                var dt2 = $(this).parents('form').find('.event-datepicker-d2');
                var startDate = $(this).datetimepicker('getDate');
                var minDate = $(this).datetimepicker('getDate');
                var dt2Date = dt2.datetimepicker('getDate');

                var dateDiff = (dt2Date - minDate)/(86400 * 1000);
                
                startDate.setDate(startDate.getDate() + 30);
                if (dt2Date == null || dateDiff < 0) {
                		dt2.datetimepicker('setDate', minDate);
                }
                else if (dateDiff > 30){
                		dt2.datetimepicker('setDate', startDate);
                }
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datetimepicker('option', 'maxDate', startDate);
                dt2.datetimepicker('option', 'minDate', minDate);
            }
        });

        $('.event-datepicker-d2').datetimepicker({
            dateFormat: 'dd-mm-yy', 
        });
});

function displayMessage(message) {
    toastr.options.timeOut = 2000;
    toastr.success(message, 'Event');
} 

function render_ajax_event()
{
    $.ajax({
        url: APP_URL + "/admin/googleEventList",
        type: "get",
        success: function (data) {
           $('.render-ajax-googleEvent').html(data);
        }
    });
}
/*======== End Doucument Ready Function =========*/