<?php 

/**
 * SPropelLogger Class to manage propel logs.
 * Based on http://www.propelorm.org/wiki/Documentation/1.3/ConfigureLogging 
 * Using Non-PEAR Logger 
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license 
 */
class SPropelLogger {

    protected $messages = array();

    public function emergency($m) 
    {
        $this->log($m, Propel::LOG_EMERG);
    } 

    public function alert($m) 
    {
        $this->log($m, Propel::LOG_ALERT);
    }

    public function crit($m) 
    {
        $this->log($m, Propel::LOG_CRIT);
    }

    public function err($m) {
        $this->log($m, Propel::LOG_ERR);
    }

    public function warning($m) 
    {
        $this->log($m, Propel::LOG_WARNING);
    }

    public function notice($m) 
    {
        $this->log($m, Propel::LOG_NOTICE);
    }

    public function info($m) 
    {
        $this->log($m, Propel::LOG_INFO);
    }

    public function debug($m) 
    {
        $this->log($m, Propel::LOG_DEBUG);
    }

    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Logs propel message. 
     * @return void
     */
    public function log($m, $priority) 
    {
        $parts = explode('|',$m);
        $method = explode('::',$parts[0]);  
        $time = str_replace(array('time:','sec'),'',$parts[1]);
        $memory = str_replace(array('mem:'),'',$parts[2]);

        $this->messages[] = array(
            'method'=>trim($method[1]),
            'time'=>trim($time),
            'mem'=>trim($memory),
            'query'=>trim($parts[3]),
            'priority'=>$priority, 
        );
    }

    private function priorityToColor($priority) 
    {
        switch($priority) 
        {
            case Propel::LOG_EMERG:
            case Propel::LOG_ALERT:
            case Propel::LOG_CRIT:
            case Propel::LOG_ERR:
                return 'red';
            break;       
            case Propel::LOG_WARNING:
                return 'orange';
            break;
            case Propel::LOG_NOTICE:
                return 'green';
            break;
            case Propel::LOG_INFO:
                return 'blue';
            break;
            case Propel::LOG_DEBUG:
                return 'grey';
             break;
        }
    }

    public function displayAsTable()
    {
        $body = '';

        $head = '
            <table width="100%" cellpadding="3">
                <thead>
                    <th>method</th>
                    <th>time</th>
                    <th>memory</th>
                    <th>query</th>
                </thead>
            <tbody  valign="top">
                {body}
            </tbody>
            <tfoot>    
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
            </table>
        ';
        
        foreach ($this->getMessages() as $m)
        {
            $body .= '<tr>';
                $body .= '<td>'.$m['method'].'</td>';
                $body .= '<td>'.$m['time'].'</td>';
                $body .= '<td>'.$m['mem'].'</td>';
                $body .= '<td>'.$m['query'].'</td>';
            $body .= '</tr>';
        }

        return str_replace('{body}',$body,$head).'total: '.sizeof($this->getMessages());
    }

}
