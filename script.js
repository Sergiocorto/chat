//Кнопки "Контакты" и "Войти"
let contactsBtn = document.querySelector('#contacts-btn');
let logInBtn = document.querySelector('#log-in-btn');

//Модальные окна
let contactsModal = document.querySelector('#contacts-modal');
let logInModal = document.querySelector('#log-in-modal');
let infoModal = document.querySelector('.modal');

//Кнопки закрытия модальных окон
let closeContactsBtn = contactsModal.querySelector('.close');
let closeInfoModal = infoModal.querySelector('.close');

//Функция открытия модального окна контактов
contactsBtn.addEventListener('click', function(){
    if (infoModal.style.display == 'block'){
        infoModal.style.display = 'none';
    }
    contactsModal.style.display = 'block';
});

//функция закрытия модального окна контактов
closeContactsBtn.addEventListener('click', function(){
    contactsModal.style.display = 'none';
});

//функция закрытия модального окна информации
closeInfoModal.addEventListener('click', function(){
    infoModal.style.display = 'none';
});

//функция добавления в друзья через ajax
function addFriend(element){
    let friends_list = document.querySelector("#friends_list");
    
    let link = element.dataset.link;
    
    let ajax = new XMLHttpRequest();
    ajax.open("GET", link, false);
    ajax.send();

    friends_list.innerHTML = ajax.response;
}

//функция удаления из друзей через ajax
function deleteFriend(element){
    let friends_list = document.querySelector("#friends_list");
    
    let link = element.dataset.link;
    
    let ajax = new XMLHttpRequest();
    ajax.open("GET", link, false);
    ajax.send();

    friends_list.innerHTML = ajax.response;
}

//выовод пользователей при поиске
let search = document.querySelector("#search");
console.dir(search);
search.onsubmit = function(e){
    e.preventDefault();
    console.dir(e);
    let userSearch = search.querySelector("input");
    console.dir(userSearch.value);
    let dannie = "send=1" + "&search=" + userSearch.value;
    let ajax = new XMLHttpRequest();
    ajax.open("POST", search.action, false);
    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    ajax.send(dannie);
    console.dir(dannie);
    
    
    let usersList = document.querySelector("#usersList");
    console.dir(ajax.response);
    usersList.innerHTML = ajax.response;   
}


//отправка сообщения
let send = document.querySelector("#form");
send.onsubmit = function(event){
    event.preventDefault();

    let komu = send.querySelector("input[name='user_id_2']");
    let ot = send.querySelector("input[name='user_id_1']");
    let text = send.querySelector("textarea");

    let dannie = "send=1" + "&user_id_2=" + komu.value + "&user_id_1=" + ot.value + "&text=" + text.value;
    let ajax = new XMLHttpRequest();
    ajax.open("POST", send.action, false);
    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
    ajax.send(dannie);
    //console.dir(dannie);

    let messagesFeed = document.querySelector("#messages-feed");
    messagesFeed.innerHTML = ajax.response;
}