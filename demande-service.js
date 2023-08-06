var services = document.querySelectorAll('.service')
services.forEach(service=>{
    service.addEventListener('click',function(e){
        e.preventDefault()
        e.target.parentElement.style.border = "3px solid white"
        window.location.href = "./#form-demande-service"
    })
})