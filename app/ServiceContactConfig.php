<?php
namespace OrlandoLibardi\ContactCms\app;
use File;
use Log;

class ServiceContactConfig
{
    /**
     * get file name
     */
    public static function getFileName()
    {
        return config_path('/') . 'contact.php';
    }
    /**
     * getConfig
     */
    public static function getConfig()
    {
        //return Lang::get(self::getFileName());
        return File::getRequire(self::getFileName());
    }
    /**
     * setTag
     */
    public static function setTag($tags)
    {        
        $linha = "\r\n";
        $content = '<?php' . $linha;
        $content .= '/*'. $linha;
        $content .= '|--------------------------------------------------------------------------' . $linha;
        $content .= '| OlCms Contact Lines '. $linha;
        $content .= '|--------------------------------------------------------------------------'. $linha;
        $content .= '*/'. $linha;
        $content .= $linha;
        $content .= 'return [' . $linha;

        $content .= self::keyValue($tags);

        $content .= '];'. $linha;

        return self::tagSaveFile($content);

    }

    public static function keyValue($tags)
    {
        $linha = "\r\n";
        $content = "";
        foreach($tags as $key=>$value)
        {
            if(!is_array($value)){
                $value = str_replace('"', '', $value);
                $value = str_replace("'", "", $value);
                $content .= "'" . $key ."' => '" . $value . "', " . $linha;
            }
            else{               
                $content .= "'" . $key ."' => [" . self::arrayCC($value) . "], " . $linha;                
            }
            
        }
        return $content;
    }

    
    public static function arrayCC($cc)
    {
        $linha = "\r\n";
        $content = "";
        foreach($cc as $v){
            $content .= "['name' => '" . $v['name'] . "', 'email' => '" . $v['email'] . "'], " . $linha;                
        }        
        return $content;
    }  

    /**
     * destroy tag
     */
    public static function tagDestroy($keys, $tags=false)
    {
        if(!$tags) $tags = self::getTag();

        foreach($keys as $key)
        {
            if(array_key_exists($key, $tags))
            {
                unset($tags[$key]);
            }
        }
        self::setTag($tags);
    }
    /**
     * save file
     */
    public static function tagSaveFile($content)
    {
        return File::put(self::getFileName(), $content);
    }
   
}