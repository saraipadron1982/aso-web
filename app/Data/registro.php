<?php
// Registro inicial I01 con lenguaje sencillo: cada pregunta es un desplegable (sin escribir).
// Los códigos coinciden con el protocolo v7; el texto y las opciones están simplificados.
$edades = [];
for ($i = 3; $i <= 99; $i++) {
    $edades[] = $i . ' años';
}

return [
    'I01-01' => ['texto' => '¿Qué edad tiene la persona?', 'opciones' => $edades],
    'I01-02' => ['texto' => 'Género (opcional)', 'opciones' => ['Mujer', 'Hombre', 'Otro', 'Prefiero no decirlo']],
    'I01-03' => ['texto' => '¿Quién responde?', 'opciones' => ['La propia persona', 'Un familiar o persona cercana', 'Un docente o el centro educativo']],
    'I01-04' => ['texto' => 'Si no responde la propia persona: ¿cuánto tiempo hace que la conoces?', 'opciones' => ['Menos de 6 meses', 'Entre 6 meses y 2 años', 'Más de 2 años', 'No aplica']],
    'I01-05' => ['texto' => 'Etapa (se rellena sola con la edad)', 'opciones' => ['Preescolar (hasta 5 años)', 'Escolar (6 a 11 años)', 'Adolescencia (12 a 17 años)', 'Adultez (18 años o más)']],
    'I01-06' => ['texto' => '¿Qué te preocupa más?', 'opciones' => ['Atención y concentración', 'Actuar sin pensar o esperar', 'Organización y memoria', 'Comunicación y relaciones con otras personas', 'Rutinas, intereses o sensibilidad a sonidos, luces o texturas', 'Varias cosas o no lo sé', 'Otro motivo']],
    'I01-07' => ['texto' => '¿Ha tenido antes una evaluación profesional?', 'opciones' => ['Sí', 'No', 'No lo sé']],
    'I01-08' => ['texto' => 'Si la ha tenido: ¿cuándo fue?', 'opciones' => ['Hace menos de 1 año', 'Hace entre 1 y 5 años', 'Hace más de 5 años', 'No aplica']],
    'I01-09' => ['texto' => 'Si la ha tenido: ¿qué resultado le dijeron?', 'opciones' => ['TDAH', 'Autismo (TEA)', 'TDAH y autismo', 'Otro resultado', 'No se encontró nada', 'Prefiero no decirlo', 'No aplica']],
    'I01-10' => ['texto' => '¿Recibe apoyos o tratamiento ahora? (opcional)', 'opciones' => ['Ninguno', 'Apoyo educativo', 'Terapia', 'Medicación', 'Varios de ellos', 'Prefiero no decirlo']],
    'I01-11' => ['texto' => 'Idioma: ¿entiende bien el español?', 'opciones' => ['Sí, es su idioma principal', 'Sí, aunque su idioma principal es otro', 'Le cuesta entenderlo']],
    'I01-12' => ['texto' => '¿Cómo se comunica mejor?', 'opciones' => ['Hablando', 'Leyendo y escribiendo', 'Con pictogramas u otro sistema de apoyo', 'De otra forma']],
    'I01-13' => ['texto' => '¿Necesita alguna ayuda para usar el ordenador o el móvil?', 'opciones' => ['Ninguna', 'Para ver mejor', 'Para oír mejor', 'Para mover las manos o el ratón', 'Varias de ellas']],
    'I01-14' => ['texto' => '¿Dónde pasa más tiempo la persona?', 'ayuda' => 'Sirve para saber en qué lugares se puede observar su día a día.', 'opciones' => ['En casa', 'En el colegio o instituto', 'En el trabajo o en la universidad', 'En varios sitios']],
    'I01-15' => ['texto' => '¿Aceptas guardar estas respuestas en este navegador?', 'ayuda' => 'No se envían a ningún servidor. Si es menor, debe aceptarlo su familia o representante legal.', 'opciones' => ['Sí, acepto', 'Acepto como representante legal', 'No acepto']],
    'I01-16' => ['texto' => '¿Quieres que te sugiramos contactar con un profesional?', 'ayuda' => 'Si hay una urgencia o riesgo, llama al 112. Esta web no atiende urgencias.', 'opciones' => ['Sí, quiero información', 'No por ahora', 'Necesito ayuda urgente']],
];
