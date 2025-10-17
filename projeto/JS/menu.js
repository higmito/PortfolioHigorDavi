const hamburguer = document.querySelector(".hamburguer");
const nav = document.querySelector(".nav");
const navLinks = document.querySelectorAll(".nav-list a");

// Função para abrir/fechar o menu hamburguer
hamburguer.addEventListener("click", () => {
    nav.classList.toggle("active");
});

// Fechar o menu ao clicar em um link
navLinks.forEach(link => {
    link.addEventListener("click", function (e) {
        // Evitar que o link abra a página
        e.preventDefault();

        // Fechar o menu removendo a classe "active"
        nav.classList.remove("active");

        // Rolar para a seção correspondente
        const targetId = link.getAttribute("href");  // Pega o valor do href (id da seção)
        const targetElement = document.querySelector(targetId);

        // Verifica se o elemento de destino existe
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: "smooth" });
        }
    });
});
