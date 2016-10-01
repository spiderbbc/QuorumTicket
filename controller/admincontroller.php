<?php

$user = new Usuario;
if (!$user->isLoggedIn()) {
  # code...
  Redirect::to('?accion=logout');
}

Session::flash('error','<h3>Proximamente esta opcion estara habilitada, puedes seguir las actualizaciones bajo este <a href="https://github.com/spiderbbc/QuorumTicket"  target="_blank">link</a></h3>');
Redirect::to(404);

 ?>
