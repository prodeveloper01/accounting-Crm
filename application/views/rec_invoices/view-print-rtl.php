<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Print Invoice #<?php echo $invoice['tid'] ?></title>
    <style>
        body {
            color: #2B2000;
            font-family: 'Helvetica';
        }
        .invoice-box {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 4mm;
            border: 0;
            font-size: 12pt;
            line-height: 14pt;
            color: #000;
        }

        table {
            width: 100%;
            line-height: 16pt;
            text-align: right;
            border-collapse: collapse;
        }

        .plist tr td {
            line-height: 12pt;
        }

        .subtotal tr td {
            line-height: 10pt;
            padding: 6pt;
        }

        .subtotal tr td {
            border: 1px solid #ddd;
        }

        .sign {
            text-align: right;
            font-size: 10pt;
            margin-right: 110pt;
        }

        .sign1 {
            text-align: right;
            font-size: 10pt;
            margin-right: 90pt;
        }

        .sign2 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .sign3 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .terms {
            font-size: 9pt;
            line-height: 16pt;
            margin-right:20pt;
        }

        .invoice-box table td {
            padding: 10pt 4pt 8pt 4pt;
            vertical-align: top;

        }

        .invoice-box table.top_sum td {
            padding: 0;
            font-size: 12pt;
        }

        .party tr td:nth-child(3) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20pt;

        }

        table tr.top table td.title {
            font-size: 45pt;
            line-height: 45pt;
            color: #555;
        }

        table tr.information table td {
            padding-bottom: 20pt;
        }

        table tr.heading td {
            background: #515151;
            color: #FFF;
            padding: 6pt;

        }

        table tr.details td {
            padding-bottom: 20pt;
        }

        .invoice-box table tr.item td{
            border: 1px solid #ddd;
        }

        table tr.b_class td{
            border-bottom: 1px solid #ddd;
        }

        table tr.b_class.last td{
            border-bottom: none;
        }

        table tr.total td:nth-child(4) {
            border-top: 2px solid #fff;
            font-weight: bold;
        }

        .myco {
            width: 400pt;
        }

        .myco2 {
            width: 300pt;
        }

        .myw {
            width: 240pt;
            font-size: 14pt;
            line-height: 14pt;

        }

        .mfill {
            background-color: #eee;
        }

        .descr {
            font-size: 10pt;
            color: #515151;
        }

        .tax {
            font-size: 10px;
            color: #515151;
        }

        .t_center {
            text-align: right;

        }
        .party {
            border: #ccc 1px solid;
        }


    </style>
</head>

<body dir="rtl">

<div class="invoice-box">
    <table>
        <tr>
            <td class="myco">
                <img src="<?php echo FCPATH . 'userfiles/company/' . $this->config->item('logo') ?>" style="max-width:260px;">
            </td>
            <td>

            </td>
            <td class="myw">
                <table class="top_sum">
                    <tr>
                       <td colspan="1" class="t_center"><h2 ><?php echo $this->lang->line('Invoice') ?></h2><br><br></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('Invoice') ?></td><td><?php  echo  prefix(3). $invoice['tid'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('Invoice Date') ?></td><td><?php echo $invoice['invoicedate'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('Due Date') ?></td><td><?php echo $invoice['invoiceduedate'] ?></td>
                    </tr>
                    <?php if($invoice['refer']) { ?>
                        <tr>
                            <td><?php echo $this->lang->line('Reference') ?></td><td><?php echo $invoice['refer'] ?></td>
                        </tr>
                    <?php } ?>
                </table>



            </td>
        </tr>
    </table>

    <br>
    <table class="party">
        <thead>
        <tr class="heading">
            <td> <?php echo $this->lang->line('Our Info') ?>:</td>

            <td><?php echo $this->lang->line('Customer') ?>:</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><h3><?php echo $this->config->item('ctitle'); ?></h3>
                <?php echo
                    $this->config->item('address') . '<br>' . $this->config->item('city') . ',' . $this->config->item('country') . '<br>' . $this->lang->line('Phone') . ': ' . $this->config->item('phone') . '<br> Email: ' . $this->config->item('email');
                if ($this->config->item('taxno')) echo '<br>' . $this->lang->line('Tax') . ' ID: ' . $this->config->item('taxno');
                ?>
            </td>

            <td>
                <?php echo '<strong>'.$invoice['name'] . '</strong><br>';
                if ($invoice['company']) echo $invoice['company'] . '<br>';
                 echo $invoice['address'] . '<br>' . $invoice['city'] . ', ' . $invoice['region'] . '<br>' . $invoice['country'] . '-' . $invoice['postbox'] . '<br>'.$this->lang->line('Phone').': ' . $invoice['phone'] . '<br>' . $this->lang->line('Email') . ' : ' . $invoice['email'];
                if ($invoice['taxid']) echo '<br>' . $this->lang->line('Tax') . ' ID: ' . $invoice['taxid'];
                ?>
            </td>
        </tr>
        <?php if ($invoice['name_s']) { ?>

            <tr>

                <td>
                    <?php echo '<b>' . $this->lang->line('Shipping Address') . '</b>:<br>';
                    echo $invoice['name_s'] . '</strong><br>';

                      echo $invoice['address_s'] . '<br>' . $invoice['city_s'] . ', ' . $invoice['region_s'] . '<br>' . $invoice['country_s'] . '-' . $invoice['postbox_s'] . '<br> '.$this->lang->line('Phone').': ' . $invoice['phone_s'] . '<br> '.$this->lang->line('Email').': ' . $invoice['email_s'];


                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="plist" cellpadding="0" cellspacing="0">


        <tr class="heading">
            <td>
                <?php echo $this->lang->line('Description') ?>
            </td>

            <td>
                <?php echo $this->lang->line('Price') ?>
            </td>
            <td>
                <?php echo $this->lang->line('Qty') ?>
            </td>
            <?php if ($invoice['tax'] > 0) echo '<td>' . $this->lang->line('Tax') . '</td>'; ?>
            <td>
                <?php echo $this->lang->line('Discount') ?>
            </td>
            <td>
                <?php echo $this->lang->line('SubTotal') ?>
            </td>
        </tr>

        <?php $i = 1;
        $fill = true;
        foreach ($products as $row) {

            $cols = 3;
            if ($fill == true) {
                $flag = ' mfill';
            } else {
                $flag = '';
            }
            echo '<tr class="item' . $flag . '"> 
                            <td>' . $row['product'] . '</td>
							<td style="width:12%;">' . amountExchange($row['price'], $invoice['multi']) . '</td>
                            <td style="width:6%;">' . $row['qty'] . '</td>   ';
            if ($invoice['tax'] > 0) { echo '<td style="width:16%;">' . amountExchange($row['totaltax'], $invoice['multi']) . ' <span class="tax">(' . amountFormat_s($row['tax']) . '%)</span></td>';$cols++; }
            echo ' <td style="width:16%;">' . amountExchange($row['totaldiscount'], $invoice['multi']) . '</td>
                            <td>' . amountExchange($row['subtotal'], $invoice['multi']) . '</td>
                        </tr>';
            if($row['product_des'])  { $cc=$cols+1; echo '<tr class="item' . $flag . '"> 
                            <td colspan="'.$cc.'">' . $row['product_des'] . '<br>&nbsp;</td>
							
                        </tr>'; }
            $fill = !$fill;
            $i++;
        }
        if ($invoice['tax'] > 0) {
            $cols = 5;
        } else {
            $cols = 4;
        }
        ?>


    </table>
    <table class="subtotal">
        <thead>
        <tbody>
        <tr>

            <td class="myco2" rowspan="<?php echo $cols ?>"><br><br><br>
                <p><?php echo  '<strong>' .$this->lang->line(ucwords($invoice['status'])).'</strong> :'. $this->lang->line('Status') . '</p><br><p>' . amountExchange($invoice['total'], $invoice['multi']) . ' :'. $this->lang->line('Total Amount') . '</p><br><p> ' . amountExchange($invoice['pamnt'], $invoice['multi']).' :' . $this->lang->line('Paid Amount').'</p><br><p>Repeat on: ' . $invoice['rec']; ?>
            </td>
            <td><strong><?php echo $this->lang->line('Summary') ?>:</strong></td>
            <td></td>


        </tr>
        <tr>


            <td><?php echo $this->lang->line('SubTotal') ?>:</td>

            <td><?php echo amountExchange($invoice['subtotal'], $invoice['multi']); ?></td>
        </tr>
        <?php if ($invoice['tax'] > 0) {
            echo '<tr>        

            <td> ' . $this->lang->line('Total Tax') . ' :</td>

            <td>' . amountExchange($invoice['tax'], $invoice['multi']) . '</td>
        </tr>';
        } ?>
        <tr>


            <td><?php echo $this->lang->line('Total Discount') ?>:</td>

            <td><?php echo amountExchange($invoice['discount'], $invoice['multi']); ?></td>
        </tr>


        <tr>


            <td><?php echo $this->lang->line('Amount Due') ?> :</td>

            <td><strong><?php $rming = $invoice['total'] - $invoice['pamnt'];
    if ($rming < 0) {
        $rming = 0;

    }
    echo amountExchange($rming, $invoice['multi']);
    echo '</strong></td>
		</tr></tbody>
		</table><br><div class="sign">' . $this->lang->line('Authorized person') . '</div><div class="sign1"><img src="' . FCPATH . 'userfiles/employee_sign/' . $employee['sign'] . '" width="160" height="50" border="0" alt=""></div><div class="sign2">(' . $employee['name'] . ')</div><div class="sign3">' . user_role($employee['roleid']) . '</div> <br><div class="terms">' . $invoice['notes'] . '<hr><strong>' . $this->lang->line('Terms') . ':</strong>';
    echo '<strong>' . $invoice['termtit'] . '</strong><br>' . $invoice['terms'];
    ?></div>
</div>
</body>
</html>
