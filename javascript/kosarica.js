$(document).ready( function()
{
    if(localStorage.getItem('kosarica')=== null)
        localStorage.setItem('kosarica',0);
    dohvati_kosaricu();


    $('#dodaj').on('click',dodaj_proizvod);
    $('#find_best_offer').on('click',nadi_najpovoljnije);

});

function dodaj_proizvod(btn_id){

    let proizvod = $('#pr_'+btn_id).html();
    let key = 'pr_'+koliko;

    localStorage.setItem(key,proizvod);
    let t = parseInt(localStorage.getItem('kosarica'));
    t++;

    localStorage.setItem('kosarica',t);
}

function nadi_najpovoljnije(){
    koliko = 0;
    let proiz = [];
    let a = parseInt(localStorage.getItem('kosarica'));

    while(a){
        let key = 'pr_'+koliko;
        let koji = localStorage.getItem(key);

        if(koji === null)koliko++;
        else{
            proiz.push(koji);
            a--;
            koliko++;
        }
    }

    var data = proiz.join(',');
    window.location = "index.php?rt=stores/najboljaCijena&data="+data; 
}

function dohvati_kosaricu(){

    koliko = 0;
    let a = parseInt(localStorage.getItem('kosarica'));
    let div = $('#cart').html("");
    console.log(a);

    while(a>0){
        let key = 'pr_'+koliko;
        let koji = localStorage.getItem(key);

        if(koji === null)koliko++;

        else{
            let brisanje = $('<button onClick="obrisi_proizvod(this.id) "></button>');

            div.append($('<span>').append(koji+'<br>').prop('id',key).append(brisanje.append('Ukloni iz košarice'+'<br>').prop('id',key)));
            a--;
            koliko++;
        }
    }
}

function obrisi_proizvod(id_b){

    localStorage.removeItem(id_b);
    let t = parseInt(localStorage.getItem('kosarica'));
    t--;
    console.log(t);
    localStorage.setItem('kosarica', t);
    dohvati_kosaricu();
}
