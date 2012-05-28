<?php
/**
 * Usuarios controller
 *
 * Controller for application usuarios.
 * 
 * @uses       none
 * @package    Usuarios
 * @subpackage Controller
 */
/**
 * Incluir librerias 
 */
require_once ($config['models']."/usuarios.php");
/**
 * Settings iniciales 
 */
//requiere el objeto
//$procesar=new usuariosModel();
//$datos=$procesar->initUserData();
//no se necesita el objeto, accedemos al método desde el molde mediante
//llamada estática
$datos=usuariosModel::initUserData();
/**
 * Inicializacion de variables 
 */
$usuario='';
$content='';
$route=route('usuarios', 'select');     
/**
 * Parametrizar 
 */
/**
 * Procesar 
 */
$db=new dbConnect($config);
//$link=connectDBServer($config);
switch($route['action'])
{
    case 'delete':
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert            
            if ($_POST['delete']=='Si')
                //$procesar->procesarDelete(,$config['usersUploadDirectory']."/images", $config);
            	usuariosModel::procesarDelete($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select"); 
            break;
        }
        else
        {
            //$usuarios=$procesar->readUsersById($link, $_GET['usuario']);
            $usuarios=usuariosModel::readUsersById($db, $_GET['usuario']);
            $viewVar=array('usuarios'=>$usuarios,'helper'=>$config['helpers']);     
        }
    break;    
    case 'update':       
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert            
            //$procesar->procesarUpdate($config['usersUploadDirectory']."/images", $config);
            usuariosModel::procesarUpdate($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select"); 
            break;
        }
        else
        {
            //$datos=$procesar->readUserData($link, $config['usersUploadDirectory']."/images");
        	$datos=usuariosModel::readUserData($db, $config['usersUploadDirectory']."/images");
            
        }        
    case 'insert':
        // Si POST          
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert
            //$procesar->procesar($config['usersUploadDirectory']."/images", $config);
            usuariosModel::procesar($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select");            
        }
        else
        {
            //Mostrar formulario
            $viewVar=array('usuario'=>'','datos'=>$datos,'link'=>$db,'helper'=>$config['helpers']);           
        }                             
    break;
    case 'select':
    default:   
        //$usuarios=$procesar->readUsers($link);
        $usuarios=usuariosModel::readUsers($db);
        $viewVar=array('link'=>$db,'usuarios'=>$usuarios,'helper'=>$config['helpers']);
    break;
}
/**
 * Mostrar 
 */
$content=view($viewVar, $config['views'].'/'.$route['controller'].'/'.$route['action'].'.phtml');
$db->disconnectDBServer();
?>