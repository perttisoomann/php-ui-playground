<table class="table table-striped table-bordered table-sm">
    <tr>
        <td style="width:25%;"><b>Render time</b></td>
        <td><?= number_format($scriptRuntimeDuration, 6) ?>s</td>
    </tr>
    <tr>
        <td><b>Memory usage</b></td>
        <td><?= number_format($scriptMemoryUsage) ?></td>
    </tr>
    <tr>
        <td><b>PHP</b></td>
        <td><?= $phpVersion ?></td>
    </tr>
    <tr>
        <td><b>Total components rendered</b></td>
        <td><?= $totalComponentsRendered ?></td>
    </tr>
    <tr>
        <td><b>Rendered components</b></td>
        <td>
            <table class="table table-sm">
            <?php foreach ($renderedComponents as $componentClassName => $renderCount): ?>
                <tr><td style="width:25%;"><em><?= $componentClassName ?></em></td><td><?= $renderCount ?></td></tr>
            <?php endforeach ?>
            </table>
        </td>
    </tr>
</table>