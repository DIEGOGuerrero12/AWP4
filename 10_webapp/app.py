import web
import firebase_admin
from firebase_admin import credentials, db
import hashlib  # Para encriptar la contraseña

# Configurar Firebase con tu clave JSON
cred = credentials.Certificate("serviceAccountKey.json")  # Reemplaza con tu archivo JSON
firebase_admin.initialize_app(cred, {
    'databaseURL': 'https://diego-50c40-default-rtdb.firebaseio.com/'
})

urls = (
    '/', 'Index',
    '/register', 'Register'
)

app = web.application(urls, globals())
render = web.template.render('views/')

class Index:
    def GET(self):
        return render.index()

class Register:
    def POST(self):
        user_data = web.input()
        username = user_data.username
        password = user_data.password

        # Encriptar la contraseña con SHA256
        password_hash = hashlib.sha256(password.encode()).hexdigest()

        # Guardar en Firebase
        ref = db.reference('users')  # Nodo "users"
        ref.push({
            'username': username,
            'password': password_hash
        })

        return "Registro exitoso: " + username

if __name__ == "__main__":
    print("[DEBUG] Servidor corriendo en http://127.0.0.1:8080/")
    app.run()
