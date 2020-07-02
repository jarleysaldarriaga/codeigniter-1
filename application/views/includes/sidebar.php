
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo base_url()?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	    <h5 class="centered">
                        <?php 
                           if($_SESSION){
                                if(isset($_SESSION['name']) && isset($_SESSION['lastname'])){
                                    echo strtoupper($_SESSION['name'])." ".strtoupper($_SESSION['lastname']);
                                }
                           }
                        ?>
                    </h5>
              	  	
                  <li class="mt">
                      <a id="dashboard" class="" href="http://localhost:8081/webcode/Dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                    <?php

                        if($_SESSION['type'] == "professor"){

                    ?>
                    <li class="sub-menu">
                      <a href="<?= base_url()?>Dashboard/gestionStudents" >
                          <i class="fa fa-th"></i>
                          <span>Gestion de Alumnos</span>
                      </a>
                    </li>

                    <li class="sub-menu">
                      <a href="<?= base_url()?>Dashboard/createHomework" >
                          <i class="fa fa-desktop"></i>
                          <span>Crear Tareas</span>
                      </a>
                    </li>
                    <?php
                        }
                    ?>
                  <li class="sub-menu">
                      <a href="<?= base_url()?>Dashboard/myHomeworks" >
                          <i class="fa fa-book"></i>
                          <span>Mis Tareas</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?= base_url()?>Dashboard/messages" >
                          <i class="fa fa-tasks"></i>
                          <span>Mensajes</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

