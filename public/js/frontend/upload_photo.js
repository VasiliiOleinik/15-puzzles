$(document).ready(function()
{
    $("#fileuploader").uploadFile({
        url: "YOUR_FILE_UPLOAD_URL",
        //fileName: "myfile",
        multiple:false,
        acceptFiles:"image/*"
    });
});
