# Revisión de las versiones del protocolo FAND

Versiones revisadas: informe integral v2 (`protocolo_integral.xml`), batería v3, v5, v7 (`protocolo_v7.xml`) y protocolo adaptativo J01–J08.

## Lo que coincide en todas (se mantiene)

| Principio | Estado en la web |
|---|---|
| Orientación, no diagnóstico; nada confirma ni descarta TEA/TDAH | Avisos en todas las páginas |
| Dos actividades (registro + cuestionarios, juegos) y un informe | Recorrido de 4 pasos (`mountGuide`) |
| I01 de 16 campos, sin puntuación de riesgo | `CuestionarioCatalog` |
| «No sé / No aplica» es dato ausente, no cero | `scoreQuestionnaires` |
| Puntuar por dimensión; no sumar dimensiones ni mezclar con juegos | Mi ficha |
| Los juegos no miden TEA; esa vía va por C02, C03, C05, C06 e historia | `E01_PRO`, `status()` |
| La derivación no depende del rendimiento en juegos | `status()` |
| 2 juegos iniciales + 1–3 complementarios, sin bucles | `route()`, `MAX_GAMES = 5` |
| Finalizar o parar no equivale a descartar | estado «interrumpida» |

## Diferencias entre versiones y decisión

| Tema | v2 / v3 | v5 | v7 | Decisión |
|---|---|---|---|---|
| Escala | frecuencia 0–4 | 0–3 | conformidad 0–4 | 0–4 (v7); la v2 pide validar si frecuencia es mejor |
| Módulos | C01–C05 | C01–C05 | C01–C09 | C01–C09 (v7) |
| Estados del motor, categorías de informe (a–e), grupos de edad, calidad tras cada juego | descritos | — | solo títulos vacíos | Recuperados de v2 e implementados |
| Quién responde por edad | 3–5 solo cuidador; 6–11 cuidador/docente | — | sin contenido | Implementado como aviso (`recommendedInformant`) |
| Discrepancias entre informantes | documentar, no promediar | — | R12 las menciona | Se registra quién respondió cada módulo (`cuestInf`) |

## Pendiente (no resuelto en ninguna versión)

- Umbrales (2,5 de 4, 75 % válidas) y edades por etapa: provisionales, sin validar.
- Comparar dos informantes sobre el mismo módulo: hoy se guarda un único conjunto de respuestas por módulo; solo se registra quién respondió.
- Secciones 10, 11, 12 del v7 sin contenido propio; se usa el de la v2.
