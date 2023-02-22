var map = L.map('favorite_map');
map.setView([36.0047, 137.5936], 5);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

$('html').animate({scrollTop:position}, speed, 'swing');

function make_marker(params) {
    params.forEach(element => {
        L.marker([element['lat'], element['long']]).addTo(map).bindPopup('<a href="#info'+element['id']+'" class="marker_css">'+element['tittle']+'</a>').on('click',(e)=>{
            window.location.hash = '#info'+element['id'];
            $('#info'+element['id']).css({border:'solid 10px rgba(0,255,255,0.5)',transition: '0.5s ease'});
            setTimeout(() => {$('#info'+element['id']).css('border','')}, 2000);
        });
    });
}
