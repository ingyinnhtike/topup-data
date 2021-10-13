(function ($2c2p, $) {
    var lbl_cardno = $("#pay_cardno").text();
    var lbl_cardholder = $("#pay_cardholder").text();
    var lbl_cvv = $("#pay_cvv").text();
    var lbl_kbz_pin = $("#pay_kbz_pin").text();

    var lbl_issuing_country = $("#pay_issuing_country").text();
    var lbl_issuing_bank = $("#pay_issuing_bank").text();

    var lbl_mobile = $("#pay_mobile").text();
    var lbl_payer = $("#pay_payer").text();
    var lbl_email = $("#pay_email").text();
    var lbl_email_optional = $("#pay_email_optional").text();
    var lbl_customer_note_optional = $("#pay_customer_note_optional").text();

    var lbl_payerOptional=$("#pay_payerOptional").text();
    var lbl_emailOptional=$("#pay_emailOptional").text();
    var lbl_mobileOptional=$("#pay_mobileOptionl").text();
    var lbl_emailRequired=$("#pay_emailRequired").text();

    var msg_mobile_required = $("#pay_msg_mobile_required").text();
    var msg_mobile_invalid = $("#pay_msg_mobile_invalid").text();
    var msg_email_required = $("#pay_msg_email_required").text();
    var msg_email_invalid = $("#pay_msg_email_invalid").text();
    var msg_payer_required = $("#pay_msg_payer_required").text();
    var msg_payer_invalid = $("#pay_msg_payer_invalid").text();
    var msg_payer_length_invalid = $("#pay_msg_payer_length_invalid").text();

    var msg_agent_required = $("#pay_msg_agent_required").text();
    var msg_bank_required = $("#pay_msg_bank_required").text();
    var msg_channel_required = $("#pay_msg_channel_required").text();

    var msg_cardno_required = $("#pay_msg_cardno_required").text();
    var msg_card_type_invalid = $("#pay_msg_card_type_invalid").text();
    var msg_card_promocode_invalid = $("#pay_msg_cardno_PromoCode_invalid").text();
    var msg_card_payment_invalid = $("#pay_msg_cardno_Payment_invalid").text();

    var msg_cardholder_required = $("#pay_msg_cardholder_required").text();
    var msg_cardholder_invalid = $("#pay_msg_cardholder_invalid").text();

    var msg_expiry_mm_required = $("#pay_msg_expiry_mm_required").text();
    var msg_expiry_yy_required = $("#pay_msg_expiry_yy_required").text();
    var msg_expiry_invalid = $("#pay_msg_expiry_invalid").text();


    var msg_pin_required = $("#pay_msg_pin_required").text();
    var msg_pin_length_invalid = $("#pay_msg_pin_length_invalid").text();

    var msg_cvv_required = $("#pay_msg_cvv_required").text();
    var msg_cvv_length_invalid = $("#pay_msg_cvv_length_invalid").text();
    var msg_cvv_digit = $("#pay_msg_cvv_digit").text();

    var msg_issuing_country_required = $("#pay_msg_issuing_country_required").text();
    var msg_issuing_bank_required = $("#pay_msg_issuing_bank_required").text();
    var msg_issuing_bank_invalid = $("#pay_msg_issuing_bank_invalid").text();

    var msg_accept_tc = $("#pay_msg_accept_tc").text();
    var msg_invalid_bin = $("#pay_msg_invalid_bin").text();

    var msg_unable_to_load_content = $("#pay_msg_unable_to_load_content").text();

    var msg_ipp_stored_card_not_available = $("#pay_msg_ipp_stored_card_not_available").text();
    var msg_stored_card_will_clear = $("#pay_msg_stored_card_will_clear").text();

    var msg_customer_note_invalid = $("#pay_msg_customer_note_invalid").text();

    var msg_otpValue_required = $("#pay_msg_otpValue_required").text();
    var msg_otpValue_invalid = $("#pay_msg_otpValue_invalid").text();

    var payment_version = 7.1;
    var payment_option = 'C';
    var showIPPdiv = 'Y';
    $2c2p.initAcceptDetails = function (_payment_version) {
        showIPPdiv = $("#hdnShowIPPdiv").val();
        //alert(showIPPdiv);

        payment_version = _payment_version;
        payment_option = $("#hdn_PaymentOption").val();
        var Recurringvalue = $("#hdn_RecuringOption").val();
        var StorecardpayUniqueid = $("#hdn_StoreCardPayment").val();

        if ($('#credit-cards-ipp').hasClass("active"))
        {
            if ($('#ipp_is_stored_card_payment').val() == "True") {
                if ($('#ipp_stored_card_match').val() == "N") {
                    //alert(msg_ipp_stored_card_not_available);
                    $('#btnIPPCCSubmit').css('display', 'none');
                    $('#ippNotAllowedStoredCard').css('display', 'block');
                }
            }
        }
        $("a[href=#credit-cards-ipp]").click(function () {

            if ($('#ipp_is_stored_card_payment').val() == "True") {
                if ($('#ipp_stored_card_match').val() == "N") {
                    //alert(msg_ipp_stored_card_not_available);
                    $('#btnIPPCCSubmit').css('display', 'none');
                    $('#ippNotAllowedStoredCard').css('display', 'block');
                }
            }
        });

        //--- Start AYCAP ---
        if ($('#credit-cards-ipploancard').hasClass("active")) {
            //$("#ipploan_useAnotherCard").click(); //Storedcard not allowed for ipp Loan card
            //resetIPPLoanStoredCardData();//AYCAP

            if ($('#ipploan_is_stored_card_payment').val() == "True") {
                if ($('#ipploan_stored_card_match').val() == "N") {
                    //alert(msg_ipp_stored_card_not_available);
                    $('#btnIPPLoanCCSubmit').css('display', 'none');
                    $('#ipploanNotAllowedStoredCard').css('display', 'block');
                }
            }
        }
        $("a[href=#credit-cards-ipploancard]").click(function () {

            //$("#ipploan_useAnotherCard").click();  //Storedcard not allowed for ipp Loan card
            //resetIPPLoanStoredCardData();//AYCAP

            if ($('#ipploan_is_stored_card_payment').val() == "True") {
                if ($('#ipploan_stored_card_match').val() == "N") {
                    //alert(msg_ipp_stored_card_not_available);
                    $('#btnIPPLoanCCSubmit').css('display', 'none');
                    $('#ipploanNotAllowedStoredCard').css('display', 'block');
                }
            }
        });
        //--- End AYCAP ---

        //KBZ
        if ($('#KBZCard').hasClass("active")) {
            if ($('#kbz_is_stored_card_payment').val() == "True") {
                if ($('#kbz_stored_card_match').val() == "N") {
                    $('#btnKBZCCSubmit').css('display', 'none');
                    $('#kbzNotAllowedStoredCard').css('display', 'block');
                }
            }
        }
        $("a[href=#KBZCard]").click(function () {
            if ($('#kbz_is_stored_card_payment').val() == "True") {
                if ($('#kbz_stored_card_match').val() == "N") {
                    $('#btnKBZCCSubmit').css('display', 'none');
                    $('#kbzNotAllowedStoredCard').css('display', 'block');
                }
            }
        });

        var varlogo123URL = $("#logo123Path").text();
        var varlogoOtherURL = $("#logoOtherPath").text();
        var varWalletLogoUrl = $("#walletLogoPath").text();
        /********************************/
        var varlogoIPPURL = $("#logoIPPPath").text();
        var varlogoLoanURL = $("#logoLoanPath").text(); //AYCAP
        var varotpbanklogoURL = $("#otpbanklogoPath").text();//AYCAP OTP
        /********************************/

        $("#otpValue").keypress(function (evt) {
            $("#errorOTP").text('');
            //$("#otpValue").removeClass("error");
            //return result;
        });

        $("#credit_card_number , #credit_card_cvv , #ipp_credit_card_number , #ipp_credit_card_cvv, #ipploan_credit_card_number , #ipploan_credit_card_cvv ,#kbz_credit_card_number , #kbz_credit_card_pin").keypress(function (evt) {
            var result = $2c2p.filterNumeric(evt);
            return result;
        });
        //AYCAP
        $("#aClickHereIppLoan").click(function () {
            $("#innerTerms").html("");
            $("#termscondition").hide();
            ///$.getJSON("GetTermsCondition?bankCode=" + $("#ipp_bank_code").val(), function (result) {
            $.getJSON("GetTermsConditionIPPLoan?bankId=" + $("#ipploan_bank_id").val(), function (result) {
                if (result.response != "") {
                    $("#innerTerms").html(result.response);
                } else {
                    $("#innerTerms").html("<p>" + msg_unable_to_load_content + "</p>");
                }
            });
            $("#termscondition").show();

        });

        $("#aClickHere").click(function () {
            $("#innerTerms").html("");
            $("#termscondition").hide();
            ///$.getJSON("GetTermsCondition?bankCode=" + $("#ipp_bank_code").val(), function (result) {
            $.getJSON("GetTermsCondition?bankId=" + $("#ipp_bank_id").val(), function (result) {
                if (result.response != "") {
                    $("#innerTerms").html(result.response);
                } else {
                    $("#innerTerms").html("<p>" + msg_unable_to_load_content + "</p>");
                }
            });
            $("#termscondition").show();

        });
        $("#aCCClickHere").click(function () {
            $("#innerTerms").html("");
            $("#termscondition").hide();
            ///$.getJSON("GetTermsCondition?bankCode=" + $("#ipp_bank_code").val(), function (result) {
            $.getJSON("GetTermsCondition?bankId=" + $("#CCBankId").val(), function (result) {
                if (result.response != "") {
                    $("#innerTerms").html(result.response);
                } else {
                    $("#innerTerms").html("<p>" + msg_unable_to_load_content + "</p>");
                }
            });
            $("#termscondition").show();

        });
        $('input[type=radio]').change(function () {
            if ($(this).is(':checked'))
            {
                $("txtMinAmount").val($(this).attr('minamount'));
            }


            /********************************/
            var bankName = $("#ipp_bank_name").val();
            var bankId = $("#ipp_bank_id").val();
            var option = $(this).val();

            //$("#ippImage").attr('src', varlogoIPPURL + bankcode + '.png');
            //get interestType, if it's paid by merchant then display the image
            ///var interestType = $("#" + bankcode + "_ippInterestType_" + option).val();
            var interestType = $("#" + bankId + "_ippInterestType_" + option).val();
            if (interestType == "M") {
                $("#ippImage").show();
            }
            else {
                $("#ippImage").hide();
            }


            /********************************/
            /* AYCAP Loan Card */
            /********************************/

            var loanippbankName = $("#ipploan_bank_name").val();
            var loanippbankId = $("#ipploan_bank_id").val();
            var loanippoption = $(this).val();

            var loanippinterestType = $("#" + loanippbankId + "_loanippInterestType_" + loanippoption).val();
            if (loanippinterestType == "M") {
                $("#loanippImage").show();
            }
            else {
                $("#loanippImage").hide();
            }

            /********************************/
        });

        //$("#aLinkIPPCC").click(function () {
        //    //var validator = $("#ipp_credit_card_details_form").validate();
        //    //validator.resetForm();
        //    //$('.text-error').text("");
        //    resetIPPData();
        //    $("#divCC").hide();
        //    $("#divIPPCC").show();
        //});
        //$("#aLinkCC").click(function () {
        //    //var validator = $("#credit_card_details_form").validate();
        //    //validator.resetForm();
        //    //$('.text-error').text("");
        //    resetCardData();
        //    $("#divCC").show();
        //    $("#divIPPCC").hide();
        //});

        $('.option-row').hide();
        ///$('[code^="' + $("#ipp_bank_code").val() + '"]').show();
        $('[code="' + $("#ipp_bank_id").val() + '"]').show();
        ///var default_selected_bankid = "#ipp_" + $("#ipp_bank_code").val();
        var default_selected_bankid = "#ipp_" + $("#ipp_bank_id").val();
        ///$(':radio[name="' + $("#ipp_bank_code").val() + 'rdo_ipp_option"][value="' + $(default_selected_bankid).attr('option') + '"]').attr('checked', 'checked');

        var default_selected_option = $(':radio[name="' + $("#ipp_bank_id").val() + 'rdo_ipp_option"]').is(":checked") ? $(':radio[name="' + $("#ipp_bank_id").val() + 'rdo_ipp_option"]:checked').val() : $(default_selected_bankid).attr('option');

        $(':radio[name="' + $("#ipp_bank_id").val() + 'rdo_ipp_option"][value="' + default_selected_option + '"]').attr('checked', 'checked');

        //alert(':radio[name="' + $("#ipp_bank_id").val() + 'rdo_ipp_option"][value="' + $(default_selected_bankid).attr('option') + '"]');
        /****************************************/
        ///var bankcode = $("#ipp_bank_code").val();
        var bankId = $("#ipp_bank_id").val();
        var option = default_selected_option;//$(default_selected_bankid).attr('option');

        ///$("#ippImage").attr('src', varlogoIPPURL + bankcode + '.png');
        $("#ippImage").attr('src', varlogoIPPURL + bankId + '.png');
        //get interestType, if it's paid by merchant then display the image
        var interestType = $("#" + bankId + "_ippInterestType_" + option).val();
        ///var interestType = $("#" + bankcode + "_ippInterestType_" + option).val();
        if (interestType == "M") {
            $("#ippImage").show();
        }
        else {
            $("#ippImage").hide();
        }
        /********************************/

        /********************************/
        /* AYCAP Loan Card */
        /********************************/
        var default_selected_loanbankid = "";
        var default_selected_option_loan = "";
        var loanbankId = "";
        var loanoption = "";
        var interestTypeLoan = "";

        $('.option-row-loan').hide();
        $('[code="ipploan_' + $("#ipploan_bank_id").val() + '"]').show();
        default_selected_loanbankid = "#ipploan_" + $("#ipploan_bank_id").val();
        //default_selected_option_loan = $(':radio[name="ipploan_' + $("#ipploan_bank_id").val() + 'rdo_ipploan_option"]').is(":checked") ? $(':radio[name="ipploan_' + $("#ipploan_bank_id").val() + 'rdo_ipploan_option"]:checked').val() : $(default_selected_loanbankid).attr('option');
        //$(':radio[name="ipploan_' + $("#ipploan_bank_id").val() + 'rdo_ipploan_option"][value="' + default_selected_option_loan + '"]').attr('checked', 'checked');
        default_selected_option_loan = $(':radio[name="' + $("#ipploan_bank_id").val() + 'rdo_ipploan_option"]').is(":checked") ? $(':radio[name="' + $("#ipploan_bank_id").val() + 'rdo_ipploan_option"]:checked').val() : $(default_selected_loanbankid).attr('option');
        $(':radio[name="' + $("#ipploan_bank_id").val() + 'rdo_ipploan_option"][value="' + default_selected_option_loan + '"]').attr('checked', 'checked');
        loanbankId = $("#ipploan_bank_id").val();
        loanoption = default_selected_option_loan;//$(default_selected_bankid).attr('option');
        $("#loanippImage").attr('src', varlogoLoanURL + loanbankId + '.png');
        interestTypeLoan = $("#" + loanbankId + "_loanippInterestType_" + loanoption).val();

        //AYCAP OTP
        $("#otpBankImage").attr('src', varotpbanklogoURL + loanbankId + '.png');//otp bank Logo
        $("#otpBankImage").show();

        //AYCAP
        if (interestTypeLoan == "M") {
            $("#loanippImage").show();
        }
        else {
            $("#loanippImage").hide();
        }

        /********END AYCAP LOAN CARD *******/

        $("a.ippbank").click(function () {
            document.getElementById("IPPCCDetaildiv").style.display = "block";
            document.getElementById("IPPLoanDetaildiv").style.display = "none";
            //document.getElementById("IPPCCDetaildiv").style.visibility = "visible";
            if ($('#ipp_is_stored_card_payment').val() == "True")//ver 6.2 only , and in stored card payment flow
            {
                var bId = this.id;
                if ($('#' + bId + ' li').hasClass('off'))
                {
                    if (confirm(msg_stored_card_will_clear)) {
                        $("#ipp_useAnotherCard").click();
                    }
                    else {
                        return false;
                    }
                }
            }



            /********************************/
            var varlogoIPPURL = $("#logoIPPPath").text();
            /********************************/

            var id = $(this).attr('id');
            //To avoid resetting data on bank icon click, thus masked card number became disappear.
            if ($('#ipp_is_stored_card_payment').val() == "True")//ver 6.2 only , and in stored card payment flow
            {

            }
            else {
                resetIPPData();
            }


            var bankId = id.substring(4);
            var bankCode = id.substring(4);
            var lid = "#liippBank_" + bankId;
            ///var lid = "#liippBank_" + bankCode;
            //var selectedValue = $(this).attr('option');//to do later.
            var selectedValue = $(this).attr('option');
            var name = bankId + "rdo_ipp_option";
            ///var name = bankCode + "rdo_ipp_option";

            $('.option-row').hide();
            ///$('[code^="' + bankCode + '"]').show();
            $('[code="' + bankId + '"]').show();
            $("#sp_IPPBankName").text($(this).attr('bankname'));
            $("#sp_tcbankName").text($(this).attr('bankname'));

            $("#ipp_bank_id").val(bankId);
            $("#ipp_bank_name").val($(this).attr('shortname'));
            $("#ipp_bank_country_code").val($(this).attr('bankcountry'));
            $("#ipp_bank_country_name").val($(this).attr('bankname'));
            //
            $("#hid_bin_list").val($(this).attr('binlist'));
            //$("input:radio").attr("checked", false);
            //$(':radio').attr('checked', '');
            $(':radio[name="' + name + '"][value="' + selectedValue + '"]').attr('checked', 'checked');

            //$(':radio[code="' + bankCode + '"][value="' + selectedValue + '"]').attr('checked', 'checked');

            //fixed checkbox bug, check if it's not previous selected bank then clear the check box
            if (!$(lid).hasClass("selected")) {
                $('#chkIPPTermCond').attr('checked', false);
            }

            $("li[id^='liippBank_']").each(function () {
                if ($(this).attr('id') != lid) {
                    $(this).addClass("off");
                }
                $(this).removeClass("selected");
            });
            $("li[id^='loanliippBank_']").each(function () {
                if ($(this).attr('id') != lid) {
                    $(this).addClass("off");
                }
                $(this).removeClass("selected");
            });

            $(lid).removeClass("off");
            $(lid).addClass("selected");

            /****************************************/
            var name = bankId + "rdo_ipp_option";

            ///var name = bankCode + "rdo_ipp_option";
            var radio =  $('input[name=' + name + ']:checked').val();


            $("#ippImage").attr('src', varlogoIPPURL + bankId + '.png');
            ///$("#ippImage").attr('src', varlogoIPPURL + bankCode + '.png');

            //get interestType, if it's paid by merchant then display the image
            var interestType = $("#" + bankId + "_ippInterestType_" + radio).val();
            //alert("interest type : " + bankId + "_ippInterestType_" + radio);
            ///var interestType = $("#" + bankCode + "_ippInterestType_" + radio).val();
            if (interestType == "M") {
                $("#ippImage").show();
            }
            else {
                $("#ippImage").hide();
            }
            /********************************/

        });//END $("a.ippbank").click

        //AYCAP Start
        $("a.ipploanbank").click(function () {

            document.getElementById("IPPCCDetaildiv").style.display = "none";
            document.getElementById("IPPLoanDetaildiv").style.display = "block";
            if ($('#ipploan_is_stored_card_payment').val() == "True")//ver 6.2 only , and in stored card payment flow
            {
                var bId = this.id;
                if ($('#' + bId + ' li').hasClass('off')) {
                    if (confirm(msg_stored_card_will_clear)) {
                        $("#ipploan_useAnotherCard").click();
                    }
                    else {
                        return false;
                    }
                }
            }


            /********************************/
            var varlogoLoanURL = $("#logoLoanPath").text();
            var varotpbanklogoURL = $("#otpbanklogoPath").text(); //OTP
            /********************************/

            var id = $(this).attr('id');
            //To avoid resetting data on bank icon click, thus masked card number became disappear.
            if ($('#ipploan_is_stored_card_payment').val() == "True")//ver 6.2 only , and in stored card payment flow
            {

            }
            else {

                resetIPPLoanData();
                //resetIPPLoanStoredCardData();
            }

            var bankId = id.substring(8);
            var bankCode = id.substring(8);
            var lid = "#loanliippBank_" + bankId;


            ///var lid = "#liippBank_" + bankCode;
            //var selectedValue = $(this).attr('option');//to do later.
            var selectedValue = $(this).attr('option');
            var name =  bankId + "rdo_ipploan_option";
            ///var name = bankCode + "rdo_ipp_option";

            $('.option-row-loan').hide();
            ///$('[code^="' + bankCode + '"]').show();
            $('[code="ipploan_' + bankId + '"]').show();
            $("#sp_loanIPPBankName").text($(this).attr('bankname'));
            $("#sp_loantcbankName").text($(this).attr('bankname'));

            $("#ipploan_bank_id").val(bankId);
            $("#ipploan_bank_name").val($(this).attr('shortname'));
            $("#ipploan_bank_country_code").val($(this).attr('bankcountry'));
            $("#ipploan_bank_country_name").val($(this).attr('bankname'));
            //
            $("#hid_loanbin_list").val($(this).attr('binlist'));

            //$(':radio[name="ipploan_' + name + '"][value="' + selectedValue + '"]').attr('checked', 'checked');
            $(':radio[name="' + name + '"][value="' + selectedValue + '"]').attr('checked', 'checked');

            //fixed checkbox bug, check if it's not previous selected bank then clear the check box
            if (!$(lid).hasClass("selected")) {
                $('#chkIPPLoanTermCond').attr('checked', false);
            }

            $("li[id^='loanliippBank_']").each(function () {
                if ($(this).attr('id') != lid) {
                    $(this).addClass("off");
                }
                $(this).removeClass("selected");
            });
            $("li[id^='liippBank_']").each(function () {
                if ($(this).attr('id') != lid) {
                    $(this).addClass("off");
                }
                $(this).removeClass("selected");
            });

            $(lid).removeClass("off");
            $(lid).addClass("selected");

            /****************************************/
            var name =  bankId + "rdo_ipploan_option";

            ///var name = bankCode + "rdo_ipp_option";
            //var radio = $('input[name=ipploan_' + name + ']:checked').val();
            var radio = $('input[name=' + name + ']:checked').val();

            $("#loanippImage").attr('src', varlogoLoanURL + bankId + '.png');
            $("#otpBankImage").attr('src', varotpbanklogoURL + bankId + '.png');//otp bank Logo
            $("#otpBankImage").show();

            //get interestType, if it's paid by merchant then display the image
            var interestType = $("#" + bankId + "_loanippInterestType_" + radio).val();

            if (interestType == "M") {
                $("#loanippImage").show();
            }
            else {
                $("#loanippImage").hide();
            }
            /********************************/

        });
        //AYCAP End

        $('input[type=radio][name=PaymentOption]').change(function () {
            if (this.value != '0') {
                var bankId = $("#CCBankId").val();
                var option = $(this).val();
                var interestType = $("#" + bankId + "_ccInterestType_" + option).val();
                if (interestType == "M") {
                    $("#CCImage").show();
                }
                else {
                    $("#CCImage").hide();
                }
                document.getElementById("divChkTC").style.display = "block";
            }
            else
            {
                document.getElementById("divChkTC").style.display = "none";
                $("#CCImage").hide();
            }

        });
        $('a.ippbank li').mouseenter(function () {
            //$(this).removeClass("off");
            this.style.cursor = 'pointer';
        });

        $('a.ippbank li').mouseout(function () {
            //if (!$(this).hasClass("selected")) {
            //    $(this).addClass("off");

            //} else $(this).removeClass("off");

            this.style.cursor = 'normal';
        });

        //AYCAP
        $('a.ipploanbank li').mouseenter(function () {
            this.style.cursor = 'pointer';
        });
        //AYCAP
        $('a.ipploanbank li').mouseout(function () {
            this.style.cursor = 'normal';
        });

        $("#pay_123_form #mobile_number").keypress(function (evt) {
            var result = $2c2p.filterNumeric(evt);
            return result;
        });

        $("#pay_123bank_form #bank_mobile_number").keypress(function (evt) {
            var result = $2c2p.filterNumeric(evt);
            return result;
        });
        $("#wallet_details_form #wallet_mobile_number").keypress(function (evt) {
            var result = $2c2p.filterNumeric(evt);
            return result;
        });
        $("#credit_card_details_form, #pay_123_form, #pay_123bank_form, #KBZ_credit_card_details_form").keypress(function (e) {
            kCode = e.keyCode || e.charCode //for cross browser2.
            if (kCode == 13) {
                var defaultbtn = $(this).attr("defaultbutton");
                $("#" + defaultbtn).click();
                return false;
            }
        });


        $("#credit_card_number").watermark(lbl_cardno);
        $("#credit_card_holder_name").watermark(lbl_cardholder);

        $("#ipp_credit_card_number").watermark(lbl_cardno);
        $("#ipp_credit_card_holder_name").watermark(lbl_cardholder);

        //AYCAP
        $("#ipploan_credit_card_number").watermark(lbl_cardno);
        $("#ipploan_credit_card_holder_name").watermark(lbl_cardholder);

        //KBZ
        $("#kbz_credit_card_number").watermark(lbl_cardno);
        $("#kbz_credit_card_holder_name").watermark(lbl_cardholder);

        $("#credit_card_issuing_bank_name").watermark(lbl_issuing_bank);
        $("#credit_card_cvv").watermark(lbl_cvv);

        $("#ipp_credit_card_cvv").watermark(lbl_cvv);
        $("#ipploan_credit_card_cvv").watermark(lbl_cvv); //AYCAP
        $("#kbz_credit_card_pin").watermark(lbl_kbz_pin); //KBZ

        $("#mobile_number").watermark(lbl_mobile);
        $("#payer_name").watermark(lbl_payer);
        $("#email_address").watermark(lbl_email);

        $("#kiosk_mobile_number").watermark(lbl_mobile);
        $("#kiosk_payer_name").watermark(lbl_payer);
        $("#kiosk_email_address").watermark(lbl_email);

        $("#cardholder_email").watermark(lbl_email_optional);
        $("#ipp_cardholder_email").watermark(lbl_email_optional);
        $("#ipploan_cardholder_email").watermark(lbl_email_optional); //AYCAP
        $("#kbz_cardholder_email").watermark(lbl_email_optional); //KBZ

        $("#customer_note").watermark(lbl_customer_note_optional);
        $("#ipp_customer_note").watermark(lbl_customer_note_optional);
        $("#ipploan_customer_note").watermark(lbl_customer_note_optional); //AYCAP

        $("#bank_mobile_number").watermark(lbl_mobile);
        $("#bank_payer_name").watermark(lbl_payer);
        $("#bank_email_address").watermark(lbl_email);



        $("a.wallet").click(function () {
            var block = "block";
            var none = "none";
            var agentCode = $(this).attr('id');
            var walletName = $(this).attr('walletname');
            var imageID = "#IMGW_" + agentCode;

            $('[id^="IMGW_"]').each(function () {
                var curSrc = $(this).attr('src');
                var agentCode_1 = $(this).attr('code');
                if (curSrc === varWalletLogoUrl + agentCode_1 + '.png') {
                    $(this).attr('src', varWalletLogoUrl + agentCode_1 + 'G.png');
                    if ($(this).hasClass("selected")) $(this).removeClass("selected");
                }


            });

            $(imageID).attr('src', varWalletLogoUrl + agentCode + '.png');
            $(imageID).addClass("selected");

            $("#wallet_code").val(agentCode);
            $("#wallet_selected").text(walletName);

            document.getElementById('walletDetails').style.display = 'block';
            $("#wallet_payer_name").watermark(lbl_payer);
            $("#wallet_email_address").watermark(lbl_email_optional);
            $("#wallet_mobile_number").watermark(lbl_mobileOptional);

        });

        $('a.wallet').mouseenter(function () {

            var agentCode = $(this).attr('id');
            var imageID = "#IMGW_" + agentCode;
            $(imageID).attr('src', varWalletLogoUrl + agentCode + '.png');
        });
        $('a.wallet').mouseout(function () {

            var agentCode = $(this).attr('id');
            var imageID = "#IMGW_" + agentCode;
            if (!$(imageID).hasClass("selected")) {
                $(imageID).attr('src', varWalletLogoUrl + agentCode + 'G.png');

            } else $(imageID).attr('src', varWalletLogoUrl + agentCode + '.png');

        });

        $("a.agent").click(function () {
            var agentCode = $(this).attr('id');

            var imageID = "#IMGA_" + agentCode;

            $('[id^="IMGA_"]').each(function () {
                var curSrc = $(this).attr('src');
                var agentCode_1 = $(this).attr('code');
                if (curSrc === varlogo123URL + agentCode_1 + '.png') {
                    $(this).attr('src', varlogo123URL + agentCode_1 + 'G.png');
                    if ($(this).hasClass("selected")) $(this).removeClass("selected");
                }

            });

            $(imageID).attr('src', varlogo123URL + agentCode + '.png');
            $(imageID).addClass("selected");
            $("#agent_selected").text($(this).attr('agentname'));
            $("#agent_code").val(agentCode);

        });

        $('a.agent').mouseenter(function () {
            var agentCode = $(this).attr('id');
            var imageID = "#IMGA_" + agentCode;
            $(imageID).attr('src', varlogo123URL + agentCode + '.png');
        });
        $('a.agent').mouseout(function () {
            var agentCode = $(this).attr('id');
            var imageID = "#IMGA_" + agentCode;
            if (!$(imageID).hasClass("selected")) {
                $(imageID).attr('src', varlogo123URL + agentCode + 'G.png');

            } else $(imageID).attr('src', varlogo123URL + agentCode + '.png');

        });


        $("a.kiosk").click(function () {
            var agentCode = $(this).attr('id');

            var imageID = "#IMGC_" + agentCode;

            $('[id^="IMGC_"]').each(function () {
                var curSrc = $(this).attr('src');
                var agentCode_1 = $(this).attr('code');
                if (curSrc === varlogo123URL + "kiosk/" + agentCode_1 + '.png') {
                    $(this).attr('src', varlogo123URL + "kiosk/" + agentCode_1 + 'G.png');
                    if ($(this).hasClass("selected")) $(this).removeClass("selected");
                }

            });

            $(imageID).attr('src', varlogo123URL + "kiosk/" + agentCode + '.png');
            $(imageID).addClass("selected");
            $("#kiosk_selected").text($(this).attr('agentname'));
            $("#kiosk_code").val(agentCode);

        });

        $('a.kiosk').mouseenter(function () {
            var agentCode = $(this).attr('id');
            var imageID = "#IMGC_" + agentCode;
            $(imageID).attr('src', varlogo123URL + "kiosk/" + agentCode + '.png');
        });
        $('a.kiosk').mouseout(function () {
            var agentCode = $(this).attr('id');
            var imageID = "#IMGC_" + agentCode;
            if (!$(imageID).hasClass("selected")) {
                $(imageID).attr('src', varlogo123URL + "kiosk/" + agentCode + 'G.png');

            } else $(imageID).attr('src', varlogo123URL + "kiosk/" + agentCode + '.png');

        });


        $("a.bank").click(function () {
            var bankcode = $(this).attr('id');
            var imageID = "#IMGB_" + bankcode;

            $('[id^="IMGB_"]').each(function () {

                var curSrc = $(this).attr('src');
                var bankCode_1 = $(this).attr('code');
                if (curSrc === varlogo123URL + bankCode_1 + '.png') {
                    $(this).attr('src', varlogo123URL + bankCode_1 + 'G.png');
                    //$(this).removeClass("selected");
                    if($(this).hasClass("selected")) $(this).removeClass("selected");
                }

            });

            $(imageID).attr('src', varlogo123URL + bankcode + '.png');
            $(imageID).addClass("selected");
            $("#bank_selected").text($(this).attr('bankname'));
            $("#bank_code").val(bankcode);

            /** added By Ing Ing, to load bank channel every time user select different bank **/
            LoadChannelForBank($("#bank_code").val());
        });

        $('a.bank').mouseenter(function () {
            var bankcode = $(this).attr('id');
            var imageID = "#IMGB_" + bankcode;

            $(imageID).attr('src', varlogo123URL + bankcode + '.png');
        });
        $('a.bank').mouseout(function () {
            var bankcode = $(this).attr('id');
            var imageID = "#IMGB_" + bankcode;
            if (!$(imageID).hasClass("selected")) {
                $(imageID).attr('src', varlogo123URL + bankcode + 'G.png');

            } else $(imageID).attr('src', varlogo123URL + bankcode + '.png');

        });

        $('a.others').mouseenter(function () {
            var code = $(this).attr('code');
            var imageID = "#IMGO_" + code;
            $(imageID).attr('src', varlogoOtherURL + code + '.png');
        });
        $('a.others').mouseout(function () {
            var code = $(this).attr('code');
            var imageID = "#IMGO_" + code;
            $(imageID).attr('src', varlogoOtherURL + code + 'G.png');
        });


        /*
        $("a.agent123").click(function () {
            var lid = $(this).attr('id');
            lid = "#lAgent_" + lid;

            $("#agent_selected").text($(this).attr('agentname'));
            $("#agent_code").val($(this).attr('id'));
            $("#lblagent_code").removeClass("error");
            $("#lblagent_code").text("");

            var i = 0;

            $("li[id^='lAgent_']").each(function () {
                if ($(this).attr('id') != lid)
                    $(this).addClass("off");

                $(this).removeClass("selected");
            });

            $(lid).removeClass("off");
            $(lid).addClass("selected");

        });

        $("a.bank123").click(function () {
            var lid = $(this).attr('id');
            lid = "#lBank_" + lid;

            $("#bank_selected").text($(this).attr('bankname'));
            $("#bank_code").val($(this).attr('id'));
            $("#lblbank_code").removeClass("error");
            $("#lblbank_code").text("");

            var i = 0;
            $("li[id^='lBank_']").each(function () {
                if ($(this).attr('id') != lid)
                    $(this).addClass("off");

                $(this).removeClass("selected");
            });
            $(lid).removeClass("off");
            $(lid).addClass("selected");
            LoadChannelForBank($(this).attr('id'));

        });


        $('a.agent123 li').mouseenter(function () {
            $(this).removeClass("off");
            this.style.cursor = 'pointer';
        });

        $('a.agent123 li').mouseout(function () {
            if (!$(this).hasClass("selected")) {
                $(this).addClass("off");

            } else $(this).removeClass("off");

            this.style.cursor = 'normal';
        });

        $('a.bank123 li').mouseenter(function () {
            $(this).removeClass("off");
            this.style.cursor = 'pointer';

        });

        $('a.bank123 li').mouseout(function () {
            if (!$(this).hasClass("selected")) {
                $(this).addClass("off");

            } else $(this).removeClass("off");
            this.style.cursor = 'normal';
        });
        */

        $("#credit_card_number").change(function () {
            if ($("#credit_card_number").val() == "") {
                $(".cardtype").removeClass("on");
                $(".cardtype").addClass("off");
                $('#tdCVV').removeClass("hide");
                $(".expiry-cvv").show();
            }

            if ($("#credit_card_number").val() != "") {

                if ($("#credit_card_number").val().length >= 2) {

                    $(".cardtype").removeClass("on");
                    $(".cardtype").addClass("off");

                    if ($("#credit_card_number").val().substr(0, 1) == "5") {
                        $(".mastercard").removeClass("off");
                        $(".mastercard").addClass("on");


                    }
                    if ($("#credit_card_number").val().substr(0, 1) == "4") {
                        $(".visa").removeClass("off");
                        $(".visa").addClass("on");
                    }
                    if ($("#credit_card_number").val().substr(0, 1) == "1") {
                        $(".uatp").removeClass("off");
                        $(".uatp").addClass("on");
                    }
                    if ($("#credit_card_number").val().length >= 2) {
                        var cardno = $("#credit_card_number").val().substr(0, 2);

                        if (cardno == "67"
                            || cardno == "22"
                            || cardno == "23"
                            || cardno == "24"
                            || cardno == "25"
                            || cardno == "26"
                            || cardno == "27") {
                            $(".mastercard").removeClass("off");
                            $(".mastercard").addClass("on");
                        }
                        else if (cardno == "34" || cardno == "37") {

                            $(".amex").removeClass("off");
                            $(".amex").addClass("on");
                        }
                        else if (cardno == "35") {

                            $(".jcb").removeClass("off");
                            $(".jcb").addClass("on");
                        }
                        else if (cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") {

                            $(".diners_club_international").removeClass("off");
                            $(".diners_club_international").addClass("on");
                        }

                        if (cardno == "62") {

                            $(".unionpay").removeClass("off");
                            $(".unionpay").addClass("on");

                            if ($("#upiCardLock").val() == "Y") {
                                $(".expiry-cvv").hide();
                            }
                        } else {
                            $(".expiry-cvv").show();
                        }

                        if (cardno == "95") {
                            $(".mpucard").removeClass("off");
                            $(".mpucard").addClass("on");
                            $('#tdCVV').addClass("hide");
                        }
                        else {
                            $('#tdCVV').removeClass("hide");
                        }
                    }
                    if (payment_version >= 7.1) {
                        //alert("My alert 2");
                        if ($("#credit_card_number").val().length >= 6) {
                            var cardno = $("#credit_card_number").val().substr(0, 6);
                            if ($("#hdn_CCBinList").val() != undefined && $("#hdn_CCBinList").val().trim().length > 0) {
                                var MainBinList = $("#hdn_CCBinList").val().split(';');
                                for (var i = 0; i < MainBinList.length; i++) {
                                    var SubBinList = MainBinList[i].split(':');
                                    for (var j = 0; j < SubBinList.length; j++) {
                                        var bankId = SubBinList[0];
                                        var SplitBinlist = SubBinList[1].split(',');
                                        for (var k = 0; k < SplitBinlist.length; k++) {
                                            if (cardno == SplitBinlist[k]) {
                                                var recuringvalue = $("#hdn_RecuringOption").val();
                                                //alert(recuringvalue);
                                                if (payment_version >= 7.5) {
                                                    if (recuringvalue != 'Y' && payment_option != 'F' && showIPPdiv == 'Y') {
                                                        document.getElementById("divCCOptionsText").style.display = "block";
                                                        document.getElementById("divCCOptions").style.display = "block";
                                                        document.getElementById("divCCImage").style.display = "block";
                                                    }
                                                }
                                                else {
                                                    if (recuringvalue != 'Y' && payment_option != 'F') {
                                                        document.getElementById("divCCOptionsText").style.display = "block";
                                                        document.getElementById("divCCOptions").style.display = "block";
                                                        document.getElementById("divCCImage").style.display = "block";
                                                    }
                                                }
                                                $("#CCBankId").val(bankId);
                                                var BankName = bankId + "_cc_bank_name";
                                                $("label[for='lblBankName']").html($("#" + BankName).val());
                                                $("#CCImage").attr('src', varlogoIPPURL + bankId + '.png');
                                                $("#CCImage").hide();
                                                $('.CCoption-row').hide();
                                                $('[CCCode="' + bankId + '"]').show();
                                                document.getElementById("0rdo_cc_option").checked = true;
                                                $("#0rdo_cc_option").attr('checked', 'checked');
                                                if (document.getElementById("divChkTC").style.display == "block") {
                                                    document.getElementById("divChkTC").style.display = "none";
                                                    document.getElementById("chkCCTermCond").checked = false;
                                                }
                                                return false;
                                            }
                                            else {
                                                if (document.getElementById("divCCOptionsText").style.display == "block") {
                                                    document.getElementById("divCCOptionsText").style.display = "none";
                                                }
                                                if (document.getElementById("divCCOptions").style.display == "block") {
                                                    document.getElementById("divCCOptions").style.display = "none";
                                                }
                                                if (document.getElementById("divCCImage").style.display == "block") {
                                                    document.getElementById("divCCImage").style.display = "none";
                                                }

                                            }

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //return false;
        });
        /*
        $("#credit_card_number").focusout(function () {
            if ($("#credit_card_number").val().length>4) {

                if ($("#credit_card_number").val().substr(0, 1) == "5") {
                    $(".mastercard").removeClass("off");
                    $(".mastercard").addClass("on");

                }
                if ($("#credit_card_number").val().substr(0, 1) == "4") {
                    $(".visa").removeClass("off");
                    $(".visa").addClass("on");
                }
                var cardno = $("#credit_card_number").val().substr(0, 2);
                if (cardno == "67") {
                    $(".mastercard").removeClass("off");
                    $(".mastercard").addClass("on");
                }
                if (cardno == "34" || cardno == "37") {

                    $(".amex").removeClass("off");
                    $(".amex").addClass("on");
                }
                if (cardno == "35") {

                    $(".jcb").removeClass("off");
                    $(".jcb").addClass("on");
                }
                if (cardno == "30" || cardno == "36") {

                    $(".diners_club_international").removeClass("off");
                    $(".diners_club_international").addClass("on");
                }

                if (cardno == "62") {

                    $(".unionpay").removeClass("off");
                    $(".unionpay").addClass("on");
                }
            }
        });
        */
        $("#credit_card_number").keyup(function () {

            if ($("#credit_card_number").val() == "") {
                $(".cardtype").removeClass("on");
                $(".cardtype").addClass("off");
                //$('#tdCVV').css('display', '');
                $('#tdCVV').removeClass("hide");
                $(".expiry-cvv").show();
            }

            if ($("#credit_card_number").val() != "") {

                if ($("#credit_card_number").val().length >= 2) {

                    $(".cardtype").removeClass("on");
                    $(".cardtype").addClass("off");

                    if ($("#credit_card_number").val().substr(0, 1) == "5") {
                        $(".mastercard").removeClass("off");
                        $(".mastercard").addClass("on");

                    }
                    if ($("#credit_card_number").val().substr(0, 1) == "4") {
                        $(".visa").removeClass("off");
                        $(".visa").addClass("on");
                    }
                    if ($("#credit_card_number").val().substr(0, 1) == "1") {
                        $(".uatp").removeClass("off");
                        $(".uatp").addClass("on");
                    }
                    if ($("#credit_card_number").val().length >= 2) {
                        var cardno = $("#credit_card_number").val().substr(0, 2);

                        if (cardno == "67"
                            || cardno == "22"
                            || cardno == "23"
                            || cardno == "24"
                            || cardno == "25"
                            || cardno == "26"
                            || cardno == "27") {
                            $(".mastercard").removeClass("off");
                            $(".mastercard").addClass("on");
                        }
                        if (cardno == "34" || cardno == "37") {

                            $(".amex").removeClass("off");
                            $(".amex").addClass("on");
                        }
                        if (cardno == "35") {

                            $(".jcb").removeClass("off");
                            $(".jcb").addClass("on");
                        }
                        if (cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") {

                            $(".diners_club_international").removeClass("off");
                            $(".diners_club_international").addClass("on");
                        }

                        if (cardno == "62") {

                            $(".unionpay").removeClass("off");
                            $(".unionpay").addClass("on");

                            if ($("#upiCardLock").val() == "Y") {
                                $(".expiry-cvv").hide();
                            }
                        } else {
                            $(".expiry-cvv").show();
                        }

                        if (cardno == "95") {
                            $(".mpucard").removeClass("off");
                            $(".mpucard").addClass("on");
                            //$('#tdCVV').css('display', 'none');
                            $('#tdCVV').addClass("hide");

                        }
                        else {
                            //$('#tdCVV').css('display', '');
                            $('#tdCVV').removeClass("hide");
                        }
                    }
                    //alert(payment_version);
                    if (payment_version >= 7.1) {
                        //alert("My alert");

                        if ($("#credit_card_number").val().length >= 6) {
                            var cardno = $("#credit_card_number").val().substr(0, 6);
                            if ($("#hdn_CCBinList").val() != undefined && $("#hdn_CCBinList").val().trim().length > 0) {
                                var MainBinList = $("#hdn_CCBinList").val().split(';');
                                for (var i = 0; i < MainBinList.length; i++) {
                                    var SubBinList = MainBinList[i].split(':');
                                    for (var j = 0; j < SubBinList.length; j++) {
                                        var bankId = SubBinList[0];
                                        var SplitBinlist = SubBinList[1].split(',');
                                        for (var k = 0; k < SplitBinlist.length; k++) {
                                            if (cardno == SplitBinlist[k]) {
                                                var recuringvalue = $("#hdn_RecuringOption").val();
                                                //if (recuringvalue != 'Y' && payment_option != 'F') {
                                                //    document.getElementById("divCCOptionsText").style.display = "block";
                                                //    document.getElementById("divCCOptions").style.display = "block";
                                                //    document.getElementById("divCCImage").style.display = "block";
                                                //}
                                                if (payment_version >= 7.5) {
                                                    if (recuringvalue != 'Y' && payment_option != 'F' && showIPPdiv == 'Y') {
                                                        document.getElementById("divCCOptionsText").style.display = "block";
                                                        document.getElementById("divCCOptions").style.display = "block";
                                                        document.getElementById("divCCImage").style.display = "block";
                                                    }
                                                }
                                                else {
                                                    if (recuringvalue != 'Y' && payment_option != 'F') {
                                                        document.getElementById("divCCOptionsText").style.display = "block";
                                                        document.getElementById("divCCOptions").style.display = "block";
                                                        document.getElementById("divCCImage").style.display = "block";
                                                    }
                                                }

                                                $("#CCBankId").val(bankId);
                                                var BankName = bankId + "_cc_bank_name";
                                                $("label[for='lblBankName']").html($("#" + BankName).val());
                                                $("#CCImage").attr('src', varlogoIPPURL + bankId + '.png');
                                                $("#CCImage").hide();
                                                $('.CCoption-row').hide();
                                                $('[CCCode="' + bankId + '"]').show();
                                                document.getElementById("0rdo_cc_option").checked = true;
                                                $("#0rdo_cc_option").attr('checked', 'checked');
                                                if (document.getElementById("divChkTC").style.display == "block") {
                                                    document.getElementById("divChkTC").style.display = "none";
                                                    document.getElementById("chkCCTermCond").checked = false;
                                                }
                                                return false;
                                            }
                                            else {
                                                if (document.getElementById("divCCOptionsText").style.display == "block") {
                                                    document.getElementById("divCCOptionsText").style.display = "none";
                                                }
                                                if (document.getElementById("divCCOptions").style.display == "block") {
                                                    document.getElementById("divCCOptions").style.display = "none";
                                                }
                                                if (document.getElementById("divCCImage").style.display == "block") {
                                                    document.getElementById("divCCImage").style.display = "none";
                                                }

                                            }

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return false;
        });

        //$("#credit_card_cvv").keyup(function () {

        //    if ($("#credit_card_cvv").val() == "") {
        //        $("#error_credit_card_cvv").removeClass("valid");
        //        $("#error_credit_card_cvv").removeClass("error");
        //        $("#err_credit_card_cvv").text('');
        //    }
        //});

        $("#ipp_credit_card_number").keyup(function () {
            if ($("#ipp_credit_card_number").val() == "") {
                $(".cardtype").removeClass("on");
                $(".cardtype").addClass("off");
                $('#tdippCVV').removeClass("hide");
            }

            if ($("#ipp_credit_card_number").val() != "") {

                if ($("#ipp_credit_card_number").val().length >= 2) {

                    $(".cardtype").removeClass("on");
                    $(".cardtype").addClass("off");

                    if ($("#ipp_credit_card_number").val().substr(0, 1) == "5") {
                        $(".mastercard").removeClass("off");
                        $(".mastercard").addClass("on");

                    }
                    if ($("#ipp_credit_card_number").val().substr(0, 1) == "4") {
                        $(".visa").removeClass("off");
                        $(".visa").addClass("on");
                    }
                    if ($("#ipp_credit_card_number").val().substr(0, 1) == "1") {
                        $(".uatp").removeClass("off");
                        $(".uatp").addClass("on");
                    }
                    if ($("#ipp_credit_card_number").val().length >= 2) {
                        var cardno = $("#ipp_credit_card_number").val().substr(0, 2);

                        if (cardno == "67"
                            || cardno == "22"
                            || cardno == "23"
                            || cardno == "24"
                            || cardno == "25"
                            || cardno == "26"
                            || cardno == "27") {

                            $(".mastercard").removeClass("off");
                            $(".mastercard").addClass("on");
                        }
                        if (cardno == "34" || cardno == "37") {

                            $(".amex").removeClass("off");
                            $(".amex").addClass("on");
                        }
                        if (cardno == "35") {

                            $(".jcb").removeClass("off");
                            $(".jcb").addClass("on");
                        }
                        if (cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") {

                            $(".diners_club_international").removeClass("off");
                            $(".diners_club_international").addClass("on");
                        }

                        if (cardno == "62") {

                            $(".unionpay").removeClass("off");
                            $(".unionpay").addClass("on");

                            if ($("#upiCardLock").val() == "Y") {
                                $(".expiry-cvv").hide();
                            }
                        } else {
                            $(".expiry-cvv").show();
                        }

                        if (cardno == "95") {
                            $(".mpucard").removeClass("off");
                            $(".mpucard").addClass("on");
                            $('#tdippCVV').addClass("hide");
                        }
                        else {
                            $('#tdippCVV').removeClass("hide");
                        }
                    }
                }
            }
            return false;
        });
        //AYCAP
        $("#ipploan_credit_card_number").keyup(function () {
            if ($("#ipploan_credit_card_number").val() == "") {
                $(".cardtype").removeClass("on");
                $(".cardtype").addClass("off");
                $('#tdipploanCVV').css('display', '');
            }

            if ($("#ipploan_credit_card_number").val() != "") {

                if ($("#ipploan_credit_card_number").val().length >= 2) {

                    $(".cardtype").removeClass("on");
                    $(".cardtype").addClass("off");

                    if ($("#ipploan_credit_card_number").val().substr(0, 1) == "5") {
                        $(".mastercard").removeClass("off");
                        $(".mastercard").addClass("on");

                    }
                    if ($("#ipploan_credit_card_number").val().substr(0, 1) == "4") {
                        $(".visa").removeClass("off");
                        $(".visa").addClass("on");
                    }
                    if ($("#ipploan_credit_card_number").val().substr(0, 1) == "1") {
                        $(".uatp").removeClass("off");
                        $(".uatp").addClass("on");
                    }
                    if ($("#ipploan_credit_card_number").val().length >= 2) {
                        var cardno = $("#ipploan_credit_card_number").val().substr(0, 2);

                        if (cardno == "67"
                            || cardno == "22"
                            || cardno == "23"
                            || cardno == "24"
                            || cardno == "25"
                            || cardno == "26"
                            || cardno == "27") {

                            $(".mastercard").removeClass("off");
                            $(".mastercard").addClass("on");
                        }
                        if (cardno == "34" || cardno == "37") {

                            $(".amex").removeClass("off");
                            $(".amex").addClass("on");
                        }
                        if (cardno == "35") {

                            $(".jcb").removeClass("off");
                            $(".jcb").addClass("on");
                        }
                        if (cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") {

                            $(".diners_club_international").removeClass("off");
                            $(".diners_club_international").addClass("on");
                        }

                        if (cardno == "62") {

                            $(".unionpay").removeClass("off");
                            $(".unionpay").addClass("on");
                        }

                        if (cardno == "95") {
                            $(".mpucard").removeClass("off");
                            $(".mpucard").addClass("on");
                            $('#tdipploanCVV').css('display', 'none');
                        }
                        else {
                            $('#tdipploanCVV').css('display', '');
                        }
                    }
                }
            }
            return false;
        });

        $("#ipp_credit_card_number").change(function () {

            if ($("#ipp_credit_card_number").val() == "") {
                $(".cardtype").removeClass("on");
                $(".cardtype").addClass("off");
                $('#tdippCVV').removeClass("hide");
            }

            if ($("#ipp_credit_card_number").val() != "") {

                if ($("#ipp_credit_card_number").val().length >= 2) {

                    $(".cardtype").removeClass("on");
                    $(".cardtype").addClass("off");

                    if ($("#ipp_credit_card_number").val().substr(0, 1) == "5") {
                        $(".mastercard").removeClass("off");
                        $(".mastercard").addClass("on");

                    }
                    if ($("#ipp_credit_card_number").val().substr(0, 1) == "4") {
                        $(".visa").removeClass("off");
                        $(".visa").addClass("on");
                    }
                    if ($("#ipp_credit_card_number").val().substr(0, 1) == "1") {
                        $(".uatp").removeClass("off");
                        $(".uatp").addClass("on");
                    }
                    if ($("#ipp_credit_card_number").val().length >= 2) {
                        var cardno = $("#ipp_credit_card_number").val().substr(0, 2);

                        if (cardno == "67"
                            || cardno == "22"
                            || cardno == "23"
                            || cardno == "24"
                            || cardno == "25"
                            || cardno == "26"
                            || cardno == "27") {

                            $(".mastercard").removeClass("off");
                            $(".mastercard").addClass("on");
                        }
                        if (cardno == "34" || cardno == "37") {

                            $(".amex").removeClass("off");
                            $(".amex").addClass("on");
                        }
                        if (cardno == "35") {

                            $(".jcb").removeClass("off");
                            $(".jcb").addClass("on");
                        }
                        if (cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") {

                            $(".diners_club_international").removeClass("off");
                            $(".diners_club_international").addClass("on");
                        }

                        if (cardno == "62") {

                            $(".unionpay").removeClass("off");
                            $(".unionpay").addClass("on");

                            if ($("#upiCardLock").val() == "Y") {
                                $(".expiry-cvv").hide();
                            }
                        } else {
                            $(".expiry-cvv").show();
                        }

                        if (cardno == "95") {
                            $(".mpucard").removeClass("off");
                            $(".mpucard").addClass("on");
                            $('#tdippCVV').addClass("hide");
                        }
                        else {
                            $('#tdippCVV').removeClass("hide");
                        }
                    }
                }
            }
            return false;
        });
        //AYCAP
        $("#ipploan_credit_card_number").change(function () {

            if ($("#ipploan_credit_card_number").val() == "") {
                $(".cardtype").removeClass("on");
                $(".cardtype").addClass("off");
                $('#tdipploanCVV').css('display', '');
            }

            if ($("#ipploan_credit_card_number").val() != "") {

                if ($("#ipploan_credit_card_number").val().length >= 2) {

                    $(".cardtype").removeClass("on");
                    $(".cardtype").addClass("off");

                    if ($("#ipploan_credit_card_number").val().substr(0, 1) == "5") {
                        $(".mastercard").removeClass("off");
                        $(".mastercard").addClass("on");

                    }
                    if ($("#ipploan_credit_card_number").val().substr(0, 1) == "4") {
                        $(".visa").removeClass("off");
                        $(".visa").addClass("on");
                    }
                    if ($("#ipploan_credit_card_number").val().substr(0, 1) == "1") {
                        $(".uatp").removeClass("off");
                        $(".uatp").addClass("on");
                    }
                    if ($("#ipploan_credit_card_number").val().length >= 2) {
                        var cardno = $("#ipploan_credit_card_number").val().substr(0, 2);

                        if (cardno == "67"
                            || cardno == "22"
                            || cardno == "23"
                            || cardno == "24"
                            || cardno == "25"
                            || cardno == "26"
                            || cardno == "27") {

                            $(".mastercard").removeClass("off");
                            $(".mastercard").addClass("on");
                        }
                        if (cardno == "34" || cardno == "37") {

                            $(".amex").removeClass("off");
                            $(".amex").addClass("on");
                        }
                        if (cardno == "35") {

                            $(".jcb").removeClass("off");
                            $(".jcb").addClass("on");
                        }
                        if (cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") {

                            $(".diners_club_international").removeClass("off");
                            $(".diners_club_international").addClass("on");
                        }

                        if (cardno == "62") {

                            $(".unionpay").removeClass("off");
                            $(".unionpay").addClass("on");
                        }

                        if (cardno == "95") {
                            $(".mpucard").removeClass("off");
                            $(".mpucard").addClass("on");
                            $('#tdipploanCVV').css('display', 'none');
                        }
                        else {
                            $('#tdipploanCVV').css('display', '');
                        }
                    }
                }
            }
            return false;
        });

        var current_month = new Date().getMonth();
        var current_year = new Date().getFullYear();
        current_month = current_month + 1;

        $("#credit_card_holder_name").keypress(function (evt) {
            var result = $2c2p.filterCode(evt, "^.*?(?=[\^#@%$\*`~!:;<>\?/\{\|\}\^\)\(]).*$");

            return !result;
        });

        $("#ipp_credit_card_holder_name").keypress(function (evt) {
            var result = $2c2p.filterCode(evt, "^.*?(?=[\^#@%$\*`~!:;<>\?/\{\|\}\^\)\(]).*$");

            return !result;
        });
        $("#ipploan_credit_card_holder_name").keypress(function (evt) {
            var result = $2c2p.filterCode(evt, "^.*?(?=[\^#@%$\*`~!:;<>\?/\{\|\}\^\)\(]).*$");

            return !result;
        }); //AYCAP

        $("#kbz_credit_card_holder_name").keypress(function (evt) {
            var result = $2c2p.filterCode(evt, "^.*?(?=[\^#@%$\*`~!:;<>\?/\{\|\}\^\)\(]).*$");
            return !result;
        }); //KBZ

        $("#credit_card_issuing_bank_name").keypress(function (evt) {
            var result = $2c2p.filterCode(evt, "^.*?(?=[\^#@%&$\*`~!:;<>\?/\{\|\}\^\)\(]).*$");
            return !result;
        });

        $.validator.addMethod("ipp_ccvalid", function (value, element) {
            if ($("#ipp_credit_card_number").val() == "" || $("#cardtypelist").val() == "") {
                return true;
            }
            if ($("#ipp_credit_card_number").val().length < 4) {
                return true;
            }
            else {
                var allowedcardtypes = $("#ippcardtypelist").val().split(',');
                if (value.substr(0, 1) == "5" || value.substr(0, 1) == "3" || value.substr(0, 1) == "2") {
                    return $.inArray(value.substr(0, 2), allowedcardtypes) > -1
                        || $.inArray(value.substr(0, 3), allowedcardtypes) > -1
                        || $.inArray(value.substr(0, 4), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "4") {
                    return $.inArray(value.substr(0, 1), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "1") {
                    return $.inArray(value.substr(0, 1), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "6") { //65,6011
                    if (value.substr(0, 2) == "65") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                    if (value.substr(0, 4) == "6011") return $.inArray(value.substr(0, 4), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "9") { //95
                    if (value.substr(0, 2) == "95") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                }
                //if (value.substr(0, 1) == "1") { //11 (loan card not allowed)
                //    if (value.substr(0, 2) == "11") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                //}
                return true;
            }
        }, msg_card_type_invalid);

        $.validator.addMethod("ipploan_ccvalid", function (value, element) {
            if ($("#ipploan_credit_card_number").val() == "" || $("#cardtypelist").val() == "") {
                return true;
            }
            if ($("#ipploan_credit_card_number").val().length < 4) {
                return true;
            }
            else {
                var allowedcardtypes = $("#cardtypelist").val().split(',');
                if (value.substr(0, 1) == "5" || value.substr(0, 1) == "3" || value.substr(0, 1) == "2") {
                    return $.inArray(value.substr(0, 2), allowedcardtypes) > -1
                        || $.inArray(value.substr(0, 3), allowedcardtypes) > -1
                        || $.inArray(value.substr(0, 4), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "4") {
                    return $.inArray(value.substr(0, 1), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "1") {
                    return $.inArray(value.substr(0, 1), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "6") { //65,6011
                    if (value.substr(0, 2) == "65") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                    if (value.substr(0, 4) == "6011") return $.inArray(value.substr(0, 4), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "9") { //95
                    if (value.substr(0, 2) == "95") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                }
                return true;
            }
        }, msg_card_type_invalid); //AYCAP

        $.validator.addMethod("ipp_ccVerifyPromotion", function (value, element) {
            if ($("#ipp_credit_card_number").val() == "" || $("#promotion_code").val() == "") return true;

            if ($("#promotion_binList").val() == "" && $("#promotion_cardTypeList").val() == "") return true;

            var isValidCard = true;
            if ($("#ipp_credit_card_number").val().length < 4) return true;
            else {

                var allowedBinList = $("#promotion_binList").val().split(',');
                //alert(allowedBinList);
                //Added by Muthu -- To check BIN from 6-8 numbers
                isValidCard = $.inArray(value.substr(0, 6), allowedBinList) > -1 || $.inArray(value.substr(0, 7), allowedBinList) > -1 ||
                    $.inArray(value.substr(0, 8), allowedBinList) > -1;

                if (isValidCard == true) return true;
                else {
                    var cardno = value.substr(0, 2);
                    var allowedcardtypes = $("#promotion_cardTypeList").val().split(',');
                    if (value.substr(0, 1) == "4") {
                        return $.inArray("VI", allowedcardtypes) > -1
                    }
                    if (value.substr(0, 1) == "1") {
                        return $.inArray("UA", allowedcardtypes) > -1;
                    }
                    if (cardno == "51"
                        || cardno == "52"
                        || cardno == "53"
                        || cardno == "54"
                        || cardno == "55"
                        || cardno == "22"
                        || cardno == "23"
                        || cardno == "24"
                        || cardno == "25"
                        || cardno == "26"
                        || cardno == "27") {
                        return $.inArray("MA", allowedcardtypes) > -1
                    }
                    if (value.substr(0, 2) == "67" || value.substr(0, 4) == "6304") {
                        return $.inArray("MA", allowedcardtypes) > -1
                    }
                    if ((value.substr(0, 2) == "35") && (value.length = 16)) {
                        return $.inArray("JC", allowedcardtypes) > -1
                    }
                    if (((value.substr(0, 2) == "34") || (value.substr(0, 2) == "37")) && (value.length = 15)) {
                        return $.inArray("AM", allowedcardtypes) > -1
                    }
                    if ((cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") && (value.length = 14)) {
                        return $.inArray("DN", allowedcardtypes) > -1
                    }
                    if ((cardno == "95") && (value.length = 16)) {
                        return $.inArray("MP", allowedcardtypes) > -1
                    }
                    if ((cardno == "62")) {
                        return $.inArray("CP", allowedcardtypes) > -1
                    }
                }
                return false;
            }

        }, msg_card_payment_invalid);

        //AYCAP Start
        $.validator.addMethod("ipploan_ccVerifyPromotion", function (value, element) {
            if ($("#ipploan_credit_card_number").val() == "" || $("#promotion_code").val() == "") return true;
            if ($("#promotion_binList").val() == "" && $("#promotion_cardTypeList").val() == "") return true;

            var isValidCard = true;
            if ($("#ipploan_credit_card_number").val().length < 4) return true;
            else {

                var allowedBinList = $("#promotion_binList").val().split(',');
                //alert(allowedBinList);
                //Added by Muthu -- To check BIN from 6-8 numbers
                isValidCard = $.inArray(value.substr(0, 6), allowedBinList) > -1 || $.inArray(value.substr(0, 7), allowedBinList) > -1 ||
                    $.inArray(value.substr(0, 8), allowedBinList) > -1;

                if (isValidCard == true) return true;
                else {
                    var cardno = value.substr(0, 2);
                    var allowedcardtypes = $("#promotion_cardTypeList").val().split(',');
                    if (value.substr(0, 1) == "4") {
                        return $.inArray("VI", allowedcardtypes) > -1
                    }
                    if (value.substr(0, 1) == "1") {
                        return $.inArray("UA", allowedcardtypes) > -1;
                    }
                    if (cardno == "51"
                        || cardno == "52"
                        || cardno == "53"
                        || cardno == "54"
                        || cardno == "55"
                        || cardno == "22"
                        || cardno == "23"
                        || cardno == "24"
                        || cardno == "25"
                        || cardno == "26"
                        || cardno == "27") {
                        return $.inArray("MA", allowedcardtypes) > -1
                    }
                    if (value.substr(0, 2) == "67" || value.substr(0, 4) == "6304") {
                        return $.inArray("MA", allowedcardtypes) > -1
                    }
                    if ((value.substr(0, 2) == "35") && (value.length = 16)) {
                        return $.inArray("JC", allowedcardtypes) > -1
                    }
                    if (((value.substr(0, 2) == "34") || (value.substr(0, 2) == "37")) && (value.length = 15)) {
                        return $.inArray("AM", allowedcardtypes) > -1
                    }
                    if ((cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") && (value.length = 14)) {
                        return $.inArray("DN", allowedcardtypes) > -1
                    }
                    if ((cardno == "95") && (value.length = 16)) {
                        return $.inArray("MP", allowedcardtypes) > -1
                    }
                    if ((cardno == "62")) {
                        return $.inArray("CP", allowedcardtypes) > -1
                    }
                }
                return false;
            }

        }, msg_card_payment_invalid); //AYCAP

        $.validator.addMethod("ccvalid", function (value, element) {

            if ($("#credit_card_number").val() == "" || $("#cardtypelist").val() == "") {
                return true;
            }
            if ($("#credit_card_number").val().length < 4) {
                return true;
            }
            else {
                var allowedcardtypes = $("#cardtypelist").val().split(',');

                if (value.substr(0, 1) == "5" || value.substr(0, 1) == "3" || value.substr(0, 1) == "2") {
                    return $.inArray(value.substr(0, 2), allowedcardtypes) > -1
                        || $.inArray(value.substr(0, 3), allowedcardtypes) > -1
                        || $.inArray(value.substr(0, 4), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "4") {
                    return $.inArray(value.substr(0, 1), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "1") {
                    return $.inArray(value.substr(0, 1), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "6") { //65,6011
                    if (value.substr(0, 2) == "65") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                    if (value.substr(0, 4) == "6011") return $.inArray(value.substr(0, 4), allowedcardtypes) > -1;
                }
                if (value.substr(0, 1) == "9") { //95
                    if (value.substr(0, 2) == "95") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                }
                //if (value.substr(0, 1) == "1") { //11 (loan card not allowed)
                //    if (value.substr(0, 2) == "11") return $.inArray(value.substr(0, 2), allowedcardtypes) > -1;
                //}
                return true;
            }
        }, msg_card_type_invalid);

        $.validator.addMethod("ccbinvalid", function (value, element) {
            payment_option = $("#hdn_PaymentOption").val();
            var binlistfound = false;
            if ($("#credit_card_number").val() == "" || $("#cardtypelist").val() == "") return true;
            if ($("#credit_card_number").val().length < 4) return true;
            if (payment_option=='I' && payment_version >= 7.1) {

                if ($("#credit_card_number").val().length >= 6) {
                    var cardno = $("#credit_card_number").val().substr(0, 6);
                    if ($("#hdn_CCBinList").val() != undefined && $("#hdn_CCBinList").val().trim().length > 0) {
                        var MainBinList = $("#hdn_CCBinList").val().split(';');
                        for (var i = 0; i < MainBinList.length; i++) {
                            var SubBinList = MainBinList[i].split(':');
                            for (var j = 0; j < SubBinList.length; j++) {
                                var bankId = SubBinList[0];
                                var SplitBinlist = SubBinList[1].split(',');
                                for (var k = 0; k < SplitBinlist.length; k++) {
                                    if (cardno == SplitBinlist[k]) {
                                        binlistfound = true;
                                        return true;
                                    }
                                }
                            }
                        }
                    }
                }
                else
                {
                    return true;
                }
            }
            else {
                return true;
            }
            if (binlistfound == false)
            {
                return false;
            }
            return true;

        }, msg_invalid_bin);

        $.validator.addMethod("ccVerifyPromotion", function (value, element) {
            if ($("#credit_card_number").val() == "" || $("#promotion_code").val() == "") return true;
            if ($("#promotion_binList").val() == "" && $("#promotion_cardTypeList").val() == "") return true;

            var isValidCard = true;
            if ($("#credit_card_number").val().length < 4) return true;
            else {
                var cardno = value.substr(0, 2);
                var allowedBinList = $("#promotion_binList").val().split(',');
                //alert(allowedBinList);
                //Added by Muthu -- To check BIN from 6-8 numbers
                isValidCard = $.inArray(value.substr(0, 6), allowedBinList) > -1 || $.inArray(value.substr(0, 7), allowedBinList) > -1 ||
                    $.inArray(value.substr(0, 8), allowedBinList) > -1;

                if (isValidCard == true) return true;
                else {
                    var allowedcardtypes = $("#promotion_cardTypeList").val().split(',');
                    if (value.substr(0, 1) == "4") {
                        return $.inArray("VI", allowedcardtypes) > -1
                    }
                    if (value.substr(0, 1) == "1") {
                        return $.inArray("UA", allowedcardtypes) > -1
                    }
                    if (cardno == "51"
                        || cardno == "52"
                        || cardno == "53"
                        || cardno == "54"
                        || cardno == "55"
                        || cardno == "22"
                        || cardno == "23"
                        || cardno == "24"
                        || cardno == "25"
                        || cardno == "26"
                        || cardno == "27") {
                        return $.inArray("MA", allowedcardtypes) > -1
                    }
                    if (value.substr(0, 2) == "67" || value.substr(0, 4) == "6304") {
                        return $.inArray("MA", allowedcardtypes) > -1
                    }
                    if ((value.substr(0, 2) == "35") && (value.length = 16)) {
                        return $.inArray("JC", allowedcardtypes) > -1
                    }
                    if (((value.substr(0, 2) == "34") || (value.substr(0, 2) == "37")) && (value.length = 15)) {
                        return $.inArray("AM", allowedcardtypes) > -1
                    }
                    if ((cardno == "30" || cardno == "36" || cardno == "38" || cardno == "39") && (value.length = 14)) {
                        return $.inArray("DN", allowedcardtypes) > -1
                    }
                    if ((cardno == "95") && (value.length = 16)) {
                        return $.inArray("MP", allowedcardtypes) > -1
                    }
                    if ((cardno == "62")) {
                        return $.inArray("CP", allowedcardtypes) > -1
                    }
                }
                return false;
            }

        }, msg_card_payment_invalid);

        $.validator.addMethod(
            "cardholderRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            msg_cardholder_invalid);

        $.validator.addMethod(
            "mobileRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            msg_mobile_invalid);

        $.validator.addMethod(
            "BanknameRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || (!regexp.test(value));
            },
            msg_issuing_bank_invalid);

        $.validator.addMethod(
            "BanknameValidateRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            msg_issuing_bank_invalid);

        $.validator.addMethod(
            "EmailRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || (regexp.test(value));
            },
            msg_email_invalid);


        $.validator.addMethod("cardExpiryMonth", function (value, element) {
            if (parseInt(value, 10) < current_month) {
                if ($("#credit_card_expiry_year").val() != "") {
                    if (current_year == parseInt($("#credit_card_expiry_year").val()))
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid);

        $.validator.addMethod("cardExpiryYear", function (value, element) {
            if (parseInt(value, 10) == current_year) {
                if ($("#credit_card_expiry_month").val() != "") {
                    if (parseInt($("#credit_card_expiry_month").val(),10) < current_month)
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid);

        //KBZ month and year
        $.validator.addMethod("kbzCardExpiryMonth", function (value, element) {
            if (parseInt(value, 10) < current_month) {
                if ($("#kbz_credit_card_expiry_year").val() != "") {
                    if (current_year == parseInt($("#kbz_credit_card_expiry_year").val()))
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid);

        $.validator.addMethod("kbzCardExpiryYear", function (value, element) {
            if (parseInt(value, 10) == current_year) {
                if ($("#kbz_credit_card_expiry_month").val() != "") {
                    if (parseInt($("#kbz_credit_card_expiry_month").val(), 10) < current_month)
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid);

        $.validator.addMethod("ippcardExpiryMonth", function (value, element) {
            if (parseInt(value, 10) < current_month) {
                if ($("#ipp_credit_card_expiry_year").val() != "") {
                    if (current_year == parseInt($("#ipp_credit_card_expiry_year").val()))
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid);

        $.validator.addMethod("ipploancardExpiryMonth", function (value, element) {
            if (parseInt(value, 10) < current_month) {
                if ($("#ipploan_credit_card_expiry_year").val() != "") {
                    if (current_year == parseInt($("#ipploan_credit_card_expiry_year").val()))
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid); //AYCAP

        $.validator.addMethod("ippcardExpiryYear", function (value, element) {
            if (parseInt(value, 10) == current_year) {
                if ($("#ipp_credit_card_expiry_month").val() != "") {
                    if (parseInt($("#ipp_credit_card_expiry_month").val(), 10) < current_month)
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid);
        $.validator.addMethod("ipploancardExpiryYear", function (value, element) {
            if (parseInt(value, 10) == current_year) {
                if ($("#ipploan_credit_card_expiry_month").val() != "") {
                    if (parseInt($("#ipploan_credit_card_expiry_month").val(), 10) < current_month)
                        return false;
                }
            }
            return true;
        }, msg_expiry_invalid); //AYCAP

        $.validator.addMethod("validBIN", function (value, element) {
            if ($("#ipp_credit_card_number").val() == "") return true;
            if ($("#ipp_credit_card_number").val().length < 14) return true;
            else {
                var allowedBinList = $("#hid_bin_list").val().split(',');

                //Added by Muthu -- To check BIN from 6-8 numbers
                return $.inArray(value.substr(0, 6), allowedBinList) > -1 || $.inArray(value.substr(0, 7), allowedBinList) > -1 ||
                    $.inArray(value.substr(0, 8), allowedBinList) > -1;
            }
        }, msg_invalid_bin);
        $.validator.addMethod("validBINloancard", function (value, element) {
            if ($("#ipploan_credit_card_number").val() == "") return true;
            if ($("#ipploan_credit_card_number").val().length < 14) return true;
            else {
                var allowedBinList = $("#hid_loanbin_list").val().split(',');

                //Added by Muthu -- To check BIN from 6-8 numbers
                return $.inArray(value.substr(0, 6), allowedBinList) > -1 || $.inArray(value.substr(0, 7), allowedBinList) > -1 ||
                    $.inArray(value.substr(0, 8), allowedBinList) > -1;
            }
        }, msg_invalid_bin);  //AYCAP

        $.validator.addMethod("validKBZBIN", function (value, element) {
            if ($("#kbz_credit_card_number").val() == "") return true;
            if ($("#kbz_credit_card_number").val().length < 14) return true;
            else {
                var allowedBinList = $("#KBZBinBankList").val().split(',');
                if ($.inArray(value.substr(0, 6), allowedBinList) > -1)
                    return true;
                else if ($.inArray(value.substr(0, 7), allowedBinList) > -1)
                    return true;
                else
                    return $.inArray(value.substr(0, 8), allowedBinList) > -1;
            }
        }, msg_invalid_bin); //KBZ

        $.validator.addMethod(
            "otpValueRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            msg_otpValue_invalid); //OTP

        $.validator.addMethod(
            "messageRegEx",
            function (value, element, regexp) {
                if (regexp.constructor != RegExp)
                    regexp = new RegExp(regexp);
                else if (regexp.global)
                    regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
            },
            msg_customer_note_invalid);

        $.validator.addMethod("pinLength", function (value, element) {
            if (value.length != 6) {
                return false;
            }
            else {
                return true;
            }
        }, msg_pin_length_invalid);
        var require_cvv = true;
        try {
            if (document.getElementById('require_cvv').value == "N") {
                require_cvv = false;
            }
        }
        catch (err) {
            require_cvv = false;
        }

        var require_email = false;
        try {
            if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                require_email = true;
            }
        }
        catch (err) {
            require_email = false;
        }

        $.validator.addMethod("cvcLength", function (value, element) {
            if ((value.length == 4 && !$(".amex").hasClass('on')) ||
                (value.length != 4 && require_cvv && $(".amex").hasClass('on'))) {
                return false;
            } else {
                return true;
            }

        }, msg_cvv_length_invalid);

        $("#credit_card_details_form").validate({
            onfocusout: function (element) {
                if($(element).valid())
                {
                    var eid = "#err_" + element.id;
                    if (element.id == "credit_card_expiry_month" || element.id == "credit_card_expiry_year") {
                        eid = "#err_credit_card_expiry";
                    }
                    $(eid).text("");
                }
            },
            rules: {
                credit_card_number: {
                    required: true,
                    //creditcard: true,???
                    creditcard: true,
                    ccbinvalid:true,
                    ccvalid: true,
                    ccVerifyPromotion: true
                    //customccvalidator: true
                },
                credit_card_holder_name: {
                    required: true,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                credit_card_expiry_month: {
                    required: true,
                    cardExpiryMonth: true
                },
                credit_card_expiry_year: {
                    required: true,
                    cardExpiryYear: true
                },
                credit_card_cvv: {
                    //required: true,
                    required: require_cvv,
                    digits: true,
                    cvcLength: true,
                    minlength: 3,
                    maxlength: 4
                },
                credit_card_issuing_bank_country: {
                    required: true
                },
                credit_card_issuing_bank_name: {
                    required: true,
                    maxlength: 100,
                    BanknameRegEx: /^.*?(?=[\^#@%&$\*`~!:;<>\?/\{\|\}\^\)\(]).*$/,
                    BanknameValidateRegEx: /^[-_,'.A-Za-z0-9& ]{1,100}$/
                },
                cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }, customer_note: {
                    required: false,
                    messageRegEx: /^[!@#-_,'.A-Za-z& ]{1,500}$/,
                    maxlength: 500
                }
            },
            groups: {
                credit_card_expiry_month: "credit_card_expiry_month credit_card_expiry_year"
            },
            messages: {
                "credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required,
                    //required: 'sofian1',
                    //creditcard: 'sofian2',
                    ccVerifyPromotion: msg_card_payment_invalid
                },
                "credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "credit_card_cvv": {
                    required: msg_cvv_required,
                    minlength: msg_cvv_length_invalid
                },
                "credit_card_issuing_bank_country": {
                    required: msg_issuing_country_required
                },
                "credit_card_issuing_bank_name": {
                    required: msg_issuing_bank_required
                },
                "cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
                },
                "customer_note": {
                    messageRegEx: msg_customer_note_invalid
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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "credit_card_cvv") {
                    // error.insertAfter($("#help-inline"));

                    //II modify to accomodate mobile version by adding custom label for error placement
                    if ($("#error_credit_card_cvv").length > 0) {
                        if (error.text() == "") {
                            $("#error_credit_card_cvv").removeClass("error");
                            $("#error_credit_card_cvv").addClass("valid");
                        }
                        else {
                            $("#error_credit_card_cvv").removeClass("valid");
                            $("#error_credit_card_cvv").addClass("error");
                        }
                    }
                    else {
                        error.insertAfter(element);
                    }
                } else if (element.attr("id") == "credit_card_expiry_month" || element.attr("id") == "credit_card_expiry_year") {
                    //error.insertAfter($("#credit_card_expiry_year"));

                    //II modify to accomodate mobile version by adding custom label for error placement
                    if ($("#error_credit_card_expiry") != null) {
                        if (error.text() == "") {
                            $("#error_credit_card_expiry").removeClass("error");
                            $("#error_credit_card_expiry").addClass("valid");
                        }
                        else {
                            $("#error_credit_card_expiry").removeClass("valid");
                            $("#error_credit_card_expiry").addClass("error");
                        }
                    }

                    eid = "#err_credit_card_expiry";
                } else if (element.attr("id") == "credit_card_issuing_bank_country") {

                    //II added to accomodate mobile version by adding custom label for error placement
                    if ($("#error_credit_card_issuing_bank_country") != null) {
                        if (error.text() == "") {
                            $("#error_credit_card_issuing_bank_country").removeClass("error");
                            $("#error_credit_card_issuing_bank_country").addClass("valid");
                        }
                        else {
                            $("#error_credit_card_issuing_bank_country").removeClass("valid");
                            $("#error_credit_card_issuing_bank_country").addClass("error");
                        }
                    }
                }

                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());

            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                if (forid == "credit_card_expiry_month" || forid == "credit_card_expiry_year") {
                    eid = "#err_credit_card_expiry";
                }
                $(eid).text("");
            }
        });


        $("#ipp_credit_card_details_form").validate({
            onfocusout: function (element) {
                $(element).valid();
            },
            rules: {
                ipp_credit_card_number: {
                    required: true,
                    //creditcard: true,???
                    creditcard: true,
                    ipp_ccvalid: true,
                    ipp_ccVerifyPromotion: true,
                    validBIN: true
                },
                ipp_credit_card_holder_name: {
                    required: true,
                    // maxlength: 50
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                ipp_credit_card_expiry_month: {
                    required: true,
                    ippcardExpiryMonth: true
                },
                ipp_credit_card_expiry_year: {
                    required: true,
                    ippcardExpiryYear: true
                },
                ipp_credit_card_cvv: {
                    //required: true,
                    required: require_cvv,
                    digits: true,
                    cvcLength: true,
                    minlength: 3,
                    maxlength: 4
                },
                ipp_cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }, ipp_customer_note: {
                    required: false,
                    messageRegEx: /^[!@#-_,'.A-Za-z& ]{1,500}$/,
                    maxlength: 500
                }
            },
            groups: {
                ipp_credit_card_expiry_month: "ipp_credit_card_expiry_month ipp_credit_card_expiry_year"
            },
            messages: {
                "ipp_credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required

                },
                "ipp_credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "ipp_credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "ipp_credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "ipp_credit_card_cvv": {
                    required: msg_cvv_required,
                    minlength: msg_cvv_length_invalid
                },
                "ipp_cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
                },
                "ipp_customer_note": {
                    messageRegEx: msg_customer_note_invalid
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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "ipp_credit_card_cvv") {
                    error.insertAfter($("#help-inline-ipp"));

                    //II modify to accomodate mobile version by adding custom label for error placement
                    //if ($("#error_ipp_credit_card_cvv").length > 0) {
                    //    if (error.text() == "") {
                    //        $("#error_ipp_credit_card_cvv").removeClass("error");
                    //        $("#error_ipp_credit_card_cvv").addClass("valid");
                    //    }
                    //    else {
                    //        $("#error_ipp_credit_card_cvv").removeClass("valid");
                    //        $("#error_ipp_credit_card_cvv").addClass("error");
                    //    }
                    //}
                    //else {
                    //    error.insertAfter(element);
                    //}

                } else if (element.attr("id") == "ipp_credit_card_expiry_month" || element.attr("id") == "ipp_credit_card_expiry_year") {
                    error.insertAfter($("#ipp_credit_card_expiry_year"));

                    //II modify to accomodate mobile version by adding custom label for error placement
                    //if ($("#error_ipp_credit_card_expiry") != null) {
                    //    if (error.text() == "") {
                    //        $("#error_ipp_credit_card_expiry").removeClass("error");
                    //        $("#error_ipp_credit_card_expiry").addClass("valid");
                    //    }
                    //    else {
                    //        $("#error_ipp_credit_card_expiry").removeClass("valid");
                    //        $("#error_ipp_credit_card_expiry").addClass("error");
                    //    }
                    //}
                    //eid = "#err_ipp_credit_card_expiry";
                }
                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());


            },
            success: function (label) {

                var forid = label.attr('for');
                var eid = "#err_" + forid;
                var showTick = true;
                if (forid == "ipp_credit_card_expiry_month" || forid == "ipp_credit_card_expiry_year") {
                    eid = "#err_ipp_credit_card_expiry";
                    //alert($("#ipp_credit_card_expiry_month").hasClass("valid") + ',' + $("#ipp_credit_card_expiry_year").hasClass("valid"));
                    //$(eid).text(forid +","+$("#ipp_credit_card_expiry_month").hasClass("valid") + ',' + $("#ipp_credit_card_expiry_year").hasClass("valid"));
                    //if ((forid == "ipp_credit_card_expiry_month" && $("#ipp_credit_card_expiry_year").hasClass("valid"))
                    //    || (forid == "ipp_credit_card_expiry_year" && $("#ipp_credit_card_expiry_month").hasClass("valid")))
                    //{
                    //    showTick = true;
                    //    $("#ipp_credit_card_details_form").validate();
                    //}
                } else {
                    showTick = true;
                }

                if (showTick) {
                    label.addClass("valid").text("");
                    $(eid).text("");
                }

            }
        });

        //KBZ Card -- Start
        $("#KBZ_credit_card_details_form").validate({
            onfocusout: function (element) {
                if ($(element).valid()) {
                    var eid = "#err_" + element.id;
                    if (element.id == "kbz_credit_card_expiry_month" || element.id == "kbz_credit_card_expiry_year") {
                        eid = "#err_credit_kbz_card_expiry";
                    }
                    $(eid).text("");
                }
            },
            rules: {
                kbz_credit_card_number: {
                    required: true,
                    creditcard: true,
                    validKBZBIN: true
                },
                kbz_credit_card_holder_name: {
                    required: true,
                    cardholderRegEx: /^[-_,'.A-Za-z& ]{1,50}$/
                },
                kbz_credit_card_expiry_month: {
                    required: true,
                    kbzCardExpiryMonth: true
                },
                kbz_credit_card_expiry_year: {
                    required: true,
                    kbzCardExpiryYear: true
                },
                kbz_credit_card_pin: {
                    required: true,
                    digits: true,
                    pinLength: true,
                    minlength: 3,
                    maxlength: 6
                },
                kbz_cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }
            },
            groups: {
                kbz_credit_card_expiry_month: "kbz_credit_card_expiry_month kbz_credit_card_expiry_year"
            },
            messages: {
                "kbz_credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required
                },
                "kbz_credit_card_holder_name": {
                    required: msg_cardholder_required
                },
                "kbz_credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "kbz_credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "kbz_credit_card_pin": {
                    required: msg_pin_required,
                    minlength: msg_pin_length_invalid
                },
                "kbz_cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
                }
            },
            showErrors: function (errorMap, errorList) {
                for (var i = 0; errorList[i]; i++) {
                    var element = this.errorList[i].element;
                    this.errorsFor(element).remove();
                }
                this.defaultShowErrors();
            },
            errorPlacement: function (error, element) {
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "kbz_card_pin") {
                    //II modify to accomodate mobile version by adding custom label for error placement
                    if ($("#error_kbz_credit_card_pin").length > 0) {
                        if (error.text() == "") {
                            $("#error_kbz_credit_card_pin").removeClass("error");
                            $("#error_kbz_credit_card_pin").addClass("valid");
                        }
                        else {
                            $("#error_kbz_credit_card_pin").removeClass("valid");
                            $("#error_kbz_credit_card_pin").addClass("error");
                        }
                    }
                    else {
                        error.insertAfter(element);
                    }
                } else if (element.attr("id") == "kbz_credit_card_expiry_month" || element.attr("id") == "kbz_credit_card_expiry_year") {

                    //II modify to accomodate mobile version by adding custom label for error placement
                    if ($("#error_kbz_credit_card_expiry") != null) {
                        if (error.text() == "") {
                            $("#error_kbz_credit_card_expiry").removeClass("error");
                            $("#error_kbz_credit_card_expiry").addClass("valid");
                        }
                        else {
                            $("#error_kbz_credit_card_expiry").removeClass("valid");
                            $("#error_kbz_credit_card_expiry").addClass("error");
                        }
                    }

                    eid = "#err_kbz_credit_card_expiry";
                }
                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());

            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                if (forid == "kbz_credit_card_expiry_month" || forid == "kbz_credit_card_expiry_year") {
                    eid = "#err_kbz_credit_card_expiry";
                }
                $(eid).text("");
            }
        });
        //KBZ Card -- End

        //AYCAP -- Start
        $("#ipploancard_credit_card_details_form").validate({
            onfocusout: function (element) {
                $(element).valid();
            },
            rules: {
                ipploan_credit_card_number: {
                    required: true,
                    //creditcard: true, //no need to check for cardNo with Luhn algorithm
                    ipploan_ccvalid: true,
                    ipploan_ccVerifyPromotion: true,
                    validBINloancard: true
                },
                ipploan_credit_card_holder_name: {
                    required: true,
                    // maxlength: 50
                    cardholderRegEx: /^[-_,'.A-Za-z& ]{1,50}$/
                },
                ipploan_credit_card_expiry_month: {
                    required: true,
                    ipploancardExpiryMonth: true
                },
                ipploan_credit_card_expiry_year: {
                    required: true,
                    ipploancardExpiryYear: true
                },
                ipploan_credit_card_cvv: {
                    //required: true,
                    required: require_cvv,
                    digits: true,
                    cvcLength: true,
                    minlength: 3,
                    maxlength: 4
                },
                ipploan_cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }, ipploan_customer_note: {
                    required: false,
                    messageRegEx: /^[!@#-_,'.A-Za-z& ]{1,500}$/,
                    maxlength: 500
                }
            },
            groups: {
                ipploan_credit_card_expiry_month: "ipploan_credit_card_expiry_month ipploan_credit_card_expiry_year"
            },
            messages: {
                "ipploan_credit_card_number": {
                    required: msg_cardno_required
                    //creditcard: msg_cardno_required //no need to check for cardNo with Luhn algorithm

                },
                "ipploan_credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "ipploan_credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "ipploan_credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "ipploan_credit_card_cvv": {
                    required: msg_cvv_required,
                    minlength: msg_cvv_length_invalid
                },
                "ipploan_cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
                },
                "ipploan_customer_note": {
                    messageRegEx: msg_customer_note_invalid
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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "ipploan_credit_card_cvv") {
                    error.insertAfter($("#help-inline-ipploan"));

                } else if (element.attr("id") == "ipploan_credit_card_expiry_month" || element.attr("id") == "ipploan_credit_card_expiry_year") {
                    error.insertAfter($("#ipploan_credit_card_expiry_year"));

                }
                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());


            },
            success: function (label) {

                var forid = label.attr('for');
                var eid = "#err_" + forid;
                var showTick = true;
                if (forid == "ipploan_credit_card_expiry_month" || forid == "ipploan_credit_card_expiry_year") {
                    eid = "#err_ipploan_credit_card_expiry";
                } else {
                    showTick = true;
                }

                if (showTick) {
                    label.addClass("valid").text("");
                    $(eid).text("");
                }
            }
        });
        //AYCAP -- End
        //OTP- Start
        $("#otp_form").validate({
            onfocusout: function (element) {
                if ($(element).valid()) {
                    var eid = "#err_" + element.id;
                    //if (element.id == "credit_card_expiry_month" || element.id == "credit_card_expiry_year") {
                    //    eid = "#err_credit_card_expiry";
                    //}
                    $(eid).text("");
                }
            },
            rules: {
                otpValue: {
                    required: true,
                    otpValueRegEx: /^[0-9]{6,10}$/
                }
            },
            //groups: {
            //    credit_card_expiry_month: "credit_card_expiry_month credit_card_expiry_year"
            //},
            messages: {
                "otpValue": {
                    required: msg_otpValue_required,
                    otpValueRegEx: "Invalid OTP value"
                }
            },
            showErrors: function (errorMap, errorList) {
                for (var i = 0; errorList[i]; i++) {
                    var element = this.errorList[i].element;

                    this.errorsFor(element).remove();
                }
                this.defaultShowErrors();
            },
            errorPlacement: function (error, element) {
                var eid = "#err_" + element.attr("id");
                error.insertAfter(element);

                $(eid).text(error.text());

            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                $(eid).text("");
            }
        });
        //OTP -- End

        $("#pay_123_form").validate({
            onfocusout: function (element) {
                $(element).valid();
            },
            rules: {
                agent_code: {
                    required: true

                },
                mobile_number: {
                    required: true,
                    mobileRegEx: /^[0-9]{1,20}$/
                },
                payer_name: {
                    required: true,
                    maxlength: 50,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                },
                email_address: {
                    required: true,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                }
            },
            messages: {
                "agent_code": {
                    required:msg_agent_required
                },
                "mobile_number": {
                    required: msg_mobile_required
                    //creditcard: msg_cardno_required

                },
                "payer_name": {
                    required: msg_payer_required,
                    maxlength: msg_payer_length_invalid,
                    cardholderRegEx: msg_payer_invalid

                },
                "email_address": {
                    required: msg_email_required

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
                error.insertAfter(element);
                var eid = "#err_" + element.attr("id");
                $(eid).text(error.text());

            },
            success: function (label) {
                if (label.attr('for') != "agent_code" ) {
                    label.addClass("valid").text("")
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");
            }
        });

        $("#pay_123bank_form").validate({
            onfocusout: function (element) {
                $(element).valid();
            },
            rules: {
                bank_code: {
                    required: true
                    //cardholderRegEx: /^[0-9]{1,50}$/
                },
                bank_channel: {
                    required:true
                },
                channel_code: {
                    required: true
                },
                bank_mobile_number: {
                    required: true,
                    mobileRegEx: /^[0-9]{1,20}$/
                },
                bank_payer_name: {
                    required: true,
                    maxlength: 50,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                },
                bank_email_address: {
                    required: true,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                }
            },
            messages: {
                "bank_code": {
                    required: msg_bank_required
                },
                "bank_channel": {
                    required:msg_channel_required
                },
                "channel_code": {
                    required: msg_channel_required
                },
                "bank_mobile_number": {
                    required: msg_mobile_required
                    //creditcard: msg_cardno_required

                },
                "bank_payer_name": {
                    required: msg_payer_required,
                    maxlength: msg_payer_length_invalid,
                    cardholderRegEx: msg_payer_invalid

                },
                "bank_email_address": {
                    required: msg_email_required

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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "channel_code") {
                    //II added to accomodate mobile version by adding custom label for error placement
                    if ($("#error_channel_code") != null) {
                        if (error.text() == "") {
                            $("#error_channel_code").removeClass("error");
                            $("#error_channel_code").addClass("valid");
                        }
                        else {
                            $("#error_channel_code").removeClass("valid");
                            $("#error_channel_code").addClass("error");
                        }
                    }
                }
                else {
                    error.insertAfter(element);
                }
                $(eid).text(error.text());
            },
            success: function (label) {
                if (label.attr('for') != "bank_code") {
                    label.addClass("valid").text("")
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");

            }
        });

        //CreditCard Validator
        $("#btnCCSubmit").click(function () {
            ValidateCC();
            var isValid = $("#credit_card_details_form").valid();

            if (isValid) {
                if ($('#divCCOptionsText').css('display') == 'block') {
                    if ($('input[name=PaymentOption]:checked').val() != "0") {
                        isValid = $("#chkCCTermCond").prop('checked');
                        if (!isValid) alert(msg_accept_tc);
                    }
                }
            }
            if (isValid)
            {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "Accept",
                    data: $('#credit_card_details_form').serialize(),
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            //$("#ccprocessForm #payment_token").val(msg.payment_token);
                            //$("#ccprocessForm #credit_card_number").val(msg.credit_card_number);
                            //$("#ccprocessForm #credit_card_holder_name").val(msg.credit_card_holder_name);
                            //$("#ccprocessForm #credit_card_expiry_month").val(msg.credit_card_expiry_month);
                            //$("#ccprocessForm #credit_card_expiry_year").val(msg.credit_card_expiry_year);
                            //$("#ccprocessForm #credit_card_cvv").val(msg.credit_card_cvv);
                            //$("#ccprocessForm #credit_card_issuing_bank_country").val(msg.credit_card_issuing_bank_country);
                            //$("#ccprocessForm #credit_card_issuing_bank_name").val(msg.credit_card_issuing_bank_name);
                            //$("#ccprocessForm #hash_value").val(msg.hash_value);
                            //$("#ccprocessForm").attr('action', msg.processUrl);
                            //$("#ccprocessForm").submit();
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        //KBZ Card Validator
        $("#btnKBZCCSubmit").click(function () {
            ValidateKBZCC();
            var isValid = $("#KBZ_credit_card_details_form").valid();

            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayKBZBank",
                    data: $('#KBZ_credit_card_details_form').serialize(),
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btn123BankSubmit").click(function () {
            Validate123Bank();
            var isValid = $("#pay_123bank_form").valid();
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "Pay123Bank",
                    data: $('#pay_123bank_form').serialize(),
                    success: function (msg) {
                        if (msg.request != "") {

                            //msg.payment_token
                            $("#processForm123 #paymentRequest").val(msg.request);
                            $("#processForm123").attr('action', msg.processUrl);
                            $("#processForm123").submit();
                        } else {
                            window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                        }


                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btn123Submit").click(function () {
            Validate123Form("123");
            var isValid = $("#pay_123_form").valid();
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "Pay123",
                    data: $('#pay_123_form').serialize(),
                    success: function (msg) {
                        if (msg.request != "") {

                            $("#processForm123 #paymentRequest").val(msg.request);
                            $("#processForm123").attr('action', msg.processUrl);
                            $("#processForm123").submit();
                        } else {
                            window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                        }


                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btnKioskSubmit").click(function () {
            Validate123Form("kiosk");
            var isValid = $("#pay_kiosk_form").valid();
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "Pay123Kiosk",
                    data: $('#pay_kiosk_form').serialize(),
                    success: function (msg) {
                        if (msg.request != "") {

                            $("#processForm123 #paymentRequest").val(msg.request);
                            $("#processForm123").attr('action', msg.processUrl);
                            $("#processForm123").submit();
                        } else {
                            window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                        }


                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });


        $("#btnMPUSubmit").click(function () {
            //ValidateCC();
            var isValid = true;//$("#credit_card_details_form").valid();
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayMPU",
                    //data: $('#credit_card_details_form').serialize(),
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            //$("#ccprocessForm #payment_token").val(msg.payment_token);
                            //$("#ccprocessForm #credit_card_number").val(msg.credit_card_number);
                            //$("#ccprocessForm #credit_card_holder_name").val(msg.credit_card_holder_name);
                            //$("#ccprocessForm #credit_card_expiry_month").val(msg.credit_card_expiry_month);
                            //$("#ccprocessForm #credit_card_expiry_year").val(msg.credit_card_expiry_year);
                            //$("#ccprocessForm #credit_card_cvv").val(msg.credit_card_cvv);
                            //$("#ccprocessForm #credit_card_issuing_bank_country").val(msg.credit_card_issuing_bank_country);
                            //$("#ccprocessForm #credit_card_issuing_bank_name").val(msg.credit_card_issuing_bank_name);
                            //$("#ccprocessForm #hash_value").val(msg.hash_value);
                            //$("#ccprocessForm").attr('action', msg.processUrl);
                            //$("#ccprocessForm").submit();
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btnUPOPSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayUPOP",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btnAlipaySubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayAlipay",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnGCashSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayGCash",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btnLineSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayLine",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnPayPalSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayPayPal",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnKCPSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "KCP",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnWeChatSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "WECHAT",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btnOctoPaySubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "Octopus",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $("#btnAirpaySubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayAirPayQR",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });

        $(".btnEMVQRSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayEMVQR",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnTQRSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayThaiQR",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnEMVTQRSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayEMVTQR",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });
        $("#btnGIPQRSubmit").click(function () {
            var isValid = true;
            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayGIPQR",
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }
            return false;
        });


        $("#btnwalletsubmit").click(function () {
            var  formid = "#wallet_details_form";
            var walletcodeFor = "wallet_code";
            validateWalletsDetailForms(formid, walletcodeFor);
            var isValid = $("#wallet_details_form").valid();

            if (isValid) {
                ShowLoadingDialog();
                $.ajax({
                    type: "POST",
                    url: "PayWallet",
                    data: $('#wallet_details_form').serialize(),
                    success: function (msg) {
                        if (msg.encrypted_payment_request != "") {
                            $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                            $("#newCCprocessForm").attr('action', msg.processUrl);
                            $("#newCCprocessForm").attr('autocomplete', 'off');
                            $("#newCCprocessForm").submit();
                        } else {
                            //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                            window.location.href = "CCResult";
                        }
                    },
                    error: function () {
                        window.location.href = "Error";
                    }
                });
            }

            return false;
        });

        function validateWalletsDetailForms(formid, ChannelCodeid) {
            var require_email = false;
            try {
                if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                    require_email = true;
                }
            }
            catch (err) {
                require_email = false;
            }
            $(formid).validate({
                rules: {
                    wallet_code: {
                        required: true
                    },
                    wallet_mobile_number: {
                        required: false,
                        mobileRegEx: /^[0-9]{1,20}$/
                    },
                    wallet_payer_name: {
                        required: true,
                        maxlength: 50,
                        cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                    },
                    wallet_email_address: {
                        required: require_email,
                        EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                    }
                },
                messages: {
                    "wallet_code": {
                        required: msg_agent_required
                    },
                    "wallet_mobile_number": {
                        required: msg_mobile_required

                    },
                    "wallet_payer_name": {
                        required: msg_payer_required,
                        maxlength: msg_payer_length_invalid,
                        cardholderRegEx: msg_payer_invalid

                    },
                    "wallet_email_address": {
                        required: msg_email_required

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
                    error.insertAfter(element);
                    var eid = "#err_" + element.attr("id");
                    $(eid).text(error.text());

                },
                success: function (label) {
                    if (label.attr('for') != ChannelCodeid) {
                        label.addClass("valid").text("")
                    }
                    var eid = "#err_" + label.attr('for');
                    $(eid).text("");
                }
            });
        }



        if (Recurringvalue != 'Y' && StorecardpayUniqueid != '') {
            //alert(StorecardpayUniqueid);
            if (payment_version >= 7.1) {
                if ($("#pan_masked") != null
                    && $("#pan_masked").val() != undefined)
                {
                    if ($("#pan_masked").val().length >= 6 && $("#hdn_CCBinList").val() != undefined
                        && $("#hdn_CCBinList").val().length > 0) {
                        var cardno = $("#pan_masked").val().substr(0, 6);
                        if ($("#hdn_CCBinList").val().trim().length > 0) {
                            var MainBinList = $("#hdn_CCBinList").val().split(';');
                            for (var i = 0; i < MainBinList.length; i++) {
                                var SubBinList = MainBinList[i].split(':');
                                if (SubBinList.length > 1) {
                                    for (var j = 0; j < SubBinList.length; j++) {
                                        var bankId = SubBinList[0];
                                        var SplitBinlist = SubBinList[1].split(',');
                                        for (var k = 0; k < SplitBinlist.length; k++) {
                                            if (cardno == SplitBinlist[k]) {
                                                var recuringvalue = $("#hdn_RecuringOption").val();
                                                //alert(recuringvalue);
                                                //if (recuringvalue != 'Y' && payment_option != 'F') {
                                                //    document.getElementById("divCCOptionsText").style.display = "block";
                                                //    document.getElementById("divCCOptions").style.display = "block";
                                                //    document.getElementById("divCCImage").style.display = "block";
                                                //}
                                                if (payment_version >= 7.5) {
                                                    if (recuringvalue != 'Y' && payment_option != 'F' && showIPPdiv == 'Y') {
                                                        document.getElementById("divCCOptionsText").style.display = "block";
                                                        document.getElementById("divCCOptions").style.display = "block";
                                                        document.getElementById("divCCImage").style.display = "block";
                                                    }
                                                }
                                                else {
                                                    if (recuringvalue != 'Y' && payment_option != 'F') {
                                                        document.getElementById("divCCOptionsText").style.display = "block";
                                                        document.getElementById("divCCOptions").style.display = "block";
                                                        document.getElementById("divCCImage").style.display = "block";
                                                    }
                                                }
                                                //var varlogoIPPURL = $("#logoIPPPath").text();
                                                $("#CCBankId").val(bankId);
                                                var BankName = bankId + "_cc_bank_name";
                                                $("label[for='lblBankName']").html($("#" + BankName).val());
                                                //$("#hdn_BankName").val($("#" + BankName).val());
                                                // alert($("#hdn_BankName").val($("#" + BankName).val()));
                                                $("#CCImage").attr('src', varlogoIPPURL + bankId + '.png');
                                                $("#CCImage").hide();
                                                $('.CCoption-row').hide();
                                                ///$('[code^="' + bankCode + '"]').show();
                                                //$("#btnCCSubmit").prop("disabled", false);
                                                document.getElementById("0rdo_cc_option").checked = true;
                                                $('[CCCode="' + bankId + '"]').show();
                                                return false;
                                            }
                                            else {
                                                if (document.getElementById("divCCOptionsText").style.display == "block") {
                                                    document.getElementById("divCCOptionsText").style.display = "none";
                                                }
                                                if (document.getElementById("divCCOptions").style.display == "block") {
                                                    document.getElementById("divCCOptions").style.display = "none";
                                                }
                                                if (document.getElementById("divCCImage").style.display == "block") {
                                                    document.getElementById("divCCImage").style.display = "none";
                                                }


                                            }


                                        }

                                    }
                                }
                            }
                        }
                    }
                }


            }
        }
        else
        {
            if (payment_version >= 7.1) {
                //alert($("#pan_masked").val());

                if ($("#ReqCreditCardNo").val().length >= 6) {
                    var cardno = $("#ReqCreditCardNo").val().substr(0, 6);
                    if ($("#hdn_CCBinList").val() != undefined && $("#hdn_CCBinList").val().trim().length > 0) {
                        var MainBinList = $("#hdn_CCBinList").val().split(';');
                        for (var i = 0; i < MainBinList.length; i++) {
                            var SubBinList = MainBinList[i].split(':');
                            for (var j = 0; j < SubBinList.length; j++) {
                                var bankId = SubBinList[0];
                                var SplitBinlist = SubBinList[1].split(',');
                                if (SubBinList.length > 1) {
                                    for (var k = 0; k < SplitBinlist.length; k++) {
                                        if (cardno == SplitBinlist[k]) {
                                            var recuringvalue = $("#hdn_RecuringOption").val();
                                            //alert(recuringvalue);
                                            //if (recuringvalue != 'Y' && payment_option != 'F') {
                                            //    document.getElementById("divCCOptionsText").style.display = "block";
                                            //    document.getElementById("divCCOptions").style.display = "block";
                                            //    document.getElementById("divCCImage").style.display = "block";
                                            //}
                                            if (payment_version >= 7.5) {
                                                if (recuringvalue != 'Y' && payment_option != 'F' && showIPPdiv == 'Y') {
                                                    document.getElementById("divCCOptionsText").style.display = "block";
                                                    document.getElementById("divCCOptions").style.display = "block";
                                                    document.getElementById("divCCImage").style.display = "block";
                                                }
                                            }
                                            else {
                                                if (recuringvalue != 'Y' && payment_option != 'F') {
                                                    document.getElementById("divCCOptionsText").style.display = "block";
                                                    document.getElementById("divCCOptions").style.display = "block";
                                                    document.getElementById("divCCImage").style.display = "block";
                                                }
                                            }
                                            //var varlogoIPPURL = $("#logoIPPPath").text();
                                            $("#CCBankId").val(bankId);
                                            var BankName = bankId + "_cc_bank_name";
                                            $("label[for='lblBankName']").html($("#" + BankName).val());
                                            //$("#hdn_BankName").val($("#" + BankName).val());
                                            // alert($("#hdn_BankName").val($("#" + BankName).val()));
                                            $("#CCImage").attr('src', varlogoIPPURL + bankId + '.png');
                                            $("#CCImage").hide();
                                            $('.CCoption-row').hide();
                                            ///$('[code^="' + bankCode + '"]').show();
                                            //$("#btnCCSubmit").prop("disabled", false);
                                            $('[CCCode="' + bankId + '"]').show();
                                            document.getElementById("0rdo_cc_option").checked = true;
                                            return false;
                                        }
                                        else {
                                            if (document.getElementById("divCCOptionsText").style.display == "block") {
                                                document.getElementById("divCCOptionsText").style.display = "none";
                                            }
                                            if (document.getElementById("divCCOptions").style.display == "block") {
                                                document.getElementById("divCCOptions").style.display = "none";
                                            }
                                            if (document.getElementById("divCCImage").style.display == "block") {
                                                document.getElementById("divCCImage").style.display = "none";
                                            }

                                        }


                                    }
                                }
                            }
                        }
                    }
                }

            }
        }

    }

    $("#btnIPPCCSubmit").click(function () {
        if($('#ipp_stored_card_match').val() == "N")//Blank= non storedcard, Y=match,N=no match
        {
            if ($('#ipp_is_stored_card_payment').val() == "True") {
                alert(msg_ipp_stored_card_not_available);
                return false;
            }
        }
        ValidateIPPCC();
        var isValid = $("#ipp_credit_card_details_form").valid();
        if (isValid) {
            isValid = $("#chkIPPTermCond").prop('checked');
            if (!isValid) alert(msg_accept_tc);
        }
        if (isValid) {
            ShowLoadingDialog();
            $.ajax({
                type: "POST",
                url: "AcceptIPP",
                data: $('#ipp_credit_card_details_form').serialize(),
                success: function (msg) {
                    if (msg.encrypted_payment_request != "") {
                        //$("#ipp_ccprocessForm #payment_token").val(msg.payment_token);
                        //$("#ccprocessForm #credit_card_number").val(msg.credit_card_number);
                        //$("#ccprocessForm #credit_card_holder_name").val(msg.credit_card_holder_name);
                        //$("#ccprocessForm #credit_card_expiry_month").val(msg.credit_card_expiry_month);
                        //$("#ccprocessForm #credit_card_expiry_year").val(msg.credit_card_expiry_year);
                        //$("#ccprocessForm #credit_card_cvv").val(msg.credit_card_cvv);
                        //$("#ccprocessForm #credit_card_issuing_bank_country").val(msg.credit_card_issuing_bank_country);
                        //$("#ccprocessForm #credit_card_issuing_bank_name").val(msg.credit_card_issuing_bank_name);
                        //$("#ccprocessForm #hash_value").val(msg.hash_value);
                        //$("#ccprocessForm").attr('action', msg.processUrl);
                        //$("#ccprocessForm").submit();
                        $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                        $("#newCCprocessForm").attr('action', msg.processUrl);
                        $("#newCCprocessForm").submit();

                    } else {
                        //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                        window.location.href = "CCResult";
                    }
                },
                error: function () {
                    window.location.href = "Error";
                }
            });
        }
        return false;
    });
    ////AYCAP
    //$("#btnIPPLoanCCSubmit").click(function () {
    //    if ($('#ipploancard_stored_card_match').val() == "N")//Blank= non storedcard, Y=match,N=no match
    //    {
    //        if ($('#ipploancard_is_stored_card_payment').val() == "True") {
    //            alert(msg_ipp_stored_card_not_available);
    //            return false;
    //        }
    //    }
    //    ValidateIPPLoanCC();
    //    var isValid = $("#ipploancard_credit_card_details_form").valid();
    //    if (isValid) {
    //        isValid = $("#chkIPPLoanTermCond").prop('checked');
    //        if (!isValid) alert(msg_accept_tc);
    //    }
    //    if (isValid) {
    //        ShowLoadingDialog();
    //        $.ajax({
    //            type: "POST",
    //            url: "AcceptIPPLoanCard",
    //            data: $('#ipploancard_credit_card_details_form').serialize(),
    //            success: function (msg) {
    //                if (msg.encrypted_payment_request != "") {
    //                    $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
    //                    $("#newCCprocessForm").attr('action', msg.processUrl);
    //                    $("#newCCprocessForm").submit();
    //                } else {
    //                    //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
    //                    window.location.href = "CCResult";
    //                }
    //            },
    //            error: function () {
    //                window.location.href = "Error";
    //            }
    //        });
    //    }
    //    return false;
    //});

    $("#btnCancel_otp").click(function () {
        //alert("Cancel OTP");
        //$('.overlay').hide();
        //$("#loadingModal").hide();//toggle(100);
        // $("").style.display = "none";
        // document.getElementById("otpModal").style.display = "none";
        resetOTPValue();
        $('#submitOTPcount').val('0');
        $('.overlay').hide();
        document.getElementById("otpModal").style.display = "none";
    });

    $("#btnResendOTP").click(function () {

        //alert("Resend OTP");
        //document.getElementById("otpModal").style.display = "none";
        resetOTPValue();
        //$("#btnIPPLoanCCSubmit").click();

        $('#submitOTPcount').val('0');
        $("#resendFlag").val('Y');
        getOTPfromService(true,false);
    });

    $("#btnIPPLoanCCSubmit").click(function () {

        if ($('#ipploancard_stored_card_match').val() == "N")//Blank= non storedcard, Y=match,N=no match
        {
            if ($('#ipploancard_is_stored_card_payment').val() == "True") {
                alert(msg_ipp_stored_card_not_available);
                return false;
            }
        }
        ValidateIPPLoanCC();
        var isValid = $("#ipploancard_credit_card_details_form").valid();
        if (isValid) {
            isValid = $("#chkIPPLoanTermCond").prop('checked');
            if (!isValid) alert(msg_accept_tc);
        }
        //check OTP
        if (isValid)
        {
            ShowLoadingDialog();
            getOTPfromService(isValid, true);

            //ShowLoadingDialog();
            // //$('.overlay').show();
            // $.ajax({
            //     type: "POST",
            //     url: "CheckOTPForm",
            //     data: $('#ipploancard_credit_card_details_form').serialize(),
            //     success: function (msg) {
            //         //ShowLoadingOTPDialog();
            //        // ShowLoadingOTPDialog(msg.mid, msg.invoiceNo, msg.customerTel, msg.callcenterName, msg.callcenterTel);
            //         if (msg.encrypted_auth_response != "") {
            //             //if (msg.res != "99") {
            //                 $('.overlay').hide();
            //                 //ShowLoadingOTPDialog((mid, invoiceNo, customerTel, callcenterName, callcenterTel);
            //                 $('#mid').val(msg.mid);
            //                 $('#opt_RefNo').text(msg.refNo);
            //                 $('#refNo').val(msg.refNo);
            //                 $('#uniqueId').val(msg.uniqueId);
            //                 $('#transactionId').val(msg.transactionId);
            //                 //  alert(msg.transactionId);
            //                 $('#orderNo').val(msg.invoiceNo);
            //                 //$(eid).text(error.text())
            //                 // alert(msg.mid);
            //                 $('#opt_txnDate').text(msg.txnDate);
            //                 $('#opt_CardNo').text(msg.cardNo);
            //                 $('#opt_CustomerTel').text(msg.customerTel);
            //                 $('#customerTel').val(msg.customerTel);
            //                 $('#opt_callCenterName').text(msg.callcenterName);
            //                 $('#callcenterName').val(msg.callcenterName);
            //                 $('#opt_callCenterTel').text(msg.callcenterTel);
            //                 $('#callcenterTel').val(msg.callcenterTel);
            //                 document.getElementById("loadingModal").style.display = "none";
            //                 ShowLoadingOTPDialog();
            //             //}
            //             //return true;
            //         }
            //         else {
            //             window.location.href = "CCResult";
            //         }
            //     },
            //     error: function () {
            //         window.location.href = "Error";
            //     }
            // });
        }
        return false;
    });

    function resetOTPValue()
    {
        //alert("ResetOTPValue");
        ////document.getElementById("otpValue").innerText = "";
        $("#otpValue").val("");
        $("#otpValue").text("");
        $("#otpValue").removeClass("error");
        $("#otpValue").removeClass("valid");
        $("#err_otpValue").text("");
        $("#errorOTP").text("");
        $("#btnVerifyOTPSubmit").removeAttr("disabled");
        $("#resendFlag").val('Y');
        var validator = $("#otp_form").validate();
        if (validator !== undefined) {
            validator.resetForm();
        }

        $('.text-error').text("");
        ////document.getElementById("err_otpValue").innerText = "";

    }

    function getOTPfromService(isValid, isFirstTime)
    {
        //if (isValid) {

        //$('.overlay').show();
        $.ajax({
            type: "POST",
            url: "CheckOTPForm",
            data: $('#ipploancard_credit_card_details_form').serialize(),
            success: function (msg) {
                //ShowLoadingOTPDialog();
                // ShowLoadingOTPDialog(msg.mid, msg.invoiceNo, msg.customerTel, msg.callcenterName, msg.callcenterTel);
                if (msg.encrypted_auth_response != "") {
                    //if (msg.res != "99") {
                    //$('.overlay').hide();
                    //ShowLoadingOTPDialog((mid, invoiceNo, customerTel, callcenterName, callcenterTel);

                    //$('#mid').val(msg.mid);
                    //$('#refNo').val(msg.refNo);
                    //$('#uniqueId').val(msg.uniqueId);
                    //$('#transactionId').val(msg.transactionId);
                    //  alert(msg.transactionId);
                    // $('#orderNo').val(msg.invoiceNo);

                    //$(eid).text(error.text())
                    // alert(msg.mid);
                    $('#opt_RefNo').text(msg.refNo);
                    $('#opt_txnDate').text(msg.txnDate);
                    $('#opt_CardNo').text(msg.cardNo);

                    $('#opt_CustomerTel').text(msg.customerTel);
                    $('#customerTel').val(msg.customerTel);

                    $('#opt_callCenterName').text(msg.callcenterName);
                    $('#callcenterName').val(msg.callcenterName);

                    $('#opt_callCenterTel').text(msg.callcenterTel);
                    $('#callcenterTel').val(msg.callcenterTel);

                    document.getElementById("loadingModal").style.display = "none";

                    if (isFirstTime) {
                        $("#resendFlag").val('N');
                        ShowLoadingOTPDialog();
                    }
                    else {
                        $('#submitOTPcount').val(0);
                        $("#resendFlag").val('Y');
                    }
                    //}

                    //return true;
                }
                else {

                    window.location.href = "CCResult";
                    //window.location.href = "Error";
                }
            },
            error: function () {
                window.location.href = "Error";
            }
        });
        // }
    }

    //Verify OTP
    $("#btnVerifyOTPSubmit").click(function () {
        var isValid = true;

        //var isValid = $("#otp_form").valid();
        //if (isValid) {
        //    isValid = $("#chkIPPLoanTermCond").prop('checked');
        //    if (!isValid) alert(msg_accept_tc);
        //}

        var isValid = $("#otpValue").valid();


        if (isValid) {
            ShowLoadingDialog();
            $("#btnVerifyOTPSubmit").attr("disabled", "disabled");
            $.ajax({
                type: "POST",
                url: "VerifyOTP",
                data: $('#otp_form').serialize(),
                success: function (msg) {
                    $("#submitOTPcount").val(msg.totalSubmitOTP);
                    var maxtry = $("#submitOTPcount").val();
                    var configMaxtry=  $("#maxOTPcount").val();
                    //alert(maxtry);
                    //alert(configMaxtry);
                    $("#resendFlag").val('N');
                    //alert("resendFlag " + $("#resendFlag").val());
                    //alert(msg.verifiedOTP);
                    //ShowLoadingOTPDialog();
                    // ShowLoadingOTPDialog(msg.mid, msg.invoiceNo, msg.customerTel, msg.callcenterName, msg.callcenterTel);
                    if (maxtry >= configMaxtry) {
                        $("#errorOTP").text('Maximum Retry');
                        //$("#btnVerifyOTPSubmit").attr("disabled","disabled");
                        //after 3 times try, if still want to show OTP dialog box, the below statement should be delete. ( no need to redirect to CC Result)
                        window.location.href = "CCResult";
                    }
                    else {
                        HideLoadingOTPDialog();
                        $("#btnVerifyOTPSubmit").removeAttr("disabled");

                        if (msg.verifiedOTP == "Y") {
                            document.getElementById("otpModal").style.display = "none";
                            //ShowLoadingOTPDialog((mid, invoiceNo, customerTel, callcenterName, callcenterTel);
                            //ShowLoadingOTPDialog();
                            ShowLoadingDialog();
                            $.ajax({
                                type: "POST",
                                url: "AcceptIPPLoanCard",
                                data: $('#ipploancard_credit_card_details_form').serialize(),
                                success: function (msg) {
                                    if (msg.encrypted_payment_request != "") {

                                        $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                                        $("#newCCprocessForm").attr('action', msg.processUrl);
                                        $("#newCCprocessForm").submit();

                                    } else {
                                        //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                                        window.location.href = "CCResult";
                                    }
                                },
                                error: function () {
                                    window.location.href = "Error";
                                }
                            });
                        }
                        else {
                            //$("#errorOTP").text(msg.result_desc);
                            if (msg.result == "-3") { //return value from AYCAP OTP service

                                $("#errorOTP").text(msg.result_desc);
                                //$("#errorOTP").text('Sorry, we do not recognize the One-Time PIN. You may have entered an invalid/expired OTP. Please input your OTP again.');
                            }
                            else {
                                $("#errorOTP").text('Unable to authenticate OTP');
                            }

                            $("#otpValue").val("");
                            var validator = $("#otp_form").validate();
                            if (validator !== undefined) {
                                validator.resetForm();
                            }
                        }
                    }

                },
                error: function () {
                    window.location.href = "Error";
                }
            });
        }
        return false;
    });

    //For storedcard update
    $("#useAnotherCard,#ipp_useAnotherCard,#ipploan_useAnotherCard,#kbz_useAnotherCard").click(function () {
        $("#is_stored_card_payment").val('False');
        $("#ipp_is_stored_card_payment").val('False');
        $("#ipploan_is_stored_card_payment").val('False'); //AYCAP
        $("#kbz_is_stored_card_payment").val('False'); //KBZ

        resetCardData();
        resetIPPData();
        resetIPPLoanData();//AYCAP
        resetKBZData(); //KBZ
        $("#credit_card_number").removeAttr("disabled");
        $("#ipp_credit_card_number").removeAttr("disabled");
        $("#ipploan_credit_card_number").removeAttr("disabled");//AYCAP
        $("#kbz_credit_card_number").removeAttr("disabled");//KBZ

        $("#credit_card_holder_name").css('display', 'inline-block');
        $("#ipp_credit_card_holder_name").css('display', 'inline-block');
        $("#ipploan_credit_card_holder_name").css('display', 'inline-block');//AYCAP
        $("#kbz_credit_card_holder_name").css('display', 'inline-block');//KBZ

        $("#credit_card_expiry_month option:first").text('').attr("selected", "selected");
        $("#credit_card_expiry_month").removeAttr("disabled");
        $("#ipp_credit_card_expiry_month option:first").text('').attr("selected", "selected");
        $("#ipp_credit_card_expiry_month").removeAttr("disabled");
        $("#ipploan_credit_card_expiry_month option:first").text('').attr("selected", "selected");//AYCAP
        $("#ipploan_credit_card_expiry_month").removeAttr("disabled");//AYCAP
        $("#kbz_credit_card_expiry_month option:first").text('').attr("selected", "selected");//KBZ
        $("#kbz_credit_card_expiry_month").removeAttr("disabled");//KBZ

        $("#credit_card_expiry_year option:first").text('').attr("selected", "selected").removeAttr("disabled");
        $("#credit_card_expiry_year").removeAttr("disabled");
        $("#ipp_credit_card_expiry_year option:first").text('').attr("selected", "selected").removeAttr("disabled");
        $("#ipp_credit_card_expiry_year").removeAttr("disabled");
        $("#ipploan_credit_card_expiry_year option:first").text('').attr("selected", "selected").removeAttr("disabled");//AYCAP
        $("#ipploan_credit_card_expiry_year").removeAttr("disabled");//AYCAP
        $("#kbz_credit_card_expiry_year option:first").text('').attr("selected", "selected").removeAttr("disabled");//KBZ
        $("#kbz_credit_card_expiry_year").removeAttr("disabled");//KBZ

        //$("#credit_card_issuing_bank_country option:first").text(lbl_issuing_country).attr("selected", "selected").removeAttr("disabled");
        $("#trIssuingBank").css('display', 'inline-block');
        $("#trCardExpiryDate").css('display', 'inline-block');

        $("#credit_card_issuing_bank_country").css('display', 'inline-block');
        $("#credit_card_issuing_bank_name").css('display', 'inline-block');
        $("#credit_card_expiry_month").css('display', 'inline-block');
        $("#credit_card_expiry_year").css('display', 'inline-block');
        $("#useAnotherCard").css('display', 'none');
        $("#ipp_useAnotherCard").css('display', 'none');
        $("#ipploan_useAnotherCard").css('display', 'none'); //AYCAP
        $("#kbz_useAnotherCard").css('display', 'none'); //KBZ

        $("#lbl_save_card").css('display', 'block');
        $("#lbl_ipp_save_card").css('display', 'block');
        $("#lbl_ipploan_save_card").css('display', 'block'); //AYCAP
        $("#lbl_kbz_save_card").css('display', 'block'); //KBZ

        $('#btnIPPCCSubmit').css('display', 'inline');
        $('#btnIPPLoanCCSubmit').css('display', 'inline');//AYCAP
        $('#btnKBZCCSubmit').css('display', 'inline');//KBZ

        $('#ippNotAllowedStoredCard').css('display', 'none');
        $('#ipploanNotAllowedStoredCard').css('display', 'none'); //AYCAP
        $('#kbzNotAllowedStoredCard').css('display', 'none'); //KBZ

        $("#credit_card_issuing_bank_country").change();
        $('#tdCVV').removeClass("row-fluid");
        $('#tdCVV').addClass("span6");

        $("#trippCardExpiryDate").css('display', 'inline-block');
        $("#ipp_credit_card_expiry_month").css('display', 'inline-block');
        $("#ipp_credit_card_expiry_year").css('display', 'inline-block');
        $('#tdippCVV').removeClass("row-fluid");
        $('#tdippCVV').addClass("span6");

        //AYCAP -- Start
        $("#tripploanCardExpiryDate").css('display', 'inline-block');
        $("#ipploan_credit_card_expiry_month").css('display', 'inline-block');
        $("#ipploan_credit_card_expiry_year").css('display', 'inline-block');
        $('#tdipploanCVV').removeClass("row-fluid");
        $('#tdipploanCVV').addClass("span6");
        //AYCAP -- End

        //KBZ -- Start
        $("#trkbzCardExpiryDate").css('display', 'inline-block');
        $("#kbz_credit_card_expiry_month").css('display', 'inline-block');
        $("#kbz_credit_card_expiry_year").css('display', 'inline-block');
        $('#tdkbzCVV').removeClass("row-fluid");
        $('#tdkbzCVV').addClass("span6");
        //KBZ -- End

    });
    //End storedcard update
    function ValidateCC() {
        var require_cvv = true;
        try {
            if (document.getElementById('require_cvv').value == "N") {
                require_cvv = false;
            }
        }
        catch (err) {
            require_cvv = false;
        }

        var require_email = false;
        try {
            if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                require_email = true;
            }
        }
        catch (err) {
            require_email = false;
        }

        $("#credit_card_details_form").validate({
            rules: {
                credit_card_number: {
                    required: true,
                    creditcard: true,
                    ccbinvalid:true,
                    ccvalid: true,
                    ccVerifyPromotion: true
                    //customccvalidator: true
                },
                credit_card_holder_name: {
                    required: true,
                    // maxlength: 50
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                credit_card_expiry_month: {
                    required: true,
                    cardExpiryMonth: true
                },
                credit_card_expiry_year: {
                    required: true,
                    cardExpiryYear: true
                },
                credit_card_cvv: {
                    //required: true,
                    required: require_cvv,
                    digits: true,
                    minlength: 3,
                    maxlength: 4
                },
                credit_card_issuing_bank_country: {
                    required: true
                },
                credit_card_issuing_bank_name: {
                    required: true,
                    maxlength: 100,
                    BanknameRegEx: /^.*?(?=[\^#@%&$\*`~!:;<>\?/\{\|\}\^\)\(]).*$/,
                    BanknameValidateRegEx: /^[-_,'.A-Za-z0-9& ]{1,100}$/
                },
                cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }
            },
            groups: {
                credit_card_expiry_month: "credit_card_expiry_month credit_card_expiry_year"
            },
            messages: {
                "credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required,
                    ccVerifyPromotion: msg_card_payment_invalid

                },
                "credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "credit_card_cvv": {
                    required: msg_cvv_required,
                    minlength: msg_cvv_length_invalid
                },
                "credit_card_issuing_bank_country": {
                    required: msg_issuing_country_required
                },
                "credit_card_issuing_bank_name": {
                    required: msg_issuing_bank_required
                },
                "cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "credit_card_cvv") {
                    error.insertAfter($("#help-inline"));
                } else if (element.attr("id") == "credit_card_expiry_month" || element.attr("id") == "credit_card_expiry_year") {
                    //error.appendTo($(".span1 .form-inline"));

                    error.insertAfter($("#credit_card_expiry_year"));
                    //error.addClass("mobile-error");
                    eid = "#err_credit_card_expiry";
                    //} //else if (element.attr("id") == "credit_card_cvv") {
                    //do something here
                }
                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());


            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                if (forid == "credit_card_expiry_month" || forid == "credit_card_expiry_year") {
                    eid = "err_credit_card_expiry";
                }
                $(eid).text("");
            }
        });
    }

    function ValidateKBZCC() {

        var require_email = false;
        try {
            if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                require_email = true;
            }
        }
        catch (err) {
            require_email = false;
        }

        $("#KBZ_credit_card_details_form").validate({
            rules: {
                kbz_credit_card_number: {
                    required: true,
                    digits: true,
                    creditcard: true,
                    validKBZBIN: true
                },
                kbz_credit_card_holder_name: {
                    required: true,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                kbz_credit_card_expiry_month: {
                    required: true,
                    kbzCardExpiryMonth: true
                },
                kbz_credit_card_expiry_year: {
                    required: true,
                    kbzCardExpiryYear: true
                },
                kbz_credit_card_pin: {
                    required: true,
                    digits: true,
                    minlength: 3,
                    maxlength: 6
                },
                kbz_cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }
            },
            groups: {
                kbz_credit_card_expiry_month: "kbz_credit_card_expiry_month kbz_credit_card_expiry_year"
            },
            messages: {
                "kbz_credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required
                },
                "kbz_credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "kbz_credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "kbz_credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "kbz_credit_card_pin": {
                    required: msg_pin_required,
                    minlength: msg_pin_length_invalid
                },
                "kbz_cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
                }
            },
            showErrors: function (errorMap, errorList) {
                for (var i = 0; errorList[i]; i++) {
                    var element = this.errorList[i].element;
                    this.errorsFor(element).remove();
                }
                this.defaultShowErrors();
            },
            errorPlacement: function (error, element) {
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "kbz_credit_card_pin") {
                    error.insertAfter($("#help-inline"));
                } else if (element.attr("id") == "kbz_credit_card_expiry_month" || element.attr("id") == "kbz_credit_card_expiry_year") {
                    error.insertAfter($("#kbz_credit_card_expiry_year"));
                    eid = "#err_kbz_credit_card_expiry";
                }
                else {
                    error.insertAfter(element);
                }
                $(eid).text(error.text());
            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                if (forid == "kbz_credit_card_expiry_month" || forid == "kbz_credit_card_expiry_year") {
                    eid = "err_kbz_credit_card_expiry";
                }
                $(eid).text("");
            }
        });
    }

    function Validate123Bank() {
        $("#pay_123bank_form").validate({
            rules: {
                bank_code: {
                    required: true
                    //cardholderRegEx: /^[0-9]{1,50}$/
                },
                bank_channel: {
                    required: true
                },
                channel_code: {
                    required: true
                },
                bank_mobile_number: {
                    required: true,
                    mobileRegEx: /^[0-9]{1,20}$/
                },
                bank_payer_name: {
                    required: true,
                    maxlength: 50,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                },
                bank_email_address: {
                    required: true,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                }
            },
            messages: {
                "bank_code": {
                    required: "Please select bank by clicking icon."
                },
                "bank_channel": {
                    required: msg_channel_required
                },
                "channel_code": {
                    required: msg_channel_required
                },
                "bank_mobile_number": {
                    required: msg_mobile_required
                    //creditcard: msg_cardno_required

                },
                "bank_payer_name": {
                    required: msg_payer_required,
                    maxlength: msg_payer_length_invalid,
                    cardholderRegEx: msg_payer_invalid

                },
                "bank_email_address": {
                    required: msg_email_required

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
                error.insertAfter(element);
                var eid = "#err_" + element.attr("id");
                $(eid).text(error.text());

            },
            success: function (label) {
                if (label.attr('for') != "bank_code") {
                    label.addClass("valid").text("")
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");

            }
        });
    }

    function Validate123Form(type) {
        var err_id_append = "";
        var formid = "#pay_123_form";
        if (type == "kiosk") {
            err_id_append = "kiosk_";
            formid = "#pay_kiosk_form";
        }
        $(formid).validate({
            rules: {
                agent_code: {
                    required: true
                    //cardholderRegEx: /^[0-9]{1,50}$/
                },
                mobile_number: {
                    required: true,
                    mobileRegEx: /^[0-9]{1,20}$/
                },
                payer_name: {
                    required: true,
                    maxlength: 50,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                },
                email_address: {
                    required: true,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                }
            },
            messages: {
                "agent_code": {
                    required: msg_agent_required
                },
                "mobile_number": {
                    required: msg_mobile_required
                    //creditcard: msg_cardno_required

                },
                "payer_name": {
                    required: msg_payer_required,
                    maxlength: msg_payer_length_invalid,
                    cardholderRegEx: msg_payer_invalid

                },
                "email_address": {
                    required: msg_email_required

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
                error.insertAfter(element);
                var eid = "#err_" + element.attr("id");
                $(eid).text(error.text());

            },
            success: function (label) {
                if (label.attr('for') != "agent_code") {
                    label.addClass("valid").text("")
                }
                if (label.attr('for') != "kiosk_code") {
                    label.addClass("valid").text("")
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");
            }
        });
    }


    function ValidateIPPCC() {
        var require_cvv = true;
        try {
            if (document.getElementById('require_cvv').value == "N") {
                require_cvv = false;
            }
        }
        catch (err) {
            require_cvv = false;
        }

        var require_email = false;
        try {
            if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                require_email = true;
            }
        }
        catch (err) {
            require_email = false;
        }

        $("#ipp_credit_card_details_form").validate({
            rules: {
                ipp_credit_card_number: {
                    required: true,
                    creditcard: true,
                    ipp_ccvalid: true,
                    ipp_ccVerifyPromotion :true,
                    validBIN: true
                },
                ipp_credit_card_holder_name: {
                    required: true,
                    // maxlength: 50
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/
                },
                ipp_credit_card_expiry_month: {
                    required: true,
                    ippcardExpiryMonth: true
                },
                ipp_credit_card_expiry_year: {
                    required: true,
                    ippcardExpiryYear: true
                },
                ipp_credit_card_cvv: {
                    //required: true,
                    required: require_cvv,
                    digits: true,
                    minlength: 3,
                    maxlength: 4
                },
                ipp_cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }
            },
            groups: {
                ipp_credit_card_expiry_month: "ipp_credit_card_expiry_month ipp_credit_card_expiry_year"
            },
            messages: {
                "ipp_credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required

                },
                "ipp_credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "ipp_credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "ipp_credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "ipp_credit_card_cvv": {
                    required: msg_cvv_required,
                    minlength: msg_cvv_length_invalid
                },
                "ipp_cardholder_email": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "ipp_credit_card_cvv") {
                    error.insertAfter($("#help-inline-ipp"));
                } else if (element.attr("id") == "ipp_credit_card_expiry_month" || element.attr("id") == "ipp_credit_card_expiry_year") {
                    //error.insertAfter($("#ipp_credit_card_expiry_year"));
                    //error.appendTo(element.next("label"));
                    //error.insertAfter($("#ipp_credit_card_expiry_year"));
                    error.remove();
                    eid = "#err_ipp_credit_card_expiry";
                }
                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());


            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                if (forid == "ipp_credit_card_expiry_month" || forid == "ipp_credit_card_expiry_year") {
                    eid = "err_ipp_credit_card_expiry";
                }
                $(eid).text("");
            }
        });
    }

    //AYCAP
    function ValidateIPPLoanCC() {
        var require_cvv = false; //For Loan, cvv is not required
        //var require_cvv = true;
        //try {
        //    if (document.getElementById('require_cvv').value == "N") {
        //        require_cvv = false;
        //    }
        //}
        //catch (err) {
        //    require_cvv = false;
        //}

        var require_email = false;
        try {
            if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                require_email = true;
            }
        }
        catch (err) {
            require_email = false;
        }

        $("#ipploancard_credit_card_details_form").validate({
            rules: {
                ipploan_credit_card_number: {
                    required: true,
                    //creditcard: true, //no need to check for cardNo with Luhn algorithm
                    ipploan_ccvalid: true,
                    ipploan_ccVerifyPromotion: true,
                    validBINloancard: true
                },
                ipploan_credit_card_holder_name: {
                    required: true,
                    // maxlength: 50
                    cardholderRegEx: /^[-_,'.A-Za-z& ]{1,50}$/
                },
                ipploan_credit_card_expiry_month: {
                    required: true,
                    ipploancardExpiryMonth: true
                },
                ipploan_credit_card_expiry_year: {
                    required: true,
                    ipploancardExpiryYear: true
                },
                ipploan_credit_card_cvv: {
                    //required: true,
                    required: require_cvv,
                    digits: true,
                    minlength: 3,
                    maxlength: 4
                },
                ipploan_cardholder_email: {
                    required: require_email,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    maxlength: 50
                }
            },
            groups: {
                ipploan_credit_card_expiry_month: "ipploan_credit_card_expiry_month ipploan_credit_card_expiry_year"
            },
            messages: {
                "ipploan_credit_card_number": {
                    required: msg_cardno_required,
                    creditcard: msg_cardno_required

                },
                "ipploan_credit_card_holder_name": {
                    required: msg_cardholder_required

                },
                "ipploan_credit_card_expiry_month": {
                    required: msg_expiry_mm_required

                },
                "ipploan_credit_card_expiry_year": {
                    required: msg_expiry_yy_required

                },
                "ipploan_credit_card_cvv": {
                    required: msg_cvv_required,
                    minlength: msg_cvv_length_invalid
                },
                "ipploan_credit_card_cvv": {
                    required: msg_email_required,
                    EmailRegEx: msg_email_invalid
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
                var eid = "#err_" + element.attr("id");
                if (element.attr("id") == "ipploan_credit_card_cvv") {
                    error.insertAfter($("#help-inline-ipploan"));
                } else if (element.attr("id") == "ipploan_credit_card_expiry_month" || element.attr("id") == "ipploan_credit_card_expiry_year") {
                    //error.insertAfter($("#ipp_credit_card_expiry_year"));
                    //error.appendTo(element.next("label"));
                    //error.insertAfter($("#ipp_credit_card_expiry_year"));
                    error.remove();
                    eid = "#err_ipploan_credit_card_expiry";
                }
                else {
                    error.insertAfter(element);
                }

                $(eid).text(error.text());


            },
            success: function (label) {
                var forid = label.attr('for');
                label.addClass("valid").text("");
                var eid = "#err_" + forid;
                if (forid == "ipploan_credit_card_expiry_month" || forid == "ipploan_credit_card_expiry_year") {
                    eid = "err_ipploan_credit_card_expiry";
                }
                $(eid).text("");
            }
        });
    }


    /*
       function validateWechatDetailForm(formid)
        {
           var require_email = false;
           try {
               if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                   require_email = true;
               }
           }
           catch (err) {
               require_email = false;
           }
           $(formid).validate({
               rules: {
                   wechat_wallet_code: {
                       required: true
                   },
                   wallet_mobile_number: {
                       required: true,
                       mobileRegEx: /^[0-9]{1,20}$/
                   },
                   wallet_payer_name: {
                       required: false,
                       maxlength: 50,
                       cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                   },
                   wallet_email_address: {
                       required: require_email,
                       EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                   }
               },
               messages: {
                   "wallet_code": {
                       required: msg_agent_required
                   },
                   "wallet_mobile_number": {
                       required: msg_mobile_required

                   },
                   "wallet_payer_name": {
                       required: msg_payer_required,
                       maxlength: msg_payer_length_invalid,
                       cardholderRegEx: msg_payer_invalid

                   },
                   "wallet_email_address": {
                       required: msg_email_required

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
                   error.insertAfter(element);
                   var eid = "#err_" + element.attr("id");
                   $(eid).text(error.text());

               },
               success: function (label) {
                   if (label.attr('for') != "wechat_wallet_code") {
                       label.addClass("valid").text("")
                   }
                   var eid = "#err_" + label.attr('for');
                   $(eid).text("");
               }
           });
       }

       function validateAlipayDetailForm(formid) {
           var require_email = false;
           try {
               if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                   require_email = true;
               }
           }
           catch (err) {
               require_email = false;
           }
           $(formid).validate({
               rules: {
                   alipay_wallet_code: {
                       required: true
                   },
                   wallet_mobile_number: {
                       required: false,
                       mobileRegEx: /^[0-9]{1,20}$/
                   },
                   wallet_payer_name: {
                       required: true,
                       maxlength: 50,
                       cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                   },
                   wallet_email_address: {
                       required: require_email,
                       EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                   }
               },
               messages: {
                   "alipay_wallet_code": {
                       required: msg_agent_required
                   },
                   "wallet_mobile_number": {
                       required: msg_mobile_required

                   },
                   "wallet_payer_name": {
                       required: msg_payer_required,
                       maxlength: msg_payer_length_invalid,
                       cardholderRegEx: msg_payer_invalid

                   },
                   "wallet_email_address": {
                       required: msg_email_required

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
                   error.insertAfter(element);
                   var eid = "#err_" + element.attr("id");
                   $(eid).text(error.text());

               },
               success: function (label) {
                   if (label.attr('for') != "alipay_wallet_code") {
                       label.addClass("valid").text("")
                   }
                   var eid = "#err_" + label.attr('for');
                   $(eid).text("");
               }
           });
       }

       function validatepaypalDetailForm(formid) {
           var require_email = false;
           try {
               if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                   require_email = true;
               }
           }
           catch (err) {
               require_email = false;
           }
           $(formid).validate({
               rules: {
                   wallet_code: {
                       required: true
                   },
                   wallet_mobile_number: {
                       required: false,
                       mobileRegEx: /^[0-9]{1,20}$/
                   },
                   wallet_payer_name: {
                       required: true,
                       maxlength: 50,
                       cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                   },
                   wallet_email_address: {
                       required: require_email,
                       EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                   }
               },
               messages: {
                   "wallet_code": {
                       required: msg_agent_required
                   },
                   "wallet_mobile_number": {
                       required: msg_mobile_required

                   },
                   "wallet_payer_name": {
                       required: msg_payer_required,
                       maxlength: msg_payer_length_invalid,
                       cardholderRegEx: msg_payer_invalid

                   },
                   "wallet_email_address": {
                       required: msg_email_required

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
                   error.insertAfter(element);
                   var eid = "#err_" + element.attr("id");
                   $(eid).text(error.text());

               },
               success: function (label) {
                   if (label.attr('for') != "paypal_wallet_code") {
                       label.addClass("valid").text("")
                   }
                   var eid = "#err_" + label.attr('for');
                   $(eid).text("");
               }
           });
       }

       function validategashDetailForm(formid) {
           var require_email = false;
           try {
               if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                   require_email = true;
               }
           }
           catch (err) {
               require_email = false;
           }
           $(formid).validate({
               rules: {
                   wallet_code: {
                       required: true
                   },
                   wallet_mobile_number: {
                       required: false,
                       mobileRegEx: /^[0-9]{1,20}$/
                   },
                   wallet_payer_name: {
                       required: true,
                       maxlength: 50,
                       cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                   },
                   wallet_email_address: {
                       required: require_email,
                       EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                   }
               },
               messages: {
                   "wallet_code": {
                       required: msg_agent_required
                   },
                   "wallet_mobile_number": {
                       required: msg_mobile_required

                   },
                   "wallet_payer_name": {
                       required: msg_payer_required,
                       maxlength: msg_payer_length_invalid,
                       cardholderRegEx: msg_payer_invalid

                   },
                   "wallet_email_address": {
                       required: msg_email_required

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
                   error.insertAfter(element);
                   var eid = "#err_" + element.attr("id");
                   $(eid).text(error.text());

               },
               success: function (label) {
                   if (label.attr('for') != "gcash_wallet_code") {
                       label.addClass("valid").text("")
                   }
                   var eid = "#err_" + label.attr('for');
                   $(eid).text("");
               }
           });
       }

       function validatelineDetailForm(formid) {
           var require_email = false;
           try {
               if ($('#require_email').length > 0 && $('#require_email').val() == "R") {
                   require_email = true;
               }
           }
           catch (err) {
               require_email = false;
           }
           $(formid).validate({
               rules: {
                   wallet_code: {
                       required: true
                   },
                   wallet_mobile_number: {
                       required: false,
                       mobileRegEx: /^[0-9]{1,20}$/
                   },
                   wallet_payer_name: {
                       required: true,
                       maxlength: 50,
                       cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                   },
                   wallet_email_address: {
                       required: require_email,
                       EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                   }
               },
               messages: {
                   "wallet_code": {
                       required: msg_agent_required
                   },
                   "wallet_mobile_number": {
                       required: msg_mobile_required

                   },
                   "wallet_payer_name": {
                       required: msg_payer_required,
                       maxlength: msg_payer_length_invalid,
                       cardholderRegEx: msg_payer_invalid

                   },
                   "wallet_email_address": {
                       required: msg_email_required

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
                   error.insertAfter(element);
                   var eid = "#err_" + element.attr("id");
                   $(eid).text(error.text());

               },
               success: function (label) {
                   if (label.attr('for') != "line_wallet_code") {
                       label.addClass("valid").text("")
                   }
                   var eid = "#err_" + label.attr('for');
                   $(eid).text("");
               }
           });
       }
    */
    function Validate123Form(type) {
        var err_id_append = "";
        var formid = "#pay_123_form";
        if (type == "kiosk") {
            err_id_append = "kiosk_";
            formid = "#pay_kiosk_form";
        }
        $(formid).validate({
            rules: {
                agent_code: {
                    required: true
                    //cardholderRegEx: /^[0-9]{1,50}$/
                },
                mobile_number: {
                    required: true,
                    mobileRegEx: /^[0-9]{1,20}$/
                },
                payer_name: {
                    required: true,
                    maxlength: 50,
                    cardholderRegEx: /^[-_,'.A-Za-z ]{1,50}$/

                },
                email_address: {
                    required: true,
                    EmailRegEx: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                }
            },
            messages: {
                "agent_code": {
                    required: msg_agent_required
                },
                "mobile_number": {
                    required: msg_mobile_required
                    //creditcard: msg_cardno_required

                },
                "payer_name": {
                    required: msg_payer_required,
                    maxlength: msg_payer_length_invalid,
                    cardholderRegEx: msg_payer_invalid

                },
                "email_address": {
                    required: msg_email_required

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
                error.insertAfter(element);
                var eid = "#err_" + element.attr("id");
                $(eid).text(error.text());

            },
            success: function (label) {
                if (label.attr('for') != "agent_code") {
                    label.addClass("valid").text("")
                }
                if (label.attr('for') != "kiosk_code") {
                    label.addClass("valid").text("")
                }
                var eid = "#err_" + label.attr('for');
                $(eid).text("");
            }
        });
    }

    function resetCardData() {
        $("#credit_card_number").val("");
        $("#credit_card_number").removeClass("error");
        $("#credit_card_holder_name").val("");
        $("#credit_card_holder_name").removeClass("error");
        $("#credit_card_expiry_month").val("");
        $("#credit_card_expiry_month").removeClass("error");
        $("#credit_card_expiry_year").val("");
        $("#credit_card_expiry_year").removeClass("error");
        $("#credit_card_cvv").val("");
        $("#credit_card_cvv").removeClass("error");
        $("#credit_card_issuing_bank_country").val("");
        $("#credit_card_issuing_bank_country").removeClass("error");
        $("#credit_card_issuing_bank_name").val("");
        $("#credit_card_issuing_bank_name").removeClass("error");

        var validator = $("#ipp_credit_card_details_form").validate();
        if (validator !== undefined) {
            validator.resetForm();
        }

        $('.text-error').text("");
        $(".cardtype").removeClass("on");
        $(".cardtype").addClass("off");
    }

    function resetIPPData() {
        $("#ipp_credit_card_number").val("");
        $("#ipp_credit_card_holder_name").val("");
        $("#ipp_credit_card_expiry_month").val("");
        $("#ipp_credit_card_expiry_year").val("");
        $("#ipp_credit_card_cvv").val("");
        $("#ipp_credit_card_number").removeClass("error");
        $("#ipp_credit_card_holder_name").removeClass("error");
        $("#ipp_credit_card_expiry_month").removeClass("error");
        $("#ipp_credit_card_expiry_year").removeClass("error");
        $("#ipp_credit_card_cvv").removeClass("valid");

        var validator = $("#ipp_credit_card_details_form").validate();
        if (validator !== undefined) {
            validator.resetForm();
        }

        $('.text-error').text("");
        $(".cardtype").removeClass("on");
        $(".cardtype").addClass("off");

    }

    //AYCAP
    function resetIPPLoanData() {

        $("#ipploan_credit_card_number").val("");
        $("#ipploan_credit_card_holder_name").val("");
        $("#ipploan_credit_card_expiry_month").val("");
        $("#ipploan_credit_card_expiry_year").val("");
        $("#ipploan_credit_card_cvv").val("");
        $("#ipploan_credit_card_number").removeClass("error");
        $("#ipploan_credit_card_holder_name").removeClass("error");
        $("#ipploan_credit_card_expiry_month").removeClass("error");
        $("#ipploan_credit_card_expiry_year").removeClass("error");
        $("#ipploan_credit_card_cvv").removeClass("valid");

        var validator = $("#ipploancard_credit_card_details_form").validate();
        if (validator !== undefined) {
            validator.resetForm();
        }

        $('.text-error').text("");
        $(".cardtype").removeClass("on");
        $(".cardtype").addClass("off");
    }
    //KBZ
    function resetKBZData() {
        $("#kbz_credit_card_number").val("");
        $("#kbz_credit_card_holder_name").val("");
        $("#kbz_credit_card_expiry_month").val("");
        $("#kbz_credit_card_expiry_year").val("");
        $("#kbz_credit_card_pin").val("");
        $("#kbz_credit_card_number").removeClass("error");
        $("#kbz_credit_card_holder_name").removeClass("error");
        $("#kbz_credit_card_expiry_month").removeClass("error");
        $("#kbz_credit_card_expiry_year").removeClass("error");
        $("#kbz_credit_card_pin").removeClass("valid");

        var validator = $("#KBZ_credit_card_details_form").validate();
        if (validator !== undefined) {
            validator.resetForm();
        }

        $('.text-error').text("");

    }

    function resetIPPLoanStoredCardData()
    {
        resetIPPLoanData();

        $("#ipploan_is_stored_card_payment").val('False'); //AYCAP
        $("#ipploan_credit_card_number").removeAttr("disabled");//AYCAP
        $("#ipploan_credit_card_holder_name").css('display', 'inline-block');//AYCAP
        $("#ipploan_credit_card_expiry_month option:first").text('').attr("selected", "selected");//AYCAP
        $("#ipploan_credit_card_expiry_month").removeAttr("disabled");//AYCAP
        $("#ipploan_credit_card_expiry_year option:first").text('').attr("selected", "selected").removeAttr("disabled");//AYCAP
        $("#ipploan_credit_card_expiry_year").removeAttr("disabled");//AYCAP
        $("#ipploan_useAnotherCard").css('display', 'none'); //AYCAP
        $("#lbl_ipploan_save_card").css('display', 'block'); //AYCAP
        $('#btnIPPLoanCCSubmit').css('display', 'inline');//AYCAP
        $('#ipploanNotAllowedStoredCard').css('display', 'none'); //AYCAP

        //AYCAP -- Start
        $("#tripploanCardExpiryDate").css('display', 'inline-block');
        $("#ipploan_credit_card_expiry_month").css('display', 'inline-block');
        $("#ipploan_credit_card_expiry_year").css('display', 'inline-block');
        $('#tdipploanCVV').removeClass("row-fluid");
        $('#tdipploanCVV').addClass("span6");
        //AYCAP -- End
    }

    $("#btnMasterPassSubmit").click(function () {
        //document.getElementById("alltabContent").style.cursor = "wait";
        ShowLoadingDialog();
        $.getJSON("GetMasterPassToken", function (result) {
            //alert(result.length);
            if (result.length > 0) {
                MasterPass.client.checkout({
                    "requestToken": result[0].requestToken,
                    "callbackUrl": result[0].cartCallbackUrl,
                    "merchantCheckoutId": result[0].checkoutIdentifier,
                    "allowedCardTypes": result[0].acceptedCards,
                    "cancelCallback": result[0].callbackDomain,
                    "suppressShippingAddressEnable": result[0].shippingSuppression,
                    "loyaltyEnabled": result[0].rewardsProgram,
                    "requestBasicCheckout": result[0].authLevelBasic,
                    "version": result[0].xmlVersion
                });

                //document.getElementById("alltabContent").style.cursor = "pointer";
                setTimeout(function () { $('.overlay').hide(); }, 3000);
                $("#loadingModal").toggle(100);

            } else {
                setTimeout(function () { $('.overlay').hide(); }, 3000);
                $("#loadingModal").toggle(100);
            }
        }).fail(function () {
            setTimeout(function(){ $('.overlay').hide(); }, 3000);
            $("#loadingModal").toggle(100);
        });
    });

    //$2c2p.ShowLoadingOTPDialog = function ShowLoadingOTPDialog(mid, invoiceNo, customerTel, callcenterName, callcenterTel) {
    function ShowLoadingOTPDialog() {
        $('.bar').width("5%");
        if (interval > 5) interval = 0;
        if ($('.overlay').length == 0) {
            $('body').append('<div class="overlay"></div>');
        }
        /*
        if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
            $('.overlay').css({
                position: 'absolute',
                top: 0,
                left: 0,
                width: '100%',
                height: '100%'//,
                //bottom: 'auto'
            });
            $('#loadingModal').css({
                position: 'absolute',
                top: 0,
                left: 0,
                bottom: 'auto'
            });
        }
        setTimeout(function () {
            $('.modal-backdrop').css({
                position: 'absolute',
                top: 0,
                left: 0,
                width: '100%',
                height: Math.max(
                    document.body.scrollHeight, document.documentElement.scrollHeight,
                    document.body.offsetHeight, document.documentElement.offsetHeight,
                    document.body.clientHeight, document.documentElement.clientHeight
                ) + 'px'
            });
        }, 0);
        */
        $('.overlay').show();
        $("#otpModal").toggle(100);


    }
    $2c2p.ShowLoadingOTPDialog = ShowLoadingOTPDialog;
    //$2c2p.ShowLoadingOTPDialog = ShowLoadingOTPDialog(mid, invoiceNo, customerTel, callcenterName, callcenterTel);

    function ShowLoadingDialog() {
        $('.bar').width("5%");
        if (interval > 5) interval = 0;
        if ($('.overlay').length == 0) {
            $('body').append('<div class="overlay"></div>');
        }
        /*
        if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
            $('.overlay').css({
                position: 'absolute',
                top: 0,
                left: 0,
                width: '100%',
                height: '100%'//,
                //bottom: 'auto'
            });
            $('#loadingModal').css({
                position: 'absolute',
                top: 0,
                left: 0,
                bottom: 'auto'
            });
        }
        setTimeout(function () {
            $('.modal-backdrop').css({
                position: 'absolute',
                top: 0,
                left: 0,
                width: '100%',
                height: Math.max(
                    document.body.scrollHeight, document.documentElement.scrollHeight,
                    document.body.offsetHeight, document.documentElement.offsetHeight,
                    document.body.clientHeight, document.documentElement.clientHeight
                ) + 'px'
            });
        }, 0);
        */
        $('.overlay').show();
        $("#loadingModal").toggle(100);
    }
    function HideLoadingDialog() {
        $('.bar').width("5%");
        if (interval > 5) interval = 0;
        if ($('.overlay').length == 0) {
            $('body').append('<div class="overlay"></div>');
        }
        $('.overlay').hide();
        $("#loadingModal").toggle(100);
    }

    function HideLoadingOTPDialog() {
        $('.bar').width("5%");
        if (interval > 5) interval = 0;
        if ($('.overlay').length == 0) {
            $('body').append('<div class="overlay"></div>');
        }
        //$('.overlay').hide();
        $("#loadingModal").toggle(100);
    }

    $2c2p.ShowLoadingDialog = ShowLoadingDialog;
    $2c2p.filterCode = function (evt, regExpression) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        var keycode = theEvent.keyCode || theEvent.which;;
        key = String.fromCharCode(key);

        if (keycode == 9 || keycode == 13 || keycode == 8) {
            //theEvent.returnValue = true;//to allow tab and enter.
        }
        else {
            var regex = new RegExp(regExpression, "g");
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    }

    $2c2p.filterNumeric = function (evt) {
        return $2c2p.filterCode(evt, "[0-9]");
    }


    $2c2p.initialQRPayment = function (merchantPaymentID, signalRUrl, qrCodeSize, logoImg) {

        //qrLoadingMsg("", true);

        log(signalRUrl);
        var JsonReq = '{\"merchantPaymentID\": ' + merchantPaymentID + '}';

        var connection = $.hubConnection(signalRUrl, { useDefaultPath: false });
        var QRHubProxy = connection.createHubProxy('QRHub');
        QRHubProxy.on('completedMerchantQRPayment', function (message) {

            log(message);

            var messageObj = JSON.parse(message);

            $("#QRCCtokenHiddenForm #stage").val(messageObj.stage);
            $("#QRCCtokenHiddenForm #authenticationToken").val(messageObj.authenticationToken);


            if (messageObj.stage == "CardReady") {
                $2c2p.submitQRpayment();
                //postBackCardInfo(message);
                log("Received Card Info, Start to Processing Payment..." + messageObj.stage);

            }
            else {
                log("Processing Payment..." + messageObj.stage);

            }

        });

        connection.start()
            .done(function () {

                log('Try connecting, connection ID=' + connection.id);
                log(JsonReq);
                QRHubProxy.invoke('startMerchantQRPayment', JsonReq).done(function (JsonRes) {

                    log('Now connected, connection ID=' + connection.id);
                    log(JsonRes);

                    var paymentInfo = JSON.parse(JsonRes);

                    if (paymentInfo.resCode == '000') {

                        var successmsg = "Please Scan QR code with Qwik to continue...";

                    }
                    else {

                        //removeQRCode();
                        var successmsg = "Qwik QR Payment Expired, Please make another payment and try again";
                    }

                    log(successmsg);
                });

            })
            .fail(function () {
                //removeQRCode();
                //qrLoadingMsg('Could not connect');

                log('Could not connect');
            });

        //qrLoadingMsg("", false);

        drawQRcode(JsonReq, qrCodeSize, logoImg);

    }

    $2c2p.submitQRpayment = function() {

        var isValid = $("#QRCCtokenHiddenForm").valid();
        if (isValid) {
            ShowLoadingDialog();
            $.ajax({
                type: "POST",
                url: "PayQwikQR",
                data: $('#QRCCtokenHiddenForm').serialize(),
                success: function (msg) {
                    if (msg.encrypted_payment_request != "") {
                        $("#newCCprocessForm #paymentRequest").val(msg.encrypted_payment_request);
                        $("#newCCprocessForm").attr('action', msg.processUrl);
                        $("#newCCprocessForm").attr('autocomplete', 'off');
                        $("#newCCprocessForm").submit();
                    } else {
                        //window.location.href = "Error?result=" + msg.result + "&result_desc=" + msg.result_desc;
                        window.location.href = "CCResult";
                    }
                },
                error: function () {
                    window.location.href = "Error";
                }
            });
        }
        return false;
    }

    function drawQRcode(text, size, logoImg) {

        var kaelBase = new KaelQrcode();
        kaelBase.init(document.getElementById("qr-base"), {
            text: text,
            size: size,
            img: {
                src: logoImg
            }
        });
    }

    $2c2p.fillCardToken = function (stage, token) {
        $("#QRCCtokenHiddenForm #stage").val(stage);
        $("#QRCCtokenHiddenForm #authenticationToken").val(token);
    }

    function log(msg) {

        var currentdate = new Date();
        var datetime = "Log : " + currentdate.getDate() + "/"
            + (currentdate.getMonth() + 1) + "/"
            + currentdate.getFullYear() + "-"
            + currentdate.getHours() + ":"
            + currentdate.getMinutes() + ":"
            + currentdate.getSeconds();

        $('#msg_log').append('<p>' + datetime + ' : ' + msg + '</p>');
    }

    function qrLoadingMsg(msg, showLoading) {
        $('#qrLoadingDiv').html(msg);
        if (showLoading)
            $('#qrLoadingDiv').addClass("qrLoading");
        else
            $('#qrLoadingDiv').removeClass("qrLoading");
    }

    function qrLoadingHide() {
        $('#qrLoadingDiv').hide();
    }

    function removeQRCode() {

        $('canvas').remove();
    }



}(window.$2c2p = window.$2c2p || {}, jQuery));