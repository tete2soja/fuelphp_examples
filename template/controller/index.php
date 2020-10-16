<?php

class Controller_Index extends Controller_Template
{
    // Allow to specify the template file name
    # public $template = 'template_table';

    public function action_index()
    {
        // use to pass data from model to the view
        $data['data'] = 'DATA';
        // use to set value to the template
        $this->template->title = 'TITLE';
        $this->template->link_header = '/';
        $this->template->content = View::forge('path/to/view', $data);
    }
}
