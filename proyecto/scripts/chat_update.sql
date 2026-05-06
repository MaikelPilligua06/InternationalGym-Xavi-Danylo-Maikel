ALTER TABLE Chat
ADD COLUMN enviado_por ENUM('usuario', 'entrenador') NOT NULL DEFAULT 'usuario'
AFTER id_entrenador;

UPDATE Chat
SET enviado_por = 'usuario'
WHERE enviado_por IS NULL OR enviado_por = '';

ALTER TABLE Alimentacion
ADD COLUMN id_usuario INT NULL AFTER id,
ADD COLUMN fecha DATE NULL AFTER id_usuario;
