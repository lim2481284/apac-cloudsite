


/*
    #1 - Flexible file upload design  x 
    #2 - File type checking 
    #3 - File optimization ? https://embed.plnkr.co/plunk/v5JU2v  
    #4 - Seperate file checking and optimization function  x 
    #5 - File display  x 
    #6 - Multiple file display  x 

*/


// File Upload

//Function to check file format 
function fileTypeChecking(file, type)
{
    if(type =="image")
        return /\.(?=jpg|png|jpeg|jfif|gif|webp|tiff|mp3|mp4|wmv|avi|mov|webm|flv|avchd|ogg|mkv|wav)/gi.test(file.name)
    if(type == "attachment")
        return /\.(?=csv|xlsx|pdf|doc|docx)/gi.test(file.name)
}

//Function to initalize uploadBox
function initialUploadBox(key, type='image')
{

    window.fileInputID = key + "-upload";
    window.fileDragID = key + "-drag";
    window.labelID = key + "-hide";
    window.uploadType = type;
    window.uploadKey = key;
    
    // Check for the various File API support.
    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {            
        document.getElementById(window.fileDragID).style.display = "none";                       
    }

}

//Initialize 
function Init() {            
    var fileSelect = document.getElementById(window.fileInputID);
    fileSelect.addEventListener("change", fileSelectHandler, false);          
}


//File drag hover
function fileDragHover(e) {            
    var fileDrag = document.getElementById(window.fileDragID);
    e.stopPropagation();
    e.preventDefault();
    fileDrag.className =
        e.type === "dragover" ? "hover" : "modal-body file-upload";
}


//File select
function fileSelectHandler(e) {
    
    var files = e.target.files || e.dataTransfer.files;            
    fileDragHover(e);

    var filesLength = files.length;
    if(filesLength == 1){          
        parseFile(files[0],0);            
    }
    else {
        // Process all File objects        
        for (var i = 0, f; (f = files[i]); i++) {
            parseFile(f, i);
        }            
    }
}


//Parse file 
function parseFile(file, index) {  
    var isGood = fileTypeChecking(file, window.uploadType);                        
    if (isGood) {
        $("#"+window.labelID).hide();
                            
        // AJAX upload file to filemanager 
        showLoader();                                    
        var formData = new FormData();
        formData.append('file', $('#'+window.fileInputID)[0].files[index]); 
        formData.append('fileAccept',window.uploadType); 
        
        $.ajax({
            type: 'POST',
            url: "/file/store",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {     
                $("#" + window.uploadKey + "-uploader .clear-input").val('');
                $("#" + window.uploadKey + "-image-response").attr('src', data.data.path);
                $("#" + window.uploadKey + "-uid").val(data.data.uid);
                $("#" + window.uploadKey + "-image-name").html(data.data.name + '.' + data.data.extension);                     
                hideLoader();
            },
            error: function (jqXHR) {                
                hideLoader();
                fileErrorHandling(jqXHR);
            }
        });

    } else {                  
        document.getElementById(window.labelID).classList.remove("hidden");                   
        swal('','Invalid File Format. 文件格式不对','warning'); 
    }
}


// File manager button 
$(document).on('click','.filemanager-btn',function(e){
    e.preventDefault();  

    var key = $(this).data('key');
    $("#insertFileBtn").attr('data-targetsource', key + "-image-response")
    $("#insertFileBtn").attr('data-targetuuid', key + "-uid");
    $("#insertFileBtn").attr('data-targetname', key + "-image-name");
    $("#insertFileBtn").attr('data-targetpath', key + "-image-path");
    $("#insertFileBtn").attr('data-targetuploader', key + "-uploader");

    // Get filemanager type 
    var type = $(this).data('type');
    if(!type) type = null;

    $("#fileManager").attr('data-type',type);        
    $("#fileManager").modal('show');        
})


// Function to handle storage full 
function fileErrorHandling(response){
    console.log(response);
    if(response.status == 430){
        var data = response.responseJSON.data;
        swal(data.title, data.description, {
            icon: "warning",
            buttons: {
                manage:  data.handling,
                cancel: "Ok",
            },
        })
        .then((value) => {
            switch (value) {
                case "manage":
                    window.open('/system/filemanager', '_blank');
                break;
            }
        });
    }
    else 
        swal('',JSON.parse(response.responseText).message,'error');

}