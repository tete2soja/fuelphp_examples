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
}