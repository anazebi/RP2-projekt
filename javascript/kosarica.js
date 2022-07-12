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
    let proizvod = $('#proizvod_'+btn_id).html();
    let key = 'pr_'+ t;

    localStorage.setItem(key,proizvod);
    localStorage.setItem('kosarica',t);
console.log(proizvod+' i kljuc '+key);
}

function nadi_najpovoljnije(){
    let koliko = 0;
    let proiz = [];
    let a = parseInt(localStorage.getItem('kosarica'));

    while(a){
        let key = 'pr_'+ koliko;
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

    let koliko = 0;
    let a = parseInt(localStorage.getItem('kosarica'));
    let div = $('#cart').html("");
    console.log('ima '+ a);

    while(a>0){
        let key = 'pr_'+ koliko;
        let koji = localStorage.getItem(key);
	console.log(key + 'bome' + koji);
        if(koji === null)koliko++;

        else{
            let span = $('<span>');
                let but = $('<button onClick="obrisi_proizvod(this.id) "></button>');

                span.append(koji);
                span.append('<br>');
                span.prop('id', key);
                but.append("Obriši iz košarice");
                but.prop('id', key);
    
                span.append(but);
                span.append('<br>');
                div.append(span);
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
