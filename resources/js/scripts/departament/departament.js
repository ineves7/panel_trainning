let selectUnit = $('select[name=unit]');
let selectDepartament = $('select[name=departament_id]');
let selectOccupation = $('select[name=occupation_id]');

function loadDepartaments(obj) {
    let idUnit = $(obj).val();
    $.get('/departament/get-departamentos/' + idUnit, function(departamentos) {
        let selectDepartament = $('select[name=departament_id]');
        let defaultDepartament = selectDepartament.attr('data-default');
        selectDepartament.empty();
        $.each(departamentos, function(key, value) {
            let selected = (defaultDepartament.length > 0 && defaultDepartament == value.id) ? 'selected' : '';
            $('select[name=departament_id]').append(`<option value='${value.id}' ${selected}>${value.departament}</option>`);
        });
    });
}

function loadOccupations(obj) {
    let idDepartament = $(obj).val();
    $.get('/departament/get-occupations/' + idDepartament, function(occupations) {
        let selectOccupation = $('select[name=occupation_id]');
        let defaultOccupation = selectDepartament.attr('data-default');
        selectOccupation.empty();
        $.each(occupations, function(key, value) {
            let selected = (defaultOccupation.length > 0 && defaultOccupation == value.id) ? 'selected' : '';
            $('select[name=occupation_id]').append(`<option value='${value.id}' ${selected}>${value.title}</option>`);
        });
    });
}

if (selectUnit.length && selectDepartament.length) {
    selectUnit.on('change', function() {
        loadDepartaments(this)
    });

    $(document).ready(function() {
        loadDepartaments(selectUnit)
    });

    selectDepartament.on('change', function() {
        loadOccupations(this)
    });

    $(document).ready(function() {
        loadOccupations(selectDepartament)
    });
}