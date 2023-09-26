(function(){
   // var suivantBtn = document.querySelector('#btnNextDemandeService').addEventListener('click',function(){
    var afficherServices = function(services,debut, fin){
        services.forEach(service=>{
            console.log(service.id)
        })
    }
        var xhr = new XMLHttpRequest()
        xhr.open('GET', 'get-demandes-service.php',true );
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.send(null);
        xhr.onreadystatechange = function(){
            if(this.readyState === 4){
                if(this.status === 200){
                    var services = JSON.parse(xhr.response)
                    services.forEach(service=>{
                        var serviceElement = document.createElement('div')
                        var contenu = service.nom_client + ' ' + service.prenom_client + " a besoin d'un service de : " + service.nom_service
                        var suiteContenu = "Contactez ce client par : " + service.type_contact + " au numéro : " + service.tel_client
                        serviceElement.classList.add('post-client')
                        serviceElement.innerHTML = contenu + suiteContenu
                        document.querySelector('.posts-client').appendChild(serviceElement)
                    })
            
                }
            }else{
                console.log("une erreur s'est produite")
            }
        }

    
    


   // })
})()