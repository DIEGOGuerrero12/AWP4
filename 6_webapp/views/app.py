import web

# Define las rutas de la aplicación
urls = (
    '/', 'Index',
)

# Crea la aplicación
app = web.application(urls, globals())

# Configura el renderizado de plantillas en la carpeta 'views'
render = web.template.render('views/')

# Clase que maneja la ruta principal
class Index:
    def GET(self):
        return render.index()

if __name__ == "__main__":
    app.run()
