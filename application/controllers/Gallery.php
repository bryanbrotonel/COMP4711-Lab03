<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application
{

    /**
     * Gallery Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
      // Get all the images from our model
  		$pix = $this->images->all();

      // Build an array of formatted cells for them
  		foreach ($pix as $picture)
  			$cells[] = $this->parser->parse('_cell', (array) $picture, true);

      // Prime the table class
  		$this->load->library('table');
  		$parms = array(
  			'table_open' => '<table cols="3" class="gallery">',
  			'cell_start' => '<td class="oneimage">',
  			'cell_alt_start' => '<td class="oneimage">'
  		);

      // Finally! generate the table
  		$rows = $this->table->make_columns($cells, 3);
  		$this->data['thetable'] = $this->table->generate($rows);

      $this->data['pagebody'] = 'gallery';
      $this->render();
    }

}
