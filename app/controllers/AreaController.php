<?php

class AreaController extends Controller{


        public function index(){

            $dados = array();
            $dados['titulo'] = 'Área de Atuação - Ki Oficina';


            $this->carregarViews('area',$dados);

        }


}


