$(document).ready(function() {
    "use strict";

    (function(condition) {
        if (!condition) {
            return false;
        }

        //filter form section
        if ($(".filter-form").length) {
            $(".filter-form").css("display", "none");

            try {
                $("body").append(
                    `
                        <div id="filter-form-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">                
                                        <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
                                    </div>
                                    <div class="modal-body">            
                                        <div class='container'>
                                            ${$(".filter-form").html()}
                                        </div>
                                    </div>         
                                </div>
                            </div>
                        </div>
                    `
                );
            } finally {
                //self destruct element
                $(".filter-form").remove();

                //register event to filter btn
                $(".filter-box")
                    .css("display", "flex")
                    .on("click", function() {
                        $("#filter-form-modal").modal("show");
                    });
            }
        }
    })(window.innerWidth < 768);
});
