
# status  = 1 open, 2 en espera, 3 closed
# private = 0 public, 1 private 

# ticket abierto pero publico ....
SELECT * FROM `tickets` WHERE status = 1 AND private = 0 ORDER BY date_update

# ticket abierto pero private ....
SELECT * FROM `tickets` WHERE status = 1 AND private = 1 ORDER BY date_update

# ticket closed pero private ....
SELECT * FROM `tickets` WHERE status = 3 AND private = 1 ORDER BY date_update

# ticket closed pero public ....
SELECT * FROM `tickets` WHERE status = 3 AND private = 0 ORDER BY date_update

# por usuario

SELECT * FROM `tickets` WHERE user_id = 5 AND status = 1 AND private = 0 ORDER BY date_update


# Numero ticket(id)-- asunto-- Status-- autor-- servicio  --fecha create fecha update
SELECT
   A.val1 AS A,
   B.val2 AS B,
   C.val3 AS C,
   D.val4 AS D
FROM
   A
JOIN
   B
      ON A.ID1 = B.ID2
JOIN
   C
      ON B.ID1 = C.ID2
JOIN
   D
      ON C.ID1 = D.ID2
WHERE
   A.ID1 = 105







select uuid,u.username,t.titulo,t.id_status,g.nombre,a.nombre 
from qtelecom.tickets t 
join qtelecom.users u on t.user_id = u.id #username
join qtelecom.gravedad g on t.id_gravedad = g.id # gravedad
#join qtelecom.level l on t.id_level = l.id  #level
join qtelecom.afectado a on t.id_afectado = a.id



select t.id AS numero,
      t.titulo,
      s.nombre AS estatus,
      u.username AS autor,
      serv.nombre AS servicios,
      t.date_added AS creado, 
      t.date_update AS actualizado 
      from qtelecom.tickets t 

      join qtelecom.users u on t.user_id = u.id 
      join qtelecom.servicios serv on t.id_servicios = serv.id 
      join qtelecom.status s on t.id_status = s.id 