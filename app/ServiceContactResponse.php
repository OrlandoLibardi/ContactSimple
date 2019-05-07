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
        return resource_path('views\/emails\/');
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
        $name = ($type == 0) ? "adminContactResponse" : "userContactResponse";
        return $name . ".blade.php";
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
        $patterns[10] = "extends";
        $patterns[11] = "section";
        $patterns[12] = "endsection";
        $patterns[13] = 'end@section'; 
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
        $replaces[10] = "@extends";
        $replaces[11] = "@section";
        $replaces[12] = "@endsection";
        $replaces[13] = '@endsection'; 

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
        $patterns[9] = 'end@if'; 
        $patterns[10] = "extends";
        $patterns[11] = "section";
        $patterns[12] = "endsection";
        $patterns[13] = 'end@section'; 
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
        $replaces[10] = "@extends";
        $replaces[11] = "@section";
        $replaces[12] = "@endsection";
        $replaces[13] = '@endsection'; 

        return str_replace($replaces, $patterns, $content);
    }
}