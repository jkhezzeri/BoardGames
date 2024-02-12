const add_input = document.querySelector('#add_input');
const form_search = document.querySelector('#form_search');

const form_insert = document.querySelector('#form_insert');





const add_name = document.querySelector('#add_name');
const add_year = document.querySelector('#add_year');
const add_min_play = document.querySelector('#add_min_play');
const add_max_play = document.querySelector('#add_max_play');
const add_age = document.querySelector('#add_age');
const add_time = document.querySelector('#add_time');
const add_designer = document.querySelector('#add_designer');
const add_artist = document.querySelector('#add_artist');
const add_publisher = document.querySelector('#add_publisher');
const add_description = document.querySelector('#add_description');

const bgg_id = document.querySelector('#bgg_id');
const add_image = document.querySelector('#add_image');





form_search.addEventListener("submit", e => {
    e.preventDefault();
    if (add_input.value != "") {
        form_insert.classList.remove('d-none');
        form_insert.classList.add('d-block');
        getGameId(add_input.value);
    } else {
        form_insert.classList.add('d-none');
        form_insert.classList.remove('d-block');
        form_insert.reset();
        add_image.src = "";
    }
});


function getGameId(name) {
    let request = new XMLHttpRequest();
    request.open("GET", "https://boardgamegeek.com/xmlapi2/search?query=" + name + "&type=boardgame&exact=1", false);
    request.send();

    const xmlDoc = request.responseXML;

    let id = xmlDoc.querySelector('item').getAttribute('id');

    getGameData(id);
}



function getGameData(id) {

    let request = new XMLHttpRequest();
    request.open("GET", "https://www.boardgamegeek.com/xmlapi2/thing?id=" + id, false);
    request.send();

    const xmlDoc = request.responseXML;

    add_name.value = xmlDoc.querySelectorAll('name')[0].getAttribute('value');
    add_year.value = xmlDoc.querySelector('yearpublished').getAttribute('value');
    add_min_play.value = xmlDoc.querySelector('minplayers').getAttribute('value');
    add_max_play.value = xmlDoc.querySelector('maxplayers').getAttribute('value');
    add_age.value = xmlDoc.querySelector('minage').getAttribute('value');
    add_time.value = xmlDoc.querySelector('playingtime').getAttribute('value');
    let designers = xmlDoc.querySelectorAll('[type="boardgamedesigner"]');
    let d_list = [];
    designers.forEach(d => {
        d_list.push(d.getAttribute('value'));
    });
    add_designer.value = d_list.join('/');
    let artists = xmlDoc.querySelectorAll('[type="boardgameartist"]');
    let a_list = [];
    artists.forEach(a => {
        a_list.push(a.getAttribute('value'));
    });
    add_artist.value = a_list.join('/');
    add_publisher.value = xmlDoc.querySelectorAll('[type="boardgamepublisher"]')[0].getAttribute('value');
    
    let categories = xmlDoc.querySelectorAll('[type="boardgamecategory"]');
    let c_list = [];
    categories.forEach(c => {
        c_list.push(c.getAttribute('value'));
    });
    add_category.value = c_list.join('/');
    let mechanics = xmlDoc.querySelectorAll('[type="boardgamemechanic"]');
    let m_list = [];
    mechanics.forEach(m => {
        m_list.push(m.getAttribute('value'));
    });
    add_mechanic.value = m_list.join('/');
    
    
    add_description.value = xmlDoc.querySelector('description').textContent.replaceAll('&#10;', '<br/>');
    
    bgg_id.value = xmlDoc.querySelector('item').getAttribute('id');
    add_image.src = xmlDoc.querySelector('image').textContent;

}



