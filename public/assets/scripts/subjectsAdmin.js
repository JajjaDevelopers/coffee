$(document).ready(function(){
    $('#paperTeacherAllocationDiv').hide();
    var allocModal = new bootstrap.Modal(document.getElementById('allocationModal'), {
        keyboard: true
        
        });

    var allocViewModal = new bootstrap.Modal(document.getElementById('allocPapersModel'), {
        keyboard: true
        
        });

    // datatable on page load
    $('#papersTable').DataTable({
        ajax: {
            method: 'get',
            url: '/papers/list',
            dataSrc: 'papersList'
        },
        columns: [
            {data: 'paper_id'},
            {data: 'paper_name'},
            {data: 'subject_name'},
            {data: 'status'},
            { "render": function ( data, type, row, meta ) {
                return `<button type="button" title='View ${row.paper_name} Info'id="viewBtn" viewId="${row.paper_id}" class="btn btn-sm btn-info">
                    <i class="la la-eye"></i>
                </button>
                <a title='Edit Info' id="papUpdateBtn" updateId="${row.paper_id}" papSubjId=${row.subject_id}" class="btn btn-sm btn-primary">
                    <i class="la la-pencil"></i>
                </a>
                <a title='Delete Info' href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>`
                }
             },
        ]
    })

    // teacher allocation table on page load
    $('#allocationTable').DataTable({
        ajax: {
            method: 'get',
            url: '/paperTeachers',
            dataSrc: 'paperTeachers'
        },
        columns: [
            {data: 'staff_id'},
            {data: 'name'},
            {data: 'subjects'},
            { "render": function ( data, type, row, meta ) {
                return `<button type="button" title='View Subjects Allocated' id="allocViewBtn" viewId="${row.staff_id}" teacherName="${row.name}" class="btn btn-sm btn-info">
                    <i class="la la-eye"></i>
                </button>
                <a title='Allocate new subject' id="allocAddBtn" teacherId="${row.staff_id}" teacherName="${row.name}" class="btn btn-sm btn-secondary">
                    <i class="la la-plus"></i>
                </a>`
                }
            },
        ]
    });

    //opening teacher allocation div
    $(document).on('click', '#allocationBtn', function(event){
        $('#papersListDiv').hide();
        $('#paperTeacherAllocationDiv').show();
        $.ajax({
            type: "post",
            url: "/classes/formOptions",
            data: "data",
            dataType: "json",
            success: function (response) {
                var formOpt = '<option>--Select Class--</option>';
                var formOpts = response.formOptions;
                for (var x=0; x<formOpts.length; x++){
                    formOpt += `<option value='${formOpts[x].form_id}'>${formOpts[x].form_name}</option>`
                }

                $('#allocClass').html(formOpt);
            }
        });
        // $('#papStatus').val('');
    });

    //opening subject lists div
    $(document).on('click', '#papersListBtn', function(event){
        $('#paperTeacherAllocationDiv').hide();
        $('#papersListDiv').show();
        // $('#papStatus').val('');
    });

    //recording new paper
    $(document).on('click', '#addPaperBtn', function(event){
        $('#editButton').hide();

        $.ajax({
            type: "post",
            url: $('#paperAjustment').attr('addPapUrl'),
            data: {
                papCode: $('#papCode').val(),
                subjId: $('#papSubject').val(),
                papName: $('#papName').val(),
                papStatus: $('#papStatus').val(),
            },
            dataType: "json",
            success: function (response) {
                $('#papersTable').DataTable().ajax.reload();
                allocModal.hide('');
                $('#papCode').val('');
                $('#papSubject').val('');
                $('#papName').val('');
                $('#papStatus').val('');

            }
        });
        
    });

    //fetching paper id
    $(document).on('change', '#papSubject', function(event){
        $.ajax({
            type: "get",
            url: $('#codeLable').attr('nextIdUrl'),
            data: {
                subjId: $(this).val(),
            },
            dataType: "json",
            success: function (response) {
                $('#papCode').val(response);
            }
        });
    });

    // paper teacher allocation
    $(document).on('click', '#allocAddBtn', function(event){
        event.preventDefault();
        $('#addPaperBtn').hide();
        $('#editPaperBtn').show();
        $('#allocTeacherHeading').html(`Allocating for ${$(this).attr('teacherName')}`);
        $('#allocTeacher').val($(this).attr('teacherId'))
        allocModal.show();
    });

    // view papers allocated to the teacher
    $(document).on('click', '#allocViewBtn', function(event){
        event.preventDefault();
        $('#addPaperBtn').hide();
        $('#editPaperBtn').show();
        $('#allocListHeading').html($(this).attr('viewId')+' - '+$(this).attr('teacherName'));
        $('#allocTeacher').val($(this).attr('teacherId'))
        $.ajax({
            type: "post",
            url: "/teacher/allocatedPapers",
            data: {
                teacher_id: $(this).attr('viewId')
            },
            dataType: "json",
            success: function (response) {
                var results = response.allocatedPapers;
                var row = '';
                for (var x=0; x<results.length; x++){
                    row += `
                    <tr>
                        <td>${x+1}</td>
                        <td>${results[x].subject_name}</td>
                        <td>${results[x].paper_name}</td>
                        <td>${results[x].form_name}</td>
                        <td><a title='Remove allocation' href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a></td>
                    </tr>`;
                }
                $('#allocatedList').html(row);
                allocViewModal.show();
            }
        });
        
        
    });

    // submiting allocation
    $(document).on('click', '#allocConfirmBtn', function(event){
        event.preventDefault();
        $.ajax({
            type: "post",
            url: "/allocate/paper/teacher",
            data: {
                paper_id: $('#allocPapName').val(),
                staff_id: $('#allocTeacher').val(),
                form_id: $('#allocClass').val(),
            },
            dataType: "text",
            success: function (response) {
                $('#allocationTable').DataTable().ajax.reload();
                $('#allocPapName').val('');
                $('#allocTeacher').val('');
                $('#allocClass').val('')
                $('#allocCat').val('')
                allocModal.hide('');
            }
        });
        
    });

    // fetching subjects based on category
    $(document).on('change', '#allocCat', function(event){
        $.ajax({
            type: "get",
            url: "/subjects/options",
            data: {
                category: $('#allocCat').val()
            },
            dataType: "html",
            success: function (response) {
                $('#allocSubject').html(response);
            }
        });
    });

    // fetching papers based on subject
    $(document).on('change', '#allocSubject', function(event){
        $.ajax({
            type: "get",
            url: "/papers/options",
            data: {
                subject: $('#allocSubject').val()
            },
            dataType: "json",
            success: function (response) {
                var list = response.papers;
                var options = '<option>--subjects--</option>'
                for (var x=0; x<list.length; x++){
                    options += `<option value='${list[x].paper_id}'>${list[x].paper_name}</option>`
                }
                
                $('#allocPapName').html(options);
            }
        });
    });

    //updating paper
    $(document).on('click', '#editPaperBtn', function(event){
        $.ajax({
            type: "post",
            url: $(this).attr('updateUrl'),
            data: {
                papCode: $('#papCode').val(),
                papSubj: $('#papSubject').val(),
                papName: $('#papName').val(),
                papStatus: $('#papStatus').val(),
            },
            dataType: "json",
            success: function (response) {
                $('#papersTable').DataTable().ajax.reload();
                $('#papCode').val('');
                $('#papSubject').val('');
                $('#papName').val('');
                $('#papStatus').val('');
                allocModal.hide('');
            }
        });
        
    });

    //view paper details
    $(document).on('click','#viewBtn',function(event){
        event.preventDefault();
        var data = {
            id: $(this).attr('viewId')
        };
        //fetch subject info
        $.ajax({
            type: "post",
            url: 'paper/info',
            data: data,
            dataType: "json",
            success: function (response) {
                //populating details
                $('#subDetName').val(response.paper.paper_name);
                $('#subDetCode').val(data.id);
                var list = response.teachers;
                var listStr = '';
                for (var x=0;x<list.length;x++){
                    listStr+=`<tr><td>${x+1}</td><td>${list[x].name}</td><td>${list[x].form_name}</td></tr>`
                }
                $('#tList').html(listStr);
                $('#paperDetailsModel').modal('show');
            }
        });
    });
})
