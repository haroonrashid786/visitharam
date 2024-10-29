let is_error_displayed = false
let display_overlay = ()=>{
    document.querySelector('.overlay_body')?.classList.remove('!hidden');
    setTimeout(() => {
        document.querySelector('.overlay_body')?.classList.remove('!hidden');
    }, 10000);
}

const error_fields_validation = (form) => {
    setTimeout(() => {
        let error_fields = form.querySelectorAll('.error')
        if (error_fields && error_fields.length > 0) {

            let first_elm = error_fields[0]
            if (first_elm) {
                first_elm.focus()
                // first_elm.scrollIntoView()
                setTimeout(() => {
                    let body = document.querySelector('html')
                    if (body) {
                        // body.scrollTop = body.scrollTop - 200
                    }
                }, 1000);
            }

            error_fields.forEach(err_field => {
                err_field.classList.add('error')
            })

            // Toast.fire({
            //     icon: 'error',
            //     title: 'Please enter the valid data!'
            // })
            return false
        }
        return true
    }, 100);
}

const phone_validation = (form_element, show_message = true) => {
    let dial_code = form_element.querySelector('[name="dial_code"]')
    let phone = form_element.querySelector('[name="phone"]')
    if (phone && phone.value.length < 8) {
        if (show_message) {
            Toast.fire({
                icon: 'error',
                title: 'Please enter valid phone number'
            });
        }

        return false
    }
    return true
}

const Email_validation = (form_element, show_message = true) => {
    show_message = true
    let email = form_element.querySelector('[type="email"]');
    
    let excludeEmailValidation = form_element.querySelector('#emailToExclude');
    if (excludeEmailValidation === email) {
        return true;
    }
    
    if (email) {
        console.log(email);
        
        // Regular expression for email validation
        const emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

        if (!emailRegex.test(email.value)) {
            if (show_message) {
                Toast.fire({
                    icon: 'error',
                    title: 'Please enter a valid email address'
                });
            }
            return false;
        }
    }
    return true;
}   

const AddressValidation = (form_element) => {
    let lat = form_element.querySelector('[name="latitude"]')
    let lng = form_element.querySelector('[name="longitude"]')

    let address = form_element.querySelector('[name="business_address"]')
    if (lat && lng && (!lat?.value || !lng?.value)) {
        if (address && !address.value) {
            Toast.fire({
                icon: 'error',
                title: 'Business Address is required'
            });
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Invalid Business address! Please choose from suggestion list.'
            });
        }
        address?.classList.add('error')
        address.value = ''
        return false
    }
    address?.classList.remove('error')

    return true
}

const documentValidation = (form_element) => {
    let license_document = form_element.querySelector('[name="license_document"]')

    if (license_document && !license_document.value) {
        Toast.fire({
            icon: 'error',
            title: 'Please add License document.'
        });
        return false
    }
    return true
}

const PasswordValidation = (form_element) => {
    let password = form_element.querySelector('[name="password"]')
    let c_password = form_element.querySelector('[name="password_confirmation"]')

    if (password && c_password) {
        let p_word = password.value
        let cp_word = c_password.value
        if (p_word.length < 8) {
            // Toast.fire({
            //     icon: 'error',
            //     title: 'Password not be less than 8 Characters'
            // });
            password.classList.add('error')
            show_error_message(password, 'Password not be less than 8 Characters')
            return false
        }
        if (p_word != cp_word) {
            // Toast.fire({
            //     icon: 'error',
            //     title: 'Password does not match'
            // });
            password.classList.add('error')
            c_password.classList.add('error')
            show_error_message(password, 'Password does not match')
            show_error_message(c_password, 'Password does not match')
            return false
        }
        password.classList.remove('error')
        c_password.classList.remove('error')
    }
    return true

}

const GoogleSearchLatLngValidation = (form_element) => {
    let google_search = form_element.querySelectorAll('[google-search-validation-lat-lng]')

    google_search.forEach(gsltg_field => {
        let its_parent = gsltg_field.parentElement
        if (!gsltg_field.value) {
            return
        }
        let lat_field = its_parent.querySelector('[name="latitude"]')
        let lng_field = its_parent.querySelector('[name="longitude"]')

        if (!lat_field.value || !lng_field.value) {
            gsltg_field.classList.add('error')
            show_error_message(gsltg_field, 'Please enter valid business address')
        }
    })

}

const LicenseId_validator = (form_element) => {
    let license_id = form_element.querySelector('[name="license_id"]')
    if (license_id) {
        if (license_id.value.length >= 32) {
            Toast.fire({
                icon: 'error',
                title: 'Invalid License ID'
            });
            license_id.classList.add('error')
            license_id.focus()
            return false
        }
        license_id.classList.remove('error')
    }
    return true

}


const RegistrationForm = (event) => {
    event.preventDefault()
    let form_element = event.target


    let phn_validate = phone_validation(form_element)
    if (!phn_validate) {
        return
    }

    let address_validate = AddressValidation(form_element)
    if (!address_validate) {
        return false
    }

    let license_validation = LicenseId_validator(form_element)
    if (!license_validation) {
        return
    }
    let docx_validate = documentValidation(form_element)
    if (!docx_validate) {
        return
    }
    let pass_validate = PasswordValidation(form_element)
    if (!pass_validate) {
        return
    }
   
    let email_validation = Email_validation(form_element)
    if (!email_validation) {
        return false
    }

    let errors = error_fields_validation(form_element)
    if (!errors) {
        return
    }

    form_element?.submit();
    display_overlay()


}


const TakeCameraPicture = () => {
    let context = {
        audio: false,
        video: {
            facingMode: {
                exact: "environment"
            }
        }
    }
    try {

        navigator.mediaDevices.getUserMedia(context)
            .then(stream => {
                alert('success')
                alert(stream)
            })
            .catch(err => {
                alert(err)
            })
    } catch (err) {
        alert(err)
    }
}


const show_error_message = (this_field, text = 'This Field is required') => {
    let this_parent = this_field.parentElement

    let new_p = this_parent.querySelector('.error-field-custom-validation')
    if (!new_p) {
        new_p = document.createElement('p')
    }
    new_p.innerText = text
    new_p.className = 'text-red-500 text-right text-xs m-0 p-0 error-field-custom-validation'

    this_parent.append(new_p)
}



const CustomPhoneValidation = (this_field) => {
    // let v_rejex = this_field.getAttribute('data-validation-rejex')
    let v_rejex = /^[\s()+-]*([0-9][\s()+-]*){8,20}$/

    let its_parent = this_field.parentElement

    let dial_code = its_parent.querySelector('[name="dial_code"]')
    let phone_number = `+${dial_code?.value}${this_field.value}`

    if (this_field.value.length < 8 || this_field.value.length > 14) {
        its_parent.classList.add('error')
        show_error_message(its_parent, 'Please enter a valid phone number')
        // this_field.scrollIntoView()
        
        // setTimeout(() => {
        //     let body = document.querySelector('html')
        //     if (body) {
        //         body.scrollTop = body.scrollTop - 200
        //     }
        // }, 1000);

        return
    } else {
        its_parent.classList.remove('error')
        if (its_parent) {
            let gr_parent = its_parent.parentElement
            let err_ = gr_parent.querySelector('.error-field-custom-validation')
            if (err_) {
                err_.remove()
            }
        }
    }

}


let FIELDS_TYPES = {
    'phone': CustomPhoneValidation,
    'mobile_number': CustomPhoneValidation,
}

const EmptyValidateCustomField = (this_field) => {
    let is_required = this_field.hasAttribute('data-required')
    let is_phone_field = this_field.hasAttribute('data-phone-validation')

    if (this_field.type == 'checkbox') {
        if (this_field.checked) {
            this_field.value = 'true'
        } else {
            this_field.value = ''
        }
    }

    if (is_required && !this_field.value) {
        if (is_phone_field) {
            let parent = this_field.parentElement
            parent.classList.add('error')
            show_error_message(parent, 'This Field is required')
            return
        }

        this_field.classList.add('error')
        show_error_message(this_field, 'This Field is required')
        return
    }

    if (this_field.value) {
        let custom_validation = FIELDS_TYPES[this_field.name]
        if (custom_validation) {
            return custom_validation(this_field)
        }
    }
}



function move(dir) {
    
    let step_tops = document.querySelectorAll('.step_top');
    let step_active = document.querySelectorAll('.step_top.active');

    if(dir){
        let element = step_tops[step_active.length];
        if(element){
            element.classList.add('active');
            let next_section = document.querySelector(`.${element.getAttribute('step')}`);
            let step_validation = document.querySelectorAll('.step_validation');
            step_validation.forEach(ele=>{
                ele.classList.add('hidden')
            })
            let back = next_section.querySelector('.back')
            back.addEventListener('click',()=>{
                move(false)
            })
            next_section.classList.remove('hidden')
        }   
    }else{
        let element = step_tops[step_active.length -1];
        if(step_active.length>1){        
            if(step_tops[step_active.length-1]){
            
                step_tops[step_active.length-1].classList.remove('active');

                let step_validation = document.querySelectorAll('.step_validation');
                step_validation.forEach(ele=>{
                    ele.classList.add('hidden')
                })

                if(step_tops[step_active.length-1].getAttribute('step').includes('two')){
                    document.querySelector('.step_one').classList.remove('hidden');
                }
                
                if(step_tops[step_active.length-1].getAttribute('step').includes('three')){
                    document.querySelector('.step_two').classList.remove('hidden');
                }

            } 
        }
    }
        window.scrollTo(0, 0)
}




const CustomValidationForm = (event,no_submit) => {
    let this_form = event


    setTimeout(() => {
        let all_errors_fields = this_form.querySelectorAll('input:not([type="hidden"]).error, select.error, textarea.error')
        all_errors_fields.forEach(field => {
            remove_exception({
                target: field
            })
        })

        let form_fields = this_form.querySelectorAll('input:not([type="hidden"]), select, textarea')

        form_fields.forEach(this_field => {
            EmptyValidateCustomField(this_field)
        })

        if (this_form.hasAttribute('same-checkbox-value-required')) {
            let same_checkboxs = this_form.getAttribute('same-checkbox-value-required')
            if (same_checkboxs) {
                same_checkboxs = same_checkboxs.split(' ')
                same_checkboxs.forEach(chkbx_attr => {
                    let chk_boxes = this_form.querySelectorAll(`[${chkbx_attr}]`)
                    if (chk_boxes.length > 0) {
                        let chcked = []
                        chk_boxes.forEach(checkbox => {
                            if (checkbox.checked) {
                                chcked.push(checkbox)
                            }
                        })
                        if (chcked.length == 0) {
                            chk_boxes.forEach(checkbox => {
                                checkbox.classList.add('error')
                            })
                        }
                    }
                })
            }
        }

        if (this_form.hasAttribute('check-for-multiple-media-create-deal')) {
            if (this_form.querySelector('.all_imgs_preview')?.querySelectorAll('.hover-delete')?.length < 1) {
                var img_per = this_form.querySelector('.all_imgs_preview');
                let div = document.createElement('p');
                div.classList = 'text-red-500 text-left mt-2 text-xs p-0 error-field-custom-validation image';
                div.innerHTML = 'Please add Images!';

                if(!(document.querySelector('.error-field-custom-validation.image'))){
                    img_per.parentElement.parentElement.appendChild(div);
                }

                // Toast.fire({
                //     icon: 'error',
                //     title: "Add Images!"
                // });
                return
            }
        }

        let is_pass_validate = this_form.querySelectorAll('[password-validate]')
        if (is_pass_validate && is_pass_validate.length > 0) {
            PasswordValidation(this_form)
        }
        
        
        let email_validation = this_form.querySelectorAll('[type="email"]')
        if (email_validation && email_validation.length > 0) {
           email_val = Email_validation(this_form)
            if(email_val){
                Email_validation(this_form)
            }else{
                return false
            }
        }
        

        let google_search = this_form.querySelectorAll('[google-search-validation-lat-lng]')
        if (google_search && google_search.length > 0) {
            GoogleSearchLatLngValidation(this_form)
        }

        setTimeout(() => {
            let error_fiels = this_form.querySelectorAll('.error')
            if (error_fiels.length > 0) {
                // error_fiels[0].scrollIntoView()
                error_fiels[0].focus()
                setTimeout(() => {
                    let body = document.querySelector('html')
                    if (body) {
                        // body.scrollTop = body.scrollTop - 200
                    }
                }, 10);
                if (!is_error_displayed) {
                    // Toast.fire({
                    //     icon: 'error',
                    //     title: 'Please enter the valid data!'
                    // });
                }
                is_error_displayed = true
                return
            }

            if(no_submit){
                let check_radio = document.querySelectorAll('[name="moving_date_type"]');
                check_radio.forEach(radio=>{
                    if(radio.checked){
                        let finall = this_form.querySelector('.step_submit.final')
                        if(!finall){
                            if(radio.value == "flexible"){
                                let flexible_inp = document.querySelector('.flexible_section input');
                                if(flexible_inp){
                                    if(flexible_inp.value.trim('') == ''){
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Please select date!'
                                        });
                                        flexible_inp.classList.toggle('error')
                                    } else{
                                        move(true)
                                    }
                                }else{{
                                    move(true)
                                }}
                            }
                            
                            else if(radio.value == "specific"){
                                let specific_inp = document.querySelector('.specific_section input');
                                if(specific_inp.value.trim('') == ''){
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Please select date!'
                                    });
                                    specific_inp.classList.toggle('error')
                                }else{
                                    move(true)
                                }
                            }else{
                                move(true)
                            }
                        }else{
                            let parent_inventory_arr = document.querySelector('.parent_inventory_arr');
                            if(parent_inventory_arr){

                                if(parent_inventory_arr.value != ''){
                                    let json = JSON.parse(parent_inventory_arr.value);
                                    if(json.length > 0){
                                        finall.closest('form').submit()
                                        display_overlay()
                                    }else{
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Please Add Inventory!'
                                        });
                                    }
                                }else{
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Please Add Inventory!'
                                    });
                                }
                            }else{
                                finall.closest('form').submit()
                                display_overlay()
                            }

                        }
                    }
                })
            }else{
                this_form.submit()
                display_overlay()
            }
        }, 10);
    }, 0);

}




const remove_exception = (event) => {

    let rm_field = event.target
    if (!rm_field) {
        console.error('remove_exception raised an error, rm_field is undefined')
        return
    }


    let its_parent = rm_field.parentElement

    let is_phone_field = rm_field.hasAttribute('data-phone-validation')
    if (is_phone_field) {
        its_parent.classList.remove('error')
        its_parent = its_parent.parentElement
    }

    if (rm_field.type == 'checkbox') {
        if (rm_field.checked) {
            rm_field.value = 'true'
        } else {
            rm_field.value = ''
        }
    }

    let error_ = its_parent.querySelector('.error-field-custom-validation')

    if (rm_field.value) {
        rm_field.classList.remove('error')
        if (error_) {
            error_.remove()
        }
    } else {
        let is_required = rm_field.hasAttribute('data-required')
        if (!is_required) {
            if (is_phone_field) {
                rm_field.parentElement.classList.remove('error')
                its_parent.classList.remove('error')
            }
            rm_field.classList.remove('error')
            if (error_) {
                error_.remove()
            }
            return
        }
        rm_field.classList.add('error')
        if (!error_) {
            if (is_phone_field) {
                show_error_message(rm_field.parentElement, 'This Field is required')
            } else {
                show_error_message(rm_field, 'This Field is required')
            }
        }
    }

}



const ExceptionOverRiding = (this_form) => {
    let inpts = this_form.querySelectorAll('input')
    let selects = this_form.querySelectorAll('select')
    let textareas = this_form.querySelectorAll('textarea')

    inpts.forEach(input_field => {
        input_field.addEventListener('input', remove_exception)
    })

    selects.forEach(select_field => {
        select_field.addEventListener('input', remove_exception)
    })
    textareas.forEach(text_field => {
        text_field.addEventListener('input', remove_exception)
    })
}

function loadinBTN(form_button){
    if (form_button) {
        let err = document.querySelectorAll('.error')
        if(err.length < 1){
            form_button.setAttribute('disabled', 'disabled')
            tm_btn_id = setTimeout(() => {
                form_button.removeAttribute('disabled')
            }, 2500);
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    let deals_forms = document.querySelectorAll('form[custom-validation-deals]')
    deals_forms.forEach(d_form => {
        let tm_id = undefined
        let tm_btn_id = undefined
        d_form.addEventListener('submit', (e) => {
            e.preventDefault()
            let form = e.target


            if (tm_btn_id) {
                clearTimeout(tm_btn_id)
            }
            let form_button = form.querySelector('button[type="submit"]')
            loadinBTN(form_button);

            if (tm_id) {
                clearTimeout(tm_id)
            }

            tm_id = setTimeout(() => {
                CustomValidationForm(form)
            }, 0);


        })
        ExceptionOverRiding(d_form)
    })

    let custom_form = document.querySelectorAll('.step_validation');
    if (custom_form.length > 0) {
        custom_form.forEach(form => {

            let form_button = form.querySelector(".step_submit");
            form_button.addEventListener('click', () => {
                let tm_id = undefined
                let tm_btn_id = undefined


                if (tm_btn_id) {
                    clearTimeout(tm_btn_id)
                }

                loadinBTN(form_button)

                if (tm_id) {
                    clearTimeout(tm_id)
                }

                tm_id = setTimeout(() => {
                    CustomValidationForm(form,true)
                }, 400);


                ExceptionOverRiding(form,true)
            })

        })
    }

})
