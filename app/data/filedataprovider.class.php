<?php


class FileDataProvider extends DataProvider{
    
    
    public function get_terms(){
        $json = $this->get_data();

        return json_decode($json);
    }

    public function get_term($term)
    {
        $terms = $this->get_terms();
        

        foreach ($terms as $item) {
            if ($item->term == $term) {
                return $item;
            }
        }

        return false;
    }

    public function search_terms($search)
    {
        $items = $this->get_terms();
        $results = array_filter($items,
        function($item)use ($search){
            // truthy
            // 1 12345 -1
            //'asdasdsa'
            //cualquier cosa que puede ser considerada true

            //falsey
            //cualquier cosa que puede ser considerada como falso

            // if(strpos($item->term,$search) !==false || strpos($item->definition,$search) !==false)
            //se utiliza el operador de igualdad estricto !== porque si mandamos a buscar por ejemplo el primer indice de uno de los terminos va a devolver el indice 0 que puede ser interpretado como falso con el operador !=

            //str_starts_with($haystack,$needle);
            //str_ends_with($haystack,$needle);

            if(str_contains($item->term,$search) || str_contains($item->definition,$search))
            {                
                return $item;
            }
        }
        );

        return $results;
    }

    public function add_term($term,$definition)
    {
        $items =  $this->get_terms();
        
        $items[] = new GlossaryTerms($term,$definition); 

        // $obj = (object) [
        //     'term' => $term,
        //     'definition'=> $definition
        // ];

        // $items[] = $obj;

        $this->set_data($items);

    }

    public function update_term($original_term,$new_term,$definition)
    {
        $terms = $this->get_terms();
        foreach ($terms as $item) {
            if ($item->term == $original_term) {
                $item->term = $new_term;
                $item->definition  = $definition;
                break;
            }
        }

        $this->set_data($terms);
    }

    public function delete_term($term)
    {
        $terms = $this->get_terms();
        for( $i= 0; $i<count($terms); $i++ ) {
            if($terms[$i]->term === $term)
            {
                unset($terms[$i]);
                break;
            }
        }

        //TODO:REBUILD the array
        // porque cuando se usa la funcion unset y borras un item del array, lo borra pero no reorganiza los items restantes del array

        $new_terms = array_values($terms);
        //con esta funcion se devuelven todos los numeros que antecedian a los valores del json como matriz asociativa y los convierte en indices de un nuevo array, formandose asi un array como teniamos anteriormente

        
        $this->set_data($new_terms);

        }

    private function get_data(){
        $fname = $this->getSource();
        $json = '';
        if (!file_exists($this->getSource())) {
            file_put_contents($this->getSource(),'');
        }
        else
        {
            $json = file_get_contents($fname);
        };

        return $json;
    }

    private function set_data($arr)
    {
        $json = json_encode($arr);

        file_put_contents($this->getSource(), $json);
    }
}