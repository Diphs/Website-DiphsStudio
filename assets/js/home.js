const dragArea = document.getElementById("dragArea");
const fileInput = document.getElementById("file");
const dragText = document.querySelector("p");

dragArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dragArea.classList.add("active");
    dragText.textContent = "Lepaskan untuk Mengunggah File";
});

dragArea.addEventListener("dragleave", () => {
    dragArea.classList.remove("active");
    dragText.textContent = "Atau seret gambar ke sini";
});

dragArea.addEventListener("drop", (event) => {
    event.preventDefault();
    dragArea.classList.remove("active");
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        fileInput.files = files;
        handleFile();
    }
});

function uploadFile() {
    fileInput.click();
}

function handleFile() {
    const file = fileInput.files[0];
    if (file) {
        const formData = new FormData();
        formData.append("file", file);

        fetch("http://127.0.0.1:5000/remove_background", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengirim file ke server');
            }
            return response.blob();
        })
        .then(blob => {
            const url = URL.createObjectURL(blob);
            console.log("Menerima gambar yang telah diproses:", url);
        })
        .catch(error => {
            console.error("Error:", error.message);
            alert('Terjadi kesalahan saat mengunggah dan memproses gambar. Silakan coba lagi.');
        });
    }
}

function sendSampleImage(sampleFileName) {
    const samplePath = "assets/gambar/" + sampleFileName;
    const fileInput = document.getElementById("file");

    function createFormData(filePath) {
        const formData = new FormData();
        return fetch(filePath)
            .then(response => response.blob())
            .then(blob => {
                formData.append("file", blob, sampleFileName);
                return formData;
            });
    }

    createFormData(samplePath)
        .then(formData => {
            return fetch("http://127.0.0.1:5000/remove_background", {
                method: "POST",
                body: formData
            });
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengirim file ke server');
            }
            return response.blob();
        })
        .then(blob => {
            const url = URL.createObjectURL(blob);
            // Tampilkan atau proses lebih lanjut gambar hasilnya, misalnya, set sebagai latar belakang
            console.log("Menerima gambar yang telah diproses:", url);
        })
        .catch(error => {
            console.error("Error:", error.message);
            alert('Terjadi kesalahan saat mengunggah dan memproses gambar. Silakan coba lagi.');
        });
}
