<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 9/24/2015
 * Time: 11:56 AM
 */
?>
<table style="padding-top: 10px;">
    <tr>
        <td>
            <div class="row">
                <img src="/img/fossil.jpg" class="img-responsive" alt="Responsive image" style="padding-top: 160px" height="200px" width="150px">
            </div>
            <div class="row">
                <img src="/img/fastrack.jpg" class="img-responsive" alt="Responsive image"  style="padding-top: 60px" height="200px" width="150px">
            </div>
            <div class="row">
                <img src="/img/casio.png" class="img-responsive" alt="Responsive image" style="padding-top: 60px" height="200px" width="150px">
            </div>
            <div class="row">
                <img src="/img/Q&Q.gif" class="img-responsive" alt="Responsive image" style="padding-top: 60px" height="200px" width="150px">
            </div>
        </td>
        <td>
            <div>
                <table style="border: 1px solid black;padding-top: 10px" width="500px">
                    <tr>
                        <th>Model</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    /** @var \frontend\models\Bills $item */
                    foreach ($items as $item) {
                        ?>

                        <tr>
                            <td>
                                <?= $item->watches->modelno; ?>
                            </td>
                            <td>
                                <?= $item->watches->brands->name; ?>
                            </td>
                            <td>
                                <?= $item->quantity; ?>
                            </td>
                            <td>
                                <?= $item->quantity * $item->watches->price; ?>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </td>
        <td>
            <div class="row">
                <img src="/img/tommy1.jpg" class="img-responsive" alt="Responsive image" style="padding-top: 140px" height="200px" width="180px"><br>
            </div>
            <div class="row">
                <img src="/img/timex.jpg" class="img-responsive" alt="Responsive image" style="padding-top: 100px" height="200px" width="180px"><br>
            </div>
            <div class="row">
                <img src="/img/titan2.gif" class="img-responsive" alt="Responsive image" style="padding-top: 120px" height="200px" width="180px"><br>
            </div>
            <div class="row">
                <img src="/img/sonata.gif" class="img-responsive" alt="Responsive image" style="padding-top: 100px" height="200px" width="180px">
            </div>
        </td>
    </tr>
</table>


