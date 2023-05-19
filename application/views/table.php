<table class="table table-bordered table-striped">
    <?php if ($showHeader) : ?>
        <tr>
            <?php foreach ($columns as $column): ?>
                <th><?= $column->getLabel() ?></th>
            <?php endforeach ?>
        </tr>
    <?php endif ?>
    <?php foreach ($data as $row): ?>
        <tr>
            <?php foreach ($columns as $column): ?>
                <td><?= $table->getColumnValue($column, $row) ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>