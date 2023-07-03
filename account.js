var newPhotoProfil = document.querySelector('#new_photo_profil');
var photo_profil = document.querySelector('.photo_profil')
var form_new_photo_profil = document.querySelector('#form_new_photo_profil')
var divAlert = document.querySelector('.form_response_update_profil_photo')

document.querySelector('#link-set-new-photo').addEventListener('click',function(e){
    e.preventDefault()
    newPhotoProfil.style.display = 'inline-block'
    document.querySelector('#set-new-photo-button').style.display = 'inline-block'
})

newPhotoProfil.addEventListener('change',function(e){
    photo_profil.src = window.URL.createObjectURL(this.files[0]);
        form_new_photo_profil.addEventListener('submit',function(e){
        e.preventDefault()

            var xhr = new XMLHttpRequest()
            var formdata = new FormData(document.querySelector('#form_new_photo_profil'))
            xhr.onreadystatechange = function(e){
                if(xhr.readyState === 4){
                    if(xhr.status === 200){
                        divAlert.innerHTML = 'Votre photo de profil a été mis à jour';
                        setTimeout(() => {
                            divAlert.innerHTML = '';
                        }, 3000);
                    }else{
                        divAlert.innerHTML = JSON.parse(xhr.responseText)
                    }
                
                }
            }
            xhr.open('POST','set-photo-profil.php',true);
            xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
            xhr.send(formdata);
    })
});