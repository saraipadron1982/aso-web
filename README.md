# FAND

## Ejecución local

El proyecto usa PHP nativo y Apache. En XAMPP, coloca la carpeta en `htdocs` y abre `http://localhost/aso/`. Apache debe permitir `mod_rewrite` y la lectura de `.htaccess`.

## Estructura MVC

- `index.php`: punto de entrada y despachador de peticiones.
- `app/Controllers/PageController.php`: resuelve la ruta solicitada y carga la vista.
- `app/Models/PageCatalog.php`: lista las páginas públicas permitidas y su vista asociada.
- `app/Models/FichaCatalog.php` y `app/Data/fichas/J01–J07*.xml`: fichas técnicas de los juegos (no accesibles por web), mostradas en `FAND_Fichas_Tecnicas.html`.
- `assets/js/fand-perfil.js`: guarda los resultados de los juegos en el navegador (localStorage) y calcula el índice de orientación de `FAND_Ficha_Usuario.html`. No es un diagnóstico.
- `app/Views/pages/`: vistas de las páginas y artículos.
- `app/Views/errors/`: vistas de error.
- `.htaccess`: envía las URL históricas `.html` al controlador y evita el acceso directo a código MVC.

Las URL históricas, como `FAND_Directorio.html` y `articulos/poblacion-neurodivergente.html`, se conservan. Para publicar una página, crea su vista bajo `app/Views/pages/` y agrega su ruta y archivo de vista a `PageCatalog`.

Los PDF y demás recursos estáticos permanecen en sus ubicaciones originales. El acceso HTTP a XML y XLSX continúa restringido por `.htaccess`.
