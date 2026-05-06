ALTER TABLE Chat
ADD COLUMN enviado_por ENUM('usuario', 'entrenador') NOT NULL DEFAULT 'usuario'
AFTER id_entrenador;

UPDATE Chat
SET enviado_por = 'usuario'
WHERE enviado_por IS NULL OR enviado_por = '';
