<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {

        public function index(){

            $this->loadViews("home");

        }

        //crea la devuelta de los datos
        public function login(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                $login = $this->Web_model->loginUser($_POST);
                if($login){

                    //devuelve los datos del usuario as logear
                    $dates = array(
                        "id"=> $login[0]->id,
                        "name"=>$login[0]->name,
                        "lastname"=>$login[0]->lastname,
                        "course"=>$login[0]->course,
                        "username"=>$login[0]->username,
                        "password"=>$login[0]->password
                    );
                    
                    //guardar tipo usuario
                    if(isset($login[0]->is_professor)){
                        $dates['type'] = "professor";
                    }elseif(isset($login[0]->is_student)){
                        $dates['type'] = "student";
                    }

                    //obtiene los valores de la sesion
                    $this->session->set_userdata($dates);
                   
                }
            }
            //carga la vista login
            $this->loadViews('login');
        }

        //destruye las session del usuario y lo redirige al login
        public function destroySession(){
            $this->session->sess_destroy();
            redirect(base_url()."Dashboard/login", "location");
        }

        //crea la tarea den la base de datos
        public function createHomework(){

            //valida si se envia los datos y  ejecuta la funcion para guardar y carga la vista nuevamente
            if($_POST){
                $this->Web_model->uploadHomework();
            }

            $this->loadViews("createhomework");
        }

        //obtiene cada una de las tareas segun el curso de asignada a la tarea
        public function myHomeworks(){

            if($_SESSION['id']){

                $data['homeworks'] = $this->Web_model->getHomework($_SESSION['course']);
    
                $this->loadViews("myhomework", $data);
            }else{
                redirect(base_url()."Dashboard", "location");
            }
        }

        //muestra y filtra los datos en una tabla
        public function gestionStudents(){
            //pasa el curso del profesor para mostrarlo en la atabla
            
            if($_SESSION['type'] == 'professor'){
                //pasamos la consulta
                $data['students'] = $this->Web_model->getStudents($_SESSION['course']);
                //$data['error'] = true; en caso de que falle
                //le pasa los datos a la vista
                $this->loadViews("gestionstudents", $data);
            }else{
                redirect(base_url()."Dashboard", "location");
            }
        }

        //esta funcion se encarga de eliminar el alumno
        public function deleteStudent(){
            //si se recibe el id
            if($_POST['idstudent']){
                $this->Web_model->trashStudent($_POST['idstudent']);
            }
        }

        public function Messages(){
            if($_SESSION['id']){

                $data['users'] = $this->Web_model->getUsers($_SESSION['type'],$_SESSION['course']);
                $this->loadViews("messages", $data);


            }else{
                redirect(base_url()."Dashboard", "location");
            }
        }


        //carga las vistas segun el resultado
        public function loadViews($view, $data = null){
            //si hay session entra al dashboard sino al login
            if(isset($_SESSION["username"])){

                //si la vista es login se redirige  ahome
                if($view == "login"){
                    redirect(base_url()."Dashboard", "location");
                }

                //si es una vista cualquiera se carga
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                //cuando se carga la vista se mandan los datos//
                $this->load->view($view, $data);
                $this->load->view('includes/footer');

                //sino tenemos iniciada la sesion
            }else{
                //si la vista login se carga
                if($view == "login"){
                    $this->load->view($view);
                //si la vista es otra se redirige a login
                }else{

                    redirect(base_url()."Dashboard/login", "location");
                }
            }
        }
    
    }

?>