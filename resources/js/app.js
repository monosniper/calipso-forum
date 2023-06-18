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
