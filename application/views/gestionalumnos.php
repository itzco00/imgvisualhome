<section id="main-content">
    <section class="wrapper">

        <table id="alumnos" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Cursos</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($alumnos as $a) {

                ?>
                <tr id = "rowalumno<?= $a->id ?>">
                    <td><?= $a->Nombre?></td>
                    <td><?= $a->Apellido?></td>
                    <td><?= $a->username?></td>
                    <td><?= $a->curso?></td>
                    <td><i class="eliminar fa fa-trash-o" style="color: #000000; cursor: pointer" id="alumno-<?= $a->id ?>"></i></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</section>

<script type="text/javascript">
    $(".eliminar").click(function(){
        var idalumno=this.id;
        var res=idalumno.split("-");
        var id=res[1];
        $.post("<?= base_url() ?>Dashboard/eliminarAlumno",{idalumno: id}).done(function(data){
            $("#rowalumno"+id).fadeOut();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#alumnos').DataTable( {
            columnDefs: [{
                targets: [0],
                orderData: [0,1]
            },{
                targets: [1],
                orderData: [1,0]
            },{
                targets: [4],
                orderData: [4,0]
            } ]
        } );
    } );
</script>
