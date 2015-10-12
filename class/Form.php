<?php

/**
 * Created by PhpStorm.
 * User: lopez
 * Date: 06/10/2015
 * Time: 20:40
 */
class Form
{
    // class des champs formulaire, pas tip top par manque de temps
    public function startForm($method, $action, $id){
        $form = "<form role='role' method='{$method}' action='{$action}' id='{$id}'>";
        return $form;
    }

    public function label($value, $class = null, $target = null)
    {
        $name = "<label class='{$class}' for='{$target}'>{$value}</label>";
        return $name;
    }



    public function inputHtml($type, $attributes = array(), $param = null){
        if($param){
            $input = "<input type={$type} $param";
        }
        else{
            $input = "<input type={$type}";
        }
        if(is_array($attributes)){
            foreach($attributes as $key => $value){
                $input.= ' '.$key.'="'.$value.'"';
            }
        }
        $input.= "/>";
        return $input;
    }

    public function button($type, $class, $value)
    {
        $input = "<button type='{$type}' class='{$class}'>{$value}</button>";
        return $input;
    }

    public function endForm()
    {
        $form = "</form>";
        return $form;
    }

}