<?php
namespace OrlandoLibardi\ContactCms\app;
use File;

class ServiceContactConfig
{
    /**
     * get file name
     */
    public static function getFileName()
    {
        return config_path() . 'contact.php';
    }
    /**
     * getConfig
     */
    public function getConfig()
    {
        //return Lang::get(self::getFileName());
        return File::getRequire(self::getFileName());
    }
    /**
     * setTag
     */
    public function setTag($tags)
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

    public function keyValue($tags)
    {
        $content = "";
        foreach($tags as $key=>$value)
        {
            if(is_array($value))
            {
                $content .= self::keyValue($value);

            }else
            {
                $value = str_replace('"', '', $value);
                $value = str_replace("'", "", $value);
                $content .= "'" . $key ."' => '" . $value . "', " . $linha;
            }
            
        }
        return $content;
    }
    /**
     * destroy tag
     */
    public function tagDestroy($keys, $tags=false)
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
    public function tagSaveFile($content)
    {
        return File::put(self::getFileName(), $content);
    }
   
}