//Bootstrap when out of modal its become empty
$(document).ready(function() {
    $('#addEmployeeModal').on('hidden.bs.modal', function() {
        // alert('Modal is close');
        $('#username').removeClass("border-danger");
        $('#useremail').removeClass("border-danger");
        $('#userphone').removeClass("border-danger");
        $('#useraddress').removeClass("border-danger");
        $("#nameErr").html("");
        $('#emailErr').html("");
        $('#phoneErr').html("");
        $('#addressErr').html("");
        $(this).find('form').trigger('reset');

    })
});



//Edit User
$(document).ready(function() {
    $('.edit_user').click(function() {
        $('.modal-title').html('Edit User');
        $('#submit').val('Update');
        $('#addEmployeeModal').modal('show');
    });
    $('#submit').click(function() {
        var nameErr = emailErr = phoneErr = addressErr = true;
        var nameval = $('#username').val();
        var emailval = $('#useremail').val();
        var addressval = $('#useraddress').val();
        var phoneval = $('#userphone').val();
        const form = document.getElementById('form');

        // console.log(nameval);
        // console.log(emailval);
        // console.log(addressval);
        // console.log(phoneval);

        //Regular Expressions
        var nameReg = /^[a-zA-Z ]{2,30}$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var phoneReg = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;

        if (nameval === "") {
            $('#username').addClass("border-danger");
            $("#nameErr").html("* This Field is required!");
            nameErr = false;
        } else if (nameval.length < 3) {
            $('#username').removeClass("border").addClass("border-danger");
            $("#nameErr").html("* Name must be at least 3 character!");
            nameErr = false;
        } else if (!nameReg.test(nameval)) {
            $('#username').removeClass("border").addClass("border-danger");
            $("#nameErr").html("* Only character are allowed!");
            nameErr = false;
        } else {
            $('#username').removeClass("border-danger").addClass("border");
            $('#nameErr').html("");
        }

        //Email validation  
        if (emailval === "") {
            $('#useremail').addClass("border-danger");
            $('#emailErr').html("* This field is required");
            emailErr = false;
        } else if (!emailReg.test(emailval)) {
            $('#useremail').removeClass("border").addClass("border-danger");
            $('#emailErr').html("* Invalid Email format");
            emailErr = false;
        } else {
            $('#useremail').removeClass("border-danger").addClass("border");
            $('#emailErr').html("");
        }

        //Phone validation
        if (phoneval === "") {
            $('#userphone').addClass("border-danger");
            $('#phoneErr').html("* This Field is required!");
            phoneErr = false;
        } else if (phoneval.length < 11 || phoneval.length > 13) {
            $('#userphone').removeClass("border").addClass("border-danger");
            $('#phoneErr').html("* Invalid phone length must be 11");
            phoneErr = false
        } else if (!phoneReg.test(phoneval)) {
            $('#userphone').removeClass("border").addClass("border-danger");
            $('#phoneErr').html("* Invalid phone Format! Correct is = 03123456789");
            phoneErr = false;
        } else {
            $('#userphone').removeClass("border-danger").addClass("border");
            $('#phoneErr').html("");
        }


        //Address Validation
        if (addressval === "") {
            $('#useraddress').addClass("border-danger");
            $('#addressErr').html("* This Field is required!");
            addressErr = false;
        } else {
            $('#useraddress').removeClass("border-danger").addClass("border");
            $('#addressErr').html("");
        }

        if ((nameErr && emailErr && phoneErr && addressErr) == false) {
            return false;
        } else {
            // if (confirm("Are you sure to save this record")) {
            //     return true;
            // }
            // return false;

        }
    });
});


//Delete Multiple user
$(document).ready(function() {
    $('#delete_multiple_user').click(function() {
        if ($('input[type=checkbox]:checked').length > 0) {
            // $('#deleteEmployeeModal').modal('show');
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your file has been deleted Successfully !", { icon: "success", });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        } else {
            swal("* Please Select record to delete!");
            return false;
        }

    });
});