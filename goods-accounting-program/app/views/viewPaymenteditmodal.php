<?php
/**
 * Представление для всплывающей формы редактирования
 */
?>
<div class="modal fade" id="editpayment" tabindex="-1" role="dialog" aria-labelledby="editpayment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="editpay" class="form-row d-flex justify-content-center" method="GET" action="">  
                <div class="modal-body">
                    <div class="row " id="editpay">
                        <div class="col-12">
                            <div class="form-group d-none">
                                <label class="" for="editid">id </label>
                                <input type="number" class="form-control" name="editid" id="editid">
                            </div>
                            <div class="form-group">
                                <label class="" for="editdate">Дата </label>
                                <input type="date" class="form-control" name="editdate" id="editdate" value="<?= date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label class="" for="editnapravlenie">Тип </label>
                                <select name="editnapravlenie" class="custom-select" id="editnapravlenie" onchange="displaychangeforadd('edit');">
                                    <option value="0">Продажа</option>
                                    <option value="1" selected>Приход</option>
                                </select>
                            </div>
                            <?php foreach ($data['category_and_subcategory_array']['category_list'] as $type => $value): ?>
                                <div class="d-none form-group" id="editblockcategory<?= $type ?>">
                                    <label class="" for="editcategory<?= $type ?>">Категория </label>
                                    <select name="editcategory<?= $type ?>" class="custom-select" id="editcategory<?= $type ?>" onchange="displaychangeforadd('edit');">
                                        <?php foreach ($value as $key => $category): ?>
                                            <option value="<?= $key ?>"><?= $category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endforeach; ?>
                            <?php foreach ($data['category_and_subcategory_array']['subcategory_list'] as $type => $value): ?>
                                <div class="d-none form-group" id="editblocksubcategory<?= $type ?>">
                                    <label class="" for="editsubcategory<?= $type ?>">Подкатегория </label>
                                    <select name="editsubcategory<?= $type ?>" class="custom-select" id="editsubcategory<?= $type ?>" onchange="displaychangeforadd('edit');">
                                        <?php foreach ($value as $key => $category): ?>
                                            <option value="<?= $key ?>"><?= $category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endforeach; ?>
                            <script>
                                displaychangeforadd('edit');
                            </script>
                            <div class="">
                                <label class=""  for="editmoney">Сумма </label>
                                <input type="number" placeholder="Сумма" class="form-control" name="editmoney" id="editmoney">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button type="button" class="btn btn-danger" id="buttondelete" data-dismiss="modal" onclick="paymentdelete('')">Удалить запись</button>
                    <button type="button" class="btn btn-primary" id="buttonedit" data-dismiss="modal" onclick="paymentedit('')">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>
</div>