<!-- Este no esta en funcionamiento -->

<!-- <?php 
	include_once '../../model/connection.php';
	include_once '../../model/hoja_vida.php';

	$consul = hoja_vida::bscdr($_POST["vlr_prmtr"]);
?>

<div class="mtbl">

    <table class="bordered highlight responsive-table centered">
      
        <tbody>
            <?php foreach ($consul as $ver): ?>
                <tr>
                    <td>    <?php echo $ver[0];?>   </td>
                    <td>    <?php echo $ver[1];?>   </td>
                    <td>    <?php echo $ver[2];?>   </td>
                    <td>    <?php echo $ver[8];?>   </td>
                    <td>    <?php echo $ver[7];?>   </td>
                    <td>    <?php echo $ver[3];?>   </td>
                    <td>    <?php echo $ver[4];?>   </td>
                    <td>    <?php echo $ver[5];?>   </td>
                    <td>
                        <a href="<?php echo $ver[6]; ?>" target="blank">
                            <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td>
                        <a href="../sections/ver_form_hv.php?usuario=<?php echo $ver[0];?>" target="blank">
                            <i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody> 
        
    </table>
</div> -->