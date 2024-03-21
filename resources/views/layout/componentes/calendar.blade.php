@extends('layout.container.pagina')
@section('title', 'Calendário')


@section('conteudo')
  
<div>
  <div class="row justify-content-center">


<div class="col-12">
  <div class="row align-items-center my-3">
    <div class="col">
      <h2 class="page-title">Calendário</h2>
    </div>


  </div>
  <div id='calendar'></div>

  <!-- new event modal -->
  <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    {{-- <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">New Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body p-4">
          <form>
            <div class="form-group">
              <label for="eventTitle" class="col-form-label">Title</label>
              <input type="text" class="form-control" id="eventTitle" placeholder="Add event title">
            </div>
            <div class="form-group">
              <label for="eventNote" class="col-form-label">Note</label>
              <textarea class="form-control" id="eventNote" placeholder="Add some note for your event"></textarea>
            </div>

            <div class="form-row">
              <div class="form-group col-md-8">
                <label for="eventType">Event type</label>
                <select id="eventType" class="form-control select2">
                  <option value="work">Work</option>
                  <option value="home">Home</option>
                </select>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="date-input1">Start Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                  </div>
                  <input type="text" class="form-control drgpicker" id="drgpicker-start" value="04/24/2020">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="startDate">Start Time</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="button-addon-time"><span class="fe fe-clock fe-16"></span></div>
                  </div>
                  <input type="text" class="form-control time-input" id="start-time" placeholder="10:00 AM">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="date-input1">End Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                  </div>
                  <input type="text" class="form-control drgpicker" id="drgpicker-end" value="04/24/2020">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="startDate">End Time</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="button-addon-time"><span class="fe fe-clock fe-16"></span></div>
                  </div>
                  <input type="text" class="form-control time-input" id="end-time" placeholder="11:00 AM">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="RepeatSwitch" checked>
            <label class="custom-control-label" for="RepeatSwitch">All day</label>
          </div>
          <button type="button" class="btn mb-2 btn-primary">Save Event</button>
        </div>
      </div>
    </div> --}}
  </div> <!-- new event modal -->

</div> <!-- .col-12 -->
</div> <!-- .row -->
</div>
    
    <script src="{{url('light/js/fullcalendar.js')}}"></script>
    <script src="{{url('light/js/fullcalendar.custom.js')}}"></script>

    <script>
      /** full calendar */
      var calendarEl = document.getElementById('calendar');
      if (calendarEl)
      {
        document.addEventListener('DOMContentLoaded', function()
        {
          var calendar = new FullCalendar.Calendar(calendarEl,
          {
            plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
            timeZone: 'UTC',
            themeSystem: 'bootstrap',
            header:
            {
              left: 'today, prev, next',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonIcons:
            {
              prev: 'fe-arrow-left',
              next: 'fe-arrow-right',
              prevYear: 'left-double-arrow',
              nextYear: 'right-double-arrow'
            },
            weekNumbers: true,
            eventLimit: true, // allow "more" link when too many events
            events: 'https://fullcalendar.io/demo-events.json'
          });
          calendar.render();
        });
      }
    </script>

<script src="{{url('light/js/jquery.mask.min.js')}}"></script>
<script src="{{url('light/js/select2.min.js')}}"></script>
<script src="{{url('light/js/jquery.steps.min.js')}}"></script>
<script src="{{url('light/js/jquery.validate.min.js')}}"></script>
<script src="{{url('light/js/jquery.timepicker.js')}}"></script>
<script src="{{url('light/js/dropzone.min.js')}}"></script>
<script src="{{url('light/js/uppy.min.js')}}"></script>
<script src="{{url('light/js/quill.min.js')}}"></script>
<script>
  $('.select2').select2(
  {
    theme: 'bootstrap4',
  });
  $('.select2-multi').select2(
  {
    multiple: true,
    theme: 'bootstrap4',
  });
  $('.drgpicker').daterangepicker(
  {
    singleDatePicker: true,
    timePicker: false,
    showDropdowns: true,
    locale:
    {
      format: 'MM/DD/YYYY'
    }
  });
  $('.time-input').timepicker(
  {
    'scrollDefault': 'now',
    'zindex': '9999' /* fix modal open */
  });
  /** date range picker */
  if ($('.datetimes').length)
  {
    $('.datetimes').daterangepicker(
    {
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale:
      {
        format: 'M/DD hh:mm A'
      }
    });
  }
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end)
  {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  }
  $('#reportrange').daterangepicker(
  {
    startDate: start,
    endDate: end,
    ranges:
    {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);
  cb(start, end);
  $('.input-placeholder').mask("00/00/0000",
  {
    placeholder: "__/__/____"
  });
  $('.input-zip').mask('00000-000',
  {
    placeholder: "____-___"
  });
  $('.input-money').mask("#.##0,00",
  {
    reverse: true
  });
  $('.input-phoneus').mask('(000) 000-0000');
  $('.input-mixed').mask('AAA 000-S0S');
  $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
  {
    translation:
    {
      'Z':
      {
        pattern: /[0-9]/,
        optional: true
      }
    },
    placeholder: "___.___.___.___"
  });
  // editor
  var editor = document.getElementById('editor');
  if (editor)
  {
    var toolbarOptions = [
      [
      {
        'font': []
      }],
      [
      {
        'header': [1, 2, 3, 4, 5, 6, false]
      }],
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [
      {
        'header': 1
      },
      {
        'header': 2
      }],
      [
      {
        'list': 'ordered'
      },
      {
        'list': 'bullet'
      }],
      [
      {
        'script': 'sub'
      },
      {
        'script': 'super'
      }],
      [
      {
        'indent': '-1'
      },
      {
        'indent': '+1'
      }], // outdent/indent
      [
      {
        'direction': 'rtl'
      }], // text direction
      [
      {
        'color': []
      },
      {
        'background': []
      }], // dropdown with defaults from theme
      [
      {
        'align': []
      }],
      ['clean'] // remove formatting button
    ];
    var quill = new Quill(editor,
    {
      modules:
      {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
  }
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function()
  {
    'use strict';
    window.addEventListener('load', function()
    {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form)
      {
        form.addEventListener('submit', function(event)
        {
          if (form.checkValidity() === false)
          {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script>
  var uptarg = document.getElementById('drag-drop-area');
  if (uptarg)
  {
    var uppy = Uppy.Core().use(Uppy.Dashboard,
    {
      inline: true,
      target: uptarg,
      proudlyDisplayPoweredByUppy: false,
      theme: 'dark',
      width: 770,
      height: 210,
      plugins: ['Webcam']
    }).use(Uppy.Tus,
    {
      endpoint: 'https://master.tus.io/files/'
    });
    uppy.on('complete', (result) =>
    {
      console.log('Upload complete! We’ve uploaded these files:', result.successful)
    });
  }
</script>
<script src="{{('light/js/apps.js')}}"></script>
    
@endsection