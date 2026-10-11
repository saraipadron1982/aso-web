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
- Cuestionarios C01�C05: escala de conformidad de 5 niveles (0 nada conforme � 4 muy conforme) m�s �No lo s� / No aplicable� (dato ausente). Por dimensi�n se informa media e �ndice descriptivo 0�100 (puntuaci�n/m�ximo de las respuestas v�lidas); no se calcula si hay menos del 75 % de respuestas v�lidas. No es una probabilidad ni un diagn�stico.
- FAND_Cuestionarios.html: protocolo FAND v7 (`app/Data/protocolo_v7.xml`, modelo `CuestionarioCatalog`; sustituye a la batería v5). Registro I01 de 16 campos (sin puntuar) y módulos C01–C09 con afirmaciones en escala 0–4 de conformidad más «No lo sé / No aplicable» (dato ausente, no cero). Por dimensión se informa de válidas, distribución, media y equivalente sobre 100; con menos del 75 % de respuestas válidas la dimensión no se interpreta (umbral provisional). Sin umbrales clínicos ni probabilidades, y sin sumar dimensiones entre sí ni con los juegos.
- Cuestionarios primero: en el Test orientativo los juegos se asignan al terminar los cuestionarios (la persona puede saltarlos y usar los juegos generales). J03 y J04 abren con el nivel de su ficha que corresponde a la edad exacta (1: 3–5 … 6: 60+).
- Mi ficha se divide en dos apartados: «Ficha de la persona» (datos y cuestionarios, ?vista=persona) y «Resultados de los juegos» (?vista=juegos). El PDF e imprimir incluyen ambos.
- Recorrido guiado: I01 → C01 y C04 (atención/impulsividad, ejecutivas y memoria) y/o C02 y C03 (social/sensorial) según el motivo (sin motivo: ambos grupos) → C05 → juegos → Mi ficha. C06–C09 son opcionales. Las medias ≥ 2,5 con ≥ 3 respuestas válidas en una dimensión solo priorizan juegos (AT→J04/J01, DI→J01/J08, IP→J03/J02, PL→J05/J07, ME→J07/J06); C02, C03 y C06 no tienen juego equivalente y cuentan como motivo para recomendar orientación profesional. Mi ficha contrasta cuestionarios y juegos y avisa de datos contradictorios.
