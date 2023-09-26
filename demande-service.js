(function(){
    
var services = document.querySelectorAll('.service')
var form = document.querySelector('#form-demande-service')

var serviceBorderWhite = function(services){
    services.forEach(service=>{
        service.style.border = "1px solid white"
    })
}

var serviceChoisi = null ;
/*var departement = document.querySelector('#departement').options[document.querySelector('#departement').selectedIndex].value;
var ville = document.querySelector('#ville').options[document.querySelector('#ville').selectedIndex].value;
var contact = document.getElementById('contact-client').value;
var typeContact = document.querySelectorAll('.btn-type-contact')[0].innerHTML;
var nom = document.getElementById('nom-client').value;
var prenom = document.querySelector('#prenom-client').value;*/



services.forEach(service=>{
    service.addEventListener('click',function(e){
        e.preventDefault()
        targetBorder = e.target.parentElement.border
        serviceBorderWhite(services)
        e.target.parentElement.style.border = "3px solid yellow"
        serviceChoisi = e.target.parentElement.querySelector('h5').innerHTML
        serviceVoulu = serviceChoisi

        document.querySelector('#service-voulu h4').innerHTML = "Vous avez selectionnez le service "
        document.querySelector('#service-voulu p').innerHTML = serviceVoulu
        window.location.href = "./#form-demande-service"

    })
})

var btnsTypeContact = document.querySelectorAll('.btn-type-contact')
btnsTypeContact.forEach(btn=>{
    btn.addEventListener('click',function(){
        typeContact = this.innerHTML
        btnsTypeContact[0].style.backgroundColor = '#fff'
        btnsTypeContact[1].style.backgroundColor = '#fff'
        btnsTypeContact[0].style.color = '#0F3A64'
        btnsTypeContact[1].style.color = '#0F3A64'
        this.style.backgroundColor = "#000"
        this.style.color = "#fff"
    })
})


var xhr = new XMLHttpRequest()
var formData = new FormData()
document.querySelector('#submit-demande-service').addEventListener('click',function(e){
    e.preventDefault();
    if(serviceChoisi !== null && serviceChoisi !== undefined){
        formData.append('service', serviceChoisi);
    }
   // if(departement !== null && departement !== undefined){
        formData.append('departement', departement);
        formData.append('departement', document.querySelector('#departement').options[document.querySelector('#departement').selectedIndex].value);

    //}
    //if(ville !== null && ville !== undefined){
        formData.append('ville', document.querySelector('#ville').options[document.querySelector('#ville').selectedIndex].value);
        console.log(document.querySelector('#ville').options[document.querySelector('#ville').selectedIndex].value)
    //}
    //if(contact !== null && contact !== undefined){
        formData.append('contact', document.getElementById('contact-client').value);
    //}
    formData.append('typeContact', typeContact)
    //if(nom !== null && nom !== undefined){
        formData.append('nom', document.getElementById('nom-client').value);
        formData.append('prenom', document.querySelector('#prenom-client').value)
    //}

 
    xhr.onreadystatechange = function(e){
        var popup= document.querySelector("#popup-form-service");
        var fermerPopup = document.querySelector("#fermer-popup");    
        if(this.readyState === 4 ){
            reponseServer = JSON.parse(xhr.responseText);
            if(this.status === 200){
                if(reponseServer['result'] == "success"){
                    popup.querySelectorAll('div').forEach(div=>{
                        popup.removeChild(div)
                    })
                    var divElementPopup = document.createElement('div');
                    divElementPopup.classList.add('div-success')
                    divElementPopup.innerHTML = reponseServer['message'];
                    popup.appendChild(divElementPopup)
                    console.log(reponseServer['datas'])
                }
            }
        }else{
            var erreurs = JSON.parse(xhr.responseText);
            popup.querySelectorAll('div').forEach(div=>{
                popup.removeChild(div)
            })
            if(erreurs.length > 0){
                erreurs.forEach(erreur=>{
                    var spanErreur = document.createElement('div')
                    spanErreur.classList.add('div-erreur')
                    spanErreur.innerHTML = erreur;
                    popup.appendChild(spanErreur)
                });
            }
        }
        popup.style.display = 'inline-block';
        fermerPopup.addEventListener('click',function(){
            popup.style.display = 'none'
        })

        popup.addEventListener('click',function(){
            popup.style.display = 'none'
        })

    }
    xhr.open(form.getAttribute('method'),form.getAttribute('action'), true)
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.send(formData);
    });

})()