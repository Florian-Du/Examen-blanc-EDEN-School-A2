// Function pour que toutes les checkboxx ne soient pas cocher en meme temps
function checkbox(event) {
    // je recupere toutes les checkbox
    var lescheckbox = document.getElementsByClassName('lescheckbox')
    // si celle que je coche devient cocher alors je rentre dans la boucle sinon je ne fait rien
    if (event.target.checked == true) {
        // je boucle sur toutes les checkbox 
        for (let i = 0; i < lescheckbox.length; i++) {
            // je les decoche toutes
            lescheckbox[i].checked = false;
        }
        // et je recoche la checkbox voulue
        event.target.checked = true;
    }
}

// function pour que le bloc filtre se retracte
function menuFiltre() {
    var menu1 = document.getElementById('bloc-filtre-retracter');
    var menu2 = document.getElementById('bloc-filtre');
    menu1.style.display = 'block';
    menu2.style.display = 'none';

    //Animation lors du click pour l'apparition du menu
    menu1.animate([
        { // from
            opacity: 0,
        },
        { // to
            opacity: 1,
        }
    ], 2000);
}
// function pour que le bloc filtre s'agrandissent
function menuFiltreOpen() {
    var menu1 = document.getElementById('bloc-filtre-retracter');
    var menu2 = document.getElementById('bloc-filtre');
    menu1.style.display = 'none';
    menu2.style.display = 'block';

    //Animation lors du click pour l'apparition du menu
    menu2.animate([
        { // from
            opacity: 0,
        },
        { // to
            opacity: 1,
        }
    ], 2000);
}

//function pour fermer la pop up du livre
function fermermenubook(event) {
    var body = document.getElementById('body');
    var lefond = document.getElementById('bookbackground');
    body.removeChild(lefond);
    body.removeChild(event.path[1]);
}

//reuete pour avoir les description et image du livre par rapport au titre
function makeRequest(titre) {
    // si la fonction make request est appeller je requete l'api avec le titre du livre en aprametre
    var request = new XMLHttpRequest();
    request.open('GET', "https://www.googleapis.com/books/v1/volumes?q="+titre);
    request.responseType = 'json';
    // une fois que le serveur repond je creer toutes la mise en page
    request.onload = function() {

        var requete = request.response.items[0];
        var body = document.getElementById('body')
        //div du background avec l'opacite
        var div = document.createElement('DIV');
        div.setAttribute('id','bookbackground')
        body.appendChild(div);
        // grosse div qui contient tous le conteue
        var div = document.createElement('DIV');
        div.setAttribute('class','bookfenetre')
        body.appendChild(div);
        // boutton pour tous fermer la pop up
        var bouttonFermer = document.createElement('p');
        bouttonFermer.innerHTML = 'Fermer X';
        bouttonFermer.setAttribute('onclick','fermermenubook(event)')
        bouttonFermer.setAttribute('class','boutonfermerbook')
        div.appendChild(bouttonFermer);

        // div de gauche regroupant le titre et la description
        var div2 = document.createElement('div2');
        div2.setAttribute('class','div2book')
        div.appendChild(div2);
        // titre du livre
        var titre = document.createElement('h2');
        titre.innerHTML = requete.volumeInfo.title
        titre.setAttribute('class','titre2book')
        div2.appendChild(titre);
        // description du livre
        var description = document.createElement('p');
        description.innerHTML = requete.volumeInfo.description
        description.setAttribute('class','content2book')
        div2.appendChild(description);
        // image de couverture du livre
        var image = document.createElement('IMG');
        description.innerHTML = requete.volumeInfo.description
        image.setAttribute('src',requete.volumeInfo.imageLinks.thumbnail)
        image.setAttribute('class','img2book')
        div.appendChild(image);
    };

    request.send();
}
//function pour activer le boutton effacer filtres lors d'un changeent de filtre
function activeButton() {
    var leboutton = document.getElementById('buttondelete');
    if (leboutton.style.display !== 'inline-block') {
        leboutton.animate([
            { // from
                opacity: 0,
            },
            { // to
                opacity: 1,
            }
        ], 2000);
    }
    leboutton.style.display = 'inline-block';
}



