<?php

    class Web_model extends CI_Model{

        //valida sesion del usuario dependiendo del tipo
        public function loginUser($data){

            $this->db->select("*");
            $this->db->from("professor");
            $this->db->where("username",$data["username"]);
            $this->db->where("password",$data["password"]);


            $query = $this->db->get();

            if($query->num_rows()>0){

                return $query->result();

            }else{
                $this->db->select("*");
                $this->db->from("students");
                $this->db->where("username",$data["username"]);
                $this->db->where("password",$data["password"]);

                $query_student = $this->db->get();

                if($query_student->num_rows()>0){

                    return $query_student->result();

                }else{

                    return NULL;
                }
            }

            
        }

       // obtiene los studiantes iguales al curso del professor para mostrar en la tabla gestionStudents
        public function getStudents($course){
            $this->db->select("*");
            $this->db->from("students");
            $this->db->where("course", $course);
            $this->db->where("deleted", 0);

            $query = $this->db->get();
            //print_r($this->db->last_query());
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return NULL;
            }
        }

        //obtiene el id del studiante para eliminarlo
        public function trashStudent($id){
            //se cambia el estado de la base de datos para no eliminarlo sino dejarlo de mostrar
            $array = array(
                "deleted"=>1
            );    
            //cambia el estado del id enviado
            $this->db->where("id",$id);
            $this->db->update("students", $array);
        }


        //envia los datos creandolos y guardadolos crea la tarea en la base de datos
        public function uploadHomework(){
            $array = array(
                "name"=> $_POST['name'],
                "description"=> $_POST['description'],
                "date_finish"=> $_POST['date_finish'],
                "course"=> $_POST['course']
            );

            $this->db->insert("homework", $array);
        }

        //obtiene todas las tareas del alumno
        public function getHomework($course){
            $this->db->select("*");
            $this->db->from("homework");
            $this->db->where("course", $course);

            //ordena las tareas por la fecha final
            $this->db->order_by("date_finish", "ASC");

            $query = $this->db->get();
            //print_r($this->db->last_query());

            //devuelve el resultado en caso de que lo encuentre o no
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return NULL;
            }
        }
    }

?>