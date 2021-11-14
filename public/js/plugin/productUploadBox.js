
//Parse file 
function parseFile(file, index) {  
    var isGood = fileTypeChecking(file, window.uploadType);                        
    if (isGood) {
                            
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
                $("#" + window.uploadKey + "-uid").val(data.data.uid);
                insertAttachment(data.data.name + '.' + data.data.extension, data.data.path, data.data.uid);
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
