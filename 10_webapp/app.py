import web

urls = (
    '/', 'Index'
)

app = web.application(urls, globals())
render = web.template.render('views/')

class Index:
    def GET(self):
        print("Página principal cargada") 
        return render.index()

class Login:
    def GET(self):
        print("Página de login cargada") 
        return render.login()

    def POST(self):
        user_data = web.input()
        username = user_data.username
        password = user_data.password
        
        print(f"Intento de login: {username} - {password}")  
        
        if username == "admin" and password == "1234":
            return "Bienvenido, " + username
        else:
            return "Credenciales incorrectas. <a href='/login'>Intenta de nuevo</a>"

if __name__ == "__main__":
    print("Iniciando servidor en http://localhost:8080/")  
    app.run()
