<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once ('dompdf/lib/html5lib/Parser.php');
require_once ('dompdf/lib/php-font-lib/src/FontLib/Autoloader.php');
require_once ('dompdf/lib/php-svg-lib/src/autoload.php');
require_once ('dompdf/src/Autoloader.php');

class CI_Dompdf
{

    private $html;
    private $path;
    private $filename;
    private $paper_size;
    private $orientation;

    function __construct($params = [])
    {
        $this->CI =& get_instance();

        if (count($params) > 0)
        {
            $this->initialize($params);
        }
    }

    function initialize($params)
	{
		if (count($params) > 0)
        {
            foreach ($params as $key => $value)
            {
                if (isset($this->$key))
                {
                    $this->$key = $value;
                }
            }
        }
	}

	function html($html = NULL)
	{
        $this->html = $html;
	}

	function folder($path)
	{
        $this->path = $path;
	}

	function filename($filename)
	{
        $this->filename = $filename;
	}

	function paper($paper_size = NULL, $orientation = NULL)
	{
        $this->paper_size = $paper_size;
        $this->orientation = $orientation;
	}


	function create($mode = 'download')
	{

   		if (is_null($this->html)) {
			show_error("HTML is not set");
		}

   		if (is_null($this->path)) {
			show_error("Path is not set");
		}

   		if (is_null($this->paper_size)) {
			show_error("Paper size not set");
		}

		if (is_null($this->orientation)) {
			show_error("Orientation not set");
		}

		Dompdf\Autoloader::register();

	    $dompdf = new Dompdf\Dompdf();
	    $dompdf->load_html($this->html);
	    $dompdf->set_paper($this->paper_size, $this->orientation);
        $dompdf->set_option('defaultFont', 'Helvetica');
	    $dompdf->render();

	    if($mode == 'save') {

    	    $this->CI->load->helper('file');

    	    if(file_put_contents($this->path.$this->filename, $dompdf->output()))
            {
		    	return $this->path.$this->filename;
		    }
            else
            {
				show_error("PDF could not be written to the path");
		    }

		    }
            else
            {

    			if($dompdf->stream($this->filename))
                {
    				return TRUE;
    			}
                else
                {
    				show_error("PDF could not be streamed");
    			}

	       }
	}

}
