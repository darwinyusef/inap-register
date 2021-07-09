$(document).ready(function () {
  setTimeout(function () {
    //$('select#towns').val($('#town').val()).trigger('change');
    $('#gender').val($('#gender_id').val()).trigger('change');
    $('#typeId').val($('#typeId_id').val()).trigger('change');
    $('#typecourse').val($('#typecourse_id').val()).trigger('change');
    $('#suspended').val($('#suspended_id').val()).trigger('change');
    $('#pay').val($('#pay_id').val()).trigger('change');
  }, 1200);

  $('#typeId').change(function () {
    if ($("#typeId option:selected").val() == 'TI') {
      $("#acudiente").show();
      $("#estudiantePhone").hide();

    } else {
      $("#acudiente").hide();
      $("#estudiantePhone").show();
    }
  });

  if ($('#typeId_id').val() == 'TI') {
    $("#acudiente").show();
  }
});
