var loadFile = function(event){
	var output = document.getElementById('output');
	output.src = URL.createObjectURL(event.target.files[0]);
	output.onload = function(){
		URL.revokeObjectURL(output.src)
	}
};

/*$(document).ready(function(e){

    let $uploadfile = $('#register .upload-profile-image input[type="file"]');
    $uploadfile.change(function(){
        readURL(this);
    });

    $("#regStaffForm").submit(function(event){
       let $password = $("#staffPassword"); 
       let $confirm_pwd = $("#confirmStaffPassword"); 
       let $error = $("#confirm_error"); 

       if($password.val() === $confirm_pwd.val()){
           return true;
       } else{
        $error.text("Password did not match");
        event.preventDefault();
       }
    });
});

function readURL(input){
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            $("#register .upload-profile-image .img").attr('src', e.target.result);
            $("#register .upload-profile-image .camera-icon").css(['display'='none'])
        }
        reader.readAsDataURL(input.files[0]);
    }
}*?
