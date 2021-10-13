(function ($2c2p, $) {
    var lbl_name = $("#aboutus_name").text();
    var lbl_email = $("#aboutus_email").text();
    var lbl_message = $("#aboutus_message").text();

    var msg_email_sent = $("#aboutus_msg_email_sent").text();
    var msg_email_failed = $("#aboutus_msg_email_failed").text();

    var msg_name_required = $("#aboutus_msg_name_required").text();
    var msg_name_invalid = $("#aboutus_msg_name_invalid").text();
    var msg_email_required = $("#aboutus_msg_email_required").text();
    var msg_email_invalid = $("#aboutus_msg_email_invalid").text();
    var msg_message_required = $("#aboutus_msg_message_required").text();

    var captchaWidget;

    $2c2p.initAboutUs = function (options) {
        var defaultOptions = { FeedbackURL: "AboutUs", SiteKey: "6Lfu5wcTAAAAADZmWQJiErTAkmgoi2HSk1RZvXpo", ValidateURL: "VerifyCapcha" };



        $.extend(defaultOptions, options);
        //$("#about_us_form").keypress(function (e) {
        //    kCode = e.keyCode || e.charCode //for cross browser2.
        //    if (kCode == 13) {
        //        var defaultbtn = $(this).attr("defaultbutton");
        //        $("#" + defaultbtn).click();
        //        return false;
        //    }
        //});

        //captchaWidget = grecaptcha.render('captcha-element', {
        //    'sitekey': options.SiteKey,
        //   // 'callback': verifyCapcha,
        //    'theme': 'light'
        //});

        //console.log(captchaWidget);

        $("#about_us_name").watermark(lbl_name);
        $("#about_us_email").watermark(lbl_email);
        $("#about_us_message").watermark(lbl_message);

        $.validator.addMethod(
            "nameRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            "Name allows characters and -_,'. & only.");


        $.validator.addMethod(
            "AboutUsMailRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || (regexp.test(value));
            },
            "Invalid email address.");


        $("#btnAboutUsSubmit").click(function () {
            $("#lblAboutUsMsg").text("");

            ValidateAboutUs();
            var isValid = $("#about_us_form").valid();
            if (isValid) {
                //if (!grecaptcha.getResponse(captchaWidget).success) {
                //    //$("#about_us_name").val("");
                //    alert("Invalid captcha");
                //}
                //else
                {
                    $("#loadingimg").show();
                    $("#btnAboutUsSubmit").hide();
                    //$(this).attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: defaultOptions.FeedbackURL,
                        data: $('#about_us_form').serialize(),
                        success: function (msg) {
                            if (msg.result == "OK") {
                                $("#about_us_name").val("");
                                $("#about_us_email").val("");
                                $("#about_us_message").val("");
                                $("#about_us_name").watermark(lbl_name);
                                $("#about_us_email").watermark(lbl_email);
                                $("#about_us_message").watermark(lbl_message);
                                $("#lblAboutUsMsg").css('color', '#00bc08');
                                $("#loadingimg").hide();
                                $("#lblAboutUsMsg").text(msg_email_sent);
                                //grecaptcha.reset(captchaWidget);
                                validator_aboutus.resetForm();
                            } else {
                                $("#loadingimg").hide();
                                $("#lblAboutUsMsg").css('color', 'red');
                                $("#lblAboutUsMsg").text(msg_email_failed);

                            }
                            $("#btnAboutUsSubmit").show();
                        },
                        error: function () {
                            $("#loadingimg").hide();
                            $("#lblAboutUsMsg").css('color', 'red');
                            $("#lblAboutUsMsg").text(msg_email_failed);
                            $("#btnAboutUsSubmit").show();
                        }
                    });
                }
            }
            return false;
        });

        var validator_aboutus = $("#about_us_form").validate({
            onfocusout: function (element) {
                $(element).valid();
            },
            rules: {
                about_us_name: {
                    required: true,
                    nameRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                about_us_email: {
                    required: true,
                    AboutUsMailRegEx: /^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/
                },
                about_us_message: {
                    required: true
                }
            },
            messages: {
                "about_us_name": {
                    required: msg_name_required,
                    nameRegEx: msg_name_invalid
                },
                "about_us_email": {
                    required: msg_email_required,
                    AboutUsMailRegEx: msg_email_invalid
                },
                "about_us_message": {
                    required: msg_message_required

                }
            },
            showErrors: function(errorMap, errorList) {
                for (var i = 0; errorList[i]; i++) {
                    var element = this.errorList[i].element;
                    //solves the problem with brute force
                    //remove existing error label and thus force plugin to recreate it
                    //recreation == call to errorplacement function
                    this.errorsFor(element).remove();
                }
                this.defaultShowErrors();
            },
            errorPlacement: function (error, element) {
                //alert(error);
                if (element.attr("id") == "about_us_message") {
                    error.insertAfter(element);
                } else {
                    error.insertAfter(element);
                }
                var eid = "#err_" + element.attr("id");
                //alert(error.text());
                $(eid).text(error.text());

            },
            success: function (label) {
                if (label.attr('for') != "about_us_message") {
                    label.addClass("valid").text("");

                } else {
                    label.addClass("valid").text("");
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");
            }
        });

        $('#aAboutUs').on('click', function (e) {
            e.preventDefault();
            validator_aboutus.resetForm();
            $('#about_us_form').get(0).reset();
            $('input').removeClass('error');
            $('textarea').removeClass('error');
            $('.text-error').text("");

            $("#about_us_name").watermark(lbl_name);
            $("#about_us_email").watermark(lbl_email);
            $("#about_us_message").watermark(lbl_message);
            $("#lblAboutUsMsg").text("");
            $("#loadingimg").hide();
            //grecaptcha.reset(captchaWidget);
        });

    }

    function ValidateAboutUs() {
        $("#about_us_form").validate({
            rules: {
                about_us_name: {
                    required: true,
                    nameRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                about_us_email: {
                    required: true,
                    AboutUsMailRegEx: /^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/
                },
                about_us_message: {
                    required: true
                }
            },
            messages: {
                "about_us_name": {
                    required: msg_name_required,
                    nameRegEx: msg_name_invalid
                },
                "about_us_email": {
                    required: msg_email_required,
                    AboutUsMailRegEx: msg_email_invalid
                },
                "about_us_message": {
                    required: msg_message_required
                }
            },
            showErrors: function (errorMap, errorList) {
                for (var i = 0; errorList[i]; i++) {
                    var element = this.errorList[i].element;
                    //solves the problem with brute force
                    //remove existing error label and thus force plugin to recreate it
                    //recreation == call to errorplacement function
                    this.errorsFor(element).remove();
                }
                this.defaultShowErrors();
            },
            errorPlacement: function (error, element) {
                if (element.attr("id") == "about_us_message") {
                    error.insertAfter(element);
                } else {
                    error.insertAfter(element);
                }
                var eid = "#err_" + element.attr("id");
                $(eid).text(error.text());

            },
            success: function (label) {
                if (label.attr('for') != "about_us_message") {
                    label.addClass("valid").text("");

                } else {
                    label.addClass("valid").text("");
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");
            }
        });
    }
}(window.$2c2p = window.$2c2p || {}, jQuery));