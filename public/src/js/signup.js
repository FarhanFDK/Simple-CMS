"use strict"
    let firstname_selection = document.getElementById("firstname");
    let lastname_selection = document.getElementById("lastname");
    let national_code_selection = document.getElementById("national_code");
    // let phonenumber_selection = document.getElementById("phonenumber");
    let email_selection = document.getElementById("email");
    let password_selection = document.getElementById("password");
    let password_confirm_selection = document.getElementById("password_confirm");
    let submit_selection = document.getElementById("submit");
    let privacy_policy_selection = document.getElementById("privacy_policy");
    let email_requests_selection = document.getElementById("requests");
    let fisrtname_blur = document.getElementById("firstname_blur");
    let firstname_blur_lang = document.getElementById("firstname_blur_lang");
    let lastname_blur = document.getElementById("lastname_blur");
    let lastname_blur_lang = document.getElementById("lastname_blur_lang");
    let national_code_blur = document.getElementById("national_code_blur");
    let national_code_correct = document.getElementById("national_code_correct");
    /*let phonenumber_blur = document.getElementById("phonenumber_blur");
    let phonenumber_correct = document.getElementById("phonenumber_correct");
    let phonenumber_correct_number = document.getElementById("phonenumber_correct_number");*/
    let privacy_policy_onsubmit = document.getElementById("privacy_policy_onsubmit");
    let email_blur = document.getElementById("email_blur");
    let password_blur = document.getElementById("password_blur");
    let validation_password = document.getElementById("validation_password");
    let form_is_not_correct = document.getElementById("form_is_not_correct");
    let recaptcha_correct = document.getElementById("recaptcha_correct");
    let strength_text = document.getElementById("strength_text");
    let pattern1 = /[a-z]+/;
    let pattern2 = /[A-Z]+/;
    let pattern3 = /[0-9]+/;
    let pattern4 = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]+/;
    let pattern_persian = /^[\u0600-\u06FF\s]+$/;
    let pattern_number = /^\d+$/;
    function recaptcha_changed(){
        $(recaptcha_correct).fadeOut();
    }

    firstname_selection.onblur = function (){
        let firstname_onblur = firstname_selection.value;
        if(firstname_onblur.length < 3 || firstname_onblur.length > 25){
            $(firstname_blur).fadeIn();
        }else{
            $(firstname_blur).fadeOut();
            if(pattern_persian.test(firstname_onblur) == true){
              $(firstname_blur_lang).fadeOut();
            }else{
              $(firstname_blur_lang).fadeIn();
            }
        }

    }

    firstname_selection.onkeyup = function (){
        let firstname_onkeyup = firstname_selection.value;
        if(firstname_onkeyup.length > 2 && firstname_onkeyup.length < 26){
            $(firstname_blur).fadeOut();
            if(pattern_persian.test(firstname_onkeyup) == true){
              $(firstname_blur_lang).fadeOut();
            }else{
              $(firstname_blur_lang).fadeIn();
            }
        }
    }

    firstname_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 1579 && key < 1595) && !(key > 1600 && key < 1609) && !(key > 1568 && key < 1573) && !(key == 1574) && !(key == 1610) && !(key == 1620) && !(key == 1688) && !(key == 1662) && !(key == 1576) && !(key == 1579) && !(key == 1705) && !(key == 1711) && !(key == 1575) && !(key == 1578) && !(key == 1740) && !(key == 1670) && !(key == 32) && !(key == 13) && !(key == 18) && !(key == 9) && !(key == 16) && !(key == 116) && !(key == 8) && !(key > 36 && key < 41)){
            $(firstname_blur_lang).fadeIn();
        }else{
            $(firstname_blur_lang).fadeOut();
        }

    }

    lastname_selection.onblur = function (){
        let lastname_onblur = lastname_selection.value;
        if(lastname_onblur.length < 4 || lastname_onblur.length > 30){
            $(lastname_blur).fadeIn();
        }else{
            $(lastname_blur).fadeOut();
            if(pattern_persian.test(lastname_onblur) == true){
              $(lastname_blur_lang).fadeOut();
            }else{
              $(lastname_blur_lang).fadeIn();
            }
        }
    }

    lastname_selection.onkeyup = function (){
        let lastname_onkeyup = lastname_selection.value;
        if(lastname_onkeyup.length > 3 && lastname_onkeyup.length < 31){
            $(lastname_blur).fadeOut();
            if(pattern_persian.test(lastname_onkeyup) == true){
              $(lastname_blur_lang).fadeOut();
            }else{
              $(lastname_blur_lang).fadeIn();
            }
        }
    }

    lastname_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 1579 && key < 1595) && !(key > 1600 && key < 1609) && !(key > 1568 && key < 1573) && !(key == 1574) && !(key == 1610) && !(key == 1620) && !(key == 1688) && !(key == 1662) && !(key == 1576) && !(key == 1579) && !(key == 1705) && !(key == 1711) && !(key == 1575) && !(key == 1578) && !(key == 1740) && !(key == 1670) && !(key == 32) && !(key == 13) && !(key == 18) && !(key == 9) && !(key == 16) && !(key == 116) && !(key == 8) && !(key > 36 && key < 41)){
            $(lastname_blur_lang).fadeIn();
        }else{
            $(lastname_blur_lang).fadeOut();
        }
    }

    national_code_selection.onblur = function (){
        let national_code_onblur = national_code_selection.value;
        if(!(national_code_onblur.length == 10)){
            $(national_code_blur).fadeIn();
        }else{
            $(national_code_blur).fadeOut();
            if(pattern_number.test(national_code_onblur) == true){
              $(national_code_correct).fadeOut();
            }else{
              $(national_code_correct).fadeIn();
            }
        }

    }

    national_code_selection.onkeyup = function (){
        let national_code_onkeyup = national_code_selection.value;
        if(national_code_onkeyup.length > 9 && national_code_onkeyup.length < 11){
            $(national_code_blur).fadeOut();
            if(pattern_number.test(national_code_onkeyup) == true){
              $(national_code_correct).fadeOut();
            }else{
              $(national_code_correct).fadeIn();
            }
        }


    }

    national_code_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
            $(national_code_correct).fadeIn();
        }else{
            $(national_code_correct).fadeOut();
        }
    }

    /*phonenumber_selection.onblur = function (){
        let phonenumber_onblur = phonenumber_selection.value;
        if(!(phonenumber_onblur.length == 11)){
            $(phonenumber_blur).fadeIn();
        }else{
            $(phonenumber_blur).fadeOut();
        }

        if(!(phonenumber_onblur.charAt(0) == "0" && phonenumber_onblur.charAt(1) == "9")){
            $(phonenumber_correct).fadeIn();
        }else{
            $(phonenumber_correct).fadeOut();
        }

        if(pattern_number.test(phonenumber_onblur) == true){
            $(phonenumber_correct_number).fadeOut();
        }else{
            $(phonenumber_correct_number).fadeIn();
        }
    }

    phonenumber_selection.onkeyup = function (){
        let phonenumber_onkeyup = phonenumber_selection.value;
        if(phonenumber_onkeyup.length == 11 && phonenumber_onkeyup.charAt(0) == "0" && phonenumber_onkeyup.charAt(1) == "9"){
            $(phonenumber_blur).fadeOut();
            $(phonenumber_correct).fadeOut();
        }
    }

    phonenumber_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key < 58 && key > 47)){
            e.preventDefault();
            $(phonenumber_correct_number).fadeIn();
        }else{
            $(phonenumber_correct_number).fadeOut();
        }
    }*/

    email_selection.onblur = function (){
        let email_onblur = email_selection.value;
        if(email_onblur.length < 9 || email_onblur.length > 40){
            $(email_blur).fadeIn();
            $(email_correct).fadeIn();
        }else{
            $(email_blur).fadeOut();
            let indexOf1_onblur = email_onblur.indexOf("@");
            if(!(indexOf1_onblur == -1)){
                let charAt1_onblur = email_onblur.charAt(indexOf1_onblur + 1);
                let format = /[a-zA-Z]/;
                let format2 = /[A-Z]/;
                if(format.test(charAt1_onblur) != 0 || format2.test(charAt1_onblur) != 0){
                    let charAt2_onblur = email_onblur.charAt(indexOf1_onblur + 2);
                    if(format.test(charAt2_onblur) != 0 || format2.test(charAt2_onblur != 0)){
                        let charAt3_onblur = email_onblur.charAt(indexOf1_onblur + 3);
                        if(format.test(charAt3_onblur) != 0 || format2.test(charAt3_onblur) != 0){
                            let indexOf2_onblur = email_onblur.indexOf(".");
                            if(!(indexOf2_onblur == -1)){
                                let charAt1_dot_onblur = email_onblur.charAt(indexOf2_onblur + 1);
                                if(format.test(charAt1_dot_onblur) != 0 || format2.test(charAt1_dot_onblur) != 0){
                                    let charAt2_dot_onblur = email_onblur.charAt(indexOf2_onblur + 2);
                                    if(format.test(charAt2_dot_onblur) != 0 || format2.test(charAt2_dot_onblur) != 0){
                                        $(email_correct).fadeOut();
                                    }else{
                                        $(email_correct).fadeIn();
                                    }
                                }else{
                                    $(email_correct).fadeIn();
                                }
                            }else{
                                $(email_correct).fadeIn();
                            }
                        }else{
                            $(email_correct).fadeIn();
                        }
                    }else{
                        $(email_correct).fadeIn();
                    }
                }else{
                    $(email_correct).fadeIn();
                }
            }else{
                $(email_correct).fadeIn();
            }
        }
    }

    email_selection.onkeyup = function (){
          let email_onkeyup = email_selection.value;
          if(email_onkeyup.length > 8 && email_onkeyup.length < 40){
              $(email_blur).fadeOut();
              check();
          }

          function check(){
              let indexOf1_onkeyup = email_onkeyup.indexOf("@");
              if(!(indexOf1_onkeyup == -1)){
                  let charAt1_onkeyup = email_onkeyup.charAt(indexOf1_onkeyup + 1);
                  let format = /[a-zA-Z]/;
                  let format2 = /[A-Z]/;
                  let format3 = /../;
                    if(format.test(charAt1_onkeyup) != 0 || format2.test(charAt1_onkeyup) != 0){
                        let charAt2_onkeyup = email_onkeyup.charAt(indexOf1_onkeyup + 2);
                        if(format.test(charAt2_onkeyup) != 0 || format2.test(charAt2_onkeyup != 0)){
                            let charAt3_onkeyup = email_onkeyup.charAt(indexOf1_onkeyup + 3);
                            if(format.test(charAt3_onkeyup) != 0 || format2.test(charAt3_onkeyup) != 0){
                                let indexOf2_onkeyup = email_onkeyup.indexOf(".");
                                if(!(indexOf2_onkeyup == -1)){
                                    let charAt1_dot_onkeyup = email_onkeyup.charAt(indexOf2_onkeyup + 1);
                                    if(format.test(charAt1_dot_onkeyup) != 0 || format2.test(charAt1_dot_onkeyup) != 0){
                                            let charAt2_dot_onkeyup = email_onkeyup.charAt(indexOf2_onkeyup + 2);
                                            if(format.test(charAt2_dot_onkeyup) != 0 || format2.test(charAt2_dot_onkeyup) != 0){
                                                if(format3.test(email_onkeyup) != 0){
                                                    $(email_correct).fadeOut();
                                                }else{
                                                    //    $(email_correct).fadeIn();
                                                }
                                            }else{
                                                //    $(email_correct).fadeIn();
                                            }
                                    }else{
                                        //    $(email_correct).fadeIn();
                                    }
                                }else{
                                    //    $(email_correct).fadeIn();
                                }
                            }else{
                                //    $(email_correct).fadeIn();
                            }
                        }else{
                            //   $(email_correct).fadeIn();
                        }
                    }else{
                        // $(email_correct).fadeIn();
                    }
                }else{
                    // $(email_correct).fadeIn();
                }
          }
    }
    email_selection.onkeypress = function (e){
        let key = e.which ? e.which : e.keyCode;
        if(!(key > 47 && key < 58) && !(key == 64) && !(key > 64 && key < 91) && !(key == 46) && !(key > 96 && key < 123) && !(key > 36 && key < 41) && !(key < 19 && key > 15) && !(key == 20) && !(key == 9) && !(key == 13) && !(key == 116) && !(key > 96 && key < 106) && !(key == 8)){
            e.preventDefault();
            $(email_correct_type).fadeIn();
        }else{
            $(email_correct_type).fadeOut()
        }
    }
    
    let bar_color = document.getElementById("strength_bar_fill");
    password_selection.addEventListener('keyup' , function (){
        checkPassword(password_selection.value);
    });
    password_confirm_selection.addEventListener('paste' , function (event){
        event.preventDefault();
    });
    password_selection.addEventListener('paste' , function (event){
        event.preventDefault();    
    });
    function checkPassword(passw){
        let strength = 0;
        if(passw.match(pattern1)){
            strength += 1;
            document.getElementById("a_to_z").style.color = "green";
        }else{
            document.getElementById("a_to_z").style.color = "red";
        }

        if(passw.match(pattern2)){
            strength += 1;
            document.getElementById("A_to_Z").style.color = "green";
        }else{
            document.getElementById("A_to_Z").style.color = "red";
        }

        if(passw.match(pattern3)){
            strength += 1;
            document.getElementById("number8").style.color = "green";
        }else{
            document.getElementById("number8").style.color = "red";
        }

        if(passw.match(pattern4)){
            strength += 1;
            document.getElementById("special_char8").style.color = "green";
        }else{
            document.getElementById("special_char8").style.color = "red";
        }

        if(passw.length > 8){
            strength += 1;
            document.getElementById("char8").style.color = "green";
        }else{
            document.getElementById("char8").style.color = "red";
        }
        switch(strength){
            case 0:
                strength_text.innerHTML = "<span class='text-red-700 font-bold text-none'>بسیار ضعیف</span>";
                bar_color.style.backgroundColor = "red";
                bar_color.style.width = "0%";
                break;
            case 1:
                strength_text.innerHTML = "<span class='text-red-700 font-bold text-none'>بسیار ضعیف</span>";
                bar_color.style.backgroundColor = "red";
                bar_color.style.width = "20%";
                break;
            case 2:
                strength_text.innerHTML = "<span class='text-red-600 font-bold text-none'>ضعیف</span>";
                bar_color.style.backgroundColor = "red";
                bar_color.style.width = "40%";
                break;
            case 3:
                strength_text.innerHTML = "<span class='text-yellow-700 font-bold text-none'>متوسط</span>";
                bar_color.style.backgroundColor = "yellow";
                bar_color.style.width = "60%";
                break;
            case 4:
                strength_text.innerHTML = "<span class='text-green-600 font-bold text-none'>قوی</span>";
                bar_color.style.backgroundColor = "rgb(20 , 180 , 20)";
                bar_color.style.width = "80%";
                break;
            case 5:
                if(passw.length > 13){
                    strength_text.innerHTML = "<span class='text-green-700 font-bold text-none'>بسیار قوی</span>";
                    bar_color.style.backgroundColor = "green";
                    bar_color.style.width = "100%";
                }else{
                    strength_text.innerHTML = "<span class='text-green-600 font-bold text-none'>قوی</span>";
                    bar_color.style.backgroundColor = "rgb(20 , 180 , 20)";
                    bar_color.style.width = "80%";
                }
                break;
        }
    }
    password_selection.onfocus = function (){
        $(validation_password).fadeIn();
        document.getElementById("scroller_password").scrollIntoView();
    }

    password_selection.onblur = function (){
        $(validation_password).fadeOut();
    }

    password_confirm_selection.onblur = function (){
        let pass_onblur = password_selection.value;
        let pass_config_onblur = password_confirm_selection.value;
        if(pass_onblur != pass_config_onblur){
            $(password_blur).fadeIn();
        }else{
            $(password_blur).fadeOut();
        }
    }

    password_confirm_selection.onkeyup = function (){
        let pass = password_selection.value;
        let pass_config = password_selection.value;
        if(pass != pass_config){
            $(password_blur).fadeIn();
        }else{
            $(password_blur).fadeOut();
        }
    }
    privacy_policy_selection.onclick = function () {
        $(privacy_policy_onsubmit).fadeOut();
    }
    function validation(){
        let response = document.getElementById("g-recaptcha-response");
        let firstname_value = firstname_selection.value;
        let lastname_value = lastname_selection.value;
        let national_code_value = national_code_selection.value;
        //let phonenumber_value = phonenumber_selection.value;
        let email_value = email_selection.value;
        let password_value = password_selection.value;
        let password_confirm_value = password_confirm_selection.value;
        let privacy_policy = privacy_policy_selection;
        let email_requests = email_requests_selection;
        let os = getOS();
        let number = 0;
        if(response.value != ""){
            number++;
        }else{
            $(recaptcha_correct).fadeIn();
        }

        if(firstname_value.length > 2 && firstname_value.length < 26){
            number++;
        }else{
            $(firstname_blur).fadeIn();
        }

        if(pattern_persian.test(firstname_value) == true){
            number++;
        }else{
            $(firstname_blur_lang).fadeIn();
        }

        if(lastname_value.length > 3 && lastname_value.length < 31){
            number++;
        }else{
            $(lastname_blur).fadeIn();
        }

        if(pattern_persian.test(lastname_value) == true){
            number++;
        }else{
            $(lastname_blur_lang).fadeIn()
        }

        if(national_code_value.length == 10){
            number++;
        }else{
            $(national_code_blur).fadeIn();
        }

        if(pattern_number.test(national_code_value) == true){
            number++;
        }else{
            $(national_code_correct).fadeIn();
        }

        /*if(phonenumber_value.length == 11){
            number++;
        }else{
            $(phonenumber_blur).fadeIn()
        }

        if(phonenumber_value.charAt("0") == "0" && phonenumber_value.charAt("1") == "9"){
            number++;
        }else{
            $(phonenumber_correct).fadeIn();
        }*/

        let indexOf1_onclick = email_value.indexOf("@");
        if(!(indexOf1_onclick == -1)){
            let charAt1_onclick = email_value.charAt(indexOf1_onclick + 1);
            let format = /[a-zA-Z]/;
            let format2 = /[A-Z]/;
            if(format.test(charAt1_onclick) != 0 || format2.test(charAt1_onclick) != 0){
                let charAt2_onclick = email_value.charAt(indexOf1_onclick + 2);
                if(format.test(charAt2_onclick) != 0 || format2.test(charAt2_onclick != 0)){
                    let charAt3_onclick = email_value.charAt(indexOf1_onclick + 3);
                    if(format.test(charAt3_onclick) != 0 || format2.test(charAt3_onclick) != 0){
                        let indexOf2_onclick = email_value.indexOf(".");
                        if(!(indexOf2_onclick == -1)){
                            let charAt1_dot_onclick = email_value.charAt(indexOf2_onclick + 1);
                            if(format.test(charAt1_dot_onclick) != 0 || format2.test(charAt1_dot_onclick) != 0){
                                let charAt2_dot_onclick = email_value.charAt(indexOf2_onclick + 2);
                                if(format.test(charAt2_dot_onclick) != 0 || format2.test(charAt2_dot_onclick) != 0){
                                    number++
                                    $(email_correct).fadeOut();
                                }else{
                                    $(email_correct).fadeIn();
                                }
                            }else{
                                $(email_correct).fadeIn();
                            }
                        }else{
                            $(email_correct).fadeIn();
                        }
                    }else{
                        $(email_correct).fadeIn();
                    }
                }else{
                    $(email_correct).fadeIn();
                }
            }else{
                $(email_correct).fadeIn();
            }
        }else{
            $(email_correct).fadeIn();
        }

            if(password_value.length > 8){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern1)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern2)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern3)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(password_value.match(pattern4)){
                number++;
            }else{
                $(validation_password).fadeIn();
            }

            if(!(password_value == "")){
                if(password_value == password_confirm_value){
                    number++;
                }else{
                    $(password_blur).fadeIn();
                }
            }else{
                $(password_blur).fadeIn();
            }

            if(privacy_policy_selection.checked == true){
                $(form_is_not_correct).fadeOut();
                number++;
            }else{
                $(form_is_not_correct).fadeIn();
            }

            let request_for_email = false;
            if(email_requests_selection.checked == true){
                request_for_email = true;
            }else{
                request_for_email = false;
            }
            if(number == 15){
                submit_selection.innerHTML = "<i class='fa fa-circle-o-notch fa-spin'></i>";
                let firstname_final_value = document.getElementById("firstname").value;
                let lastname_final_value = document.getElementById("lastname").value;
                let national_code_final_value = document.getElementById("national_code").value;
                // let phonenumber_final_value = document.getElementById("phonenumber").value;
                let email_final_value = document.getElementById("email").value;
                let password_final_value = document.getElementById("password").value;
                let password_confirm_final_value = document.getElementById("password_confirm").value;
                let privacy_policy_final_value = document.getElementById("privacy_policy");
                let request_for_email_final_value = document.getElementById("requests");
                let number_final_dec = 0;

                if(firstname_final_value.length > 2 && firstname_final_value.length < 26){
                    number_final_dec++;
                }else{
                    $(firstname_blur).fadeIn();
                }

                if(pattern_persian.test(firstname_final_value) == true){
                    number_final_dec++;
                }else{
                    $(firstname_blur_lang).fadeIn();
                }

                if(lastname_final_value.length > 3 && lastname_final_value.length < 31){
                    number_final_dec++;
                }else{
                    $(lastname_blur).fadeIn();
                }

                if(pattern_persian.test(lastname_final_value) == true){
                    number_final_dec++;
                }else{
                    $(lastname_blur_lang).fadeIn()
                }

                if(national_code_final_value.length == 10){
                    number_final_dec++;
                }else{
                    $(national_code_blur).fadeIn();
                }

                if(pattern_number.test(national_code_final_value) == true){
                    number_final_dec++;
                }else{
                    $(national_code_correct).fadeIn();
                }

                /*if(phonenumber_final_value.length == 11){
                    number_final_dec++;
                }else{
                    $(phonenumber_blur).fadeIn()
                }

                if(phonenumber_final_value.charAt("0") == "0" && phonenumber_final_value.charAt("1") == "9"){
                    number_final_dec++;
                }else{
                    $(phonenumber_correct).fadeIn();
                }*/

                let indexOf1_onsubmit = email_final_value.indexOf("@");
                if(!(indexOf1_onsubmit == -1)){
                    let charAt1_onsubmit = email_final_value.charAt(indexOf1_onsubmit + 1);
                    let format = /[a-zA-Z]/;
                    let format2 = /[A-Z]/;
                    if(format.test(charAt1_onsubmit) != 0 || format2.test(charAt1_onsubmit) != 0){
                        let charAt2_onsubmit = email_final_value.charAt(indexOf1_onsubmit + 2);
                        if(format.test(charAt2_onsubmit) != 0 || format2.test(charAt2_onsubmit != 0)){
                            let charAt3_onsubmit = email_final_value.charAt(indexOf1_onsubmit + 3);
                            if(format.test(charAt3_onsubmit) != 0 || format2.test(charAt3_onsubmit) != 0){
                                let indexOf2_onsubmit = email_final_value.indexOf(".");
                                if(!(indexOf2_onsubmit == -1)){
                                    let charAt1_dot_onsubmit = email_final_value.charAt(indexOf2_onsubmit + 1);
                                    if(format.test(charAt1_dot_onsubmit) != 0 || format2.test(charAt1_dot_onsubmit) != 0){
                                        let charAt2_dot_onsubmit = email_final_value.charAt(indexOf2_onsubmit + 2);
                                        if(format.test(charAt2_dot_onsubmit) != 0 || format2.test(charAt2_dot_onsubmit) != 0){
                                            number_final_dec++
                                            $(email_correct).fadeOut();
                                        }else{
                                            $(email_correct).fadeIn();
                                        }
                                    }else{
                                        $(email_correct).fadeIn();
                                    }
                                }else{
                                    $(email_correct).fadeIn();
                                }
                            }else{
                                $(email_correct).fadeIn();
                            }
                        }else{
                            $(email_correct).fadeIn();
                        }
                    }else{
                        $(email_correct).fadeIn();
                    }
                }else{
                    $(email_correct).fadeIn();
                }

                    if(password_final_value.length > 8){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern1)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern2)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern3)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(password_final_value.match(pattern4)){
                        number_final_dec++;
                    }else{
                        $(validation_password).fadeIn();
                    }

                    if(!(password_final_value == "")){
                        if(password_final_value == password_confirm_final_value){
                            number_final_dec++;
                        }else{
                            $(password_blur).fadeIn();
                        }
                    }else{
                        $(password_blur).fadeIn();
                    }

                    let privacy_policy_final_value_checked = true;

                    if(privacy_policy_final_value.checked == true){
                        number_final_dec++;
                        privacy_policy_final_value_checked = true;
                    }

                    let request_for_email = false;
                    if(request_for_email_final_value.checked == true){
                        request_for_email = true;
                    }else{
                        request_for_email = false;
                    }

                    if(number_final_dec == 14){
                        document.getElementById("signup_system_os").value = getOS();
                        document.getElementById("privacy").value = privacy_policy_final_value.checked;
                        document.getElementById("request_for_email").value = request_for_email;
                        return true;
                    }else{
                        $(form_is_not_correct).fadeIn();
                        return false;
                    }
            }else{
                submit_selection.innerHTML = "ثبت نام";
                $(form_is_not_correct).fadeIn()
                return false;
            }
        }