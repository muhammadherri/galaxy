<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item nav-toggle">
                    <img class="navbar-brand menu-toggle" style="width: 40%; float:left;" src="<?php echo e(asset('app-assets/images/logo/bm.png')); ?>" alt="buana-megah">
                    <a class="nav-link modern-nav-toggle" data-bs-toggle="collapse"><i class="d-block d-xl-none text-white toggle-icon font-medium-5" data-feather="chevrons-left"></i></a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                
                <li class="dropdown nav-item">
                    <a class="nav-link d-flex align-items-center" href="<?php echo e(route('admin.home')); ?>" data-bs-toggle=""><i data-feather="home"></i><span data-i18n="Dashboards">Dashboards</span></a>
                </li>

                
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Production">Production</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Inventory"><i data-feather="plus-square"></i><span data-i18n="Inventory">Inventory</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventoryAdmin_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.item-master.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Item
                                            Master</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventoryAdmin_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.category.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Organisation
                                            Item</span></a>
                                </li>
                                <?php endif; ?>



                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.mtl-transfer.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Sub Inventory Transfer</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.missTransaction.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Miscellaneous</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.inventory.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">On Hand</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.physic.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n=""> Inventory Adjusment</span></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventoryAdmin_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.physic.create')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Physical Inventory</span></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.subInventory.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Sub
                                            Inventory</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.material-txns.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Material Transaction</span></a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Manufacturing"><i data-feather="plus-square"></i><span data-i18n="Manufacturing">Manufacturing</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('public_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.opunit.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Operation</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.prodplan.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Planning</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.bom.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Bill Of
                                            Material</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.work-order.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Work
                                            Order</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.completion.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Completion</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.gsm.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Gramatur</span></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quality_management')): ?>
                        
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Quality"><i data-feather="plus-square"></i><span data-i18n="Quality">Quality Management</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quality_management')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.qm-material.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Material</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quality_management')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.qm-finsihGood.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Finish
                                            Good</span></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>

                

                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="truck"></i><span data-i18n="User Interface">Purchase & Sales</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Purchase"><i data-feather="plus-square"></i><span data-i18n="Purchase">Purchase
                                    Order</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.quotation.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Quotation</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.purchase-requisition.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Purchase Requisition</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.auto-create.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Auto
                                            Create</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.orders.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Purchase
                                            Order</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.rcv.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Receiving</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.return.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Return</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.vendor.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Supplier</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.missExpense.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Miscellaneous Expense</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.purchase.data')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Purchase Order Report</span></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_management_access')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                            <a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Order"><i data-feather="plus-square"></i><span data-i18n="Order">Order Management</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_management_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.salesorder.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Order
                                            Organizer</span></a>
                                </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('om_access')): ?>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.salesorder.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Sales
                                            Order</span></a>
                                </li>
                                <?php endif; ?>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.deliveries.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Delivery</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.shipment.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Shipping</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.invoices.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Invoice</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.pricelist.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Price
                                            List</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.customer.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Customer</span></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_management_access')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="book-open"></i><span data-i18n="User Interface">Accounting & GL</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Purchase"><i data-feather="plus-square"></i><span data-i18n="Purchase">Account
                                    Payable</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.ap.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AP -
                                            Invoice</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.credit-memo.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AP -
                                            Credit Memo</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.ap-payment.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AP -
                                            Payment</span></a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Order"><i data-feather="plus-square"></i><span data-i18n="Order">Account Receivable</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.arCalendar.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AR -
                                            Calender</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.arAuto.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AR - Auto
                                            Invoice</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.ar.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AR -
                                            Receivable</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.ar-payment.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">AR -
                                            Payment</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.credit-note.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Credit
                                            Note</span></a>
                                </li>

                            </ul>
                        </li>

                        
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Order"><i data-feather="plus-square"></i><span data-i18n="Order">General Ledger</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.gl.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">GL - Journal
                                            Entries</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.gl.gl-entries')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">GL -
                                            Journal Items</span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.gl.bank')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Bank</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.gl.cash')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">
                                            Cash</span></a>
                                </li>
                            </ul>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asset_management')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Order"><i data-feather="plus-square"></i><span data-i18n="Order"><?php echo e(trans('cruds.assetMng.title')); ?></span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.asset-category.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n=""><?php echo e(trans('cruds.assetMng.category')); ?></span></a>
                                </li>

                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.asset.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n=""><?php echo e(trans('cruds.assetMng.title_singular')); ?></span></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="bar-chart-2"></i><span data-i18n="User Interface">Reports</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseOrder_access')): ?>
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.std-reports.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Standart Report</span></a>
                        </li>
                        <?php endif; ?>


                    </ul>
                </li>



                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="settings"></i><span data-i18n="User Interface">Permissions & Settings</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Purchase"><i data-feather="plus-square"></i><span data-i18n="Purchase">Users</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.permissions.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Permissions</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.roles.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Roles</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.users.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">User
                                            Accounts</span></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_management_setting_access')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Order"><i data-feather="plus-square"></i><span data-i18n="Order">Settings</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.currencies.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Currencies</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.materialTrnTypes.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Material Transx Types</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.accountCode.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Chart
                                            Of Account</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.site.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Site</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.uom-conversion.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">UOM
                                            Conversion</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.opunit.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Operation
                                            Unit</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.journalTypes.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Journal Type</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.terms.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Global
                                            Terms</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.uom.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Unit Of
                                            Measurement</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.bankaccount.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Bank
                                            Account</span></a>
                                </li>
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.tax.index')); ?>" data-bs-toggle="" data-i18n=""><i data-feather="check-circle"></i><span data-i18n="">Tax</span></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>


                
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="user-check"></i><span data-i18n="User Interface"><?php echo e(@auth::user()->name); ?></span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="" data-i18n=""><i data-feather="mail"></i><span data-i18n="">Inbox</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="" data-i18n=""><i data-feather="bell"></i><span data-i18n="">Notification</span></a>
                        </li>
                        <hr>
                        <form id="logoutform" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" data-bs-toggle="" data-i18n=""><i data-feather="log-out"></i><span data-i18n=""><?php echo e(trans('global.logout')); ?></span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
<?php /**PATH /var/www/html/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>