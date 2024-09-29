<div class="no-print dynamic-column-group">
    {!! $DYNAMIC_COLUMNS !!}
</div>

<table id="dynamic-table" class="table table-striped cgm-datatable class-table-<?php echo Qudratom\Utilities\Helper::getControllerPrefix($this); ?> table-bordered table-hover">
    <thead>
        <tr>
            <th class="center">
                Sl#
            </th>
            <th><?php echo sortable_column('Voucher No  ','id'); ?></th>
            <th><?php echo sortable_column('Date','c.dt'); ?></th>
            <th><?php echo sortable_column('Account','ca.name'); ?></th>
            <th class="hidden-480"><?php echo sortable_column('Currency Code','r.code'); ?></th>
            <th class="hidden-480"><?php echo sortable_column('Amount','amount'); ?></th>
            <th> <?php echo sortable_column('Beneficiary ','pb.name'); ?></th>
            <th> <?php echo sortable_column('Balance','total_return'); ?></th>
            <th class="hidden-480"><?php echo sortable_column('Status ','status'); ?></th>
            <th class="action-column" ></th>
        </tr>
    </thead>
    <tbody id="idCashAdvanceTable">
    {!! $rawsethtml !!}
    </tbody>
</table>
{!! $pagerhtml !!}
