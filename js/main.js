<script src="js/main.js"></script>
// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("reportForm");
    const modal = document.getElementById("popupModal");
    const closeModal = document.getElementsByClassName("close")[0];

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission to test modal

        // Check if all required fields are filled
        let isValid = true;

        const kategori = document.getElementById("kategori");
        if (kategori.value === "") {
            isValid = false;
            alert("Kategori Laporan harus dipilih!");
        }

        const nama = document.getElementById("nama");
        if (nama.value.trim() === "") {
            isValid = false;
            alert("Nama Pelapor wajib diisi!");
        }

        const nimnip = document.getElementById("nimnip");
        if (nimnip.value.trim() === "") {
            isValid = false;
            alert("NIM/NIP wajib diisi!");
        }

        const nowa = document.getElementById("nowa");
        if (nowa.value.trim() === "") {
            isValid = false;
            alert("Nomor WA wajib diisi!");
        }

        const judul = document.getElementById("judul");
        if (judul.value.trim() === "") {
            isValid = false;
            alert("Judul Laporan wajib diisi!");
        }

        const isi = document.getElementById("isi");
        if (isi.value.trim() === "") {
            isValid = false;
            alert("Isi Laporan wajib diisi!");
        }

        if (isValid) {
            // Simulate form submission and show modal
            modal.style.display = "block"; // Show the pop-up modal

            // You can add AJAX code here to submit the form data to the server
            // and only show the modal if the data submission is successful.

            // Reset the form
            form.reset();
        }
    });

    // When the user clicks the close button, hide the modal
    closeModal.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
