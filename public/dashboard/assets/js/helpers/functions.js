function initFunctions() {
    submitAjaxForm();
    bindMediaBrowser();
}

/*
 * Function Submit Fomr Ajax
 * @param element by default class ajax
 */
function submitAjaxForm(element = ".ajax") {
    $("form" + element)
        .validator()
        .on("submit", function(e) {
            if (e.isDefaultPrevented()) {
                return false;
            }
            e.preventDefault();

            var class_submit_button = element.replace(".", "");
            class_submit_button = class_submit_button.replace("#", "");

            $(this)
                .find("[type=submit]")
                .addClass("ladda-button");
            $(this)
                .find("[type=submit]")
                .addClass(class_submit_button + "_button_submit");
            $(this)
                .find("[type=submit]")
                .attr("data-style", "expand-left");
            var ladda_button = Ladda.create(
                document.querySelector(element + "_button_submit")
            );
            (data = $(this).serialize()),
                (url = $(this).attr("action")),
                (method = $(this).attr("method"));

            var formData = new FormData($(this)[0]);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: url,
                method: method,
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    ladda_button.start();
                }
            }).done(function(data) {
                if (typeof data.reset !== "undefined" && data.reset == true) {
                    $(element)[0].reset();
                }
                if (
                    typeof data.redir !== "undefined" &&
                    data.redir != "reload"
                ) {
                    location.href = data.redir;
                } else if (
                    typeof data.redir !== "undefined" &&
                    data.redir == "reload"
                ) {
                    location.reload();
                } else if (typeof data.msg !== "undefined") {
                    var message = data.msg;

                    var type = "success",
                        body = "",
                        title = "";
                    if (typeof message.type !== "undefined") {
                        type = message.type;
                    }
                    if (typeof message.body !== "undefined") {
                        body = message.body;
                    }
                    if (typeof message.title !== "undefined") {
                        title = message.title;
                    }

                    swal({
                        title: title,
                        text: body,
                        icon: type,
                        buttons: {
                            ok: "موافق"
                        }
                    });
                }
                ladda_button.stop();
            });
        });
}

function confirm_delete(url, data, message_confirm = "Are you sure?") {
    swal({
        title: message_confirm,
        icon: "warning",
        buttons: ["لا", "نعم"],
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            $.ajax({
                url: url,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: data,
                method: "DELETE",
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            return false;
        }
    });
}

function bindMediaBrowser() {
    $("[data-type~=image]").each(function() {
        var id = $(this).attr("data-id");
        var preview = $(this).attr("data-preview");
        preview =
            typeof preview !== "undefined" && preview !== false ? preview : "";

        $(this).on("click", function() {
            $.colorbox({
                href:
                    app_root +
                    "/dashboard/media/picker?id=" +
                    id +
                    "&preview=" +
                    preview,
                fastIframe: true,
                overlayClose: false,
                iframe: true,
                width: "90%",
                height: "90%"
            });
        });
    });

    $("[data-type~=image]").each(function() {
        var self = $(this);
        var image_input = $(this).attr("data-id");

        updateImagePreview(self);

        $("#" + image_input).on("change", function() {
            updateImagePreview(self);
        });
    });
}

function updateImagePreview(self) {
    var image_input = $(self).attr("data-id");
    var filePath = $("#" + image_input).val();
    var previewButton = $(self).next();

    if (filePath != "") {
        var image = new Image();
        image.src = filePath;

        var extra_style = filePath.match(/.svg$/)
            ? "min-height:64px;min-width:64px;"
            : "";

        $(previewButton).removeClass("disabled");
        $(previewButton).attr("data-toggle", "popover");
        $(previewButton).css("cursor", "help");
        $(previewButton).attr(
            "data-content",
            '<img src="' +
                filePath +
                '" style="max-width:240px;max-height:280px;' +
                extra_style +
                '">'
        );
    }
}

// Callback after elfinder selection
window.processSelectedFile = function(
    filePath,
    requestingField,
    previewButton
) {
    $("#" + requestingField).val(decodeURI(filePath));

    if (previewButton != "") {
        var image = new Image();
        image.src = decodeURI(filePath);

        var extra_style = filePath.match(/.svg$/)
            ? "min-height:64px;min-width:64px;"
            : "";

        $("#" + previewButton).removeClass("disabled");
        $("#" + previewButton).attr("data-toggle", "popover");
        $("#" + previewButton).attr("data-original-title", null);
        $("#" + previewButton).css("cursor", "help");
        $("#" + previewButton).attr(
            "data-content",
            '<img src="' +
                decodeURI(filePath) +
                '" style="max-width:240px;max-height:280px;' +
                extra_style +
                '">'
        );

        $("[data-toggle~=popover]").popover({
            container: "body",
            trigger: "hover",
            template:
                '<div class="popover" role="tooltip"><div class="popover-arrow"></div><div class="popover-content" style="padding:0"></div></div>',
            html: true
        });
    }
};

// Get Subjects By Major id
function getSubjectsByMajorId(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "/dashboard/students/subjects/" + id,
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: data => {
                resolve(data);
            },
            error: error => {
                reject(error);
            }
        });
    });
}
