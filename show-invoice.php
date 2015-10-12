<?php
ob_start();
$random = uniqid("1");
include("lib/autoload.php");
include("lib/db.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $firstId = filter_input(INPUT_GET, "id");
    $id = (int)$_GET['id'];
    $db = Database::getInstance();
    $manager = new OrdersManager($db);
    $getInfoOrder = $manager->getOrderFromId($id);
    $manager = new ShipmentManager($db);
    $getShipment = $manager->getAllShipment(true);
}
?>
<style>
    *{color:#717375;}
    p{margin: 0; padding: 4mm 0 0 0;}
    hr{background:#717375;height:1px; border:none;}
    table{border-collapse:collapse;width:100%;font-size:12pt;font-family:helvetica;
        line-height: 8mm;border:}
    h1{color: #000;}
    strong{color:#000; margin: 0; padding: 0;}
    em{font-size: 9pt;}
    table td{border:1px solid #CFD1D2; padding:3mm 1mm;}
    table th{background:#00509f;color:#fff;font-weight: normal;border:1px solid #fff;padding:1mm 1mm; text-align: left;}
    p,span{font-weight: bold; color: #000000;}
</style>
<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
    <table style="vertical-align: top;">
        <tr>
            <td style="width:60%;">
                <strong style="font-size: 20pt;">PhotoCleanMaster</strong>:<br />
                <?php echo nl2br("135 rue notre dame des champs");?><br />
                <?php echo nl2br("75006 Paris");?><br />
              <strong>SIRET: 152525202452</strong><br /><br />
            </td>
            <td style="width:40%">
               <p><?= $getInfoOrder->nom;?></p>
                <span><?= nl2br($getInfoOrder->prenom);?></span><br />
                <?= nl2br($getInfoOrder->adresse);?><br />
                <?= nl2br($getInfoOrder->tel);?><br />
            </td>
        </tr>
    </table>

    <table style="vertical-align: bottom;margin-top:20mm;">
        <tr>
            <td style="width:50%;"><h1 style="color:#00509f;">Facture n<sup style="color:#00509f";>o</sup></h1> <?="<p style='font-size: 16pt;color:#c1c1c1;padding:0;margin:0;'>". $random ."</p>"; ?></td>
            <td style="width:50%;text-align:right;">Emise le <?= date('d/m/Y'); ?></td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th style="width:64%; text-align:center;">Description</th>
                <th style="width:6%; text-align:center;">Qte</th>
                <th style="width:15%; text-align:center;">Prix</th>
                <th style="width:15%;line-height: 1px;">Frais de port</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Produit: Impression photos</td>
                <td style="text-align:center;">1</td>
                <td style="text-align:center;"><?= number_format($getInfoOrder->prix, 2, ',', '');?></td>
                <td style="text-align:center;"><?= number_format($getShipment->getTarif(), 2, ',', ' ');?> </td>
            </tr>
            <tr>
                <td>
                    <br />
                    <br />
                    <br />
                    <br />
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="border:none;"></td>
                <td style="background:#c1c1c1;color:#fff;font-weight: normal;border:1px solid #fff;padding:1mm;text-align:center;">Montant HT</td>
                <td style="padding:1mm;text-align:center;"><?= number_format($getInfoOrder->prix + $getShipment->getTarif(), 2, ',', ' ');?> e</td>

            </tr>
            <tr>
                <td colspan="2" style="border:none;"></td>
                <td style="background:#c1c1c1;color:#fff;font-weight: normal;border:1px solid #fff;padding:1mm;text-align:center;">Tva 20%</td>
                <td style="padding:1mm;text-align:center;">4,00 e</td>

            </tr>
            <tr>
                <td colspan="2" style="border:none;"></td>
                <td style="background:#c1c1c1;color:#fff;font-weight: normal;border:1px solid #fff;padding:1mm;text-align:center;">Montant TTC</td>
                <td style="padding:1mm;text-align:center;"><?= number_format($getInfoOrder->prix + $getShipment->getTarif() + 4, 2, ',', ' ');?> e</td>
            </tr>
        </tbody>
    </table>
    <page_footer>
        <hr />
        <p>Mode de r&egrave;glement : virement</p>
        <p>Date :<?= date('d/m/Y'); ?></p>
        <p>Taux des p&eacute;nalit&eacute;s de retard 12%</p>
    </page_footer>
</page>
<?php
$content = ob_get_clean();
include('html2pdf/html2pdf.class.php');
try{
    $pdf = new HTML2PDF('P', 'A4', 'fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->Output('facture_client.pdf');
}catch(HTML2PDF_exception $e){
    die($e);
}