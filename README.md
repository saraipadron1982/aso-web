# FAND

## Ejecución local

El proyecto usa PHP nativo y Apache. En XAMPP, coloca la carpeta en `htdocs` y abre `http://localhost/aso/`. Apache debe permitir `mod_rewrite` y la lectura de `.htaccess`.

## Estructura MVC

- `index.php`: punto de entrada y despachador de peticiones.
- `app/Controllers/PageController.php`: resuelve la ruta solicitada y carga la vista.
- `app/Models/PageCatalog.php`: lista las páginas públicas permitidas y su vista asociada.
- `app/Models/FichaCatalog.php` y `app/Data/fichas/J01–J08*.xml`: fichas técnicas de los juegos (no accesibles por web), mostradas en `FAND_Fichas_Tecnicas.html`.
- `FAND_Test_Orientativo.html`: sección principal que agrupa los 8 juegos (J01–J08). La edad introducida (en esa página o en «Mi ficha») se guarda en el navegador y preconfigura los juegos según franjas de planificación del piloto (`FANDProfile.ageConfig()` en `assets/js/fand-perfil.js`); no son baremos.
- `assets/js/fand-perfil.js`: guarda los resultados de los juegos en el navegador (localStorage) y calcula el índice de orientación de `FAND_Ficha_Usuario.html`. No es un diagnóstico.
- `app/Views/pages/`: vistas de las páginas y artículos.
- `app/Views/errors/`: vistas de error.
- `.htaccess`: envía las URL históricas `.html` al controlador y evita el acceso directo a código MVC.

Las URL históricas, como `FAND_Directorio.html` y `articulos/poblacion-neurodivergente.html`, se conservan. Para publicar una página, crea su vista bajo `app/Views/pages/` y agrega su ruta y archivo de vista a `PageCatalog`.

Los PDF y demás recursos estáticos permanecen en sus ubicaciones originales. El acceso HTTP a XML y XLSX continúa restringido por `.htaccess`.
- Protocolo adaptativo (versión piloto, `app/Data/protocolo_adaptativo_J01_J08.xml`): el Test orientativo incluye un cuestionario inicial, 2 juegos de arranque y hasta 3 adicionales según la matriz de transición, y «Mi ficha» muestra el estado final permitido (orientación recomendada, sin señales suficientes, información insuficiente, interrumpida). No emite diagnósticos ni probabilidades.
- `FAND_Protocolo.html`: protocolo de funcionamiento de cuestionarios, juegos y algoritmo adaptativo (13 secciones, leídas de `app/Data/protocolo_integral.xml`).
- `FAND_Cuestionarios.html`: banco de cuestionarios C01–C15 (`app/Data/bateria_v3.xml`, modelo `CuestionarioCatalog`). C01–C05 usan escala de frecuencia 0–4 con «No sé / no aplica» (dato ausente, no cero) y se resumen por dimensión en «Mi ficha»; C06–C15 son módulos opcionales de contexto sin puntuar. Banco no validado, sin cortes clínicos; no se suma con los juegos.
