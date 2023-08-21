(function(){
    
var services = document.querySelectorAll('.service')
var form = document.querySelector('#form-demande-service')

var serviceBorderWhite = function(services){
    services.forEach(service=>{
        service.style.border = "1px solid white"
    })
}

var serviceChoisi = null ;
var departement = document.querySelector('#departement').options[document.querySelector('#departement').selectedIndex].value;
var ville = document.querySelector('#ville').options[document.querySelector('#ville').selectedIndex].value;
var contact = document.getElementById('contact-client').value;

services.forEach(service=>{
    service.addEventListener('click',function(e){
        e.preventDefault()
        targetBorder = e.target.parentElement.border
        serviceBorderWhite(services)
        e.target.parentElement.style.border = "3px solid yellow"
        serviceChoisi = e.target.parentElement.querySelector('h5').innerHTML
        serviceVoulu = serviceChoisi
        console.log(document.getElementById('contact-client').value);

        document.querySelector('#service-voulu h4').innerHTML = "Vous avez selectionnez le service : "
        document.querySelector('#service-voulu p').innerHTML = serviceVoulu
        window.location.href = "./#form-demande-service"

    })
})

var xhr = new XMLHttpRequest()
var formData = new FormData()
document.querySelector('#submit-demande-service').addEventListener('click',function(e){
    e.preventDefault();
    console.log(serviceChoisi + " " + departement + " " + ville + " " + contact);
    if(serviceChoisi !== null && serviceChoisi !== undefined){
        formData.append('service', serviceChoisi);
    }
    if(departement !== null && departement !== undefined){
        formData.append('departement', departement);
    }
    if(ville !== null && ville !== undefined){
        formData.append('ville', ville);
    }
    if(contact !== null && contact !== undefined){
        formData.append('contact', document.getElementById('contact-client').value);
    }

    xhr.onreadystatechange = function(e){
        if(this.readyState === 4 && this.status === 200){
            reponseServer = JSON.parse(xhr.responseText)
            if(reponseServer['result'] == "success"){
                console.log('succes magistral');
                var divResponse = document.createElement('div');
                divResponse.innerHTML = reponseServer['message'];
                divResponse.style.border = '1px solid yellow';
                divResponse.style.color = 'yellow'
                form.appendChild(divResponse);
            }
        }else{
            console.log(JSON.parse(xhr.responseText));
        }
    }
    xhr.open(form.getAttribute('method'),form.getAttribute('action'), true)
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.send(formData);
    });

})()