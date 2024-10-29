let API = {
    get_all: "/api/mp/messages/",
    get_single: "/api/mp/messages/",
    send: "/api/mp/message/new",
}

let TOKEN = document.querySelector('.TOKEN').value;
let USER_ID = document.querySelector('.USER_ID').value;
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

let chat_sidebar = document.querySelector('.chat_sidebar');
let chat_area_main = document.querySelector('.chat-area-main');
let dummy_img = '/assets/images/user.svg';
let username_top = document.querySelector('.username_top');
let user_profile = document.querySelector('.user-profile');
let user_detail = document.querySelector('.user_detail');
let message_send_btn = document.querySelector('.message_send_btn');
let message_input = document.querySelector('.message_input');
let attachment_inp = document.querySelector('.attachment_inp');

const get_id_from_url = () => {
    const queryParams = new URLSearchParams(window.location.search);
    const chat_id = queryParams.get("chat");
    return chat_id
}

function condition_fn(obj) {
    let first_name = obj?.first_name ? obj?.first_name : "";
    let last_name = obj?.last_name ? obj?.last_name : "";
    let id = obj.id;
    let image = obj.profile_picture ? obj.profile_picture : dummy_img
    return {
        "full_name": first_name + " " + last_name,
        "id": id,
        "image": image
    }
}

const get_user_detail = (data) => {
    let MY = {};
    let SENDER = {};

    if (data.recipient_id == USER_ID) {
        let obj = data.recipient;
        MY = condition_fn(obj);

    } else if (data.initiator_id == USER_ID) {
        let obj = data.initiator;
        MY = condition_fn(obj);
    } else {
        debugger;
    }

    if (data.initiator_id != USER_ID) {
        let obj = data.initiator;
        SENDER = condition_fn(obj);
    } else if (data.recipient_id != USER_ID) {
        let obj = data.recipient;
        SENDER = condition_fn(obj);
    } else {
        debugger;
    }

    return {
        MY,
        SENDER
    }
};

const no_message_selected = (param) => {
    let chat_area = document.querySelector('.chat-area');
    let no_div = document.querySelector('.no_message_selected');
    if (no_div) {
        if (param) {
            chat_area.classList.add('!hidden');
            user_detail.classList.add('hidden');
            no_div.classList.remove('hidden');
        } else {
            no_div.classList.add('hidden');
            chat_area.classList.remove('!hidden');
            user_detail.classList.remove('hidden');
        }
    }
}
const no_messages = (param) => {
    let chat = document.querySelector('.chat-app');
    let not_found = document.querySelector('.no_messages');
    if (chat) {
        if (param) {
            chat.classList.add('!hidden')
            not_found.classList.remove('hidden')
        } else {
            chat.classList.remve('!hidden')
            not_found.classList.add('hidden')
        }
    }
}

const render_chats = (result) => {
    if (result) {
        console.log(result); 
        let messages = result.conversation.messages;
        if (true) {
            let custom_data = get_user_detail(result.conversation);
            let img = custom_data.SENDER.image;
            let owner_name = custom_data.SENDER.full_name;

            if (user_profile.src != img) {
                user_profile.src = img;
            }
            if ((username_top.innerText).trim() != owner_name) {
                username_top.innerText = owner_name;
            }
            chat_area_main.innerHTML = ''
            messages.forEach(message => {
                let div = document.createElement('div');
                let owner = message.sender_id == USER_ID;

                user_detail.classList.remove('hidden')
                const formattedDate = new Date(message.created_at).toLocaleString("en-US", {
                    year: "numeric",
                    month: "short",
                    day: "numeric",
                    hour: "numeric",
                    minute: "numeric",
                    hour12: true,
                });
                if(message?.message == null &&!(message?.media[0]?.path)){
                }
                div.innerHTML = `
                    <div class="chat-msg ${owner && "owner"} ${message?.message == null &&!(message?.media[0]?.path) && '!hidden'} group !pt-3">
                        <div class="chat-msg-profile">
                            <div class="chat-msg-date">${formattedDate}</div>
                        </div>
                        <div class="chat-msg-content">
                            <div class="chat-msg-text">${(message.message) != null ? message.message : message?.media[0]?.path ? `<div class="cursor-pointer"><img class="object-contain max-h-[18rem] max-w-[12rem]" src='${message?.media[0]?.path}' /></div>` : "Media Error ❌"}</div>
                        </div>
                    </div>
                `;
                chat_area_main.appendChild(div);
            });
            chat_area_main.scroll({
                top: chat_area_main.scrollHeight
            });
        }
    }
}

const fetch_chat_from_url = () => {
    const chat_id = get_id_from_url();
    if (chat_id) {
        no_message_selected(false)
        let thread_active = document.querySelector(`.side_thread_dynamic[chat-id="${chat_id}"]`)
        if (thread_active) {
            let all_thread = document.querySelectorAll(`.side_thread_dynamic`);
            all_thread.forEach(all => all.classList.remove('active'))
            thread_active.classList.add('active');
            thread_active.classList.remove('unread');

            let status = thread_active.getAttribute('status');

            let chat_closed_footer = document.querySelector('.chat_closed_footer');
            let chat_inp_footer = document.querySelector('.chat_inp_footer');

            if(status == "0"){
                chat_closed_footer.classList.remove('hidden')
                chat_inp_footer.classList.add('hidden')
            }else{
                chat_closed_footer.classList.add('hidden')
                chat_inp_footer.classList.remove('hidden')
            }
        }
        var myHeaders = new Headers();
        myHeaders.append("Accept", "application/json");
        myHeaders.append("Authorization", "Bearer " + TOKEN);

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };

        fetch(API['get_single'] + chat_id, requestOptions)
            .then(resp => resp.json())
            .then(result => {
                render_chats(result);
            })
            // .catch(error => {
            // });
    } else {
        no_message_selected(true);
    }
}


{
    var myHeaders = new Headers();
    myHeaders.append("Accept", "application/json");
    myHeaders.append("Authorization", "Bearer " + TOKEN);

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
    };

    {
        let chat = document.querySelector('.chat-app');
        let not_found = document.querySelector('.no_messages');
        chat.classList.add('!hidden')
        not_found.classList.remove('hidden')
    }

    fetch(API['get_all'], requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result);
            if (result.message) {
                let list = result.convo
                if (list.length > 0) {
                    {
                        let chat = document.querySelector('.chat-app');
                        let not_found = document.querySelector('.no_messages');
                        chat.classList.remove('!hidden')
                        not_found.classList.add('hidden')
                    }

                    list.forEach((thread) => {
                        let final_data;
                        if (thread.initiator_id != USER_ID) {
                            final_data = thread.initiator;
                        }

                        if (thread.recipient_id != USER_ID) {
                            final_data = thread.recipient;
                        }
                        if (final_data) {
                            let div = document.createElement('div');
                            div.innerHTML = `
                            <div class="hover:bg-gray-50 flex items-center justify-between">
                                <div class="msg chat-side-bar-avatar flex-1 side_thread_dynamic ${thread.unread_count > 0 && 'unread'}" chat-id="${thread.id}" status="${thread.status}" id="${final_data.id}">
                                    <img class="msg-profile" src="${final_data.profile_picture ? final_data.profile_picture : dummy_img}">
                                    <div class="msg-detail">
                                    <div class="msg-username line-clamp-1">${final_data.first_name ? final_data.first_name : ""} ${final_data.last_name ? final_data.last_name :""}</div>
                                        <div class="msg-content">
                                            <span class="msg-message">${thread?.last_message ? thread?.last_message?.message ? thread?.last_message?.message : "🖼" : ''}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                            chat_sidebar.appendChild(div);

                            div.onclick = () => {
                                if (history.pushState) {
                                    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?chat=' + thread.id;
                                    window.history.pushState({
                                        path: newurl
                                    }, '', newurl);
                                    fetch_chat_from_url()
                                };
                            }
                        }
                    })
                } else {
                    no_messages(true)
                }
            } else {
            }
        })
}

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        fetch_chat_from_url();
    }, 500);
})

const send_img = (img)=>{
    let div = document.createElement('div');
    div.classList = 'chat-msg owner group !pt-3';
    div.innerHTML = `
        <div class="chat-msg-content">
            <div class="chat-msg-text img_overlay">
                <div class="cursor-pointer">
                    <img class="object-contain max-h-[18rem] max-w-[12rem]"
                        src="${img}">
                </div>
            </div>
        </div>
    `;
    chat_area_main.appendChild(div);
}

const send_message = (attachment) => {

    let active_chat = document.querySelector('.side_thread_dynamic.active');

    if ((message_input.value.trim() != "" && active_chat) || attachment) {
        var myHeaders = new Headers();
        myHeaders.append("Authorization", "Bearer " + TOKEN);
        myHeaders.append("Accept", "application/json");
        myHeaders.append("X-CSRF-TOKEN", csrfToken);

        var formdata = new FormData();
        formdata.append("recipient_id", active_chat.getAttribute('id'));

        console.log(attachment_inp);
        if(attachment){
            formdata.append("attachment[]", attachment_inp.files[0]);
        }else{
            formdata.append("message", message_input.value);
        }

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: formdata,
            redirect: 'follow'
        };

        fetch(API.send, requestOptions)
            .then(response => response.json())
            .then(result => {
                if (result.status == 200) {
                    message_input.value = ''
                }
            })
    }

}
{
    attachment_inp.addEventListener('input',()=>{
        if(attachment_inp.value != ""){
            send_message(true);
            if(attachment_inp.files[0]){
                send_img(URL.createObjectURL(attachment_inp.files[0]));
            }
        }
    }) 
}
{
    message_input.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            send_message();
        }
    });

    message_send_btn.addEventListener('click', ()=>{
        send_message();
    })
}

socket.on('send_message:send_message', (data) => {
    if (data.conversation.id == get_id_from_url()) {
        render_chats(data);
    } else {
        let side_thread_dynamic = document.querySelector(`.side_thread_dynamic[chat-id="${data.conversation.id}"]`);
        if (side_thread_dynamic) {
            side_thread_dynamic.classList.add('unread')
            // if(!(location.href.includes('chat'))){
                Snackbar.show({
                    pos: 'bottom-center',
                    text: 'New Message Received',
                    backgroundColor: '#007AFE',
                    actionTextColor: '#fff'
                });
            // }
        }
    }

})
