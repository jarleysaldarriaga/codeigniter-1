<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <?php
                foreach($homeworks as $t){   
            ?>
                <div class="col-md-4 tarea">
                    <div class="row">
                        <strong><?= $t->name ?></strong>
                    </div>
                    <div class="row">
                        <?= $t->description ?>
                    </div>
                    <div class="row">
                        <?= date('d-m-Y', strtotime($t->date_finish)) ?>
                    </div>
                    
                    
                </div>
            <?php
                }
            ?>
        </div>
    </section>
</section>