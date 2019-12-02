<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;

class Ci_dompdf
{
    public $html; // or use var
    public $path; // or use var
    public $filename; // or use var
    public $paper_size; // or use var
    public $orientation; // or use var

    function __construct()
    {
        $this->CI =& get_instance();
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
   		if (is_null($this->html))
        {
			show_error("HTML is not set");
		}

   		if (is_null($this->path))
        {
			show_error("Path is not set");
		}

   		if (is_null($this->paper_size))
        {
			show_error("Paper size not set");
		}

		if (is_null($this->orientation))
        {
			show_error("Orientation not set");
		}

		Dompdf\Autoloader::register();

	    $dompdf = new Dompdf\Dompdf();
        $dompdf->set_option('enable_html5_parser', true);
        $dompdf->set_option('defaultFont', 'Helvetica');
	    $dompdf->load_html($this->html);
	    $dompdf->set_paper($this->paper_size, $this->orientation);

	    $dompdf->render();

	    if($mode == 'save')
        {
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
