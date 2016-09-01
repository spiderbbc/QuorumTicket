
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


# query para datable
# para mostrar todos los tickets con estatus publico
SELECT t.id AS numero,
      t.uuid AS uuid,
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

      WHERE t.private = 0

# informacion de un usuario
select p.nombre AS nombre,
       d.nombre AS departamento,
       p.cargo  AS cargo,
       p.ext    AS extencion

       FROM qtelecom.perfiles p

       join qtelecom.users u on p.user_id = u.id
       join qtelecom.departamentos d on p.id_departamento = d.id

       WHERE
            u.id = 32

#
# el supervisor de un usuario mediante el departamento y el grupo a solicitar
#
select p.nombre AS nombre,
       u.email  AS email


       FROM qtelecom.perfiles p

       join qtelecom.users u on p.user_id = u.id
       join qtelecom.departamentos d on p.id_departamento = d.id


       WHERE
            d.id = 3     # departamento de quien crea el ticket o el usuario
       AND
			      u.grupo = 2  # grupo a quien pertenece el interesado

#
# retorna si un usuario esta involucrado en un determinado ticket
#

select t_u.id_ticket AS id_ticket,
       u.id  AS id


       FROM qtelecom.ticket_users  t_u

       join qtelecom.users u on t_u.id_user = u.id

       WHERE
            t_u.id_ticket = 72  # id del ticket
       AND
            u.id = 32           # id del usuario


# retorna las respuesta de un ticket con informacion del usuario quien escribio dicha respuesta
#
#

select p.nombre AS nombre,
       d.nombre AS departamento,
       p.cargo  AS cargo,
       p.ext    AS extencion,

       r.msg    AS mensaje,
       r.date_update AS fecha

       FROM qtelecom.respuestas r

       join qtelecom.perfiles p on r.user_id = p.user_id
       join qtelecom.users u on p.user_id = u.id
       join qtelecom.departamentos d on p.id_departamento = d.id
      # join qtelecom.respuestas r on t.uuid = r.uuid

       WHERE
            r.uuid = '57ade2628f9'

# retorna los involucrados de un ticket mediante la tabla ticket_users
select u.email AS email,
       p.nombre AS nombre

       FROM qtelecom.ticket_users t_u

       join qtelecom.perfiles p on t_u.id_user = p.user_id
       join qtelecom.users u on p.user_id = u.id

       WHERE

        t_u.id_ticket = 65

# actualizar el perfil .....
UPDATE users,perfiles
SET
    users.username ="thais2",
    users.password = "121154545454",
    perfiles.id_departamento="1",
    perfiles.cargo = "Some test",
    perfiles.ext="1111"

WHERE users.id=53 AND perfiles.user_id=53;
