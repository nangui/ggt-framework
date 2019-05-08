<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'core/_ini.php';

$model = new Model($dao, ''); /* Mise en marche des requêtes basiques. */

$model->makeconstfile($route, 'SLM_'); /* Exemples. */