$(function() {
    initFunctions();


    $('body').on('click', '.recored_counter', function(){
        var virtual_classroom_id = $(this).data('lecture');
        var recored_name = $(this).data('recored');
        $.ajax({
            type: "POST",
            url: "/dashboard/student/watching/recorded/counter",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: {
                virtual_classroom_id: virtual_classroom_id,
                recored_name: recored_name
            },
            success: function(data) {
                
            }
        });
    });

    $('.students-select2-search').select2({
            ajax: {
            url: '/dashboard/students/watching/recorded/select2',
            dataType: 'json',
            delay: 250,
        processResults: function (data) {
            return {
            results: data
            };
        },
        },
        theme: "bootstrap4"
    });
    $('.cities-select2-search').select2({
            ajax: {
            url: '/dashboard/reports/cities/select2',
            dataType: 'json',
            delay: 250,
        processResults: function (data) {
            return {
            results: data
            };
        },
        },
        theme: "bootstrap4"
    });
    $('.schools-select2-search').select2({
            ajax: {
            url: '/dashboard/reports/schools/select2',
            dataType: 'json',
            delay: 250,
        processResults: function (data) {
            return {
            results: data
            };
        },
        },
        theme: "bootstrap4"
    });

    $('[data-toggle="tooltip"]').tooltip();

    // Init popover and tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({ html: true });

    $(".avatar-profile img").on("click", () => {
        $(".file-upload-avatar").click();
    });
    $(".file-upload-avatar").change(event => {
        let imgUrl = URL.createObjectURL(event.target.files[0]);
        $(".avatar-profile img").attr("src", imgUrl);
    });

    $(".subjects_lectures_select").selectpicker();

    // Date
    $(".date-picker").datetimepicker({
        format: "YYYY-MM-DD",
        icons: {
            time: "fe fe-clock",
            date: "fe fe-calendar",
            up: "fe fe-chevron-up",
            down: "fe fe-chevron-down",
            previous: "fe fe-chevron-right",
            next: "fe fe-chevron-left",
            today: "fe fe-crosshairs",
            clear: "fe fe-trash-o",
            close: "fe fe-times"
        }
    });

    $(".datetime-picker").datetimepicker({
        format: "YYYY-MM-DD H:m:s",
        icons: {
            time: "fe fe-clock",
            date: "fe fe-calendar",
            up: "fe fe-chevron-up",
            down: "fe fe-chevron-down",
            previous: "fe fe-chevron-right",
            next: "fe fe-chevron-left",
            today: "fe fe-crosshairs",
            clear: "fe fe-trash-o",
            close: "fe fe-times"
        }
    });
    // select 2
    $(".groups").select2({
        theme: "bootstrap4"
    });
    $('.galleries_category').select2({
        theme: "bootstrap4"
    });
    $("#school").select2({
        theme: "bootstrap4",
        placeholder: "إختر المدرسة"
    });
    $(".select2.form-control").select2({
        theme: "bootstrap4"
    });
    $(".majors").select2({
        theme: "bootstrap4",
        allowClear: true,
        placeholder: "إختر التخصص المطلوب",
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });
    $(".webinar_account").select2({
        theme: "bootstrap4"
    });

    $(".academic-years").select2({
        theme: "bootstrap4"
    });

    $(".semester").select2({
        theme: "bootstrap4"
    });

    $(".select2-roles").select2({
        theme: "bootstrap4",
        allowClear: true,
        placeholder: "إختر الدور",
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });

    $(".cities").select2({
        allowClear: true,
        theme: "bootstrap4",
        placeholder: '<i class="fe fe-map-pin"></i> المدينة',
        escapeMarkup: function(markup) {
            return markup;
        },
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });
    $(".sex").select2({
        allowClear: true,
        theme: "bootstrap4",
        placeholder: '<i class="fe fe-users"></i> الجنس',
        escapeMarkup: function(markup) {
            return markup;
        },
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });

    $("#majors").select2({
        allowClear: true,
        theme: "bootstrap4",
        placeholder: '<i class="fe fe-users"></i> اختار التخصص',
        escapeMarkup: function(markup) {
            return markup;
        },
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });

    $(".teacher_subjects").select2({
        theme: "bootstrap4",
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });

    $(".virtual_classroom_lecture").select2({
        theme: "bootstrap4",
        placeholder: "إختر المحاضرة",
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });
    $(".virtual_classroom_subjects")
        .select2({
            theme: "bootstrap4",
            placeholder: "إختر المادة",
            allowClear: true,
            language: {
                noResults: () => "لا يوجد نتائج"
            }
        })
        .on("select2:select", function(e) {
            let subjectID = e.params.data.id;

            $.ajax({
                type: "POST",
                url: "/dashboard/virtual-classroom/subject/" +
                    subjectID +
                    "/lectures",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: {
                    subject_id: subjectID
                },
                success: function(data) {
                    $(".virtual_classroom_lecture").empty();
                    for (lecture of data["lectures"]) {
                        $(".virtual_classroom_lecture").append(
                            new Option(lecture.name, lecture.id)
                        );
                    }
                }
            });
        });

    $(".lecture_subject")
        .select2({
            theme: "bootstrap4",
            allowClear: true,
            placeholder: "إختر المادة",
            language: {
                noResults: () => "لا يوجد نتائج"
            }
        })
        .on("select2:select", function(e) {
            let subjectID = e.params.data.id;

            $.ajax({
                type: "POST",
                url: "/dashboard/lectures/subject/teachers",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: {
                    subject_id: subjectID
                },
                success: function(data) {
                    $(".lecture_teacher").empty();
                    for (teacher of data["teachers"]) {
                        $(".lecture_teacher").append(
                            new Option(teacher.user.full_name, teacher.id)
                        );
                    }
                }
            });
        });

    $(".lecture_teacher").select2({
        theme: "bootstrap4",
        language: {
            noResults: () => "لا يوجد نتائج"
        }
    });

 
$('#image_type_warpper').hide();
$('#video_type_warpper').hide();
$('.media_type_select').select2({
    placeholder: 'إختر نوع الميديا',
    allowClear: true,
    theme: "bootstrap4",
}).on('select2:select', function(e) {
    let select_val = $(e.currentTarget).val();
    if (select_val == 1) {
        $('#image_type_warpper').fadeIn('slow');
        $('#video_type_warpper').hide();
        $("#image_type_input").prop('required', true);
        $("#video_type_input").prop('required', false);
    }

    if (select_val == 2) {
        $("#image_type_input").prop('required', false);
        $("#video_type_input").prop('required', true);
        $('#video_type_warpper').fadeIn('slow');
        $('#image_type_warpper').hide();
    }
})

    $(".major_subjects_select").on("change", function() {
        let subjectids = $(this)
            .val()
            .join(",");

        $.ajax({
            url: "/dashboard/students/getLecturesBySubjectIds",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: { ids: subjectids }
        }).done(result => {
            let html = "";
            result.forEach((lecs, key) => {
                lecsKeys = Object.keys(lecs);
                lecsKeys.forEach(key => {
                    html += "<optgroup data-max-options='1' label=" + key + ">";
                    lecs[key].forEach(lec => {
                        html +=
                            "<option value=" +
                            lec.id +
                            ">" +
                            lec.name +
                            " ( " +
                            lec.teacher +
                            " ) </option>";
                    });
                    html += "</optgroup>";
                });
            });
            $("#lectures").html(html);
            $("#lectures").selectpicker("refresh");
        });
    });

    // datatable
    $(".datatable").DataTable({
        order: [],
        language: {
            search: "بحث: ",
            lengthMenu: "عرض _MENU_",
            paginate: {
                next: "التالي",
                previous: "السابق"
            },
            info: "عرض _START_ الي _END_ من _TOTAL_ سِجل",
            zeroRecords: "لم يتم العثور على سجلات متطابقة",
            infoEmpty: ""
        }
    });

    // is_active activation
    $('body').on('change', '.activation', function(event) {
        let id = $(this).data("id");
        let url = $(this).data("url");
        $.ajax({
            type: "POST",
            url: url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: { id: id },
            success: function(data) {
                iziToast.success({
                    message: data.success,
                    position: "topRight"
                });
            }
        });
    });

    // delete button
    $("table").on("click", ".dt-btn-delete", function() {
        var url = $(this).attr("data-url"),
            are_you_sure = $(this).attr("data-areyousure"),
            data = {};
        return confirm_delete(url, data, are_you_sure);
    });

    $(".btn-delete ").click(function() {
        var url = $(this).attr("data-url"),
            are_you_sure = $(this).attr("data-areyousure"),
            data = {};
        return confirm_delete(url, data, are_you_sure);
    });

    $(".majorsajax").on("change", function() {
        let majorId = $(this).val();
        getSubjectsByMajorId(majorId)
            .then(subjects => {
                html = subjects.map(data => {
                    return (
                        "<option value='" +
                        data.id +
                        "'>" +
                        data.name +
                        " / " +
                        data.semester +
                        "</option>"
                    );
                });
                $(".major_subjects_select").html(html);
            })
            .catch(error => {
                console.log("Error :", error);
            });
    });

    let majorId = $(".majorsajax").attr("data-majorid");
    if (typeof majorId != "undefined") {
        getSubjectsByMajorId(majorId)
            .then(subjects => {
                let subjectids = $(".majorsajax")
                    .attr("data-subjectids")
                    .split(",");
                html = subjects.map(data => {
                    let selected = "";
                    if (subjectids.indexOf(data.id.toString()) !== -1) {
                        selected = "selected";
                    }
                    return (
                        "<option " +
                        selected +
                        " value='" +
                        data.id +
                        "'>" +
                        data.name +
                        " / " +
                        data.semester +
                        "</option>"
                    );
                });
                $(".major_subjects_select").html(html);
                let majorsubjectids = $(".major_subjects_select").val();

                if (typeof majorsubjectids != "undefined") {
                    majorsubjectids = majorsubjectids.join(",");

                    $.ajax({
                        url: "/dashboard/students/getLecturesBySubjectIds",
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        data: { ids: majorsubjectids }
                    }).done(result => {
                        let htmlOptions = "";

                        result.forEach((lecs, key) => {
                            lecsKeys = Object.keys(lecs);

                            lecsKeys.forEach(key => {
                                htmlOptions +=
                                    "<optgroup data-max-options='1' label=" +
                                    key +
                                    ">";
                                lecs[key].forEach(lec => {
                                    let subjectids = $(".major_subjects_select")
                                        .attr("data-lecturesids")
                                        .split(",");
                                    let selected = "";
                                    if (
                                        subjectids.indexOf(
                                            lec.id.toString()
                                        ) !== -1
                                    ) {
                                        selected = "selected";
                                    }
                                    htmlOptions +=
                                        "<option " +
                                        selected +
                                        " value=" +
                                        lec.id +
                                        ">" +
                                        lec.name +
                                        " ( " +
                                        lec.teacher +
                                        " ) </option>";
                                });

                                htmlOptions += "</optgroup>";
                            });
                        });

                        $("#lectures").html(htmlOptions);
                        $("#lectures").selectpicker("refresh");
                    });
                }
            })
            .catch(error => {
                console.log("Error :", error);
            });
    }

    $("body").on("click", ".message-contact-us", function() {
        let message = $(this).attr("data-message");
        let title = $(this).attr("data-title");
        console.log("jhj");
        $(".modal-body").text(message);
        $(".modal-title").text(title);
    });

    $(".add-note-to-student").on("click", function() {
        let scid = $(this).data("scid");
        localStorage.setItem("add_note_scid", scid);
        $.ajax({
            url: "/dashboard/teacher/student/note/getnote",
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: { scid }
        }).done(response => {
            $("#modal_add_note_to_student textarea").val(response.note);
            $("#modal_add_note_to_student input[name=show_when_student]").prop(
                "checked",
                response.show_when_student ? true : false
            );
        });
        $("#modal_add_note_to_student").modal("show");
    });

    $("#save-note-student").on("click", function() {
        let scid = localStorage.getItem("add_note_scid");
        let note = $("#modal_add_note_to_student textarea").val();
        let show_when_student = $(
                "#modal_add_note_to_student input[name=show_when_student]"
            ).is(":checked") ?
            1 :
            0;

        $("#modal_add_note_to_student textarea").val("");
        $("#modal_add_note_to_student input[name=show_when_student]").prop(
            "checked",
            false
        );
        $("#modal_add_note_to_student").modal("hide");
        $.ajax({
            url: "/dashboard/teacher/student/note/save_or_update",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: { scid, note, show_when_student }
        }).done(response => {
            if (response.error) {
                iziToast.error({
                    message: response.msg,
                    position: "topRight"
                });
            } else {
                iziToast.success({
                    message: "تم اظافة ملاحظة الطلاب بنجاح",
                    position: "topRight"
                });
            }
        });
    });

    $(".toggle-like").click(function(e) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "post",
            url: $(this).data("url"),
            success: function(data) {
                if (data.success) {
                    var target = $(e.target);
                    $(target)
                        .find("span")
                        .html(data.likes);

                    if ($(target).hasClass("btn-primary")) {
                        $(target).removeClass("btn-primary");
                        $(target).addClass("btn-outline-primary");
                    } else if ($(target).hasClass("btn-outline-primary")) {
                        $(target).removeClass("btn-outline-primary");
                        $(target).addClass("btn-primary");
                    }
                }
            }
        });
    });

    $(".comment-like").click(function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "post",
            url: $(this).data("url"),
            success: function(data) {
                if (data.success) {
                    var target = $(e.target);
                    console.log(target);

                    $(target)
                        .find("span")
                        .html(data.likes);

                    if ($(target).hasClass("btn-primary")) {
                        $(target).removeClass("btn-primary");
                        $(target).addClass("btn-outline-primary");
                    } else if ($(target).hasClass("btn-outline-primary")) {
                        $(target).removeClass("btn-outline-primary");
                        $(target).addClass("btn-primary");
                    }
                }
            }
        });
    });

    $(".add-comment-form").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(data) {
                if (data.success) {
                    location.reload();
                    $(".add-comment-form").trigger("reset");
                }
            }
        });
    });

    $(".btn-edit").click(function() {
        let userID = localStorage.setItem(
            "edit_comment_userid",
            $(this).data("userid")
        );
        let postID = localStorage.setItem(
            "edit_comment_postid",
            $(this).data("postid")
        );
        let commentBody = $(this).attr("data-commentbody");
        let commentID = localStorage.setItem(
            "edit_comment_commentid",
            $(this).data("commentid")
        );

        $("#editComment .modal-body textarea").froalaEditor(
            "html.set",
            commentBody
        );
    });

    $("#update-comment-form").on("submit", function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        let userID = localStorage.getItem("edit_comment_userid");
        let postID = localStorage.getItem("edit_comment_postid");
        let commentID = localStorage.getItem("edit_comment_commentid");
        data.push({ name: "userID", value: userID }, { name: "postID", value: postID }, { name: "commentID", value: commentID });
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: $(this).attr("method"),
            url: $(this).attr("action"),
            data,
            success: function(data) {
                if (data.success) {
                    $("#editComment").modal("toggle");
                    $("#comment-body-" + commentID).html(data.body);
                    $(".comment_" + commentID).attr(
                        "data-commentbody",
                        data.body
                    );
                }
            }
        });
    });

    $(".btn-edit-post").click(function() {
        let userID = localStorage.setItem(
            "edit_post_userid",
            $(this).data("userid")
        );
        let postID = localStorage.setItem(
            "edit_post_id",
            $(this).data("postid")
        );
        let postBody = $(this).attr("data-postbody");
        $("#editPost .modal-body textarea").froalaEditor("html.set", postBody);
    });

    $("#update-post-form").on("submit", function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        let userID = localStorage.getItem("edit_post_userid");
        let postID = localStorage.getItem("edit_post_id");
        data.push({ name: "userID", value: userID }, { name: "postID", value: postID });
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: $(this).attr("method"),
            url: $(this).attr("action"),
            data,
            success: function(data) {
                if (data.success) {
                    $("#editPost").modal("toggle");
                    $("#post-body-" + postID).html("");
                    $("#post-body-" + postID).html("<p>" + data.body + "</p>");

                    $(".post_" + postID).attr("data-postbody", data.body);
                }
            }
        });
    });

    $("body").on('click', '.view-btn', function() {
        let id = $(this).data("id");
        let view = $(this).data("view");
        let reply = $(this).data("reply");

        $("#ViewModal #view-form #view-text").val(view);
        if (reply !== "") {
            $("#ViewModal #view-form #reply-text").val(reply);
        }

        $("#view-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                method: "patch",
                url: "/dashboard/views/" + id,
                data: $(this).serialize(),
                success: function(data) {
                    if (data === "success") {
                        location.reload();
                    }
                }
            });
        });
    });

    setTimeout(() => {
        $(".fr-wrapper div:first-child").css({ display: "none" });
    }, 2000);
    $(".group-textarea").on("froalaEditor.contentChanged", function(e, editor) {
        $(".fr-wrapper div:first-child").css({
            display: "none"
        });
    });

    $(".show_note").click(function() {
        let note = $(this).data("note");
        $(".student_note_text").html(note);
        // console.log($('#student_note .modal-body').html('dsds'));
    });

    $("body").on("change", ".studentsSelectYear", function() {
        let year = $(this).val();
        let action = $(this)
            .find("option:selected")
            .attr("data-active");
        location.href = app_root + "/dashboard/students" + action + "/" + year;
    });

    $("body").on("change", ".teachersSelectYear", function() {
        let year = $(this).val();
        location.href = app_root + "/dashboard/teachers/" + year;
    });

    
});