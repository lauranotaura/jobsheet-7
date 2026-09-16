/* ==========================================================================
   app.js - Fungsi Umum & Event Delegation (Jobsheet 6)
   ========================================================================== */

// 1. Menu Hamburger Responsif
function initNavToggle() {
    const toggleBtn = document.querySelector(".nav-toggle-label");
    const nav = document.querySelector("header nav");

    // Guard clause jika elemen tidak ditemukan di halaman ini
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

// 2. Event Delegation untuk Tombol Hapus pada Elemen Dinamis
function initHapusConfirm() {
    // Memasang event listener di level document untuk mendeteksi klik pada tombol
    // yang baru dibuat/dirender secara dinamis oleh fetch()
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".btn-hapus");
        if (!btn) return; // Guard clause jika elemen yang diklik bukan .btn-hapus

        const row = btn.closest("tr");
        const nama = row ? row.querySelector("td")?.textContent : "data ini";
        const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
        
        if (yakin && row) {
            row.remove();
        }
    });
}

// 3. Filter Pencarian Real-Time pada Tabel
function initTableFilter() {
    const searchInput = document.querySelector(".search-box input");
    const tbody = document.querySelector(".table-responsive table tbody");

    if (!searchInput || !tbody) return;

    searchInput.addEventListener("keyup", function () {
        const keyword = searchInput.value.toLowerCase();
        const rows = tbody.querySelectorAll("tr");

        rows.forEach(function (row) {
            const text = row.textContent.toLowerCase();
            if (text.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
}

// Inisialisasi Fungsi Utama setelah DOM Siap
document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
});