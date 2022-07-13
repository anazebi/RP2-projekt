$(document).ready( function()
{
	//localStorage.clear();
    if(localStorage.getItem('kosarica')=== null)
        localStorage.setItem('kosarica',0);
    dohvati_kosaricu();

    $('#dodaj').on('click',dodaj_proizvod);
    $('#find_best_offer').on('click',nadi_najpovoljnije);

});

function dodaj_proizvod(btn_id){

    let t = parseInt(localStorage.getItem('kosarica'));
    t++;
    let proizvod = $('#proizvod_'+btn_id).html() + ',' +  btn_id;
    let key = 'pr_'+ t;

    localStorage.setItem(key,proizvod);
    localStorage.setItem('kosarica',t);
// console.log(proizvod+' i kljuc '+key);
}

function nadi_najpovoljnije(){
    let koliko = 0;
    let proiz = [];
    let a = parseInt(localStorage.getItem('kosarica'));
    console.log(a);

    while(a){
        let key = 'pr_'+ koliko;
        let koji = localStorage.getItem(key);
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
    let a = parseInt(localStorage.getItem('kosarica'));
    let table = $('#cart_table').html("");
    console.log('ima '+ a);

    while(a > 0){
        let key = 'pr_'+ koliko;
        let koji = localStorage.getItem(key);
	// console.log(key + 'bome' + koji);
        if(koji === null) koliko++;
        else{
            let ime = koji.split(",");
            let pro = ime[0];
            let row = $('<tr></tr>');
            let but = $('<button onClick="obrisi_proizvod(this.id)" class="obrisi"></button>');

            let cell1 = $('<td style="margin-top: 10px;"></td>');
            let cell2 = $('<td style="margin-top: 10px;"></td>');

            cell1.append(pro);
            cell1.prop('id', key);
            but.prop('id', key);
            but.html("Ukloni iz košarice");
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

    localStorage.removeItem(id_b);
    let t = parseInt(localStorage.getItem('kosarica'));
    t--;
    console.log(t);
    localStorage.setItem('kosarica', t);
    dohvati_kosaricu();
}
