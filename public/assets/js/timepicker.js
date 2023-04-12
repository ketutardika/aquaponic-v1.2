// tempusdominus-bootstrap-4
$(function() {
  'use strict';

  $('#datetimepickerExample').datetimepicker({
    format: 'HH:mm',
        pickDate: false,
        pickSeconds: false,
        pick12HourFormat: false
  });


  // new tempusDominus.TempusDominus(document.getElementById('datetimepickerExample1'), {
  //   display: {
  //     viewMode: 'clock',
  //     components: {
  //       decades: false,
  //       year: false,
  //       month: false,
  //       date: false,
  //       hours: true,
  //       minutes: true,
  //       seconds: false
  //     }
  //   }
  // });


  new tempusDominus.TempusDominus(document.getElementById('datetimepicker3'), {
    display: {
      viewMode: 'clock',
      components: {
        decades: false,
        year: false,
        month: false,
        date: false,
        hours: true,
        minutes: true,
        seconds: false
      }
    }
  });

});