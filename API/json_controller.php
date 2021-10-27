<?php

class Controller_Api extends Controller_Rest
{
    /* Return all object using JSON format */
    public function get_NAME()
    {
        return $this->response(Model_NAME::find_all());
    }

    /* Can apply filter in order to use AJAX in form */
    public function get_NAMEAjax()
    {
        $result = Model_NAME::find_by(array(
            array('database_field', 'like', '%'.Input::get('query').'%'),
        ));
        return $result;
    }


    public function get_data()
    {
        $a_json = array();
        $a_json['total'] = Model_Fournisseur::count();
        if (Input::get('search') != "")
        {
            $result = Model_Exemple::find(function ($query)
            {
                return $query->select('table.*')
                             ->join('table2')
                             ->on('table.id', '=', 'table2.fk_id')
                             ->where('table.message', 'like', '%'.Input::get('search').'%')
                             ->or_where('table2.title', 'like', '%'.Input::get('search').'%');
            });
            if (isset($result)) {
                $a_json['total'] = count($result);
            }
            else
                $a_json['total'] = 0;
        }
        else
        {
            if (Input::get('limit') != "") {
                $result = Model_Fournisseur::find_by('delete', '0', '=', Input::get('limit'), Input::get('offset'));
            }
            else
                $result = Model_Fournisseur::find_by('delete', '0', '=', 100, 0);
        }
        $a_json['rows'] = $result;
        return $this->response($a_json);
    }
}