document.addEventListener("DOMContentLoaded", function (event) {

    const home = document.querySelector('.home');
    if (home) {
        new Splide('.splide', {
            type: 'loop',
            autoplay: true
        }).mount();
    };

    new SimpleLightbox({ elements: '.gallery a' });

    const entrevues = document.querySelector(".page-template-template-entrevues");
    if (entrevues) {
        document.querySelector("button.btn-all").disabled = true;;
    };


});

function showInterviewType(type) {


    document.querySelectorAll("button").forEach((item) => {
        item.disabled = false;
    });

    switch (type) {
        case 'audio':
            document.querySelector("button.btn-audio").disabled = true;
            break;
        case 'video':
            document.querySelector("button.btn-video").disabled = true;
            break;
        case 'text':
            document.querySelector("button.btn-text").disabled = true;
            break;
        default:
            document.querySelector("button.btn-all").disabled = true;
            break;
    }



    const allInterviews = document.querySelectorAll("a.entrevue");
    for (var i = 0; i < allInterviews.length; i++) {
        const link = allInterviews[i];
        if (type == 'all') {
            link.style.display = 'block';
        } else if (type == link.dataset.type) {
            link.style.display = 'block';
        } else {
            link.style.display = 'none';
        }
    }
}