from flask import Flask, request, send_file, jsonify
from rembg import remove
from io import BytesIO
from flask_cors import CORS
import os

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes

UPLOAD_FOLDER = 'assets/gambar/'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

@app.route('/remove_background', methods=['POST'])
def remove_background():
    try:
        file = request.files['file']
        if file:
            # Simpan file yang diunggah ke objek BytesIO
            input_data = BytesIO(file.read())

            # Proses gambar menggunakan rembg
            output_data = remove(input_data.read())

            # Buat objek BytesIO untuk gambar yang telah diproses
            output_data_io = BytesIO(output_data)

            # Simpan gambar yang telah diproses ke direktori
            filename = os.path.join(app.config['UPLOAD_FOLDER'], 'output.png')
            output_data_io.seek(0)
            with open(filename, 'wb') as f:
                f.write(output_data_io.read())

            # Kirim gambar yang telah diproses sebagai respons
            return send_file(output_data_io, mimetype='image/png', as_attachment=True, download_name='output.png')

    except Exception as e:
        return jsonify({'error': str(e)})

    # Jika tidak ada file atau terjadi kesalahan lain
    return jsonify({'error': 'File tidak ditemukan atau terjadi kesalahan lainnya'})

if __name__ == '__main__':
    app.run(debug=True)
