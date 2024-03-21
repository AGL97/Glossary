<?php


require 'glossaryterm.class.php';

class DataProvider{

    public function __construct(private $source){
    //Declarando un nivel de acceso en nuestro constructor se crea la propiedad a la que le establecimos el nivel de acceso y se le asigna al valor que se le pasa al constructor
    }

    public function getSource(){
    return $this->source;
    }
    
    public function get_terms(){

    }

    public function get_term($term)
    {
        
    }

    public function search_terms($search)
    {

    }

    public function add_term($term,$definition)
    {
        

    }

    public function update_term($original_term,$new_term,$definition)
    {
        
    }

    public function delete_term($term)
    {
       

    }

   
}