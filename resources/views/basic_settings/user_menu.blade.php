<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="checkbox" class="custom-control-input" {{(is_numeric(array_search('vendor', array_column($menu_permission, 'menu_slug'))))?"checked=''":""}} value="vendor" name="menu[]" id="customSwitch9" style="cursor: pointer !important">
    <label class="custom-control-label" for="customSwitch9">Vendor / Sub Contractor</label>
</div>
<div class="row">
    <div class="col-12 pl-5">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" {{is_numeric(array_search('vendor-payment-list', array_column($sub_menu_permission, 'menu_slug')))?"checked=''":""}} value="vendor|vendor-payment-list" name="sub_menu[]">
            <label >Payment List</label>
        </div>

    </div>
</div>


<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="checkbox" class="custom-control-input" {{(is_numeric(array_search('basic_settings', array_column($menu_permission, 'menu_slug')))!=false)?"checked=''":""}} value="basic_settings" name="menu[]" id="customSwitch14" style="cursor: pointer !important">
    <label class="custom-control-label" for="customSwitch14">Basic Settings</label>
</div>