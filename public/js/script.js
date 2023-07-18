document.addEventListener('DOMContentLoaded', function () {
    var scrollUpButton = document.getElementById('scrollUpButton');

    // Tampilkan tombol saat halaman di-scroll ke bawah
    window.addEventListener('scroll', function () {
        if (window.scrollY > 300) {
            scrollUpButton.classList.remove('d-sm-none');
        } else {
            scrollUpButton.classList.add('d-sm-none');
        }
    });

    // Scroll ke bagian atas saat tombol ditekan
    scrollUpButton.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    gsap.fromTo("#photo-container", {
        opacity: 0,
        y: 100
    }, {
        duration: 1,
        opacity: 1,
        y: 0,
        ease: "power2.out"
    });
});

document.addEventListener('DOMContentLoaded', function () {
    gsap.to("#profile-image", {
        duration: 1.5,
        opacity: 1,
        x: 0,
        ease: "power3.out"
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const textElement = document.getElementById('typing-text');
    const textsToType = ["Web Developer", "Graphic Design", "Video Editor"]; // Array kata-kata yang ingin ditampilkan

    let textIndex = 0; // Indeks untuk mengakses kata-kata dalam array
    let charIndex = 0; // Indeks untuk mengakses karakter dalam kata-kata
    const typingInterval = 100; // Waktu jeda antara munculnya setiap karakter (dalam milidetik)

    function typeNextCharacter() {
        if (charIndex < textsToType[textIndex].length) {
            textElement.textContent += textsToType[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(typeNextCharacter, typingInterval);
        } else {
            setTimeout(deleteText, 1000); // Tunggu 1 detik setelah kata selesai ditampilkan sebelum menghapusnya
        }
    }

    function deleteText() {
        if (charIndex > 0) {
            textElement.textContent = textsToType[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(deleteText, typingInterval);
        } else {
            textIndex = (textIndex + 1) % textsToType.length; // Ganti ke kata berikutnya dalam array
            setTimeout(typeNextCharacter, typingInterval);
        }
    }

    typeNextCharacter();
});
