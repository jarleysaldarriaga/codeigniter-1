
<section id="main-content">
    <section class="wrapper">
    <?php
        //print_r($students);
    ?>

        <table id="students" class="display mt-4" style="width:100%; margin-top:50px;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($students as $a){       
                ?>
                <tr id="rowstudent<?= $a->id ?>">
                    <td><?= $a->name ?></td>
                    <td><?= $a->lastname ?></td>
                    <td><i class="delete fa fa-trash-o" style="cursor:pointer" id="student-<?= $a->id?>"></i></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </section>
</section>
<!--elimina el usuario con ajax y jquery-->
<script>
    $(".delete").click(function(){

        var idstudent = this.id;//crea una variable con id studiante
        var res = idstudent.split("-");// separa el guion con el numero
        var id = res[1]; //coge lo que devuelve el array en la posicion 1 es decir el id
        console.log(id);//muestra el id en consola

        //hace un post de jquery ejecutando el controlador desde la vista
        $.post("<?php base_url()?>deleteStudent", {idstudent: id}).done(function(data){
            //desaparece la casilla al ser eliminada
            $("#rowstudent"+id).fadeOut();
        });
    });
</script>
<!--orden de la tabla-->
    <script>
        $(document).ready( function () {
            $('#students').DataTable();
                columnDefs :[{
                    targets: [0],
                    ordenData: [0,1]
                },{
                    targets: [1],
                    ordenData: [1, 0]
                },{
                    targets: [4],
                    ordenData: [4, 0]
                } ]
        } );
    </script>