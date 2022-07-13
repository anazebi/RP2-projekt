$(document).ready( function()
{
//sessionStorage.clear();
    if(sessionStorage.getItem('kosarica')=== null)
        sessionStorage.setItem('kosarica',0);
    dohvati_kosaricu();

    $('#dodaj').on('click',dodaj_proizvod);
    $('#find_best_offer').on('click',nadi_najpovoljnije);

});

function dodaj_proizvod(btn_id){

    let t = parseInt(sessionStorage.getItem('kosarica'));
    t++;
    let proizvod = $('#proizvod_'+btn_id).html() + ',' +  btn_id;
    let key = 'pr_'+ t;

    sessionStorage.setItem(key,proizvod);
    sessionStorage.setItem('kosarica',t);
    console.log(proizvod+' i kljuc '+key);
}

function nadi_najpovoljnije(){
    let koliko = 0;
    let proiz = [];
    let a = parseInt(sessionStorage.getItem('kosarica'));
    console.log(a);

    while(a > 0){
        let key = 'pr_'+ koliko;
        let koji = sessionStorage.getItem(key);
        let polje = "";
        if (koji !== null) polje = koji.split(",");

        if(koji === null) koliko++;
        else{
            if(polje[0] !== "") proiz.push(polje[1]);
            a--;
            koliko++;
        }
    }

    var cart = proiz.join(',');
    window.location = "index.php?rt=stores/najboljaCijena&cart="+cart;

}

function dohvati_kosaricu(){

    let koliko = 0;
    let a = parseInt(sessionStorage.getItem('kosarica'));
    let table = $('#cart_table').html("");
    console.log('ima '+ a);

    while(a > 0 ){
        let key = 'pr_'+ koliko;
        let koji = sessionStorage.getItem(key);
	console.log(key + 'bome' + koji);
        if(koji === null) koliko++;
        else{
            let row = $('<tr></tr>');
            let but = $('<button onClick="obrisi_proizvod(this.id)" class="obrisi"></button>');

            let cell1 = $('<td style="margin-top: 10px;"></td>');
            let cell2 = $('<td style="margin-top: 10px;"></td>');

            cell1.append(koji);
            cell1.prop('id', key);
            but.prop('id', key);
            but.html("Ukloni iz koÅ¡arice");
            cell2.append(but);

            row.append(cell1);
            row.append(cell2);
            table.append(row);
            a--;
            koliko++;
	    }
    }
}

function obrisi_proizvod(id_b){

    sessionStorage.removeItem(id_b);
    let t = parseInt(sessionStorage.getItem('kosarica'));
    t--;
    console.log(t);
    sessionStorage.setItem('kosarica', t);
    dohvati_kosaricu();
}

