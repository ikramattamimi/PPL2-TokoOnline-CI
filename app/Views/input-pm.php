<div class="input-group input-group-sm">
    <button type="button" class="btn btn-secondary btn-number" data-type="minus"
        data-field="quant[<?= $number ?>]">
        <i class="fa fa-solid fa-minus"></i>
    </button>
    <input type="text" id="quant[<?= $number ?>]" name="quant[<?= $number ?>]" class="form-control input-number" value="1"
        min="1" max="<?= $barang['stok'] ?>">
    <button type="button" class="btn btn-success btn-number" data-type="plus"
        data-field="quant[<?= $number ?>]">
        <i class="fa fa-solid fa-plus"></i>
    </button>
</div>
