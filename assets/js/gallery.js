const modal = document.getElementById("image-modal");
const modalImg = document.getElementById("modal-img");
const captionText = document.getElementById("caption");
const images = document.querySelectorAll(".gallery-images img");
const closeBtn = document.querySelector(".close");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");

let currentIndex = 0;

function showModal(index) {
    const img = images[index];
    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
    currentIndex = index;
}

images.forEach((img, index) => {
    img.addEventListener("click", () => showModal(index));
});

closeBtn.addEventListener("click", () => modal.style.display = "none");
modal.addEventListener("click", e => { if (e.target === modal) modal.style.display = "none"; });

nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    showModal(currentIndex);
});

prevBtn.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showModal(currentIndex);
});
