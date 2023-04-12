$(function() {
  'use strict';

  if($('#datePickerExample').length) {
    $('#datePickerExample').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample').datepicker('setDate');
  }
  if($('#datePickerExample2').length) {
    $('#datePickerExample2').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample2').datepicker('setDate');
  }
});