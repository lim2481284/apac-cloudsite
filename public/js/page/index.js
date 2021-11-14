// Function to get lazy load setting
function getLazySetting() {
    return {
        afterLoad: function(element) {
            $(element).addClass("loaded");
        }
    };
}

//Function to show loader
function showLoader() {
    $(".page-loader").fadeIn(300);
}

//Function to hide Loader
function hideLoader() {
    $(".page-loader").fadeOut();
}

//Hide loader for IOS device
window.addEventListener(
    "pageshow",
    function() {
        setTimeout(function() {
            hideLoader();
        }, 500);
    },
    false
);

(function() {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
})();

//Page loader
window.onload=function() { hideLoader(); }

$(document).ready(function() {

    // Check if is in iframe
    inIframe();

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    hideLoader();
    setTimeout(function() {
        hideLoader();
    }, 1000);

    //Onsubmit form - auto show loader
    $("form").submit(function() {
        if (!$(this).hasClass("hide-form")) showLoader();
    });

    //If hide-form class is added will not show loader onsumbit
    $(".hide-form").submit(function() {
        hideLoader();
    });


    //loader button
    $(document).on("click", "a", function() {
        if (
            $(this).attr("href") != null &&
            !$(this).attr("href").includes("#") 
        ) {
            showLoader();
            if($(this).attr('target') !== "_blank")
                window.location.href = $(this).attr("href");
        }
    });
    $(document).on("click", '.no-loader, a[target="_blank"]', function() {
        setTimeout(function() {
            hideLoader();
        }, 200);
    });


    //Lazy loader
    if ($(".lazy").length) $(".lazy").lazy(getLazySetting());

    // Form button : change modal title, button name and clear form input
    $(document).on("click", ".global-form-btn", function() {
        // Check if got target modal
        if ((target = $(this).data("target"))) {
            // Check if got change modal title
            if ((title = $(this).data("title")))
                $(target + " .modal-title").html(title);

            // Check if got change modal content
            if ((content = $(this).data("content")))
                $(target + " #actionContent").html(content);
            else
                $(target + " #actionContent").html(
                    $("#defaultActionText").val()
                );

            // Check if got change modal action
            if ((submitTitle = $(this).data("submit-title")))
                $(target + " .submit-btn").html(submitTitle);

            // Check if got modal submit acction text     - to improve modal UX
            if ((submitTitle = $(this).data("submit-text")))
                $(target + " .submit-btn").attr("data-text", submitTitle);

            // Check if got clear form
            if ($(this).data("clear")) {
                $(
                    target +
                        " .modal-body input:not([type=button]):not([type=submit]):not([type=radio]):not([type=checkbox])"
                ).val("");
                $(target + " .modal-body select")
                    .val("")
                    .change();
                $(target + " .clear-section").val("");
                $(target + " .clear-section").html("");
                $(target + " .hide-section").hide();

                // If got uploader
                if ((key = $(this).data("uploader"))) {
                    $("#" + key + "-hide").show();
                    $("#" + key + "-image-response").attr("src", "");
                    $("#" + key + "-image-name").html("");
                }
            }

            // Check if got action route
            if ((actionRoute = $(this).data("action-route"))) {
                $(target + " #actionForm").attr("action", actionRoute);

                // Check if got action remark
                if ($(this).data("remark") === true)
                    $(target + " .remark-section").show();
                else $(target + " .remark-section").hide();
            }

            // Check if got mode
            editor = $(this).data("editor");
            if ((mode = $(this).data("mode"))) {
                switch (mode) {
                    case "view":
                        $(target).attr("data-mode", "view");
                        $(
                            target + " .edit-show, " + target + " .create-show"
                        ).hide();
                        $(target + " .view-show").show();
                        $(target + "  input").prop("disabled", true);
                        $(target + "  select").prop("disabled", true);
                        $(target + " input[type='checkbox']").prop(
                            "checked",
                            false
                        );
                        $(target + "  p.required").addClass("no-required");
                        if (editor) {
                            tinymce.get(editor).mode.set("readonly");
                            $("#" + editor)
                                .siblings(".tox-tinymce")
                                .addClass("readonly");
                        }
                        break;
                    case "create":
                        $(target).attr("data-mode", "create");
                        $(
                            target + " .edit-show, " + target + " .view-show"
                        ).hide();
                        $(target + " .create-show").show();
                        $(target + "  input").prop("disabled", false);
                        $(target + "  select").prop("disabled", false);
                        $(target + " input[type='checkbox']").prop(
                            "checked",
                            false
                        );
                        $(target + "  p.required").removeClass("no-required");
                        if (editor) {
                            tinymce.get(editor).mode.set("design");
                            $("#" + editor)
                                .siblings(".tox-tinymce")
                                .removeClass("readonly");
                            tinyMCE.get(editor).setContent("");
                        }
                        break;

                    case "edit":
                        $(target).attr("data-mode", "edit");
                        $(
                            target + " .create-show, " + target + " .view-show"
                        ).hide();
                        $(target + " .edit-show").show();
                        $(target + "  input").prop("disabled", false);
                        $(target + "  input.disabled").prop("disabled", true);
                        $(target + "  select").prop("disabled", false);
                        $(target + " input[type='checkbox']").prop(
                            "checked",
                            false
                        );
                        $(target + "  p.required").removeClass("no-required");
                        if (editor) {
                            tinymce.get(editor).mode.set("design");
                            $("#" + editor)
                                .siblings(".tox-tinymce")
                                .removeClass("readonly");
                            tinyMCE.get(editor).setContent("");
                        }
                        break;
                }
            }

            // Check if got ajax grab data
            routeCallback = $(this).data("route-callback");
            uploaderKey = $(this).data("uploader");
            if ((route = $(this).data("route"))) {
                showLoader();
                $.ajax({
                    type: "GET",
                    url: "/" + window.location.pathname.split("/")[1] + route,
                    success: function(data) {
                        //Insert data to all input
                        $.each(data, function(index, value) {
                            $(
                                target +
                                    " input[name='" +
                                    index +
                                    "']:not([type=radio])"
                            ).val(value);
                            $(target + " textarea[name='" + index + "']").html(
                                value
                            );
                            $(target + " select[name='" + index + "']")
                                .val(value)
                                .change();
                        });

                        if (editor && data.content)
                            tinyMCE.get(editor).setContent(data.content);

                        // CHeck if got custom route callback function
                        if (routeCallback) {
                            if (mode == "view") {
                                $(target + "  input").prop("disabled", false);
                                $(target + "  textarea").prop(
                                    "disabled",
                                    false
                                );
                                $(target + "  select").prop("disabled", false);
                                window[routeCallback](data, target);
                                $(target + "  textarea").prop("disabled", true);
                                $(target + "  input").prop("disabled", true);
                                $(target + "  select").prop("disabled", true);
                            } else window[routeCallback](data, target);
                        }

                        // Check if got uploader
                        if (uploaderKey) {
                            $("#" + uploaderKey + "-hide").hide();
                            $("#" + uploaderKey + "-image-response").attr(
                                "src",
                                data.attachment_image
                                    ? data.attachment_image
                                    : data.attachment
                            );
                            $("#" + uploaderKey + "-image-name").html(
                                data.attachment
                            );
                        }

                        hideLoader();
                    }
                });
            }

            //Check if got custom function
            if ((f = $(this).data("function"))) window[f](target);
        }
    });

    //Action button  : pass value to specific target id based on attribute ( put below is becuase need to clear data first only insert data )
    $(document).on("click", ".action-btn", function() {
        var target = $(this)
            .attr("target-id")
            .split("||");
        var targetVal = $(this)
            .attr("value")
            .split("||");
        $.each(target, function(index, value) {
            $("#" + value).val(targetVal[index]);
        });
    });

    // Custom-toggle
    if ($(".custom-toggle").length) {
        $(".custom-toggle").each(function(i, obj) {
            checkToggle(obj);
        });
        $(document).on("change", ".custom-toggle", function() {
            checkToggle(this);
        });
    }
    function checkToggle(obj) {
        if ($(obj).is(":checked"))
            $(obj)
                .parent()
                .find(".checkbox-input-hidden")
                .slideDown()
                .find("input")
                .prop("required", true);
        else
            $(obj)
                .parent()
                .find(".checkbox-input-hidden")
                .slideUp()
                .find("input")
                .prop("required", false);

        if ($(obj).data("not-required"))
            $(obj)
                .parent()
                .find("input")
                .prop("required", false);
    }

    // Check if is in iframe
    function inIframe() {
        try {
            if (window.self !== window.top) $("html").addClass("embed");
        } catch (e) {
            return true;
        }
    }
});
