from flask import Flask, request, jsonify, render_template
from rembg import remove
from io import BytesIO
from flask_cors import CORS
import os
import secrets
from datetime import datetime

app = Flask(__name__)
CORS(app)

UPLOAD_FOLDER = 'hasil_gambar/'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

@app.route('/remove_background', methods=['POST'])
def remove_background():
    try:
        file = request.files['file']
        if file:
            input_data = BytesIO(file.read())

            output_data = remove(input_data.read())

            random_string = secrets.token_hex(5)
            current_time = datetime.now().strftime('%Y%m%d%H%M%S')
            filename = f"{random_string}_{current_time}.png"

            output_data_io = BytesIO(output_data)

            output_data_io.seek(0)
            with open(os.path.join(app.config['UPLOAD_FOLDER'], filename), 'wb') as f:
                f.write(output_data_io.read())

            return jsonify({'success': True, 'output_image': filename})

    except Exception as e:
        return jsonify({'error': str(e)})

    return jsonify({'error': 'File tidak ditemukan atau terjadi kesalahan lainnya'})

@app.route('/')
def index():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)
