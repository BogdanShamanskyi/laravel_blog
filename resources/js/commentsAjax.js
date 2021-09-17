document.addEventListener("DOMContentLoaded", function(event) {
    let comments = document.querySelector('.comments'),
        form = document.getElementById('commentform'),
        submit = document.getElementById('addComment'),
        url = window.location.pathname + '/comments';

    (function getComments() {
        let request = new XMLHttpRequest();
        request.open('GET', url);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send();
        request.addEventListener('readystatechange', function () {
            if (request.readyState === 4 && request.status === 200) {
                let data = JSON.parse(request.responseText);

                for (let index in data) {
                    comments.prepend(cardComment(data, index));
                }
            }
        });
    })();

    (function postComment() {
        submit.addEventListener('click', (e) => {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: url,
                headers: {'X-CSRF-TOKEN': 'meta[name="csrf-token"]'},
                data: $('#commentform').serialize(),
                success: function (data) {
                    comments.prepend(cardComment(data));
                    form.querySelectorAll('input')[1].value = '';
                    form.querySelector('textarea').value = '';

                    if (form.contains(document.getElementById('commerr'))) {
                        document.getElementById('commerr').remove();
                    }
                },
                error: function (errors) {
                    postErrors(errors.responseJSON.errors, $('#commentform'));
                }
            });

        });
    })();
});

function cardComment(data, index = false) {
    let card = document.createElement('div'),
        card_header = document.createElement('div'),
        author = document.createElement('div'),
        date = document.createElement('div'),
        card_body = document.createElement('div'),
        card_content = document.createElement('p'),
        strong = document.createElement('strong'),
        iUser = document.createElement('i'),
        iClock = document.createElement('i');

    card.classList.add('card', 'mb-3');
    card_header.classList.add('card-header', 'd-flex', 'justify-content-between');
    card_body.classList.add('card-body');
    card_content.classList.add('card-text');
    iUser.classList.add('fa', 'fa-user');
    iClock.classList.add('fa', 'fa-clock-o');

    card.append(card_header);
    strong.append(author);
    card_header.append(strong);
    author.append(iUser);
    author.append(' ');

    date.append(iClock);
    date.append(' ');

    card_header.append(date);
    card.append(card_body);
    card_body.append(card_content);

    if( index ) {
        author.append(data[index].author);
        date.append(data[index].date);
        card_content.append(data[index].content);
    } else {
        author.append(data.author);
        date.append(data.date);
        card_content.append(data.content);
    }

    return card;    
}

function postErrors(errors, formId) {
    $('#commerr').remove();
    let alert = $('<div class="alert alert-danger" id="commerr" role="alert"><ul class="mb-0"></ul></div>');
        formId.prepend(alert);
        for(let i in errors) {
            alert.first().append('<li>'+errors[i][0]+'</li>');
        }               
}