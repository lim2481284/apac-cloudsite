<script>
    $(document).ready(function() {


        // Check if got hash - tour 
        if (hash = window.location.hash) {
            var tourPage = null;
            switch (hash) {
                case "#logo":
                    tourPage = [{
                        title: '{{translate("setup_logo","Setup Logo")}}',
                        intro: '{{translate("setup_logo_desc","Check out this section to setup your store logo")}}',
                        element: '.store-logo-section'
                    }]
                    break;
                case "#social":
                    tourPage = [{
                        title: '{{translate("social_media_integration","Social Media Integration")}}',
                        intro: '{{translate("social_media_integration_desc","Check out this section to setup your store social media integration")}}',
                        element: '.social-setup-section'
                    }]
                    break;
                case "#policy":
                    tourPage = [{
                        title: '{{translate("setup_store_policy","Setup Store Policy")}}',
                        intro: '{{translate("store_policy_desc","Check out this section to setup your store policy")}}',
                        element: '.store-policy-section'
                    }]
                    break;
                case "#name":
                    tourPage = [{
                        title: '{{translate("setup_store_name","Setup Store Name")}}',
                        intro: '{{translate("setup_store_name_desc","Check out this section to setup your store name")}}',
                        element: '.store-name-section'
                    }]
                    break;
                case "#domain" :
                    tourPage = [{
                        title : '{{translate("setup_website_name","Setup Websie Name")}}',
                        intro : '{{translate("setup_website_name_desc","Check out this section to setup your website name")}}',
                        element: '.domain-section'
                    }]
                    break;
            }
            if (tourPage) {
                var introSetting = {
                    showBullets: false,
                    steps: tourPage,
                    showProgress: true,
                };
                initTour(introSetting);
            }
        }


        // Modify file manager behave 
        $('.uploaded-hide').html(`<img src='/img/icon/logo.png'/><small>{{translate("click_filemanager_logo","Click on File Manager button to upload your logo")}}</small>`);
        $('.store-logo-section input[type="file"]').remove();
        $(".store-logo-section .filemanager-btn").html("{{translate('update','Update')}}")
        

        @if(isset($merchant))

            // Grab store logo 
            @foreach(['desktop','mobile','favicon'] as $size)
                @if($json = $merchant->getJSON('attachment',$size))
                    @php($attachment = $merchant->getAttachment('/img/icon/logo.png',json_decode($json)))
                    $("#{{$size}}-hide").hide();
                    $("#{{$size}}-image-response").attr( "src", "{{$attachment['path']}}");
                    $("#{{$size}}-image-name").html("{{$attachment['name']}}");
                @endif
            @endforeach

            // Update default sender info
            @php($merchantMeta = $merchant->getMeta())
            @foreach(getConfig('easyparcel.sender_form_input') as $name=>$v)
                @if(isset($merchantMeta->default_sender))
                    $("[name='{{$name}}']").val("{{ $merchantMeta->default_sender->{$name} }}").change()
                @endif
            @endforeach

            // Disable all action if is not editor 
            @if(isset($isEditor) && !$isEditor)
                $('input, select').prop('disabled', true);
                $('.info-row .btn').remove();

            @endif

        @endif
       

        //for general store idt selection plugins
        if ($("#idt").length) {
            let slim = new SlimSelect({
                select: '#idt',
                limit: 10,
                onChange: (info) => {
                }
            })
        }

        // On update action button
        $(document).on('click', '.update-action-btn', delay(function(e) {

            // Hide modal & update input 
            $("#actionModal").modal('hide');
            $("." + $("#actionID").val()).val($("#actionID").val() + "||" + $("#targetID").val() + "||" + $("#sectionID").val());

            // Ajax submit 
            submitAction($("#targetID").val(), $("#actionID").val(), $("#sectionID").val());

        }, 300));


        // On update info button
        $(document).on('click', '.update-info-btn', delay(function(e) {

            // Hide modal
            $("#infoModal").modal('hide');

            // Ajax submit 
            submitAction(tinyMCE.get($(this).val()).getContent(), 'info', $(this).val());

        }, 300));


        // On click action button 
        $(document).on('click', '.action-box .action-btn', function() {
            $("#actionModal .modal-title").html($(this).data('title'));
            $("#actionModal .input-title").html($(this).data('input'));
        })

        // On click info button 
        $(document).on('click', '.info-btn', function() {
            var target = $(this).attr('data-info');
            $('.tinymce-section').hide();
            $("#infoModal .modal-title").html($(this).parent().parent().find('.title').text());
            $('.update-info-btn').val(target);
            $("#" + target + "Section").show();
        })

        // On Change toggle update - notification
        $(document).on('change', '.switch', delay(function(e) {
            $.ajax({
                url: '/{{Lang::getLocale()}}/system/general/action',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    target: $(this).data('target'),
                    checked: $(this).is(":checked"),
                    section: $(this).data('section'),
                    action: 'toggle'
                },
                dataType: 'JSON'
            });
            toast("{{translate('setting_updated','Setting Updated')}}")
        }, 500));

        // activation of domain
        $(document).on('change', '.availability_switch', function(e) {
            if($(this).is(":checked") == false && $('.availability_switch:checked').length == 1){
                e.preventDefault()
                $(this).prop('checked', true);
                toast("{{translate('must_have_one_active_domain','At least one domain must be selected')}}")
            }
            else if($(this).is(":checked") == false && $(this).data('primary') == true){
                $(this).prop('checked', true);
                swal('','{{translate('not_able_to disactivate','Primary Domain Cannot Be Deactivate. Set Other Domain As Primary Domain if you wish to deactive current domain')}}','error')
            }
            else{
                $.ajax({
                    url: '/{{Lang::getLocale()}}/system/general/domainSetting',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,       
                        target: $(this).data('target'),  
                        checked:  $(this).is(":checked"),  
                        action: $(this).data('action')
                    },
                    dataType: 'JSON',
                    success: function(e){
                        swal('','{{translate('activation_update','Activate Domain List Update Successfully')}}','success').then(function(){ 
                        location.reload();
                        }
                        );
                    }
                });        
            }
        })

        //Check domain availability
        $(document).on('keyup', '.domainInput', delay(function() {
            showLoader();
            $('.domainExist').removeAttr('style').html('');
            if ($(this).val())
                checkDomain($(this).val());
            else 
                hideLoader();
        }, 300));


        //pass value to modal 
        $("#editDomainModal").on('show.bs.modal', function(e){
            var button = $(e.relatedTarget)
            var domain_name = button.data('domain')
            $(this).find('.domainInput').val(domain_name.split('.')[0]);
            $(this).find('.oldDomain').val(domain_name.split('.')[0]);
        })

        //Check total industry count
        $("input:checkbox[name='idt[]']").on('change', function() {
            var count = $("input:checked[name='idt[]']").length
            if (count > parseInt("{{(isset($merchant))?getMerchant()->getMeta('max_industry'):getConfig('system.merchant_config.max_industry')}}")) {
                $(this).prop('checked', false);
                $('#requestModal').modal('show');
            }
        });

        
        // Set primary domain
        $(document).on('click', '.set_primary_domain', function(e){
            $.ajax({
                url: '/{{Lang::getLocale()}}/system/general/domainSetting',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,       
                    target: $(this).data('target'),  
                    action: $(this).data('action')
                },
                dataType: 'JSON',
                success: function(e){
                    swal('','{{translate('set_primary_domain_success','Successfully Set As Primary Domain')}}','success').then(function(){ 
                        location.reload();
                    });
                }
            });  
        })

    })


    // Function to submit action request 
    function submitAction(target, action, section) {
        $.ajax({
            url: '/{{Lang::getLocale()}}/system/general/action',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                target: target,
                action: action,
                section: section
            },
            dataType: 'JSON',
            success: function(data) {
                toast(data.message);
            }
        });
    }


    //Check domain availability ajax
    function checkDomain(val) {
        $.ajax({
            url: '/{{Lang::getLocale()}}/domain/check',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                domain: val
            },
            dataType: 'JSON',
            success: function(data) {
                $('.domainExist')
                    .attr('style', (data.available) ? 'color:green;' : 'color:red;')
                    .attr('data-availability', data.available)
                    .html(data.message);
                hideLoader();
            },
            error: function(){
                hideLoader();
            }
        });
    }
</script>