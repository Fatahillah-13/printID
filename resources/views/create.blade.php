<!DOCTYPE html>
<html>

<head>
    <title>Tambah Calon Karyawan</title>
</head>

<body>
    <h1>Tambah Calon Karyawan</h1>
    <form action="http://localhost:8080/ambil-gambar" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar" accept="image/*" capture>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>

<script>
    const video = document.createElement('video');
    const canvas = document.createElement('canvas');
    const captureButton = document.querySelector('button[type="submit"]');

    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(stream => {
            video.srcObject = stream;
            video.play();
        })
        .catch(err => {
            console.error("Error accessing webcam", err);
        });

    captureButton.addEventListener('click', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

        const dataURL = canvas.toDataURL('image/png');
        const blob = dataURLtoBlob(dataURL);
        const formData = new FormData();
        formData.append('gambar', blob, 'selfie.png');

        fetch('http://localhost:8080/ambil-gambar', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    function dataURLtoBlob(dataURL) {
        const parts = dataURL.split(';base64,');
        const contentType = parts[0].split(':')[1];
        const raw = window.atob(parts[1]);
        const rawLength = raw.length;

        const uInt8Array = new Uint8Array(rawLength);

        for (let i = 0; i < rawLength; ++i) {
            uInt8Array[i] = raw.charCodeAt(i);
        }

        return new Blob([uInt8Array], {
            type: contentType
        });
    }
</script>


</html>
