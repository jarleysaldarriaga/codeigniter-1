<section id="main-content">
    <section class="wrapper">

    <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Crear Tarea</font></font></h4>
            <form action="" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre:</font></font></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripcion:</font></font></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description">
                        <span class="help-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aqui puede poner las caracteristicas mas relevantes.</font></font></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fecha de Entrega:</font></font></label>
                    <div class="col-sm-10 ">
                        <input type="date" class="form-control round-form" name="date_finish">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Curso:</font></font></label>
                    <div class="col-sm-10 ">
                        <select name="course" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                
                <button class="btn" type="submit">Crear</button>
            </form>
        </div>

    </section>
</section>