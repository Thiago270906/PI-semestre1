const btnVotar = document.querySelectorAll('.votar');

btnVotar.forEach(button => {
    button.addEventListener('click', () =>{
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);

        modal.showModal();
    });
});

const btnFechar = document.querySelectorAll('.cancelar');

    btnFechar.forEach(button => {
        button.addEventListener('click', () =>{
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            modal.close();
            
        });
    });

const botaoVotar = document.querySelector(".confirmarVoto")
botaoVotar.addEventListener('click', function(){
    const modal = document.getElementById('modal-candidatos');
    modal.close();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            container: 'z-[9999] bg-black/50 backdrop-blur-sm font-sans',
            popup: 'border-2 rounded-xl shadow-xl p-6 bg-white',
            title: 'text-2xl font-bold text-black',
            confirmButton: 'bg-[#b20000] hover:bg-red-600 text-white font-medium px-4 py-2 rounded',
            cancelButton: 'bg-gray-200 hover:bg-gray-400 text-black font-medium px-4 py-2 rounded'
        },
        
        buttonsStyling: true
    });
    swalWithBootstrapButtons.fire({
        title: "Deseja confirmar seu voto?",
        text: "Após a confirmação do voto não sera possivel votar novamente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {
    swalWithBootstrapButtons.fire({
      title: "Confirmado!",
      text: "Seu voto foi confirmado com sucesso.",
      icon: "success"
    });
    } else if (
        result.dismiss === Swal.DismissReason.cancel
    ) {
    modal.showModal();
    }
    });
})