<?php

class Invoicera {

    private $service_url = "https://www.invoicera.com/app/api/xml/1.1/"; // Listed on http://www.invoicera.com/api/

    private $this->api_token;
  
    private $data = array();
  
    public function __construct($api_token = "")
    {
        // Bind API Key
        $this->api_token = $api_token;
    }
    
    public function bindData($key, $value)
    {
        $this->data[$key] = $value;
        return true;
    }
    
    public function createInvoice()
    {
        $method = "createInvoice";
        $final_xml = $this->createFinalXML();
        $status = $this->Request($final_xml);
        if($status)
        {
            $this->flushData();
            return true;
        }
        return false;
    }
    
    public function createFinalXML($values)
    {
        $template = '<?xml version="1.0" encoding="utf-8"?><request method="'.$values['method'].'">';
        foreach($values['actual'] as $key, $vactuals)
        {
            if(is_array($vactuals))
            {
                // Loop again
                foreach($vactuals as $key, $vactuals2)
                {
                    if(is_array($vactuals2))
                    {
                        // Loop again
                        foreach($vactuals2 as $key, $vactuals3)
                        {
                            // Should be all
                            // One more for good use
                            if(is_array($vactuals3)
                            {
                                foreach($vactuals3 as $key, $vactuals4)
                                {
                                    if(is_string($vactuals4))
                                    {
                                        $template .= "<".$key.">".$vactuals4."</".$key.">";
                                    }
                                }
                            }
                            if(is_string($vactuals3))
                            {
                                $template .= "<".$key.">".$vactuals3."</".$key.">";   
                            }
                        }
                    }
                    if(is_string($vactuals2))
                    {
                        $template .= "<".$key.">".$vactuals2."</".$key.">";
                    }
                }
            }
            if(is_string($vactuals))
            {
                $template .= "<".$key.">".$vactuals."</".$key.">";
            }
        }
            
    }
    
    public function flushData()
    {
        // reset data array
        $this->data = array();
    }


}

?>
