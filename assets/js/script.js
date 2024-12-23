function validateMemberForm() {
    // Mendapatkan nilai dari input form
    const name = document.forms["membershipForm"]["name"].value;
    const email = document.forms["membershipForm"]["email"].value;
    const phone = document.forms["membershipForm"]["phone"].value;
    const membershipType = document.forms["membershipForm"]["membership_type"].value;

    // Memeriksa apakah nama diisi
    if (name === "") {
        alert("Name must be filled out"); // Menampilkan pesan peringatan jika nama kosong
        return false; // Menghentikan pengiriman form
    }

    // Pola untuk memeriksa format email yang valid
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address"); // Menampilkan pesan peringatan jika email tidak valid
        return false; // Menghentikan pengiriman form
    }

    // Pola untuk memeriksa format nomor telepon yang valid
    const phonePattern = /^[0-9]{10,15}$/;
    if (phone !== "" && !phonePattern.test(phone)) {
        alert("Please enter a valid phone number"); // Menampilkan pesan peringatan jika nomor telepon tidak valid
        return false; // Menghentikan pengiriman form
    }

    // Memeriksa apakah jenis membership dipilih
    if (membershipType === "") {
        alert("Please select a membership type"); // Menampilkan pesan peringatan jika jenis membership tidak dipilih
        return false; // Menghentikan pengiriman form
    }

    return true; // Mengizinkan pengiriman form jika semua validasi lolos
}
