<?php

class Model_Example extends \Model_Crud
{
    protected static $_properties = array(
        'id',
        'title',
        'person_id',
    );

    protected static $_table_name = 'exmaples';

    protected static function pre_find(&$query)
    {
        // alter the query
        $query->order_by('nom', 'asc');
    }

    public static function post_find($result)
    {
        if($result !== null)
        {
            foreach ($result as $value)
            {
                if ( ! empty($value->person_id))
                {
                    $person = Model_Other_Example::find_one_by_id($value->person_id)->name;
                    $value->set(array('person_nom' => $person));
                }
            }
        }
        
        // return the result
        return $result;
    }

}
