<?php
namespace OrlandoLibardi\ContactCms\app;
use File;

class ServiceContactResponse
{

    /**
     * Lê o arquivo de configuração de páginas e retorna o caminho para salvar templates
     */
    public static function getContactPath()
    {
        return resource_path('emails\/');
    }
    /**
     * Salva o arquivo
     */
    public static function save($type, $content)
    {
        $new_content = self::prepareTemplateBlade($content);        
        $file = self::name($type);        
        //salva o novo arquivo na pasta final
        File::put(self::getContactPath() . $file, $new_content); 
        return $file;
    }
    /**
     * Cria um nome para o arquivo
     */
    public static function name($type)
    {
        $name = ($type == 0) ? "admin_contact_response" : "user_contact_response";
        return str_slug($name) . ".blade.php";
    }
    /**
     *  Retorna o template para visualização do usuário
     */
    public static function loadTemplate($type)
    {
        $template = self::name($type);
        return self::prepareTemplateView( File::get( self::getContactPath() . $template ) );
    } 
    /**
     *  Retorna o template para visualização do usuário
     */
    public static function deleteTemplate($type)
    {
        $template = self::name($type);
        return File::delete( self::getContactPath() . $template );
    } 
    /**
     * Prepara para o blade
     */
    public static function prepareTemplateBlade($content)
    {
        $patterns[0] = '[';
        $patterns[1] = ']';
        $patterns[2] = 'foreach';
        $patterns[3] = 'endforeach';
        $patterns[4] = 'if';
        $patterns[5] = 'endif';
        $patterns[6] = 'else';
        $patterns[7] = '__';    
        $patterns[8] = 'end@foreach'; 
        $patterns[9] = 'end@if';       
        $replaces[0]  = '{{ ';
        $replaces[1]  = ' }}';
        $replaces[2]  = '@foreach';
        $replaces[3]  = '@endforeach';
        $replaces[4]  = '@if';
        $replaces[5]  = '@endif';
        $replaces[6]  = '@else';
        $replaces[7]  = '$';
        $replaces[8]  = '@endforeach';
        $replaces[9]  = '@endif';

        return str_replace($patterns, $replaces, $content);
    }
    /**
     * Prepara para o usuário
     */
    public static function prepareTemplateView($content)
    {
        $patterns[0] = '[';
        $patterns[1] = ']';
        $patterns[2] = 'foreach';
        $patterns[3] = 'endforeach';
        $patterns[4] = 'if';
        $patterns[5] = 'endif';
        $patterns[6] = 'else';
        $patterns[7] = '__';    
        $patterns[8] = 'end@foreach';        
        $replaces[0]  = '{{ ';
        $replaces[1]  = ' }}';
        $replaces[2]  = '@foreach';
        $replaces[3]  = '@endforeach';
        $replaces[4]  = '@if';
        $replaces[5]  = '@endif';
        $replaces[6]  = '@else';
        $replaces[7]  = '$';
        $replaces[8]  = '@endforeach';

        return str_replace($replaces, $patterns, $content);
    }
}