<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(
           /**
     * login
     */
    'login'
        => array
        (
            
           
            array('field' => 'username','label' => 'Nombre de usuario','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
             array('field' => 'password','label' => 'Passoword','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
        ),

	/**
	 * Agregar pagina de informacion
	 */
	'addpageinfo'
		=> array
        (
			
            array('field' => 'title','label' => 'Titulo','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'sectionpage','label' => 'Sección','rules' => 'required|is_string|trim|xss_clean'),
        
		),
     
        
/**
     * Agregar Usuarios 2
     */
    'add_usuarios2'
        => array
        (
            
            array('field' => 'nom','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'correo','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
        ),


    /**
     * Agregar menu
     */
    'addmenu'
        => array
        (
            
            array('field' => 'title','label' => 'Titulo','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'typemenu','label' => 'Tipo de Item Menu','rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'sectionpage','label' => 'Sección','rules' => 'required|is_string|trim|xss_clean'),
        
        ),

         /**
     * Agregar categoria
     */
    'addcategori'
        => array
        (
            
            array('field' => 'title','label' => 'Titulo','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
           
        
        ),

             /**
     * add users system
     */
    'addusersystem'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'usergroup','label' => 'Selecione grupo de usuario','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'username','label' => 'Login','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'password','label' => 'Contraseña','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'confirmpassword','label' => 'Confirmar Contraseña','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
           
        
        ),

    /**
     * add users system
     */
    'updateusersystem'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'usergroup','label' => 'Selecione grupo de usuario','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'username','label' => 'Login','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            
           
        
        ),

           /**
     * formulario de contacto
     */
    'sendContact'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'email','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            array('field' => 'message','label' => 'Mensaje','rules' => 'required|is_string|trim|xss_clean|max_length[300]'),
           
        
        ),  

        /**
     * configuracion de la web
     */
    'updateSetting'
        => array
        (
            
            array('field' => 'title','label' => 'Nombre del sitio','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'foto','label' => 'Logo','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'email','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            
           
        
        ),  

         /**
     * update profile admin
     */
    'updateProfile'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'lastname','label' => 'Apellido','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'email','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            array('field' => 'login','label' => 'Login','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            
           
        
        ),    


         /**
     * update profile admin
     */
    'updateProfilepass'
        => array
        (
            
            array('field' => 'name','label' => 'Nombre','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),
            array('field' => 'lastname','label' => 'Apellido','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'email','label' => 'E-Mail','rules' => 'required|is_string|trim|xss_clean|max_length[100]|valid_email'),
            array('field' => 'login','label' => 'Login','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'passact','label' => 'Password actual','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'pass','label' => 'Nuevo Password','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            array('field' => 'confirpass','label' => 'Confirmar Password','rules' => 'required|is_string|trim|xss_clean|max_length[100]'),           
            
           
        
        ),    

           /**
     * add slider
     */
    'addslidervalid'
        => array
        (
            
            //array('field' => 'titleslider','label' => 'Titulo','rules' => 'required|is_string|trim|xss_clean|max_length[300]'),
            array('field' => 'foto','label' => 'Imagen','rules' => 'required|is_string|trim|xss_clean'),
           
            
           
        
        ),
 

);
