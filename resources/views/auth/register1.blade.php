<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
 body {
    margin-top:30px;
}
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-6">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Login User Info</small></p>
            </div>
            <div class="stepwizard-step col-xs-6">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Complete Your Details</small></p>
            </div>

    </div>

    <form role="form">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Login User Info</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">UserName</label>
                    <input maxlength="100" type="text" id="name" name="name" required="required" class="form-control" placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input maxlength="100" type="text" id="email" name="email" required="required" class="form-control" placeholder="Enter Email" />
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input maxlength="100" type="password" id="password" name="password" required="required" class="form-control" placeholder="Enter Password" />
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <input maxlength="100" type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control" placeholder="Re-Enter Password" />
                </div>
                <div class="form-group">
                    <label class="control-label">Select Your Role</label>
                    <select class="form-control" name="role" id="role" required>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                    </select>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Complete Your Details</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input maxlength="100" type="text" id="f_name" name="f_name" required="required" class="form-control" placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" type="text" id="l_name" name="l_name" required="required" class="form-control" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Gender</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile</label>
                    <input maxlength="200" type="text" id="mobile" name="mobile" required="required" class="form-control" placeholder="Enter Your Mobile Number" />
                </div>
                <div class="form-group">
                    <label class="control-label">Department</label>
                    <select class="form-control" name="department" id="department" required>
                        <option value="male">Neurology</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Designation</label>
                    <input maxlength="200" type="text" id="designation" name="designation" required="required" class="form-control" placeholder="Enter Your Designation" />
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>
                    <input maxlength="200" type="text" id="address" name="address" required="required" class="form-control" placeholder="Enter Your Address" />
                </div>

                <div class="form-group">
                    <label class="control-label">Date of Births</label>
                    <input maxlength="200" type="date" id="dob" name="mobile" required="required" class="form-control" placeholder="Enter Date of Birth" />
                </div>
                <div class="form-group">
                    <label class="control-label">Education</label>
                    <input maxlength="200" type="text" id="education" name="education" required="required" class="form-control" placeholder="Enter Your Education" />
                </div>
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <input maxlength="200" type="file" id="image" name="image" required="required" class="form-control" placeholder="Choose an Image" />
                </div>
                <button type="submit">Submit</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Complete Your Details</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input maxlength="100" type="text" id="f_name" name="f_name" required="required" class="form-control" placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" type="text" id="l_name" name="l_name" required="required" class="form-control" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Gender</label>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile</label>
                    <input maxlength="200" type="text" id="mobile" name="mobile" required="required" class="form-control" placeholder="Enter Your Mobile Number" />
                </div>
                <div class="form-group">
                    <label class="control-label">Date of Births</label>
                    <input maxlength="200" type="date" id="dob" name="mobile" required="required" class="form-control" placeholder="Enter Date of Birth" />
                </div>
                <div class="form-group">
                    <label class="control-label">Age</label>
                    <input maxlength="200" type="text" id="age" name="age" required="required" class="form-control" placeholder="Enter Your Age" />
                </div>
                <div class="form-group">
                    <label class="control-label">Marital Status</label>
                    <select class="form-control" name="marital_status" id="marital_status" required>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>
                    <input maxlength="200" type="text" id="address" name="address" required="required" class="form-control" placeholder="Enter Your Address" />
                </div>

                <div class="form-group">
                    <label class="control-label">Blood Group</label>
                    <select class="form-control" name="blood_group" id="blood_group" required>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Blood Pressure</label>
                    <input maxlength="200" type="text" id="blood_pressure" name="blood_pressure" required="required" class="form-control" placeholder="Enter Your Blood Pressure" />
                </div>
                <div class="form-group">
                    <label class="control-label">Blood Sugar</label>
                    <input maxlength="200" type="text" id="blood_sugar" name="blood_sugar" required="required" class="form-control" placeholder="Enter Your Blood Sugar" />
                </div>
                <div class="form-group">
                    <label class="control-label">Conditions</label>
                    <input maxlength="200" type="text" id="Conditions" name="Conditions" required="required" class="form-control" placeholder="Enter Your Conditions" />
                </div>
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <input maxlength="200" type="file" id="image" name="image" required="required" class="form-control" placeholder="Choose an Image" />
                </div>
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>


<script>

    $(document).ready(function () {
    var navListItems = $('div.setup-panel div a');
    var allWells = $('.setup-content');
    var allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href'));
        var $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content");
        var curStepBtn = curStep.attr("id");
        var nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a");
        var curInputs = curStep.find("input[type='text'],input[type='url']");
        var isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) {
            nextStepWizard.removeAttr('disabled').trigger('click');
            var selectedRole = $('#role').val();
            var step2Link = $('div.setup-panel div a[href="#step-2"]');
            var step3Link = $('div.setup-panel div a[href="#step-3"]');
            var step2Panel = $('#step-2');
            var step3Panel = $('#step-3');

        if (selectedRole === 'doctor') {
            step2Link.attr('href', '#step-2');
            step2Panel.show();
            step2Link.removeClass('btn-default').addClass('btn-success');
            step3Panel.hide();
            step3Link.removeClass('btn-success').addClass('btn-default').attr('disabled', 'disabled');
        } else if (selectedRole === 'patient') {
            step2Link.attr('href', '#step-3');
            step3Panel.show();
            step3Link.removeClass('btn-default').addClass('btn-success');
            step2Panel.hide();
            step2Link.removeClass('btn-success').addClass('btn-default').attr('disabled', 'disabled');
        }
        }

    });

    $('div.setup-panel div a.btn-success').trigger('click');
});


</script>