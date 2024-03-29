<?php
/**
 * Представление для списка 
 */
?>
<div class="col-12">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Тип</th>
                    <th>Категория</th>
                    <th>Наиминование</th>
                    <th>Сумма</th>
                    <th>Управление</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['array_for_payment_list'] as $array_for_payment_list_value) {
                    $date = $array_for_payment_list_value['DATE'];
                    $type = $array_for_payment_list_value['TYPE'];
                    $category = $array_for_payment_list_value['CATEGORY'];
                    $subcategory = $array_for_payment_list_value['SUBCATEGORY'];
                    $money = $array_for_payment_list_value['MONEY'];
                    $id = $array_for_payment_list_value['ID'];
                    $rowclass = "";
                    $typetext = "";
                    $moneytdclass = "";
                    switch ($type) {
                        case '0':
                            $rowclass .= "text-danger ";
                            $moneytdclass .= "";
                            $typetext = "Продажа";
                            $money = "-" . $money;
                            break;
                        case '1':
                            $rowclass .= "dohod_payment_list_tr ";
                            $moneytdclass .= "dohod_payment_list_td ";
                            $typetext = "Приход";
                            break;
                    }
                    echo <<<EOT
                    <tr class="$rowclass">
                        <td>$date</td>
                        <td class="$moneytdclass">$typetext</td>
                        <td class="$moneytdclass">$category</td>
                        <td class="$moneytdclass">$subcategory</td>
                        <td class="$moneytdclass">$money</td>
                        <td class="$moneytdclass editbuttoncell text-right"><button type="button" class="btn btn-light btn-block btn-sm " data-toggle="modal" onclick="editwindowdatainsert('$id')" data-target="#editpayment">Редактировать</button></td>
                    </tr>
EOT;
                    unset($date, $type, $money, $rowclass, $typetext);
                }
                ?>
            </tbody>
        </table>

        <?php include 'app/views/viewPagination.php'; ?>
    </div>
</div>