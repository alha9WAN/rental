// Animasi ketika tombol "Lihat Artikel Terbaru" diklik
document.getElementById('lihatArtikelBtn').addEventListener('click', function(e) {
    e.preventDefault();

    // Tambahkan efek klik pada tombol
    this.classList.add('animate-pulse');
    setTimeout(() => {
        this.classList.remove('animate-pulse');
    }, 600);

    // Scroll ke bagian artikel dengan smooth animation
    const artikelSection = document.getElementById('artikel');
    artikelSection.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });

    // Tambahkan animasi highlight pada section artikel setelah scroll
    setTimeout(() => {
        artikelSection.classList.add('animate-highlight');
        setTimeout(() => {
            artikelSection.classList.remove('animate-highlight');
        }, 2000);
    }, 800);
});

// Animasi ketika tombol "Baca Selengkapnya" diklik
document.querySelectorAll('.read-more-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        // Animasi pada tombol yang diklik
        this.style.transform = 'scale(0.95)';
        this.style.transition = 'transform 0.2s ease';

        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 200);

        // Simulasi loading
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Membuka...';
        this.style.pointerEvents = 'none';

        setTimeout(() => {
            this.innerHTML = originalText;
            this.style.pointerEvents = 'auto';

            // Tambahkan efek sukses
            this.classList.add('text-green-600');
            setTimeout(() => {
                this.classList.remove('text-green-600');
            }, 1000);
        }, 1000);
    });
});

// Load more button animation
document.getElementById('loadMoreBtn').addEventListener('click', function() {
    // Simulasi loading animation
    const originalText = this.innerHTML;
    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memuat...';
    this.disabled = true;

}); // <-- TAMBAHKAN INI: tutup fungsi loadMoreBtn

// Animasi saat halaman dimuat - kartu artikel muncul secara berurutan
document.addEventListener('DOMContentLoaded', function() {
    const articles = document.querySelectorAll('.article-card');
    articles.forEach((article, index) => {
        // Set initial state
        article.style.opacity = '0';
        article.style.transform = 'translateY(30px)';
        article.style.transition = 'all 0.6s ease-out';

        // Staggered animation
        setTimeout(() => {
            article.style.opacity = '1';
            article.style.transform = 'translateY(0)';
        }, index * 150);
    });

    // Animasi untuk elemen dengan class animate-slideIn
    const slideInElements = document.querySelectorAll('.animate-slideIn');
    slideInElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(-30px)';

        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
            element.style.transition = 'all 0.8s ease-out';
        }, 500);
    });
});

// Animasi saat scroll - muncul ketika elemen masuk viewport
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
            entry.target.style.transition = 'all 0.6s ease-out';
        }
    });
}, observerOptions);

// Observe all article cards
document.querySelectorAll('.article-card').forEach(card => {
    observer.observe(card);
});
