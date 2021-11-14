

// On toggle tool list
$(document).on('click','.tools-button',function(){
    $(".notes-box").removeClass('active');
    $(".tool-list").toggleClass('active');
    $('.tool-overlay').toggle();
    $('.mobile-slidepane').removeClass('expand');
    $('.profile-overlay.mobile').removeClass('toggle');
})
$(document).on('click','.tool-overlay',function(){
    $(".tool-list, .notes-box").removeClass('active');
    $('.tool-overlay').hide();
})


// On click edit
$(document).on('click','.edit-note-button',function(e){
    e.stopPropagation();
    var list = $(this).parentsUntil('li').parent();
    $(list).removeClass('active');
    $(list).find('input').prop('readonly',false).focus();
    $(list).find('.active-btn').hide();
    $(list).find('.hide-btn').show();
})

// On toggle notepad
$(document).on('click','.notepad-toggle, .notepad-mobile-toggle',function(){
    $(".tool-list").removeClass('active');
    $(".notes-box").toggleClass('active',$(this).data('toggle'));
    if(!$(this).data('toggle')) $('.tool-overlay').hide();
    else grabNote();
})

$(".notepad-mobile-toggle").click(function() {
    $('.mobile-slidepane').removeClass('expand');
    $(".notes-box").toggleClass("active", $(this).data("toggle"));
    if (!$(this).data("toggle")) $(".tool-overlay").hide();
    else grabNote();
});

// On click note list
$(document).on('click','#todoList li.active',function(){
    grabNote(true, $(this).attr('data-uid'));
})

// On click note back
$(document).on('click','.notepad-back',function(){
    grabNote();
})


// On key up input text
$(document).on('keyup','#noteText',function(){
    $("#addNoteBtn").prop('disabled',($.trim($(this).val()) == 0));
})


// On click add note
$(document).on('click','#addNoteBtn', function(){
    var title = $("#noteText").val();
    $('.note-loader').fadeIn();
    $("#addNoteBtn").prop('disabled',true);
    if(!title) swal('','{{translate('please_fill_title','Please fill in title')}}','warning')
    createOrUpdateNote(title);
})


// On click done edit note button
$(document).on('click','.done-edit-btn', function(e){
    e.stopPropagation();
    var list = $(this).parentsUntil('li').parent();
    $(list).addClass('active');
    $(list).find('input').prop('readonly',true);
    $(list).find('.active-btn').show();
    $(list).find('.hide-btn').hide();

    createOrUpdateNote($(list).find('input').val(),null,$(this).val());
})


// On keyup note description
$(document).on('keyup', '#noteDesc textarea',delay(function(e) {
    createOrUpdateNote(null, $(this).val(), $(this).attr('data-uid'));
}, 500));


// On delete note
$(document).on('click','.delete-note-button',function(e){
    e.stopPropagation();
    var currentElement = $(this);
    confirmationAlert(function(e){
        if(e){
            $.ajax({
                url: '/{{Lang::getLocale()}}/tool/note/action',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    action: 'delete',
                    actionID: $(currentElement).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    $(currentElement).parentsUntil('li').parent().remove();
                }
            });
        }
    })

})




// Function to create or update note
function createOrUpdateNote(title=null, description=null, uid=null)
{
    $.ajax({
        url: '/{{Lang::getLocale()}}/tool/note/update',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            title: title,
            description: description,
            uid: uid
        },
        dataType: 'JSON',
        success: function (data) {
            if(!description)grabNote();
        }
    });
}


// Function to grab current user note
function grabNote(isDescription = false, uid = null)
{

// Check if is descriptino or note item
$('.no-notes, #noteDesc, #todoList, .inputField, .notepad-back').hide();
$('.note-loader').fadeIn();
if(isDescription)
{
$("#noteDesc textarea").val('');
$("#noteDesc, .notepad-back").show();
$("#noteTopTitle").html('');
}
else
{
$("#noteTopTitle").html($("#noteTopTitle").data('title'));
$("#noteText").val('');
$('.inputField').show();
}

// Grab data
$.ajax({
    url: '/{{Lang::getLocale()}}/tool/note/get',
    type: 'GET',
    data: {
        _token: CSRF_TOKEN,
        uid: uid,
    },
    dataType: 'JSON',
    success: function (data) {

    // Handle response based on action
    if(isDescription)
    {
        $("#noteDesc textarea").val(data.description).attr('data-uid',data.uid);
        $("#noteTopTitle").html(data.title);
        $('.note-loader').fadeOut();
    }
    else
    {
        if(data.length<=0) $('.no-notes').show(); 
        else { 
            $('.no-notes').hide(); $("#todoList").html('').show(); 
            $.each(data, function(i,v){ $("#todoList").append(` 
                <div class="note">
                    <li data-uid="${v.uid}" class='active'>
                        <input type='text' readonly value='${v.title}' maxlength='30' />
                        <div class='note-icon'>
                            <button class="btn btn-link active-btn" type='button'><i class="fas fa-eye"></i></button>
                            <button class="btn btn-link edit-note-button active-btn" type='button'><i class="fas fa-edit"></i></button>
                            <button class="btn btn-link delete-note-button active-btn" value='${v.uid}' type='button'><i
                                    class="fas fa-trash"></i></button>
                            <button class="btn btn-link done-edit-btn hide-btn" value='${v.uid}' type='button'><i
                                    class="fas fa-check"></i></button>
                        </div>
                    </li>
                </div>
            `);
            })
            }
        $('.note-loader').fadeOut();
    }
    }
    });
}

   