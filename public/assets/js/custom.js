let banner_animation = document.querySelector('.banner_animation');
if (banner_animation) {
    let banner_svg = banner_animation.querySelectorAll('.banner_svg:not(.van)');
    setTimeout(() => {
        banner_svg.forEach(ele => {
            ele.classList.add('floating');
        })
    }, 2200);
}

function type_number (){
    setTimeout(() => {
        // Select all number input fields on the page
        var numberInputs = document.querySelectorAll('input[type=number]');
        // console.log(numberInputs,'AHHH');
        // Attach an event listener to each input field
        numberInputs.forEach(function (input) {
            input.addEventListener('keydown', function (event) {
                if (event.ctrlKey || event.altKey || event.metaKey) {
                    return;
                }
                // Allow the following keys: backspace, delete, tab, escape, enter, decimal point, and numbers
                if (event.keyCode === 46 || event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 27 ||
                    event.keyCode === 13 || event.keyCode === 190 || event.keyCode === 37 || event.keyCode === 38 ||
                    event.keyCode === 39 || event.keyCode === 40 || (event.keyCode >= 48 && event.keyCode <= 57) ||
                    (event.keyCode >= 96 && event.keyCode <= 105)) {
                    // Allow the key to be entered
                } else {
                    // Prevent the key from being entered
                    event.preventDefault();
                }
            });
        });
    }, 300);
}
document.addEventListener('DOMContentLoaded', () => {
    type_number();
})

function nav_color_change() {
    var navbar = document.getElementById('navbar'); // Replace 'navbar' with the ID of your navbar element
    var scrollPosition = window.scrollY;

    var no_navbar = document.querySelector('.no_navbar');
    if(no_navbar){
        navbar.classList.add('hidden')
        return false
    }
    if (navbar) {
        // Adjust the scroll position threshold and color as needed
        if (scrollPosition > 10) {
            navbar.classList.add('navbar_scroll');
        } else {
            navbar.classList.remove('navbar_scroll');
        }
    }
}
window.addEventListener('scroll', nav_color_change);
window.addEventListener('DOMContentLoaded', nav_color_change);

var video = document.querySelectorAll('.video-tag-grid');
var video_play = document.querySelectorAll('.play');
var video_pause = document.querySelectorAll('.pause');
video_pause.forEach(btn => {
    btn.style.cssText = `display:none`;
})

video_play.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        video[i].play();
        btn.style.cssText = `display:none`;
        video_pause[i].style.cssText = `display:block`;
    })
})
video_pause.forEach((btn, i) => {
    btn.addEventListener('click', () => {
        video[i].pause();
        btn.style.cssText = `display:none`
        video_play[i].style.cssText = `display:block`
    })
})

const offcanvas_close = document.querySelector('.offcanvas-close');
const offcanvas_open = document.querySelector('.offcanvas-open');
const offcanvas_ = document.querySelector('.offcanvas');
const offcanvas_o = document.querySelector('.offcanvas-opacity');
if (offcanvas_open) {
    document.addEventListener('DOMContentLoaded', () => {
        offcanvas_open.addEventListener('click', canvas);
        offcanvas_close.addEventListener('click', canvas)
        offcanvas_o.addEventListener('click', canvas)

        function canvas() {
            offcanvas_.classList.toggle('collapse-offcanvas');
            setTimeout(() => {
                offcanvas_.classList.toggle('hidden');
                offcanvas_o.classList.toggle('hidden');
            }, 230);
        }
    })
}

document.addEventListener('DOMContentLoaded', () => {
    let counter_parents = document.querySelectorAll('.counter_parent');
    counter_parents.forEach(counter_parent => {
        let counter_input = counter_parent.querySelector('.counter_input');
        let counter_text = counter_parent.querySelector('.counter_text');
        let counter_increment = counter_parent.querySelector('.counter_increment');
        let counter_decrement = counter_parent.querySelector('.counter_decrement');

        const counter_fn = (method) => {
            if (method == "+") {
                var value = parseInt(counter_input.value) + 1;
                counter_input.value = value
                counter_text.innerHTML = value;
            }
            if (method == "-") {
                if (false) {
                    if (counter_input.value != +(counter_text.getAttribute('minValue'))) {
                        var value = parseInt(counter_input.value) - 1;
                        counter_input.value = value
                        counter_text.innerHTML = value;
                    }
                } else {
                    if (counter_input.value != 0) {
                        var value = parseInt(counter_input.value) - 1;
                        counter_input.value = value
                        counter_text.innerHTML = value;
                    }
                }
            }

            const event = new Event('input', { bubbles: true });
            counter_input.dispatchEvent(event); 
        }

        counter_increment.addEventListener('click', () => {
            counter_fn("+")
        });
        counter_decrement.addEventListener('click', () => {
            counter_fn("-")
        });
    })
})

let add_another_items = document.querySelectorAll('.add_another_item');
add_another_items.forEach(add_another_item => {
    let add_another_item_btn = add_another_item.querySelector('.add_another_item_btn');
    let wrapper = add_another_item.querySelector('.wrapper');
    let itemHTML = `<div class="rounded-xl border shadow-md p-5 item relative">
                            <div class="delete cursor-pointer absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 h-[1.5rem] w-[1.5rem] rounded-full bg-red-600 flex items-center justify-center">
                                <svg viewBox="0 0 24 24" width="1rem" height="1rem" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </div>
                            <div class="flex flex-col gap-3">
                            <div>
                                <div class="input-wrapper">
                                    <p class="input-label">Item Name *</p>
                                    <input type="text" placeholder="Specify the item name" data-name="name" class="input" >
                                </div>
                            </div>
                            <div class="grid lg:grid-cols-4 gap-3 sm:grid-cols-2">
                                <div>
                                    <div class="input-wrapper">
                                        <p class="input-label">Area Unit</p>
                                        <select  data-name="unit_of_area" class="input" >
                                            <option selected value="m">M</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-wrapper">
                                        <p class="input-label">Length</p>
                                        <input type="number" placeholder="Length(m)" data-name="length" class="input" >
                                    </div>
                                </div>
                                <div>
                                    <div class="input-wrapper">
                                        <p class="input-label">Width</p>
                                        <input type="number" placeholder="Width(m)" data-name="width" class="input" >
                                    </div>
                                </div>
                                <div>
                                    <div class="input-wrapper">
                                        <p class="input-label">Height</p>
                                        <input type="number" placeholder="Height(m)" data-name="height" class="input" >
                                    </div>
                                </div>
                                <div>
                                    <div class="input-wrapper">
                                        <p class="input-label">Weight Unit</p>
                                        <select  data-name="unit_of_weight" class="input" >
                                            <option selected value="kg">kg</option> 
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-wrapper">
                                        <p class="input-label">Weight</p>
                                        <input type="number" placeholder="Weight(m)" data-name="weight" class="input" >
                                    </div>
                                </div>
                            </div>
                            </div>
         </div>`

    add_another_item_btn.addEventListener('click', () => {
        let div = document.createElement('div');
        div.classList = 'item_parent'
        div.innerHTML = itemHTML;
        wrapper.appendChild(div);

        const create_name_values = () => {
            let items = add_another_item.querySelectorAll('.item');
            items.forEach((item, i) => {
                let all_names = item.querySelectorAll('[data-name]');
                all_names.forEach(name_ => {
                    let attr_name = name_.getAttribute('data-name');
                    name_.setAttribute("name", `items[${i}][${attr_name}]`);
                })
            })
        };
        create_name_values();

        let delete_btn = div.querySelector('.delete');
        delete_btn.addEventListener('click', () => {
            if (delete_btn.closest('.item_parent')) {
                delete_btn.closest('.item_parent').remove();
                create_name_values();
            }
        });

        type_number();
    })
})

document.addEventListener('DOMContentLoaded', () => {
    let delete_btns = document.querySelectorAll('.edit_delete');
    delete_btns.forEach(delete_btn => {
        delete_btn.addEventListener('click', () => {
            if (delete_btn.closest('.item_parent')) {


                let add_another_item = delete_btn.closest('.add_another_item');
                delete_btn.closest('.item_parent').remove();
                let items = add_another_item.querySelectorAll('.item');
                items.forEach((item, i) => {
                    let all_names = item.querySelectorAll('[data-name]');
                    all_names.forEach(name_ => {
                        let attr_name = name_.getAttribute('data-name');
                        name_.setAttribute("name", `items[${i}][${attr_name}]`);
                    })
                })



            }
        });
    })
// Select all password input fields
let password_inps = document.querySelectorAll('[type=password]');

// Function to toggle password visibility
function togglePasswordVisibility(pass) {
    pass.type = (pass.type === 'password') ? 'text' : 'password';
}

// Wrap each password field in a div and add an eye icon
password_inps.forEach(originalPass => {
    // Create a wrapper div
    let wrapperDiv = document.createElement('div');
    wrapperDiv.classList = 'relative'

    // Create a clone of the original password field
    let pass = originalPass.cloneNode(true);
    pass.classList.add('w-full')

    // Create an eye icon element
    let eyeIcon = document.createElement('div');
    eyeIcon.innerHTML = '<svg viewBox="0 0 24 24" width="18" height="18" stroke="#333" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
    eyeIcon.classList = 'cursor-pointer absolute top-[20px] right-[12px] translate-y-[-50%]'

    // Add a click event listener to toggle password visibility
    eyeIcon.addEventListener('click', function (event) {
        // Stop event propagation to prevent multiple clicks
        event.stopPropagation();
        togglePasswordVisibility(pass);
    });

    // Add a click event listener to the wrapper div (for event delegation)
    wrapperDiv.addEventListener('click', function (event) {
        // Check if the click target is not the password field itself
        if (event.target !== pass) {
            // Get the reference to the password field within the wrapper
            let passInWrapper = wrapperDiv.querySelector('[type=password]');
            togglePasswordVisibility(passInWrapper);
        }
    });

    // Append the eye icon and password field to the wrapper div
    wrapperDiv.appendChild(pass);
    wrapperDiv.appendChild(eyeIcon);

    // Replace the original password field with the wrapper div
    originalPass.parentNode.replaceChild(wrapperDiv, originalPass);
});


    

})

let all_imgs_ = document.querySelector('.all_imgs_');
if (all_imgs_) {
    let all_imgs_preview = document.querySelector('.all_imgs_preview');

    let all_selected_images = undefined

    const show_imgs = () => {
        if (all_selected_images) {
            console.log(all_selected_images.length, 'all_selected_images');
            let total = all_imgs_preview.childElementCount + all_selected_images.length;
            if (total < 21) {
                // all_imgs_preview.innerHTML = ''
                all_selected_images.forEach((file, i) => {
                    let get_time = new Date();
                    get_time = get_time.getTime()

                    let div = document.createElement('div');
                    div.classList.add('hover-delete')
                    div.innerHTML = `<div img-upload-id='${i}'  img-size='${file.size}' img-name='${file.name}' class='h-[9rem] border w-[9rem] overflow-hidden rounded-xl'>
                            <img src='${URL.createObjectURL(file)}' class='h-full w-full object-contain'/>
                        </div><input type='file' id='input_field_${get_time}' hidden name='image[]' />`
                    all_imgs_preview.appendChild(div);

                    let dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    document.getElementById(`input_field_${get_time}`).files = dataTransfer.files;
                })

                let del_btns = document.querySelectorAll('.hover-delete');
                del_btns.forEach(del => {
                    del.addEventListener('click', () => {
                        del.remove();
                    })
                })
            } else {
                all_imgs_.value = '';
                all_imgs_.FileList = '';
                Snackbar.show({
                    pos: 'bottom-center',
                    text: 'Add Maximum 20 Images',
                    backgroundColor: '#ef4444',
                    actionTextColor: '#fff'
                });
            }
        }
    }


    all_imgs_.addEventListener('change', () => {
        // all_imgs_preview.innerHTML = '';
        // all_imgs_preview.classList.add('mt-3');
        if ((all_imgs_.files).length <= 5) {
            all_selected_images = [...all_imgs_.files]
            let ok = true;

            if (document.querySelector('.error-field-custom-validation.image')){
                document.querySelector('.error-field-custom-validation.image').remove()
            }

            all_selected_images.forEach(img => {
                if (img.size > 8000000) {
                    ok = false;
                    console.log(img);
                    all_imgs_.value = '';
                    all_imgs_.FileList = '';
                }
            })
            if (ok) {
                show_imgs()
            } else {
                Snackbar.show({
                    pos: 'bottom-center',
                    text: 'Max image size limit is 8MB',
                    backgroundColor: '#ef4444',
                    actionTextColor: '#fff'
                });
            }
        } else {
            all_imgs_.value = '';
            all_imgs_.FileList = '';
            Snackbar.show({
                pos: 'bottom-center',
                text: 'Add Maximum 5 Images',
                backgroundColor: '#ef4444',
                actionTextColor: '#fff'
            });
        }

    })
}


let upload_preview = document.querySelectorAll('.upload_preview');
if (upload_preview.length > 0) {
    upload_preview.forEach(parent => {
        let inp = parent.querySelector('input[type="file"]')
        let img = parent.querySelector('img');
        inp.addEventListener('input', () => {
            if (inp.value != "") {
                img.src = URL.createObjectURL(inp.files[0]);
            } else {
                img.src = "/assets/images/user.svg";
            }
        })
    })
}

let accordion_p = document.querySelectorAll('.accordion_p');
if (accordion_p.length > 0) {

    accordion_p.forEach((all, i) => {
        let body = all.querySelector('.accordion_body')
        if (i != 0) {
            body.classList.add('hidden')
        }
    })

    accordion_p.forEach(accordion => {
        let header = accordion.querySelector('.accordion_header')
        let body = accordion.querySelector('.accordion_body')

        header.addEventListener('click', () => {
            body.classList.toggle('hidden');
        })
    })
}

{
    document.addEventListener('DOMContentLoaded', () => {
        let chat_now_btn = document.querySelectorAll('.chat_now_btn');
        chat_now_btn.forEach(btn => {
            btn.addEventListener('click', () => {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let TOKEN = document.querySelector('.TOKEN').value;

                var myHeaders = new Headers();
                myHeaders.append("Authorization", "Bearer " + TOKEN);
                myHeaders.append("Accept", "application/json");
                myHeaders.append("X-CSRF-TOKEN", csrfToken);

                var formdata = new FormData();
                formdata.append("recipient_id", btn.getAttribute('data-id'));
                formdata.append("message", 'Hey There!');

                var requestOptions = {
                    method: 'POST',
                    headers: myHeaders,
                    body: formdata,
                    redirect: 'follow'
                };

                fetch('/api/mp/start/chat', requestOptions)
                    .then(response => response.json())
                    .then(result => {
                        if (result.status == 200) {
                            console.log(result);
                            window.location.href = btn.getAttribute('route') + "?chat=" + result.chat_id;
                        }
                    })
                    .catch(error => console.log('error', error));
            })
        })
    })
}

document.addEventListener('DOMContentLoaded', () => {
    let asap = document.querySelector('#ASAP');
    if (asap) {
        asap.addEventListener('change', () => {
            let specific_section = document.querySelector('.specific_section input');
            specific_section.value = '';
            console.log('asdsa');
        })
    }

    let no_help = document.querySelector('#no_help');
    if (no_help) {
        no_help.addEventListener('change', () => {
            let helper_count = document.querySelector('[name="helpers_count"]');
            let parent = helper_count.parentElement;
            if (parent) {
                let text = parent.querySelector('.counter_text');
                let counter_input = parent.querySelector('.counter_input');
                text.innerText = '0';
                counter_input.value = '0';
            }
        })
    }
});


document.addEventListener('DOMContentLoaded', () => {
    let counter_inps = document.querySelectorAll('.count.counter_input');
    counter_inps.forEach(inp => {
        let parent = inp.closest('.step_two');
        if(parent){
            let start_guess = parent.querySelector('.start_guess');
            let end_guess = parent.querySelector('.end_guess');
            if(end_guess && start_guess){
                inp.addEventListener('input', () => {
                    let active_tab = document.querySelector('.active_tab.border-blue-600');
                    let inner_text = active_tab.querySelector('.total_count_inside');
                    
                    let cat_total = count_all_cat();
                    if(cat_total == '0'){
                        inner_text.classList.add('hidden')
                    }else{
                        inner_text.classList.remove('hidden')
                        inner_text.innerText = cat_total;
                    }

                    let total = count_all_inventory();
                    start_guess.innerText = ((total -1) > 0 ? total - 1 : 0).toFixed(2);
                    end_guess.innerText= total.toFixed(2);


                })
            }
        }

    });

    function count_all_inventory() {
        let total = 0;
        counter_inps.forEach(inp => {
            let parent_inventory = inp.closest('.parent_inventory');
            let weight = parent_inventory.querySelector('.weight');
            total += +(inp.value) * +(weight.value);
        });
        return total
    }


    function count_all_cat(){
        let total = 0;
        let p = document.querySelector('.active_panel:not(.hidden)');
        let counter = p.querySelectorAll('.count.counter_input');
        counter.forEach(inp => {
            total += +(inp.value);
        });

        return total
    }
})

document.addEventListener('DOMContentLoaded',()=>{
    setTimeout(() => {
        let minimum_zero = document.querySelector('.minimum_zero');
        if(minimum_zero){
            minimum_zero.addEventListener('input',(e)=>{
                let inp = e.target;
                if(!(inp.value > 0)){
                    inp.value = '';
                }
            })
        }
    }, 300);
})


document.addEventListener("wheel", function(event){
    if(document.activeElement.type === "number"){
        document.activeElement.blur();
    }
});