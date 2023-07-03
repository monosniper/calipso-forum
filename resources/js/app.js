import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.showComment = () => {
    const commentArea = document.getElementById("comment-area");
    commentArea.classList.remove("hide");
}

//Reply
window.showReply = (id) => {
    const replyArea = document.getElementById("reply-area-"+id);
    replyArea.classList.remove("hide");
}

const support = document.querySelector('#support')

const updateChat = () => {
    return fetch('/chat').then(rs => rs.text()).then(rs => {
        support.innerHTML = rs

        const supportRefresh = document.querySelector('#support-refresh')

        supportRefresh.onclick = () => {
            supportRefresh.innerText = '...'
            updateChat()
        }

        const supportToggler = document.querySelector('#support-toggler')

        supportToggler.onclick = () => {
            console.log('hello')
            document.querySelector('#support').classList.toggle('active')
            supportToggler.classList.toggle('active')
        }

        const input = document.querySelector('#support-input')
        const send = document.querySelector('#support-send')

        send.onclick = () => {
            if(input.value.trim() !== '') {
                send.innerText = '...'
                sendMessage(input.value).then(() => document.querySelector('#support-send').innerText = 'Send')
            }
        }
    }).then(() => document.querySelector('#support-refresh').innerText = 'Refresh')
}

support && updateChat()

const sendMessage = (text) => {
    return fetch('/chat/send', {
        method: 'POST',
        body: JSON.stringify({text}),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
    }).then(updateChat)
}
