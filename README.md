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
- Mi ficha descarga un PDF real (icha-fand.pdf, generado en el navegador con jsPDF 2.5.1 incluido en ssets/js/jspdf.umd.min.js, licencia MIT); ya no se descarga JSON.
- Cuestionarios C01�C05: escala de conformidad de 5 niveles (0 nada conforme � 4 muy conforme) m�s �No lo s� / No aplicable� (dato ausente). Por dimensi�n se informa media e �ndice descriptivo 0�100 (puntuaci�n/m�ximo de las respuestas v�lidas); no se calcula si hay menos del 60 % de respuestas v�lidas. No es una probabilidad ni un diagn�stico.
- FAND_Cuestionarios.html: batería FAND v5 (pp/Data/bateria_v5.xml, modelo CuestionarioCatalog; sustituye al banco v3). Bloques con escala F (frecuencia 0–3), I (intensidad 0–3) y N/O (dato ausente, no cero), y bloques abiertos sin puntuar (I01, D01, P01). Por módulo se informa de válidas, distribución 0–3 y media; sin índices, umbrales clínicos ni probabilidades, y sin sumar módulos entre sí ni con los juegos.
- Recorrido guiado: I01 → F01 → D01 → A01–A03 (atención/organización/impulsividad) y/o S01–S02, R01–R02 (social/sensorial) según el motivo (sin motivo: ambos grupos) → juegos → Mi ficha. Las medias ≥ 2 con ≥ 3 respuestas válidas en A01–A03 solo priorizan juegos (A01→J04/J01/J08, A02→J05/J07/J06, A03→J03/J02); S01–R02 no tienen juego equivalente y cuentan como motivo para recomendar orientación profesional. Mi ficha contrasta cuestionarios y juegos y avisa de datos contradictorios.
